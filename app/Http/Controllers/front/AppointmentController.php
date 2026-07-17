<?php

namespace App\Http\Controllers\front;

use App\Actions\GetAllAppointmentAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Appointment;
use App\Services\AppointmentService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AppointmentController extends Controller
{
    //
    use AuthorizesRequests;

    public function index(GetAllAppointmentAction $action, Request $request)
    {
        //
        $this->authorize('viewAny', Appointment::class);
        $appointments = $action->execute($request->query('search'));

        $appointmentStats = (clone $appointments)->selectRaw("
            COUNT(*) as total,
            SUM(CASE WHEN status = 'completed' THEN 1 ELSE 0 END) as completed,
            SUM(CASE WHEN status = 'pending' THEN 1 ELSE 0 END) as pending,
            SUM(CASE WHEN status = 'canceled' THEN 1 ELSE 0 END) as canceled
        ")->first();
        $appointments = $appointments->paginate(10);

        return view('appointments.index', compact('appointments', 'appointmentStats'));
    }

    public function store(StoreAppointmentRequest $request, AppointmentService $appointmentService)
    {
        $this->authorize('create', Appointment::class);
        $result = $appointmentService->create($request->validated());

        if (isset($result['status']) && $result['status'] !== Response::HTTP_CREATED) {

            return redirect()->back()
                ->withInput()
                ->with('error', $result['message']);
        }

        return redirect()->route('dashboard.appointments.index')
            ->with('success', $result['message']);
    }

    public function show(Appointment $appointment)
    {
        $this->authorize('view', $appointment);
        $patient = $appointment->patient;

        return view('appointments.show', compact('appointment', 'patient'));
    }

    public function edit(Appointment $appointment)
    {
        $patient = $appointment->patient;

        return view('appointments.edit', ['appointment' => $appointment, 'patient' => $patient]);
    }

    public function update(UpdateAppointmentRequest $request, Appointment $appointment, AppointmentService $service)
    {
        $this->authorize('update', $appointment);
        $result = $service->update($request->validated(), $appointment);

        return redirect()->route('dashboard.appointments.index')
            ->with('success', $result['message']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment, AppointmentService $service)
    {
        //
        $this->authorize('delete', $appointment);
        $result = $service->delete($appointment);

        return redirect()->route('dashboard.appointments.index')
            ->with('success', $result['message']);
    }
}
