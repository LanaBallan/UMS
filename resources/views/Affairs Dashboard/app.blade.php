<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="dvendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="dcss/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="\affairs\home">
            <span>قسم شؤون الطلاب</span>

        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">



        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div  style="text-align: center" class="sidebar-heading">
            الإدارة
        </div>

        <!-- Nav Item - Pages Collapse Menu -->





        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#studenttar"
               aria-expanded="true" aria-controls="studenttar">
                <i class="fas fa-fw "></i>
                <span>الطلاب</span>
            </a>
            <div id="studenttar" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">إدارة الطلاب</h6>
                    <a class="collapse-item" href="/affairs/student/add">إضافة طالب</a>
                    <a class="collapse-item" href="/affairs/student/all">عرض الطلاب</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ad"
               aria-expanded="true" aria-controls="ad">
                <i class="fas fa-fw "></i>
                <span>الإعلانات</span>
            </a>
            <div id="ad" class="collapse" aria-labelledby="ad" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">إدارة الإعلانات</h6>
                    <a class="collapse-item" href="/affairs/ad/add">إضافة إعلان</a>
                    <a class="collapse-item" href="/affairs/ad/all">عرض الإعلانات</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/affairs/student/lists">
                <i class="fas fa-fw "></i>
                <span>قوائم الطلاب</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/affairs/student/classes">
                <i class="fas fa-fw "></i>
                <span>فئات الطلاب</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/affairs/uniInfo/add">
                <i class="fas fa-fw "></i>
                <span>الحياة الجامعية</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/affairs/points/add">
                <i class="fas fa-fw "></i>
                <span>شحن نقاط</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div style="text-align: center" class="sidebar-heading">
            الطلبات
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="/affairs/document-requests/all">
                <i class="fas fa-fw "></i>
                <span>الوثائق</span></a>
        </li>



        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">


    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form  action="/affairs/search" method="GET"
                       class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                        <input style="text-align: right" type="text" class="form-control bg-light border-0 small" placeholder="ابحث عن طالب"
                               id="key" name="key"  aria-label="Search" aria-describedby="basic-addon2">

                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>





                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 ">{{Auth::guard('affairsEmployee')->user()->f_name}}</span>

                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">



                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('affairs.logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <form id="logout-form" action="{{ route('affairs.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                تسجيل الخروج
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

        @yield('content')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="dvendor/jquery/jquery.min.js"></script>
    <script src="dvendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="dvendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="djs/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="dvendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="djs/demo/chart-area-demo.js"></script>
    <script src="djs/demo/chart-pie-demo.js"></script>
    <script>$('.datepicker').datepicker({
            weekdaysShort: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            showMonthsShort: true
        })</script>
</div>
</body>

</html>
