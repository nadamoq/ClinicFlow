<x-layouts.main>
    <header
        class="flex justify-between items-center px-lg w-full h-16 bg-surface-container-lowest dark:bg-inverse-surface shadow-[0px_4px_20px_rgba(0,0,0,0.04)] border-b border-surface-variant dark:border-outline-variant sticky top-0 z-40">
        <div class="flex items-center gap-md flex-1">
            <div class="relative w-full max-w-md hidden md:block">
                <span
                    class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-[20px]"
                    data-icon="search">search</span>
                <input
                    class="w-full pl-10 pr-4 py-2 bg-surface-container-low border-none rounded-lg font-body-md text-body-md focus:ring-2 focus:ring-primary/20 transition-all"
                    placeholder="Search records, patients..." type="text" />
            </div>
            <div class="md:hidden">
                <h1 class="font-headline-md text-headline-md font-bold text-primary">ClinicFlow</h1>
            </div>
        </div>
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-2">
                <button class="p-2 rounded-full hover:bg-surface-container-low transition-colors relative">
                    <span class="material-symbols-outlined text-primary font-bold border-b-2 border-primary"
                        data-icon="notifications">notifications</span>
                    <span class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full ring-2 ring-white"></span>
                </button>
                <button class="p-2 rounded-full hover:bg-surface-container-low transition-colors">
                    <span class="material-symbols-outlined text-on-surface-variant" data-icon="help">help</span>
                </button>
            </div>
            <div class="h-8 w-px bg-surface-variant"></div>
            <div class="flex items-center gap-3">
                <div class="text-right hidden sm:block">
                    <p class="font-label-md text-label-md text-on-surface">Dr. Julianne Moore</p>
                    <p class="text-[11px] text-on-surface-variant">Senior Orthodontist</p>
                </div>
                <img class="w-10 h-10 rounded-full object-cover ring-2 ring-primary-fixed"
                    data-alt="Close-up professional portrait of a female doctor with a kind expression, wearing a white clinical coat, soft studio lighting, medical office background, ultra-modern clean medical aesthetic, primary blue color palette."
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuBA_kuybuOhgsrGfrIwYIX07cimy3ibRxocfDmK_T17eLZO8SNvAfOvKFCTAP2D_PBO99jMH1O-5zy8D4IefNMGv1Y0-Mz4gbSLJ5qqqaV2XH5VSZW6JQg7Gd9lQCvYUHS1uMzZHp6d_9nNXGNQQbDP1JnRrBxkgmuyeHghOHqqZVknV_zTKho9g_sDIkSQwsPi0zsE_hWLouVb9TrmdtqY_laXL8wu0gTNnKoP2fwUPyfTaiu4beXU" />
            </div>
        </div>
    </header>
    <!-- Page Header & Actions -->
    <section class="p-lg md:p-xl max-w-5xl mx-auto w-full">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-xl">
            <div>
                <nav class="flex items-center gap-2 text-on-surface-variant mb-2">
                    <span class="font-label-sm text-label-sm">Dashboard</span>
                    <span class="material-symbols-outlined text-[14px]" data-icon="chevron_right">chevron_right</span>
                    <span class="font-label-sm text-label-sm text-primary">Notifications</span>
                </nav>
                <h2 class="font-headline-lg text-headline-lg text-on-surface">Notifications</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">Manage your clinical updates and
                    administrative alerts.</p>
            </div>
            <div class="flex items-center gap-3">
                <button
                    class="flex items-center gap-2 px-4 py-2 rounded-lg font-label-md text-label-md text-primary bg-primary-fixed hover:bg-primary transition-all hover:text-on-primary active:scale-95">
                    <span class="material-symbols-outlined text-[18px]" data-icon="done_all">done_all</span>
                    Mark All as Read
                </button>
                <button
                    class="flex items-center gap-2 px-4 py-2 rounded-lg font-label-md text-label-md text-on-surface-variant hover:bg-surface-container transition-colors">
                    <span class="material-symbols-outlined text-[18px]" data-icon="settings">settings</span>
                    Preferences
                </button>
            </div>
        </div>
        <!-- Notification Filters -->
        <div class="flex items-center gap-2 mb-8 overflow-x-auto pb-2 custom-scrollbar">
            <button
                class="px-6 py-2 rounded-full bg-primary text-on-primary font-label-md text-label-md shadow-sm">All</button>
            <button
                class="px-6 py-2 rounded-full bg-surface-container-lowest text-on-surface-variant border border-surface-variant hover:border-primary hover:text-primary font-label-md text-label-md transition-all">Appointments</button>
            <button
                class="px-6 py-2 rounded-full bg-surface-container-lowest text-on-surface-variant border border-surface-variant hover:border-primary hover:text-primary font-label-md text-label-md transition-all">Evaluations</button>
            <button
                class="px-6 py-2 rounded-full bg-surface-container-lowest text-on-surface-variant border border-surface-variant hover:border-primary hover:text-primary font-label-md text-label-md transition-all">System</button>
        </div>
        <!-- Notifications Feed -->
        <div class="space-y-4">
            <!-- Today's Section -->
            <h3 class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest px-1">Today</h3>
            <!-- Unread Notification: Appointment -->
            <div
                class="glass-card rounded-xl p-md flex items-start gap-4 notification-item group relative overflow-hidden">
                <div class="absolute left-0 top-0 bottom-0 w-1 bg-primary"></div>
                <div
                    class="w-12 h-12 flex-shrink-0 bg-primary-fixed text-on-primary-fixed-variant rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined" data-icon="calendar_month">calendar_month</span>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-start mb-1">
                        <h4 class="font-headline-sm text-[16px] text-on-surface font-semibold">New Appointment Request
                        </h4>
                        <span class="text-[11px] font-medium text-on-surface-variant flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]" data-icon="schedule">schedule</span>
                            12m ago
                        </span>
                    </div>
                    <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2">Patient Sarah Jenkins has
                        requested an initial consultation for Invisalign on Oct 24th at 10:30 AM.</p>
                    <div class="flex items-center gap-3 mt-4">
                        <button
                            class="px-4 py-1.5 bg-primary text-on-primary rounded-lg font-label-md text-label-md hover:bg-on-primary-fixed-variant transition-colors">View
                            Details</button>
                        <button
                            class="px-4 py-1.5 bg-surface-container-low text-on-surface-variant rounded-lg font-label-md text-label-md hover:bg-surface-container-high transition-colors">Mark
                            as Read</button>
                    </div>
                </div>
                <div class="flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button
                        class="p-1.5 rounded-md text-on-surface-variant hover:bg-error-container hover:text-error transition-colors"
                        title="Delete">
                        <span class="material-symbols-outlined text-[20px]" data-icon="delete">delete</span>
                    </button>
                </div>
            </div>
            <!-- Read Notification: Evaluation -->
            <div
                class="bg-white border border-surface-variant rounded-xl p-md flex items-start gap-4 notification-item group opacity-75 grayscale-[0.3]">
                <div
                    class="w-12 h-12 flex-shrink-0 bg-secondary-container text-on-secondary-container rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined" data-icon="assignment">assignment</span>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-start mb-1">
                        <h4 class="font-headline-sm text-[16px] text-on-surface font-semibold">Evaluation Completed</h4>
                        <span class="text-[11px] font-medium text-on-surface-variant flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]" data-icon="schedule">schedule</span>
                            2h ago
                        </span>
                    </div>
                    <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2">The clinical evaluation
                        for Michael Ross (Case #9921) has been filed and is ready for review.</p>
                    <div class="flex items-center gap-3 mt-4">
                        <button
                            class="px-4 py-1.5 border border-primary text-primary rounded-lg font-label-md text-label-md hover:bg-primary-fixed transition-colors">View
                            Record</button>
                    </div>
                </div>
                <div class="flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button
                        class="p-1.5 rounded-md text-on-surface-variant hover:bg-error-container hover:text-error transition-colors">
                        <span class="material-symbols-outlined text-[20px]" data-icon="delete">delete</span>
                    </button>
                </div>
            </div>
            <!-- Yesterday Section -->
            <h3 class="font-label-sm text-label-sm text-on-surface-variant uppercase tracking-widest px-1 mt-8">
                Yesterday</h3>
            <!-- Read Notification: System -->
            <div
                class="bg-white border border-surface-variant rounded-xl p-md flex items-start gap-4 notification-item group opacity-75 grayscale-[0.3]">
                <div
                    class="w-12 h-12 flex-shrink-0 bg-surface-container text-on-surface-variant rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined" data-icon="system_update">system_update</span>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-start mb-1">
                        <h4 class="font-headline-sm text-[16px] text-on-surface font-semibold">System Maintenance</h4>
                        <span class="text-[11px] font-medium text-on-surface-variant flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]" data-icon="schedule">schedule</span>
                            Oct 15, 11:30 PM
                        </span>
                    </div>
                    <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2">ClinicFlow will undergo
                        scheduled maintenance tonight at 2:00 AM EST. Access may be intermittent for 15 minutes.</p>
                </div>
                <div class="flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button
                        class="p-1.5 rounded-md text-on-surface-variant hover:bg-error-container hover:text-error transition-colors">
                        <span class="material-symbols-outlined text-[20px]" data-icon="delete">delete</span>
                    </button>
                </div>
            </div>
            <!-- Unread Notification: Patient File -->
            <div
                class="glass-card rounded-xl p-md flex items-start gap-4 notification-item group relative overflow-hidden">
                <div class="absolute left-0 top-0 bottom-0 w-1 bg-primary"></div>
                <div
                    class="w-12 h-12 flex-shrink-0 bg-primary-fixed text-on-primary-fixed-variant rounded-xl flex items-center justify-center">
                    <span class="material-symbols-outlined" data-icon="folder_shared">folder_shared</span>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex justify-between items-start mb-1">
                        <h4 class="font-headline-sm text-[16px] text-on-surface font-semibold">Shared Lab Results</h4>
                        <span class="text-[11px] font-medium text-on-surface-variant flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]" data-icon="schedule">schedule</span>
                            Oct 15, 04:15 PM
                        </span>
                    </div>
                    <p class="font-body-md text-body-md text-on-surface-variant line-clamp-2">City Imaging Labs has
                        uploaded the panoramic X-rays for Patient #8812. Please verify the findings.</p>
                    <div class="flex items-center gap-3 mt-4">
                        <button
                            class="px-4 py-1.5 bg-primary text-on-primary rounded-lg font-label-md text-label-md hover:bg-on-primary-fixed-variant transition-colors">Open
                            Viewer</button>
                        <button
                            class="px-4 py-1.5 bg-surface-container-low text-on-surface-variant rounded-lg font-label-md text-label-md hover:bg-surface-container-high transition-colors">Mark
                            as Read</button>
                    </div>
                </div>
                <div class="flex flex-col gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button
                        class="p-1.5 rounded-md text-on-surface-variant hover:bg-error-container hover:text-error transition-colors">
                        <span class="material-symbols-outlined text-[20px]" data-icon="delete">delete</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- Pagination/Load More -->
        <div class="mt-xl flex justify-center">
            <button
                class="px-8 py-3 rounded-xl border-2 border-primary/20 text-primary font-label-md text-label-md hover:bg-primary/5 transition-all flex items-center gap-2 active:scale-95">
                Load More Notifications
                <span class="material-symbols-outlined text-[18px]" data-icon="expand_more">expand_more</span>
            </button>
        </div>
    </section>
    <!-- Footer spacing for mobile -->
    <div class="h-20 md:hidden"></div>
    </main>
    <!-- BottomNavBar for Mobile -->
    <nav
        class="md:hidden fixed bottom-0 left-0 right-0 h-16 bg-surface-container-lowest flex justify-around items-center border-t border-surface-variant shadow-lg z-50">
        <button class="flex flex-col items-center gap-1 text-on-surface-variant">
            <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
            <span class="text-[10px] font-medium">Home</span>
        </button>
        <button class="flex flex-col items-center gap-1 text-on-surface-variant">
            <span class="material-symbols-outlined" data-icon="group">group</span>
            <span class="text-[10px] font-medium">Patients</span>
        </button>
        <button class="flex flex-col items-center gap-1 text-primary">
            <span class="material-symbols-outlined" data-icon="notifications"
                style="font-variation-settings: 'FILL' 1;">notifications</span>
            <span class="text-[10px] font-bold">Alerts</span>
        </button>
        <button class="flex flex-col items-center gap-1 text-on-surface-variant">
            <span class="material-symbols-outlined" data-icon="calendar_month">calendar_month</span>
            <span class="text-[10px] font-medium">Schedule</span>
        </button>
        <button class="flex flex-col items-center gap-1 text-on-surface-variant">
            <span class="material-symbols-outlined" data-icon="settings">settings</span>
            <span class="text-[10px] font-medium">More</span>
        </button>
    </nav>
    <script>
        // Micro-interactions
        document.querySelectorAll('.notification-item').forEach(item => {
            item.addEventListener('click', (e) => {
                if (!e.target.closest('button')) {
                    // Logic for selecting the notification
                    item.classList.toggle('ring-2');
                    item.classList.toggle('ring-primary/20');
                }
            });
        });

        // Search highlight effect
        const searchInput = document.querySelector('input[type="text"]');
        searchInput.addEventListener('focus', () => {
            searchInput.parentElement.classList.add('scale-[1.02]');
            searchInput.parentElement.classList.add('shadow-md');
        });
        searchInput.addEventListener('blur', () => {
            searchInput.parentElement.classList.remove('scale-[1.02]');
            searchInput.parentElement.classList.remove('shadow-md');
        });
    </script>
</x-layouts.main>
