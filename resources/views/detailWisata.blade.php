<x-public-app>

    <x-slot name="header">
        <x-navigasi-component></x-navigasi-component>
    </x-slot>

    <x-slot name="footer_slot">
        <x-footer-component></x-footer-component>
    </x-slot>
    <input type="hidden" name="ko" id="ko" value="{{ $wisata->koordinat }}">

    <!-- ======= conten ============-->

    <!--================ About Banner Area =================-->
    <section class="banner_area">
        <div class="banner_inner d-flex align-items-center">
            <div class="container">
                <div class="banner_content text-right">
                    <h3 style="color: #fff">Wisata > Dinas Pariwisata Dan Kebudayaan</h3>
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
                            <img class="img-fluid" src=" {{ asset('/Images_assets/wisata/' . $wisata->gambar) }}"
                                alt="">
                        </div>
                    </div>
                    <div class="offset-md-1 col-md-5">
                        <div class="portfolio_right_text mt-30">
                            <h4>{{ $wisata->nama_wisata }}</h4>
                            <ul class="list">
                                <li><span>Alamat</span>: {{ $wisata->alamat }}</li>
                                <li><span>Kecamatan</span>:
                                    {{ \App\Models\Kecamatan::whereidKec($wisata->kecamatan)->first()['nama'] }}
                                </li>
                                <li><span>Desa</span>:
                                    {{ \App\Models\Desa::whereidKel($wisata->desa)->first()['nama'] }}
                                </li>
                            </ul>

                        </div>
                    </div>
                    <div
                        style="background-color: 2px solid gray; height: 1px; width: 100%; margin-top: 20px; ,margin-bottom: 20px">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        {!! $wisata->deskripsi !!}
                        <div style="width: 100%; border-bottom: 1px solid gray"></div>
                        <div class="comments-area">
                            <h4>{{ \App\Models\commentWisata::where(['post_Id' => $id, 'status' => '1'])->get()->count() . ' Komentar' }}
                            </h4>
                            @foreach (\App\Models\commentWisata::where(['post_Id' => $id, 'status' => '1', 'sub_comment' => '0'])->get() as $item)
                                {{-- left-padding --}}

                                <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="desc">
                                                <h5><a href="#">{{ $item->nama }}</a></h5>
                                                <small>{{ $item->email }}</small>
                                                <p class="date">{{ $item->created_at }} </p>
                                                <p class="comment">
                                                    {{ $item->isi }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="reply-btn">
                                            <a href="/detailWisata/{{ $id }}/{{ $item->id }}"
                                                class="btn-reply text-uppercase">Balas</a>
                                        </div>
                                    </div>
                                </div>
                                @foreach (\App\Models\commentWisata::where(['post_Id' => $id, 'status' => '1', 'sub_comment' => $item->id])->get() as $it)

                                    <div class="comment-list left-padding">
                                        <div class="single-comment justify-content-between d-flex">
                                            <div class="user justify-content-between d-flex">
                                                <div class="desc">
                                                    <h5><a href="#">{{ $it->nama }}</a></h5>
                                                    <small>{{ $it->email }}</small>
                                                    <p class="date">{{ $it->created_at }} </p>
                                                    <p class="comment">
                                                        {{ $it->isi }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="reply-btn">
                                                <a href="/detailWisata/{{ $id }}/{{ $item->id }}"
                                                    class="btn-reply text-uppercase">Balas</a>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            @endforeach

                        </div>
                        <div class="comment-form" id="com---">
                            <h4>Form Komentar</h4>
                            <form action="/UskomentarWisata" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="hidden" name="sub_coment"
                                    value="{{ !empty($id_coment) ? $id_coment : '0' }}">
                                <div class="form-group form-inline">
                                    <div class="form-group col-lg-6 col-md-6 name">
                                        <input type="text" name="nama" class="form-control" id="nama_"
                                            placeholder="Enter Name" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Enter Name'">
                                    </div>
                                    <div class="form-group col-lg-6 col-md-6 email">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Enter email address" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Enter email address'">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subjek" class="form-control" id="subject"
                                        placeholder="Subject" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Subject'">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"
                                        required=""></textarea>
                                </div>
                                <input type="submit" class="primary-btn primary_btn" value="Komentar">
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <div id="map" style="width: 100%; height: 250px"></div>
                        </div>
                        @if (!empty($wisata->vidio))
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <video src="{{ asset('Images_assets/vidio_wisata/' . $wisata->vidio) }}"
                                            width="100%" class="video-preview" controls="controls" />
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                </div>



            </div>
        </div>
    </section>
    <!--================ Start Portfolio Details Area =================-->

    <x-slot name="script">
        <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD_tAQD36pKp9v4at5AnpGbvBUsLCOSJx8&callback=initMap&libraries=&v=weekly">
        </script>
        <script type="text/javascript">
            $('.nav-item').removeClass('active');
            $('.n-produk').addClass('active');

            let map;

            let ko = $("#ko").val();
            let koo = ko.split(",");
            console.log();

            function initMap() {
                map = new google.maps.Map(document.getElementById("map"), {
                    center: {
                        lat: parseFloat(koo[0]),
                        lng: parseFloat(koo[1])
                    },
                    zoom: 8,
                });
                const uluru = {
                    lat: parseFloat(koo[0]),
                    lng: parseFloat(koo[1])
                };
                // const marker = new google.maps.Marker({
                //     position: uluru,
                //     map: map,
                // });
                
                let pos = null;
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        (position, func) => {
                            pos = {
                                lat: position.coords.latitude,
                                lng: position.coords.longitude,
                            };

                            displayRoute(pos,uluru);

                        })
                }
               
            }

            function displayRoute(p1,p2) {

                var start = new google.maps.LatLng(p1);
                var end = new google.maps.LatLng(p2);

                var directionsDisplay = new google.maps
                    .DirectionsRenderer(); // also, constructor can get "DirectionsRendererOptions" object
                directionsDisplay.setMap(map); // map should be already initialized.

                var request = {
                    origin: start,
                    destination: end,
                    travelMode: google.maps.TravelMode.DRIVING
                };
                var directionsService = new google.maps.DirectionsService();
                directionsService.route(request, function(response, status) {
                    if (status == google.maps.DirectionsStatus.OK) {
                        directionsDisplay.setDirections(response);
                    }
                });
            }

        </script>
    </x-slot>
</x-public-app>
