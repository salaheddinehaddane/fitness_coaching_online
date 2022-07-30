<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S'inscrire</title>
    <link rel="icon" type="image/png" sizes="16x16" href=" {{ asset('images/favicon.png') }} ">
    <link href=" {{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }} " rel="stylesheet">
    <link href=" {{ asset('vendor/datatables/css/jquery.dataTables.min.css') }} " rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <router-view></router-view>
    </div>
</body>
<script src="{{ asset('/js/app.js') }}"></script>

</html>
