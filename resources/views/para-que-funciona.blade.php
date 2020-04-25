@extends('layouts.tema')

@section('title', 'Para que funciona')

@section('header_type', 'gradient')

@section('content')
<section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading">
						<h2>Para qué existimos</h2>
						<span>Ofrece Tu Talento es una comunidad diseñada para promover el intercambio y desarrollo de talento a nivel Mundial. Existimos para ayudarte a ti, ya seas un talento experto o novato, con un empleo o seas independiente, a crecer tu mercado, llegar a nuevos clientes, ampliar tu alcance y exponer tus habilidades a nuevos retos.<br/>
						 
						Los principales servicios que ofrecemos en nuestra plataforma digital son:</span>
					</div><!-- Heading -->
					<div class="how-to-sec">
						<div class="how-to">
							<span class="how-icon"><i class="la la-bullhorn"></i></span>
							<h3>Publica tu talento</h3>
							<p>Un directorio en línea que permite al talento exponer el valor real que aporta a sus clientes mediante fotos, videos, PDF’s o testimonios.</p>
						</div>
						<div class="how-to">
							<span class="how-icon"><i class="la la-search"></i></span>
							<h3>Busca talento</h3>
							<p>Una opción para investigar y reclutar el mejor talento en el mercado de manera anónima y eficiente</p>
						</div>
						<div class="how-to">
							<span class="how-icon"><i class="la la-exchange"></i></span>
							<h3>Canjea tu talento</h3>
							<p>Solo para nuestros miembros Talento Pro y Talento Oro, un directorio exclusivo que permite acceso a las mejores ofertas de servicios y productos a manera de canje e intercambio.</p>
						</div>
					</div>
					<div class="heading pt-5">
						<h2>Sentimos que estos tres principales servicios benefician a nuestros clientes de la siguiente manera:</h2>
						<span class="pt-4"><strong>1. </strong> Una comunidad tanto personal como en línea que le permite al talento exponerse a un grupo de pares y clientes con miras al crecimiento y desarrollo de sus habilidades</span>
						<span class="pt-4"><strong>2. </strong> Nuevas oportunidades de negocio, ya sea en línea o en persona, a través del servicio Canjea Tu Talento que abre la posibilidad de canjear e intercambiar tus servicios sin comisión o costo alguno.</span>
						<span class="pt-4"><strong>3. </strong> La conveniencia de acceder nuevos mercados a través de nuestra base de datos de contactos y nuestros eventos en sitio promoviendo el libre intercambio de servicios sin importar las fronteras</span>
					</div><!-- Heading -->
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
	
@endsection

@section('footer')
	@include('includes.footer')
@endsection