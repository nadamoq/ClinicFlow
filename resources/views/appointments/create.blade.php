<x-layouts.main title="New Appointment">
    <x-slot name='headScript'>
        <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        "colors": {
                            "secondary-container": "#6df5e1",
                            "inverse-on-surface": "#eff1f3",
                            "inverse-surface": "#2d3133",
                            "primary": "#006194",
                            "on-surface": "#191c1e",
                            "surface-container-high": "#e6e8ea",
                            "surface-container": "#eceef0",
                            "on-secondary": "#ffffff",
                            "on-tertiary": "#ffffff",
                            "surface-container-highest": "#e0e3e5",
                            "on-primary-fixed-variant": "#004b73",
                            "surface-tint": "#006398",
                            "on-secondary-fixed-variant": "#005048",
                            "on-background": "#191c1e",
                            "surface-bright": "#f7f9fb",
                            "on-tertiary-fixed": "#131b2e",
                            "tertiary-fixed-dim": "#bec6e0",
                            "inverse-primary": "#93ccff",
                            "secondary": "#006b5f",
                            "on-secondary-fixed": "#00201c",
                            "tertiary-fixed": "#dae2fd",
                            "error-container": "#ffdad6",
                            "error": "#ba1a1a",
                            "on-secondary-container": "#006f64",
                            "on-primary-fixed": "#001d31",
                            "on-error": "#ffffff",
                            "secondary-fixed": "#71f8e4",
                            "on-tertiary-fixed-variant": "#3f465c",
                            "surface-container-lowest": "#ffffff",
                            "secondary-fixed-dim": "#4fdbc8",
                            "surface-dim": "#d8dadc",
                            "primary-fixed-dim": "#93ccff",
                            "on-primary": "#ffffff",
                            "primary-container": "#007bb9",
                            "on-primary-container": "#fdfcff",
                            "background": "#f7f9fb",
                            "outline-variant": "#bfc7d2",
                            "tertiary-container": "#6c748b",
                            "surface": "#f7f9fb",
                            "primary-fixed": "#cce5ff",
                            "on-error-container": "#93000a",
                            "outline": "#707881",
                            "on-surface-variant": "#3f4850",
                            "surface-variant": "#e0e3e5",
                            "on-tertiary-container": "#fefcff",
                            "tertiary": "#545c72",
                            "surface-container-low": "#f2f4f6"
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
                            "headline-sm": ["Inter"],
                            "headline-lg": ["Inter"],
                            "body-md": ["Inter"],
                            "body-lg": ["Inter"],
                            "label-md": ["Inter"],
                            "headline-md": ["Inter"],
                            "label-sm": ["Inter"]
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
                            "body-md": ["14px", {
                                "lineHeight": "1.5",
                                "fontWeight": "400"
                            }],
                            "body-lg": ["16px", {
                                "lineHeight": "1.6",
                                "fontWeight": "400"
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
            body {
                font-family: 'Inter', sans-serif;
            }

            .material-symbols-outlined {
                font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
            }

            .scroll-hide::-webkit-scrollbar {
                display: none;
            }
        </style>
    </x-slot>

@include('appointments.form',['patient'=>$patient,'readonly'=>false])
   
</x-layouts.main>
