<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Create New Password | ClinicFlow</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;display=swap" rel="stylesheet" />
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
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }

        .tonal-shadow {
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>

<body class="bg-background text-on-surface min-h-screen flex flex-col">
    <!-- TopAppBar Mapping -->
    <header class="bg-surface-container-lowest w-full top-0 sticky border-b border-outline-variant shadow-sm z-50">
        <nav class="flex justify-between items-center px-container-margin py-md max-w-[1440px] mx-auto">
            <div class="flex items-center gap-sm">
                <span class="material-symbols-outlined text-primary"
                    style="font-variation-settings: 'FILL' 1;">medical_services</span>
                <h1 class="text-headline-md font-headline-md text-primary">ClinicFlow</h1>
            </div>
            <!-- Navigation Shell Suppression: Transactional Screen (Create Password) -->
            <!-- We only show branding/back option to maintain focus -->
            <div class="flex items-center gap-md">
                <a class="font-label-md text-label-md text-on-surface-variant hover:text-primary transition-colors flex items-center gap-xs cursor-pointer"
                    href="#">
                    <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                    Back to Login
                </a>
            </div>
        </nav>
    </header>
    <main class="flex-grow flex items-center justify-center px-container-margin py-xl relative overflow-hidden">
        <!-- Atmospheric Background Element -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-4xl opacity-20 pointer-events-none">
            <div
                class="w-full h-[500px] bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-primary/30 via-transparent to-transparent blur-3xl">
            </div>
        </div>
        <div
            class="w-full max-w-[480px] bg-surface-container-lowest border border-outline-variant p-lg md:p-xl rounded-xl tonal-shadow relative z-10">
            <!-- Header Section -->
            <div class="mb-xl text-center md:text-left">
                <div class="inline-flex items-center justify-center w-12 h-12 bg-primary-fixed rounded-lg mb-md">
                    <span class="material-symbols-outlined text-on-primary-fixed text-[24px]"
                        style="font-variation-settings: 'FILL' 0;">lock_reset</span>
                </div>
                <h2
                    class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface mb-sm">
                    Create New Password</h2>
                <p class="font-body-md text-body-md text-on-surface-variant">Please enter your new password below.
                    Ensure it is at least 12 characters and includes a mix of symbols and numbers.</p>
            </div>
            <!-- Form Section -->
            @if ($errors->any())
                <div class="bg-error-container-lowest border border-error text-error p-md rounded-lg mb-lg">
                    <ul class="list-disc pl-lg">
                        @foreach ($errors->all() as $error)
                            <li class="font-body-md">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="space-y-lg" id="resetForm" action="{{route('password.update')}}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <input type="hidden" name="email" value="{{ $request->email }}">
                <!-- New Password Field -->
                <div class="space-y-base">
                    <label class="font-label-md text-label-md text-on-surface-variant block" for="new_password">New
                        Password</label>
                    <div class="relative">
                        <input
                            class="w-full px-md py-sm rounded border border-outline-variant bg-surface-container-lowest text-on-surface font-body-md text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all pr-12"
                            id="new_password" name="password" placeholder="••••••••••••" type="password" />
                        <button 
                            class="absolute right-md top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-primary transition-colors"
                            onclick="toggleVisibility('new_password', this)" type="button">
                            <span class="material-symbols-outlined text-[20px]" id="icon_new_password">visibility</span>
                        </button>
                    </div>
                </div>
                <!-- Confirm Password Field -->
                <div class="space-y-base">
                    <label class="font-label-md text-label-md text-on-surface-variant block"
                        for="confirm_password">Confirm New Password</label>
                    <div class="relative">
                        <input name="password_confirmation"
                            class="w-full px-md py-sm rounded border border-outline-variant bg-surface-container-lowest text-on-surface font-body-md text-body-md focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all pr-12"
                            id="confirm_password" placeholder="••••••••••••" type="password" />
                        <button
                            class="absolute right-md top-1/2 -translate-y-1/2 text-on-surface-variant hover:text-primary transition-colors"
                            onclick="toggleVisibility('confirm_password', this)" type="button">
                            <span class="material-symbols-outlined text-[20px]"
                                id="icon_confirm_password">visibility</span>
                        </button>
                    </div>
                </div>
                <!-- Password Requirements Checklist -->
                <div class="bg-surface-container-low p-md rounded-lg space-y-sm">
                    <p class="font-label-md text-label-md text-on-surface-variant uppercase tracking-wider mb-xs">
                        Security Requirements</p>
                    <div class="flex items-center gap-sm">
                        <span class="material-symbols-outlined text-[16px] text-outline" id="req-length">circle</span>
                        <span class="font-body-md text-body-md text-on-surface-variant">At least 12 characters</span>
                    </div>
                    <div class="flex items-center gap-sm">
                        <span class="material-symbols-outlined text-[16px] text-outline" id="req-mix">circle</span>
                        <span class="font-body-md text-body-md text-on-surface-variant">Mix of symbols and
                            numbers</span>
                    </div>
                    <div class="flex items-center gap-sm">
                        <span class="material-symbols-outlined text-[16px] text-outline" id="req-match">circle</span>
                        <span class="font-body-md text-body-md text-on-surface-variant">Passwords must match</span>
                    </div>
                    <!-- Strength Indicator -->
                    <div class="pt-sm">
                        <div class="flex justify-between mb-xs">
                            <span class="font-label-md text-label-md text-on-surface-variant">Password Strength</span>
                            <span class="font-label-md text-label-md text-outline" id="strength-text">Weak</span>
                        </div>
                        <div class="h-1.5 w-full bg-surface-container-highest rounded-full overflow-hidden">
                            <div class="h-full bg-error transition-all duration-500 w-[10%]" id="strength-bar"></div>
                        </div>
                    </div>
                </div>
                <!-- Primary Action -->
                <button
                    class="w-full bg-primary text-on-primary font-label-md text-label-md py-md rounded-lg hover:bg-primary-container hover:shadow-md active:opacity-80 transition-all duration-200 uppercase tracking-wide"
                    type="submit">
                    Reset Password
                </button>
            </form>
            <div class="mt-xl pt-lg border-t border-outline-variant flex justify-center">
                <div class="flex items-center gap-sm">
                    <div class="w-10 h-10 rounded-full bg-cover bg-center border border-outline-variant"
                        data-alt="A macro photograph of professional medical equipment with soft studio lighting. The aesthetic is clean, sterile, and high-end, featuring brushed metal textures and a clinical blue and white color palette to evoke trust and precision in a modern healthcare environment."
                        style="background-image: url('https://lh3.googleusercontent.com/aida-public/AB6AXuCPVspII_5zF72RTo-_TypX5GNw04xRsgVy0czCY_iDaOOYohp3BRXuYT0wDuTN0_XbKKV8J5OjCn8ZGvZdRxLgGAwJHiHhhJvcnoRZCyD2nib_tLSE9tN0TDO0npH6CVJCneagasjJHxKbZiv61ja3b6XB_ARvXXYwbABIAcIn0_F0oCywTQ04i49QEdryqP7T7nd8nr69Cfi_4nuEjCq3CdJxrpeXVl36kKWV3tarY2OEWqsN_ax1')">
                    </div>
                    <div>
                        <p class="font-label-md text-label-md text-on-surface">Secure Clinical Portal</p>
                        <p class="font-label-sm text-label-sm text-on-surface-variant">Encrypted by ClinicFlow Security
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer Component -->
    <footer class="bg-surface-container w-full mt-xl">
        <div
            class="flex flex-col md:flex-row justify-between items-center px-container-margin py-xl gap-md max-w-[1440px] mx-auto">
            <div class="flex flex-col gap-xs text-center md:text-left">
                <span class="text-headline-sm font-headline-sm text-primary">ClinicFlow</span>
                <p class="font-label-md text-label-md text-on-surface-variant">© 2024 ClinicFlow Medical Group. All
                    rights reserved.</p>
            </div>
            <div class="flex flex-wrap justify-center gap-lg">
                <a class="font-label-md text-label-md text-on-surface-variant hover:underline hover:text-primary transition-all duration-200"
                    href="#">Privacy Policy</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:underline hover:text-primary transition-all duration-200"
                    href="#">Terms of Service</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:underline hover:text-primary transition-all duration-200"
                    href="#">Accreditation</a>
                <a class="font-label-md text-label-md text-on-surface-variant hover:underline hover:text-primary transition-all duration-200"
                    href="#">Contact Us</a>
            </div>
        </div>
    </footer>
    <script>
        function toggleVisibility(fieldId, btn) {
            const field = document.getElementById(fieldId);
            const icon = document.getElementById('icon_' + fieldId);
            if (field.type === 'password') {
                field.type = 'text';
                icon.textContent = 'visibility_off';
            } else {
                field.type = 'password';
                icon.textContent = 'visibility';
            }
        }

        const newPass = document.getElementById('new_password');
        const confirmPass = document.getElementById('confirm_password');
        const strengthBar = document.getElementById('strength-bar');
        const strengthText = document.getElementById('strength-text');

        const reqLength = document.getElementById('req-length');
        const reqMix = document.getElementById('req-mix');
        const reqMatch = document.getElementById('req-match');

        function updateChecklist() {
            const val = newPass.value;
            const confirmVal = confirmPass.value;

            // Length check
            if (val.length >= 12) {
                reqLength.textContent = 'check_circle';
                reqLength.className = 'material-symbols-outlined text-[16px] text-secondary';
            } else {
                reqLength.textContent = 'circle';
                reqLength.className = 'material-symbols-outlined text-[16px] text-outline';
            }

            // Mix check (numbers and symbols)
            const hasNum = /\d/.test(val);
            const hasSym = /[!@#$%^&*(),.?":{}|<>]/.test(val);
            if (hasNum && hasSym) {
                reqMix.textContent = 'check_circle';
                reqMix.className = 'material-symbols-outlined text-[16px] text-secondary';
            } else {
                reqMix.textContent = 'circle';
                reqMix.className = 'material-symbols-outlined text-[16px] text-outline';
            }

            // Match check
            if (val === confirmVal && val !== '') {
                reqMatch.textContent = 'check_circle';
                reqMatch.className = 'material-symbols-outlined text-[16px] text-secondary';
            } else {
                reqMatch.textContent = 'circle';
                reqMatch.className = 'material-symbols-outlined text-[16px] text-outline';
            }

            // Strength calculation
            let strength = 0;
            if (val.length > 0) strength += 20;
            if (val.length >= 8) strength += 20;
            if (val.length >= 12) strength += 20;
            if (hasNum) strength += 20;
            if (hasSym) strength += 20;

            strengthBar.style.width = strength + '%';

            if (strength <= 40) {
                strengthBar.className = 'h-full bg-error transition-all duration-500';
                strengthText.textContent = 'Weak';
                strengthText.className = 'font-label-md text-label-md text-error';
            } else if (strength <= 80) {
                strengthBar.className = 'h-full bg-amber-500 transition-all duration-500';
                strengthText.textContent = 'Moderate';
                strengthText.className = 'font-label-md text-label-md text-amber-500';
            } else {
                strengthBar.className = 'h-full bg-secondary transition-all duration-500';
                strengthText.textContent = 'Strong';
                strengthText.className = 'font-label-md text-label-md text-secondary';
            }
        }

        newPass.addEventListener('input', updateChecklist);
        confirmPass.addEventListener('input', updateChecklist);
    </script>
</body>

</html>
