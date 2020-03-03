<div class="border-title"><h3>{{$propuestos->count()}} Tratos recibidos</h3></div>
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
	 					<td class="col-7">
	 						<div class="table-list-title mr-5">
	 							<!-- <span class="applied-field">{{ $propuesto->description }}</span> -->
	 							<p>{{ $propuesto->description }}</p>

	 							<!-- <span><i class="la la-map-marker"></i>Sacramento, California</span> -->
	 						</div>
	 					</td>
	 					<td class="col-2">
	 						<span class="applied-field">{{ $propuesto->exchange_id }}</span>
	 					</td>
	 					<td class="col-2">
	 						<span>{{ $propuesto->exchange_proposal }}</span>
	 					</td>
	 					<td class="col-1">
	 						@if($propuesto->aproved == NULL)
	 						<span class="status active">Pendiente</span>
	 						@else
	 							@if($propuesto->aproved == 1)
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