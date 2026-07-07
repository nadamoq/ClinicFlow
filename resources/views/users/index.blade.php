<x-layouts.main title="users">
    <x-slot name='headscript'>
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        "colors": {
                            "surface-dim": "#d8dadc",
                            "surface-container-low": "#f2f4f6",
                            "on-tertiary-fixed-variant": "#3f465c",
                            "on-secondary-fixed": "#00201c",
                            "primary-container": "#007bb9",
                            "on-tertiary-container": "#fefcff",
                            "on-primary-fixed": "#001d31",
                            "on-secondary": "#ffffff",
                            "surface-container-highest": "#e0e3e5",
                            "surface-bright": "#f7f9fb",
                            "outline": "#707881",
                            "error-container": "#ffdad6",
                            "on-error-container": "#93000a",
                            "surface": "#f7f9fb",
                            "on-primary-fixed-variant": "#004b73",
                            "tertiary-container": "#6c748b",
                            "outline-variant": "#bfc7d2",
                            "background": "#f7f9fb",
                            "secondary-fixed": "#71f8e4",
                            "on-tertiary": "#ffffff",
                            "tertiary-fixed-dim": "#bec6e0",
                            "secondary-container": "#6df5e1",
                            "on-surface": "#191c1e",
                            "on-secondary-container": "#006f64",
                            "primary": "#006194",
                            "on-background": "#191c1e",
                            "on-tertiary-fixed": "#131b2e",
                            "on-secondary-fixed-variant": "#005048",
                            "on-surface-variant": "#3f4850",
                            "on-error": "#ffffff",
                            "inverse-surface": "#2d3133",
                            "on-primary": "#ffffff",
                            "surface-container-lowest": "#ffffff",
                            "surface-container": "#eceef0",
                            "secondary-fixed-dim": "#4fdbc8",
                            "surface-tint": "#006398",
                            "inverse-primary": "#93ccff",
                            "tertiary": "#545c72",
                            "secondary": "#006b5f",
                            "tertiary-fixed": "#dae2fd",
                            "primary-fixed-dim": "#93ccff",
                            "surface-variant": "#e0e3e5",
                            "primary-fixed": "#cce5ff",
                            "on-primary-container": "#fdfcff",
                            "inverse-on-surface": "#eff1f3",
                            "surface-container-high": "#e6e8ea",
                            "error": "#ba1a1a"
                        },
                        "borderRadius": {
                            "DEFAULT": "0.25rem",
                            "lg": "0.5rem",
                            "xl": "0.75rem",
                            "full": "9999px"
                        },
                        "spacing": {
                            "lg": "24px",
                            "base": "4px",
                            "md": "16px",
                            "container-margin": "24px",
                            "sm": "8px",
                            "xs": "4px",
                            "xl": "32px",
                            "gutter": "16px"
                        },
                        "fontFamily": {
                            "headline-sm": ["Inter"],
                            "headline-lg-mobile": ["Inter"],
                            "headline-lg": ["Inter"],
                            "body-lg": ["Inter"],
                            "label-sm": ["Inter"],
                            "headline-md": ["Inter"],
                            "body-md": ["Inter"],
                            "label-md": ["Inter"]
                        },
                        "fontSize": {
                            "headline-sm": ["18px", {
                                "lineHeight": "1.4",
                                "fontWeight": "600"
                            }],
                            "headline-lg-mobile": ["24px", {
                                "lineHeight": "1.2",
                                "fontWeight": "600"
                            }],
                            "headline-lg": ["32px", {
                                "lineHeight": "1.2",
                                "letterSpacing": "-0.02em",
                                "fontWeight": "600"
                            }],
                            "body-lg": ["16px", {
                                "lineHeight": "1.6",
                                "fontWeight": "400"
                            }],
                            "label-sm": ["11px", {
                                "lineHeight": "1",
                                "fontWeight": "600"
                            }],
                            "headline-md": ["24px", {
                                "lineHeight": "1.3",
                                "fontWeight": "600"
                            }],
                            "body-md": ["14px", {
                                "lineHeight": "1.5",
                                "fontWeight": "400"
                            }],
                            "label-md": ["13px", {
                                "lineHeight": "1",
                                "letterSpacing": "0.01em",
                                "fontWeight": "500"
                            }]
                        }
                    },
                },
            }
        </script>
    </x-slot>
    @push('style')
        <style>
            body {
                font-family: 'Inter', sans-serif;
                background-color: #f7f9fb;
            }

            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
                vertical-align: middle;
            }

            /* Custom scrollbar for clinical feel */
            ::-webkit-scrollbar {
                width: 6px;
            }

            ::-webkit-scrollbar-track {
                background: #f1f5f9;
            }

            ::-webkit-scrollbar-thumb {
                background: #cbd5e1;
                border-radius: 10px;
            }

            ::-webkit-scrollbar-thumb:hover {
                background: #94a3b8;
            }
        </style>
    @endpush




    <!-- Header Section -->
    <div class="flex items-end justify-between mb-xl">
        <div>
            <nav class="flex items-center gap-xs text-[11px] font-bold text-outline uppercase tracking-widest mb-xs">
                <a class="hover:text-primary" href="#">Admin</a>
                <span class="material-symbols-outlined text-[12px]">chevron_right</span>
                <span class="text-primary-container">User Management</span>
            </nav>
            <h2 class="font-headline-lg text-headline-lg text-on-surface">User Directory</h2>
            <p class="font-body-md text-body-md text-on-surface-variant mt-1">Manage, audit, and provision
                access for medical staff and administrators.</p>
        </div>
        <a href="{{ route('dashboard.users.create') }}"
            class="flex items-center gap-sm bg-primary text-on-primary px-lg py-sm rounded-lg shadow-sm hover:bg-primary-container transition-all active:scale-[0.98]">
            <span class="material-symbols-outlined text-[20px]">person_add</span>
            <span class="font-label-md text-label-md">Add New User</span>
    </a>
    </div>
    <!-- Filters Section -->
    <div class="bg-surface-container-lowest rounded-xl p-md border border-outline-variant shadow-[0px_4px_20px_rgba(0,0,0,0.04)] mb-lg">
    <div class="flex flex-wrap items-center justify-between gap-md">
        <div class="flex items-center gap-md">
            <span class="font-label-md text-label-md text-outline">Filter by Role:</span>
            <div class="flex gap-sm">
                <a href="{{ request()->fullUrlWithQuery(['role' => null]) }}"
                   class="px-md py-1.5 rounded-full border {{ !request('role') ? 'border-primary bg-primary-container/10 text-primary' : 'border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary' }} font-label-md text-label-md transition-colors">
                    All Users
                </a>

                @foreach([ 'Supervisor', 'Receptionist', 'Student'] as $role)
                    <a href="{{ request()->fullUrlWithQuery(['role' => strtolower($role)]) }}"
                       class="px-md py-1.5 rounded-full border {{ request('role') == strtolower($role) ? 'border-primary bg-primary-container/10 text-primary' : 'border-outline-variant text-on-surface-variant hover:border-primary hover:text-primary' }} font-label-md text-label-md transition-colors">
                        {{ $role }}
                    </a>
                @endforeach
            </div>
        </div>
        <div class="flex items-center gap-sm">
            <button class="flex items-center gap-xs px-md py-1.5 rounded-lg border border-outline-variant text-on-surface-variant font-label-md text-label-md hover:bg-surface-container-low transition-colors">
                <span class="material-symbols-outlined text-[18px]">filter_list</span>
                Advanced
            </button>
            <button class="flex items-center gap-xs px-md py-1.5 rounded-lg border border-outline-variant text-on-surface-variant font-label-md text-label-md hover:bg-surface-container-low transition-colors">
                <span class="material-symbols-outlined text-[18px]">file_download</span>
                Export
            </button>
        </div>
    </div>
