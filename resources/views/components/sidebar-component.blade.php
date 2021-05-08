{{-- <section>
	<aside id="leftsidebar" class="sidebar">
		<!-- User Info -->
		<div class="user-info">
			<div class="image">
				<h5>
					{{ isset($namaUser)?$namaUser:'' }}
				</h5>
			</div>
		</div>
		<!-- #User Info -->
		<!-- Menu -->
		<div class="menu">
			<ul class="list">
				<li class="header">MAIN NAVIGATION</li>

				
				{{ isset($itemNav)?$itemNav:'' }}

			</ul>  
		</div>
		<!-- #Menu -->
		<!-- Footer -->
		<div class="legal">
			<div class="copyright">
				&copy; 2020 <a href="javascript:void(0);"></a>.
			</div>
		</div>
		<!-- #Footer -->
	</aside>

	<aside id="rightsidebar" class="right-sidebar">
		<ul class="nav nav-tabs tab-nav-right" role="tablist">
			<li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
			<li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active in active" id="skins">
				<ul class="demo-choose-skin">
					<li data-theme="red" >
						<div class="red"></div>
						<span>Red</span>
					</li>
					<li data-theme="pink" >
						<div class="pink"></div>
						<span>Pink</span>
					</li>
					<li data-theme="purple">
						<div class="purple"></div>
						<span>Purple</span>
					</li>
					<li data-theme="deep-purple">
						<div class="deep-purple"></div>
						<span>Deep Purple</span>
					</li>
					<li data-theme="indigo">
						<div class="indigo"></div>
						<span>Indigo</span>
					</li>
					<li data-theme="blue">
						<div class="blue"></div>
						<span>Blue</span>
					</li>
					<li data-theme="light-blue">
						<div class="light-blue"></div>
						<span>Light Blue</span>
					</li>
					<li data-theme="cyan">
						<div class="cyan"></div>
						<span>Cyan</span>
					</li>
					<li data-theme="teal">
						<div class="teal"></div>
						<span>Teal</span>
					</li>
					<li data-theme="green">
						<div class="green"></div>
						<span>Green</span>
					</li>
					<li data-theme="light-green">
						<div class="light-green"></div>
						<span>Light Green</span>
					</li>
					<li data-theme="lime">
						<div class="lime"></div>
						<span>Lime</span>
					</li>
					<li data-theme="yellow">
						<div class="yellow"></div>
						<span>Yellow</span>
					</li>
					<li data-theme="amber">
						<div class="amber"></div>
						<span>Amber</span>
					</li>
					<li data-theme="orange" class="active">
						<div class="orange"></div>
						<span>Orange</span>
					</li>
					<li data-theme="deep-orange">
						<div class="deep-orange"></div>
						<span>Deep Orange</span>
					</li>
					<li data-theme="brown">
						<div class="brown"></div>
						<span>Brown</span>
					</li>
					<li data-theme="grey">
						<div class="grey"></div>
						<span>Grey</span>
					</li>
					<li data-theme="blue-grey" >
						<div class="blue-grey"></div>
						<span>Blue Grey</span>
					</li>
					<li data-theme="black">
						<div class="black"></div>
						<span>Black</span>
					</li>
				</ul>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="settings">
				<div class="demo-settings">
					<p>GENERAL SETTINGS</p>
					<ul class="setting-list">
						<li>
							<span>Report Panel Usage</span>
							<div class="switch">
								<label><input type="checkbox" checked><span class="lever"></span></label>
							</div>
						</li>
						<li>
							<span>Email Redirect</span>
							<div class="switch">
								<label><input type="checkbox"><span class="lever"></span></label>
							</div>
						</li>
					</ul>
					<p>SYSTEM SETTINGS</p>
					<ul class="setting-list">
						<li>
							<span>Notifications</span>
							<div class="switch">
								<label><input type="checkbox" checked><span class="lever"></span></label>
							</div>
						</li>
						<li>
							<span>Auto Updates</span>
							<div class="switch">
								<label><input type="checkbox" checked><span class="lever"></span></label>
							</div>
						</li>
					</ul>
					<p>ACCOUNT SETTINGS</p>
					<ul class="setting-list">
						<li>
							<span>Offline</span>
							<div class="switch">
								<label><input type="checkbox"><span class="lever"></span></label>
							</div>
						</li>
						<li>
							<span>Location Permission</span>
							<div class="switch">
								<label><input type="checkbox" checked><span class="lever"></span></label>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</aside>
</section> --}}

