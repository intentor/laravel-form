<div class="form-group">
	@if (!empty($label))
		{!! Form::label($label, $name, ($required ? ['required' => true] : [])) !!}
	@endif
	
	@foreach ($list as $key => $item)
		<div class="checkbox">
			<label for="{{ $name.$key }}">
				<input type="checkbox" id="{{ $name.$key }}" name="{{ $name.'[]' }}" value="{{ $item['value'] }}"
					{{ is_array($selected) ? (in_array($item['value'], $selected) ? 'checked' : '') : '' }}
					{!! Form::attributes($attributes) !!}>
				{{ $item['text'] }}
			</label>
		</div>
	@endforeach
		
	@if ($required && isset($errors))
		{!! $errors->first($name, '<p class="help-block text-danger">:message</p>') !!}
	@endif
</div>