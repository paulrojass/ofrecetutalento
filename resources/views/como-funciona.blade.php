@extends('layouts.tema')

@section('title', 'Como funciona')

@section('header_type', 'gradient')

@section('content')
	<section>
		<div class="block no-padding  gray">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="inner2">
							<div class="inner-title2">
								<h3>How It Works</h3>
								<span>Get a digital tour of how Jobhunt works for you.</span>
							</div>
							<div class="page-breacrumbs">
								<ul class="breadcrumbs">
									<li><a href="{{url('/')}}" title="">Inicio</a></li>
									<li><a title="">Como funciona</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block ">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="how-works">
							<div class="how-workimg"><img src="http://placehold.it/654x417" alt="" /></div>
							<div class="how-work-detail">
								<div class="how-work-box">
									<span>1</span>
									<i class="la la-user"></i>
									<h3>Register an account</h3>
									<p>inJob is the leading and longest-running online recruitment in Turkey. We understand that job-seekers come to us not only for a job, but for an pportunity to realize their professional.</p>
								</div>
							</div>
						</div>
						<div class="how-works flip">
							<div class="how-workimg"><img src="http://placehold.it/654x417" alt="" /></div>
							<div class="how-work-detail">
								<div class="how-work-box">
									<span>2</span>
									<i class="la la-file-text"></i>
									<h3>Specify & Search Your Job</h3>
									<p>You’ll receive applications via email. You can also manage jobs and candidates from your Indeed dashboard. Review applications, Schedule interviews and view recommended candidates all from one place.</p>
								</div>
							</div>
						</div>
						<div class="how-works">
							<div class="how-workimg"><img src="http://placehold.it/654x417" alt="" /></div>
							<div class="how-work-detail">
								<div class="how-work-box">
									<span>3</span>
									<i class="la la-pencil"></i>
									<h3>Apply For Job</h3>
									<p>inJob is the leading and longest-running online recruitment in Turkey. We understand that job-seekers come to us not only for a job, but for an pportunity to realize their professional.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection