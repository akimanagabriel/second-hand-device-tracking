<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title') | OSHDTMS</title>
    <!-- plugins:css -->
    <link href="vendors/feather/feather.css" rel="stylesheet">
    <link href="vendors/ti-icons/css/themify-icons.css" rel="stylesheet">
    <link href="vendors/css/vendor.bundle.base.css" rel="stylesheet">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link href="vendors/datatables.net-bs4/dataTables.bootstrap4.css" rel="stylesheet">
    <link href="vendors/ti-icons/css/themify-icons.css" rel="stylesheet">
    <link href="js/select.dataTables.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link href="css/vertical-layout-light/style.css" rel="stylesheet">
    <!-- endinject -->
    <link href="images/favicon.png" rel="shortcut icon" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('partials.topNav')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            @include('partials.sidebar')
            
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                @include('partials.footer')
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/datatables.net/jquery.dataTables.js"></script>
    <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
    <script src="js/dataTables.select.min.js"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/dashboard.js"></script>
    <script src="js/Chart.roundedBarCharts.js"></script>
    <!-- End custom js for this page-->

    {{-- toast --}}
    <link href="toast/jquery.toaster.css" rel="stylesheet">
    <script src="toast/jquery.toaster.js"></script>
    @include('messages.message')
</body>

</html>
