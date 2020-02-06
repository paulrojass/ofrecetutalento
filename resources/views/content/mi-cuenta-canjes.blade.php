<div class="border-title"><h3>Canjes</h3>
	<a id="agregar-canje" data-toggle="modal" data-target="#modal-canje" title=""><i class="la la-plus"></i>
		Agregar canje
	</a>
</div>
<div class="mini-portfolio">

	<div class="container">
		 <div class="row">
		 	<div class="col-lg-12">
		 		<div class="filterbar">
		 			<h5>Ha agregado {{$exchanges->count()}} Canjes</h5>
					<!-- 				 			
					<div class="sortby-sec">
						<span>Ordenar por</span>
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
					</div> -->
		 		</div>
		 		<div class="job-grid-sec">
					<div class="row">
						@foreach($exchanges as $exchange)
						<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
							<div class="job-grid border">
								<div class="job-title-sec">
									<div class="c-logo"> <img src="{{URL::asset('images/exchanges/'.$exchange->image)}}" style="max-width: 235px; max-height: 115px" alt="" /> </div>
									<h3><a href="{{url('canjes/'.$exchange->id)}}" title="" href="{{url('canjes/'.$exchange->id)}}">{{$exchange->title}}</a></h3>
									<span>{{$exchange->talent->title}}</span>
									<!-- <span class="fav-job"><i class="la la-heart-o">{{$exchange->likes->count()}}</i></span> -->
								</div>
								<!-- <span class="job-lctn">Sacramento, California</span> -->



<!-- 		<ul class="">
	<li><span>Editar</span>
		<a class="editar-talento" 
		data-toggle="modal" data-target="#modal-talento" value="" title=""><i class="la la-pencil"></i></a></li>
	<li><span>Eliminar</span><a class="eliminar-talento" value="" title=""><i class="la la-trash-o"></i></a></li>
</ul> -->






								<a  href="{{url('canjes/'.$exchange->id)}}" title="" href="{{url('canjes/'.$exchange->id)}}">ver</a>
							</div><!-- JOB Grid -->
						</div>
						@endforeach
					</div>
				</div>
				<!-- 						
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
				</div> -->
				<!-- Pagination -->
		 	</div>
		 </div>
	</div>

</div>