</div>

<div class="bg-surface-container-lowest rounded-xl border border-outline-variant shadow-[0px_4px_20px_rgba(0,0,0,0.04)] overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-surface-container-low border-b border-outline-variant">
                <th class="px-lg py-md font-label-md text-label-md text-outline uppercase tracking-wider">User Name</th>
                <th class="px-lg py-md font-label-md text-label-md text-outline uppercase tracking-wider">Email Address</th>
                <th class="px-lg py-md font-label-md text-label-md text-outline tracking-wider">Role</th>
              
                <th class="px-lg py-md font-label-md text-label-md text-outline uppercase tracking-wider text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-outline-variant">
            @forelse ($users as $user)
                <tr class="hover:bg-surface-container-low/50 transition-colors group">
                    <td class="px-lg py-md">
                        <a  href="{{ $user->role !== 'admin' ? route('dashboard.users.show', $user->id) : '#' }}" class="flex items-center gap-md hover:underline decoration-primary"> 
                            <img class="w-10 h-10 rounded-full object-cover" 
                                 src="{{ $user->avatar}}" 
                                 alt="{{ $user->name }}">
                            <div>
                                <p class="font-body-md text-body-md text-on-surface font-bold group-hover:text-primary transition-colors">{{ $user->name }}</p>
                                <p class="text-[11px] text-outline">ID: {{ $user->id }}</p>
                            </div>
                        </a>
                    </td>
                    <td class="px-lg py-md">
                        <p class="font-body-md text-body-md text-on-surface-variant">{{ $user->email }}</p>
                    </td>
                    <td class="px-lg py-md">
                        <span class="font-label-md text-label-md text-primary bg-primary-container/10 px-2 py-1 rounded-full uppercase text-[11px]">
                            {{ $user->role }}
                        </span>
                    </td>
                 
                    <td class="px-lg py-md text-right">
                        <form action="{{route('dashboard.users.destroy', $user->id)}}" method="POST" id="delete-{{ $user->id }}">
                            @csrf
                            @method('DELETE')
                        </form>
                        <button onclick="document.getElementById('delete-{{ $user->id }}').submit()" class="p-1 hover:bg-surface-container-high rounded transition-colors text-outline hover:text-primary">
                            <span class="material-symbols-outlined text-[20px]">delete</span>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-lg py-xl text-center text-outline">No users found for this role.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
        <!-- Pagination Section -->
        <div
            class="px-lg py-md bg-surface-container-low flex items-center justify-between border-t border-outline-variant">
            {{$users->withQueryString()->links()}}
        </div>
    </div>



</x-layouts.main>
