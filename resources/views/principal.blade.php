@extends('layouts.tema')

@section('title', 'Inicio')

@section('header_type', 'stick-top style3')

@section('content')

<section>
	<div class="block no-padding">
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="find-cand-sec">
						<div class="iconmove"><img class="animute" src="{{URL::asset('tema/images/textura-01.png')}}" alt="" /></div>
						<div class="mockup-top"><img class="animute" src="{{URL::asset('tema/images/fondo-home.png')}}" alt="" /></div>
						<div class="mockup-bottom"><img src="{{URL::asset('tema/images/persona.png')}}" alt="" /></div>
						<div class="container">
							<div class="row">
								<div class="col-lg-8">
									<div class="find-cand">
										<h3>La forma mas facil<br> de ofrecer tus talentos</h3>
										<span>We have 2.567 resumes in our database</span>
										<form method="POST" action="{{ route('talentos') }}">
											@csrf
											<div class="job-field">
												<input type="text" name="search" placeholder="Search freelancer services (e.g. logo design)" />
											</div>
											<div class="job-field">
												<select data-placeholder="City, province or region" class="chosen-city">
													<option>Selecciona industria</option>
													@foreach($industries as $industry)
														<option id="{{$industry->id}}">{{$industry->name}}</option>
													@endforeach
												</select>
											</div>
											<button type="submit"><i class="la la-search"></i></button>
										</form>
									</div>      
								</div>
							</div>
						</div>
					</div>
					<div class="scroll-to style2">
						<a href="#scroll-here" title=""><i class="la la-arrow-down"></i></a>
					</div>
				</div>
			</div>
			<div id="enlaces">
				<div class="row">
					<div class="col-lg-4 amarillo">
						<a href="{{ url('suscripcion') }}">
							<div class="mask">
								<span><h2>Publica tu talento</h2>
									<p>Crea tu perfil y cuentale al mundo tus habilidades</p></span>
									<img src="{{URL::asset('tema/images/publica.png')}}">
								</div>
							</a>
						</div>

						<div class="col-lg-4 naranja">
							<a href="{{ url('talentos') }}">
								<div class="mask">
									<span><h2>Busca tu talento</h2> 
										<p>Busca los talentos ideales para tus proyectos</p></span>
										<img src="{{URL::asset('tema/images/busca.png')}}">
									</div>
								</a>
							</div>

							<div class="col-lg-4 azul">
								<a href="{{ url('canjes') }}">
									<div class="mask">
										<span><h2>Canjea tu talento</h2>
											<p>Intercambia tu talento y apoya a otros</p></span>
											<img src="{{URL::asset('tema/images/canjea.png')}}">
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>

			</section>


			<section id="scroll-here">
				<div class="block gray">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="heading">
									<h2>Top 10 de nuestros talentos</h2>
									<span>Descubre los mejores talentos de nuestra plataforma</span>
								</div><!-- Heading -->
								<div class="team-sec">
									<div class="row" id="team-carousel">
										@foreach($tops as $top)
										<div class="col-lg-3">
											<div class="team">
												<div class="team-img"><img src="{{URL::asset('images/users/'.$top->avatar)}}" alt="" style="max-width: 101px" /></div>
												<div class="team-detail">
													<h3><a href="#" title="">{{$top->name}} {{$top->lastname}}</a></h3>
													<span>I Knew You Were Trouble</span>
													<p>{{$top->abilities}}</p>
													<a href="#" title="">Ver Perfil <i class="la la-long-arrow-right"></i></a>
												</div>
											</div><!-- Team -->
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>



			<section>
				<div class="block double-gap-top double-gap-bottom">
					<div data-velocity="-.1" style="background: url({{URL::asset('tema/images/foto-filtro.png')}}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color green"></div><!-- PARALLAX BACKGROUND IMAGE -->
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="simple-text-block">
									<h3>¡Haz la diferencia con tus talentos en linea!</h3>
									<span>¡Muestra tus talentos en linea en cuestion de minutos!</span>
									<a href="{{url('suscripcion')}}" title="" class="rounded">Crear Cuenta</a>
								</div>
							</div>
						</div>
					</div>  
				</div>
			</section>



			<section id="pasos">
				<div class="block remove-top">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<div class="heading">
									<h2>Como Funciona</h2>
									<span>cada mes, más de 7 millones de Jobhunt recurren al sitio web en su búsqueda de trabajo, realizando más de <br />60,000 solicitudes cada día.
									</span>
								</div><!-- Heading -->
								<div class="how-to-sec style2">
									<div class="how-to">
										<span class="how-icon"><i class="la la-user"></i></span>
										<h3>Registra tu cuenta</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris dignissim suscipit feugiat.</p>
									</div>
									<div class="how-to">
										<span class="how-icon"><i class="la la-file-archive-o"></i></span>
										<h3>Ofrece o busca tus talentos</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris dignissim suscipit feugiat.</p>
									</div>
									<div class="how-to">
										<span class="how-icon"><i class="la la-list"></i></span>
										<h3>Aplica el talento</h3>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris dignissim suscipit feugiat.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

