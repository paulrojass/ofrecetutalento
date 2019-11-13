@extends('layouts.tema')

@section('title', 'Suscripción')

@section('content')
<section>
    <div class="block no-padding  gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner2">
                        <div class="inner-title2">
                            <h3>Pricing</h3>
                            <span>Keep up to date with the latest news</span>
                        </div>
                        <div class="page-breacrumbs">
                            <ul class="breadcrumbs">
                                <li><a href="#" title="">Home</a></li>
                                <li><a href="#" title="">Pages</a></li>
                                <li><a href="#" title="">Pricing</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
		<div class="block">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="heading">
							<h2>Buy Our Plans And Packeges</h2>
							<span>One of our jobs has some kind of flexibility option - such as telecommuting, a part-time schedule or a flexible or flextime schedule.</span>
						</div><!-- Heading -->
						<div class="plans-sec">
							<div class="row">
                                @foreach($plans as $plan)
                                    @if($plan->id > 1)
                                    <div class="col-lg-4">
                                        <div class="pricetable">
                                            <div class="pricetable-head">
                                                <h3>{{$plan->name}}</h3>
                                                <h2>
                                                @if($plan->monthly_price)
                                                    <i>$</i>{{$plan->monthly_price}}
                                                @else
                                                    Gratis
                                                @endif
                                                </h2>
                                                <span>1 mes</span>
                                            </div><!-- Price Table -->
                                            <ul>
                                                <li>1 job posting</li>
                                                <li>0 featured job</li>
                                                <li>Job displayed for 20 days</li>
                                                <li>Premium Support 24/7</li>
                                            </ul>
                                            <a href="#" title="">BUY NOW</a>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


@endsection