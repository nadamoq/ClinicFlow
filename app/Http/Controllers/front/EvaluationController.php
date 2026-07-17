<?php

namespace App\Http\Controllers\front;

use App\Actions\EvaluateAppointmentAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEvaluationRequest;
use App\Http\Requests\UpdateEvaluationRequest;
use App\Models\Appointment;
use App\Models\Evaluation;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EvaluationController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 1. التحقق من الصلاحيات العامة
        $this->authorize('viewAny', Evaluation::class);

        $user = auth()->user();
        $stats = [];
        $query = Evaluation::query();
        $students = null;

        // 2. تخصيص الإحصائيات ونطاق الاستعلام بناءً على دور المستخدم
        if ($user->isSupervisor()) {
            $supervisorId = $user->supervisor->id;

            $stats['not_evaluated_count'] = Appointment::where('supervisor_id', $supervisorId)->notEvaluated()->count();
            $stats['total_evaluated'] = Appointment::where('supervisor_id', $supervisorId)->evaluated()->count();
            $stats['total_supervised'] = Appointment::where('supervisor_id', $supervisorId)->count();

            // جلب قائمة الطلاب لعرضهم في الفلاتر
            $students = $user->supervisor->students;

            // قصر الاستعلام على التقييمات الخاصة بهذا المشرف فقط
            $query->whereHas('appointment.supervisor', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            });
        } elseif ($user->isStudent()) {
            $stats['not_evaluated_count'] = Appointment::forStudent($user->id)->notEvaluated()->count();
            $stats['total_evaluated'] = Appointment::forStudent($user->id)->evaluated()->count();
            $stats['average_grade'] = Evaluation::whereHas('appointment', function ($q) use ($user) {
                $q->where('student_id', $user->id);
            })->avg('mark') ?? 0;

            // قصر الاستعلام على تقييمات هذا الطالب فقط
            $query->whereHas('appointment', function ($q) use ($user) {
                $q->where('student_id', $user->id);
            });
        }

        // 3. تطبيق الفلاتر المشتركة من الـ Request
        if ($filter = $request->query('date')) {
            $query->whereDate('created_at', $filter);
        }

        if ($studentName = $request->query('student_name')) {
            $query->whereHas('appointment.student.user', function ($q) use ($studentName) {
                $q->where('name', 'like', '%'.$studentName.'%');
            });
        }

        // 4. تنفيذ الاستعلام وإرجاع الواجهة (أمر Return واحد يضمن عدم ظهور صفحة بيضاء لأي مستخدم)
        $evaluations = $query->latest()->paginate(10)->withQueryString();

        return view('evaluations.index', compact('evaluations', 'students', 'stats'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvaluationRequest $request, EvaluateAppointmentAction $action)
    {

        $result = $action->execute($request->validated());

        if ($result['status'] === Response::HTTP_CREATED) {
            return redirect()->route('dashboard.evaluations.index')
                ->with('success', $result['message']);
        }

        return redirect()->back()
            ->withInput()
            ->with('error', $result['message']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        //
        $this->authorize('view', $evaluation);
        $evaluation->load('appointment.patient');
        $appointment = $evaluation->appointment;
        $patient = $appointment->patient;

        return view('appointments.show', ['appointment' => $appointment, 'patient' => $patient]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvaluationRequest $request, Evaluation $evaluation)
    {
        //
        $this->authorize('update', $evaluation);

        if (! $evaluation->checkOlderPreviousMonth()) {

            $updated = $evaluation->update($request->validated());

            return redirect()->route('dashboard.evaluations.index')->with('success', 'Evaluation updated');
        }

        return redirect()->back()->with('error', 'Marks cant be updated after 3 months');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