<!--<section>
<div class="block gray">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="heading">
<h2>Top Company Registered</h2>
<span>Some of the companies we've helped recruit excellent applicants over the years.</span>
</div><!-- Heading                      <div class="top-company-sec">
<div class="row" id="companies-carousel">
<div class="col-lg-3">
<div class="top-compnay style2">
<img src="http://placehold.it/180x180" alt="" />
<h3><a href="#" title="">Symtech</a></h3>
<span>United States, Los Angeles</span>
<a href="#" title="">4 Open Positon</a>
</div><!-- Top Company 
</div>
<div class="col-lg-3">
<div class="top-compnay style2">
<img src="http://placehold.it/180x180" alt="" />
<h3><a href="#" title="">Symtech</a></h3>
<span>United States, Los Angeles</span>
<a href="#" title="">4 Open Positon</a>
</div><!-- Top Company 
</div>
<div class="col-lg-3">
<div class="top-compnay style2">
<img src="http://placehold.it/180x180" alt="" />
<h3><a href="#" title="">Symtech</a></h3>
<span>United States, Los Angeles</span>
<a href="#" title="">4 Open Positon</a>
</div><!-- Top Company 
</div>
<div class="col-lg-3">
<div class="top-compnay style2">
<img src="http://placehold.it/180x180" alt="" />
<h3><a href="#" title="">Symtech</a></h3>
<span>United States, Los Angeles</span>
<a href="#" title="">4 Open Positon</a>
</div><!-- Top Company 
</div>
<div class="col-lg-3">
<div class="top-compnay style2">
<img src="http://placehold.it/180x180" alt="" />
<h3><a href="#" title="">Symtech</a></h3>
<span>United States, Los Angeles</span>
<a href="#" title="">4 Open Positon</a>
</div><!-- Top Company 
</div>
</div>
</div>
</div>
</div>
</div>  
</div>
</section>-->


<section>
	<div class="block">
		<div data-velocity="-.3" style="background: url({{URL::asset('tema/images/resource/parallax6.jpg')}}) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible"></div><!-- PARALLAX BACKGROUND IMAGE -->
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading">
						<h2>Top 10 casos de exito</h2>
						<span>Algunas palabras de nuestros candidatos sobre su exito</span>
					</div><!-- Heading -->
					<div class="reviews-sec" id="reviews">
						<div class="col-lg-12">
							<div class="reviews style2">
								<img src="http://placehold.it/101x101" alt="" />
								<h3>Augusta Silva <span>Web designer</span></h3>
								<p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service level that they offer!</p>
							</div><!-- Reviews -->
						</div>
						<div class="col-lg-12">
							<div class="reviews style2">
								<img src="http://placehold.it/101x101" alt="" />
								<h3>Ali Tufan <span>Web designer</span></h3>
								<p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service level that they offer!</p>
							</div><!-- Reviews -->
						</div>
						<div class="col-lg-12">
							<div class="reviews style2">
								<img src="http://placehold.it/101x101" alt="" />
								<h3>Augusta Silva <span>Web designer</span></h3>
								<p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service level that they offer!</p>
							</div><!-- Reviews -->
						</div>
						<div class="col-lg-12">
							<div class="reviews style2">
								<img src="http://placehold.it/101x101" alt="" />
								<h3>Ali Tufan <span>Web designer</span></h3>
								<p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service level that they offer!</p>
							</div><!-- Reviews -->
						</div>
					</div>
				</div>
			</div>
		</div>  
	</div>
</section>

<section>
	<div class="block gray">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading">
						<h2>Quick Career Tips</h2>
						<span>Found by employers communicate directly with hiring managers and recruiters.</span>
					</div><!-- Heading -->
					<div class="blog-sec">
						<div class="row">
							<div class="col-lg-4">
								<div class="my-blog">
									<div class="blog-thumb">
										<a href="#" title=""><img src="http://placehold.it/360x200" alt="" /></a>
										<div class="blog-date">
											<a href="#" title="">2017 <i>March 29</i></a>
										</div>
									</div>
									<div class="blog-details">
										<h3><a href="#" title="">Attract More Attention Sales And Profits</a></h3>
										<p>A job is a regular activity performed in exchange becoming an employee, volunteering, </p>
										<a href="#" title="">Read More <i class="la la-long-arrow-right"></i></a>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my-blog">
									<div class="blog-thumb">
										<a href="#" title=""><img src="http://placehold.it/360x200" alt="" /></a>
										<div class="blog-date">
											<a href="#" title="">2017 <i>March 29</i></a>
										</div>
									</div>
									<div class="blog-details">
										<h3><a href="#" title="">11 Tips to Help You Get New Clients</a></h3>
										<p>A job is a regular activity performed in exchange becoming an employee, volunteering, </p>
										<a href="#" title="">Read More <i class="la la-long-arrow-right"></i></a>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my-blog">
									<div class="blog-thumb">
										<a href="#" title=""><img src="http://placehold.it/360x200" alt="" /></a>
										<div class="blog-date">
											<a href="#" title="">2017 <i>March 29</i></a>
										</div>
									</div>
									<div class="blog-details">
										<h3><a href="#" title="">An Overworked Newspaper Editor</a></h3>
										<p>A job is a regular activity performed in exchange becoming an employee, volunteering, </p>
										<a href="#" title="">Read More <i class="la la-long-arrow-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection