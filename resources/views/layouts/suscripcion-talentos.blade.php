@extends('layouts.tema')

@section('title', 'Agrega tus talentos')

@section('header_type', 'gradient')

@section('content')
	<section id="talentos">
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
								<div class="account-popup-area signup-popup-box static">
									<div class="account-popup">
								<h1> Agrega tus talentos </h1>

								<p id="talentos-disponibles"></p>

									{!! Form::open(['method' =>'post', 'role' => 'form']) !!}
										@csrf

											<div class="pf-field">
												{!! Form::text('title',null,
												[
												'required' => 'required',
												'value' => 'old("title")'
												]) !!}
												<i class="la la-email"></i>
											</div>

					 						<div class="pf-field">
												<select name="industries" id="industries" class="chosen">
													<option value = "">Selecciona una industria</option>
													@foreach($industries as $industry)
														<option value = "{{$industry->id}}">
															{{ $industry->name }}						
														</option>
													@endforeach
												</select>												
												<i class="la la-email"></i>
											</div>

	
					 						<div id="select-cat">
						 						<div class="pf-field">
													<select name="categories" id="categories" class="chosen">
															<option value = "">Primero selecciona una Industria</option>
													</select>
												</div>
											</div>

											<div class="pf-field">
												{!! Form::text('level',null,
												[
												'required' => 'required',
												'value' => 'old("level")'
												]) !!}
											</div>

											<div class="pf-field">
												{!! Form::text('description',null,
												[
												'required' => 'required',
												'value' => 'old("description")'
												]) !!}
												<i class="la la-email"></i>
											</div>

											{!! Form::button('Agregar',['class'=>'btn-submit-talent','type'=>'button']) !!}

									{!! Form::close() !!}
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
		$('.btn-submit-talent').click(function(){
			var _token = $("input[name='_token']").val();
			var title = $("input[name='title']").val();
			var category = $("input[name='category']").val();
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
					$("input[name='title']").val('');
					$("input[name='industry']").val('');
					$("input[name='category']").val('');
					$("input[name='level']").val('');
					$("input[name='description']").val('');
				}
			});
		});

		$('#industries').on('change', function() {
			var industry_id = $(this).val();
			if ($.trim(industry_id) != ''){
				$.get('select-categorias', {industry_id : industry_id}, function(categories){
					$('#select-cat').empty();
					$('#select-cat').append("<div class='pf-field'><select name='categories' id='categories' class='chosen'><option value = ''>Selecciona una categoria</option>");
					$.each(categories, function(index, value){
						$('#select-cat').append("<option value = '"+index+"'>"+value+"</option>");
					})
					$('#select-cat').append("</select>");
					$('#select-cat').append("</div>");

				});
			}
		});
	});

	function verificarTalentos(id_user){
		var _token = $("input[name='_token']").val();
		$.ajax({
			type: 'POST',
			url:'verificar_talentos',
			data:{user_id : id_user, _token:_token},
			success:function(data){
				if(data.disponibles > 0){
					$('#talentos-agregados').html('Tienes '+data.agregados+' talentos agregados');
					$('#talentos-disponibles').html('Tienes '+data.disponibles+' talentos disponibles');
				}else{
					$('#nuevo-talento').html('<p> Ya no tiene talentos disponibles </p>');
				}
			}
		});
	}
</script>

@endsection