<nav class="navbar navbar-expand-lg bg-white border-1 mt-2 sticky-top" style="top:10px !important;">
	<div class="container-fluid">
		<a class="navbar-brand logo" href="#jumbotron">FADHILL ATMOJO</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto ms-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link" href="#">ABOUT</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" aria-current="page" href="#portfolios">PORTFOLIOS</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#services">SERVICE</a>
				</li>
			</ul>
			<form class="d-flex" action="{{ route('logout') }}" method="POST">
				@csrf
				<button class="btn_chat" type="submit">LOGOUT</button>
			</form>
			<a class="btn_chat mx-3" href="{{ route('user.index') }}">Cek user</a>
			<a class="btn_chat" href="{{ route('gallery.index') }}">Gallery</a>
		</div>
	</div>
</nav>