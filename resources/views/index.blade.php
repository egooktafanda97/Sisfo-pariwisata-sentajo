<x-public-app>

    <x-slot name="header">
        <x-navigasi-component></x-navigasi-component>
    </x-slot>

    <x-slot name="footer_slot">
        <x-footer-component></x-footer-component>
    </x-slot>
    <style type="text/css">
        .bs {
            -webkit-box-shadow: 0px 0px 20px 0px #b4b4b4;
            box-shadow: 0px 0px 20px 0px #b4b4b4;
        }

        .readmore {
            color: #426dd3;
            cursor: pointer;
        }

        .readmore:hover {
            color: #0d0ab0;
        }

        .readmore:active {
            color: #0d0ab0;
        }

        iframe {
            width: 100% !important;
        }

    </style>
    <!-- ======= conten ============-->

    <!--================Home Banner Area =================-->
    <section class="banner-area owl-carousel" id="home">
        <div class="single_slide_banner slide_bg1">
            <div class="container">
                <div class="row fullscreen d-flex align-items-center">
                    <div class="banner-content col-lg-12 justify-content-center">
                        <h5 style="color: #000">DINAS PARIWISATA DAN KEBUDAYAAN</h5>
                        <h2 style="color: #000">Wisata & Budaya</h2>
                        <a href="/tentang_kami" class="primary-btn">Tentang Kami</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Home Banner Area =================-->
    <!--================ Start Portfolio Area =================-->
    <section class="section_gap portfolio_area" id="work">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="main-title">
                        <h1>Peta Sebaran</h1>
                        <p>Wisata Kuansing</p>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div style="height: 300px;" id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--================ Start About Area =================-->
    <section class="about-area section_gap gray-bg">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5 about-left">
                    <img class="img-fluid" src="{{asset('profile/'.\App\Models\visi_misi::first()['image'])}}" alt="">
                </div>
                <div class="col-lg-6 col-md-12 about-right">
                    <div class="main-title text-left">
                        @php
                            $tentang = \App\Models\Tentang::first();
                        @endphp
                        <h1>{{ $tentang['judul'] }}</h1>
                    </div>
                    <div class="mb-50 wow fadeIn" data-wow-duration=".8s">
                        {!! $tentang['keterangan'] !!}
                    </div>
                    <a href="/tentang" class="primary-btn">Lebih Lanjut</a>
                </div>
            </div>
        </div>
    </section>
    <!--================ End About Area =================-->

    <!--================ Start Portfolio Area =================-->
    <section class="section_gap portfolio_area" id="work">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="main-title">
                        <h1>Wisata & Budaya</h1>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="projects_fillter">
                        <ul class="filter list">
                            <li class="active" data-filter="*">All Produk</li>
                            <li data-filter=".wisata">Wisata</li>
                            <li data-filter=".budaya">budaya</li>
                            <li data-filter=".cagar_budaya">Cagar Budaya</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="projects_inner row grid">
                <div class="grid-sizer col-sm-6 col-md-3 col-lg-3"></div>

                @php
                    $col = ['col-lg-6 col-sm-6 col-sm-12', 'col-lg-3 col-sm-6 col-sm-12', 'col-lg-3 col-sm-6', 'col-lg-6 col-sm-6', 'col-lg-6 col-sm-6', 'col-lg-6 col-sm-6', 'col-lg-3 col-sm-6', 'col-lg-3 col-sm-6'];
                    $ind = 0;
                @endphp
                @foreach ($wis_bud as $item)
                    @php
                        if ($item['kategori_'] == 'wisata') {
                            $img = asset('/Images_assets/wisata/' . $item['img']);
                        } elseif ($item['kategori_'] == 'budaya') {
                            $img = asset('/Images_assets/budaya/' . $item['img']);
                        } elseif ($item['kategori_'] == 'cagar_budaya') {
                            $img = asset('/Images_assets/cagar_budaya/' . $item['img']);
                        }
                    @endphp
                    <div class="{{ $col[$ind] }} {{ $item['kategori_'] }} grid-item">
                        <div class="projects_item">
                            <img class="img-fluid w-100" src="{{ $img }}" alt="">
                            <div class="projects_text">
                                <a href="{{ url('getDetail/' . $item['id']) }}">
                                    <h4>{{ $item['name'] }} </h4>
                                </a>

                            </div>
                        </div>
                    </div>
                    @php
                        if ($ind == 7) {
                            $ind = 0;
                        }
                        $ind++;
                    @endphp
                @endforeach
            </div>
        </div>
    </section>
    <!--================ End Portfolio Area =================-->

    <!-- ================ visi misi ========================== -->

    <section class="about-area section_gap gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="main-title text-left">
                        <h1 style="font-size: 2rem">Visi Misi</h1>
                    </div>
                </div>
                <div class="col-12">

                    <div class="visi_misi">
                        <h4>Visi</h4>
                        <p>
                            {!! \App\Models\visi_misi::first()['visi'] !!}
                        </p>


                        <br>

                        <h4>Misi</h4>
                        <p>
                            {!! \App\Models\visi_misi::first()['misi'] !!}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ==================================================== -->


    <!--================ Start Newsletter Area =================-->
    <section class="section_gap newsletter-area text-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="main-title">
                        <h1 style="color: #000 !important">Kontak</h1>
                        <p style="color: #000 !important">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat.</p>
                    </div>
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="contact_info">
                                <div class="info_item">
                                    <i class="fa fa-map-marker fa-image-contact" aria-hidden="true"></i>
                                    <p align="left">
                                        {{ \App\Models\Contact::first()['alamat'] }}
                                    </p>
                                </div>
                                <div class="info_item">
                                    <i class="fa fa-phone fa-image-contact" aria-hidden="true"></i>
                                    <p align="left">
                                        {{ \App\Models\Contact::first()['hp'] }}
                                    </p>
                                </div>
                                <div class="info_item">
                                    <i class="fa fa-envelope fa-image-contact" aria-hidden="true"></i>
                                    <p align="left">
                                        {{ \App\Models\Contact::first()['email'] }}
                                    </p>
                                </div>
                                <div class="info_item">
                                    <i class="fa fa-facebook fa-image-contact" aria-hidden="true"></i>
                                    <p align="left">
                                        {{ \App\Models\Contact::first()['fb'] }}
                                    </p>
                                </div>
                                <div class="info_item">
                                    <i class="fa fa-whatsapp fa-image-contact" aria-hidden="true"></i>
                                    <p align="left">
                                        {{ \App\Models\Contact::first()['wa'] }}
                                    </p>
                                </div>
                                <div class="info_item">
                                    <i class="fa fa-twitter fa-image-contact" aria-hidden="true"></i>
                                    <p align="left">
                                        {{ \App\Models\Contact::first()['tw'] }}
                                    </p>
                                </div>
                                <div class="info_item">
                                    <i class="fa fa-instagram fa-image-contact" aria-hidden="true"></i>
                                    <p align="left">
                                        {{ \App\Models\Contact::first()['ig'] }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            {!! \App\Models\Contact::first()['maps'] !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row newsletter_form justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="d-flex flex-row" id="mc_embed_signup">

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ End Newsletter Area =================-->

    <!-- ========================== -->

    <!-- Modal -->
    <div style="z-index: 99999" class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">

                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="m_" style="font-size: 12px">

                    </div>
                    <div style="width: 100%; margin-top: 20px" class="text-right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_tAQD36pKp9v4at5AnpGbvBUsLCOSJx8&callback=initMap&libraries=&v=weekly">
        </script>
        <script type="text/javascript">
            function readmore_patner(title, data, img) {
                $("#exampleModalLongTitle").html(title);
                $('.m_').html(data);
            }

            $('.nav-item').removeClass('active');
            $('.n-home').addClass('active');

            let map;



            function initMap() {
                let ko = '{!! $mapWisata !!}';
                var infowindow;
                var center = new google.maps.LatLng(-0.46907550131487147, 101.4900432489585);
                var map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 10,
                    center: center,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                });
                infowindow = new google.maps.InfoWindow();

                $.each(JSON.parse(ko), function(i, item) {
                    let koo = item.koordinat.split(",");
                    var latLng = new google.maps.LatLng(koo[0], koo[1]);
                    console.log(latLng.lng())
                    var marker = new google.maps.Marker({
                        position: latLng,
                        map: map
                    });
                    var html= 
                        `<div class="card">
                            <div class="card-body">
                                <div class="item-image">
                                    <img src="`+base_url+'/Images_assets/wisata/'+item.gambar+`" width="100%" />
                                </div>
                                <div class="item" style="display:flex">
                                    <div style="flex:1">
                                        Nama Wisata
                                    </div>
                                    <div style="flex:0.4">
                                        `+item.nama_wisata+`
                                    </div>
                                    <div style="flex:2">

                                    </div>
                                </div>
                                <div style="width:100%" calss="text-center">
                                    <a href="" class="btn btn-primary">detail</a>
                                </div>
                            </div>
                        </div>`
                    ;
                    google.maps.event.addListener(marker, 'click', function() {
                        infowindow.setContent(html);
                        infowindow.open(map, this);
                    });
                });
            }

        </script>
    </x-slot>

</x-public-app>
