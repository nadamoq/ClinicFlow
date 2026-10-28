<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Student;
use App\Models\Supervisor;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Procedure;
use App\Models\Receptionist;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Testing\Fluent\AssertableJson;
use Database\Seeders\ProcedureSeeder;

use Tests\TestCase;

class AppointmentSuggestionServiceTest extends TestCase
{
    use RefreshDatabase;

    private string $date;
    private int $supervisorId;
    private Student $student;
    private Supervisor $supervisor;
    private Patient $patient;
    private Procedure $procedure;
    private Receptionist $receptionist;

    protected function setUp(): void
    {
        parent::setUp();

   
        $this->artisan('db:seed', ['--class' => ProcedureSeeder::class]);

        $this->date = '2026-07-20';

   
        $this->supervisor = Supervisor::factory()->create();
        $this->supervisorId = $this->supervisor->id;

        $this->student = Student::factory()->create([
            'supervisor_id' => $this->supervisorId 
        ]);
        $this->procedure=Procedure::first();
        $this->procedure->duration_minutes=30;
        $this->procedure->save();
        $this->receptionist=Receptionist::factory()->create();

        $this->patient = Patient::factory()->create([
            'procedure_id' => $this->procedure->id,
            'receptionist_id' => $this->receptionist->id,
        ]);

       
        $this->actingAs($this->student->user);
    }

    public function test_appointment_suggestion_returns_start_of_work_hours_if_no_appointments(): void
    {
      
        $response = $this->post("/api/appointment/suggest",['date'=>$this->date,'patient_id'=>$this->patient->id],['Accept'=>'application/json']);
   
        $response->assertStatus(200);
        $response->assertJson(function (AssertableJson $json) {
            
                $json->where('start_time', '09:50');
                $json->where('end_time', '10:20');
                $json->etc();
          
        });
    
    }
    public function test_appointment_suggestion_returns_slot_in_gap_before_first_appointment(): void
    {
      
        Appointment::create([
            'supervisor_id' => $this->supervisorId,
            'student_id' => $this->student->id,
            'date' => $this->date,
            'start_time' => '11:00',
            'end_time' => '12:00',
            'status' => 'pending',
            'patient_id'=>$this->patient->id,
        ]);

       
        $response = $this->post("/api/appointment/suggest",['date'=>$this->date,'patient_id'=>$this->patient->id],['Accept'=>'application/json']);
   
        $response->assertStatus(200);
        $response->assertJson(function (AssertableJson $json) {          
                $json->where('start_time', '09:50');
                $json->where('end_time', '10:20');
                $json->etc();
            
        });
    }

    public function test_appointment_suggestion_returns_slot_in_gap_between_two_appointments(): void
    {
        // الموعد الأول: 09:50 - 10:50
        Appointment::create([
            'supervisor_id' => $this->supervisorId,
            'student_id' => $this->student->id,
            'date' => $this->date,
            'start_time' => '09:50',
            'end_time' => '10:50',
            'status' => 'pending',
            'patient_id'=> 1
        ]);

        // الموعد الثاني: 12:00 - 13:00 (الفجوة بينهما 70 دقيقة)
        Appointment::create([
            'supervisor_id' => $this->supervisorId,
            'student_id' => $this->student->id,
            'date' => $this->date,
            'start_time' => '12:00',
            'end_time' => '13:00',
            'status' => 'pending',
            'patient_id'=> 1
        ]);

        // نطلب موعد مدته 30 دقيقة
       $response = $this->post("/api/appointment/suggest",['date'=>$this->date,'patient_id'=>$this->patient->id],['Accept'=>'application/json']);
   
        $response->assertStatus(200);
        $response->assertJson(function (AssertableJson $json) {

            $json->where('start_time', '10:50');
            $json->where('end_time', '11:20');
            $json->etc();
          
        });
    }
  
    

   
}