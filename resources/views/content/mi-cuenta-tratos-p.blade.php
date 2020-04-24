<div class="border-title"><h3>{{$propuestos->count()}} Tratos propuestos</h3></div>

@if($propuestos->count() > 0)
<!-- <div class="manage-jobs-sec">
	<div class="mini-portfolio"> -->
 		<div class="manage-jobs-sec addscroll">
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
	 					<td style="width: 30%">
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
	 					<td style="width: 60%">
	 						<div class="table-list-title mr-5">
	 							<p>{{ $propuesto->description }}</p>
	 						</div>
	 					</td>
						@if($propuesto->exchange_id != null)
							@php
							$canje_solicitado  = App\Exchange::find($propuesto->exchange_id);
							$titulo_solicitado   = $canje_solicitado->title;
							$precio            = $canje_solicitado->price;
							$imagen_solicitado = $canje_solicitado->image;
							@endphp
						@else
							@php
							$titulo_solicitado = null;
							$imagen_solicitado = null;
							$precio = null;
							@endphp
						@endif

						@if($propuesto->proposal_id != null)
							@php
							$canje_propuesto = App\Exchange::find($propuesto->proposal_id);
							$imagen_propuesto = $canje_propuesto->image;
							$titulo_propuesto = $canje_propuesto->title;
							@endphp
						@else
							@php 
								$titulo_propuesto = null;
								$imagen_propuesto = null;
							@endphp
						@endif
	 					<td style="width: 10%">

							<!-- 	 					
							@if($propuesto->approved == NULL)
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
									<a href="javascritp:void(0)" 
										data-toggle="modal" 
										data-target="#modal-trato" title=""
										
										data-type="propuesto" 
										data-date="{{ $propuesto->created_at }}"
										data-trato="{{ $propuesto->id }}"
										data-canjer="{{ $propuesto->exchange_id }}"
										data-canjep="{{ $propuesto->proposal_id }}"
										data-name="{{ $propuesto->name }}" 
										data-description="{{ $propuesto->description }}"
										data-nameproposal="{{ $propuesto->name_proposal }}"
										data-descriptionproposal="{{ $propuesto->description_proposal }}"
										data-ideal="{{ $propuesto->ideal }}" 
										data-plus="{{ $propuesto->plus }}" 
										data-value="{{ $propuesto->value }}"
										data-quantity="{{ $propuesto->quantity }}" 
										data-approved="{{ $propuesto->approved }}" 
										data-dealingready="{{ $propuesto->dealing_ready }}" 
										data-proposalready="{{ $propuesto->proposal_ready }}" 
										data-exchangeid="{{ $titulo_solicitado }}" 
										data-exchangeprice="{{ $precio }}" 
										data-proposalid="{{ $titulo_propuesto }}" 
										data-exchangedays="{{ $propuesto->exchange_days }}" 
										data-proposaldays="{{ $propuesto->proposal_days }}" 
										data-pay="{{ $propuesto->pay }}"
										data-received="{{ $propuesto->received }}"
										data-created="{{ $propuesto->created }}" 
										data-acceptid="{{ $propuesto->accept_id }}" 
										data-acc-name="{{ $propuesto->user_accept->name }} {{ $propuesto->user_accept->lastname }}"
										data-acc-email="{{ $propuesto->user_accept->email }}"
										data-acc-phone="{{ $propuesto->user_accept->phone }}"
										data-proposeid="{{ $propuesto->propose_id }}"
										data-prop-name="{{ $propuesto->user_propose->name }} {{ $propuesto->user_propose->lastname }}"
										data-prop-email="{{ $propuesto->user_propose->email }}"
										data-prop-phone="{{ $propuesto->user_propose->phone }}"
										data-imagensolicitado="{{ asset('images/exchanges/'.$imagen_solicitado) }}"
										data-imagenpropuesto="{{ asset('images/exchanges/'.$imagen_propuesto)}}" >
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
<!-- 	</div>
</div> -->
@else
<h4> Todavia no has realizado propuestas </h4>
@endif