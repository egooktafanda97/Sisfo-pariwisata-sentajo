<x-public-app>

    <x-slot name="header">
        <x-navigasi-component></x-navigasi-component>
    </x-slot>

    <x-slot name="footer_slot">
        <x-footer-component></x-footer-component>
    </x-slot>
    <input type="hidden" name="ko" id="ko" value="{{ $budaya->koordinat }}">
    <style type="text/css">
       .bs {
        -webkit-box-shadow: 0px 0px 20px 0px #b4b4b4;
        box-shadow: 0px 0px 20px 0px #b4b4b4;
    }
    .cont-article{
        width: 100%; 
        border-left: 2px solid orange; 
        border-top-left-radius: 20px; 
        border-bottom-left-radius: 20px; 
        padding: 20px 0px 20px 20px;
    }
    .line-bt{
        width: 10%; 
        height: 2px; 
        background-color: salmon; 
        border-radius: 10px; 
        margin-bottom: 20px;
    }
</style>

<!-- ======= conten ============-->

<!--================ About Banner Area =================-->
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-right">
                <h3 style="color: #fff">Budaya > Dinas Pariwisata Dan Kebudayaan</h3>
                <p style="color: #fff">Kuantan Singingi</p>
            </div>
        </div>
    </div>
</div>
</section>
<!--================End About Banner Area =================-->


<!--================ Start Portfolio Details Area =================-->
<section class="portfolio_details_area section_gap">
    <div class="container">
        <div class="portfolio_details_inner">
            <div class="row">
                <div class="col-md-6">
                    <div class="left_img">
                        <img class="img-fluid" src="{{ asset('/Images_assets/budaya/'.$budaya->gambar) }}" alt="">
                    </div>
                </div>
                <div class="offset-md-1 col-md-5">
                    <div class="portfolio_right_text mt-30">
                        <h4>{{ $budaya->nama_budaya }}</h4>
                        <ul class="list">
                            <li><span>Alamat</span>: {{ $budaya->alamat_asal }}</li>
                            <li><span>Kecamatan</span>: 
                                {{ \App\Models\Kecamatan::whereidKec($budaya->kecamatan)->first()['nama'] }}
                            </li>
                            <li><span>Status Pelestarian</span>: 
                                {{ $budaya->status_pelestarian }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div style="background-color: 2px solid gray; height: 1px; width: 100%; margin-top: 20px; ,margin-bottom: 20px"></div>
            </div>

            <div class="bs cont-article">
                <h3 style="color: ">Sejarah Singkat</h3>
                <div class="line-bt"></div>
                <div class="col-lg-12 col-md-12">
                    {!! $budaya->sejarah_singkat !!}
                </div>
            </div>
            <div class="cont-article bs mt-20">
                <h3 style="color: #000">Detail Budaya</h3>
                <div class="line-bt"></div>
                <div class="col-lg-12 col-md-12">
                    {!! $budaya->deskripsi !!}
                </div>
            </div>

            @if (!empty($wisata->vidio))
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                       <video
                       src="{{ asset('Images_assets/budaya/' . $budaya->vidio) }}" width="100%" class="video-preview" controls="controls" />
                   </div>
               </div>
           </div>
           @endif

       </div>
   </div>
</section>
<!--================ Start Portfolio Details Area =================-->

<x-slot name="script">
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_tAQD36pKp9v4at5AnpGbvBUsLCOSJx8&callback=initMap&libraries=&v=weekly"></script>
    <script type="text/javascript">
        $('.nav-item').removeClass('active');
        $('.n-produk').addClass('active');
    </script> 
</x-slot>
</x-public-app>
