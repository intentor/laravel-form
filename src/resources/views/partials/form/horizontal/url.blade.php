<div class="form-group">
	@if (!empty($label))
		{!! Form::label($label, $name, 
			($required ? ['required' => true, 'class' => 'col-md-4'] : ['class' => 'col-md-4'])) 
		!!}
	@endif
	
	<div class="col-md-6">
		<input type="url" id="{{ $name }}" name="{{ $name }}" value="{{ Form::value($name) }}"
			{!! Form::attributes($attributes, [ 'class' => 'form-control' ]) !!}>

		@if ($required && isset($errors))
			{!! $errors->first($name, '<p class="help-block text-danger">:message</p>') !!}
		@endif
	</div>
</div>