<div class="form-group">
	<label class="control-label">{{ $label }}</label>
	<p {!! Form::attributes($attributes, [ 'class' => 'form-control-static' ]) !!}>{{ $text }}</p>
</div>