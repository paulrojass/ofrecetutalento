<div class="border-title"><h3>{{$recibidos->count()}} Tratos recibidos</h3></div>

<div class="manage-jobs-sec">
	<div class="mini-portfolio">
 		<div class="manage-jobs-sec">
	 		<table>
	 			<thead>
	 				<tr>
	 					<td>Requerimiento</td>
	 					<td>Solicitado</td>
	 					<td>Propuesto</td>
	 					<td></td>
	 				</tr>
	 			</thead>
	 			<tbody>
					@foreach($recibidos->sortByDesc('created_at') as $recibido)
	 				<tr>
	 					<td class="col-7">
	 						<div class="table-list-title">
	 							<!-- <span class="applied-field">{{ $recibido->description }}</span> -->
	 							<p>{{ $recibido->description }}</p>
	 							<!-- <span><i class="la la-map-marker"></i>Sacramento, California</span> -->
	 						</div>
	 					</td>
	 					<td class="col-2">
	 						<span class="applied-field">{{ $recibido->exchange_id }}</span>
	 					</td>
	 					<td class="col-2">
	 						<span>{{ $recibido->exchange_proposal }}</span>
	 					</td>
	 					<td class="col-1">
	 						@if ($recibido->approved === NULL)
		 						<ul class="action_job">
		 							<li><span>Aceptar</span><a class="aprobar" data-value="{{ $recibido->id }}" title=""><i class="la la-check-circle"></i></a></li>
		 							<li><span>Omitir</span><a class="rechazar" data-value="{{ $recibido->id }}" title=""><i class="la la-times-circle"></i></a></li>
		 							<!-- <li><span>Delete</span><a href="#" title=""><i class="la la-trash-o"></i></a></li> -->
		 						</ul>
							@else
		 						@if($recibido->approved == 1)
		 							<span class="status active">Aceptado</span>
		 						@else
	 								<span class="status">Omitido</span>
		 						@endif
	 						@endif
	 					</td>
	 				</tr>
 					@endforeach
	 			</tbody>
	 		</table>
 		</div>
	</div>
</div>