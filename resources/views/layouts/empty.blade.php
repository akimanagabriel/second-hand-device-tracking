<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <title>@yield('title')</title>
    <link href="vendors/feather/feather.css" rel="stylesheet">
    <link href="vendors/ti-icons/css/themify-icons.css" rel="stylesheet">
    <link href="vendors/css/vendor.bundle.base.css" rel="stylesheet">
    <link href="css/vertical-layout-light/style.css" rel="stylesheet">
    <link href="images/favicon.png" rel="shortcut icon" />
</head>

<body>

    {{-- main content --}}
    @yield('content')


    <script src="vendors/js/vendor.bundle.base.js"></script>
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>

    {{-- toast --}}
    <link href="toast/jquery.toaster.css" rel="stylesheet">
    <script src="toast/jquery.toaster.js"></script>
    @include('messages.message')
    
</body>

</html>
