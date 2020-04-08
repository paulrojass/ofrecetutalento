@extends('layouts.tema')

@section('title', 'Canjes')

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
									</div>
									<!-- Search Widget -->
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
						 		<h3 class="sb-title">Precio</h3>
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

					 		<div class="widget border">
						 		<h3 class="sb-title">Categorias</h3>
						 		<div class="type_widget">

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
					 		</div>

				 		</form>
				 	</aside>
					<div id="lista-canjes" class="col-lg-9 column">
						@include('filtros.canjes')
					</div>
					<input type="hidden" name="hidden_page" id="hidden_page" value="1" />
				 </div>
			</div>
		</div>
	</section>
@endsection

@section('scripts')
<script>
	$(function(){

		$('#search').on('focusout', function() {
			var page = $('#hidden_page').val();
			filtrado(page);
		});
		$('#search').on('keypress',function(e) {
		    if(e.which == 13) {
				$(this).focusout();
		    }
		});

		$('input:radio[name=date]').on('click', function() {
			var page = $('#hidden_page').val();
			filtrado(page);
		});

		$('#min').on('focusout', function() {
			var page = $('#hidden_page').val();
			filtrado(page);
		});
		$('#min').on('keypress',function(e) {
		    if(e.which == 13) {
				$(this).focusout();
		    }
		});

		$('#max').on('focusout', function() {
			var page = $('#hidden_page').val();
			filtrado(page);
		});
		$('#max').on('keypress',function(e) {
		    if(e.which == 13) {
				$(this).focusout();
		    }
		});

		/*Busqueda en checkbox*/
		$('input:checkbox').on('click', function() {
			var page = $('#hidden_page').val();
			filtrado(page);
		});


		$('#all').change(function(){
			if(this.checked) {
				$(':checkbox').each(function(){
					this.checked = true;                        
				});
			} 
			else {
				$(':checkbox').each(function() {
					this.checked = false;                       
				});
			}
		});




		$(document).on('click', '.page-link', function(event){
			event.preventDefault();
			var page = $(this).attr('href').split('page=')[1];
			$('#hidden_page').val(page);

			$('li').removeClass('active');
			$(this).parent().addClass('active');
			filtrado(page);
		});
	});


	function filtrado(page){
		var category = [];
		$("input[name='category']:checked").each(function() {
            category.push($(this).val());
        });


		var search = $('#search').val();
		var min    = $('#min').val();
		var max    = $('#max').val();
		var date   = $('input:radio[name=date]:checked').val();
		var token  = '{{csrf_token()}}';
		fetch_data(page, search, min, max, date, category);
	}

	function fetch_data(page, search, min, max, date, category){
		$.ajax({
			url:'/canjes-filtro/fetch_data?page='+page+'&search='+search+'&min='+min+'&max='+max+'&date='+date+'&category='+JSON.stringify(category),
			type:'get',
			success:function(response){
				$('#lista-canjes').html('');
				$('#lista-canjes').html(response);
			},
            error: function (xhr, textStatus, errorMessage) {

                console.log("ERROR" + errorMessage + textStatus + xhr);

            }
		});
	}
</script>
@endsection


@section('footer')
	@include('includes.footer')
@endsection