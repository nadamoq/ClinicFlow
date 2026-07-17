<x-slot name='headScript'>
    <style>
        /* Image Zoom Modal Styles */
        .image-zoom-modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            animation: fadeIn 0.3s ease;
        }

        .image-zoom-modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-zoom-content {
            position: relative;
            background-color: white;
            padding: 20px;
            border-radius: 12px;
            max-width: 90vw;
            max-height: 90vh;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            animation: zoomIn 0.3s ease;
        }

        .image-zoom-content img {
            max-width: 100%;
            max-height: 80vh;
            object-fit: contain;
            border-radius: 8px;
        }

        .image-zoom-close {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 36px;
            height: 36px;
            background-color: rgba(0, 0, 0, 0.8);
            border: none;
            border-radius: 50%;
            color: white;
            font-size: 28px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.2s ease;
        }

        .image-zoom-close:hover {
            background-color: rgba(0, 0, 0, 0.95);
        }

        .zoom-trigger {
            cursor: zoom-in;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .zoom-trigger:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.9);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
</x-slot>

<div class="p-lg lg:p-xl max-w-6xl mx-auto w-full">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-xl">
        <!-- Column 1: Patient Profile Summary -->
        <div class="lg:col-span-4 space-y-lg">
            <div
                class="bg-surface-container-lowest rounded-xl p-lg shadow-[0px_4px_20px_rgba(0,0,0,0.04)] border border-outline-variant">
                <div class="flex flex-col items-center text-center pb-lg border-b border-outline-variant">
                    <div class="relative mb-md">
                        <div class="w-24 h-24 rounded-full border-4 border-secondary-container/30 p-1">
                            <img class="w-full h-full rounded-full object-cover border border-outline-variant/50 zoom-trigger"
                                onclick="openImageZoom(this.src, '{{ $patient->image->alt_txt ?? ($patient->name ?? 'user') }}')"
                                data-alt="{{ $patient->image->alt_txt ?? ($patient->name ?? 'user') }}"
                                src="{{ $patient->imagePath ?? '' }}" />
                        </div>
                        <div
                            class="absolute bottom-1 right-1 w-6 h-6 bg-green-500 border-2 border-surface-container-lowest rounded-full">
                        </div>
                    </div>
                    <h2 class="font-headline-sm text-headline-sm text-on-surface">{{ $patient->name ?? 'user' }}</h2>
                    <p class="text-on-surface-variant font-body-md text-body-md">{{ $patient->email ?? 'deleted user' }}
                    </p>
                </div>
                <div class="py-lg space-y-md">
                    <div class="flex justify-between items-center">
                        <span class="text-on-surface-variant font-label-md text-label-md">Birth Date /
                            Age</span>
                        <span
                            class="text-on-surface font-body-md text-body-md font-medium">{{ date('M j, Y', strtotime($patient->birth ?? '')) ?? 'NA' }}
                            (
                            {{ $patient->age ?? 00 }}
                            yrs)</span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-on-surface-variant font-label-md text-label-md">Gender</span>
                        <span
                            class="text-on-surface font-body-md text-body-md font-medium">{{ $patient->gender ?? 'NA' }}</span>
                    </div>
                    <div class="flex flex-wrap gap-sm pt-sm">
                        <div
                            class="px-sm py-1 rounded-full bg-red-50 text-red-700 text-[11px] font-bold border border-red-100">
                            Blood Type: {{ $patient->Blood_type ?? 'NA' }}
                        </div>
                        <div
                            class="px-sm py-1 rounded-full bg-blue-50 text-blue-700 text-[11px] font-bold border border-blue-100">
                            @if ($patient->diabetes ?? true)
                                Diabtic
                            @else
                                Non-Diabtic
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mt-md p-md rounded-lg bg-surface-container-low border border-outline-variant">
                    <span class="text-[10px] uppercase font-bold text-on-surface-variant block mb-1">Required
                        Procedure</span>
                    <div class="flex items-center gap-sm text-primary">
                        <span class="material-symbols-outlined text-[20px]"
                            data-icon="medical_services">medical_services</span>
                        <span
                            class="font-body-md text-body-md font-bold">{{ $patient->procedure?->name ?? 'proc' }}</span>
                    </div>
                </div>
            </div>

        </div>
        <!-- Column 2: Appointment Details Form -->
        <div class="lg:col-span-8">
            <div
                class="bg-surface-container-lowest rounded-xl p-xl shadow-[0px_4px_20px_rgba(0,0,0,0.04)] border border-outline-variant relative overflow-hidden">
                <!-- Decorative Header Accent -->
                <div class="absolute top-0 left-0 w-full h-1.5 bg-primary"></div>
                <div class="mb-xl flex justify-between items-start">
                    <div>
                        <h2 class="font-headline-md text-headline-md text-on-surface mb-xs">Schedule
                            Appointment</h2>
                        <p class="text-on-surface-variant font-body-md text-body-md">Configure the slot and
                            assign medical supervisors.</p>
                    </div>
                    <div class="flex flex-col items-end">
                        <span class="text-[10px] text-on-surface-variant font-bold uppercase mb-1">Clinic
                            Reference</span>
                        <div class="flex gap-xs">
                            <span
                                class="bg-surface-container px-2 py-1 rounded text-[11px] font-mono border border-outline-variant">P-{{ $appointment->id ?? 0000 }}</span>
                            <span
                                class="bg-surface-container px-2 py-1 rounded text-[11px] font-mono border border-outline-variant">S-2024-012</span>
                        </div>
                    </div>
                </div>
                @if ($appointment?->evaluated ?? null)
                    <div
                        class="flex flex-col md:flex-row md:items-center justify-between gap-sm bg-green-500/10 text-green-600 dark:text-green-400 p-md rounded-xl text-sm font-bold border border-green-500/20 mb-md">
                        <div class="flex items-center gap-xs">
                            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                            <span>Your Appointment is evaluated: <strong
                                    class="text-base">{{ $appointment->evaluation->mark ?? 0 }}%</strong></span>
                        </div>
                        @if ($appointment->evaluation?->description)
                            <p class="font-normal text-xs opacity-90"><span class="underline">Notes:</span>
                                {{ $appointment->evaluation->description }}</p>
                        @endif
                    </div>
                @endif
                @if (session('success'))
                    <div class="mb-lg rounded-xl border border-green-200 bg-green-50 p-md text-sm text-green-900">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div
                        class="mb-lg rounded-xl border border-error-container text-red-900 bg-error-container/80 p-md text-sm">
                        {{ session('error') }}
                    </div>
                @endif
                @if ($errors->any())
                    <div class="mb-lg rounded-xl border border-error-container bg-error-container/80 p-md text-sm">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @php
                    $isSupervisorEvaluation = auth()->user()->isSupervisor() && ($appointment?->isCompleted() ?? false);
                @endphp


                <form class="grid grid-cols-1 md:grid-cols-2 gap-lg mb-lg" method="POST"
                    action="{{ $action ?? route('dashboard.appointments.store') }}">
                    @csrf
                    @method($method ?? 'post')

                    <input type="hidden" name="patient_id" id="patient_id" value="{{ $patient->id ?? '' }}">

                    {{-- Appointment Date --}}
                    <div class="md:col-span-2">
                        <div class="flex justify-between items-center mb-sm">
                            <label class="block text-on-surface-variant font-label-md text-label-md">Appointment Date</label>
                            @if (!($readonly ?? false) && !$isSupervisorEvaluation)
                                <button type="button" id="btn-suggest-appointment"
                                    class="text-xs font-bold text-primary hover:text-primary-container focus:outline-none flex items-center gap-xs transition-colors">
                                    <span class="material-symbols-outlined text-[16px]">auto_awesome</span>
                                    Suggest Appointment
                                </button>
                            @endif
                        </div>
                        <div class="relative">
                            <span
                                class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none"
                                data-icon="calendar_month">calendar_month</span>
                            <input name='date' id="appointment_date" {{ $readonly || $isSupervisorEvaluation ? 'readonly' : '' }}
                                class="w-full h-12 pl-12 pr-md rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none bg-surface-container-lowest font-body-md text-body-md transition-all {{ $readonly || $isSupervisorEvaluation ? 'cursor-not-allowed bg-surface-container/40' : '' }}"
                                type="date" value="{{ old('date', $appointment->date ?? '') }}" />
                        </div>
                        {{-- Suggestion Message Container --}}
                        <div id="suggestion-feedback" class="mt-sm hidden text-xs font-medium"></div>
                    </div>

                    {{-- Start Time --}}
                    <div class="col-span-1">
                        <label class="block text-on-surface-variant font-label-md text-label-md mb-sm">Start Time</label>
                        <div class="relative">
                            <span
                                class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none"
                                data-icon="schedule">schedule</span>
                            <input name="start_time" id="appointment_start_time" {{ $readonly || $isSupervisorEvaluation ? 'readonly' : '' }}
                                class="w-full h-12 pl-12 pr-md rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none bg-surface-container-lowest font-body-md text-body-md transition-all {{ $readonly || $isSupervisorEvaluation ? 'cursor-not-allowed bg-surface-container/40' : '' }}"
                                type="time" value="{{ old('start_time', $appointment->start_time ?? '') }}" />
                        </div>
                    </div>

                    {{-- End Time --}}
                    <div class="col-span-1">
                        <label class="block text-on-surface-variant font-label-md text-label-md mb-sm">End Time</label>
                        <div class="relative">
                            <span
                                class="material-symbols-outlined absolute left-md top-1/2 -translate-y-1/2 text-on-surface-variant pointer-events-none"
                                data-icon="timer_off">timer_off</span>
                            <input value="+{{ $patient->procedure?->duration_minutes ?? 0 }} mins" readonly
                                class="w-full h-12 pl-12 pr-md rounded-lg border border-outline-variant bg-surface-container/40 font-body-md text-body-md transition-all cursor-not-allowed outline-none"
                                type="text" />
                        </div>
                    </div>

                    {{-- IDs Section --}}
                    <div class="md:col-span-2 pt-lg">
                        <div class="grid grid-cols-2 gap-lg opacity-60">
                            <div class="flex flex-col">
                                <span class="text-on-surface-variant font-label-sm text-label-sm mb-xs">Patient
                                    ID</span>
                                <input value="{{ $patient->id ?? '0' }}"
                                    class="w-full h-10 px-md rounded border border-outline-variant bg-surface-container font-mono text-xs cursor-not-allowed"
                                    readonly type="text" />
                            </div>
                            <div class="flex flex-col">
                                <span class="text-on-surface-variant font-label-sm text-label-sm mb-xs">Student
                                    ID</span>
                                <input value="{{ $appointment->student_id ?? '0' }}"
                                    class="w-full h-10 px-md rounded border border-outline-variant bg-surface-container font-mono text-xs cursor-not-allowed"
                                    readonly type="text" />
                            </div>
                        </div>
                    </div>
                 

                    @if (isset($appointment) && !$appointment->isCompleted() && auth()->user()->isSupervisor())
                        <div
                            class="md:col-span-2 flex items-center gap-xs px-md py-sm rounded-lg bg-amber-500/10 text-amber-600 dark:text-amber-400 text-xs font-medium border border-amber-500/20 select-none mt-sm">
                            <span class="material-symbols-outlined text-[18px]">info</span>
                            <span>Evaluation and grading will be available once the student completes this
                                appointment.</span>
                        </div>
                    @endif

                    @if (!($readonly ?? false) && !$isSupervisorEvaluation)
                        <div
                            class="md:col-span-2 pt-xl border-t border-outline-variant flex flex-col md:flex-row justify-end gap-md">
                            <a href="{{ route('dashboard.patients.index') }}"
                                class="px-xl h-12 rounded-lg font-label-md text-label-md text-primary bg-primary/10 hover:bg-primary/20 transition-all font-bold flex items-center justify-center">
                                Cancel
                            </a>
                            <button
                                class="px-xl h-12 rounded-lg font-label-md text-label-md bg-primary text-on-primary shadow-lg shadow-primary/20 hover:bg-primary-container active:scale-95 transition-all font-bold flex items-center justify-center gap-sm"
                                type="submit">
                                <span class="material-symbols-outlined text-[20px]"
                                    data-icon="check_circle">check_circle</span>
                                Confirm Appointment
                            </button>
                        </div>
                    @endif
                </form>

                @if ($isSupervisorEvaluation)
                    <form
                        class="grid grid-cols-1 md:grid-cols-2 gap-lg pt-lg border-t-2 border-dashed border-outline-variant mt-md"
                        method="POST"
                        action="{{ $appointment->evaluation ? route('dashboard.evaluations.update', $appointment->evaluation->id) : route('dashboard.evaluations.store') }}">

                        @csrf
                        @method($appointment->evaluation ? 'PUT' : 'POST')
                        @if ($appointment ?? false)
                            <input value="{{ $appointment->id }}"name='appointment_id' class="hidden">
                        @endif
                        <div class="md:col-span-2">
                            <h3 class="font-label-lg text-label-lg text-primary mb-md flex items-center gap-xs">
                                <span class="material-symbols-outlined text-[20px]">grading</span>
                                Supervisor Evaluation Section
                            </h3>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-lg md:col-span-2">
                            <div class="col-span-1">
                                <label
                                    class="block text-on-surface-variant font-label-md text-label-md mb-sm">Evaluation
                                    Mark (%)</label>
                                <div class="relative">
                                    <input type="number" name="mark" min="0" max="100"
                                        value="{{ old('mark', $appointment->evaluation->mark ?? '') }}"
                                        class="w-full h-12 px-md rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none bg-surface-container-lowest font-body-md text-body-md transition-all"
                                        placeholder="e.g. 95" required />
                                </div>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-on-surface-variant font-label-md text-label-md mb-sm">Clinical
                                    Notes & Feedback</label>
                                <textarea name="description" rows="3"
                                    class="w-full py-sm px-md rounded-lg border border-outline-variant focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none bg-surface-container-lowest font-body-md text-body-md transition-all resize-y"
                                    placeholder="Write feedback for the student...">{{ old('description', $appointment->evaluation->description ?? '') }}</textarea>
                            </div>
                        </div>

                        <div
                            class="md:col-span-2 pt-xl border-t border-outline-variant flex flex-col md:flex-row justify-end gap-md">
                            <a href="{{ route('dashboard.patients.index') }}"
                                class="px-xl h-12 rounded-lg font-label-md text-label-md text-primary bg-primary/10 hover:bg-primary/20 transition-all font-bold flex items-center justify-center">
                                Cancel
                            </a>
                            <button
                                class="px-xl h-12 rounded-lg font-label-md text-label-md bg-primary text-on-primary shadow-lg shadow-primary/20 hover:bg-primary-container active:scale-95 transition-all font-bold flex items-center justify-center gap-sm"
                                type="submit">
                                <span class="material-symbols-outlined text-[20px]" data-icon="check_circle">
                                    {{ $appointment->evaluation ? 'update' : 'check_circle' }}
                                </span>
                                {{ $appointment->evaluation ? 'Update Evaluation' : 'Submit Evaluation' }}
                            </button>
                        </div>
                    </form>
                @endif

            </div>
        </div>
    </div>
