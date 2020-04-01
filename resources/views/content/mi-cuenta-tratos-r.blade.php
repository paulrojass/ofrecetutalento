<div class="border-title"><h3>{{$recibidos->count()}} Tratos recibidos</h3></div>

<div class="manage-jobs-sec">
	<div class="mini-portfolio">
 		<div class="manage-jobs-sec">
	 		<table>
	 			<thead>
	 				<tr>
	 					<td>Canje o Trato deseado</td>
	 					<td>Descripción</td>
	 					<td></td>
	 				</tr>
	 			</thead>
	 			<tbody>
					@foreach($recibidos->sortByDesc('created_at') as $recibido)

	 				<tr>
	 					<td class="col-4 pl-2 pr-2">
	 						<span class="applied-field">
								@if($recibido->exchange_id == null)
									{{ $recibido->name }}
								@else
									<a href="{{ url('canjes/'.$recibido->exchange_id) }}" title="">
		 								{{ App\Exchange::find($recibido->exchange_id)->title }}
									</a>
								@endif
	 						</span>
	 					</td>
	 					<td class="col-7">
	 						<div class="table-list-title">
	 							<p>{{ $recibido->description }}</p>
	 						</div>
	 					</td>
						@if($recibido->exchange_id != null)
							@php
							$titulo_recibido = App\Exchange::find($recibido->exchange_id)->title;
							$precio = App\Exchange::find($recibido->exchange_id)->price;
							@endphp
						@else
							@php
							$titulo_recibido = null;
							$precio = null;
							@endphp
						@endif

						@if($recibido->proposal_id != null)
							@php 
								$titulo_propuesto = App\Exchange::find($recibido->proposal_id)->title;
							@endphp
						@else
							@php 
								$titulo_propuesto = null;
							@endphp
						@endif
	 					<td class="col-1">
							<ul class="action_job pull-right">
								<li><span>Ver Trato</span>
									<a href="javascritp:void(0)" data-toggle="modal" data-target="#modal-trato" title=""
										data-type="recibido" 
										data-trato="{{ $recibido->id }}"
										data-canjer="{{ $recibido->exchange_id }}"
										data-canjep="{{ $recibido->proposal_id }}"
										data-name="{{ $recibido->name }}" 
										data-description="{{ $recibido->description }}" 
										data-ideal="{{ $recibido->ideal }}" 
										data-plus="{{ $recibido->plus }}" 
										data-value="{{ $recibido->value }}"
										data-quantity="{{ $recibido->quantity }}" 
										data-approved="{{ $recibido->approved }}" 
										data-dealingready="{{ $recibido->dealing_ready }}" 
										data-proposalready="{{ $recibido->proposal_ready }}" 
										data-exchangeid="{{ $titulo_recibido }}" 
										data-exchangeprice="{{ $precio }}" 
										data-proposalid="{{ $titulo_propuesto }}" 
										data-exchangedays="{{ $recibido->exchange_days }}" 
										data-proposaldays="{{ $recibido->proposal_days }}" 
										data-pay="{{ $recibido->pay }}" 
										data-created="{{ $recibido->created }}" 
										data-acceptid="{{ $recibido->accept_id }}" 
										data-proposeid="{{ $recibido->propose_id }}" >
									<i class="la la-eye"></i>
									</a>
								</li>
							</ul>
						</td>
	 				</tr>
 					@endforeach
	 			</tbody>
	 		</table>
 		</div>
	</div>
</div>