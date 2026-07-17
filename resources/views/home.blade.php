<!DOCTYPE html>

<html class="light" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>ClinicFlow | Modern Healthcare Managed with Precision</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "surface-variant": "#e0e3e5",
                        "outline": "#707881",
                        "on-tertiary-container": "#fefcff",
                        "inverse-primary": "#93ccff",
                        "tertiary-fixed": "#dae2fd",
                        "surface-container-highest": "#e0e3e5",
                        "secondary": "#006b5f",
                        "primary-fixed-dim": "#93ccff",
                        "on-background": "#191c1e",
                        "on-secondary-fixed-variant": "#005048",
                        "inverse-on-surface": "#eff1f3",
                        "primary-fixed": "#cce5ff",
                        "on-secondary": "#ffffff",
                        "on-primary": "#ffffff",
                        "surface-container": "#eceef0",
                        "secondary-fixed": "#71f8e4",
                        "on-surface-variant": "#3f4850",
                        "on-secondary-fixed": "#00201c",
                        "primary-container": "#007bb9",
                        "tertiary-fixed-dim": "#bec6e0",
                        "on-primary-container": "#fdfcff",
                        "tertiary-container": "#6c748b",
                        "on-error-container": "#93000a",
                        "secondary-fixed-dim": "#4fdbc8",
                        "on-surface": "#191c1e",
                        "on-primary-fixed": "#001d31",
                        "surface-container-high": "#e6e8ea",
                        "surface-container-lowest": "#ffffff",
                        "tertiary": "#545c72",
                        "inverse-surface": "#2d3133",
                        "on-primary-fixed-variant": "#004b73",
                        "error-container": "#ffdad6",
                        "background": "#f7f9fb",
                        "secondary-container": "#6df5e1",
                        "outline-variant": "#bfc7d2",
                        "on-tertiary-fixed": "#131b2e",
                        "on-tertiary": "#ffffff",
                        "surface-tint": "#006398",
                        "surface-dim": "#d8dadc",
                        "surface-bright": "#f7f9fb",
                        "on-secondary-container": "#006f64",
                        "surface-container-low": "#f2f4f6",
                        "on-tertiary-fixed-variant": "#3f465c",
                        "error": "#ba1a1a",
                        "surface": "#f7f9fb",
                        "primary": "#006194",
                        "on-error": "#ffffff"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.25rem",
                        "lg": "0.5rem",
                        "xl": "0.75rem",
                        "full": "9999px"
                    },
                    "spacing": {
                        "sm": "8px",
                        "lg": "24px",
                        "xs": "4px",
                        "gutter": "16px",
                        "container-margin": "24px",
                        "xl": "32px",
                        "md": "16px",
                        "base": "4px"
                    },
                    "fontFamily": {
                        "label-sm": ["Inter"],
                        "body-lg": ["Inter"],
                        "headline-lg-mobile": ["Inter"],
                        "headline-lg": ["Inter"],
                        "body-md": ["Inter"],
                        "headline-sm": ["Inter"],
                        "headline-md": ["Inter"],
                        "label-md": ["Inter"]
                    },
                    "fontSize": {
                        "label-sm": ["11px", {
                            "lineHeight": "1",
                            "fontWeight": "600"
                        }],
                        "body-lg": ["16px", {
                            "lineHeight": "1.6",
                            "fontWeight": "400"
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
                        "body-md": ["14px", {
                            "lineHeight": "1.5",
                            "fontWeight": "400"
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
                        }]
                    }
                },
            },
        }
    </script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f7f9fb;
        }

        .clinical-shadow {
            shadow-sm: 0px 4px 20px rgba(0, 0, 0, 0.04);
        }

        .glass-effect {
            backdrop-filter: blur(8px);
            background: rgba(255, 255, 255, 0.8);
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>


<body class="text-on-surface bg-background">

    <header class="bg-surface-container-lowest dark:bg-inverse-surface w-full top-0 sticky z-50 border-b border-outline-variant dark:border-outline shadow-sm transition-all duration-200">
        <div class="flex justify-between items-center px-container-margin py-md max-w-[1440px] mx-auto">
            
            <div class="text-headline-md font-headline-md text-primary dark:text-primary-fixed font-bold">
                <a href="#">ClinicFlow</a>
            </div>
            
           
            
            <div class="flex items-center gap-md">
                @guest
                    <a href="{{ route('login') }}"
                        class="bg-primary text-on-primary px-lg py-sm rounded-lg font-label-md text-label-md transition-all hover:brightness-110 active:scale-95 shadow-sm">
                        Sign In
                    </a>
                @endguest

                @auth
                    <div class="flex items-center gap-sm">
                        <a href="{{ (auth()->user()->role === 'admin') ? route('dashboard.users.index') : route('dashboard.users.show', auth()->user()->id) }}" 
                           class="flex items-center gap-sm group hover:opacity-90 transition-opacity">
                            
                            <img class="w-9 h-9 rounded-full object-cover border border-outline-variant" 
                                 src="{{ auth()->user()->avatar }}" 
                                 alt="{{ auth()->user()->name }}">
                            
                            <div class="hidden sm:block text-left">
                                <p class="text-body-md font-bold text-on-surface leading-tight group-hover:text-primary transition-colors">
                                    {{ auth()->user()->name }}
                                </p>
                                <span class="text-[11px] text-outline capitalize block leading-none">
                                    {{ auth()->user()->role }}
                                </span>
                            </div>
                        </a>

                        <form method="POST" action="{{ route('logout') }}" class="inline ml-xs">
                            @csrf
                            <button type="submit" class="p-xs text-on-surface-variant hover:text-error transition-colors flex items-center justify-center rounded-lg hover:bg-surface-container-high" title="Sign Out">
                                <span class="material-symbols-outlined text-[20px]">logout</span>
                            </button>
                        </form>
                    </div>
                @endauth
            </div>
            
        </div>
    </header>

    <main>
        <section class="relative overflow-hidden bg-background pt-xl pb-24 lg:pt-32 lg:pb-40">
            <div class="absolute inset-0 z-0 opacity-10 pointer-events-none">
                <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-primary-container to-transparent"></div>
            </div>
            <div class="relative z-10 max-w-[1440px] mx-auto px-container-margin grid grid-cols-1 lg:grid-cols-2 gap-xl items-center">
                <div class="space-y-lg">
                    <div class="inline-flex items-center gap-xs px-sm py-xs bg-secondary-fixed-dim bg-opacity-20 text-on-secondary-container rounded-full font-label-sm text-label-sm">
                        <span class="material-symbols-outlined text-[14px]">verified</span>
                        ISO 27001 Certified Clinic
                    </div>
                    <h1 class="font-headline-lg text-headline-lg md:text-[56px] md:leading-[1.1] text-on-surface max-w-xl font-bold">
                        Modern Healthcare, Managed with <span class="text-primary">Precision.</span>
                    </h1>
                    <p class="font-body-lg text-body-lg text-on-surface-variant max-w-lg">
                        Experience seamless clinical care with our team of world-class specialists and state-of-the-art medical procedures. Designed for patient comfort and professional excellence.
                    </p>
                    <div class="flex flex-wrap gap-md pt-md">
                        <a href="{{ auth()->check() ? '#' : route('login') }}"
                            class="bg-primary text-on-primary px-xl py-md rounded-xl font-headline-sm text-headline-sm flex items-center gap-sm hover:shadow-lg transition-all active:scale-95 font-bold">
                            Find a Doctor
                            <span class="material-symbols-outlined">search</span>
                        </a>
                        
                    </div>
                </div>
                <div class="relative">
                    <div class="rounded-[2rem] overflow-hidden shadow-2xl border-[8px] border-white/50 aspect-[4/3]">
                        <img class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBmDoqhQ0bKxgU2_EA7IU2MByBuHuCs4EOXP8n7m3kO_zPzYDlW8NCkiwc9-4MdcevDp_KYhX2P81K-tXjtxvGLVoFnaRQOqZph7xpH_pyAU4eS_BLHrRKrFik3Bz5J0cxf5odseqWX6kJGTHbQYJhWLZlGudy9Pvw785pRVXPxbm_KbL5YHQ4C8PszTZo0JzkElutqT6gYT2q2KP_VmhSPAAFTrhvaY63IOAv8OhrTUF6D3poloXj4" alt="Modern Medical Room" />
                    </div>
                    <div class="absolute -bottom-8 -left-8 bg-white/90 glass-effect p-lg rounded-xl shadow-xl border border-outline-variant flex items-center gap-md max-w-xs">
                        <div class="w-12 h-12 bg-primary-container/20 rounded-full flex items-center justify-center text-primary">
                            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">medical_services</span>
                        </div>
                        <div>
                            <div class="text-on-surface font-bold text-headline-sm">99.8%</div>
                            <div class="text-on-surface-variant text-label-sm">Patient Satisfaction</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-surface-container-low py-xl border-y border-outline-variant">
            <div class="max-w-[1440px] mx-auto px-container-margin">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-xl">
                    <div class="flex items-center gap-md">
                        <div class="p-md bg-white rounded-full shadow-sm">
                            <span class="material-symbols-outlined text-primary text-[32px]">support_agent</span>
                        </div>
                        <div>
                            <h4 class="font-headline-sm text-headline-sm text-on-surface font-bold">24/7 Support</h4>
                            <p class="text-on-surface-variant text-body-md">Round-the-clock clinical assistance for all patients.</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-md">
                        <div class="p-md bg-white rounded-full shadow-sm">
                            <span class="material-symbols-outlined text-secondary text-[32px]">security</span>
                        </div>
                        <div>
                            <h4 class="font-headline-sm text-headline-sm text-on-surface font-bold">HIPAA Compliant</h4>
                            <p class="text-on-surface-variant text-body-md">Your medical data is encrypted and strictly private.</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-md">
                        <div class="p-md bg-white rounded-full shadow-sm">
                            <span class="material-symbols-outlined text-tertiary text-[32px]">payments</span>
                        </div>
                        <div>
                            <h4 class="font-headline-sm text-headline-sm text-on-surface font-bold">Direct Billing</h4>
                            <p class="text-on-surface-variant text-body-md">Seamless insurance integration and direct payments.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-xl lg:py-32 bg-white">
            <div class="max-w-[1440px] mx-auto px-container-margin">
                <div class="flex flex-col md:flex-row justify-between items-end mb-xl gap-md">
                    <div>
                        <h2 class="font-headline-lg text-headline-lg text-on-surface font-bold">Our Leading Specialists</h2>
                        <p class="font-body-lg text-body-lg text-on-surface-variant mt-sm">Expert medical professionals across multiple disciplines.</p>
                    </div>
                    
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-lg">
                    <div class="group bg-surface-container-lowest rounded-xl border border-outline-variant p-md hover:shadow-xl transition-all duration-300">
                        <div class="relative overflow-hidden rounded-lg mb-md aspect-[4/5]">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCXTx7T6IAbn6PTabYZGYE_aYRISsYAYIxhs6SEAwKlumOtjpew_sDL7DNb7bB7mBs7JFa_CHmjvW8JSVI5JesiyiJl2S_72PrehTAC3uqG4oe25r7YVpkJKRaAlAEKS6SKuV2dnONO1VjHlCP-dJb-lP7GzeU8wWYRytNdumL9XpeBXoXhE5OH07qX7MT-NSde9jZwFSiIoefYBQv2ojhxSMgdzoAen3Mnukp2kleODG39uu1Yhw9J" alt="Dr. Sarah Jenkins" />
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Dr. Sarah Jenkins</h3>
                        <p class="text-primary font-bold text-label-md mb-sm">Cardiology</p>
                        <p class="text-on-surface-variant text-body-md line-clamp-2">Harvard Medical graduate with 15+ years experience in advanced cardiovascular surgery.</p>
                    </div>
                    
                    <div class="group bg-surface-container-lowest rounded-xl border border-outline-variant p-md hover:shadow-xl transition-all duration-300">
                        <div class="relative overflow-hidden rounded-lg mb-md aspect-[4/5]">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAC1p6bagJm38TLcG15eRfODEqW6xeFUtnEu3agOgiGm_JA9ty8c0fybnz01ipNRJNDd55YNdROKPEatX83n8bBEkPuiW4-3X3YxP7O1dtZ1DIjCqEOh-5haMbfe2zTrhK-515IpcqAPkpgo89q-JoRziODnN51PVgMraoX4S_38zkqKnHuO93yS8EiaG3LaboC45vYrJIK2nzJKFnuEl34QjHMYSWuwGTlTIR2qUapbXSLikFo7LCp" alt="Dr. Michael Webb" />
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Dr. Michael Webb</h3>
                        <p class="text-primary font-bold text-label-md mb-sm">Orthopedics</p>
                        <p class="text-on-surface-variant text-body-md line-clamp-2">Specializing in minimally invasive joint replacement and sports trauma recovery.</p>
                    </div>

                    <div class="group bg-surface-container-lowest rounded-xl border border-outline-variant p-md hover:shadow-xl transition-all duration-300">
                        <div class="relative overflow-hidden rounded-lg mb-md aspect-[4/5]">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBkD5FK5fmcY4yz-oWmc9-v9y69ko0YH3DuSxakFQiSSpRySMCUF4t09mwiZKlyjcgLqEAAj6RG7wMM7zAQl7B-2s1fH3ywomR9EsD_MqjBMvYC7lFwSorpqCTgms1nSoUl_v8e8FsEe0SQiRj6etDqaNhZxkF6ETHXwPeVLaYRwSYfogapwUcvtomg4FY46xvZpSHdf2Kk_cKZ9Nu-SWHr3ZQahR48li3zc72GN92wHg0h-pSWqrNx" alt="Dr. Elena Rodriguez" />
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Dr. Elena Rodriguez</h3>
                        <p class="text-primary font-bold text-label-md mb-sm">Pediatrics</p>
                        <p class="text-on-surface-variant text-body-md line-clamp-2">Compassionate pediatric care focusing on preventative medicine and childhood development.</p>
                    </div>

                    <div class="group bg-surface-container-lowest rounded-xl border border-outline-variant p-md hover:shadow-xl transition-all duration-300">
                        <div class="relative overflow-hidden rounded-lg mb-md aspect-[4/5]">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDGnVJC3rgJyrXXxhKI0PkJ_eczNDyxUvzMCQTveQEozDnbrJd03UIr60Rvt1dXz6c078kbOp4ncQtZOL646BQaBNIQjUGOb_MCd3vcuCqQPQNsPKmhEwxKyF__HP6Gr3oWipQd_PN4NRH68xrvJb6qY--JQZRzS8UwqsFQ9Pr7Vu0wlh_ExBNYD-EwUUJFfHWJshTIbzOEuWPsodnj0wrHwFYaav1tBPhvEqNH6YAQlFcPPRJiEYvo" alt="Dr. David Chen" />
                        </div>
                        <h3 class="font-headline-sm text-headline-sm text-on-surface font-bold">Dr. David Chen</h3>
                        <p class="text-primary font-bold text-label-md mb-sm">Diagnostic Imaging</p>
                        <p class="text-on-surface-variant text-body-md line-clamp-2">Expert in high-resolution MRI and CT interpretation with 10 years of clinical research.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-xl lg:py-32 bg-background">
            <div class="max-w-[1440px] mx-auto px-container-margin">
                <div class="text-center mb-xl">
                    <h2 class="font-headline-lg text-headline-lg text-on-surface font-bold">Medical Services & Procedures</h2>
                    <p class="font-body-lg text-body-lg text-on-surface-variant mt-sm max-w-2xl mx-auto">Precision-driven medical services utilizing the latest technological advancements for superior clinical outcomes.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-lg h-auto lg:h-[600px]">
                    <div class="md:col-span-2 md:row-span-2 bg-white rounded-2xl p-xl border border-outline-variant relative overflow-hidden flex flex-col justify-between group shadow-sm hover:shadow-md transition-shadow">
                        <div class="absolute -right-10 -bottom-10 opacity-5 group-hover:opacity-10 transition-opacity">
                            <span class="material-symbols-outlined text-[300px]">biotech</span>
                        </div>
                        <div>
                            <div class="w-14 h-14 bg-primary-container/10 rounded-xl flex items-center justify-center text-primary mb-lg">
                                <span class="material-symbols-outlined text-[32px]">biotech</span>
                            </div>
                            <h3 class="font-headline-md text-headline-md text-on-surface mb-md font-bold">Diagnostic Imaging</h3>
                            <p class="text-body-lg text-on-surface-variant max-w-md">Our facility is equipped with state-of-the-art 3T MRI, 128-slice CT, and high-definition ultrasound systems for unparalleled diagnostic clarity.</p>
                        </div>
                        <div class="flex flex-wrap gap-md pt-lg">
                            <div class="px-md py-xs bg-surface-container rounded-full text-label-md">MRI & CT</div>
                            <div class="px-md py-xs bg-surface-container rounded-full text-label-md">X-Ray</div>
                            <div class="px-md py-xs bg-surface-container rounded-full text-label-md">Ultrasound</div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-2xl p-lg border border-outline-variant flex flex-col justify-between shadow-sm hover:shadow-md transition-shadow group">
                        <div>
                            <div class="w-12 h-12 bg-secondary-container/10 rounded-xl flex items-center justify-center text-secondary mb-md">
                                <span class="material-symbols-outlined text-[28px]">surgical</span>
                            </div>
                            <h3 class="font-headline-sm text-headline-sm text-on-surface mb-sm font-bold">Surgical Consultations</h3>
                            <p class="text-body-md text-on-surface-variant">Expert pre-operative planning and minimally invasive surgical solutions.</p>
                        </div>
                        <a class="text-primary text-label-md font-bold mt-md flex items-center gap-xs" href="#">Learn More <span class="material-symbols-outlined text-[16px]">open_in_new</span></a>
                    </div>
                    
                    <div class="bg-white rounded-2xl p-lg border border-outline-variant flex flex-col justify-between shadow-sm hover:shadow-md transition-shadow group">
                        <div>
                            <div class="w-12 h-12 bg-tertiary-container/10 rounded-xl flex items-center justify-center text-tertiary mb-md">
                                <span class="material-symbols-outlined text-[28px]">stethoscope</span>
                            </div>
                            <h3 class="font-headline-sm text-headline-sm text-on-surface mb-sm font-bold">Routine Checkups</h3>
                            <p class="text-body-md text-on-surface-variant">Comprehensive physical exams and health screening for all ages.</p>
                        </div>
                        <a class="text-primary text-label-md font-bold mt-md flex items-center gap-xs" href="#">Book Now <span class="material-symbols-outlined text-[16px]">calendar_today</span></a>
                    </div>
                    
                    <div class="bg-primary-container text-on-primary-container rounded-2xl p-lg flex flex-col justify-center items-center text-center group transition-transform hover:scale-[1.02]">
                        <span class="material-symbols-outlined text-[48px] mb-md animate-pulse">lab_research</span>
                        <h3 class="font-headline-sm text-headline-sm mb-sm font-bold">Laboratory Services</h3>
                        <p class="text-body-md opacity-90">In-house pathology and rapid results for over 200+ types of medical tests.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-xl">
            <div class="max-w-[1440px] mx-auto px-container-margin">
                <div class="bg-inverse-surface text-inverse-on-surface rounded-3xl p-xl lg:p-24 relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-xl">
                    <div class="relative z-10 space-y-md text-center md:text-left">
                        <h2 class="font-headline-lg text-headline-lg md:text-[40px] font-bold">Ready for a Healthier You?</h2>
                        <p class="text-body-lg opacity-80 max-w-xl">Join thousands of patients who trust ClinicFlow for their lifelong medical needs. Start your journey today with a specialist consultation.</p>
                    </div>
                    <div class="relative z-10 flex flex-col sm:flex-row gap-md">
                      
                        <button class="border border-outline-variant text-inverse-on-surface px-xl py-lg rounded-xl font-bold hover:bg-white/10 transition-all active:scale-95">
                            Contact Clinic
                        </button>
                    </div>
                    <div class="absolute -top-24 -right-24 w-64 h-64 bg-primary-container rounded-full blur-[100px] opacity-20"></div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-surface-container dark:bg-inverse-surface w-full mt-xl">
        <div class="flex flex-col md:flex-row justify-between items-center px-container-margin py-xl gap-md max-w-[1440px] mx-auto border-t border-surface-container-high dark:border-surface-dim">
            <div class="flex flex-col items-center md:items-start gap-xs">
                <div class="text-headline-sm font-headline-sm text-primary dark:text-primary-fixed font-bold">ClinicFlow</div>
                <p class="text-label-md text-on-surface-variant font-label-md">© 2026 ClinicFlow Medical Group. All rights reserved.</p>
            </div>
            <div class="flex flex-wrap justify-center gap-lg font-label-md text-label-md">
                <a class="text-on-surface-variant hover:underline hover:text-primary transition-all duration-200" href="#">Privacy Policy</a>
                <a class="text-on-surface-variant hover:underline hover:text-primary transition-all duration-200" href="#">Terms of Service</a>
                <a class="text-on-surface-variant hover:underline hover:text-primary transition-all duration-200" href="#">Accreditation</a>
                <a class="text-on-surface-variant hover:underline hover:text-primary transition-all duration-200" href="#">Contact Us</a>
            </div>
            <div class="flex items-center gap-md">
                <span class="material-symbols-outlined text-outline cursor-pointer hover:text-primary transition-colors">face</span>
                <span class="material-symbols-outlined text-outline cursor-pointer hover:text-primary transition-colors">language</span>
                <span class="material-symbols-outlined text-outline cursor-pointer hover:text-primary transition-colors">mail</span>
            </div>
        </div>
    </footer>

    <script>
        // Header scroll dynamic visual transition
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 10) {
                header.classList.add('backdrop-blur-md', 'bg-opacity-95');
                header.classList.add('shadow-md');
            } else {
                header.classList.remove('backdrop-blur-md', 'bg-opacity-95');
                header.classList.remove('shadow-md');
            }
        });
    </script>
</body>
</html>
