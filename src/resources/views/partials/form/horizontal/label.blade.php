<label for="{{ $field }}" 
	{!! Form::attributes($attributes, [ 'class' => 'control-label '.(!empty($attributes['required']) && $attributes['required'] ? 'required' : '') ]) !!}>
	{{ $text }}
</label>