<?php

use App\Http\Controllers\front\AppointmentController;
use App\Http\Controllers\front\EvaluationController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\NotificationController;
use App\Http\Controllers\front\PatientController;
use App\Http\Controllers\front\ProcedureController;
use App\Http\Controllers\front\ProfileController;
use App\Http\Controllers\front\StatusAppointmentController;
use App\Http\Controllers\front\UserController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::redirect('/home', '/');
Route::middleware(['auth'])->group(function () {

    Route::prefix('dashboard')->name('dashboard.')->group(function () {

        Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');

        Route::post('/notifications/mark-all-as-read', [NotificationController::class, 'markAllAsRead'])->name('notifications.markAllAsRead');
        Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
        Route::delete('/notifications/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
        Route::get('patient/excel', [ReportController::class, 'export'])->name('patients.export');

        Route::get('/appointments/suggest', [StatusAppointmentController::class, 'suggest'])
            ->name('appointments.suggest');
        Route::resource('/appointments', AppointmentController::class);
        Route::resource('patients', PatientController::class);
        Route::resource('/evaluations', EvaluationController::class);
        Route::resource('/users', UserController::class)->middleware('role:admin')->except('show');
        Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('procedures', [ProcedureController::class, '__invoke'])->name('procedures.index');
        Route::put('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');

        Route::delete('/profile/avatar', [ProfileController::class, 'deleteAvatar'])->name('profile.avatar.destroy');
        Route::patch('/status/{appointment}', [StatusAppointmentController::class, 'updateStatus'])
            ->name('appointment.updateStatus');

    });
});
