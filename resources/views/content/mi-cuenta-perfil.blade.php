<div class="border-title"><h3>Mi perfil</h3><a id="editar-perfil" title=""><i class="la la-edit"></i> Editar Perfil</a></div>
<div class="edu-history-sec">
	<div class="job-details-m">						 			
		<div class="container">
			<div class="row">
				<div class="col-sm">
					<h3>Información Básica</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-sm">
					<p><strong> Nombres: </strong> {{Auth::User()->name}}</p>
				</div>
				<div class="col-sm">
					<p><strong> Apellidos: </strong>{{Auth::User()->lastname}}</p>
				</div>
				<div class="col-sm">
					<p><strong> Documento: </strong>{{Auth::User()->document}}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm">
					<p><i class="la la-envelope-o"></i><strong> Correo: </strong>{{Auth::User()->email}}</p>
				</div>
				<div class="col-sm">
					<p><i class="la la-phone"></i><strong> Teléfono: </strong>{{Auth::User()->phone}}</p>
				</div>
				<div class="col-sm">
					<p><i class="la la-globe"></i><strong> Nacionalidad: </strong>{{Auth::User()->nationality}}</p>
				</div>
			</div>

			<div class="row">
				<div class="col-sm">
					<p><i class="la la-map-signs"></i><strong> Dirección: </strong>{{Auth::User()->address}}</p>
				</div>
				<div class="col-sm">
					<p><i class="la la-map-marker"></i><strong> Ciudad y País: </strong>{{Auth::User()->city}}, {{Auth::User()->country}}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm">
					<p><i class="la la-certificate"></i><strong> Descripción de habilidades: </strong>{{Auth::User()->abilities}}</p>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="cand-details-sec">
	<div class="row">
		<div class="col-lg-6 column">
			<div class="edu-history-sec">
			<div class="job-details-m">	
					<div class="container">
					<div class="row">
						<div class="col-sm">
							<h3>Experiencia laboral</h3>
						</div>
					</div>

						<div class="edu-history style2">
							<i></i>
							<div class="edu-hisinfo">
								<h3>{{ Auth::User()->experiences->position1 }} <span>{{ Auth::User()->experiences->company1 }}</span></h3>
								<i>{{ \Carbon\Carbon::parse(Auth::User()->experiences->start_date1)->format('Y')}} - 
									{{ \Carbon\Carbon::parse(Auth::User()->experiences->due_date1)->format('Y')}} </i>
								<p>{{ Auth::User()->experiences->achievements1 }} </p>
							</div>
						</div>

						<div class="edu-history style2">
							<i></i>
							<div class="edu-hisinfo">
								<h3>{{ Auth::User()->experiences->position2 }} <span>{{ Auth::User()->experiences->company2 }}</span></h3>
								<i>{{ \Carbon\Carbon::parse(Auth::User()->experiences->start_date2)->format('Y')}} - 
									{{ \Carbon\Carbon::parse(Auth::User()->experiences->due_date2)->format('Y')}} </i>
								<p>{{ Auth::User()->experiences->achievements2 }} </p>
							</div>
						</div>

						<div class="edu-history style2">
							<i></i>
							<div class="edu-hisinfo">
								<h3>{{ Auth::User()->experiences->position3 }} <span>{{ Auth::User()->experiences->company3 }}</span></h3>
								<i>{{ \Carbon\Carbon::parse(Auth::User()->experiences->start_date3)->format('Y')}} - 
									{{ \Carbon\Carbon::parse(Auth::User()->experiences->due_date3)->format('Y')}} </i>
								<p>{{ Auth::User()->experiences->achievements3 }} </p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="col-lg-6 column">
			<div class="job-details-m">	
				<div class="col-sm">
					<h3>Idiomas</h3>
				</div>
				@foreach(Auth::User()->languages as $language)
					<div class="progress-sec">
						<span class="mb-4">{{ $language->language }}</span>
						@php($porcentaje = $language->level * 10)
						<div class="progressbar">
							<div class="progress" style="width: {{$porcentaje}}%">
								<span>{{$language->level}}</span>
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>	
</div>