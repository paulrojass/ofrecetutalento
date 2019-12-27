<div class="edu-history-sec">
	<h3>Talentos agregados: {{auth()->user()->talents->count()}} </h3>
	@foreach(auth()->user()->talents as $talent)
		<div class="edu-history style2">
			<i></i>
			<div class="edu-hisinfo">
				<h3>{{ $talent->title }}<span>{{ $talent->category->industry->name }} -  {{ $talent->category->name }}</span></h3>
				<i>Nivel de experiencia: <strong>{{ $talent->level }}</strong></i>
			</div>
		</div>
	@endforeach
</div>