<section>
	<!-- Left Sidebar -->
	<aside id="leftsidebar" class="sidebar">
		<!-- User Info -->
		<div class="user-info">
			<div class="image">
				<img src="{{ asset('/images/default.png') }}" width="48" height="48" alt="User" />
			</div>
			<div class="info-container">
				<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}</div>
				<div class="email">{{ Auth::user()->email }}</div>
			</div>
		</div>
		<!-- #User Info -->
		<!-- Menu -->
		<div class="menu">
			<ul class="list">
				<li class="header">MAIN NAVIGATION</li>
				<li class="home">
					<a href="/dashboard">
						<i class="material-icons">home</i>
						<span>Home</span>
					</a>
				</li>
				<li>
					<a href="javascript:void(0);" class="menu-toggle wisata_dan_budaya">
						<i class="material-icons">spa</i>
						<span>Wisata & Budaya</span>
					</a>
					<ul class="ml-menu">
						<li class="wisata">
							<a href="/wisata">
								<span>Wisata</span>
							</a>
						</li>
						<li class="budaya">
							<a href="/budaya">
								<span>Budaya</span>
							</a>
						</li>
						<li class="cagar_budaya">
							<a href="/cagarBudaya">
								<span>Cagar Budaya</span>
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="javascript:void(0);" class="menu-toggle profile">
						<i class="material-icons">account_balance</i>
						<span>Profile</span>
					</a>
					<ul class="ml-menu">
						<li class="profile_tentang">
							<a href="/addItemProfile">
								<i class="material-icons">account_balance</i>
								<span>Tentang</span>
							</a>
						</li>
						<li class="profile_tim" hidden>
							<a href="/addTim">
								<i class="material-icons">supervisor_account</i>
								<span>Tim</span>
							</a>
						</li>
						<li class="profile_kontak">
							<a href="/contact">
								<i class="material-icons">perm_contact_calendar</i>
								<span>Kontak</span>
							</a>
						</li>
					</ul>
				</li>


				<li>
					<a href="javascript:void(0);" class="menu-toggle berita">
						<i class="material-icons">card_travel</i>
						<span>Berita</span>
					</a>
					<ul class="ml-menu">
						<li class="berita_child">
							<a href="/admgetBerita">
								<i class="material-icons">card_travel</i>
								<span>Berita</span>
							</a>
						</li>
					</ul>
				</li>


				<li class="blog">
					<a href="{{ url('admBlog') }}" class=" waves-effect waves-block blog">
						<i class="material-icons">language</i>
						<span>Blog</span>
					</a>
				</li>
				<li class="patner" hidden>
					<a href="{{ url('/admPatner') }}" class=" waves-effect waves-block patner">
						<i class="material-icons">ac_unit</i>
						<span>Patner</span>
					</a>
				</li>


				<li>
					<a href="javascript:void(0);" class="menu-toggle setting">
						<i class="material-icons">settings</i>
						<span>Pengaturan</span>
					</a>
					<ul class="ml-menu">
						<li>
							<a href="/setWeb">
								<i class="material-icons">language</i>
								<span>Pengaturan Website</span>
							</a>
						</li>
						<li>
							<a href="/account">
								<i class="material-icons">account_circle</i>
								<span>Admin</span>
							</a>
						</li>
					</ul>
				</li>
				<form method="POST" action="{{ route('logout') }}">
					@csrf
					<li class="blog">
						<a href="{{ route('logout') }}"
						onclick="event.preventDefault();
						this.closest('form').submit();" class=" waves-effect waves-block blog">
						<i class="material-icons">reply</i>
						<span>Logout</span>
					</a>
				</li>
			</form>
			<li class="header" style="height: 100px"></li>


		</ul>
	</div>
	<!-- #Menu -->
	<!-- Footer -->
	<div class="legal">
		<div class="copyright">
			&copy; {{date('Y-m-d')}} <a href="javascript:void(0);">Koperasi</a>.
		</div>
		<div class="version">
			<b>Version: </b> 1.0
		</div>
	</div>
	<!-- #Footer -->
</aside>
        <!-- #END# Left Sidebar -->