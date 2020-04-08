@extends('layouts.tema')

@section('title', 'Talentos')

@section('header_type', 'stick-top style3')

@section('content')
	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<h3>
							<img height="60" src="{{URL::asset('tema/images/busca.png')}}">

							Encuentra el talento que deseas</h3>
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
										<input type="text" id="search" name="search" placeholder="Buscar" @isset($busqueda) value="{{ $busqueda }}" @endisset />
										<i class="la la-search"></i>
									</div><!-- Search Widget -->
									<div class="field_w_search">
										<input type="text" id="location" name="location" placeholder="Ubicacion" />
										<i class="la la-map-marker"></i>
									</div><!-- location Widget -->
								</div>
							</div>
							<div class="widget mb-5">
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
					<input type="hidden" name="hidden_page" id="hidden_page" value="1" />
				 </div>
			</div>
		</div>
	</section>
@endsection

@section('scripts')
<script>
	$(function(){
		/*Busqueda en inputs*/
		$('#search').on('focusout', function() {
			var page = $('#hidden_page').val();
			filtrado(page);
		});
		$('#search').on('keypress',function(e) {
		    if(e.which == 13) {
				$(this).focusout();
		    }
		});

		$('#location').on('focusout', function() {
			var page = $('#hidden_page').val();
			filtrado(page);
		});
		$('#location').on('keypress',function(e) {
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
		var location = $('#location').val();

		fetch_data(page, search, location, category);
	}

	function fetch_data(page, search, location, category){
		$.ajax({
			url:'/talentos/fetch_data?page='+page+'&search='+search+'&location='+location+'&category='+JSON.stringify(category),
			type:'get',
			success:function(response){
				$('#lista-talentos').html('');
				$('#lista-talentos').html(response);
			}
		});
	}
</script>

@endsection

@section('footer')
	@include('includes.footer')
@endsection