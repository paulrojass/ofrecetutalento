@extends('layouts.tema')

@section('title', '¿Quienes somos?')

@section('header_type', 'gradient')

@section('content')
<section>
	<div class="block no-padding  gray">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="inner2">
						<div class="inner-title2">
							<h3>¿Quienes Somos?</h3>
							<!-- <span>Keep up to date with the latest news</span> -->
						</div>
						<div class="page-breacrumbs">
							<ul class="breadcrumbs">
								<li><a href="{{'/'}}" title="">Home</a></li>
								<li><a title="">¿Quienes Somos?</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="block">
		<div class="container">
			 <div class="row">
			 	<div class="col-lg-12">
			 		<div class="about-us">
			 			<div class="row">
			 				<div class="col-lg-12">
			 					<h3>Acerca de Ofrece tu talento</h3>
			 				</div>
			 				<div class="col-lg-7">
<p>Ofrece Tu Talento es una plataforma digital hecha por latinos y para latinos. Nuestra misión es
promover el intercambio y desarrollo del talento en hispanoamérica a través de eventos,
conexiones e interacción digital. Buscamos empoderar al usuario X a lograr su mejor versión y
ofrecer su talento a la mayor cantidad de empresas y personas.</p>

<p>¿Quién es el Usuario X? Es un profesional de servicios, veterano o novato, independiente o
asalariado que busca crecer su mercado teniendo así mayor impacto y aporte al mundo. Este
usuario quizás quiera desarrollar y empoderar su talento pero no sabe cómo y adónde crecer.
Creemos firmemente que el Usuario X tiene un don y habilidad única que al ser compartida con
amor y empeño, logra aportar valor a la vida de otras personas.</p>


<blockquote><p><i>“</i><span>Creemos en las economías creativas y en cómo la imaginación puede lograr fabricar arte a través del talento y la disciplina.<i>”</i></span></p></blockquote>




			 				</div>
			 				<div class="col-lg-5">
			 					<img src="http://placehold.it/432x280" alt="" />
			 				</div>
			 				<div class="col-lg-12">
<p>Al poner en contacto al Usuario X con empresas, organizaciones o gestores que estén
buscando el mejor talento de la región, OTT funge como una plataforma intermediaria que
permite a los involucrados potenciar su búsqueda e intercambio de servicios.</p>

<p>OTT es diseñada y desarrollada por un grupo de promotores de talento que están dedicados a
encender el potencial creativo de las personas. Basados en diferentes países de latinoamérica,
el grupo de Innovemos Conciencia tiene como misión crear ecosistemas de talento que
busquen promover la innovación como herramienta de crecimiento, evolución e inclusión en la
región.</p>

<blockquote><p><i>“</i><span>Al Innovar nuestra conciencia, Innovemos Latinoamérica.<i>”</i></span></p><strong>Ofrece tu talento</strong></blockquote>



			 				</div>
			 			</div>
			 		</div>
			 	</div>
			 </div>
		</div>
	</div>
</section>

<section>
	<div class="block">
		<div data-velocity="-.1" style="background: url(http://placehold.it/1920x1000) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color light"></div><!-- PARALLAX BACKGROUND IMAGE -->
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading light">
						<h2>Kind Words From Happy Candidates</h2>
						<span>What other people thought about the service provided by JobHunt</span>
					</div><!-- Heading -->
					<div class="reviews-sec" id="reviews-carousel">
						<div class="col-lg-6">
							<div class="reviews">
								<img src="http://placehold.it/101x101" alt="" />
								<h3>Augusta Silva <span>Web designer</span></h3>
								<p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
							</div><!-- Reviews -->
						</div>
						<div class="col-lg-6">
							<div class="reviews">
								<img src="http://placehold.it/101x101" alt="" />
								<h3>Ali Tufan <span>Web designer</span></h3>
								<p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
							</div><!-- Reviews -->
						</div>
						<div class="col-lg-6">
							<div class="reviews">
								<img src="http://placehold.it/101x101" alt="" />
								<h3>Augusta Silva <span>Web designer</span></h3>
								<p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
							</div><!-- Reviews -->
						</div>
						<div class="col-lg-6">
							<div class="reviews">
								<img src="http://placehold.it/101x101" alt="" />
								<h3>Ali Tufan <span>Web designer</span></h3>
								<p>Without JobHunt i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
							</div><!-- Reviews -->
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</section>

<section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="stats-sec style2">
						<div class="row">
							<div class="col-lg-3  col-md-3 col-sm-6 col-xs-6">
								<div class="stats">
									<span>{{ $usuarios }}</span>
									<h5>Usuarios registrados</h5>
								</div>
							</div>
							<div class="col-lg-3  col-md-3 col-sm-6 col-xs-6">
								<div class="stats">
									<span>{{ $talentos }}</span>
									<h5>Talentos</h5>
								</div>
							</div>
							<div class="col-lg-3  col-md-3 col-sm-6 col-xs-6">
								<div class="stats">
									<span>{{ $canjes }}</span>
									<h5>Canjes</h5>
								</div>
							</div>
							<div class="col-lg-3  col-md-3 col-sm-6 col-xs-6">
								<div class="stats">
									<span>{{ $tratos }}</span>
									<h5>Tratos</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="block">
		<div data-velocity="-.1" style="background: url(http://placehold.it/1920x655) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
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
										<div class="blog-metas">
											<a href="#" title="">March 29, 2017</a>
											<a href="#" title="">0 Comments</a>
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
										<div class="blog-metas">
											<a href="#" title="">March 29, 2017</a>
											<a href="#" title="">0 Comments</a>
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
										<div class="blog-metas">
											<a href="#" title="">March 29, 2017</a>
											<a href="#" title="">0 Comments</a>
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

<section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading">
						<h2>Companies We've Helped</h2>
						<span>Some of the companies we've helped recruit excellent applicants over the years.</span>
					</div><!-- Heading -->
					<div class="comp-sec">
						<div class="company-img">
							<a href="#" title=""><img src="http://placehold.it/180x80" alt="" /></a>
						</div><!-- Client  -->
						<div class="company-img">
							<a href="#" title=""><img src="http://placehold.it/180x80" alt="" /></a>
						</div><!-- Client  -->
						<div class="company-img">
							<a href="#" title=""><img src="http://placehold.it/180x80" alt="" /></a>
						</div><!-- Client  -->
						<div class="company-img">
							<a href="#" title=""><img src="http://placehold.it/180x80" alt="" /></a>
						</div><!-- Client  -->
						<div class="company-img">
							<a href="#" title=""><img src="http://placehold.it/180x80" alt="" /></a>
						</div><!-- Client  -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('footer')
	@include('includes.footer')
@endsection