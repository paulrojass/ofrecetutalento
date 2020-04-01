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
@endsection

@section('footer')
	@include('includes.footer')
@endsection