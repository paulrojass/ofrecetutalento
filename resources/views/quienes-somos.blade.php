@extends('layouts.tema')

@section('title', '¿Quienes somos?')

@section('header_type', 'gradient')

@section('content')
<section>
	<div class="block no-padding">
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-featured-sec">
						<div class="new-slide-3" style="top:-60px">
							<img src="{{ url('tema/images/quienes-somos.jpg') }}" style="height: 65%" alt="" />{{-- 600x500 --}}
						</div>
						<div class="job-search-sec">
							<div class="job-search">
								<h3 style="color: #202020; text-align: left;">¿Quienes somos?</h3>
								<span style="color: #888888; text-align: left;">OTT fue diseñada y es gestionada por un grupo de innovadores quienes buscamos cuestionar y mejorar el ‘status-quo’ del talento en Latinoamérica. <br/> <br/>Nuestra misión es empoderar a los talentos profesionales y novatos a ofrecer sus servicios a un sin número de destinos a nivel mundial.</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section>
	<div class="block pt-0">
		<div class="container">
			 <div class="row">
			 	<div class="col-lg-12">
			 		<div class="about-us">
			 			<div class="row">
			 				<div class="col-lg-12">
			 					<h3>Acerca de Ofrece tu talento</h3>
			 				</div>
			 				<div class="col-lg-12">
<p>Nuestro equipo se dedica a nivel personal y colectivo a potenciar el capital humano de empresas y organizaciones de la región desde nuestros roles como ​Coaches, ​ Consultores y Conferencistas radicados en Panamá. Otros de nosotros estamos a lo largo y ancho de América pensando en cómo catalizar el intercambio de servicios para beneficiar a nuestros clientes.  
 
<p>Tú... con tu talento y tus dones puedes aportar valor desde dónde estés. Nuestro reto es ayudarte a encontrar más clientes y nuevos mercados para ampliar tu alcance. Tu misión es entregar el mejor trabajo, aporte, solución o producto a un mercado regional que busca creatividad e innovación.</p> 
 
<p>Todos los derechos reservados © 2020 -  Ofrece Tu Talento - Innovemos Panamá e Innovemos Conciencia - Inversiones Devekut, S.A</p>

<blockquote><p><i>“</i><span>Tú solución es única para el mundo en el que vivimos.<i>”</i></span></p></blockquote>




			 				</div>
			 				<div class="col-lg-12">
			 					<h3>¿Nos acompañas a ofrecer tu talento?</h3>
			 					<h3>¿Por qué lo estamos haciendo?</h3>



<p>Creemos firmemente que existen millones de profesionales en el mundo hispano que tienen un talento único y desconocen la mejor forma de ampliar su mercado.</p>  
 
<p>Ofrece Tu Talento es una plataforma donde podrás publicar, mercadear, donar e intercambiar tu talento para aportar valor al ecosistema de negocios global.</p>

			 					<h3>¿Para quién es OTT?</h3>

<p>Puedes ser un talento con años de experiencia o un novato recién graduado. Tienes un talento único y sabes proveer un servicio de una manera eficiente, eficaz y efectiva. Quizás necesites reclutar y contactar el mejor talento para tu proyecto. O simplemente busques donar tu talento o una causa social.</p>

<blockquote><p><i>“</i><span>Creemos en el Talento X<i>”</i></span></p></blockquote>

			 					<h3>¿Quién es el Talento X?</h3>

<p>Es un profesional de servicios, veterano o novato, independiente o asalariado que busca crecer su mercado ​teniendo así un mayor impacto y aporte al mundo. Este usuario quizás quiera desarrollar y empoderar su talento pero no sabe cómo y adónde crecer.</p>
 
<p>Creemos firmemente que el Talento X tiene un don y habilidad única que al ser compartida con devoción y empeño, logra aportar valor a la vida de otras personas.</p>
 
<p>Nosotros ayudamos al Talento X a conectar su talento con empresas, proyectos y otros profesionales que necesiten de sus servicios.</p>
 
<p>Creemos en las economías creativas y en que la imaginación puede lograr fabricar arte a través del talento y la disciplina.</p>
 
<p>OTT es una herramienta tanto para empresas que buscan reducir costos fijos laborales; como para estudiantes, profesionales y académicos que busquen emprender y un ingreso adicional mediante el intercambio de sus servicios por honorarios negociados entre ambas partes.</p>
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

@endsection

@section('footer')
	@include('includes.footer')
@endsection