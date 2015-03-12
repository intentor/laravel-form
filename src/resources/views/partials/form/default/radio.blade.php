<div>
	<div>	
		<label class="{{ $required ? 'required' : '' }}" for="{{ $name }}">
			<input type="radio" id="{{ $name }}" name="{{ $name }}"
				value="{{ Form::value($name, 1) }}" {!! Form::attributes($attributes) !!}>
			{{ $label }}
		</label>

		@if ($required && isset($errors))
			{!! $errors->first($name, '<p>:message</p>') !!}
		@endif
	</div>
</div>