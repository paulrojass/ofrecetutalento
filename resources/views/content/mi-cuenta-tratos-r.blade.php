<div class="border-title"><h3>{{$recibidos->count()}} Tratos recibidos</h3></div>

<div class="manage-jobs-sec">
	<div class="mini-portfolio">
 		<div class="manage-jobs-sec">
	 		<table>
	 			<thead>
	 				<tr>
	 					<td>Requerimiento</td>
	 					<td>Canje solicitado</td>
	 					<td>Canje propuesto</td>
	 					<td></td>
	 				</tr>
	 			</thead>
	 			<tbody>
					@foreach($recibidos->sortByDesc('created_at') as $recibido)

	 				<tr>
	 					<td class="col-5">
	 						<div class="table-list-title">
	 							<p>{{ $recibido->description }}</p>
	 						</div>
	 					</td>
	 					<td class="col-3 pl-2 pr-2">
	 						<span class="applied-field">
								<a href="{{ url('canjes/'.$recibido->exchange_id) }}" title="">
	 								{{ App\Exchange::find($recibido->exchange_id)->title }}
								</a>
	 						</span>
	 					</td>
	 					<td class="col-3 pl-2 pr-2">
	 						<span>
							@isset($recibido->exchange_proposal)
	 							<span> {{ App\Exchange::find($recibido->exchange_proposal)->title }} </span>
							@else
	 							<span>${{ App\Exchange::find($recibido->exchange_id)->price}}</span>
							@endisset
	 						</span>
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