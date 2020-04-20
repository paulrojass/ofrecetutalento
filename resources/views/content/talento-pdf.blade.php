<div class="row">
	<div class="col-lg-12 column">
 		<div class="job-single-sec">
 			<div class="job-single-head2">
				<div class="mini-portfolio">
					<div class="job-details">
	 				<h3>Archivos Pdf</h3>
	 				</div> 
					<div class="padding-left">
						<div class="manage-jobs-sec addscroll">
							<table class="mt-0">
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
				</div>
 			</div>
		</div>
	</div>
</div>	