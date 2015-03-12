<div>
	@if (!empty($label))
		{!! Form::label($label, $name, ($required ? ['required' => true] : [])) !!}
	@endif
	
	<textarea id="{{ $name }}" name="{{ $name }}"
		{!! Form::attributes($attributes) !!}>{{ Form::value($name) }}</textarea>
	
	@if ($required && isset($errors))
		{!! $errors->first($name, '<p>:message</p>') !!}
	@endif
</div>