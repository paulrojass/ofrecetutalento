@extends('layouts.tema')

@section('title', 'Peril de usuario')

@section('header_type', 'stick-top style3')

@section('content')
	<section class="overlape">
		<div class="block no-padding">
			<div data-velocity="-.1" style="background: url(http://placehold.it/1600x800) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
			<div class="container fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner-header">
							<div class="container">
								<div class="row">
									<div class="col-lg-6">
										<div class="skills-btn">
											<a href="#" title="">Photoshop</a>
											<a href="#" title="">Designers</a>
											<a href="#" title="">Illustrator</a>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="action-inner">
											<a href="#" title=""><i class="la la-paper-plane"></i>Save Resume</a>
											<a href="#" title=""><i class="la la-envelope-o"></i>Contact David</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="overlape">
		<div class="block remove-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="cand-single-user">
							<div class="share-bar circle">
				 				<a href="#" title="" class="share-google"><i class="la la-google"></i></a><a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a><a href="#" title="" class="share-twitter"><i class="fa fa-twitter"></i></a>
				 			</div>
				 			<div class="can-detail-s">
				 				<div class="cst"><img src="{{URL::asset($user->avatar)}}" alt="" /></div>
				 				<h3>{{ $user->name }} {{ $user->lastname }}</h3>
				 				<span><i>UX / UI Designer</i> at Atract Solutions</span>
				 				<p>{{ $user->email }}</p>
				 				<p>Miembro desde, {{ \Carbon\Carbon::parse($user->created_at)->format('Y')}} </p>
				 				<p><i class="la la-map-marker"></i>{{ $user->city }}, {{ $user->country }}</p>
				 			</div>
				 			<div class="download-cv">
				 				<a href="#" title="">Download CV <i class="la la-download"></i></a>
				 			</div>
				 		</div>
				 		<ul class="cand-extralink">
				 			<li><a href="#abilities" title="">habilidades</a></li>
				 			<li><a href="#talentos" title="">Talentos</a></li>
				 			<li><a href="#experience" title="">Work Experience</a></li>
				 			<li><a href="#portfolio" title="">Portfolio</a></li>
				 			<li><a href="#skills" title="">Professional Skills</a></li>
				 			<li><a href="#awards" title="">Awards</a></li>
				 		</ul>
				 		<div class="cand-details-sec">
				 			<div class="row">
				 				<div class="col-lg-8 column">
				 					<div class="cand-details" id="abilities">
				 						<h2>Descripción de habilidades</h2>
				 						<p>{{ $user->abilities }}</p>
				 						<div class="edu-history-sec" id="talentos">
				 							<h2>Talentos</h2>
<!-- 				 							<div class="edu-history">
	<i class="la la-graduation-cap"></i>
	<div class="edu-hisinfo">
		<h3>University</h3>
		<i>2008 - 2012</i>
		<span>Middle East Technical University <i>Computer Science</i></span>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
	</div>
</div>
<div class="edu-history">
	<i class="la la-graduation-cap"></i>
	<div class="edu-hisinfo">
		<h3>High School</h3>
		<i>2008 - 2012</i>
		<span>Tomms College <i>Bachlors in Fine Arts</i></span>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
	</div>
