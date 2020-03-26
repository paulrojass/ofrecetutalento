<div class="border-title"><h3>{{$propuestos->count()}} Tratos propuestos</h3></div>
@if($propuestos->count() > 0)
<div class="manage-jobs-sec">
	<div class="mini-portfolio">
 		<div class="manage-jobs-sec">
	 		<table>
	 			<thead>
	 				<tr>
	 					<td>Requerimiento</td>
	 					<td>Canje Deseado</td>
	 					<td>Canje Propuesto</td>
	 					<td></td>
	 				</tr>
	 			</thead>
	 			<tbody>
					@foreach($propuestos->sortByDesc('created_at') as $propuesto)

	 				<tr>
	 					<td class="col-5">
	 						<div class="table-list-title mr-5">
	 							<!-- <span class="applied-field">{{ $propuesto->description }}</span> -->
	 							<p>{{ $propuesto->description }}</p>

	 							<!-- <span><i class="la la-map-marker"></i>Sacramento, California</span> -->
	 						</div>
	 					</td>
	 					<td class="col-3">
	 						<span class="applied-field">
								<a href="{{ url('canjes/'.$propuesto->exchange_id) }}" title="">
	 								{{App\Exchange::find($propuesto->exchange_id)->title}}
								</a>
							</span>
	 					</td>
	 					<td class="col-3">
							@isset($propuesto->exchange_proposal)
								@php($nombre = App\Exchange::find($propuesto->exchange_proposal)->title)

	 							<span>{{$nombre}}</span>
							@else
	 							<span>${{ App\Exchange::find($propuesto->exchange_id)->price}}</span>
							@endisset
	 					</td>
	 					<td class="col-1">
	 						@if($propuesto->approved == NULL)
	 						<span class="status active">Pendiente</span>
	 						@else
	 							@if($propuesto->approved == 1)
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
@else
<h4> Todavia no has realizado propuestas </h4>
@endif