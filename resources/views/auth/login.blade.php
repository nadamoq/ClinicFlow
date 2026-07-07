<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>ClinicFlow | Secure Login</title>
    <!-- Google Fonts: Inter & Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <!-- Theme Configuration -->
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
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        body {
            font-family: 'Inter', sans-serif;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
        }

        .animate-float {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .bg-mesh {
            background-color: #f7f9fb;
            background-image:
                radial-gradient(at 0% 0%, rgba(0, 97, 148, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 0%, rgba(0, 107, 95, 0.05) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(0, 97, 148, 0.05) 0px, transparent 50%),
                radial-gradient(at 0% 100%, rgba(0, 107, 95, 0.05) 0px, transparent 50%);
        }
    </style>
</head>

<body
    class="bg-mesh text-on-surface min-h-screen flex items-center justify-center p-md md:p-xl overflow-x-hidden relative">
    <!-- Decorative Background Elements (Desktop Only) -->
    <div class="hidden lg:block absolute inset-0 z-0 overflow-hidden pointer-events-none">
        <div class="absolute top-[-10%] right-[-5%] w-[40%] h-[40%] rounded-full bg-primary/5 blur-[120px]"></div>
        <div class="absolute bottom-[-10%] left-[-5%] w-[40%] h-[40%] rounded-full bg-secondary/5 blur-[120px]"></div>
    </div>
    <!-- Main Login Container (Side-by-Side Desktop Layout) -->
    <main
        class="w-full max-w-[1000px] grid lg:grid-cols-2 rounded-2xl overflow-hidden shadow-2xl bg-surface-container-lowest z-10 border border-outline-variant/30 transition-all duration-500 hover:shadow-primary/10">
        <!-- Branding & Illustration Side (Left) -->
        <div class="hidden lg:flex flex-col justify-between p-xl bg-primary-container relative overflow-hidden">
            <!-- Abstract Decoration -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-20 -mt-20 blur-3xl"></div>
            <div
                class="absolute bottom-0 left-0 w-48 h-48 bg-secondary-container/20 rounded-full -ml-16 -mb-16 blur-2xl">
            </div>
            <div class="relative z-20">
                <div class="flex items-center gap-sm mb-lg">
                    <span class="material-symbols-outlined text-[36px] text-on-primary-container"
                        style="font-variation-settings: 'FILL' 1;">medical_services</span>
                    <h1 class="font-headline-md text-headline-md text-on-primary-container font-bold tracking-tight">
                        ClinicFlow</h1>
                </div>
                <div class="space-y-md">
                    <h2 class="font-headline-lg text-headline-lg text-on-primary-container leading-tight">Precision
                        Healthcare Management.</h2>
                    <p class="font-body-lg text-body-lg text-white/80 max-w-md">Streamline patient care, appointments,
                        and medical records with our secure, HIPAA-compliant clinical workspace.</p>
                </div>
            </div>
            <!-- Desktop Illustration -->
            <div class="relative z-20 mt-xl flex justify-center flex-1 items-center">
                <div class="w-full max-w-[320px] aspect-square relative animate-float">
                    <div class="absolute inset-0 flex items-center justify-center">
                        <div class="w-full h-full rounded-2xl bg-cover bg-center shadow-2xl border-4 border-white/10"
                            data-alt="Modern medical dashboard visualization"
                            style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuBYzgJcjkmunEjaWluNJqefdMhJuo4dthKhaGKcshTs0NjP4wrDJ2VaxxXDPOMFwdd2RTRfsNFvYVdvNhkLMb94B-8b-xjqpVnNcbb0sVhWQtF7pPZ52TFsG2V70W9-jF4JnEsrs0dRtZgguyrohFZka-VXuO8eibItMrMoxGwFe25zPKGvkq3wrwUknJvRUU7wq_ScSZ6dynPJRNhKA-Xn6FlXSA5fcoGmCbzhpj5Ric4WDz7ehnZc')">
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative z-20 pt-lg border-t border-white/15">
                <div class="flex items-center gap-md">
                    <div class="flex -space-x-3">
                        <div
                            class="w-8 h-8 rounded-full border-2 border-primary-container bg-surface-variant flex items-center justify-center overflow-hidden">
                            <span class="text-[10px] font-bold">DR</span></div>
                        <div
                            class="w-8 h-8 rounded-full border-2 border-primary-container bg-secondary-container flex items-center justify-center overflow-hidden">
                            <span class="text-[10px] font-bold">SM</span></div>
                        <div
                            class="w-8 h-8 rounded-full border-2 border-primary-container bg-tertiary-container flex items-center justify-center overflow-hidden">
                            <span class="text-[10px] font-bold">+2k</span></div>
                    </div>
                    <p class="font-label-sm text-label-sm text-white/70">Trusted by over 2,500 clinics worldwide.</p>
                </div>
            </div>
        </div>
        <!-- Form Side (Right) -->
        <div class="p-lg md:p-xl lg:p-24 flex flex-col justify-center bg-white">
            <div class="max-w-[420px] mx-auto w-full">
                <!-- Mobile/Tablet Branding (Only visible when Left side is hidden) -->
                <div class="lg:hidden flex items-center gap-sm mb-xl">
                    <span class="material-symbols-outlined text-[32px] text-primary"
                        style="font-variation-settings: 'FILL' 1;">medical_services</span>
                    <h1 class="font-headline-md text-headline-md text-primary font-bold">ClinicFlow</h1>
                </div>
                <header class="mb-xl">
                    <h2 class="font-headline-lg text-headline-lg text-on-surface mb-xs">Welcome Back</h2>
                    <p class="font-body-md text-body-md text-on-surface-variant">Sign in to your professional workspace.
                    </p>
                </header>
                @if (session('status'))
                <div class="mb-md font-body-md text-body-md text-on-surface-variant">
                    {{ session('status') }}
                </div>
                @endif
                @if ($errors->any())
                <div class="mb-md font-body-md text-body-md text-error">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form class="space-y-lg" id="login" method="Post"action="{{ route('login') }}">
                    <!-- Email Input -->
                    @csrf
                    <div class="space-y-xs">
                        <label class="font-label-md text-label-md text-on-surface-variant flex items-center gap-xs"
                            for="email">
                            <span class="material-symbols-outlined text-[18px]">alternate_email</span>
                            Email
                        </label>
                        <input name="{{config('fortify.username')}}"
                            class="w-full px-md py-3.5 rounded-lg border border-outline-variant bg-surface text-on-surface focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all duration-200 font-body-md placeholder:text-outline"
                            id="email" placeholder="dr.smith@clinicflow.com"  type="email" />
                    </div>
                    <!-- Password Input -->
                    <div class="space-y-xs">
                        <div class="flex justify-between items-center">
                            <label class="font-label-md text-label-md text-on-surface-variant flex items-center gap-xs"
                                for="password">
                                <span class="material-symbols-outlined text-[18px]">lock</span>
                                Password
                            </label>
                            <a  class="font-label-md text-label-md text-primary hover:text-primary-container font-semibold transition-all"
                                href="{{ route('password.request') }}">Forgot password?</a>
                        </div>
                        <div class="relative">
                            <input name="password"
                                class="w-full px-md py-3.5 rounded-lg border border-outline-variant bg-surface text-on-surface focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none transition-all duration-200 font-body-md placeholder:text-outline"
                                id="password" placeholder="••••••••••••"  type="password" />
                            <button
                                class="absolute right-md top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-primary transition-colors p-1"
                                onclick="togglePassword()" type="button">
                                <span class="material-symbols-outlined text-[20px]" id="eyeIcon">visibility</span>
                            </button>
                        </div>
                    </div>
                    <!-- Remember Me -->
                    <div class="flex items-center gap-sm">
                        <input
                            class="w-4 h-4 rounded border-outline-variant text-primary focus:ring-primary cursor-pointer transition-colors"
                            id="remember" type="checkbox" />
                        <label class="font-body-md text-body-md text-on-surface-variant cursor-pointer select-none"
                            for="remember">Remember this device for 30 days</label>
                    </div>
                    <!-- Primary Action -->
                    <button 
                        class="w-full bg-primary hover:bg-primary-container text-on-primary font-label-md text-[16px] py-4 rounded-lg shadow-lg shadow-primary/20 hover:shadow-primary/30 active:scale-[0.99] transition-all flex items-center justify-center gap-sm group"
                        type="submit">
                        Sign In
                        <span
                            class="material-symbols-outlined text-[20px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                    </button>
                </form>
                <!-- Footer Info -->
                <footer class="mt-xl text-center">
                    <p class="font-body-md text-body-md text-on-surface-variant">
                        Don't have an account?
                        <a class="text-primary font-bold hover:underline" href="#">Contact Administrator</a>
                    </p>
                    <div class="mt-xl grid grid-cols-2 gap-sm pt-lg border-t border-surface-container">
                        <div class="flex items-center justify-center gap-xs text-on-surface-variant/70">
                            <span class="material-symbols-outlined text-[16px]"
                                style="font-variation-settings: 'FILL' 1;">verified_user</span>
                            <span class="font-label-sm text-[10px] uppercase tracking-widest font-bold">HIPAA
                                Compliant</span>
                        </div>
                        <div class="flex items-center justify-center gap-xs text-on-surface-variant/70">
                            <span class="material-symbols-outlined text-[16px]"
                                style="font-variation-settings: 'FILL' 1;">enhanced_encryption</span>
                            <span class="font-label-sm text-[10px] uppercase tracking-widest font-bold">256-bit
                                AES</span>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </main>
    <!-- Scripts -->
    <script>
        function togglePassword() {
            const pwd = document.getElementById('password');
            const icon = document.getElementById('eyeIcon');
            if (pwd.type === 'password') {
                pwd.type = 'text';
                icon.innerText = 'visibility_off';
            } else {
                pwd.type = 'password';
                icon.innerText = 'visibility';
            }
        }

        const form = document.getElementById('loginForm');
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const btn = e.target.querySelector('button[type="submit"]');
            const originalContent = btn.innerHTML;

            btn.disabled = true;
            btn.innerHTML = `
            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="ml-2">Verifying Credentials...</span>
        `;

            setTimeout(() => {
                btn.innerHTML = `
                <span class="material-symbols-outlined text-[20px]">check_circle</span>
                <span class="ml-2">Authenticated</span>
            `;
                btn.classList.replace('bg-primary', 'bg-secondary');

                setTimeout(() => {
                    document.body.style.opacity = '0';
                    document.body.style.transition = 'opacity 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                }, 800);
            }, 1500);
        });

        // Subtle parallax mouse effect for the desktop container
        if (window.innerWidth > 1024) {
            document.addEventListener('mousemove', (e) => {
                const x = (e.clientX / window.innerWidth) - 0.5;
                const y = (e.clientY / window.innerHeight) - 0.5;
                const container = document.querySelector('main');
                container.style.transform =
                    `perspective(2000px) rotateY(${x * 1.5}deg) rotateX(${-y * 1.5}deg) translateY(${y * 5}px)`;
            });
        }
    </script>
</body>

</html>
