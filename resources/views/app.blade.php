<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Timetable</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="{{asset("mdb/css/bootstrap.min.css")}}" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="{{asset("mdb/css/mdb.min.css")}}" rel="stylesheet">
    <!-- Custom Styles -->
    <link href="{{asset("mdb/css/style.css")}}" rel="stylesheet">

</head>
<body>
    @yield("content")

<!-- SCRIPTS -->
<!-- JQuery -->
<script type="text/javascript" src="{{asset("mdb/js/jquery-3.3.1.min.js")}}"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="{{asset("mdb/js/popper.min.js")}}"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="{{asset("mdb/js/bootstrap.min.js")}}"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="{{asset("mdb/js/mdb.min.js")}}"></script>
</body>
</html>
