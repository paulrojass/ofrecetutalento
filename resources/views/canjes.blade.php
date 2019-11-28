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
									<h4>Explora todos lo canjes disponibles con una simple búsqueda...</h4>
									<form>
										<div class="row">
											<div class="col-lg-7">
												<div class="job-field">
													<input type="text" placeholder="Job title, keywords or company name" />
													<i class="la la-keyboard-o"></i>
												</div>
											</div>
											<div class="col-lg-4">
												<div class="job-field">
													<select data-placeholder="City, province or region" class="chosen-city">
														<option>Istanbul</option>
														<option>New York</option>
														<option>London</option>
														<option>Russia</option>
													</select>
													<i class="la la-map-marker"></i>
												</div>
											</div>
											<div class="col-lg-1">
												<button type="submit"><i class="la la-search"></i></button>
											</div>
										</div>
									</form>
									<div class="tags-bar">
								 		<div class="action-tags">
								 			<a href="#" title=""><i class="la la-cloud-download"></i> Save</a>
								 			<a href="#" title=""><i class="la la-trash-o"></i> Clean</a>
								 		</div>
								 	</div><!-- Tags Bar -->
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
				 		<div class="widget border">
				 			<h3 class="sb-title open">Date Posted</h3>
				 			<div class="posted_widget">
								<input type="radio" name="choose" id="232"><label for="232">Last Hour</label><br />
								<input type="radio" name="choose" id="wwqe"><label for="wwqe">Last 24 hours</label><br />
								<input type="radio" name="choose" id="erewr"><label for="erewr">Last 7 days</label><br />
								<input type="radio" name="choose" id="qwe"><label for="qwe">Last 14 days</label><br />
								<input type="radio" name="choose" id="wqe"><label for="wqe">Last 30 days</label><br />
								<input type="radio" name="choose" id="qweqw"><label class="nm" for="qweqw">All</label><br />
				 			</div>
				 		</div>
				 		<div class="widget border">
				 			<h3 class="sb-title open">Job Type</h3>
				 			<div class="type_widget">
								<p class="flchek"><input type="checkbox" name="choosetype" id="33r"><label for="33r">Freelance (9)</label></p>
								<p class="ftchek"><input type="checkbox" name="choosetype" id="dsf"><label for="dsf">Full Time (8)</label></p>
								<p class="ischek"><input type="checkbox" name="choosetype" id="sdd"><label for="sdd">Internship (8)</label></p>
								<p class="ptchek"><input type="checkbox" name="choosetype" id="sadd"><label for="sadd">Part Time (5)</label></p>
								<p class="tpchek"><input type="checkbox" name="choosetype" id="assa"><label for="assa">Temporary (5)</label></p>
								<p class="vtchek"><input type="checkbox" name="choosetype" id="ghgf"><label for="ghgf">Volunteer (8)</label></p>
				 			</div>
				 		</div>
			 			<div class="banner_widget">
			 				<a href="#" title=""><img src="http://placehold.it/263x280" alt="" /></a>
						</div>
				 	</aside>
				 	<div class="col-lg-9 column">
				 		<div class="modrn-joblist np">
					 		<div class="filterbar">
					 			<span class="emlthis"><a href="mailto:example.com" title=""><i class="la la-envelope-o"></i> Email me Jobs Like These</a></span>
					 			<div class="sortby-sec">
					 				<span>Sort by</span>
					 				<select data-placeholder="Most Recent" class="chosen">
										<option>Most Recent</option>
										<option>Most Recent</option>
										<option>Most Recent</option>
										<option>Most Recent</option>
									</select>
									<select data-placeholder="20 Per Page" class="chosen">
										<option>30 Per Page</option>
										<option>40 Per Page</option>
										<option>50 Per Page</option>
										<option>60 Per Page</option>
									</select>
					 			</div>
					 			<h5>{{$exchanges->total()}} Canjes disponibles</h5>
					 		</div>
						 </div><!-- MOdern Job LIst -->
						 <div class="job-list-modern">
						 	<div class="job-listings-sec no-border">

								@foreach($exchanges as $exchange)
								<div class="job-listing wtabs">
									<div class="job-title-sec">
										<div class="c-logo"> <img src="http://placehold.it/98x51" alt="" /> </div>
										<h3><a href="#" title="">{{$exchange->title}}</a></h3>
										<span>Massimo Artemisis</span>
										<div class="job-lctn"><i class="la la-map-marker"></i>Sacramento, California</div>
									</div>
									<div class="job-style-bx">
										<span class="job-is ft">Full time</span>
										<span class="fav-job"><i class="la la-heart-o"></i></span>
										<i>5 months ago</i>
									</div>
								</div>
								@endforeach
								{{ $exchanges->links() }}
							</div>
							<div class="pagination">
								<ul>
									<li class="prev"><a href=""><i class="la la-long-arrow-left"></i> Prev</a></li>
									<li><a href="">1</a></li>
									<li class="active"><a href="">2</a></li>
									<li><a href="">3</a></li>
									<li><span class="delimeter">...</span></li>
									<li><a href="">14</a></li>
									<li class="next"><a href="">Next <i class="la la-long-arrow-right"></i></a></li>
								</ul>
							</div><!-- Pagination -->
						 </div>
					 </div>
				 </div>
			</div>
		</div>
	</section>

@endsection