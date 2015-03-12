<div class="form-group">
	<label class="control-label col-md-4">{{ $label }}</label>
	
	<div class="col-md-6">
		<p {!! Form::attributes($attributes, [ 'class' => 'form-control-static' ]) !!}>{{ $text }}</p>
	</div>
</div>