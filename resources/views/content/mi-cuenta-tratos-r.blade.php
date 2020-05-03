@if($recibidos->count() > 0)
<div class="border-title"><h3>{{$recibidos->count()}} Tratos recibidos</h3></div>


<div class="manage-jobs-sec addscroll">
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
				<td class="pl-2 pr-2" style="width: 30%">
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
				<td style="width: 60%">
					<div class="table-list-title">
						<p>{{ $recibido->description }}</p>
					</div>
				</td>
			@if($recibido->exchange_id != null)
				@php
				$canje_solicitado  = App\Exchange::find($recibido->exchange_id);
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

			@if($recibido->proposal_id != null)
				@php
				$canje_propuesto = App\Exchange::find($recibido->proposal_id);
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
				<ul class="action_job pull-right">
					<li><span>Ver Trato</span>
						<a href="javascritp:void(0)" 
							data-toggle="modal" 
							data-target="#modal-trato" title=""
							
							data-type="solicitado" 
							data-date="{{ $recibido->created_at }}"
							data-trato="{{ $recibido->id }}"
							data-canjer="{{ $recibido->exchange_id }}"
							data-canjep="{{ $recibido->proposal_id }}"
							data-name="{{ $recibido->name }}" 
							data-description="{{ $recibido->description }}"
							data-nameproposal="{{ $recibido->name_proposal }}"
							data-descriptionproposal="{{ $recibido->description_proposal }}"
							data-ideal="{{ $recibido->ideal }}" 
							data-plus="{{ $recibido->plus }}" 
							data-value="{{ $recibido->value }}"
							data-quantity="{{ $recibido->quantity }}" 
							data-approved="{{ $recibido->approved }}" 
							data-dealingready="{{ $recibido->dealing_ready }}" 
							data-proposalready="{{ $recibido->proposal_ready }}" 
							data-exchangeid="{{ $titulo_solicitado }}" 
							data-exchangeprice="{{ $precio }}" 
							data-proposalid="{{ $titulo_propuesto }}" 
							data-exchangedays="{{ $recibido->exchange_days }}" 
							data-proposaldays="{{ $recibido->proposal_days }}" 
							data-pay="{{ $recibido->pay }}"
							data-received="{{ $recibido->received }}"
							data-created="{{ $recibido->created }}" 
							data-acceptid="{{ $recibido->accept_id }}"

							data-acc-name="{{ $recibido->user_accept->name }} {{ $recibido->user_accept->lastname }}"
							data-acc-email="{{ $recibido->user_accept->email }}"
							data-acc-phone="{{ $recibido->user_accept->phone }}"


							data-proposeid="{{ $recibido->propose_id }}"

							data-prop-name="{{ $recibido->user_propose->name }} {{ $recibido->user_propose->lastname }}"
							data-prop-email="{{ $recibido->user_propose->email }}"
							data-prop-phone="{{ $recibido->user_propose->phone }}"

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
@else
	<p class="text-center mt-5">Todavía no has recibido Propuestas</p>
@endif
