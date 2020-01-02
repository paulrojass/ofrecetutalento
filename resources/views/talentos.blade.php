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
						<div class="inner-header">
							<h3>Encuentra el talento que solicitas</h3>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block remove-bottom">
			<div class="container">
				 <div class="row no-gape">
					<aside class="col-lg-3 column">
<!-- 						<form method="POST" action="{{ route('talentos') }}"> -->
						<form>
							@csrf
							<div class="widget">
								<div class="search_widget_job">
									<div class="field_w_search">
										<input type="text" id="search" name="search" placeholder="Buscar" />
										<i class="la la-search"></i>
									</div><!-- Search Widget -->
									<div class="field_w_search">
										<input type="text" id="location" name="location" placeholder="Ubicacion" />
										<i class="la la-map-marker"></i>
									</div><!-- location Widget -->
								</div>
							</div>
							<div class="widget">
								<h3 class="sb-title open">Categorias</h3>
								<div class="specialism_widget">
<!-- 									<div class="simple-checkbox">
	<p>
		<input type="checkbox" name="all"  id="all" checked>
		<label for="all">Todas</label>
	</p>
</div>	 -->
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
<!-- 							<div class="pull-right">
	<button type="submit" class="post-job-btn btn-filtrar"><i class="la la-filter"></i>Filtrar</button>
</div> -->
						</form>
					</aside>
					
					<div id="lista-talentos" class="col-lg-9 column">
						@include('filtros.talentos')
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

		$('#location').on('focusout', function() {
			filtrado();
		});

		$('input:checkbox').on('click', function() {
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
					$('#lista-talentos').html(response);
				}
			});

		}

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
	});

	function filtrado(){

		var category = [];

		$("input[name='category']:checked").each(function() {
             //category.push([$(this).val(), $(this).val()]);
             category.push($(this).val());
        });

		var search = $('#search').val();
		var location = $('#location').val();

		var token = '{{csrf_token()}}';// ó $("#token").val() si lo tienes en una etiqueta html.
		//we will send data and recive data fom our AjaxController
		$.ajax({
			type:'get',
			url:'{{route("talentos")}}',
			data:{ search:search, location:location, _token:token, category:category },
			success: function (response) {
				$('#lista-talentos').html(response);
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