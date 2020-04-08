@extends('layouts.tema')

@section('title', 'Agrega tus talentos')

@section('header_type', 'gradient')

@section('content')
<!-- 	<section class="overlape">
	<div class="block no-padding">
		<div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div>PARALLAX BACKGROUND IMAGE
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="inner-header">
						<h3>Welcome Tera Planer</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> -->

	<section>
		<div class="block no-padding">
			<div class="container">
				 <div class="row no-gape">
				 	<aside class="col-lg-4 column border-right">
				 		<div class="widget" id="listadoTalentos">

				 		</div>
				 	</aside>
				 	<div class="col-lg-8 column">
				 		<div class="padding-left">
					 		<div class="manage-jobs-sec">
					 			<h3 id="talentos-agregados">Agrega tus talentos <strong></strong></h3>
						 		<div class="contact-edit">
									<form method="post">
										@csrf
										<div class="row">
											<div class="col-lg-12">
												<span class="pf-title">Talento</span>									
												<div class="pf-field">
													<input type="text" name="title" id="title" required value="{{old('title')}}" maxlength="100">
													<i class="la la-email"></i>
												</div>
											</div>

											<div class="col-lg-4">
												<span class="pf-title">Industria</span>
												<div class="pf-field">
						                            <select name="categories" id="categories" class="chosen">
						                            	<option value = "">Selecciona una categoría</option>
						                            	@php($industria = "")
						                            	@foreach($categories as $category)
						                            	@if($category->industry->name != $industria)
						                            		@php($industria = $category->industry->name)
						                            			@if(!$loop->first)
						                            				</optgroup>
																@endif
																<optgroup label="{{$industria}}">
																    <option value="{{$category->id}}">{{$category->name}}</option>
						                            	@else
															<option value="{{$category->id}}">{{$category->name}}</option>
															@if($loop->last)
																</optgroup>
															@endif
						                            	@endif
						                                @endforeach
						                            </select>
												</div>
											</div>

											<div class="col-lg-4">
												<span class="pf-title result">Nivel de experiencia: <b></b></span>
												<input type="range" class="slider" min="0" max="10" id="level" name="level" required value="{{old('level')}}">
											</div>

											<div class="col-lg-12">
												<span class="pf-title">Descripcion</span>
												<div class="pf-field">
													<input type="text" name="description" id="description" required value="{{old('description')}}">
												</div>
											</div>


											<div class="col-lg-6">
												<button type="button" name="agregar" id="agregar" class="srch-lctn btn-submit-talent">Agregar</button>
											</div>
											<div class="col-lg-6">
												<a type="button" href="{{url('mi-cuenta')}}" name="salir" id="salir" class="srch-lctn btn-submit-talent">Salir</a>
											</div>
										</div>
									</form>
						 		</div>
					 		</div>
					 	</div>
					</div>
				 </div>
			</div>
		</div>
	</section>

@endsection

@section('scripts')
<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$(function() {
        id_user = '{!! auth()->user()->id !!}';
		actualizarTalentos();
		verificarTalentos(id_user);

        // Read value on page load
        $(".result b").html($("#level").val());

        // Read value on change
        $("#level").change(function(){
            $(".result b").html($(this).val());
        });



		$('.btn-submit-talent').click(function(){
			var _token = $("input[name='_token']").val();
			var title = $("input[name='title']").val();
			var category = $("#categories").val();
			var level = $("input[name='level']").val();
			var description = $("input[name='description']").val();
			$.ajax({
				type:'POST',
				url:'guardar_talento',
				data:{
					id_user: id_user,
					title:title,
					category:category,
					level:level,
					description:description,
					_token:_token},
				success:function(data){
					verificarTalentos(id_user);
					actualizarTalentos();
					$("input[name='title']").val('');
					$("input[name='description']").val('');
				}
			});
		});
	});

	function verificarTalentos(id_user){
		var _token = $("input[name='_token']").val();
		$.ajax({
			type: 'POST',
			url:'verificar_talentos',
			data:{user_id : id_user, _token:_token},
			success:function(data){
				if(data.disponibles == null){
					$('#talentos-agregados strong').html('(Puede agregar todos los talentos que desee)');
				}else if(data.disponibles > 0){
					$('#talentos-agregados strong').html('('+data.disponibles+' disponibles)');
				}else{
					$('#agregar').hide();
					$('#talentos-agregados strong').html('(Para agregar mas talentos puede cambiar su plan)');
				}
			}
		});
	}

	function actualizarTalentos(){
		$.ajax({
			url: 'actualizar-talentos',
			type: 'Get',
			dataType: 'html',
		})
		.done(function(data) {
			$('#listadoTalentos').html(data);
		})	
	}

</script>

@endsection


@section('footer')
	@include('includes.footer')
@endsection