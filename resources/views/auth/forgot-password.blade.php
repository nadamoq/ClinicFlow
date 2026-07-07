<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Reset Your Password | ClinicFlow</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
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

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9fb;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.04);
            border: 1px solid #e2e8f0;
        }
    </style>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "surface-container-highest": "#e0e3e5",
                        "secondary": "#006b5f",
                        "tertiary-container": "#6c748b",
                        "on-error-container": "#93000a",
                        "tertiary-fixed-dim": "#bec6e0",
                        "on-tertiary-fixed-variant": "#3f465c",
                        "on-primary-fixed": "#001d31",
                        "inverse-on-surface": "#eff1f3",
                        "inverse-primary": "#93ccff",
                        "on-surface-variant": "#3f4850",
                        "surface-variant": "#e0e3e5",
                        "inverse-surface": "#2d3133",
                        "error-container": "#ffdad6",
                        "on-primary-container": "#fdfcff",
                        "secondary-fixed-dim": "#4fdbc8",
                        "primary-fixed-dim": "#93ccff",
                        "surface-container-lowest": "#ffffff",
                        "outline": "#707881",
                        "on-tertiary-fixed": "#131b2e",
                        "surface-tint": "#006398",
                        "surface-bright": "#f7f9fb",
                        "surface": "#f7f9fb",
                        "tertiary": "#545c72",
                        "surface-container": "#eceef0",
                        "on-secondary-fixed-variant": "#005048",
                        "on-background": "#191c1e",
                        "on-secondary-container": "#006f64",
                        "primary": "#006194",
                        "on-secondary-fixed": "#00201c",
                        "on-surface": "#191c1e",
                        "surface-dim": "#d8dadc",
                        "on-secondary": "#ffffff",
                        "on-primary-fixed-variant": "#004b73",
                        "surface-container-high": "#e6e8ea",
                        "on-primary": "#ffffff",
                        "primary-fixed": "#cce5ff",
                        "background": "#f7f9fb",
                        "surface-container-low": "#f2f4f6",
                        "on-tertiary-container": "#fefcff",
                        "on-error": "#ffffff",
                        "secondary-container": "#6df5e1",
                        "tertiary-fixed": "#dae2fd",
                        "primary-container": "#007bb9",
                        "on-tertiary": "#ffffff",
                        "secondary-fixed": "#71f8e4",
                        "outline-variant": "#bfc7d2",
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
                        "xl": "32px",
                        "sm": "8px",
                        "container-margin": "24px",
                        "base": "4px",
                        "xs": "4px",
                        "md": "16px",
                        "gutter": "16px"
                    },
                    "fontFamily": {
                        "headline-sm": ["Inter"],
                        "headline-lg": ["Inter"],
                        "label-sm": ["Inter"],
                        "label-md": ["Inter"],
                        "headline-md": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "body-lg": ["Inter"],
                        "body-md": ["Inter"]
                    },
                    "fontSize": {
                        "headline-sm": ["18px", {
                            "lineHeight": "1.4",
                            "fontWeight": "600"
                        }],
                        "headline-lg": ["32px", {
                            "lineHeight": "1.2",
                            "letterSpacing": "-0.02em",
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
                        "headline-lg-mobile": ["24px", {
                            "lineHeight": "1.2",
                            "fontWeight": "600"
                        }],
                        "body-lg": ["16px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
                        }],
                        "body-md": ["14px", {
                            "lineHeight": "1.5",
                            "fontWeight": "400"
                        }]
                    }
                }
            }
        }
    </script>
</head>

