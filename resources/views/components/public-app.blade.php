<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>{{ webConfig::get('title') }}</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('theme') }}/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/vendors/linericon/style.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/vendors/animate-css/animate.css">
    <link rel="stylesheet" href="{{ asset('theme') }}/vendors/flaticon/flaticon.css">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset('theme') }}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('theme') }}/css/costum_css.css">

    <script>
        const base_url = "{{url('/')}}";
    </script>
    <style type="text/css">
        .nav-link:hover {
            color: orange !important;
        }

    </style>
</head>

<body>
    @php
        $getData = \App\Models\kunjungan::where(['ip' => getIp(), 'tgl' => date('Y-m-d')])
            ->get()
            ->count();
        if ($getData == 0) {
            $up = new \App\Models\kunjungan(['kunjungan' => '1', 'ip' => getIp(), 'tgl' => date('Y-m-d')]);
            $up->save();
        }
    @endphp

    @if (isset($header))
        {{ $header }}
    @endif

    {{ $slot }}

    {{ $footer_slot }}

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('theme') }}/js/jquery-3.2.1.min.js"></script>

    @if (isset($script))
        {{ $script }}
    @endif
	
    <script src="{{ asset('theme') }}/js/popper.js"></script>
    <script src="{{ asset('theme') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('theme') }}/js/stellar.js"></script>
    <script src="{{ asset('theme') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('theme') }}/vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('theme') }}/vendors/isotope/imagesloaded.pkgd.min.js"></script>
    <script src="{{ asset('theme') }}/vendors/isotope/isotope-min.js"></script>
    <script src="{{ asset('theme') }}/vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="{{ asset('theme') }}/js/jquery.ajaxchimp.min.js"></script>
    <script src="{{ asset('theme') }}/js/mail-script.js"></script>
    <!--gmaps Js-->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script> -->
    <!-- <script src="js/gmaps.min.js"></script> -->
    <script src="{{ asset('theme') }}/js/theme.js"></script>
</body>

</html>
