<x-layouts.main>
    <x-slot name='headScript'>
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        "colors": {
                            "tertiary-fixed-dim": "#bec6e0",
                            "inverse-primary": "#93ccff",
                            "surface-bright": "#f7f9fb",
                            "on-tertiary-fixed": "#131b2e",
                            "surface-tint": "#006398",
                            "on-secondary-fixed-variant": "#005048",
                            "on-background": "#191c1e",
                            "on-secondary-fixed": "#00201c",
                            "secondary": "#006b5f",
                            "error-container": "#ffdad6",
                            "error": "#ba1a1a",
                            "tertiary-fixed": "#dae2fd",
                            "surface-container-lowest": "#ffffff",
                            "on-tertiary-fixed-variant": "#3f465c",
                            "secondary-fixed": "#71f8e4",
                            "on-secondary-container": "#006f64",
                            "on-primary-fixed": "#001d31",
                            "on-error": "#ffffff",
                            "primary": "#006194",
                            "on-surface": "#191c1e",
                            "inverse-surface": "#2d3133",
                            "secondary-container": "#6df5e1",
                            "inverse-on-surface": "#eff1f3",
                            "surface-container-high": "#e6e8ea",
                            "surface-container": "#eceef0",
                            "on-secondary": "#ffffff",
                            "surface-container-highest": "#e0e3e5",
                            "on-primary-fixed-variant": "#004b73",
                            "on-tertiary": "#ffffff",
                            "primary-fixed": "#cce5ff",
                            "surface": "#f7f9fb",
                            "on-error-container": "#93000a",
                            "surface-variant": "#e0e3e5",
                            "on-tertiary-container": "#fefcff",
                            "on-surface-variant": "#3f4850",
                            "outline": "#707881",
                            "surface-container-low": "#f2f4f6",
                            "tertiary": "#545c72",
                            "surface-dim": "#d8dadc",
                            "primary-fixed-dim": "#93ccff",
                            "secondary-fixed-dim": "#4fdbc8",
                            "primary-container": "#007bb9",
                            "on-primary-container": "#fdfcff",
                            "background": "#f7f9fb",
                            "on-primary": "#ffffff",
                            "outline-variant": "#bfc7d2",
                            "tertiary-container": "#6c748b"
                        },
                        "borderRadius": {
                            "DEFAULT": "0.25rem",
                            "lg": "0.5rem",
                            "xl": "0.75rem",
                            "full": "9999px"
                        },
                        "spacing": {
                            "gutter": "16px",
                            "container-margin": "24px",
                            "md": "16px",
                            "lg": "24px",
                            "sm": "8px",
                            "xl": "32px",
                            "base": "4px",
                            "xs": "4px"
                        },
                        "fontFamily": {
                            "headline-lg": ["Inter"],
                            "body-md": ["Inter"],
                            "headline-lg-mobile": ["Inter"],
                            "headline-sm": ["Inter"],
                            "label-sm": ["Inter"],
                            "label-md": ["Inter"],
                            "headline-md": ["Inter"],
                            "body-lg": ["Inter"]
                        },
                        "fontSize": {
                            "headline-lg": ["32px", {
                                "lineHeight": "1.2",
                                "letterSpacing": "-0.02em",
                                "fontWeight": "600"
                            }],
                            "body-md": ["14px", {
                                "lineHeight": "1.5",
                                "fontWeight": "400"
                            }],
                            "headline-lg-mobile": ["24px", {
                                "lineHeight": "1.2",
                                "fontWeight": "600"
                            }],
                            "headline-sm": ["18px", {
                                "lineHeight": "1.4",
                                "fontWeight": "600"
                            }],
                            "label-sm": ["11px", {
                                "lineHeight": "1",
                                "fontWeight": "600"
                            }],
                            "label-md": ["13px", {
                                "lineHeight": "1",
                                "letterSpacing": "0.01em",
                                "fontWeight": "500"
                            }],
                            "headline-md": ["24px", {
                                "lineHeight": "1.3",
                                "fontWeight": "600"
                            }],
                            "body-lg": ["16px", {
                                "lineHeight": "1.6",
                                "fontWeight": "400"
                            }]
                        }
                    },
                },
            }
        </script>
        <style>
            body {
                font-family: 'Inter', sans-serif;
                background-color: #f8fafc;
            }

            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }

            .clinic-card-shadow {
                box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.04);
            }
        </style>
    </x-slot>

    @php
        $receptionist = auth()->user()->isReceptionist();
    @endphp
    <div class="p-container-margin space-y-lg">
        <!-- Page Action Header -->
        <div class="flex justify-between items-end">
            <div>
                <h3 class="font-headline-md text-headline-md text-on-surface">Daily Overview</h3>
                <p class="text-body-md text-on-surface-variant">Manage and monitor today's patient schedule with
                    precision.</p>
            </div>
            @if (!auth()->user()->isSupervisor() && !$receptionist)
                <a href="{{ route('dashboard.patients.index') }}"
                    class="bg-primary hover:bg-primary-container text-on-primary px-lg py-md rounded-lg flex items-center gap-sm font-bold transition-all shadow-sm active:scale-95">
                    <span class="material-symbols-outlined">add</span>
                    New Appointment
                </a>
            @endif
        </div>
        <!-- Stats Summary Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-lg">
            <!-- Stat Card 1 -->
            <div
                class="bg-surface-container-lowest border border-outline-variant clinic-card-shadow p-lg rounded-xl flex items-center gap-lg">
                <div class="w-12 h-12 rounded-lg bg-primary-container/10 flex items-center justify-center text-primary">
                    <span class="material-symbols-outlined text-[28px]">calendar_today</span>
                </div>
                <div>
                    <p class="text-label-sm text-on-surface-variant uppercase tracking-wider">Total Appointments</p>
                    <p class="text-headline-sm font-bold text-on-surface">{{ $appointmentStats->total }}</p>
                </div>
            </div>
            <!-- Stat Card 2 -->
            <div
                class="bg-surface-container-lowest border border-outline-variant clinic-card-shadow p-lg rounded-xl flex items-center gap-lg">
                <div
                    class="w-12 h-12 rounded-lg bg-secondary-container/20 flex items-center justify-center text-secondary">
                    <span class="material-symbols-outlined text-[28px]">pending_actions</span>
                </div>
                <div>
                    <p class="text-label-sm text-on-surface-variant uppercase tracking-wider">Upcoming</p>
                    <p class="text-headline-sm font-bold text-on-surface">{{ $appointmentStats->pending }}</p>
                </div>
            </div>
            <!-- Stat Card 3 -->
            <div
                class="bg-surface-container-lowest border border-outline-variant clinic-card-shadow p-lg rounded-xl flex items-center gap-lg">
                <div class="w-12 h-12 rounded-lg bg-teal-500/10 flex items-center justify-center text-[#14b8a6]">
                    <span class="material-symbols-outlined text-[28px]">check_circle</span>
                </div>
                <div>
                    <p class="text-label-sm text-on-surface-variant uppercase tracking-wider">Completed</p>
                    <p class="text-headline-sm font-bold text-on-surface">{{ $appointmentStats->completed }}</p>
                </div>
            </div>
            <!-- Stat Card 4 -->
            <div
                class="bg-surface-container-lowest border border-outline-variant clinic-card-shadow p-lg rounded-xl flex items-center gap-lg">
                <div class="w-12 h-12 rounded-lg bg-error-container/40 flex items-center justify-center text-error">
                    <span class="material-symbols-outlined text-[28px]">cancel</span>
                </div>
                <div>
                    <p class="text-label-sm text-on-surface-variant uppercase tracking-wider">Cancelled</p>
                    <p class="text-headline-sm font-bold text-on-surface">{{ $appointmentStats->canceled }}</p>
                </div>
            </div>
        </div>
        <!-- Table Filters -->
        @if (session('success'))
            <div class="mb-lg rounded-xl border border-green-200 bg-green-50 p-md text-sm text-green-900">
                {{ session('success') }}
            </div>
        @endif
        <div
            class="bg-surface-container-lowest border border-outline-variant clinic-card-shadow rounded-xl overflow-hidden">

        </div>
        <div
            class="bg-surface-container-lowest border border-outline-variant clinic-card-shadow rounded-xl overflow-hidden mb-4 p-4">
            <form action="{{ url()->current() }}" method="GET" class="flex items-center gap-4">
                <div class="relative w-full max-w-md">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search by patient name..."
                        class="block w-full pl-10 pr-3 py-2 border border-outline-variant rounded-lg bg-surface-container-low text-sm focus:ring-primary focus:border-primary">
                </div>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700 transition">
                    Search
                </button>
                @if (request('search'))
                    <a href="{{ url()->current() }}"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg text-sm hover:bg-gray-300 transition">
                        Clear
                    </a>
                @endif
            </form>
        </div>
        <!-- Appointments Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-surface-container-low text-label-sm text-on-surface-variant uppercase tracking-wider">
                    <tr>
                        <th class="px-lg py-md border-b border-outline-variant">Patient Name</th>
                        <th class="px-lg py-md border-b border-outline-variant">Procedure</th>
                        <th class="px-lg py-md border-b border-outline-variant">price</th>
                        <th class="px-lg py-md border-b border-outline-variant">Date &amp; Time</th>
                        <th class="px-lg py-md border-b border-outline-variant">Status</th>
                      
                        @if (!$receptionist)
                            <th class="px-lg py-md border-b border-outline-variant text-center">Actions</th>
                        @endif

                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant">
                    <!-- Table Row 1 -->
                    @foreach ($appointments as $item)
                        <tr class="hover:bg-surface-container-low transition-colors group">

                            <td class="px-lg py-lg">
                                <a href="{{ route('dashboard.appointments.show', $item->id) }}">
                                    <div class="flex items-center gap-md">

                                        <div
                                            class="w-10 h-10 rounded-full bg-primary-fixed flex items-center justify-center text-primary font-bold overflow-hidden shrink-0">
                                            <img class="w-full h-full object-cover" alt="Patient portrait"
                                                src="{{ $item->patient?->imagePath }}">
                                        </div>
                                        <div>
                                            <p class="text-body-md font-bold text-on-surface">
                                                {{ $item->patient?->name ?? 'user' }}
                                            </p>
                                            <p class="text-[12px] text-on-surface-variant">
                                                #{{ $item->patient?->id ?? 'id' }}
                                            </p>
                                        </div>

                                    </div>
                                </a>
                            </td>

                            <td class="px-lg py-lg">
                                <p class="text-body-md text-on-surface">
                                    {{ $item->patient?->procedure->name ?? 'proc' }}
                                </p>

                            </td>
                            <td class="px-lg py-lg">
                                <p class="text-body-md text-on-surface">{{ $item->patient?->fee ?? 'price' }}</p>

                            </td>
                        
                        

                            <td class="px-lg py-lg">
                                <p class="text-body-md font-medium text-on-surface">
                                    {{ date('M j,Y', strtotime($item->date)) }}</p>
                                <p class="text-[12px] text-on-surface-variant">
                                    {{ new dateTime($item->start_time)->format('h:i') }} -
                                    {{ new dateTime($item->end_time)->format('h:i') }} </p>
                            </td>
                            <td class="px-lg py-lg">
                                <span
                                    class="inline-flex items-center px-2.5 py-1 rounded-full text-label-sm font-bold bg-secondary-container/20 text-on-secondary-container">
                                    {{ $item->status }}
                                </span>
                            </td>
                         <td>
    <div class="flex items-center justify-end gap-2">
        
        {{-- قسم أزرار تغيير الحالة (يظهر للموظف المسؤول فقط) --}}
        @if (!$receptionist)
            <div class="flex items-center gap-1.5 border-r border-gray-200 pr-2">
                @if ($item->status === 'pending')
                    <form action="{{ route('dashboard.appointment.updateStatus', $item->id) }}" method="POST">
                        @csrf @method('PATCH')
                        <input type="hidden" name="status" value="processing">
                        <button type="submit" title="Process" class="p-1.5 text-blue-600 hover:bg-blue-50 rounded-lg transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </button>
                    </form>
                @endif

                @if ($item->status === 'processing')
                    <form action="{{ route('dashboard.appointment.updateStatus', $item->id) }}" method="POST">
                        @csrf @method('PATCH')
                        <input type="hidden" name="status" value="completed">
                        <button type="submit" title="Complete" class="p-1.5 text-green-600 hover:bg-green-50 rounded-lg transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        </button>
                    </form>
                @endif

                @if (in_array($item->status, ['pending', 'processing']))
                    <form action="{{ route('dashboard.appointment.updateStatus', $item->id) }}" method="POST">
                        @csrf @method('PATCH')
                        <input type="hidden" name="status" value="cancelled">
                        <button type="submit" onclick="return confirm('Are you sure?')" title="Cancel" class="p-1.5 text-red-600 hover:bg-red-50 rounded-lg transition-all">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </form>
                @endif
            </div>

            {{-- قسم أزرار التعديل والحذف --}}
            @if ($item->status == 'pending')
                <form class='hidden' action="{{ route('dashboard.appointments.destroy', $item->id) }}" id='delete-{{ $item->id }}' method="POST">
                    @csrf @method('DELETE')
                </form>
                <button onclick="document.getElementById('delete-{{ $item->id }}').submit()" title="Delete" class="p-1.5 text-gray-500 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all">
                    <span class="material-symbols-outlined text-[20px]">delete</span>
                </button>
                <a href="{{ route('dashboard.appointments.edit', $item->id) }}" title="Edit" class="p-1.5 text-gray-500 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all">
                    <span class="material-symbols-outlined text-[20px]">edit</span>
                </a>
            @endif
        @endif

        {{-- زر المشاهدة (يظهر للجميع) --}}
        <a href="{{ route('dashboard.appointments.show', $item->id) }}" title="View Details"
           class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-gray-100 text-gray-600 hover:bg-primary-fixed hover:text-primary transition-all shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
            </svg>
        </a>
    </div>
</td>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- Table Pagination -->
        <div class="p-lg bg-surface-container-low flex items-center justify-between">
            {{ $appointments->links() }}
        </div>
    </div>

    </div>
</x-layouts.main>
