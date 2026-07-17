<x-layouts.main>
    @push('style')
        <style>
            body {
                font-family: 'Inter', sans-serif;
                background-color: #f7f9fb;
            }

            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
                display: inline-block;
                line-height: 1;
            }

            .clinical-shadow {
                box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.04);
            }

            .sidebar-active-indicator {
                border-left: 4px solid #006194;
            }
        </style>
    @endpush

    <div class="max-w-7xl mx-auto space-y-lg">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-md mb-lg">
            <div class="space-y-xs">
                <h2 class="font-headline-lg text-headline-lg text-on-surface tracking-tight">Clinical Evaluations
                </h2>
                <p class="font-body-md text-body-md text-on-surface-variant max-w-xl">Monitor and manage student
                    performance and procedure assessments with clinical precision and real-time oversight.</p>
            </div>

        </div>
 
        <!-- Filters Area -->
       <div class="grid grid-cols-1 md:grid-cols-3 gap-md mb-lg" >

    <div class="bg-surface-container-low p-md rounded-xl border border-outline-variant flex items-center justify-between clinical-shadow">
        <div>
            <p class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Pending Evaluations</p>
            <h3 class="text-headline-large font-bold text-on-surface mt-xs">
                {{ $stats['not_evaluated_count'] ?? 0 }}
            </h3>
            <p class="text-[12px] text-error mt-xs flex items-center gap-xs">
                <span class="material-symbols-outlined text-[14px]">schedule</span> Requires Action
            </p>
        </div>
        <div class="p-sm bg-error-container text-on-error-container rounded-lg">
            <span class="material-symbols-outlined text-[32px]">pending_actions</span>
        </div>
    </div>

    <div class="bg-surface-container-low p-md rounded-xl border border-outline-variant flex items-center justify-between clinical-shadow">
        <div>
            <p class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Completed Cases</p>
            <h3 class="text-headline-large font-bold text-on-surface mt-xs">
                {{ $stats['total_evaluated'] ?? 0 }}
            </h3>
            <p class="text-[12px] text-secondary mt-xs flex items-center gap-xs">
                <span class="material-symbols-outlined text-[14px]">check_circle</span> Archived Successfully
            </p>
        </div>
        <div class="p-sm bg-secondary-container text-on-secondary-container rounded-lg">
            <span class="material-symbols-outlined text-[32px]">task</span>
        </div>
    </div>

    @if (auth()->user()->isStudent())
        <div class="bg-surface-container-low p-md rounded-xl border border-outline-variant flex items-center justify-between clinical-shadow">
            <div>
                <p class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Average Grade</p>
                <h3 class="text-headline-large font-bold text-on-surface mt-xs">
                    {{ number_format($stats['average_grade'] ?? 0, 1) }}%
                </h3>
                <p class="text-[12px] text-primary mt-xs">Cumulative practical average</p>
            </div>
            <div class="p-sm bg-primary-container text-on-primary-container rounded-lg">
                <span class="material-symbols-outlined text-[32px]">school</span>
            </div>
        </div>
    @elseif(auth()->user()->isSupervisor())
        <div class="bg-surface-container-low p-md rounded-xl border border-outline-variant flex items-center justify-between clinical-shadow">
            <div>
                <p class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider">Total Supervised Cases</p>
                <h3 class="text-headline-large font-bold text-on-surface mt-xs">
                    {{ $stats['total_supervised'] ?? 0 }}
                </h3>
                <p class="text-[12px] text-tertiary mt-xs">Since semester start</p>
            </div>
            <div class="p-sm bg-tertiary-container text-on-tertiary-container rounded-lg">
                <span class="material-symbols-outlined text-[32px]">supervisor_account</span>
            </div>
        </div>
    @endif
