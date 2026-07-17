<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use App\Models\Patient;
use App\Models\Procedure;
use App\Services\PatientService;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, PatientService $service)
    {
        //
        $patients = $service->list($request->all())->paginate(10);

        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $procedures = Procedure::all();

        return view('patients.create', compact('procedures'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request, PatientService $service)
    {
        //

        $patient = $service->store($request->validated());
        if (! $patient) {
            return redirect()->back()->with('error', 'Failed to create patient.');
        }

        return redirect()->route('dashboard.patients.index')->with('success', 'Patient CREATED successfully');
    }

    public function show(Patient $patient)
    {

        return view('appointments.create', ['patient' => $patient->load('image')]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Patient $patient)
    {
        //
        return view('patients.edit', ['patient' => $patient, 'procedures' => Procedure::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient, PatientService $service)
    {
        //
        $service->update($patient, $request->validated());

        return redirect()->route('dashboard.patients.index')->with('success', 'Patient updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient, PatientService $service)
    {
        //
        $service->delete($patient);

        return redirect()->route('dashboard.patients.index')->with('success', 'Patient deleted successfully');
    }
}
