<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from fito.dexignzone.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 27 Apr 2022 10:29:26 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Coaching</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href=" {{ asset('images/favicon.png') }} ">
    <link href=" {{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }} " rel="stylesheet">
    <link href=" {{ asset('vendor/datatables/css/jquery.dataTables.min.css') }} " rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
    {{-- <link href=" {{asset('vendor/owl-carousel/owl.carousel.css')}} " rel="stylesheet"> --}}
    {{-- <link href="{{ asset('/css/app.css') }}" rel="stylesheet"/> --}}
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> --}}
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="app">
        <div id="main-wrapper">

            <!--**********************************
                Nav header start
            ***********************************-->
            <div class="nav-header">
                <a href="index.html" class="brand-logo">
                    <img class="logo-abbr" src=" {{ asset('images/logo.png') }} " alt="">
                </a>

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="line"></span><span class="line"></span><span
                            class="line"></span>
                    </div>
                </div>
            </div>
            <!--**********************************
                Nav header end
            ***********************************-->

            <!--**********************************
                Chat box start
            ***********************************-->
            <!--**********************************
                Chat box End
            ***********************************-->

            <!--**********************************
                Header start
            ***********************************-->
            <div class="header">
                <div class="header-content">
                    <nav class="navbar navbar-expand">
                        <div class="collapse navbar-collapse justify-content-between">
                            <div class="header-left">
                                <div class="dashboard_bar">
                                    Bienvenue Admin
                                </div>
                            </div>
                        </div>
                    </nav>
                    <a href="/"> <button class="btn btn-danger">Déconnexion</button></a>
                </div>
            </div>
            <!--**********************************
                Header end ti-comment-alt
            ***********************************-->

            <!--**********************************
                Sidebar start
            ***********************************-->
            <div class="deznav">
                <div class="deznav-scroll">
                    <ul class="metismenu" id="menu">
                        <li>
                            <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                                <i class="flaticon-381-networking"></i>
                                <span class="nav-text">Dashboard</span>
                            </a>
                            <ul aria-expanded="false">
                                <li>
                                    <router-link to="/admin/admin-accueille"> Accueille </router-link>
                                </li>
                                <li>
                                    <router-link to="/admin/admin-coach"> Coachs </router-link>
                                </li>
                                <li>
                                    <router-link to="/admin/admin-client"> Clients </router-link>
                                </li>
                                <li>
                                    <router-link to="/admin/admin-pending"> Demandes d'abonnement </router-link>
                                </li>

                            </ul>
                        </li>
                        <div class="drum-box">
                            <img src=" {{ asset('images/card/drump.png') }} " alt="">
                            <p class="fs-18 font-w500 mb-4">Motivez votre esprit et le corps suivra</p>
                        </div>
                        <div class="copyright text-center">
                            <p><strong>Stage de fin d'étude</strong> © Salah Eddine HADDANE</p>
                            <p>Carée agency</p>
                        </div>
                </div>
            </div>
            <!--**********************************
                Sidebar end
            ***********************************-->

            <!--**********************************
                Content body start
                ***********************************-->
            <!-- row -->

            @yield('content')


            <!--**********************************
                Content body end
            ***********************************-->

            <!--**********************************
                Footer start
            ***********************************-->
            <div class="footer">
                <div class="copyright">
                    {{-- <p>Copyright © Salah Eddine HADDANE</p> --}}
                </div>
            </div>
            <!--**********************************
                Footer end
            ***********************************-->

            <!--**********************************
               Support ticket button start
            ***********************************-->

            <!--**********************************
               Support ticket button end
            ***********************************-->


        </div>
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    {{-- <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script> --}}
    <script src="{{ asset('/js/app.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script> --}}
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    {{-- <script src=" {{asset('js/plugins-init/datatables.init.js')}} " defer></script> --}}
    <!-- Required vendors -->
    <script src="{{ asset('vendor/global/global.min.js') }} "></script>
    <script src=" {{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }} "></script>
    {{-- <script src=" {{asset('vendor/chart.js/Chart.bundle.min.js')}} "></script> --}}
    <script src=" {{ asset('js/custom.min.js') }} "></script>
    <script src=" {{ asset('js/deznav-init.js') }} "></script>
    {{-- <script src=" {{asset('vendor/owl-carousel/owl.carousel.js')}} "></script> --}}

    <!-- Dashboard 1 -->
    <script src=" {{ asset('js/dashboard/dashboard-1.js') }} "></script>
    <script data-cfasync="false" src="{{ asset('js/email-decode.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('vendor/bootstrap-datetimepicker/js/moment.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script>
        $(function() {
            $('#datetimepicker1').datetimepicker({
                inline: true,
            });
        });
    </script>


</body>

</html>
