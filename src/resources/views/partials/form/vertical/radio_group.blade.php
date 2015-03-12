<div class="form-group">
	@if (!empty($label))
		{!! Form::label($label, $name, ($required ? ['required' => true] : [])) !!}
	@endif
	
	@foreach ($list as $key => $item)
		<div class="radio">
			<label for="{{ $name.$key }}">
				<input type="radio" id="{{ $name.$key }}" name="{{ $name }}"
					value="{{ $item['value'] }}" {!! Form::attributes($attributes) !!}
					{{ $item['value'] == $selected ? 'checked' : '' }}>
				{{ $item['text'] }}
			</label>
		</div>
	@endforeach
		
	@if ($required && isset($errors))
		{!! $errors->first($name, '<p class="help-block text-danger">:message</p>') !!}
	@endif
</div>