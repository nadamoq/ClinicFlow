<div class="max-w-4xl mx-auto pb-24">
    <!-- Page Header -->
    <div class="mb-lg flex justify-between items-end">
        <div>
            <h1 class="font-headline-lg text-headline-lg text-on-background mb-1">New Patient Registration
            </h1>
            <p class="font-body-md text-body-md text-on-surface-variant">Complete the following details to
                register a new clinical patient record.</p>
        </div>
        <div class="hidden md:block">
            <span
                class="font-label-sm text-label-sm bg-secondary-container/20 text-secondary px-3 py-1.5 rounded-full border border-secondary/20">Draft
                Session Active</span>
        </div>
    </div>
    <!-- Form Canvas -->
    @foreach ($errors->all() as $error)
        <div class="bg-error-container/20 text-error px-4 py-3 rounded-lg mb-md border border-error/30">
            {{ $error }}
        </div>
    @endforeach
    <form method="POST" action="{{ $action ?? route('dashboard.patients.store') }}" enctype="multipart/form-data">
        @csrf
        @method($method ?? 'post')
        <!-- Section 1: Personal Information -->
        <section class="bg-surface border border-outline-variant rounded-xl p-lg form-shadow">
            <div class="flex items-center gap-2 mb-6 text-primary">
                <span class="material-symbols-outlined">account_circle</span>
                <h2 class="font-headline-sm text-headline-sm font-bold">Personal Information</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-lg">
                <div class="space-y-1.5">
                    <label class="font-label-md text-label-md text-on-surface-variant" for="fullName">Full
                        Name</label>
                    <input value="{{ old('name', $patient->name ?? '') }}"
                        class="w-full px-4 py-3 bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-body-md"
                        id="fullName" name="name" placeholder="e.g. Johnathan Doe" required="" type="text" />
                </div>
                <div class="space-y-1.5">
                    <label class="font-label-md text-label-md text-on-surface-variant" for="email">Email
                        Address</label>
                    <input value="{{ old('email', $patient->email ?? '') }}"
                        class="w-full px-4 py-3 bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-body-md"
                        id="email" name="email" placeholder="john.doe@example.com" required=""
                        type="email" />
                </div>
                <div class="space-y-1.5">
                    <label class="font-label-md text-label-md text-on-surface-variant" for="birthDate">Birth
                        Date</label>
                    <div class="relative">
                        <input value="{{ old('birth', $patient->birth ?? '') }}"
                            class="w-full px-4 py-3 bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-body-md appearance-none"
                            id="birthDate" name="birth" required="" type="date" />
                    </div>
                </div>
                <div class="space-y-1.5">
                    <label class="font-label-md text-label-md text-on-surface-variant" for="gender">Gender</label>
                    <select
                        class="w-full px-4 py-3 bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-body-md"
                        id="gender" name="gender">
                        <option disabled="" selected="" value="">Select gender</option>
                        <option value="male" @selected($patient->gender == 'male')>Male</option>
                        <option value="female" @selected($patient->gender == 'female')>Female</option>

                    </select>
                </div>
            </div>
        </section>
        <!-- Section 2: Medical Details -->
        <section class="bg-surface border border-outline-variant rounded-xl p-lg form-shadow">
            <div class="flex items-center gap-2 mb-6 text-primary">
                <span class="material-symbols-outlined">medical_information</span>
                <h2 class="font-headline-sm text-headline-sm font-bold">Medical Details</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-lg">
                <div class="space-y-1.5">
                    <div class="space-y-1.5">
                        <label class="font-label-md text-label-md text-on-surface-variant" for="bloodType">Blood
                            Type</label>

                        <select name="Blood_type"
                            class="w-full px-4 py-3 bg-surface border border-outline-variant rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-body-md"
                            id="bloodType">

                            <!-- جعل خيار الاختيار الافتراضي يعمل مع الـ old value بشكل صحيح -->
                            <option disabled  value="">Select blood
                                type</option>
                               
                            <!-- استخدام old() للحفاظ على القيمة عند حدوث خطأ في الـ Validation -->
                            <option @selected(old('Blood_type')=='A'||$patient->Blood_type=='A') value="A">A</option>
                            <option @selected(old('Blood_type')=='B'||$patient->Blood_type=='B') value="B">B</option>
                            <option @selected(old('Blood_type')=='AB'||$patient->Blood_type=='AB')  value="AB">AB</option>
                            <option @selected(old('Blood_type')=='O'||$patient->Blood_type=='O')  value="O">O</option>

                        </select>
                    </div>
                </div>
                <div class="space-y-1.5">
                    <label class="font-label-md text-label-md text-on-surface-variant">
                        Diabetes Status
                    </label>

                    <div class="flex gap-4 items-center h-[50px]">

                        <label class="inline-flex items-center cursor-pointer">
                            <input class="w-5 h-5 text-primary border-outline-variant focus:ring-primary/20"
                                type="radio" name="diabetes" value="1"
                                {{ old('diabetes', $patient->diabetes ?? null) == 1 ? 'checked' : '' }} />
                            <span class="ml-2 font-body-md text-on-surface">Yes</span>
                        </label>

                        <label class="inline-flex items-center cursor-pointer">
                            <input class="w-5 h-5 text-primary border-outline-variant focus:ring-primary/20"
                                type="radio" name="diabetes" value="0"
                                {{ old('diabetes', $patient->diabetes ?? null) === 0 || old('diabetes', $patient->diabetes ?? null) === '0' ? 'checked' : '' }} />
                            <span class="ml-2 font-body-md text-on-surface">No</span>
                        </label>

                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-lg">
                    <div class="space-y-1.5">
                        <label class="font-label-md text-label-md text-on-surface-variant"
                            for="bloodType">Procedure</label>

                        <select name="procedure_id" id="procedure"
                            class="w-full pl-4 pr-4 py-3 bg-surface border border-outline-variant rounded-lg">
                            <option value="">Select procedure</option>

                            @foreach ($procedures as $procedure)
                                <option value="{{ $procedure->id }}"
                                    {{ old('procedure_id', $patient->procedure_id ?? '') == $procedure->id ? 'selected' : '' }}>
                                    {{ $procedure->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="space-y-1.5">
                    <label class="font-label-md text-label-md text-on-surface-variant" for="patientImage">
                        Patient Image
                    </label>
                    <input type="file" name="image" id="patientImage" accept="image/*"
                        class="w-full px-4 py-2.5 bg-surface border @error('image') border-error @else border-outline-variant @enderror rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-body-md file:mr-4 file:py-1.5 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary/10 file:text-primary hover:file:bg-primary/20" />

                    @error('image')
                        <p class="text-sm text-error mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="space-y-1.5 mt-4">
                    <label class="font-label-md text-label-md text-on-surface-variant" for="altTxt">
                        Image Description (Alt Text)
                    </label>
                    <input type="text" name="alt_txt" id="altTxt" value="{{ old('alt_txt') }}"
                        placeholder="e.g., Patient profile photo"
                        class="w-full px-4 py-3 bg-surface border @error('alt_txt') border-error @else border-outline-variant @enderror rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all text-body-md" />

                    @error('alt_txt')
                        <p class="text-sm text-error mt-1">{{ $message }}</p>
                    @enderror
                </div>
        </section>


        </section>
        <!-- Footer Actions -->
        <div class="flex flex-col md:flex-row justify-end items-center gap-md pt-lg">
            <a class="w-full md:w-auto px-xl py-3 rounded-lg font-label-md text-label-md text-primary bg-primary-fixed/30 hover:bg-primary-fixed/50 transition-colors border border-primary/10"
                href="{{ route('dashboard.patients.index') }}">
                Cancel registration
            </a>
            <button
                class="w-full md:w-auto px-xl py-3 rounded-lg font-label-md text-label-md text-on-primary bg-primary shadow-lg shadow-primary/20 hover:bg-primary-container active:scale-[0.98] transition-all"
                type="submit">
                Save Patient Record
            </button>
        </div>
    </form>
</div>
@push('script')
    <script>
        // Micro-interactions for form inputs
        document.querySelectorAll('input, select').forEach(element => {
            element.addEventListener('focus', () => {
                element.closest('div').querySelector('label')?.classList.add('text-primary');
            });
            element.addEventListener('blur', () => {
                element.closest('div').querySelector('label')?.classList.remove('text-primary');
            });
        });

        // Form submission prevention for demo
        document.getElementById('registrationForm').addEventListener('submit', (e) => {
            e.preventDefault();
            alert('Patient record registered successfully (Demo Environment)');
        });

        // Simple procedure chip logic
        const procedureInput = document.getElementById('procedure');
        procedureInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                e.preventDefault();
                const value = procedureInput.value.trim();
                if (value) {
                    const container = procedureInput.nextElementSibling;
                    const chip = document.createElement('span');
                    chip.className =
                        "font-label-sm text-label-sm bg-surface-container-low px-2 py-1 rounded border border-outline-variant/30 flex items-center animate-in fade-in zoom-in duration-300";
                    chip.innerHTML =
                        `${value} <span class="material-symbols-outlined text-[14px] ml-1 cursor-pointer hover:text-error" onclick="this.parentElement.remove()">close</span>`;
                    container.appendChild(chip);
                    procedureInput.value = '';
                }
            }
        });
    </script>
@endpush
