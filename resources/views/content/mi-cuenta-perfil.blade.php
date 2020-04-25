<div class="border-title"><h3>Plan Actual</h3><a href="{{ route('cambiar-plan') }}" title=""><i class="la la-edit"></i>Cambiar Plan</a></div>
<div class="edu-history-sec">
	<div class="job-details-m">						 			
		<div class="container">
<!-- 			<div class="row">
	<div class="col-sm">
		<h3>Información Básica</h3>
	</div>
</div> -->
			<div class="row">
				@php
					$hoy = new Date();
					$suscripcion = new Date(auth()->user()->suscription->updated_at);
					if(auth()->user()->suscription->expiration_date){
						$vencimiento = new Date(auth()->user()->suscription->expiration_date);
						if($hoy > $vencimiento) $status = 'Vencido';
						else $status = 'Activo';
					}else {
						$status = 'Activo';
						$vencimiento = 'Indefinido';
					}
				@endphp
				<div class="col-sm">
					<p><strong> Nombre del Plan:</strong> @if(auth()->user()->suscription->plan_id > 1)Talento @endif{{auth()->user()->suscription->plan->name}}</p>
				</div>
				<div class="col-sm">
					<p><strong> Fecha de suscripción: </strong> {{$suscripcion->format('d / m / Y')}}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm">
					<p><strong> Estatus: </strong> {{ $status  }}</p>
				</div>
				<div class="col-sm">
					<p><strong> Fecha de vencimiento: </strong>
					@if ($vencimiento == 'Indefinido')
					 {{$vencimiento}}</p>
					@else
					 {{$vencimiento->format('d / m / Y')}}</p>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>


<div class="border-title"><h3>Mi perfil</h3><a id="editar-perfil" data-toggle="modal" data-target="#modal-edit-perfil" title=""><i class="la la-edit"></i> Editar Perfil</a></div>
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
					<p><strong> Nombres: </strong> {{auth()->user()->name}}</p>
				</div>
				<div class="col-sm">
					<p><strong> Apellidos: </strong>{{auth()->user()->lastname}}</p>
				</div>
				<div class="col-sm">
					<p><strong> Documento: </strong>{{auth()->user()->document}}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm">
					<p><i class="la la-envelope-o"></i><strong> Correo: </strong>{{auth()->user()->email}}</p>
				</div>
				<div class="col-sm">
					<p><i class="la la-phone"></i><strong> Teléfono: </strong>{{auth()->user()->phone}}</p>
				</div>
				<div class="col-sm">
					<p><i class="la la-globe"></i><strong> Nacionalidad: </strong>{{auth()->user()->nationality}}</p>
				</div>
			</div>

			<div class="row">
				<div class="col-sm">
					<p><i class="la la-map-signs"></i><strong> Dirección: </strong>{{auth()->user()->address}}</p>
				</div>
				<div class="col-sm">
					<p><i class="la la-map-marker"></i><strong> Ciudad y País: </strong>{{auth()->user()->city}}, {{auth()->user()->country}}</p>
				</div>
			</div>
			<div class="row">
				<div class="col-sm">
					<p><i class="la la-certificate"></i><strong> Solución y beneficio que ofrezco a mis clientes: </strong>{{auth()->user()->abilities}}</p>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="cand-details-sec">
	<div class="row">
		<div class="col-lg-8 column">
			<div class="edu-history-sec">
				<div class="border-title">
					<h3>Experiencia Laboral</h3><a data-toggle="modal" data-target="#modal-edit-experiencia" title=""><i class="la la-edit"></i> Editar</a>
				</div>
				@if(auth()->user()->experiences->company1 || auth()->user()->experiences->company2 || auth()->user()->experiences->company3 )
					@if(auth()->user()->experiences->company1)
					<div class="edu-history style2">
						<i></i>
						<div class="edu-hisinfo">
							<h3>{{ auth()->user()->experiences->position1 }} <span>{{ auth()->user()->experiences->company1 }}</span></h3>
							<i>{{ auth()->user()->experiences->start_date1}} - 
								{{ auth()->user()->experiences->due_date1}} </i>
							<p>{{ auth()->user()->experiences->achievements1 }} </p>
						</div>
					</div>
					@endif

					@if(auth()->user()->experiences->company2)
					<div class="edu-history style2">
						<i></i>
						<div class="edu-hisinfo">
							<h3>{{ auth()->user()->experiences->position2 }} <span>{{ auth()->user()->experiences->company2 }}</span></h3>
							<i>{{ auth()->user()->experiences->start_date2}} - 
								{{ auth()->user()->experiences->due_date2}} </i>
							<p>{{ auth()->user()->experiences->achievements2 }} </p>
						</div>
					</div>
					@endif

					@if(auth()->user()->experiences->company3)
					<div class="edu-history style2">
						<i></i>
						<div class="edu-hisinfo">
							<h3>{{ auth()->user()->experiences->position3 }} <span>{{ auth()->user()->experiences->company3 }}</span></h3>
							<i>{{ auth()->user()->experiences->start_date3}} - 
								{{ auth()->user()->experiences->due_date3}} </i>
							<p>{{ auth()->user()->experiences->achievements3 }} </p>
						</div>
					</div>
					@endif
				@else
					<p>No se han agregado experiencias laborales</p>
				@endif
			</div>
		</div>

		<div class="col-lg-4 column">
			<div class="border-title">
				<h3>Idiomas</h3>
				<a title="" data-toggle="modal" data-target="#modal-idioma">
					<i class="la la-plus"></i>
				Agregar</a>
			</div>
			@if(auth()->user()->languages->count() > 0)
				@foreach(auth()->user()->languages as $language)
					<div class="progress-sec">
						<span class="mb-4">{{ $language->language }}<a class="pull-right elimina-idioma" value="{{$language->id}}" title=""><i class="la la-trash-o"></i></a></span>
						@php($porcentaje = $language->level * 10)
						<div class="progressbar">
							<div class="progress" style="width: {{$porcentaje}}%">
								<span>{{$language->level}}</span>
							</div>
						</div>
					</div>
				@endforeach
			@else
				<p>No hay idiomas agreagados</p>
			@endif
		</div>
	</div>	
</div>