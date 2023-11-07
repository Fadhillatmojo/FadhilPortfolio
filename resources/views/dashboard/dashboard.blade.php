@extends('layouts.master')
@section('title')
	Dashboard
@endsection
@section('container')
	{{--  alert untuk menunjukkan bahwa berhasil login  --}}
	@if ($message = Session::get('message'))
		<script>
			alert('{{ $message }}')
		</script>
	@endif
	@if ($message = Session::get('success'))
		<script>
			alert('{{ $message }}')
		</script>
	@endif
	{{--  <!-- jumbotron -->  --}}
	<div class="jumbotron mb-5" id="jumbotron">
		<img src="image/jumbotron.png" class="img-fluid jumbotron-img" alt="jumbotron">
		<h2>Simple | Effective | Straight</h2>
		<p>are 3 words that describe each of my projects.</p>
	</div>
	{{--  <!-- jumbotron end -->  --}}

	{{--  Card portfolios section  --}}
	<hr>
	<div class="container text-center mt-5 mb-5" id="portfolios">
		<h3 class="mb-5">
			<strong>
				My Works
			</strong>
		</h3>
		<div class="row row-cols-1 row-cols-lg-3 g-4 mb-3">
			<div class="col">
				<div class="card">
					<img src="/image/porto1.jpg" class="card-img-top" alt="...">
					<div class="card-body p-4">
						<h5 class="card-title">Alleyka Landing Page</h5>
						<p class="card-text mb-5">
							Alleyka is a company that hold a site which allows user to interact to other people who are close to them
						</p>
						<a href="https://dribbble.com/shots/17818085-Alleyka-Website-UI-Design"  class="btn_chat" style="text-decoration: none">Look In my Dribbble</a>
					</div>
				</div>	
			</div>
			<div class="col">
				<div class="card">
					<img src="/image/porto2.jpg" class="card-img-top" alt="...">
					<div class="card-body p-4">
						<h5 class="card-title">Music App UI</h5>
						<p class="card-text mb-5">
							Music app UI design is one of the theme that descripted in Design League Jam.
						</p>
						<a href="https://dribbble.com/shots/14702540-Music-Streaming-App"  class="btn_chat" style="text-decoration: none">Go to The Dribbble</a>
					</div>
				</div>	
			</div>
			<div class="col">
				<div class="card">
					<img src="/image/alimbank.jpg" class="card-img-top" alt="...">
					<div class="card-body p-4">
						<h5 class="card-title">Alim Bank</h5>
						<p class="card-text mb-5">
							Alim bank is a banking app that i made to design league challenge. Focused on the banking app
						</p>
						<a href="https://dribbble.com/shots/20295432-Alimbank-Mobile-Banking-App" target="blank_" class="btn_chat" style="text-decoration: none">Go to The Dribbble</a>
					</div>
				</div>	
			</div>
		</div>
		<div class="row row-cols-1 row-cols-lg-3 g-4">
			<div class="col">
				<div class="card">
					<img src="/image/porto1.jpg" class="card-img-top" alt="...">
					<div class="card-body p-4">
						<h5 class="card-title">Alleyka Landing Page</h5>
						<p class="card-text mb-5">
							Alleyka is a company that hold a site which allows user to interact to other people who are close to them
						</p>
						<a href="https://dribbble.com/shots/17818085-Alleyka-Website-UI-Design"  class="btn_chat" style="text-decoration: none">Look In my Dribbble</a>
					</div>
				</div>	
			</div>
			<div class="col">
				<div class="card">
					<img src="/image/porto2.jpg" class="card-img-top" alt="...">
					<div class="card-body p-4">
						<h5 class="card-title">Music App UI</h5>
						<p class="card-text mb-5">
							Music app UI design is one of the theme that descripted in Design League Jam.
						</p>
						<a href="https://dribbble.com/shots/14702540-Music-Streaming-App"  class="btn_chat" style="text-decoration: none">Go to The Dribbble</a>
					</div>
				</div>	
			</div>
			<div class="col">
				<div class="card">
					<img src="/image/alimbank.jpg" class="card-img-top" alt="...">
					<div class="card-body p-4">
						<h5 class="card-title">Alim Bank</h5>
						<p class="card-text mb-5">
							Alim bank is a banking app that i made to design league challenge. Focused on the banking app
						</p>
						<a href="https://dribbble.com/shots/20295432-Alimbank-Mobile-Banking-App" target="blank_" class="btn_chat" style="text-decoration: none">Go to The Dribbble</a>
					</div>
				</div>	
			</div>
		</div>
	</div>
	{{--  Card portfolios section end --}}
	
	{{--  Service section  --}}
	<hr class="mb-5">
	<div class="container service text-center mt-5 d-flex align-items-center flex-column p-1" id="services">
		<h3 class="mb-5">
			<strong>What Can I Do</strong>
		</h3>
		<div class="row row-cols-2 row-cols-lg-3 g-2">
			<div class="col">
				<div class="border-0 d-flex justify-center flex-column align-items-center">
					<img src="/image/icon1.png" class="card-img-top w-25" alt="...">
					<div class="card-body p-4">
						<h5 class="card-title">Web Development</h5>
						<p class="card-text mb-5">
							HTML/CSS, JavaScript Animation, CMS, Laravel, Responsive Website
						</p>
					</div>
				</div>	
			</div>
			<div class="col">
				<div class="border-0 d-flex justify-center flex-column align-items-center">
					<img src="/image/icon2.png" class="card-img-top w-25" alt="...">
					<div class="card-body p-4">
						<h5 class="card-title">Mobile Development</h5>
						<p class="card-text mb-5">
							XML/Kotlin/Java, Flutter, Multiplatform app, Responsive Mobile Apps
						</p>
					</div>
				</div>	
			</div>
			<div class="col">
				<div class="border-0 d-flex justify-center flex-column align-items-center">
					<img src="/image/icon3.png" class="card-img-top w-25" alt="...">
					<div class="card-body p-4">
						<h5 class="card-title">UI/UX Design</h5>
						<p class="card-text mb-5">
							UI framework design, design system, UX research, UX frameworks, Prototyping
						</p>
					</div>
				</div>	
			</div>
			<div class="col">
				<div class="border-0 d-flex justify-center flex-column align-items-center">
					<img src="/image/icon4.png" class="card-img-top w-25" alt="...">
					<div class="card-body p-4">
						<h5 class="card-title">Brand Design</h5>
						<p class="card-text mb-5">
							Brand guideline, SEO, Social media performance, Brand strategy
						</p>
					</div>
				</div>	
			</div>
			<div class="col">
				<div class="border-0 d-flex justify-center flex-column align-items-center">
					<img src="/image/icon5.png" class="card-img-top w-25" alt="...">
					<div class="card-body p-4">
						<h5 class="card-title">Icons Design</h5>
						<p class="card-text mb-5">
							Illustrator, Photoshop, icon themes, icon system
						</p>
					</div>
				</div>	
			</div>
			<div class="col">
				<div class="border-0 d-flex justify-center flex-column align-items-center">
					<img src="/image/icons6.png" class="card-img-top w-25" alt="...">
					<div class="card-body p-4">
						<h5 class="card-title">Software Research</h5>
						<p class="card-text mb-5">
							Framework, design thinking, requirement analysis, risk mitigation
						</p>
					</div>
				</div>	
			</div>
		</div>
	</div>
	{{--  service section end  --}}
	{{--  About section start  --}}
	<div class="row row-cols-3 row-cols-lg-3 g-2" id="about">
		<div class="col">
			<div class="card border-2 p-4" style="border-color: black !important; color:black;">
				<h5>
					My name is Fadhil, I’m a student of Software Engineering in UGM. I have experienced in graphic design and UI/UX design for 4 years.
				</h5>
			</div>
		</div>
		<div class="col">
			<div class="card border-2 p-4" style="border-color: black !important; color:black;">
				<h5>
					My name is Fadhil, I’m a student of Software Engineering in UGM. I have experienced in graphic design and UI/UX design for 4 years.
				</h5>
			</div>
		</div>
		<div class="col">
			<div class="card border-2 p-4" style="border-color: black !important; color:black;">
				<h5>
					My name is Fadhil, I’m a student of Software Engineering in UGM. I have experienced in graphic design and UI/UX design for 4 years.
				</h5>
			</div>
		</div>

	</div>
	{{--  About section end  --}}
	
	

	
	
@endsection