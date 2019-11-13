<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>@yield('section')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="CreativeLayers">

	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/bootstrap-grid.css')}}" />
	<link rel="stylesheet" href="{{URL::asset('tema/css/icons.css')}}">
	<link rel="stylesheet" href="{{URL::asset('tema/css/animate.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/style.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/responsive.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/chosen.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/colors/colors.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{URL::asset('tema/css/bootstrap.css')}}" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css')}}" />
	
</head>
<body>

<div class="page-loading">
	<img src="{{URL::asset('tema/images/loader.gif')}}" alt="" />
</div>

<div class="theme-layout" id="scrollup">
	
	<div class="responsive-header">
		<div class="responsive-menubar">
			<div class="res-logo"><a href="{{URL::asset('tema/index.html')}}" title=""><img src="http://placehold.it/178x40" alt="" /></a></div>
			<div class="menu-resaction">
				<div class="res-openmenu">
					<img src="{{URL::asset('tema/images/icon.png')}}" alt="" /> Menu
				</div>
				<div class="res-closemenu">
					<img src="{{URL::asset('tema/images/icon2.png')}}" alt="" /> Close
				</div>
			</div>
		</div>
		<div class="responsive-opensec">
			<div class="btn-extars">
				<a href="#" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
				<ul class="account-btns">
					<li class="signup-popup"><a title=""><i class="la la-key"></i> Sign Up</a></li>
					<li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Login</a></li>
				</ul>
			</div><!-- Btn Extras -->
			<form class="res-search">
				<input type="text" placeholder="Job title, keywords or company name" />
				<button type="submit"><i class="la la-search"></i></button>
			</form>
			<div class="responsivemenu">
				<ul>
						<li class="menu-item">
							<a href="#" title="">Suscribete</a>
						</li>
						<li class="menu-item-has-children">
							<a href="#" title="">Employers</a>
							<ul>
								<li><a href="{{URL::asset('tema/employer_list1.html')}}" title=""> Employer List 1</a></li>
								<li><a href="{{URL::asset('tema/employer_list2.html')}}" title="">Employer List 2</a></li>
								<li><a href="{{URL::asset('tema/employer_list3.html')}}" title="">Employer List 3</a></li>
								<li><a href="{{URL::asset('tema/employer_list4.html')}}" title="">Employer List 4</a></li>
								<li><a href="{{URL::asset('tema/employer_single1.html')}}" title="">Employer Single 1</a></li>
								<li><a href="{{URL::asset('tema/employer_single2.html')}}" title="">Employer Single 2</a></li>
								<li class="menu-item-has-children">
									<a href="#" title="">Employer Dashboard</a>
									<ul>
										<li><a href="{{URL::asset('tema/employer_manage_jobs.html')}}" title="">Employer Job Manager</a></li>
										<li><a href="{{URL::asset('tema/employer_packages.html')}}" title="">Employer Packages</a></li>
										<li><a href="{{URL::asset('tema/employer_post_new.html')}}" title="">Employer Post New</a></li>
										<li><a href="{{URL::asset('tema/employer_profile.html')}}" title="">Employer Profile</a></li>
										<li><a href="{{URL::asset('tema/employer_resume.html')}}" title="">Employer Resume</a></li>
										<li><a href="{{URL::asset('tema/employer_transactions.html')}}" title="">Employer Transaction</a></li>
										<li><a href="{{URL::asset('tema/employer_job_alert.html')}}" title="">Employer Job Alert</a></li>
										<li><a href="{{URL::asset('tema/employer_change_password.html')}}" title="">Employer Change Password</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="menu-item-has-children">
							<a href="#" title="">Candidates</a>
							<ul>
								<li><a href="{{URL::asset('tema/candidates_list.html')}}" title="">Candidates List 1</a></li>
								<li><a href="{{URL::asset('tema/candidates_list2.html')}}" title="">Candidates List 2</a></li>
								<li><a href="{{URL::asset('tema/candidates_list3.html')}}" title="">Candidates List 3</a></li>
								<li><a href="{{URL::asset('tema/candidates_single.html')}}" title="">Candidates Single 1</a></li>
								<li><a href="{{URL::asset('tema/candidates_single2.html')}}" title="">Candidates Single 2</a></li>
								<li class="menu-item-has-children">
									<a href="#" title="">Candidates Dashboard</a>
									<ul>
										<li><a href="{{URL::asset('tema/candidates_my_resume.html')}}" title="">Candidates Resume</a></li>
										<li><a href="{{URL::asset('tema/candidates_my_resume_add_new.html')}}" title="">Candidates Resume new</a></li>
										<li><a href="{{URL::asset('tema/candidates_profile.html')}}" title="">Candidates Profile</a></li>
										<li><a href="{{URL::asset('tema/candidates_shortlist.html')}}" title="">Candidates Shortlist</a></li>
										<li><a href="{{URL::asset('tema/candidates_job_alert.html')}}" title="">Candidates Job Alert</a></li>
										<li><a href="{{URL::asset('tema/candidates_dashboard.html')}}" title="">Candidates Dashboard</a></li>
										<li><a href="{{URL::asset('tema/candidates_cv_cover_letter.html')}}" title="">CV Cover Letter</a></li>
										<li><a href="{{URL::asset('tema/candidates_change_password.html')}}" title="">Change Password</a></li>
										<li><a href="{{URL::asset('tema/candidates_applied_jobs.html')}}" title="">Candidates Applied Jobs</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="menu-item-has-children">
							<a href="#" title="">Blog</a>
							<ul>
								<li><a href="{{URL::asset('tema/blog_list.html')}}"> Blog List 1</a></li>
								<li><a href="{{URL::asset('tema/blog_list2.html')}}">Blog List 2</a></li>
								<li><a href="{{URL::asset('tema/blog_list3.html')}}">Blog List 3</a></li>
								<li><a href="{{URL::asset('tema/blog_single.html')}}">Blog Single</a></li>
							</ul>
						</li>
						<li class="menu-item-has-children">
							<a href="#" title="">Job</a>
							<ul>
								<li><a href="{{URL::asset('tema/job_list_classic.html')}}">Job List Classic</a></li>
								<li><a href="{{URL::asset('tema/job_list_grid.html')}}">Job List Grid</a></li>
								<li><a href="{{URL::asset('tema/job_list_modern.html')}}">Job List Modern</a></li>
								<li><a href="{{URL::asset('tema/job_single1.html')}}">Job Single 1</a></li>
								<li><a href="{{URL::asset('tema/job_single2.html')}}">Job Single 2</a></li>
								<li><a href="{{URL::asset('tema/ob-single3.html')}}">Job Single 3</a></li>
							</ul>
						</li>
						<li class="menu-item-has-children">
							<a href="#" title="">Pages</a>
							<ul>
								<li><a href="{{URL::asset('tema/about.html')}}" title="">About Us</a></li>
								<li><a href="{{URL::asset('tema/404.html')}}" title="">404 Error</a></li>
								<li><a href="{{URL::asset('tema/contact.html')}}" title="">Contact Us 1</a></li>
								<li><a href="{{URL::asset('tema/contact2.html')}}" title="">Contact Us 2</a></li>
								<li><a href="{{URL::asset('tema/faq.html')}}" title="">FAQ's</a></li>
								<li><a href="{{URL::asset('tema/how_it_works.html')}}" title="">How it works</a></li>
								<li><a href="{{URL::asset('tema/login.html')}}" title="">Login</a></li>
								<li><a href="{{URL::asset('tema/pricing.html')}}" title="">Pricing Plans</a></li>
								<li><a href="{{URL::asset('tema/register.html')}}" title="">Register</a></li>
								<li><a href="{{URL::asset('tema/terms_and_condition.html')}}" title="">Terms & Condition</a></li>
							</ul>
						</li>
					</ul>
			</div>
		</div>
	</div>
	
	<header class="stick-top forsticky">
		<div class="menu-sec">
			<div class="container">
				<div class="logo">
					<a href="index.html" title=""><img class="hidesticky" src="http://placehold.it/178x40" alt="" /><img class="showsticky" src="http://placehold.it/178x40" alt="" /></a>
				</div><!-- Logo -->
				<div class="btn-extars">
					<a href="#" title="" class="post-job-btn"><i class="la la-plus"></i>Post Jobs</a>
					<ul class="account-btns">
						<li class="signup-popup"><a title=""><i class="la la-key"></i> Sign Up</a></li>
						<li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Login</a></li>
					</ul>
				</div><!-- Btn Extras -->
				<nav>
					<ul>
						<li class="menu-item">
							<a href="{{url('suscripcion')}}" title="">Suscribete</a>
						</li>
						<li class="menu-item-has-children">
							<a href="#" title="">Employers</a>
							<ul>
								<li><a href="{{URL::asset('tema/employer_list1.html')}}" title=""> Employer List 1</a></li>
								<li><a href="{{URL::asset('tema/employer_list2.html')}}" title="">Employer List 2</a></li>
								<li><a href="{{URL::asset('tema/employer_list3.html')}}" title="">Employer List 3</a></li>
								<li><a href="{{URL::asset('tema/employer_list4.html')}}" title="">Employer List 4</a></li>
								<li><a href="{{URL::asset('tema/employer_single1.htm')}}" title="">Employer Single 1</a></li>
								<li><a href="{{URL::asset('tema/employer_single2.html')}}" title="">Employer Single 2</a></li>
								<li class="menu-item-has-children">
									<a href="#" title="">Employer Dashboard</a>
									<ul>
										<li><a href="{{URL::asset('tema/employer_manage_jobs.html')}}" title="">Employer Job Manager</a></li>
										<li><a href="{{URL::asset('tema/employer_packages.html')}}" title="">Employer Packages</a></li>
										<li><a href="{{URL::asset('tema/employer_post_new.html')}}" title="">Employer Post New</a></li>
										<li><a href="{{URL::asset('tema/employer_profile.html')}}" title="">Employer Profile</a></li>
										<li><a href="{{URL::asset('tema/employer_resume.html')}}" title="">Employer Resume</a></li>
										<li><a href="{{URL::asset('tema/employer_transactions.html')}}" title="">Employer Transaction</a></li>
										<li><a href="{{URL::asset('tema/employer_job_alert.html')}}" title="">Employer Job Alert</a></li>
										<li><a href="{{URL::asset('tema/employer_change_password.html')}}" title="">Employer Change Password</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="menu-item-has-children">
							<a href="#" title="">Candidates</a>
							<ul>
								<li><a href="{{URL::asset('tema/candidates_list.html')}}" title="">Candidates List 1</a></li>
								<li><a href="{{URL::asset('tema/candidates_list2.html')}}" title="">Candidates List 2</a></li>
								<li><a href="{{URL::asset('tema/candidates_list3.html')}}" title="">Candidates List 3</a></li>
								<li><a href="{{URL::asset('tema/candidates_single.html')}}" title="">Candidates Single 1</a></li>
								<li><a href="{{URL::asset('tema/candidates_single2.html')}}" title="">Candidates Single 2</a></li>
								<li class="menu-item-has-children">
									<a href="#" title="">Candidates Dashboard</a>
									<ul>
										<li><a href="{{URL::asset('tema/candidates_my_resume.html')}}" title="">Candidates Resume</a></li>
										<li><a href="{{URL::asset('tema/candidates_my_resume_add_new.html')}}" title="">Candidates Resume new</a></li>
										<li><a href="{{URL::asset('tema/candidates_profile.html')}}" title="">Candidates Profile</a></li>
										<li><a href="{{URL::asset('tema/candidates_shortlist.html')}}" title="">Candidates Shortlist</a></li>
										<li><a href="{{URL::asset('tema/candidates_job_alert.html')}}" title="">Candidates Job Alert</a></li>
										<li><a href="{{URL::asset('tema/candidates_dashboard.html')}}" title="">Candidates Dashboard</a></li>
										<li><a href="{{URL::asset('tema/candidates_cv_cover_letter.html')}}" title="">CV Cover Letter</a></li>
										<li><a href="{{URL::asset('tema/candidates_change_password.html')}}" title="">Change Password</a></li>
										<li><a href="{{URL::asset('tema/candidates_applied_jobs.html')}}" title="">Candidates Applied Jobs</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="menu-item-has-children">
							<a href="#" title="">Blog</a>
							<ul>
								<li><a href="{{URL::asset('tema/blog_list.html')}}"> Blog List 1</a></li>
								<li><a href="{{URL::asset('tema/blog_list2.html')}}">Blog List 2</a></li>
								<li><a href="{{URL::asset('tema/blog_list3.html')}}">Blog List 3</a></li>
								<li><a href="{{URL::asset('tema/blog_single.html')}}">Blog Single</a></li>
							</ul>
						</li>
						<li class="menu-item-has-children">
							<a href="#" title="">Job</a>
							<ul>
								<li><a href="{{URL::asset('tema/job_list_classic.html')}}">Job List Classic</a></li>
								<li><a href="{{URL::asset('tema/job_list_grid.html')}}">Job List Grid</a></li>
								<li><a href="{{URL::asset('tema/job_list_modern.html')}}">Job List Modern</a></li>
								<li><a href="{{URL::asset('tema/job_single1.html')}}">Job Single 1</a></li>
								<li><a href="{{URL::asset('tema/job_single2.html')}}">Job Single 2</a></li>
								<li><a href="{{URL::asset('tema/job-single3.html')}}">Job Single 3</a></li>
							</ul>
						</li>
						<li class="menu-item-has-children">
							<a href="#" title="">Pages</a>
							<ul>
								<li><a href="{{URL::asset('tema/about.html')}}" title="">About Us</a></li>
								<li><a href="{{URL::asset('tema/404.html')}}" title="">404 Error</a></li>
								<li><a href="{{URL::asset('tema/contact.html')}}" title="">Contact Us 1</a></li>
								<li><a href="{{URL::asset('tema/contact2.html')}}" title="">Contact Us 2</a></li>
								<li><a href="{{URL::asset('tema/faq.html')}}" title="">FAQ's</a></li>
								<li><a href="{{URL::asset('tema/how_it_works.html')}}" title="">How it works</a></li>
								<li><a href="{{URL::asset('tema/login.html')}}" title="">Login</a></li>
								<li><a href="{{URL::asset('tema/pricing.html')}}" title="">Pricing Plans</a></li>
								<li><a href="{{URL::asset('tema/register.html')}}" title="">Register</a></li>
								<li><a href="{{URL::asset('tema/terms_and_condition.html')}}" title="">Terms & Condition</a></li>
							</ul>
						</li>
					</ul>
				</nav><!-- Menus -->
			</div>
		</div>
	</header>

	@yield('content')

	<footer>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 column">
						<div class="widget">
							<div class="about_widget">
								<div class="logo">
									<a href="#" title=""><img src="http://placehold.it/178x40" alt="" /></a>
								</div>
								<span>Collin Street West, Victor 8007, Australia.</span>
								<span>+1 246-345-0695</span>
								<span>info@jobhunt.com</span>
								<div class="social">
									<a href="#" title=""><i class="fa fa-facebook"></i></a>
									<a href="#" title=""><i class="fa fa-twitter"></i></a>
									<a href="#" title=""><i class="fa fa-linkedin"></i></a>
									<a href="#" title=""><i class="fa fa-pinterest"></i></a>
									<a href="#" title=""><i class="fa fa-behance"></i></a>
								</div>
							</div><!-- About Widget -->
						</div>
					</div>
					<div class="col-lg-4 column">
						<div class="widget">
							<h3 class="footer-title">Frequently Asked Questions</h3>
							<div class="link_widgets">
								<div class="row">
									<div class="col-lg-6">
										<a href="#" title="">Privacy & Seurty </a>
										<a href="#" title="">Terms of Serice</a>
										<a href="#" title="">Communications </a>
										<a href="#" title="">Referral Terms </a>
										<a href="#" title="">Lending Licnses </a>
										<a href="#" title="">Disclaimers </a>	
									</div>
									<div class="col-lg-6">
										<a href="#" title="">Support </a>
										<a href="#" title="">How It Works </a>
										<a href="#" title="">For Employers </a>
										<a href="#" title="">Underwriting </a>
										<a href="#" title="">Contact Us</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-2 column">
						<div class="widget">
							<h3 class="footer-title">Find Jobs</h3>
							<div class="link_widgets">
								<div class="row">
									<div class="col-lg-12">
										<a href="#" title="">US Jobs</a>	
										<a href="#" title="">Canada Jobs</a>	
										<a href="#" title="">UK Jobs</a>	
										<a href="#" title="">Emplois en Fnce</a>	
										<a href="#" title="">Jobs in Deuts</a>	
										<a href="#" title="">Vacatures China</a>	
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3 column">
						<div class="widget">
							<div class="download_widget">
								<a href="#" title=""><img src="http://placehold.it/230x65" alt="" /></a>
								<a href="#" title=""><img src="http://placehold.it/230x65" alt="" /></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="bottom-line">
			<span>© 2018 Jobhunt All rights reserved. Design by Creative Layers</span>
			<a href="#scrollup" class="scrollup" title=""><i class="la la-arrow-up"></i></a>
		</div>
	</footer>