</div>

        <div
            class="bg-surface-container-low p-md rounded-xl border border-outline-variant flex flex-wrap items-center gap-md mb-lg">
            <div class="flex items-center gap-sm">
                <span class="material-symbols-outlined text-on-surface-variant">filter_list</span>
                <span class="font-label-md text-label-md text-on-surface">filters</span>
            </div>

            <form method="GET" action="{{ route('dashboard.evaluations.index') }}"
                class="flex-1 flex flex-wrap gap-sm">
                @if (auth()->user()->isSupervisor())
                    <input name="student_name" onchange="this.form.submit()" value="{{old('student_name')}}"
                        class="bg-surface border border-outline-variant rounded-lg px-md py-xs font-body-md text-body-md outline-none focus:border-primary transition-all">
                     
                   
                @endif

                <input type="date" name="date" value="{{ request('date') }}" onchange="this.form.submit()"
                    class="bg-surface border border-outline-variant rounded-lg px-md py-xs font-body-md text-body-md outline-none focus:border-primary transition-all" />
            </form>

        </div>

        <div
            class="bg-surface-container-lowest rounded-xl border border-outline-variant clinical-shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse" dir="ltr">
                    <thead>
                        <tr class="bg-surface-container-low border-b border-outline-variant">
                            <th
                                class="px-lg py-md font-label-md text-label-md text-on-surface-variant uppercase tracking-wider text-left">
                                Appointment ID</th>

                            @if (auth()->user()->isSupervisor())
                                <th
                                    class="px-lg py-md font-label-md text-label-md text-on-surface-variant uppercase tracking-wider text-left">
                                    Student</th>
                            @endif

                            @if (auth()->user()->isStudent())
                                <th
                                    class="px-lg py-md font-label-md text-label-md text-on-surface-variant uppercase tracking-wider text-left">
                                    patient</th>
                            @endif

                            <th
                                class="px-lg py-md font-label-md text-label-md text-on-surface-variant uppercase tracking-wider text-left">
                                Procedure</th>
                            <th
                                class="px-lg py-md font-label-md text-label-md text-on-surface-variant uppercase tracking-wider text-left">
                                Evaluation Date</th>
                            <th
                                class="px-lg py-md font-label-md text-label-md text-on-surface-variant uppercase tracking-wider text-left">
                                Grade</th>
                            <th
                                class="px-lg py-md font-label-md text-label-md text-on-surface-variant uppercase tracking-wider text-right">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-outline-variant">
                        @forelse($evaluations as $evaluation)
                            <tr class="hover:bg-surface-bright transition-colors group">
                                <td class="px-lg py-md font-body-md text-body-md text-primary font-bold">
                                    #{{ $evaluation->appointment?->id ?? 'N/A' }}
                                </td>

                                @if (auth()->user()->isSupervisor())
                                    <td class="px-lg py-md">
                                        <div class="flex items-center gap-sm">
                                            <div
                                                class="w-8 h-8 rounded-full bg-primary-fixed text-on-primary-fixed flex items-center justify-center font-bold text-[11px]">
                                                {{ strtoupper(substr($evaluation->appointment?->student?->name ?? 'ST', 0, 2)) }}
                                            </div>
                                            <div>
                                                <p class="font-label-md text-label-md text-on-surface">
                                                    {{ $evaluation->appointment?->student?->user->name ?? 'Unknown Student' }}
                                                </p>
                                                <p class="font-body-md text-[12px] text-on-surface-variant">Student</p>
                                            </div>
                                        </div>
                                    </td>
                                @endif

                                @if (auth()->user()->isStudent())
                                    <td class="px-lg py-md font-body-md text-body-md text-on-surface">
                                        {{ $evaluation->appointment?->patient?->name ?? 'N/A' }}
                                    </td>
                                @endif

                                <td class="px-lg py-md font-body-md text-body-md text-on-surface">
                                    {{ $evaluation->appointment?->patient->procedure->name ?? 'General Procedure' }}
                                </td>

                                <td class="px-lg py-md font-body-md text-body-md text-on-surface">
                                    {{ $evaluation->created_at ? $evaluation->created_at->format('M d, Y') : 'N/A' }}
                                </td>

                                <td class="px-lg py-md">
                                    @if ($evaluation->mark)
                                        <span
                                            class="bg-secondary-container text-on-secondary-container px-sm py-xs rounded-full font-label-sm text-[11px] font-bold">
                                            {{ $evaluation->mark }}%
                                        </span>
                                    @else
                                        <span class="text-on-surface-variant font-label-sm text-[11px]">---</span>
                                    @endif
                                </td>

                                <td class="px-lg py-md text-right">
                                    <div class="flex items-center justify-end gap-sm transition-opacity">
                                        <a href="{{ route('dashboard.evaluations.show', $evaluation->id) }}"
                                            class="text-primary font-label-md text-label-md px-sm py-xs hover:bg-primary-fixed rounded border border-primary/20 hover:border-transparent transition-all">
                                            Review
                                        </a>
                                      
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ auth()->user()->isSupervisor() || auth()->user()->isStudent() ? 7 : 6 }}"
                                    class="px-lg py-xl text-center font-body-md text-on-surface-variant">
                                    No Evaluations match filters.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div
                class="px-lg py-md bg-surface-container-low flex items-center justify-between border-t border-outline-variant">
                {{ $evaluations->withQueryString()->links() }}
            </div>
        </div>
    </div>
    </main>
    @push('script')
        <script>
            // Micro-interactions for table rows
            document.querySelectorAll('tr').forEach(row => {
                row.addEventListener('click', (e) => {
                    if (!e.target.closest('button')) {
                        console.log('Row clicked, navigating to detail view...');
                        // Logic for row expansion or navigation
                    }
                });
            });

            // Simple filtering logic mock
            const selects = document.querySelectorAll('select');
            selects.forEach(select => {
                select.addEventListener('change', function() {
                    console.log(`Filtering by ${this.value}`);
                    // In a real app, this would trigger a data re-fetch or filter
                });
            });
        </script>
    @endpush
</x-layouts.main>
