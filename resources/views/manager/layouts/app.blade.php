<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Leave Manager | Manager</title>
    @include('layouts/head')
</head>

<body>
    <div class="main-wrapper">
        <!-- sidebar -->
        @include('manager/layouts/sidebar')

        <div class="page-wrapper">
        <!-- topbar -->
        @include('layouts/topbar')

        <div class="page-content">
        <!-- page content -->
        @section('main-content')

        @show

        </div>

        <!-- partial:partials/_footer.html -->
        <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
        @include('layouts/footer')
        </footer>
        <!-- partial -->

        </div>
    </div>
    <!-- scripts -->
    @include('layouts/scripts')
    {!! Toastr::message() !!}
    
    @stack('js')

</body>

</html>
