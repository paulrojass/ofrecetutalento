@extends('layouts.tema')

@section('title', 'Como funciona')

@section('header_type', 'gradient')

@section('content')
	<section>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Como funciona</h2>
							<span>En Ofrece Tu Talento sentimos que nuestra principal intención con este espacio digital es poder compartir nuestras habilidades y destrezas con más clientes cada día. Aunque la palabra "compartir" parezca muy amplia, OTT nace con la mentalidad que todos necesitamos los unos de los otros, sin importar estatus económico, carrera, clase social, orientación sexual, raza, nacionalidad o partido político. Por ende, queremos que empieces tu camino pensando ¿qué puedes y quieres compartir con el Mundo?</span>
						</div><!-- Heading -->
<!-- 						<div class="how-to-sec style2 no-lines">
	<div class="how-to">
		<span class="how-icon"><i class="la la-user"></i></span>
		<h3>Register an account</h3>
		<p>Post a job to tell us about your project. We'll quickly match you with the right freelancers.</p>
	</div>
	<div class="how-to">
		<span class="how-icon"><i class="la la-file-archive-o"></i></span>
		<h3>Specify & search your job</h3>
		<p>Browse profiles, reviews, and proposals then interview top candidates. </p>
	</div>
	<div class="how-to">
		<span class="how-icon"><i class="la la-list"></i></span>
		<h3>Apply for job</h3>
		<p>Use the Upwork platform to chat, share files, and collaborate from your desktop or on the go.</p>
	</div>
</div> -->
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block ">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="how-works">
							{{--<div class="how-workimg"><img src="http://placehold.it/654x417" alt="" /></div>--}}
							<div class="how-workimg"><img src="{{ URL::asset('images/como-1.png') }}" alt="" /></div>
							<div class="how-work-detail">
								<div class="how-work-box">
									<span>1</span>
									<i class="la la-user"></i>
									<h3>Registra una cuenta</h3>
									<p>Si vienes al sitio a buscar un proyecto u oportunidad entonces te consideramos un Talento.  Si vienes al sitio a reclutar talento para tu proyecto u oportunidad entonces eres un Caza Talento.</p> 
								</div>
							</div>
						</div>
						<div class="how-works flip">
							<!-- <div class="how-workimg"><img src="http://placehold.it/654x417" alt="" /></div> -->
							<div class="how-workimg"><img src="{{ URL::asset('images/como-1.png') }}" alt="" /></div>

							<div class="how-work-detail">
								<div class="how-work-box">
									<span>2</span>
									<i class="la la-list"></i>
									<h3>Selecciona un plan</h3>
									<p>Los Talentos tienen la oportunidad de registrarse en cualquier de nuestras 3 planes: Talento Novato, Talento Pro y Talento Oro. Siéntete libre de escoger el que más se adapte a tus necesidades. La diferencia básica entre los 3 es que tanto material puedes cargar a tu perfil y que servicios puedes acceder en nuestra plataforma.</p>
								</div>
							</div>
						</div>

						<div class="how-works">
							<div class="how-workimg"><img src="http://placehold.it/654x417" alt="" /></div>
							<div class="how-work-detail">
								<div class="how-work-box">
									<span>2</span>
									<i class="la la-list"></i>
									<h3>Identiifca tus talentos</h3>
										
									<p>Al registrarte es <strong>​muy importante listar tus talentos.</strong>¿Qué es un talento? ​Es una habilidad, destreza o capacidad para realizar un trabajo que beneficie a otras personas.  <strong>OJO:​</strong> tu carrera o tu trabajo actual ​NO necesariamente ​es tu único talento.  Ejemplo: Manuel estudió finanzas. Trabaja en un banco. Pero tiene un talento con la cocina italiana. También le encanta escribir y editar poesía. Finalmente sus jefes y compañeros dicen que es “crack” con hojas de Excel.</p>
								</div>
							</div>
						</div>

						<div class="how-works flip">
							<div class="how-workimg"><img src="http://placehold.it/654x417" alt="" /></div>
							<div class="how-work-detail">
								<div class="how-work-box">
									<span>2</span>
									<i class="la la-list"></i>
									<h3>Registra Tus talentos</h3>
									<p>Manuel tiene 3 talentos: Cocinar, Escribir/Editar Literatura, Trabajar Hojas de Excel. En Ofrece Tu Talento, Manuel puede decidir listar todos o algunos de estos 3 talentos. Al llenar su perfil, Manuel tiene la habilidad de subir fotos, videos, PDF’s o testimonios que validen su experiencia en estos talentos..</p>
								</div>
							</div>
						</div>

						<div class="how-works">
							<div class="how-workimg"><img src="http://placehold.it/654x417" alt="" /></div>
							<div class="how-work-detail">
								<div class="how-work-box">
									<span>3</span>
									<i class="la la-pencil"></i>
									<h3>Canjea tus Talentos</h3>
									<p>Una vez hayas completado tu perfil con tu información básica, datos personales, talentos y experiencia laboral, puedes empezar a gozar de los beneficios de nuestra plataforma. Tu perfil completado te permite enviar y recibir mensajes a otros talentos, así como exponerte a los Caza Talentos que están buscando tus servicios.</p>
								</div>
							</div>
						</div>

						<div class="how-works flip">
							<div class="how-workimg"><img src="http://placehold.it/654x417" alt="" /></div>
							<div class="how-work-detail">
								<div class="how-work-box">
									<span>3</span>
									<i class="la la-pencil"></i>
									<h3>Ofrece tratos</h3>
									<p>Tanto otros Talentos como los Caza Talentos pueden enviarte “tratos” que son ofertas de trabajo a cambio de tus servicios. Tu puedes aceptar o declinar los mismos asi como también enviar tratos a otros talentos que tu requiera.</p>
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
						<h2>Testiminios de nuestros Talentos</h2>
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




@endsection

@section('footer')
	@include('includes.footer')
@endsection