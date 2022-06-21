

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
   <link href="{{ url('') }}/logo/prov.png" rel="icon">
    <title>
        UPPD SAMSAT
    </title>
    <!-- Custom CSS -->
    <link href="{{asset('')}}package/src/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="{{asset('')}}package/src/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="{{asset('')}}package/src/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="{{asset('')}}package/src/dist/css/style.min.css" rel="stylesheet">
    <link href="{{asset('')}}package/src/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
{{-- <link href="{{ asset('') }}paper/assets/css/bootstrap.min.css" rel="stylesheet" /> --}}
{{-- <link rel="stylesheet" href="{{asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}"> --}}
<link rel="stylesheet" href="{{asset('node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('node_modules/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/izitoast/dist/css/iziToast.min.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}" />
@yield('custom_css')
</head>
