@extends('layouts.tema')

@section('title', 'Inicio')

@section('header_type', 'stick-top style3')

@section('content')
	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header wform">
							<div class="job-search-sec">
								<div class="job-search">
									<h4>Explora todos lo canjes disponibles</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block remove-top">
			<div class="container">
				 <div class="row no-gape">
				 	<aside class="col-lg-3 column">
					 		<form>
					 			
							@csrf
							<div class="widget">
								<div class="search_widget_job">
									<div class="field_w_search">
										<input type="text" id="search" name="search" placeholder="Buscar" />
										<i class="la la-search"></i>
									</div><!-- Search Widget -->
<!-- 									<div class="field_w_search">
	<input type="text" id="location" name="location" placeholder="Ubicacion" />
	<i class="la la-map-marker"></i>
</div> --><!-- location Widget -->
								</div>
							</div>

					 		<div class="widget border">
					 			<h3 class="sb-title open">Fecha de publicación</h3>
					 			<div class="posted_widget">
									<input type="radio" class="input-date" value="{{$dia}}" name="date" id="dia"><label for="dia">Últimas 24 horas</label><br />
									<input type="radio" class="input-date" value="{{$semana}}" name="date" id="semana"><label for="semana">Últimos 7 días</label><br />
									<input type="radio" class="input-date" value="{{$quincena}}" name="date" id="quincena"><label for="quincena">Últimos 14 días</label><br />
									<input type="radio" class="input-date" value="{{$mes}}" name="date" id="mes"><label for="mes">Últimos 30 días</label><br />
									<input type="radio" class="input-date" value="todos" name="date" id="todos" checked><label class="nm" for="todos">Todos</label><br />
					 			</div>
					 		</div>
<!-- 					 		<div class="widget border">
	<h3 class="sb-title closed">Industria</h3>
	<div class="posted_widget">
									@php($industry = 0)
									@foreach($categories as $category)
										@if($category->industry_id > $industry)
											@php($industry = $category->industry_id)
											<h6>{{$category->industry->name}}</h6>
											<div class="simple-checkbox">
												<p>
													<input type="checkbox" name="category"  id="category[{{ $category->id }}]" value="{{ $category->id }}">
													<label for="category[{{ $category->id }}]">{{ $category->name }}</label>
												</p>
											</div>										
										@else
											<div class="simple-checkbox">
												<p>
													<input type="checkbox" name="category"  id="category[{{ $category->id }}]" value="{{ $category->id }}">
													<label for="category[{{ $category->id }}]">{{ $category->name }}</label>
												</p>
											</div>
										@endif
									@endforeach
	</div>
</div> -->
					 		<div class="widget border">
						 		<h3 class="sb-title closed">Precio</h3>
						 		<div class="type_widget">
						 			<div class="row">				 			
					 					<div class="col-lg-6">
					 						<span class="pf-title">min.</span>
					 						<div class="pf-field">
					 							<input type="text" name="min" id="min"/>
					 						</div>
					 					</div>
					 					<div class="col-lg-6">
					 						<span class="pf-title">max.</span>
					 						<div class="pf-field">
					 							<input type="text" name="max" id="max" />
					 						</div>
					 					</div>
					 				</div>
						 		</div>
					 		</div>
				 		</form>
				 	</aside>
					<div id="lista-canjes" class="col-lg-9 column">
						@include('filtros.canjes')
					</div>
				 </div>
			</div>
		</div>
	</section>
@endsection

@section('scripts')
<script>
	$(function(){

		$('#search').on('focusout', function() {
			filtrado();
		});

		$('input:radio[name=date]').on('click', function() {
			filtrado();
		});

/*		$('#location').on('focusout', function() {
			filtrado();
		});

		$('input:checkbox').on('click', function() {
			filtrado();
		});*/

		$('#min').on('focusout', function() {
			filtrado();
		});

		$('#max').on('focusout', function() {
			filtrado();
		});

		$(document).on('click','.page-link', function(event){
			event.prevenDefault();
			var page = $(this).attr('href').split('page=')[1];
			fetch_data(page);
		});

		function fetch_data(page){
			$.ajax({
				url:'/pagination/fetch_data_talents?page='+page,
				success:function(data){
					$('#lista-canjes').html(response);
				}
			});

		}
	});


	function filtrado(){
		var category = [];

		$("input[name='category']:checked").each(function() {
             category.push($(this).val());
        });

		var search = $('#search').val();
/*		var location = $('#location').val();*/
		var min = $('#min').val();
		var max = $('#max').val();
		var date = $('input:radio[name=date]:checked').val();

		var token = '{{csrf_token()}}';// ó $("#token").val() si lo tienes en una etiqueta html.
		//we will send data and recive data fom our AjaxController
		$.ajax({
			type:'post',
			url:'{{route("canjes")}}',
			//data:{ search:search, location:location, _token:token, category:category, min:min, max:max, date:date},
			data:{ search:search,  _token:token, min:min, max:max, date:date},
			success: function (response) {
				$('#lista-canjes').html(response);
			},
			error:function(x,xs,xt){
			//nos dara el error si es que hay alguno
			window.open(JSON.stringify(x));
			//alert('error: ' + JSON.stringify(x) +"\n error string: "+ xs + "\n error throwed: " + xt);
			}
		});
	}
</script>
@endsection