</div>

<div id="imageZoomModal"
    class="fixed inset-0 z-50 invisible opacity-0 flex items-center justify-center bg-black/60 backdrop-blur-sm transition-all duration-300 ease-in-out cursor-zoom-out"
    onclick="if(event.target === this) closeImageZoom()">

    <div
        class="relative max-w-4xl max-h-[90vh] m-4 transform scale-95 opacity-0 transition-all duration-300 ease-in-out image-zoom-content">

        <button
            class="absolute -top-4 -right-4 w-10 h-10 flex items-center justify-center bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 rounded-full shadow-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors z-10 text-xl font-bold"
            type="button" onclick="closeImageZoom()">
            &times;
        </button>

        <div class="bg-white dark:bg-gray-900 p-2 rounded-2xl shadow-2xl overflow-hidden">
            <img id="zoomImageContent" src="" alt="Zoomed patient image"
                class="w-full max-h-[85vh] object-contain rounded-xl select-none">
        </div>

    </div>
</div>
<script>
    function openImageZoom(imageSrc, altText) {
        const modal = document.getElementById('imageZoomModal');
        const content = modal.querySelector('.image-zoom-content');
        const zoomImage = document.getElementById('zoomImageContent');

        zoomImage.src = imageSrc;
        zoomImage.alt = altText || 'Zoomed image';

        // إظهار الخلفية الضبابية والمودال
        modal.classList.remove('invisible', 'opacity-0');
        modal.classList.add('opacity-100');

        // تأثير الانبثاق والانسيابية للمحتوى الداخلي لحماية الحركة
        setTimeout(() => {
            content.classList.remove('scale-95', 'opacity-0');
            content.classList.add('scale-100', 'opacity-100');
        }, 20);

        document.body.style.overflow = 'hidden';
    }

    function closeImageZoom() {
        const modal = document.getElementById('imageZoomModal');
        const content = modal.querySelector('.image-zoom-content');

        // إرجاع الأنيميشن للداخل أولاً (Scale down)
        content.classList.remove('scale-100', 'opacity-100');
        content.classList.add('scale-95', 'opacity-0');

        // إخفاء المودال بالكامل بعد انتهاء الفيد (300 ملي ثانية)
        setTimeout(() => {
            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0', 'invisible');
            document.body.style.overflow = 'auto';
        }, 300);
    }

    // إغلاق المودال عند الضغط في الخارج
    document.getElementById('imageZoomModal')?.addEventListener('click', function(event) {
        if (event.target === this) {
            closeImageZoom();
        }
    });

    // إغلاق المودال عند الضغط على زر Escape
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeImageZoom();
        }
    });

    document.getElementById('btn-suggest-appointment')?.addEventListener('click', function() {
        const dateInput = document.getElementById('appointment_date');
        const patientInput = document.getElementById('patient_id');
        const feedbackDiv = document.getElementById('suggestion-feedback');
        const startTimeInput = document.getElementById('appointment_start_time');

        if (!dateInput || !dateInput.value) {
            feedbackDiv.className = 'mt-sm text-xs font-medium text-red-600 dark:text-red-400';
            feedbackDiv.textContent = 'Please select a date first.';
            feedbackDiv.classList.remove('hidden');
            return;
        }

        feedbackDiv.className = 'mt-sm text-xs font-medium text-blue-600 dark:text-blue-400';
        feedbackDiv.textContent = 'Searching for available slots...';
        feedbackDiv.classList.remove('hidden');

        const params = new URLSearchParams({
            date: dateInput.value,
            patient_id: patientInput.value
        });

        fetch('{{ route("dashboard.appointments.suggest") }}?' + params.toString(), {
            method: 'GET',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(err => { throw err; });
            }
            return response.json();
        })
        .then(data => {
            if (data && data.start_time) {
                startTimeInput.value = data.start_time;
                feedbackDiv.className = 'mt-sm text-xs font-medium text-green-600 dark:text-green-400';
                feedbackDiv.textContent = `Suggested time slot: ${data.start_time} - ${data.end_time}`;
            } else {
                feedbackDiv.className = 'mt-sm text-xs font-medium text-amber-600 dark:text-amber-400';
                feedbackDiv.textContent = 'No available time slot found for this date. Try another date.';
            }
        })
        .catch(error => {
            console.error(error);
            let msg = 'An error occurred while finding suggestions.';
            if (error.errors) {
                msg = Object.values(error.errors).flat().join(' ');
            } else if (error.message) {
                msg = error.message;
            }
            feedbackDiv.className = 'mt-sm text-xs font-medium text-red-600 dark:text-red-400';
            feedbackDiv.textContent = msg;
        });
    });
</script>
