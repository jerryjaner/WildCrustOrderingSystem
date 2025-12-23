<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Jet HTML Free  - Bootstrap 5 HTML Multipurpose Admin Dashboard Theme
Upgrade to Pro: https://keenthemes.com/products/jet-html-pro
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="">
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
        content="Jet admin dashboard live demo. Check out all the features of the admin panel. A large number of settings, additional services and widgets." />
    <meta name="keywords"
        content="Jet theme, bootstrap, bootstrap 5, admin themes, free admin themes, bootstrap admin, bootstrap dashboard" />
    <link rel="canonical" href="Https://preview.keenthemes.com/jet-free" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('admin/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

    <link href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed aside-secondary-disabled">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <div id="kt_aside" class="aside aside-extended bg-white" data-kt-drawer="true" data-kt-drawer-name="aside"
                data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
                <!--begin::Primary-->
                <div class="aside-primary d-flex flex-column align-items-lg-center flex-row-auto">
                    <!--begin::Logo-->
                    <div class="aside-logo d-none d-lg-flex flex-column align-items-center flex-column-auto pt-10"
                        id="kt_aside_logo">
                        <a href="index.html">
                            {{-- <img alt="Logo" src="admin/assets/media/logos/logo-compact.svg" class="h-55px" /> --}}
                            <img alt="Logo" src="{{ asset('admin/assets/media/logos/wildcrust-logo.jpg') }}" class="h-55px" />

                        </a>
                    </div>
                    <!--end::Logo-->
                    <!--begin::Nav-->
                    <div class="aside-nav d-flex flex-column flex-lg-center flex-column-fluid w-100 pt-5 pt-lg-0"
                        id="kt_aside_nav">
                        @include('layouts.partials.admin.sidebar')
                    </div>

                    <!--end::Nav-->
                    <!--begin::Side Footer-->
                    <div class="aside-footer d-flex flex-column align-items-center flex-column-auto"
                        id="kt_aside_footer">
                        <!--begin::Menu-->
                        <div class="mb-7">
                            <button type="button"
                                class="btn btm-sm btn-icon btn-color-gray-400 btn-active-color-primary btn-active-light"
                                data-kt-menu-trigger="click" data-kt-menu-overflow="true"
                                data-kt-menu-placement="top-start" data-kt-menu-flip="top-end" data-bs-toggle="tooltip"
                                data-bs-placement="right" data-bs-dismiss="click" title="Settings">
                                <!--begin::Svg Icon | path: icons/duotone/Communication/Dial-numbers.svg-->
                                <span class="svg-icon svg-icon-2 svg-icon-lg-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24" version="1.1">
                                        <rect fill="#000000" opacity="0.3" x="4" y="4" width="4" height="4"
                                            rx="2" />
                                        <rect fill="#000000" x="4" y="10" width="4" height="4"
                                            rx="2" />
                                        <rect fill="#000000" x="10" y="4" width="4" height="4"
                                            rx="2" />
                                        <rect fill="#000000" x="10" y="10" width="4" height="4"
                                            rx="2" />
                                        <rect fill="#000000" x="16" y="4" width="4" height="4"
                                            rx="2" />
                                        <rect fill="#000000" x="16" y="10" width="4" height="4"
                                            rx="2" />
                                        <rect fill="#000000" x="4" y="16" width="4" height="4"
                                            rx="2" />
                                        <rect fill="#000000" x="10" y="16" width="4" height="4"
                                            rx="2" />
                                        <rect fill="#000000" x="16" y="16" width="4" height="4"
                                            rx="2" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </button>
                            <!--begin::Menu 2-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold w-200px"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content fs-6 text-dark fw-bolder px-3 py-4">Setting</div>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator mb-3 opacity-75"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" class="menu-link px-3">Account Setting</a>
                                </div>

                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu 2-->
                        </div>
                        <!--end::Menu-->
                    </div>
                    <!--end::Side Footer-->
                </div>
                <!--end::Primary-->
                <!--begin::Action-->
                <!--end::Action-->
            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                <!--begin::Header-->
                @include('layouts.partials.admin.header')
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    @yield('content')
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                @include('layouts.partials.admin.footer')
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->


    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24" />
                    <rect fill="#000000" opacity="0.5" x="11" y="10" width="2" height="10"
                        rx="1" />
                    <path
                        d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                        fill="#000000" fill-rule="nonzero" />
                </g>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
    <script src="{{ asset('admin/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/widgets.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {

            //DataTable
            $(".table").DataTable({
                "language": {
                    "lengthMenu": "Show _MENU_",
                },
                "dom": "<'row mb-2'" +
                    "<'col-sm-6 d-flex align-items-center justify-conten-start dt-toolbar'l>" +
                    "<'col-sm-6 d-flex align-items-center justify-content-end dt-toolbar'f>" +
                    ">" +

                    "<'table-responsive'tr>" +

                    "<'row'" +
                    "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>" +
                    "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" +
                    ">"
            });


            // Ajax Setup Header
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            //Password Visibility
            $(document).ready(function() {
                // Toggle password visibility
                $('.toggle-password').click(function() {
                    const input = $(this).siblings('input');
                    const type = input.attr('type') === 'password' ? 'text' : 'password';
                    input.attr('type', type);
                    $(this).toggleClass('fa-eye fa-eye-slash');
                });

                // Image upload preview
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                            $('#imagePreview').hide();
                            $('#imagePreview').fadeIn(650);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $("#imageUpload").change(function() {
                    readURL(this);
                });
            });


        });
    </script>
    @stack('scripts')
</body>

</html>
