<div class="form-group">
	@if (!empty($label))
		{!! Form::label($label, $name, 
			($required ? ['required' => true, 'class' => 'col-md-4'] : ['class' => 'col-md-4'])) 
		!!}
	@endif
	
	<div class="col-md-6">
		<select id="{{ $name }}" name="{{ $name }}"
			{!! Form::attributes($attributes, [ 'class' => 'form-control' ]) !!}>
			@if (!empty($empty))
				<option value="">{{ $empty }}</option>
			@endif
			@foreach ($list as $item)
				<option value="{{ $item['value'] }}" {{ $item['value'] == $selected ? 'selected' : '' }}>
					{{ $item['text'] }}
				</option>
			@endforeach
		</select>

		@if ($required && isset($errors))
			{!! $errors->first($name, '<p class="help-block text-danger">:message</p>') !!}
		@endif
	</div>
</div>