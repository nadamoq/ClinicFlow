<x-layouts.main title="Patient ">
    <x-slot name="headscript">
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        "colors": {
                            "inverse-on-surface": "#eff1f3",
                            "on-secondary": "#ffffff",
                            "secondary": "#006b5f",
                            "surface-container-low": "#f2f4f6",
                            "on-background": "#191c1e",
                            "tertiary-container": "#6c748b",
                            "tertiary": "#545c72",
                            "inverse-surface": "#2d3133",
                            "on-primary-container": "#fdfcff",
                            "on-primary-fixed-variant": "#004b73",
                            "on-tertiary": "#ffffff",
                            "primary-fixed": "#cce5ff",
                            "on-primary-fixed": "#001d31",
                            "on-secondary-fixed": "#00201c",
                            "on-error": "#ffffff",
                            "surface-container-lowest": "#ffffff",
                            "on-secondary-fixed-variant": "#005048",
                            "secondary-container": "#6df5e1",
                            "on-error-container": "#93000a",
                            "inverse-primary": "#93ccff",
                            "surface-container": "#eceef0",
                            "surface-container-highest": "#e0e3e5",
                            "primary-container": "#007bb9",
                            "secondary-fixed-dim": "#4fdbc8",
                            "surface": "#f7f9fb",
                            "error": "#ba1a1a",
                            "on-tertiary-fixed-variant": "#3f465c",
                            "tertiary-fixed": "#dae2fd",
                            "error-container": "#ffdad6",
                            "tertiary-fixed-dim": "#bec6e0",
                            "on-tertiary-container": "#fefcff",
                            "surface-dim": "#d8dadc",
                            "secondary-fixed": "#71f8e4",
                            "surface-tint": "#006398",
                            "outline": "#707881",
                            "outline-variant": "#bfc7d2",
                            "on-surface": "#191c1e",
                            "primary": "#006194",
                            "on-surface-variant": "#3f4850",
                            "surface-variant": "#e0e3e5",
                            "background": "#f7f9fb",
                            "on-tertiary-fixed": "#131b2e",
                            "surface-container-high": "#e6e8ea",
                            "on-primary": "#ffffff",
                            "on-secondary-container": "#006f64",
                            "surface-bright": "#f7f9fb",
                            "primary-fixed-dim": "#93ccff"
                        },
                        "borderRadius": {
                            "DEFAULT": "0.25rem",
                            "lg": "0.5rem",
                            "xl": "0.75rem",
                            "full": "9999px"
                        },
                        "spacing": {
                            "md": "16px",
                            "lg": "24px",
                            "base": "4px",
                            "container-margin": "24px",
                            "xs": "4px",
                            "sm": "8px",
                            "gutter": "16px",
                            "xl": "32px"
                        },
                        "fontFamily": {
                            "headline-lg-mobile": ["Inter"],
                            "label-md": ["Inter"],
                            "body-lg": ["Inter"],
                            "body-md": ["Inter"],
                            "headline-md": ["Inter"],
                            "headline-lg": ["Inter"],
                            "headline-sm": ["Inter"],
                            "label-sm": ["Inter"]
                        },
                        "fontSize": {
                            "headline-lg-mobile": ["24px", {
                                "lineHeight": "1.2",
                                "fontWeight": "600"
                            }],
                            "label-md": ["13px", {
                                "lineHeight": "1",
                                "letterSpacing": "0.01em",
                                "fontWeight": "500"
                            }],
                            "body-lg": ["16px", {
                                "lineHeight": "1.6",
                                "fontWeight": "400"
                            }],
                            "body-md": ["14px", {
                                "lineHeight": "1.5",
                                "fontWeight": "400"
                            }],
                            "headline-md": ["24px", {
                                "lineHeight": "1.3",
                                "fontWeight": "600"
                            }],
                            "headline-lg": ["32px", {
                                "lineHeight": "1.2",
                                "letterSpacing": "-0.02em",
                                "fontWeight": "600"
                            }],
                            "headline-sm": ["18px", {
                                "lineHeight": "1.4",
                                "fontWeight": "600"
                            }],
                            "label-sm": ["11px", {
                                "lineHeight": "1",
                                "fontWeight": "600"
                            }]
                        }
                    },
                },
            }
        </script>
    </x-slot>

    @push('style')
        <style>
            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
                display: inline-block;
                line-height: 1;
                text-transform: none;
                letter-spacing: normal;
                word-wrap: normal;
                white-space: nowrap;
                direction: ltr;
            }

            .hide-scrollbar::-webkit-scrollbar {
                display: none;
            }

            .hide-scrollbar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }

            .clinical-shadow {
                box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.04);
            }

            @media (min-width: 768px) {
                .main-content {
                    margin-left: 260px;
                }
            }
        </style>
    @endpush



    <!-- Desktop Search and Filter Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">

        <form action="{{ url()->current() }}" method="GET" class="relative flex-1 max-w-md">
            <span class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline">search</span>
            <input name="name" value="{{ request('name') }}"
                class="w-full pl-12 pr-4 py-3 bg-surface-container-lowest border border-outline-variant rounded-xl focus:ring-2 focus:ring-primary focus:border-primary transition-all clinical-shadow outline-none"
                placeholder="Search patients by name..." type="text" />

            @if (request('gender'))
                <input type="hidden" name="gender" value="{{ request('gender') }}">
            @endif
            @if (request('diabetes'))
                <input type="hidden" name="diabetes" value="{{ request('diabetes') }}">
            @endif
            @if (request('blood_type'))
                <input type="hidden" name="blood_type" value="{{ request('blood_type') }}">
            @endif
        </form>

        <div class="flex gap-2 overflow-x-auto hide-scrollbar">

            <a href="{{ url()->current() }}"
                class="whitespace-nowrap flex items-center gap-2 px-5 py-2.5 {{ !request()->hasAny(['gender', 'diabetes', 'blood_type']) ? 'bg-primary text-on-primary' : 'bg-surface-container-high text-on-surface-variant' }} rounded-full font-label-md shadow-sm">
                <span class="material-symbols-outlined text-[18px]">filter_list</span>
                All Patients
            </a>

            <a href="{{ url()->current() . '?' . http_build_query(array_merge(request()->query(), ['gender' => 'female'])) }}"
                class="whitespace-nowrap px-5 py-2.5 {{ request('gender') === 'female' ? 'bg-primary text-on-primary' : 'bg-surface-container-high text-on-surface-variant' }} rounded-full font-label-md border border-outline-variant/30 hover:bg-surface-container transition-colors">
                Females
            </a>

            <a href="{{ url()->current() . '?' . http_build_query(array_merge(request()->query(), ['gender' => 'male'])) }}"
                class="whitespace-nowrap px-5 py-2.5 {{ request('gender') === 'male' ? 'bg-primary text-on-primary' : 'bg-surface-container-high text-on-surface-variant' }} rounded-full font-label-md border border-outline-variant/30 hover:bg-surface-container transition-colors">
                Males
            </a>

            <a href="{{ url()->current() . '?' . http_build_query(array_merge(request()->query(), ['diabetes' => '1'])) }}"
                class="whitespace-nowrap px-5 py-2.5 {{ request('diabetes') === '1' ? 'bg-primary text-on-primary' : 'bg-surface-container-high text-on-surface-variant' }} rounded-full font-label-md border border-outline-variant/30 hover:bg-surface-container transition-colors">
                Diabetic
            </a>
        </div>
    </div>

    <div class="bg-surface rounded-2xl border border-outline-variant/50 clinical-shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-surface-container-low border-b border-outline-variant/50">
                        <th class="px-6 py-4 font-label-md text-on-surface-variant uppercase tracking-wider">Patient
                        </th>
                        <th class="px-6 py-4 font-label-md text-on-surface-variant uppercase tracking-wider">Gender</th>
                        <th class="px-6 py-4 font-label-md text-on-surface-variant uppercase tracking-wider">Blood Type
                        </th>
                        <th class="px-6 py-4 font-label-md text-on-surface-variant uppercase tracking-wider">Diabetes
                            Status</th>
                        <th class="px-6 py-4 font-label-md text-on-surface-variant uppercase tracking-wider">Procedure /
                            Fee</th>
                        <th class="px-6 py-4 font-label-md text-on-surface-variant uppercase tracking-wider text-right">
                            Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-outline-variant/30">
                    @forelse($patients as $patient)
                        <tr class="hover:bg-surface-container-low/50 transition-colors cursor-pointer group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    @if ($patient->image)
                                        <img src="{{ asset('storage/' . $patient->image->path) }}"
                                            alt="{{ $patient->image->alt_txt ?? $patient->name }}"
                                            class="w-10 h-10 rounded-full object-cover border border-outline-variant/50">
                                    @else
                                        <div
                                            class="w-10 h-10 rounded-full bg-secondary-container/20 flex items-center justify-center text-secondary font-bold uppercase text-sm">
                                            {{ implode('', array_map(fn($word) => mb_substr($word, 0, 1), explode(' ', $patient->name))) }}
                                        </div>
                                    @endif
                                    <div class="flex flex-col">
                                        <span
                                            class="font-headline-sm text-sm text-on-surface font-semibold">{{ $patient->name }}</span>
                                        <span class="text-xs text-on-surface-variant/70">{{ $patient->email }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="px-3 py-1 {{ $patient->gender === 'female' ? 'bg-tertiary-container/10 text-tertiary' : 'bg-blue-500/10 text-blue-600' }} rounded-full text-xs font-medium capitalize">
                                    {{ $patient->gender }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span
                                        class="font-headline-sm text-sm text-on-surface font-semibold">{{ $patient->Blood_type }}</span>

                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div
                                    class="flex items-center gap-1.5 {{ $patient->diabetes ? 'text-error' : 'text-success' }}">
                                    <span
                                        class="w-2 h-2 rounded-full {{ $patient->diabetes ? 'bg-error' : 'bg-success' }}"></span>
                                    <span
                                        class="text-xs font-medium">{{ $patient->diabetes ? 'Diabetic' : 'Normal' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col">
                                    <span
                                        class="text-sm font-medium text-on-surface">{{ $patient->procedure?->name ?? 'No Procedure' }}</span>
                                    <span class="text-xs text-on-surface-variant">${{ $patient->fee ?? '0.00' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <form class='hidden' action="{{ route('dashboard.patients.destroy', $patient) }}"id='delete-{{$patient->id}}'
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button onclick="document.getElementById('delete-{{$patient->id}}').submit()" class="p-2 text-outline hover:text-primary transition-colors">
                                    <span class="material-symbols-outlined">delete</span>
                                </button>

                                <a href="{{ route('dashboard.patients.edit', $patient) }}"
                                    class="p-2 text-outline hover:text-primary transition-colors">
                                    <span class="material-symbols-outlined">edit</span>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-on-surface-variant font-medium">
                                No patients match the filter criteria.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
        <div
            class="px-6 py-4 bg-surface-container-low border-t border-outline-variant/30 flex items-center justify-between">
            <div class="w-full text-on-surface-variant">
                {{ $patients->withQueryString()->links() }}
            </div>
        </div>
    </div>
</x-layouts.main>
