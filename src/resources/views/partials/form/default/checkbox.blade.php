<div>
	<label class="{{ $required ? 'required' : '' }}" for="{{ $name }}">
		<input type="checkbox" id="{{ $name }}" name="{{ $name }}"
			value="{{ $value }}" {!! Form::attributes($attributes) !!}
			{{ $value == Form::getValue($name) ? 'checked' : '' }}>
		{{ $label }}
	</label>

	@if ($required && isset($errors))
		{!! $errors->first($name, '<p>:message</p>') !!}
	@endif
</div>