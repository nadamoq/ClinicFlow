<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>ClinicFlow : {{ $title  }}</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "tertiary": "#545c72",
                        "on-error": "#ffffff",
                        "secondary-container": "#6df5e1",
                        "surface-container": "#eceef0",
                        "on-secondary-fixed-variant": "#005048",
                        "surface-container-lowest": "#ffffff",
                        "on-primary-fixed-variant": "#004b73",
                        "inverse-primary": "#93ccff",
                        "outline": "#707881",
                        "on-tertiary-fixed": "#131b2e",
                        "secondary-fixed-dim": "#4fdbc8",
                        "primary-container": "#007bb9",
                        "surface-bright": "#f7f9fb",
                        "surface-variant": "#e0e3e5",
                        "on-tertiary-fixed-variant": "#3f465c",
                        "error-container": "#ffdad6",
                        "tertiary-container": "#6c748b",
                        "tertiary-fixed": "#dae2fd",
                        "on-tertiary-container": "#fefcff",
                        "secondary": "#006b5f",
                        "on-secondary-fixed": "#00201c",
                        "surface-container-high": "#e6e8ea",
                        "on-secondary": "#ffffff",
                        "on-error-container": "#93000a",
                        "on-background": "#191c1e",
                        "on-primary-container": "#fdfcff",
                        "secondary-fixed": "#71f8e4",
                        "primary": "#006194",
                        "surface-dim": "#d8dadc",
                        "tertiary-fixed-dim": "#bec6e0",
                        "outline-variant": "#bfc7d2",
                        "primary-fixed-dim": "#93ccff",
                        "on-surface-variant": "#3f4850",
                        "on-tertiary": "#ffffff",
                        "surface-container-highest": "#e0e3e5",
                        "primary-fixed": "#cce5ff",
                        "error": "#ba1a1a",
                        "background": "#f7f9fb",
                        "inverse-surface": "#2d3133",
                        "surface-tint": "#006398",
                        "on-primary-fixed": "#001d31",
                        "on-secondary-container": "#006f64",
                        "on-surface": "#191c1e",
                        "surface-container-low": "#f2f4f6",
                        "inverse-on-surface": "#eff1f3",
                        "on-primary": "#ffffff",
                        "surface": "#f7f9fb"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "xl": "32px",
                        "gutter": "16px",
                        "sm": "8px",
                        "lg": "24px",
                        "base": "4px",
                        "xs": "4px",
                        "container-margin": "24px",
                        "md": "16px"
                    },
                    "fontFamily": {
                        "label-sm": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "headline-sm": ["Inter"],
                        "headline-md": ["Inter"],
                        "label-md": ["Inter"],
                        "body-md": ["Inter"],
                        "headline-lg": ["Inter"],
                        "body-lg": ["Inter"]
                    },
                    "fontSize": {
                        "label-sm": ["11px", {
                            "lineHeight": "1",
                            "fontWeight": "600"
                        }],
                        "headline-lg-mobile": ["24px", {
                            "lineHeight": "1.2",
                            "fontWeight": "600"
                        }],
                        "headline-sm": ["18px", {
                            "lineHeight": "1.4",
                            "fontWeight": "600"
                        }],
                        "headline-md": ["24px", {
                            "lineHeight": "1.3",
                            "fontWeight": "600"
                        }],
                        "label-md": ["13px", {
                            "lineHeight": "1",
                            "letterSpacing": "0.01em",
                            "fontWeight": "500"
                        }],
                        "body-md": ["14px", {
                            "lineHeight": "1.5",
                            "fontWeight": "400"
                        }],
                        "headline-lg": ["32px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.02em",
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
            /* Theme Level 0 Background */
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(8px);
        }

        .form-shadow {
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.04);
        }
    </style>
    @stack('style')
    {{$headscript??""}}
</head>

