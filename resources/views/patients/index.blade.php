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
    @endpush
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h2 class="font-headline-lg text-headline-lg text-on-surface">Patient Management</h2>
            <p class="text-on-surface-variant">Manage your clinical records and patient information.</p>
        </div>
        @can('create',App\models\Patient::class)
            
        <div class="flex items-center gap-3">
            <a href="{{ route('dashboard.patients.create') }}"
                class="flex items-center gap-2 px-4 py-2 bg-primary text-on-primary rounded-lg hover:bg-primary-dark transition-all">
                <span class="material-symbols-outlined">person_add</span>
                Add Patient
            </a>
        </div>
        @endcan

    </div>


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
        <a href="{{ route('dashboard.patients.export') }}"
            class="flex items-center justify-center gap-xs px-md h-12 bg-surface-container-lowest text-on-surface-variant hover:text-green-600 dark:hover:text-green-400 border border-outline-variant rounded-lg hover:bg-surface-container-low transition-all font-label-md text-label-md shadow-sm"
            title="Export to Excel">
            <span class="material-symbols-outlined text-[22px] text-green-600 dark:text-green-400">
                file_download
            </span>
            <span class="hidden sm:inline">Export Excel</span>
        </a>
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
                                            class="w-10 h-10 rounded-full object-cover border border-outline-variant/50 zoom-trigger"
                                            onclick="openImageZoom(this.src, '{{ $patient->image->alt_txt ?? $patient->name }}')">
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
                                <form class='hidden'
                                    action="{{ route('dashboard.patients.destroy', $patient) }}"id='delete-{{ $patient->id }}'
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                @if (auth()->user()->role == 'student')
                                    <a href="{{ route('dashboard.patients.show', $patient->id) }}"
                                        class="p-2 text-outline hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined">add</span>
                                    </a>
                                @else
                                    <button onclick="document.getElementById('delete-{{ $patient->id }}').submit()"
                                        class="p-2 text-outline hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>

                                    <a href="{{ route('dashboard.patients.edit', $patient) }}"
                                        class="p-2 text-outline hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined">edit</span>
                                    </a>
                                @endif

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

    <!-- Image Zoom Modal -->
    <div id="imageZoomModal" class="image-zoom-modal">
        <div class="image-zoom-content">
            <button class="image-zoom-close" onclick="closeImageZoom()">&times;</button>
            <img id="zoomImageContent" src="" alt="Zoomed patient image">
        </div>
    </div>

    <script>
        function openImageZoom(imageSrc, altText) {
            const modal = document.getElementById('imageZoomModal');
            const zoomImage = document.getElementById('zoomImageContent');
            zoomImage.src = imageSrc;
            zoomImage.alt = altText;
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeImageZoom() {
            const modal = document.getElementById('imageZoomModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside the image
        document.getElementById('imageZoomModal')?.addEventListener('click', function(event) {
            if (event.target === this) {
                closeImageZoom();
            }
        });

        // Close modal on Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeImageZoom();
            }
        });
    </script>
</x-layouts.main>
