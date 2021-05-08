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
                    <h3 style="color: #fff">Berita > Dinas Pariwisata Dan Kebudayaan</h3>
                    <p style="color: #fff">Kuantan Singingi</p>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--================End About Banner Area =================-->
    <section class="blog_area single-post-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 posts-list">
                    <div class="single-post row">
                        {{-- <div class="col-lg-12 text-center">
                            <div class="feature-img">
                                
                            </div>
                        </div> --}}
                        <div class="col-lg-3  col-md-3">
                            <div class="blog_info text-right">
                                <ul class="blog_meta list">
                                    <li><a>
                                            {{ \App\Models\User::whereid($Q->user_id)->first()['name'] }}
                                            <i class="lnr lnr-user"></i></a></li>
                                    <li><a href="#"> {{ timestamp_ex_indo($Q->created_at) }}<i
                                                class="lnr lnr-calendar-full"></i></a></li>
                                    <li><a href="#">{{ $Q->viwer }}<i class="lnr lnr-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 blog_details">
                            <h2>{{ $Q->title }}</h2>
                            <img class="img-fluid" src="{{ asset('thm_berita/' . $Q->thumbnail) }}" alt="">
                            <br><br>
                            {!! $Q->content !!}
                        </div>
                        <div class="col-md-3"></div>

                        <div class="col-md-9">
                            <div style="width: 100%; border-bottom: 1px solid gray"></div>
                            <div class="comments-area">
                                <h4>{{ \App\Models\Commet_news::where(['post_Id' => $id, 'status' => '1'])->get()->count() . ' Komentar' }}
                                </h4>
                                @foreach (\App\Models\Commet_news::where(['post_Id' => $id, 'status' => '1', 'sub_comment' => '0'])->get() as $item)
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
                                                <a href="/getBerita/{{ $id }}/{{ $item->id }}"
                                                    class="btn-reply text-uppercase">Balas</a>
                                            </div>
                                        </div>
                                    </div>
                                    @foreach (\App\Models\Commet_news::where(['post_Id' => $id, 'status' => '1', 'sub_comment' => $item->id])->get() as $it)

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
                                                    <a href="/getBerita/{{ $id }}/{{ $item->id }}"
                                                        class="btn-reply text-uppercase">Balas</a>
                                                </div>
                                            </div>
                                        </div>

                                    @endforeach

                                @endforeach

                            </div>
                            <div class="comment-form" id="com---">
                                <h4>Form Komentar</h4>
                                <form action="/Uskomentar" method="post">
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
                                        <textarea class="form-control mb-10" rows="5" name="message"
                                            placeholder="Messege" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Messege'" required=""></textarea>
                                    </div>
                                    <input type="submit" class="primary-btn primary_btn" value="Komentar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-slot name="script">
        @if (!empty($id_coment))
            <script>
                $('html, body').animate({
                    scrollTop: eval($('#com---').offset().top - 70)
                }, 2000);
                $("#nama_").focus();

            </script>
        @endif
        <script type="text/javascript">
            $('.nav-item').removeClass('active');
            $('.n-berita').addClass('active');

        </script>
    </x-slot>

</x-public-app>
