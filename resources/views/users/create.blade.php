<x-layouts.main title="create user">
    @push('style')
        <style>
            body {
                background-color: #f7f9fb;
                color: #191c1e;
                font-family: 'Inter', sans-serif;
            }

            .clinical-shadow {
                box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.04);
            }

            .input-focus:focus {
                border-color: #006194;
                box-shadow: 0 0 0 3px rgba(0, 97, 148, 0.15);
                outline: none;
            }

            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }

            .role-panel {
                transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }
        </style>
    @endpush

    <div class="max-w-[1100px] w-full grid grid-cols-1 lg:grid-cols-12 gap-lg items-start">
        <!-- Left Decoration / Content -->
        <div class="lg:col-span-4 hidden lg:block">
            <div class="sticky top-xl space-y-lg">
                <h1 class="text-headline-lg font-headline-lg text-primary">Precision Healthcare Management</h1>
                <p class="text-body-lg font-body-lg text-on-surface-variant">Join our integrated clinical ecosystem
                    designed for seamless coordination between students, supervisors, and administrative staff.</p>
                <div class="space-y-md pt-md">
                    <div
                        class="flex items-center gap-md p-md bg-white rounded-xl border border-outline-variant clinical-shadow">
                        <div
                            class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined">verified_user</span>
                        </div>
                        <div>
                            <p class="font-headline-sm text-headline-sm text-on-surface">Secure Records</p>
                            <p class="text-label-md font-label-md text-on-surface-variant">HIPAA compliant data
                                architecture.</p>
                        </div>
                    </div>
                    <div
                        class="flex items-center gap-md p-md bg-white rounded-xl border border-outline-variant clinical-shadow">
                        <div
                            class="w-10 h-10 rounded-full bg-secondary-fixed flex items-center justify-center text-secondary">
                            <span class="material-symbols-outlined">groups</span>
                        </div>
                        <div>
                            <p class="font-headline-sm text-headline-sm text-on-surface">Team Synergy</p>
                            <p class="text-label-md font-label-md text-on-surface-variant">Real-time collaboration
                                tools.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Registration Form Card -->
        <div
            class="lg:col-span-8 bg-surface-container-lowest rounded-xl border border-outline-variant clinical-shadow overflow-hidden">
            <div class="p-lg md:p-xl">
                <div class="mb-xl">
                    <h2 class="text-headline-md font-headline-md text-on-surface">Create New Account</h2>
                    <p class="text-body-md font-body-md text-on-surface-variant">Fill in the clinical profile
                        details to get started.</p>
                </div>
                @if ($errors->any() )
                @foreach ($errors->all() as $error)
                {{$error}}
                    
                @endforeach
               
                    
                @endif
                <form class="space-y-xl" id="registrationForm" method="POST" action="{{route('dashboard.users.store')}}">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-xl">
                        <!-- Left Column: Account Details -->
                        <div class="space-y-lg">
                            <h3 class="text-label-md font-label-md text-primary uppercase tracking-wider">Account
                                Details</h3>
                            <div class="space-y-base">
                                <label class="text-label-md font-label-md text-on-surface-variant block">Full
                                    Name</label>
                                <input name="name" value="{{old('name')}}"
                                    class="w-full px-md py-sm bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md font-body-md input-focus transition-all"
                                    placeholder="Dr. Jane Smith" type="text" />
                            </div>
                            <div class="space-y-base">
                                <label class="text-label-md font-label-md text-on-surface-variant block">Email
                                    Address</label>
                                <input name="email"  value="{{old('email')}}"
                                    class="w-full px-md py-sm bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md font-body-md input-focus transition-all"
                                    placeholder="jane.smith@clinicflow.com" type="email" />
                            </div>
                            <div class="space-y-base">
                                <label
                                    class="text-label-md font-label-md text-on-surface-variant block">Password</label>
                                <div class="relative">
                                    <input name="password"
                                        class="w-full px-md py-sm bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md font-body-md input-focus transition-all"
                                        placeholder="••••••••" type="password" />
                                    <button class="absolute right-3 top-1/2 -translate-y-1/2 text-outline"
                                        type="button">
                                        <span class="material-symbols-outlined text-[20px]">visibility</span>
                                    </button>
                                </div>
                            </div>
                            <div class="space-y-base">
                                <label class="text-label-md font-label-md text-on-surface-variant block">User
                                    Role</label>
                                <div class="relative">
                                    <select name="role" 
                                        class="w-full px-md py-sm bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md font-body-md input-focus transition-all appearance-none cursor-pointer"
                                        id="roleSelector">
                                        <option value="Default" disabled >Default</option>
                                        <option value="student" @selected(old('role')=='student')>Student</option>
                                        <option value="supervisor" @selected(old('role')=='supervisor')>Supervisor</option>
                                        <option value="receptionist" @selected(old('role')=='receptionist')>Receptionist</option>
                                    </select>
                                    <span
                                        class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-outline">expand_more</span>
                                </div>
                            </div>
                        </div>
                        <!-- Right Column: Dynamic Role Fields -->
                        <div class="space-y-lg min-h-[300px]">
                            <h3 class="text-label-md font-label-md text-primary uppercase tracking-wider">
                                Role-Specific Information</h3>
                            <!-- Student Panel -->
                            <div class="role-panel hidden space-y-lg" id="panel-Student">
                                <div class="grid grid-cols-2 gap-md">
                                    <div class="space-y-base">
                                        <label
                                            class="text-label-md font-label-md text-on-surface-variant block">Gender</label>
                                        <select name="gender"
                                            class="w-full px-md py-sm bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md font-body-md input-focus transition-all">
                                            <option value="male" @selected(old('gender')=='male')>Male</option>
                                            <option value="female" @selected(old('gender')=='female')>Female</option>
                                          
                                        </select>
                                    </div>
                                    <div class="space-y-base">
                                        <label class="text-label-md font-label-md text-on-surface-variant block">Birth
                                            Date</label>
                                        <input name="birth" value="{{old('birth')}}"
                                            class="w-full px-md py-sm bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md font-body-md input-focus transition-all"
                                            type="date" />
                                    </div>
                                </div>
                                <div class="space-y-base">
                                    <label class="text-label-md font-label-md text-on-surface-variant block">Mobile
                                        Number</label>
                                    <input name="mobile" value="{{old('mobile')}}"
                                        class="w-full px-md py-sm bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md font-body-md input-focus transition-all"
                                        placeholder="+1 (555) 000-0000" type="tel" />
                                </div>
                                <div class="space-y-base">
                                    <label class="text-label-md font-label-md text-on-surface-variant block">Supervisor
                                        ID</label>
                                        <select name="supervisor_id"
                                        class="w-full px-md py-sm bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md font-body-md input-focus transition-all appearance-none cursor-pointer"
                                        id="roleSelector">

                                        @foreach ($supervisors as $supervisor)

                                            <option value="{{$supervisor->id}}" @selected(old('supervisor->id')=='{{$supervisor->id}}')>{{$supervisor->user->name}}</option>        

                                        @endforeach
                                        
                                    </select>
                                    
                                </div>
                            </div>
                            <!-- Supervisor Panel -->
                            <div class="role-panel hidden space-y-lg" id="panel-Supervisor">
                                <div class="space-y-base">
                                    <label class="text-label-md font-label-md text-on-surface-variant block">University
                                        Degree</label>
                                        'Bachelor','master','Phd','prof'
                                        <select name="university_degree"
                                            class="w-full px-md py-sm bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md font-body-md input-focus transition-all">
                                            <option value="Phd" @selected(old('university_degree')=='Phd')>Phd</option>
                                            <option value="master" @selected(old('university_degree')=='master')>master</option>
                                            <option value="Bachelor" @selected(old('university_degree')=='Bachelor')>Bachelor</option>
                                           <option value="prof" @selected(old('university_degree')=='prof')>prof</option>
                                        </select>
                                    
                                </div>
                                <div class="space-y-base">
                                    <label
                                        class="text-label-md font-label-md text-on-surface-variant block">Specialty</label>
                                    <input name="specialty" value="{{old('specialty')}}"
                                        class="w-full px-md py-sm bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md font-body-md input-focus transition-all"
                                        placeholder="Orthodontics" type="text" />
                                </div>
                                <div class="space-y-base">
                                    <label
                                        class="text-label-md font-label-md text-on-surface-variant block">Address</label>
                                    <textarea name="adress" 
                                        class="w-full px-md py-sm bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md font-body-md input-focus transition-all"
                                        placeholder="Clinical Office Address" rows="2">{{old('adress')}}</textarea>
                                </div>
                            </div>
                                <!-- Receptionist Panel -->
                            <div class="role-panel hidden space-y-lg" id="panel-Receptionist">
                                <div class="space-y-base">
                                    <label class="text-label-md font-label-md text-on-surface-variant block">Office number</label>
                                    <input name="office_number" value="{{old('office_number')}}"
                                        class="w-full px-md py-sm bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md font-body-md input-focus transition-all"
                                        placeholder="E562" type="text" />
                                </div>
                                <div class="space-y-base">
                                    <label
                                        class="text-label-md font-label-md text-on-surface-variant block">Location</label>
                                    <input name="location" value="{{old('location')}}"
                                        class="w-full px-md py-sm bg-surface-container-lowest border border-outline-variant rounded-lg text-body-md font-body-md input-focus transition-all"
                                        placeholder="Orthodontics" type="text" />
                                </div>
                                
                            </div>
                            <!-- Default / Receptionist Panel -->
                            <div class="role-panel space-y-lg" id="panel-Default">
                                <div
                                    class="flex flex-col items-center justify-center h-full p-xl text-center space-y-md border-2 border-dashed border-outline-variant rounded-xl bg-surface-container-low">
                                    <span class="material-symbols-outlined text-outline text-[48px]">info</span>
                                    <p class="text-body-md font-body-md text-on-surface-variant">Select a specific
                                        role like 'Student' or 'Supervisor' to provide additional clinical
                                        accreditation details.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="pt-xl border-t border-outline-variant flex flex-col md:flex-row md:items-center justify-between gap-md">
                        <label class="flex items-center gap-sm cursor-pointer group">
                           
                            
                        </label>
                        <button
                            class="px-xl py-md bg-primary text-on-primary rounded-lg font-headline-sm text-headline-sm shadow-md hover:bg-primary-container transition-all active:scale-[0.98]"
                            type="submit">
                            Create Account
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            const roleSelector = document.getElementById('roleSelector');
            const panels = {
                'Student': document.getElementById('panel-Student'),
                'Supervisor': document.getElementById('panel-Supervisor'),
                'Default': document.getElementById('panel-Default'),
                'Receptionist': document.getElementById('panel-Receptionist') 
            };

            roleSelector.addEventListener('change', (e) => {
                const selectedValue = e.target.value;

                // Hide all panels
                Object.values(panels).forEach(panel => {
                    if (panel) panel.classList.add('hidden');
                });

                // Show relevant panel
                const panelToShow = panels[selectedValue] || panels['Default'];
                if (panelToShow) {
                    panelToShow.classList.remove('hidden');
                    panelToShow.classList.add('animate-in', 'fade-in', 'duration-300');
                }
            });

            // // Form Submission micro-interaction
            // document.getElementById('registrationForm').addEventListener('submit', (e) => {
            //     e.preventDefault();
            //     const btn = e.target.querySelector('button[type="submit"]');
            //     const originalText = btn.innerHTML;
            //     btn.innerHTML = '<span class="material-symbols-outlined animate-spin">progress_activity</span>';
            //     btn.disabled = true;

            //     setTimeout(() => {
            //         btn.innerHTML =
            //             'Account Created <span class="material-symbols-outlined ml-2">check_circle</span>';
            //         btn.classList.replace('bg-primary', 'bg-secondary');
            //     }, 1500);
            // });
        </script>
    @endpush
</x-layouts.main>