</div> -->

					 		<div class="manage-jobs-sec">
					 			<h3>Manage Jobs</h3>
					 			<div class="extra-job-info">
						 			<span><i class="la la-clock-o"></i><strong>9</strong> Job Posted</span>
						 			<span><i class="la la-file-text"></i><strong>20</strong> Application</span>
						 			<span><i class="la la-users"></i><strong>18</strong> Active Jobs</span>
						 		</div>
						 		<table>
						 			<thead>
						 				<tr>
						 					<td>Descripción</td>
						 					<td>Industria</td>
						 					<td>Categoria</td>
						 					<td>Experiencia</td>
						 					<td>Action</td>
						 				</tr>
						 			</thead>
						 			<tbody>
						 				@foreach($user->talents as $talent)
							 				<tr>
							 					<td>
							 						<div class="table-list-title">
							 							<h3>{{ $user->talent->title }}</h3>
							 							<span>{{ $user->talent->description }}</span>
							 						</div>
							 					</td>
							 					<td>
							 						<span class="applied-field">3+ Applied</span>
							 					</td>
							 					<td>
							 						<span>October 27, 2017</span><br />
							 						<span>April 25, 2011</span>
							 					</td>
							 					<td>
							 						<span class="status active">Active</span>
							 					</td>
							 					<td>
							 						<ul class="action_job">
							 							<li><span>View Job</span><a href="#" title=""><i class="la la-eye"></i></a></li>
							 							<li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
							 							<li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
							 						</ul>
							 					</td>
							 				</tr>
						 				@endforeach
						 			</tbody>
						 		</table>
					 		</div>





				 						</div>
				 						<div class="edu-history-sec" id="experience">
				 							<h2>Work & Experience</h2>
				 							<div class="edu-history style2">
				 								<i></i>
				 								<div class="edu-hisinfo">
				 									<h3>Web Designer <span>Inwave Studio</span></h3>
				 									<i>2008 - 2012</i>
				 									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
				 								</div>
				 							</div>
				 							<div class="edu-history style2">
				 								<i></i>
				 								<div class="edu-hisinfo">
				 									<h3>CEO Founder <span>Inwave Studio</span></h3>
				 									<i>2008 - 2012</i>
				 									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
				 								</div>
				 							</div>
				 						</div>
				 						<div class="mini-portfolio" id="portfolio">
				 							<h2>Portfolio</h2>
				 							<div class="mp-row">
				 								<div class="mp-col">
				 									<div class="mportolio"><img src="http://placehold.it/165x115" alt="" /><a href="#" title=""><i class="la la-search"></i></a></div>
				 								</div>
				 								<div class="mp-col">
				 									<div class="mportolio"><img src="http://placehold.it/165x115" alt="" /><a href="#" title=""><i class="la la-search"></i></a></div>
				 								</div>
				 								<div class="mp-col">
				 									<div class="mportolio"><img src="http://placehold.it/165x115" alt="" /><a href="#" title=""><i class="la la-search"></i></a></div>
				 								</div>
				 								<div class="mp-col">
				 									<div class="mportolio"><img src="http://placehold.it/165x115" alt="" /><a href="#" title=""><i class="la la-search"></i></a></div>
				 								</div>
				 							</div>
				 						</div>
				 						<div class="progress-sec" id="skills">
				 							<h2>Professional Skills</h2>
				 							<div class="progress-sec">
				 								<span>Adobe Photoshop</span>
				 								<div class="progressbar"> <div class="progress" style="width: 80%;"><span>80%</span></div> </div>
				 							</div>
				 							<div class="progress-sec">
				 								<span>Production In Html</span>
				 								<div class="progressbar"> <div class="progress" style="width: 60%;"><span>60%</span></div> </div>
				 							</div>
				 							<div class="progress-sec">
				 								<span>Graphic Design</span>
				 								<div class="progressbar"> <div class="progress" style="width: 75%;"><span>75%</span></div> </div>
				 							</div>
				 						</div>
				 						<div class="edu-history-sec" id="awards">
				 							<h2>Awards</h2>
				 							<div class="edu-history style2">
				 								<i></i>
				 								<div class="edu-hisinfo">
				 									<h3>Perfect Attendance Programs</h3>
				 									<i>2008 - 2012</i>
				 									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
				 								</div>
				 							</div>
				 							<div class="edu-history style2">
				 								<i></i>
				 								<div class="edu-hisinfo">
				 									<h3>Top Performer Recognition</h3>
				 									<i>2008 - 2012</i>
				 									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
				 								</div>
				 							</div>
				 							<div class="edu-history style2">
				 								<i></i>
				 								<div class="edu-hisinfo">
				 									<h3>King LLC</h3>
				 									<i>2008 - 2012</i>
				 									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin a ipsum tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
				 								</div>
				 							</div>
				 						</div>
				 						<div class="companyies-fol-sec">
				 							<h2>Companies Followed By</h2>
				 							<div class="cmp-follow">
				 								<div class="row">
				 									<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
				 										<a href="#" title=""><img src="http://placehold.it/80x80" alt="" /><span>King LLC</span></a>
				 									</div>
				 									<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
				 										<a href="#" title=""><img src="http://placehold.it/80x80" alt="" /><span>Telimed</span></a>
				 									</div>
				 									<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
				 										<a href="#" title=""><img src="http://placehold.it/80x80" alt="" /><span>Ucesas</span></a>
				 									</div>
				 									<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
				 										<a href="#" title=""><img src="http://placehold.it/80x80" alt="" /><span>TeraPlaner</span></a>
				 									</div>
				 									<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
				 										<a href="#" title=""><img src="http://placehold.it/80x80" alt="" /><span>Cubico</span></a>
				 									</div>
				 									<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
				 										<a href="#" title=""><img src="http://placehold.it/80x80" alt="" /><span>Airbnb</span></a>
				 									</div>
				 								</div>
				 							</div>
				 						</div>
				 					</div>
				 				</div>
				 				<div class="col-lg-4 column">
						 			<div class="job-overview">
							 			<h3>Job Overview</h3>
							 			<ul>
							 				<li><i class="la la-money"></i><h3>Offerd Salary</h3><span>£15,000 - £20,000</span></li>
							 				<li><i class="la la-mars-double"></i><h3>Gender</h3><span>Female</span></li>
							 				<li><i class="la la-thumb-tack"></i><h3>Career Level</h3><span>Executive</span></li>
							 				<li><i class="la la-puzzle-piece"></i><h3>Industry</h3><span>Management</span></li>
							 				<li><i class="la la-shield"></i><h3>Experience</h3><span>2 Years</span></li>
							 				<li><i class="la la-line-chart "></i><h3>Qualification</h3><span>Bachelor Degree</span></li>
							 			</ul>
							 		</div><!-- Job Overview -->
							 		<div class="quick-form-job">
							 			<h3>Contact</h3>
							 			<form>
							 				<input type="text" placeholder="Enter your Name *" />
							 				<input type="text" placeholder="Email Address*" />
							 				<input type="text" placeholder="Phone Number" />
							 				<textarea placeholder="Message should have more than 50 characters"></textarea>
							 				<button class="submit">Send Email</button>
							 				<span>You accepts our <a href="#" title="">Terms and Conditions</a></span>
							 			</form>
							 		</div>
						 		</div>
				 			</div>
				 		</div>
					</div>
				</div>
			</div>
		</div>
	</section>


@endsection