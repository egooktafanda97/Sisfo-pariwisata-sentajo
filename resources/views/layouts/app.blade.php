<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dinas Pariwisata Dan Kebudayaan</title>

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}

    {{ $StyleResource }}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/loadingPage.css') }}">
    <style>
        .nav-item{
            font-weight: bold !important;
        }
    </style>
</head>

<body class="theme-red theme-teal ls-closed">
    <div id="loadPage" hidden style="
    position: fixed;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    z-index: 10000;
    background: rgba(0,0,0,0.3);
    ">
    <div style="
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    ">
    <section class="wrapper">
        <div class="sk-folding-cube">
            <div class="sk-cube1 sk-cube"></div>
            <div class="sk-cube2 sk-cube"></div>
            <div class="sk-cube4 sk-cube"></div>
            <div class="sk-cube3 sk-cube"></div>
        </div>
        <span style="color: white">Loading...</span>
    </section>
</div>
</div>
@component('Component.ComponentLayout.LoadingPageComponent')
@endcomponent
@component('Component.ComponentLayout.NavTopComponent')
@endcomponent


<x-sidebar-component>
   {{--  <x-slot name="namaUser">
        {{ Auth::user()->name }}
    </x-slot> --}}

    <x-slot name="itemNav">
            {{-- @navLink([
      "urlLink" => $el->url,
      "namaNav"=>  ucwords($el->label), 
      "icon"=> $el->icon
      ]) --}}
     {{--  <li>
        <a href="javascript:void(0);" class="menu-toggle produk">
            <i class="material-icons">shopping_basket</i>
            <span>PRODUK</span>
        </a>
        <ul class="ml-menu" style="display: none;">
            <li class="produk_inp">
                <a href="/create_produk">
                    <i class="material-icons">input</i>
                    <span>Buat Produk</span>
                </a>
            </li>
            <li class="produk_show_">
                <a href="/view_produk">
                    <i class="material-icons">shopping_basket</i>
                    <span>Produk</span>
                </a>
            </li>
        </ul>
    </li>


    <li>
        <a href="javascript:void(0);" class="menu-toggle berita">
            <i class="material-icons">card_travel</i>
            <span>Berita</span>
        </a>
        <ul class="ml-menu">
            <li class="berita_child">
                <a href="/admgetBerita">
                    <i class="material-icons">card_travel</i>
                    <span>Berita</span>
                </a>
            </li>
        </ul>
    </li>


    <li class="blog">
        <a href="{{ url('admBlog') }}" class=" waves-effect waves-block blog">
         <i class="material-icons">language</i>
         <span>Blog</span>
     </a>
 </li>

 <li>
    <a href="javascript:void(0);" class="menu-toggle profile">
        <i class="material-icons">account_balance</i>
        <span>Profile</span>
    </a>
    <ul class="ml-menu">
        <li class="profile_tentang">
            <a href="/addItemProfile">
                <i class="material-icons">account_balance</i>
                <span>Tentang</span>
            </a>
        </li>
        <li class="profile_tim">
            <a href="/addTim">
                <i class="material-icons">account_balance</i>
                <span>Tim</span>
            </a>
        </li>
    </ul>
</li>


<li>
    <a href="javascript:void(0);" class="menu-toggle setting">
        <i class="material-icons">settings</i>
        <span>Pengaturan</span>
    </a>
    <ul class="ml-menu">
        <li>
            <a href="/setWeb">
                <i class="material-icons">language</i>
                <span>Pengaturan Website</span>
            </a>
        </li>
        <li>
            <a href="/account">
                <i class="material-icons">account_circle</i>
                <span>Admin</span>
            </a>
        </li>
    </ul>
</li> --}}
</x-slot>

</x-sidebar-component>

<section class="content">
    <div class="container-fluid">

        {{ $slot }}

    </div>
</section>

{{ $ScriptResource }}

<script>
    if ($('.menu__').data('menu') != undefined) {
        $(".menu-toggle").parent().removeClass('active');
        $('.' + $('.menu__').data('menu')).addClass('waves-effect waves-block toggled');
        $('.' + $('.menu__').data('child')).addClass('active');
    }

</script>
</body>

</html>
