<div class="padding-left">
	<div class="manage-jobs-sec">
				<div class="my-profiles-message">
				<img src="{{URL::asset('images/users/default.png') }}" style="max-height: 54px; max-width: 54px" alt="" />
			</div>
		<h3>Mensajes de usuario</h3>
<!-- 		<table> -->
				@foreach ($mensajes as $mensaje)
				@if($mensaje->user_from->id == auth()->user()->id )
				<table class="mt-0 mb-0">
				<tbody>
				<tr>
					<td class="col-9">
						<div class="table-list-title">
							<h3>{{ $mensaje->body }}</h3>
						</div>
					</td>
					<td class="col-3">
						<div class="table-list-title pull-right">
							<i>Yo</i><br />
							<span>{{ $mensaje->created_at->diffForHumans() }}</span>
						</div>
					</td>
				</tr>
				</tbody>
				</table>
				@else
				<table class="mt-0 mb-0">
				<tbody>
				<tr>
					<td class="col-3">
						<div class="table-list-title">
							<i>{{ $mensaje->user_from->name }}</i><br />
							<span>{{ $mensaje->created_at->diffForHumans() }}</span>
						</div>
					</td>
					<td class="col-9">
						<div class="table-list-title">
							<h3>{{ $mensaje->body }}</h3>
						</div>
					</td>
				</tr>
				</tbody>
				</table>
				@endif
				@endforeach
		<!-- </table> -->
	</div>
</div>