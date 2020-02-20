<!-- <div class="cat-sec">
	<div class="row no-gape">
		@foreach($archivos as $pdf)
		<div class="col-lg-3 col-md-3 col-sm-6">
			<div class="p-category">
				<a href="#" title="">
					<i class="la la-file"></i>
					<span>{{ $pdf->name }}</span>
					<p>{{ $pdf->description }}</p>
				</a>
			</div>
		</div>
		@endforeach
	</div>
</div> -->




<div class="padding-left">
	<div class="manage-jobs-sec addscroll">
		<table>
			<tbody>
				@foreach ($archivos as $pdf)
					<tr>
						<td class="pr-4">
							<div class="table-list-title">
								<h3><a href="{{ URL::asset('files/pdf/'.$pdf->location) }}" download="{{ $pdf->name.'.pdf' }}" title="">{{ $pdf->name }}</a></h3>
							</div>
						</td>
						<td>
							<span>{{ $pdf->description }}</span>
						</td>
						<td class="pl-4">
							<ul class="action_job">
								<li><span>Descargar</span><a href="{{ URL::asset('files/pdf/'.$pdf->location) }}" download="{{ $pdf->name.'.pdf' }}" title=""><i class="la la-download"></i></a></li>
							</ul>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>