<body class="bg-background text-on-surface">
    <!-- TopAppBar -->
    <header
        class="fixed top-0 w-full z-50 bg-surface dark:bg-inverse-surface text-primary dark:text-primary-fixed-dim shadow-sm border-b border-outline-variant dark:border-outline flex justify-between items-center px-container-margin h-16">
        <div class="flex items-center gap-4">
            <span
                class="font-headline-md text-headline-md text-primary dark:text-primary-fixed-dim font-bold">ClinicFlow</span>
        </div>
        <div class="flex items-center gap-md">
            <div class="relative hidden md:flex items-center">
                <span class="material-symbols-outlined absolute left-3 text-on-surface-variant">search</span>
                <input
                    class="pl-10 pr-4 py-2 bg-surface-container border border-outline-variant rounded-lg text-body-md focus:ring-2 focus:ring-primary focus:outline-none w-64"
                    placeholder="Search patients..." type="text" />
            </div>
            <button
                class="p-2 rounded-full hover:bg-surface-container dark:hover:bg-on-surface-variant transition-colors active:scale-95">
                <span class="material-symbols-outlined text-on-surface-variant">notifications</span>
            </button>
            <div class="h-8 w-8 rounded-full bg-primary-container overflow-hidden border border-outline-variant">
                <img class="w-full h-full object-cover"
                    data-alt="A professional headshot of a female clinic administrator with a warm smile, wearing a modern blue medical uniform in a bright, clean clinic environment. High-key lighting, minimalist background, clinical precision aesthetic."
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuAN3mGPWxz5wsLJIfzBjECz5iXMqFdSG6ACo6p-c6EYF1YuFa4WSaDx6miS5eIQ38TeRlFnOYaDH93ApJ2cnRNSjBjcYEnTlH8CDvCBwTYItfPTBwbyrCU1BoADMFTXJs-IABbSzy3MIYCvW_yBrip7nJI9dpZQgUyBtk7pOO35BcCE7Xmn0TU8diXKDblZILXOq3rs1FKmx71vx7WAzRoTzNMkLw5SYcQ_-Fo9N19jY0Jeyf7RhMDE" />
            </div>
        </div>
    </header>
    <div class="flex h-screen pt-16">
        <!-- NavigationDrawer -->
        <aside
            class="h-full w-60 fixed left-0 top-16 bg-surface dark:bg-inverse-surface border-r border-outline-variant dark:border-outline hidden md:flex flex-col py-lg">
            <!-- Profile Header -->
            <div class="px-6 pb-6 mb-6 border-b border-outline-variant/30">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 rounded-full bg-primary/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary">person</span>
                    </div>
                    <div>
                        <p class="font-label-md text-label-md text-primary font-bold">{{ auth()->user()->name }}</p>
                        <p class="text-[11px] text-on-surface-variant">{{ auth()->user()->role }}</p>
                    </div>
                </div>
            </div>
            <!-- Nav Items -->
            <nav class="flex-1 space-y-1">
                <a class="flex items-center px-6 py-3 text-on-surface-variant dark:text-surface-variant font-label-md text-label-md hover:bg-surface-container-low transition-all duration-200"
                    href="#">
                    <span class="material-symbols-outlined mr-3">dashboard</span> Dashboard
                </a>
                <a class="flex items-center px-6 py-3 text-primary dark:text-primary-fixed-dim border-l-4 border-primary font-bold bg-primary-container/10 font-label-md text-label-md transition-all duration-200"
                    href="#">
                    <span class="material-symbols-outlined mr-3">person</span> Patients
                </a>
                <a class="flex items-center px-6 py-3 text-on-surface-variant dark:text-surface-variant font-label-md text-label-md hover:bg-surface-container-low transition-all duration-200"
                    href="#">
                    <span class="material-symbols-outlined mr-3">medical_services</span> Doctors
                </a>
                <a class="flex items-center px-6 py-3 text-on-surface-variant dark:text-surface-variant font-label-md text-label-md hover:bg-surface-container-low transition-all duration-200"
                    href="#">
                    <span class="material-symbols-outlined mr-3">list_alt</span> Procedures
                </a>
                <a class="flex items-center px-6 py-3 text-on-surface-variant dark:text-surface-variant font-label-md text-label-md hover:bg-surface-container-low transition-all duration-200"
                    href="#">
                    <span class="material-symbols-outlined mr-3">calendar_month</span> Appointments
                </a>
                <a class="flex items-center px-6 py-3 text-on-surface-variant dark:text-surface-variant font-label-md text-label-md hover:bg-surface-container-low transition-all duration-200"
                    href="#">
                    <span class="material-symbols-outlined mr-3">assignment</span> Evaluations
                </a>
                <a class="flex items-center px-6 py-3 text-on-surface-variant dark:text-surface-variant font-label-md text-label-md hover:bg-surface-container-low transition-all duration-200"
                    href="#">
                    <span class="material-symbols-outlined mr-3">notifications</span> Notifications
                </a>
                <a class="flex items-center px-6 py-3 text-on-surface-variant dark:text-surface-variant font-label-md text-label-md hover:bg-surface-container-low transition-all duration-200"
                    href="#">
                    <span class="material-symbols-outlined mr-3">settings</span> Settings
                </a>
            </nav>
        </aside>
        <!-- Main Content Area -->
        <main class="flex-1 ml-0 md:ml-60 bg-background overflow-y-auto px-gutter py-xl md:px-xl">
            {{$slot}}
        </main>
    </div>
    <!-- Mobile Navigation (BottomNavBar) -->
    <nav
        class="md:hidden fixed bottom-0 left-0 w-full flex justify-around items-center px-4 py-2 bg-surface dark:bg-inverse-surface border-t border-outline-variant dark:border-outline shadow-lg z-50 rounded-t-xl">
        <a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-surface-variant"
            href="#">
            <span class="material-symbols-outlined">home</span>
            <span class="font-label-sm text-label-sm-mobile">Home</span>
        </a>
        <a class="flex flex-col items-center justify-center bg-secondary-container dark:bg-secondary text-on-secondary-container dark:text-on-secondary rounded-full px-4 py-1"
            href="#">
            <span class="material-symbols-outlined">group</span>
            <span class="font-label-sm text-label-sm-mobile">Patients</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-surface-variant"
            href="#">
            <span class="material-symbols-outlined">event</span>
            <span class="font-label-sm text-label-sm-mobile">Calendar</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-surface-variant"
            href="#">
            <span class="material-symbols-outlined">medical_information</span>
            <span class="font-label-sm text-label-sm-mobile">Procedures</span>
        </a>
        <a class="flex flex-col items-center justify-center text-on-surface-variant dark:text-surface-variant"
            href="#">
            <span class="material-symbols-outlined">menu</span>
            <span class="font-label-sm text-label-sm-mobile">Menu</span>
        </a>
    </nav>
   @stack('script')
</body>

</html>
