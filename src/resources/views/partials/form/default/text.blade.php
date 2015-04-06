<div>
	@if (!empty($label))
		{!! Form::label($label, $name, ($required ? ['required' => true] : [])) !!}
	@endif
	
	<input type="text" id="{{ $name }}" name="{{ $name }}" {!! Form::attributes($attributes) !!}>
		
	@if ($required && isset($errors))
		{!! $errors->first($name, '<p>:message</p>') !!}
	@endif
</div>