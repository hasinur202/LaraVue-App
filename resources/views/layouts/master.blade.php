
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>LaraVueApp</title>

  <link rel="stylesheet" href="/css/app.css">
  
</head>
<body class="hold-transition sidebar-mini" >
<div class="wrapper" id="app">

  <app></app>


</div>
<!-- ./wrapper -->




<script src="{{asset('/js/app.js') }}"></script>



</body>
</html>