<body
    class="bg-surface text-on-surface selection:bg-primary-fixed selection:text-on-primary-fixed min-h-screen flex flex-col items-center justify-center p-md relative overflow-hidden">
    <div class="fixed inset-0 pointer-events-none z-0 opacity-20">
        <div
            class="absolute top-[-10%] right-[-10%] w-[500px] h-[500px] bg-primary-fixed-dim rounded-full blur-[120px]">
        </div>
        <div
            class="absolute bottom-[-10%] left-[-10%] w-[400px] h-[400px] bg-secondary-fixed-dim rounded-full blur-[100px]">
        </div>
    </div>
    <main class="w-full max-w-[480px] relative z-10">
        <div class="flex justify-center mb-xl">
            <div class="flex items-center gap-sm">
                <span class="material-symbols-outlined text-primary text-[32px]"
                    style="font-variation-settings: 'FILL' 1;">medical_services</span>
                <span class="font-headline-md text-headline-md text-primary tracking-tight">ClinicFlow</span>
            </div>
        </div>
        <div class="glass-card rounded-xl p-lg md:p-xl space-y-xl">
            <div class="space-y-sm text-center">
                <h1 class="font-headline-md text-headline-md text-on-surface">Reset Your Password</h1>
                <p class="font-body-md text-body-md text-on-surface-variant max-w-[320px] mx-auto">
                    Enter the email address associated with your account and we'll send you instructions to reset your
                    password.
                </p>
            </div>
            <form class="space-y-lg" action="{{ route('password.email') }}" method="POST">
                <div class="space-y-xs">
                    @csrf
                    <label class="font-label-md text-label-md text-on-surface-variant block ml-1" for="email">Email
                        Address</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-md flex items-center pointer-events-none">
                            <span
                                class="material-symbols-outlined text-outline group-focus-within:text-primary transition-colors">mail</span>
                        </div>
                        @if ($errors->any())
                            <div class="mb-md font-body-md text-body-md text-error">
                                <ul class="list-disc pl-5">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <input
                            class="w-full pl-[44px] pr-md py-lg bg-surface-container-lowest border border-outline-variant rounded-lg font-body-md text-body-md focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all placeholder:text-outline-variant"
                            id="email" name="email" placeholder="dr.smith@clinicflow.com" required=""
                            type="email" />
                    </div>
                </div>
                <div class="pt-base">
                    <button
                        class="w-full bg-primary text-on-primary py-lg rounded-lg font-label-md text-label-md flex items-center justify-center gap-sm hover:bg-primary-container active:scale-[0.98] transition-all shadow-sm shadow-primary/20"
                        type="submit">
                        <span>Send Reset Link</span>
                        <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
                    </button>
                </div>
                <div class="flex justify-center pt-md">
                    <a class="inline-flex items-center gap-xs font-label-md text-label-md text-primary hover:text-on-primary-fixed-variant transition-colors active:opacity-70 group"
                        href="{{ route('login') }}">
                        <span
                            class="material-symbols-outlined text-[16px] group-hover:-translate-x-1 transition-transform">arrow_back</span>
                        Back to Login
                    </a>
                </div>
            </form>

        </div>
        <div class="mt-xl flex flex-col items-center gap-lg">
            <div
                class="flex flex-wrap justify-center gap-lg items-center opacity-60 grayscale hover:grayscale-0 hover:opacity-100 transition-all duration-500">
                <div class="flex items-center gap-xs">
                    <span class="material-symbols-outlined text-on-surface-variant text-[20px]">verified_user</span>
                    <span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">HIPAA
                        Compliant</span>
                </div>
                <div class="flex items-center gap-xs">
                    <span class="material-symbols-outlined text-on-surface-variant text-[20px]">lock</span>
                    <span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">SSL
                        Secured</span>
                </div>
                <div class="flex items-center gap-xs">
                    <span class="material-symbols-outlined text-on-surface-variant text-[20px]">gpp_maybe</span>
                    <span class="font-label-sm text-label-sm uppercase tracking-wider text-on-surface-variant">Encrypted
                        Storage</span>
                </div>
            </div>
            <footer class="w-full text-center">
                <p class="font-label-md text-label-md text-outline">
                    © 2024 ClinicFlow Medical Group. All rights reserved.
                </p>
                <div class="flex justify-center gap-md mt-sm">
                    <a class="font-label-md text-label-md text-outline hover:text-primary transition-colors"
                        href="#">Privacy Policy</a>
                    <span class="text-outline-variant">•</span>
                    <a class="font-label-md text-label-md text-outline hover:text-primary transition-colors"
                        href="#">Security Standards</a>
                </div>
            </footer>
        </div>
    </main>
    <div class="fixed top-0 left-0 w-full h-1 bg-primary/10">
        <div class="h-full bg-primary w-0 transition-all duration-300" id="loading-bar"></div>
    </div>

</body>

</html>
