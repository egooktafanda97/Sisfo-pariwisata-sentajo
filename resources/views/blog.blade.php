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

                <h3 style="color: #fff">Blog Dinas Pariwisata Dan Kebudayaan</h3>
                <p style="color: #fff">Kuantan Singingi</p>

            </div>
        </div>
    </div>
</div>
</section>
<!--================End About Banner Area =================-->

<!--================Blog Area =================-->
  {{--   <section class="blog_area" style="margin-top: 100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="blog_left_sidebar">
                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <ul class="blog_meta list">
                                        <li><a>12 Dec, 2017<i class="lnr lnr-calendar-full"></i></a></li>
                                        <li><a>1.2M Views<i class="lnr lnr-eye"></i></a></li>
                                        <li><a>06 <i class="lnr lnr-bubble"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                    <img src="{{asset('theme')}}/img/blog/main-blog/m-blog-1.jpg" alt="">
                                    <div class="blog_details">
                                        <a href="/getBlog">
                                            <h2>Blog Title</h2>
                                        </a>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis magnam soluta, perferendis quaerat labore maiores odio corrupti officia nam facere, ducimus iusto. Quo, ratione! Laborum ratione doloribus repellendus aliquam perspiciatis.</p>
                                        <a href="/getBlog" class="primary-btn">View More</a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    --}}


    {{-- dsg new --}}
    <section class="blog_area" style="margin-top: 100px; margin-bottom: 100px">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog_left_sidebar">


                        @foreach ($Blogitem as $element)
                        <article class="row blog_item">
                            <div class="col-md-3">
                                <div class="blog_info text-right">
                                    <div class="post_tag">
                                        <span class="badge badge-primary" style="padding: 5px">
                                         {{  $element->category  }}
                                     </span>
                                 </div>
                                 <ul class="blog_meta list">
                                    <li>
                                        <a href="#">
                                           {{ \App\Models\User::whereid($element->user_id)->first()['name'] }}
                                           <i class="lnr lnr-user"></i></a>
                                       </li>
                                       <li>
                                        <a href="#">
                                           {{ timestamp_ex_indo($element->created_at) }}
                                           <i class="lnr lnr-calendar-full"></i></a>
                                       </li>
                                       <li>
                                        <a href="#">

                                            {{ $element->viwer }}

                                            <i class="lnr lnr-eye"></i></a> 
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="blog_post">
                                   <img src="{{asset('thm_berita/'.$element->thumbnail)}}" style="width: 100%; max-height: 300px" alt="">
                                   <div class="blog_details">
                                    <a href="single-blog.html">
                                        <h2>
                                            {{ $element->title }}
                                        </h2>
                                    </a>

                                    {!! \Illuminate\Support\Str::words(strip_tags($element->content), 100, '...') !!}

                                    {{-- {!! potong_karakter($element->content,0,300) !!} --}}
                                    <hr>

                                    <a href="/getBlog/{{$element->id}}" class="primary_btn" style="color: blue">View More</a>
                                </div>
                            </div>
                        </div>
                    </article>
                    @endforeach

                    
                    {!! $Blogitem->links('pagination::bootstrap-4') !!}
                    


                    {{-- pagination --}}
                </div>
            </div>








            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Posts">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                            </span>
                        </div><!-- /input-group -->
                        <div class="br"></div>
                    </aside>
                  {{--   <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Popular Posts</h3>
                        <div class="media post_item">
                            <img src="img/blog/popular-post/post1.jpg" alt="post">
                            <div class="media-body">
                                <a href="single-blog.html">
                                    <h3>Space The Final Frontier</h3>
                                </a>
                                <p>02 Hours ago</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="img/blog/popular-post/post2.jpg" alt="post">
                            <div class="media-body">
                                <a href="single-blog.html">
                                    <h3>The Amazing Hubble</h3>
                                </a>
                                <p>02 Hours ago</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="img/blog/popular-post/post3.jpg" alt="post">
                            <div class="media-body">
                                <a href="single-blog.html">
                                    <h3>Astronomy Or Astrology</h3>
                                </a>
                                <p>03 Hours ago</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="img/blog/popular-post/post4.jpg" alt="post">
                            <div class="media-body">
                                <a href="single-blog.html">
                                    <h3>Asteroids telescope</h3>
                                </a>
                                <p>01 Hours ago</p>
                            </div>
                        </div>
                        <div class="br"></div>
                    </aside> --}}
                    {{-- <aside class="single_sidebar_widget ads_widget" style="margin-top: 0;">
                        <a href="#"><img class="img-fluid" src="img/blog/add.jpg" alt=""></a>
                        <div class="br"></div>
                    </aside> --}}
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Post Catgories</h4>
                        <ul class="list cat-list">
                            @foreach ($kategori as $element => $val)
                            <li>
                                <a href="#" class="d-flex justify-content-between">
                                    <p>{{ $element }}</p>
                                    <p>{{ $kategori[$element]->count() }}</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        <div class="br"></div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- ======= --}}
<x-slot name="script">
    <script type="text/javascript">
        $('.nav-item').removeClass('active');
        $('.n-blog').addClass('active');
    </script> 
</x-slot>
</x-public-app>