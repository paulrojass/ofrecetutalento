<footer class="style2">
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 column">
					<div class="widget">
						<div class="about_widget">
							<div class="logo">
								<a href="{{url('/')}}" title=""><img src="{{URL::asset('tema/images/logo-white.png')}}" style="max-width: 163px" alt="" /></a>
							</div>
							<span>Ciudad de Panamá, Calle 56 Este, República de Panamá.</span>
							<span>+1 246-345-0695</span>
							<span>ayuda@ofrecetutalento.com</span>
						</div><!-- About Widget -->
					</div>
				</div>
				<div class="col-lg-2 column">
					<div class="widget">
						<h3 class="footer-title">Acerca de nosotros</h3>
						<div class="link_widgets3 nolines">
							<div class="row">
								<div class="col-lg-12">
									<a href="{{url('como_funciona')}}" title="">Como funciona </a>
									<a href="{{url('para_que_funciona')}}" title="">¿Para qué funciona? </a>
									<a href="{{url('quienes_somos')}}" title="">¿Quienes somos?</a>
									<a href="{{url('planes')}}" title="">Planes</a>
									<a href="{{route('terminos')}}" title="">Términos & Politicas de privacidad </a>
									<!-- <a href="#" title="">FAQ’s </a> -->
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-2 column">
					<div class="widget">
						<h3 class="footer-title">Siguenos</h3>
						<div class="link_widgets3 nolines">
							<div class="row">
								<div class="col-lg-12">
									<a href="javascript:void(0)" title=""><i class="fa fa-facebook"></i> Facebook</a>	
									<a href="javascript:void(0)" title=""><i class="fa fa-twitter"></i> Twitter</a>	
									<a href="javascript:void(0)" title=""><i class="la la-instagram"></i> Instagram</a>	
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 column">
					@auth
						@if (auth()->user()->suscription->plan_id > 2)
						<div class="widget">
							<h3 class="footer-title">¿Desea reportar un talento?</h3>
							<div class="subscribe_widget">
								<p> nos gustaría conocer cualquier situación en donde un miembro de nuestra comunidad no cumplió con estos estándares de comportamiento y orden de la comunidad.</p>
								<div class="simple-text-block">
									<a href="{{ route('reportes') }}" title="">Reportar</a>
								</div>
								<!-- 							
								<form>
									<input type="text" placeholder="Enter Valid Email Address" />
									<button type="submit"><i class="la la-paper-plane"></i></button>
								</form> -->
							</div>
						</div>
						@endif
					@endauth
				</div>
			</div>
		</div>
	</div>
	<div class="bottom-line blanco">
		<span>© Todos los derechos reservados 2020 Inversiones Devekut</span>
		<a href="#scrollup" class="scrollup" title=""><i class="la la-arrow-up"></i></a>
	</div>
</footer>