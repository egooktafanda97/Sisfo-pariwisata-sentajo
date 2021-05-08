 <!--================Header Menu Area =================-->
 <header class="header_area">
     <div class="main_menu">
         <nav class="navbar navbar-expand-lg navbar-light">
             <div class="container">
                 <!-- Brand and toggle get grouped for better mobile display -->
                 <a class="navbar-brand" href="index.html"><img
                         src="{{ asset('images/' . \App\Models\website::first()['logo']) }}" width="150px"
                         height="56px" alt=""></a>
                 <button class="navbar-toggler" type="button" data-toggle="collapse"
                     data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                     aria-label="Toggle navigation">
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                 </button>
                 <!-- Collect the nav links, forms, and other content for toggling -->
                 <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                     <ul class="nav navbar-nav menu_nav justify-content-end">
                         <li class="nav-item n-home">
                             <a class="nav-link" href="/"><strong>Home</strong></a>
                         </li>
                         <li class="nav-item n-tentang">
                             <a class="nav-link" href="/tentang"><strong>Tentang</strong></a>
                         </li>
                         <li class="nav-item submenu dropdown active">
                             <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                                 aria-haspopup="true" aria-expanded="false"><strong>Wisata & Budaya</strong></a>
                             <ul class="dropdown-menu">
                                 <li class="nav-item"><a class="nav-link" href="/getWisata">Wisata</a></li>
                                 <li class="nav-item"><a class="nav-link" href="/getBudaya">Budaya</a></li>
                                 <li class="nav-item"><a class="nav-link" href="/getCagarBudaya">Cagar Budaya</a></li>
                             </ul>
                         </li>
                         <li class="nav-item n-berita">
                             <a class="nav-link " href="/berita"><strong>Berita</strong></a>
                         </li>
                         <li class="nav-item n-blog"><a class="nav-link" href="/blog"><strong>Blog</strong></a></li>
                         <li class="nav-item n-sejarah"><a class="nav-link" href="/getBlog/1"><strong>Sejarah</strong></a></li>
                         <li class="nav-item n-kontak"><a class="nav-link" href="/kontak"><strong>Kontak</strong></a>
                         </li>
                     </ul>
                 </div>
             </div>
         </nav>
     </div>
 </header>
 <!--================Header Menu Area =================-->
