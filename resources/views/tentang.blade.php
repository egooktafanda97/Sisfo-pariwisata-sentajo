<x-public-app>

    <x-slot name="header">
        <x-navigasi-component></x-navigasi-component>
    </x-slot>

    <x-slot name="footer_slot">
        <x-footer-component></x-footer-component>
    </x-slot>

    <!--================ About Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-right">
                    <div class="col-md-6 float-right">
                        <h3 style="color: #fff">Tentang Dinas Pariwisata Dan Kebudayaan</h3>
                        <p style="color: #fff">Kuantan Singingi</p>
                    </div>


                </div>
            </div>
        </div>
        </div>
    </section>
    <!--================End About Banner Area =================-->

    <!--================ Start About Area =================-->
    <section class="about-area section_gap_c gray-bg">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5">
                    @php
                        $im = !empty($Q2->image) ? $Q2->image : '';
                    @endphp
                    <img class="img-fluid" src="{{ asset('profile/' . $im) }}" alt="">
                </div>
                @php
                    $in = 0;
                @endphp
                @foreach ($Q as $element)
                    @if ($in == 0)
                        <div class="col-lg-6 col-md-12 about-right">
                            <div class="main-title text-left">
                                <h1 style="font-size: 2rem">{{ $element->judul }}</h1>
                            </div>
                            <div class="mb-50 wow fadeIn" data-wow-duration=".8s">
                                {!! $element->keterangan !!}
                            </div>
                        </div>
                    @elseif($in > 0)
                        <div class="col-lg-5" style="margin-top: 50px">
                            <div class="main-title text-left">
                                <h1 style="font-size: 2rem">{{ $element->judul }}</h1>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            {!! $element->keterangan !!}
                        </div>
                    @endif
                    @php
                        $in++;
                    @endphp
                @endforeach




            </div>
        </div>
    </section>
    <section class="about-area section_gap_c2 mt-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="main-title text-left">
                        <h1 style="font-size: 2rem">Struktur Organisasi</h1>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <img src="{{ asset('images\STRUKTUR.jpg') }}" width="100%" height="auto" />
            </div>
        </div>
    </section>
    <!--================ End About Area =================-->
    <section class="about-area section_gap_c2 gray-bg">
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

                        {!! !empty($Q2->visi) ? $Q2->visi : '' !!}

                        <br>

                        <h4>Misi</h4>
                        <p>
                            {!! !empty($Q2->misi) ? $Q2->misi : '' !!}
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- =============== Tim Area ====================  -->
    <section class="about-area section_gap white-bg" hidden>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center" style="color: #000">
                    <h1>Tim Koperasi Logam Mulia</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat.</p>
                </div>
            </div>
            <br>
            <br>
            <div class="row">

                @foreach ($Q3 as $element)
                    <div class="col-md-4">
                        <div class="card text-center"
                            style="align-items: center; border:none; background: transparent;">
                            <img src="{{ asset('tim/' . $element->foto) }}"
                                style="width: 200px; height: 200px; border:3px solid green" class="rounded-circle">
                            <div class="contac-image">
                                <br>
                                <h5>{{ $element->nama }}</h5>
                                <p class="social mt-md-3 mt-2">
                                    <span>
                                        <a href="" style="color: #138cf2;">
                                            <i class="fa fa-facebook fa-image-contact" aria-hidden="true"></a></i>
                                    </span>
                                    <span>
                                        <a href="" style="color:green">
                                            <i class="fa fa-whatsapp fa-image-contact" aria-hidden="true"></i>
                                        </a>
                                    </span>
                                    <span>
                                        <a href="" style="color: #09cbd2;">
                                            <i class="fa fa-twitter fa-image-contact" aria-hidden="true"></i>
                                        </a>
                                    </span>
                                    <span>
                                        <a href="" style="color: #ee066e;">
                                            <i class="fa fa-instagram fa-image-contact" aria-hidden="true"></i>
                                        </a>
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>

    </section>

    <x-slot name="script">
        <script type="text/javascript">
            $('.nav-item').removeClass('active');
            $('.n-tentang').addClass('active');

        </script>
    </x-slot>

</x-public-app>
