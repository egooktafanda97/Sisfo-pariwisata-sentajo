<link rel="icon" href="favicon.ico" type="{{ asset('Admin') }}/image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
<!-- Bootstrap Core Css -->
<link href="{{ asset('Admin') }}/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="{{ asset('Admin') }}/plugins/node-waves/waves.css" rel="stylesheet" />

<!-- Animation Css -->
<link href="{{ asset('Admin') }}/plugins/animate-css/animate.css" rel="stylesheet" />

<!-- Morris Chart Css-->
<link href="{{ asset('Admin') }}/plugins/morrisjs/morris.css" rel="stylesheet" />

{{ isset($addStyle)?$addStyle:'' }}
{{-- {{ asset('/'.$addStyle)?$addStyle:'' }} --}}

<!-- Custom Css -->
<link href="{{ asset('Admin') }}/css/style.css" rel="stylesheet">

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="{{ asset('Admin') }}/css/themes/all-themes.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css') }}/globalCss.css">

<script type="text/javascript">
	const base_url = "{{ url('/') }}";
	const GlobalToken = "{{ !empty(csrf_token())?csrf_token():'' }}";
</script>
