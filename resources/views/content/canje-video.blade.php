@foreach($archivos as $video)
	<div class="mp-col">
		<div class="mportolio"><img src="{{URL::asset('files/video/'.$video->location)}}" style="max-width: 165px; max-height: 165px" alt="" /><a href="#" title=""><i class="la la-search"></i></a></div>
		<ul class="action_job">
			<li><span>Edit</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
			<li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li>
		</ul>
	</div>
@endforeach