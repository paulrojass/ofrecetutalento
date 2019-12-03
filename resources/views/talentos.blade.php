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
                    	<form method="POST" action="{{ route('talentos-filtro') }}">
                    		@csrf
					 		<div class="widget">
					 			<div class="search_widget_job">
					 				<div class="field_w_search">
					 					<input type="text" name="search" placeholder="Buscar" />
					 					<i class="la la-search"></i>
					 				</div><!-- Search Widget -->
					 				<div class="field_w_search">
					 					<input type="text" name="location" placeholder="Ubicacion" />
					 					<i class="la la-map-marker"></i>
					 				</div><!-- Search Widget -->
					 			</div>
					 		</div>
					 		<div class="widget">
					 			<h3 class="sb-title open">Categorias</h3>
					 			<div class="specialism_widget">
					 				@php($industry = 0)
									@foreach($categories as $category)
										@if($category->industry_id > $industry)
											@php($industry = $category->industry_id)
											<h6>{{$category->industry->name}}</h6>
						 					<div class="simple-checkbox">
												<p>
													<input type="checkbox" name="category[{{ $category->id }}]"  id="category[{{ $category->id }}]" value="{{ $category->id }}">
													<label for="category[{{ $category->id }}]">{{ $category->name }}</label>
												</p>
						 					</div>										
										@else
						 					<div class="simple-checkbox">
												<p>
													<input type="checkbox" name="category[{{ $category->id }}]"  id="category[{{ $category->id }}]" value="{{ $category->id }}">
													<label for="category[{{ $category->id }}]">{{ $category->name }}</label>
												</p>
						 					</div>
										@endif





									@endforeach
					 			</div>
					 		</div>
					 		<div class="pull-right">
						 		<button type="submit" class="post-job-btn btn-filtrar"><i class="la la-filter"></i>Filtrar</button>
					 		</div>
	<!-- 						@php($industry_id = 0)
	@foreach($categories as $category)
		@if($industry_id != $category->industry_id)
			{!! $industry_id = $category->industry_id !!}
			@if($industry_id != 0)</div>@endif
	 		<div class="widget">
		 		<h3 class="sb-title open">{{ $category->industry_id }}</h3>
	 			<div class="specialism_widget">
	 				<div class="simple-checkbox">
		 				<p>
							<input type="checkbox" name="smplechk" id="{{ $category->id }}">
							<label for="{{ $category->id }}">{{ $category->name }}</label>
						</p>
	 				</div>
	 			</div>
		@else
						 			<div class="specialism_widget">
						 				<div class="simple-checkbox">
	 				<p>
						<input type="checkbox" name="smplechk" id="{{ $category->id }}">
						<label for="{{ $category->id }}">{{ $category->name }}</label>
					</p>
						 				</div>
						 			</div>
		@endif

					 		@endforeach -->



					</form>

					 	</aside>
						

				 	<div class="col-lg-9 column">
				 		<div class="emply-resume-sec">
				 			@if($users->count() == 0)
								<p> La busqueda no arrojó resultados </p>
							@else
								@foreach($users as $user)
						 			<div class="emply-resume-list square">
						 				<div class="emply-resume-thumb">
						 					<!-- <img src="http://placehold.it/90x90" alt="" /> -->
						 					<img src="{{URL::asset($user->avatar)}}" alt="" />
						 				</div>
						 				<div class="emply-resume-info">
						 					<h3><a href="#" title="">{{ $user->name}} {{ $user->lastname }}</a></h3>
											<span>
											@foreach($user->talents  as $talents)
						 						<i>{{$talents->title}}</i>, 
											@endforeach
											</span>

						 					<p><i class="la la-map-marker"></i>{{ $user->city }} / {{ $user->country }}</p>
						 				</div>
						 				<div class="shortlists">
						 					<a href="#" title="">Shortlist <i class="la la-plus"></i></a>
						 				</div>
						 			</div><!-- Emply List -->
								@endforeach
								{{ $users->links() }}
							@endif


				 			<!-- <div class="pagination">
								<ul>
									<li class="prev"><a href=""><i class="la la-long-arrow-left"></i> Prev</a></li>
									<li><a href="">1</a></li>
									<li class="active"><a href="">2</a></li>
									<li><a href="">3</a></li>
									<li><span class="delimeter">...</span></li>
									<li><a href="">14</a></li>
									<li class="next"><a href="">Next <i class="la la-long-arrow-right"></i></a></li>
								</ul>
							</div>Pagination -->
				 		</div>
					</div>
				 </div>
			</div>
		</div>
	</section>




@endsection