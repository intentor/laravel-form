<div class="form-group">
	<div class="radio">	
		<label class="{{ $required ? 'required' : '' }}" for="{{ $name }}">
			<input type="radio" id="{{ $name }}" name="{{ $name }}"
				value="{{ Form::value($name, 1) }}" {!! Form::attributes($attributes) !!}>
			{{ $label }}
		</label>

		@if ($required && isset($errors))
			{!! $errors->first($name, '<p class="help-block text-danger">:message</p>') !!}
		@endif
	</div>
</div>