</div>

<div class="account-popup-area signin-popup-box">
	<div class="account-popup">
		<span class="close-popup"><i class="la la-close"></i></span>
		<h3>User Login</h3>
		<span>Click To Login With Demo User</span>
		<div class="select-user">
			<span>Candidate</span>
			<span>Employer</span>
		</div>
		<form>
			<div class="cfield">
				<input type="text" placeholder="Username" />
				<i class="la la-user"></i>
			</div>
			<div class="cfield">
				<input type="password" placeholder="********" />
				<i class="la la-key"></i>
			</div>
			<p class="remember-label">
				<input type="checkbox" name="cb" id="cb1"><label for="cb1">Remember me</label>
			</p>
			<a href="#" title="">Forgot Password?</a>
			<button type="submit">Login</button>
		</form>
		<div class="extra-login">
			<span>Or</span>
			<div class="login-social">
				<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
				<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
			</div>
		</div>
	</div>
</div><!-- LOGIN POPUP -->

<div class="account-popup-area signup-popup-box">
	<div class="account-popup">
		<span class="close-popup"><i class="la la-close"></i></span>
		<h3>Sign Up</h3>
		<div class="select-user">
			<span>Candidate</span>
			<span>Employer</span>
		</div>
		<form>
			<div class="cfield">
				<input type="text" placeholder="Username" />
				<i class="la la-user"></i>
			</div>
			<div class="cfield">
				<input type="password" placeholder="********" />
				<i class="la la-key"></i>
			</div>
			<div class="cfield">
				<input type="text" placeholder="Email" />
				<i class="la la-envelope-o"></i>
			</div>
			<div class="dropdown-field">
				<select data-placeholder="Please Select Specialism" class="chosen">
					<option>Web Development</option>
					<option>Web Designing</option>
					<option>Art & Culture</option>
					<option>Reading & Writing</option>
				</select>
			</div>
			<div class="cfield">
				<input type="text" placeholder="Phone Number" />
				<i class="la la-phone"></i>
			</div>
			<button type="submit">Signup</button>
		</form>
		<div class="extra-login">
			<span>Or</span>
			<div class="login-social">
				<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
				<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
			</div>
		</div>
	</div>
</div><!-- SIGNUP POPUP -->

<script src="{{URL::asset('tema/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/modernizr.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/script.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/wow.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/slick.min.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/parallax.js')}}" type="text/javascript"></script>
<script src="{{URL::asset('tema/js/select-chosen.js')}}" type="text/javascript"></script>

</body>
</html>

