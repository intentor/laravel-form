<p class="text-center">
	{!! Form::submit($submitLabel) !!}
	@if (!empty($resetLabel))
		{!! Form::reset($resetLabel) !!}
	@endif
</p>