<div class="form-group">
	@if (!empty($label))
		{!! Form::label($label, $name, ($required ? ['required' => true] : [])) !!}
	@endif
	
	<input type="email" id="{{ $name }}" name="{{ $name }}"
		{!! Form::attributes($attributes, [ 'class' => 'form-control' ]) !!}>
		
	@if ($required && isset($errors))
		{!! $errors->first($name, '<p class="help-block text-danger">:message</p>') !!}
	@endif
</div>