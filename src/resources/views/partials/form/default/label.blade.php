<label for="{{ $field }}" 
	{!! Form::attributes($attributes, [ 'class' => (!empty($attributes['required']) && $attributes['required'] ? 'required' : '') ]) !!}>
	{{ $text }}
</label>