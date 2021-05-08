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
         <h3 style="color: #fff">Cagar Budaya > Dinas Pariwisata Dan Kebudayaan</h3>
         <p style="color: #fff">Kuantan Singingi</p>
       </div>
     </div>
   </div>
 </div>
</section>


<!--================ Start About Area =================-->
<section class="contact_area section_gap">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12 text-center">
        <div class="main-title">
          <h1>CAGAR BUDAYA</h1>
        </div>
        <div class="row">
         @foreach ($cagar as $element)
         <div class="col-md-4 grid-item">
          <div class="projects_item">
            <img class="img-fluid w-100" style="height: 250px" src="{{ asset('/Images_assets/cagar_budaya/'.$element->gambar) }}" alt="">
            <div class="projects_text">
              <a href="{{ url('getDetailCagar/' . $element->id) }}">
                <h4>{{ $element->nama_situs }} </h4>
              </a>

            </div>
          </div>
        </div>
        @endforeach
        <div class="col-md-12">
          <div style="width: 100%" class="text-right">
           <center>{!! $cagar->links('pagination::bootstrap-4') !!}</center> 
         </div>
       </div>
     </div>
   </div>
 </div>
</section>
<!--================ End About Area =================-->


<x-slot name="script">
  <script type="text/javascript">
    $('.nav-item').removeClass('active');
    $('.n-kontak').addClass('active');
  </script> 
</x-slot>


</x-public-app>