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

                   <h3 style="color: #fff">Kontak > Dinas Pariwisata Dan Kebudayaan</h3>
                   <p style="color: #fff">Kuantan Singingi</p>

               </div>
           </div>
       </div>
   </div>
</section>
<!--================End About Banner Area ====-->
<section class="contact_area section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 text-center">
                <div class="main-title">
                    <h1>Kontak</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
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
                                    {{\App\Models\Contact::first()['alamat']}}
                                </p>
                            </div>
                            <div class="info_item">
                                <i class="fa fa-phone fa-image-contact" aria-hidden="true"></i>
                                <p align="left">
                                    {{\App\Models\Contact::first()['hp']}}
                                </p>
                            </div>
                            <div class="info_item">
                                <i class="fa fa-envelope fa-image-contact" aria-hidden="true"></i>
                                <p align="left">
                                    {{\App\Models\Contact::first()['email']}}
                                </p>
                            </div>
                            <div class="info_item">
                                <i class="fa fa-facebook fa-image-contact" aria-hidden="true"></i>
                                <p align="left">
                                    {{\App\Models\Contact::first()['fb']}}
                                </p>
                            </div>
                            <div class="info_item">
                                <i class="fa fa-whatsapp fa-image-contact" aria-hidden="true"></i>
                                <p align="left">
                                    {{\App\Models\Contact::first()['wa']}}
                                </p>
                            </div>
                            <div class="info_item">
                                <i class="fa fa-twitter fa-image-contact"aria-hidden="true"></i>
                                <p align="left">
                                    {{\App\Models\Contact::first()['tw']}}
                                </p>
                            </div>
                            <div class="info_item">
                                <i class="fa fa-instagram fa-image-contact" aria-hidden="true"></i>
                                <p align="left">
                                    {{\App\Models\Contact::first()['ig']}}
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
<!--================Contact Area =================-->=============-->

<x-slot name="script">
    <script type="text/javascript">
        $('.nav-item').removeClass('active');
        $('.n-kontak').addClass('active');
    </script> 
</x-slot>


</x-public-app>