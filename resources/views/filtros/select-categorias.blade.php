<div class="pf-field">
	<select name="categories" id="categories" class="chosen"><!--  style="display: none;"> -->
		<option value="">Selecciona una industria</option>
		@foreach($categories as $category)<option value="{{$category->id}}"> {{$category->name}} </option>@endforeach
	</select>

	@php(reset($categories))

<!-- 	<div class="chosen-container chosen-container-single chosen-container-single-nosearch" title="" id="categories_chosen" style="width: 203px;">
	<a class="chosen-single">
		<span>Selecciona una industria</span>
		<div><b></b></div>
	</a>
	<div class="chosen-drop">
		<div class="chosen-search">
			<input class="chosen-search-input" type="text" autocomplete="off" readonly="">
		</div>
		<ul class="chosen-results">
			<li class="active-result result-selected" style="" data-option-array-index="0">Selecciona una industria</li>
			@foreach($categories as $category)
				<li class="active-result" style="" data-option-array-index="{{$category->id}}">
					{{$category->name}}
				</li>
			@endforeach
		</ul>
	</div>
</div> -->
</div>