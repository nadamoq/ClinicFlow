<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\SuggestAppointmentRequest;
use App\Models\Appointment;
use App\Models\Patient;
use App\Services\AppointmentSuggestionService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class StatusAppointmentController extends Controller
{
    use AuthorizesRequests;

    public function updateStatus(Request $request, Appointment $appointment)
    {
        $this->authorize('updateStatus', $appointment);

        $request->validate(['status' => 'required|in:processing,completed,canceled']);

        $appointment->update(['status' => $request->status]);

        return back()->with('success', 'Status updated.');
    }

    public function suggest(SuggestAppointmentRequest $request, AppointmentSuggestionService $service)
    {

        $patient = Patient::findOrFail($request->patient_id);
        $suggested = $service->Suggest($request->date, $patient->procedure->duration_minutes);

        return response()->json($suggested);

    }
}
