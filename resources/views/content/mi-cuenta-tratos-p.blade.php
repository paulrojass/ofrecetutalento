<div class="border-title"><h3>{{$propuestos->count()}} Tratos propuestos</h3></div>

@if($propuestos->count() > 0)
<div class="manage-jobs-sec">
	<div class="mini-portfolio">
 		<div class="manage-jobs-sec">
	 		<table>
	 			<thead>
	 				<tr>
	 					<td>Canje o Trato Deseado</td>
	 					<td>Descripción</td>
	 					<td></td>
	 				</tr>
	 			</thead>
	 			<tbody>
					@foreach($propuestos->sortByDesc('created_at') as $propuesto)
	 				<tr>
	 					<td class="col-3">
	 						<span class="applied-field">
								@if($propuesto->exchange_id == null)
									{{ $propuesto->name }}
								@else
									<a href="{{ url('canjes/'.$propuesto->exchange_id) }}" title="">
		 								{{App\Exchange::find($propuesto->exchange_id)->title}}
									</a>
								@endif
							</span>
	 					</td>
	 					<td class="col-5">
	 						<div class="table-list-title mr-5">
	 							<p>{{ $propuesto->description }}</p>
	 						</div>
	 					</td>
						@if($propuesto->exchange_id != null)
							@php
							$titulo_recibido = App\Exchange::find($propuesto->exchange_id)->title;
							$precio = App\Exchange::find($propuesto->exchange_id)->price;
							@endphp
						@else
							@php
							$titulo_recibido = null;
							$precio = null;
							@endphp
						@endif

						@if($propuesto->proposal_id != null)
							@php 
								$titulo_propuesto = App\Exchange::find($propuesto->proposal_id)->title;
							@endphp
						@else
							@php 
								$titulo_propuesto = null;
							@endphp
						@endif
	 					<td class="col-1">
<!-- 	 						@if($propuesto->approved == NULL)
<span class="status active">Pendiente</span>
@else
	@if($propuesto->approved == 1)
		<span class="status active">Aceptado</span>
	@else
		<span class="status">Omitido</span>
	@endif
@endif -->

							<ul class="action_job pull-right">
								<li><span>Ver Trato</span>
									<a href="javascritp:void(0)" data-toggle="modal" data-target="#modal-trato" title=""
										data-type="propuesto"
										data-date="{{ $propuesto->created_at }}"
										data-trato="{{ $propuesto->id }}"
										data-canjer="{{ $propuesto->exchange_id }}"
										data-canjep="{{ $propuesto->proposal_id }}"
										data-name="{{ $propuesto->name }}" 
										data-description="{{ $propuesto->description }}" 
										data-ideal="{{ $propuesto->ideal }}" 
										data-plus="{{ $propuesto->plus }}" 
										data-value="{{ $propuesto->value }}" 
										data-quantity="{{ $propuesto->quantity }}" 
										data-approved="{{ $propuesto->approved }}" 
										data-dealingready="{{ $propuesto->dealing_ready }}" 
										data-proposalready="{{ $propuesto->proposal_ready }}" 
										data-exchangeid="{{ $titulo_recibido }}" 
										data-exchangeprice="{{ $precio }}" 
										data-proposalid="{{ $titulo_propuesto }}" 
										data-exchangedays="{{ $propuesto->exchange_days }}" 
										data-proposaldays="{{ $propuesto->proposal_days }}" 
										data-pay="{{ $propuesto->pay }}" 
										data-created="{{ $propuesto->created }}" 
										data-acceptid="{{ $propuesto->accept_id }}" 
										data-proposeid="{{ $propuesto->propose_id }}" 
									>
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
@else
<h4> Todavia no has realizado propuestas </h4>
@endif