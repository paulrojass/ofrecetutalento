@extends('layouts.tema')

@section('title', 'Como funciona')

@section('header_type', 'gradient')

@section('content')
<section>
	<div class="block no-padding">
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-featured-sec">
						<div class="new-slide-3" style="top:-110px">
							<img src="{{ url('tema/images/como-funciona.jpg') }}" style="height: 70%" alt="" />{{-- 600x500 --}}
						</div>
						<div class="job-search-sec">
							<div class="job-search">
								<h3 style="color: #202020; text-align: left;">Como funciona</h3>
								<span style="color: #888888; text-align: left;">En Ofrece Tu Talento nuestra principal intención con este espacio digital es poder compartir nuestras habilidades y destrezas con más clientes cada día​. <br/><br/>Aunque la palabra "compartir" parece muy amplia, OTT nace con la mentalidad de que todos  necesitamos los unos de los otros, sin importar estatus económico, carrera, clase social, etnia, orientación sexual, raza, nacionalidad o afiliación política.</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="block pt-0 pb-0">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading">
						<span> Por ende, queremos que empieces tu camino pensando ¿qué puedes y quieres compartir con el Mundo?</span>
						<span>Si vienes al sitio a buscar un proyecto u oportunidad te consideramos un ​<strong>Talento</strong></span>
						<span>Si vienes al sitio a reclutar talento para tu proyecto u oportunidad entonces eres un ​<strong>Caza Talento​.</strong></span>
					</div><!-- Heading -->
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
							<div class="how-workimg"><img src="{{ URL::asset('tema/images/talento.jpg') }}" alt="" /></div>
							<div class="how-work-detail">
								<div class="how-work-box">
									<span>1</span>
									<i class="la la-diamond"></i>
									<h3>¿Cómo publicar un talento?</h3>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-12 pt-4 pb-4">
						<p>Los Talentos tienen la oportunidad de registrarse en cualquiera de nuestros 3 planes: Talento Novato, Talento Pro y Talento Oro. Siéntete libre de escoger el que más se adapte a tus necesidades. Los planes determinan la cantidad de material que puedes cargar a tu perfil y a que servicios puedes acceder en nuestra plataforma.<p>

						<p><strong>Al registrarte es ​muy importante listar tus talentos.</strong></p> 

						<p>¿Qué es un talento? En OTT definimos un talento como​ una habilidad, destreza o capacidad para realizar un trabajo o servicio  que beneficie a otras personas, organizaciones o comunidades. <strong>OJO :​</strong> Tu carrera o tu trabajo actual ​<strong>NO necesariamente ​es tu único talento.</strong></p>

						<p>Ejemplo: Manuel estudió finanzas. Trabaja en un banco. Pero tiene un talento con la cocina italiana. También le encanta escribir y editar poesía. Finalmente sus jefes y compañeros dicen que es un “crack” con hojas de Excel.</p>

						<p>Manuel tiene 3 talentos: Cocinar, Escribir/Editar Literatura y Trabajar Hojas de Excel. En Ofrece Tu Talento, Manuel puede decidir listar todos o algunos de estos 3 talentos. Al llenar su perfil, Manuel tiene la habilidad de subir fotos, videos, documentos o testimonios que validen su destreza en estos talentos.</p>

						<p>Una vez hayas completado tu perfil con tu información básica, datos personales, talentos y experiencia laboral, puedes empezar a gozar de los beneficios de nuestra plataforma. Tu perfil completado te permite enviar y recibir mensajes a otros talentos, así como exponerse a los Caza Talentos que están en búsqueda de tus servicios. Tanto otros Talentos como los Caza Talentos pueden enviarte “tratos” ​ ​que son ofertas de trabajo a cambio de tus servicios. Tú puedes aceptar o declinar los mismos así como también enviar tratos a otros talentos de acuerdo a tus necesidades.</p>

						<p>Si es de tu interés, puedes acceder a nuestro servicio de Canjea Tu Talento (exclusivo para Caza Talentos Pro, Talento Pro y Talento Oro). Este servicio funciona como un mercado en línea donde puedes ofrecer en forma de canje tus servicios o productos a nuestra comunidad mundial. Al mismo tiempo tú también estás habilitado para enviar ofertas por los servicios de otros sin necesidad de usar pagos: es un trueque.</p>
					</div>


					<div class="col-lg-12 pt-5">
						<div class="how-works flip">
							<!-- <div class="how-workimg"><img src="http://placehold.it/654x417" alt="" /></div> -->
							<div class="how-workimg"><img src="{{ URL::asset('tema/images/trato.jpg') }}" alt="" /></div>

							<div class="how-work-detail">
								<div class="how-work-box">
									<span>2</span>
									<i class="la la-exchange"></i>
									<h3>¿Cómo funciona un "trato"?</h3>
								</div>
							</div>
						</div>
					</div>


					<div class="col-lg-12 pt-4 pb-4">
						<p>¿Cómo funciona un “trato”? Cuando estás buscando talentos en nuestro directorio y llegas a uno que cumple con tus requisitos, dale click al botón "ofrecer trato". Esto te llevará a un formulario dónde podrás especificar los detalles de tu oferta.</p>
						<p>En este formulario necesitas llenar los siguientes campos:</p>

						<ul class="pl-5">
							<ol>
								<p>·	Nombre del proyecto: Es el título del proyecto que le estás requiriendo al talento.</p>
							</ol>
							<ol>
								<p>·	Descripción: Cuéntanos en tus palabras el ​<strong>cómo</strong> ​está estructurado este producto, servicio o creación. Puedes detallar forma, fondo, cantidades, frecuencias, colores, dimensiones, perspectivas, versiones o materiales que necesitan ser utilizados en el proyecto ​<strong> como tú lo deseas.</strong></p>
							</ol>
							<ol>
								<p>·	Resultado Final Ideal : ​¿Cómo se ve el producto, servicio o beneficio final que requieres de este talento en su ​ <strong>mejor versión</strong>?</p>
							</ol>
							<ol>
								<p>·	¿Cuál es el factor crítico de calidad en este proyecto?: Descríbenos ese “ingrediente esencial” que necesita tener este proyecto para que tú digas ​“es un éxito” cuando lo recibas.</p>
							</ol>
							<ol>
								<p>·	Días aproximados para recibir el proyecto: Esto le brinda al Talento un esquema de tiempo para completar los requisitos y entregar el proyecto.</p>
							</ol>
							<ol>
								<p>·	Oferta Económica: ¿Cuánto es tu presupuesto por 1 cantidad de este proyecto? Si son varias cantidades favor detallar en el total.</p>
							</ol>
						</ul>

						<p>Una vez completes este formulario, le enviaremos tu trato al Talento para su aprobación. De ser aprobado, te llegará una notificación a tu sección de ​<strong>“Tratos Propuestos”</strong>​ y a tu correo electrónico para que coordines la entrega del proyecto directamente con el Talento.</p>

						<p>Es importante mencionar, que de acuerdo a los Términos y Condiciones de Ofrece Tu Talento versión X.X., nuestra empresa ni organización se hace responsable de la calidad, cantidad, pago o intercambio entre los Talentos y Caza Talentos. El formulario de “ofrecer trato” es únicamente informativo para que los usuarios se puedan poner de acuerdo entre ellos. La entrega del proyecto, negocio, comercio o pago es responsabilidad de las partes. Los reclamos, quejas o inconformidades comerciales y financieras necesitan ser resueltas entre las partes y no involucran a Ofrece Tu Talento. Si te gustaría reportar a algún usuario que se ha extralimitado en su uso de la plataforma, ya sea que ha incumplido un trato o que se ha comportado de manera inapropiada, favor usar el formulario ​<strong>“Reporta a un Talento”​</strong>. OTT se reserva el derecho de suspender, bloquear o cancelar la membresía de aquellos usuarios quienes han incumplido los Términos y Condiciones y no han seguido un comportamiento ético en el uso de la plataforma.</p>
					</div>
					<div class="col-lg-12 pt-5">
						<div class="how-works">
							<div class="how-workimg"><img src="{{ URL::asset('tema/images/canje.jpg') }}" alt="" /></div>
							<div class="how-work-detail">
								<div class="how-work-box">
									<span>3</span>
									<i class="la la-lightbulb-o"></i>
									<h3>¿Cómo funciona un "canje"?</h3>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 pt-4 pb-4">
						<p>Cuando entras a la sección ​<strong>Canjea Tu Talento</strong> ​podrás ver un directorio de todos los productos, servicios y creaciones que los otros Talentos están dispuestos a intercambiar.</p>

						<p>Tú puedes navegar y escoger la oferta que más te llame la atención. Al revisar los detalles, dimensiones, precio y complementos necesitas escoger la opción de ​<strong>“ofrecer un trato”</strong>.</p>

						<p>Esto te va a abrir una ventana donde podrás llenar un formulario para ofrecerle a este Talento un trato por ese producto, servicio o creación. Tú puedes escoger entre pagar en moneda local o a través de un canje.</p>

						<p>Si escoges pagar en moneda local, le puedes completar tu oferta al Talento y de ser aceptado necesitas ponerte de acuerdo con él/ella fuera de la plataforma mediante correo electrónico o teléfono tanto para la entrega e intercambio del producto, servicio o creación al igual que la transacción de pago.</p>

						<p>Si escoges pagar a través de un canje, el formulario te da una opción para escoger cuál canje (de tu propio directorio de canjes) deseas ofrecerle a ese talento. Si no tienes ningún canje listado, entonces puedes crear un canje personalizado para esta oferta.</p>

						<p>Al aceptar este formulario, estás enviándole esta propuesta al otro talento. Cuando tu contraparte acepte el trato, te llegará una notificación a tu correo para ponerte en contacto directamente con el Talento y hacer el intercambio.</p>

						<p>Es importante mencionar, que de acuerdo a los Términos y Condiciones de Ofrece Tu Talento versión X.X., nuestra empresa ni organización se hace responsable de la calidad, cantidad, pago o intercambio del canje ni trato entre los Talentos y Caza Talentos. El formulario de “ofrecer trato” es únicamente informativo para que los usuarios se puedan poner de acuerdo entre ellos. La entrega del proyecto, negocio, comercio, pago o canje es responsabilidad de las partes. Los reclamos, quejas o inconformidades comerciales y financieras necesitan ser resueltas entre las partes y no involucran a Ofrece Tu Talento. Si te gustaría reportar a algún usuario que se ha extralimitado en su uso de la plataforma, ya sea que ha incumplido un trato o que se ha comportado de manera inapropiada, favor usar el formulario ​<strong>“Reporta a un Talento”​</strong>. OTT se reserva el derecho de suspender, bloquear o cancelar la membresía de aquellos usuarios quienes han incumplido los Términos y Condiciones y no han seguido un comportamiento ético en el uso de la plataforma.</p>  
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