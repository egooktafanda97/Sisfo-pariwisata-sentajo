<x-public-app>

    <x-slot name="header">
        <x-navigasi-component></x-navigasi-component>
    </x-slot>

    <x-slot name="footer_slot">
        <x-footer-component></x-footer-component>
    </x-slot>


    <!-- ======= conten ============-->

    <!--================ About Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-right">
                    <div class="col-md-6 float-right">
                        <h3 style="color: #fff">Berita Dinas Pariwisata Dan Kebudayaan</h3>
                        <p style="color: #fff">Kuantan Singingi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End About Banner Area =================-->


<!--================ Start About Area =================-->
<section class="about-area section_gap gray-bg">
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-lg-6">
                <div class="main-title text-left">
                    <h1>Berita</h1>
                </div>
            </div>
        </div>
        <div class="row">


            @foreach ($Q as $item)
            <div class="col-md-4 col-sm-6" style="margin-bottom: 20px">
                <div class="card">
                    <div class="card-body">
                        <img class="img-fluid w-100" src="{{ asset('thm_berita/' . $item->thumbnail) }}"
                        alt="" width="100%">

                        <div class="mt-20">
                            <h4>
                                {{ potong_karakter($item->title, 0, 50) }}
                            </h4>
                            {!! potong_karakter($item->content, 0, 150) !!}
                            <div class="text-right">
                                <a href="/getBerita/{{ $item->id }}" class="primary-btn">Read More</a>
                            </div>
                            <hr>
                            <div style="font-size: 12px" class="text-right">
                                {{ timestamp_ex_indo($item->created_at) }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach



        </div>
        <div class="row">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">
                {!! $Q->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>
</section>
<x-slot name="script">
    <script type="text/javascript">
        $('.nav-item').removeClass('active');
        $('.n-berita').addClass('active');
    </script> 
</x-slot>

</x-public-app>

