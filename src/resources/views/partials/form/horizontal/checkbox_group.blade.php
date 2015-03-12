<div class="form-group">
	@if (!empty($label))
		{!! Form::label($label, $name, 
			($required ? ['required' => true, 'class' => 'col-md-4'] : ['class' => 'col-md-4'])) 
		!!}
	@endif
	
	<div class="col-md-6">
		@foreach ($list as $key => $item)
			<div class="checkbox">
				<label for="{{ $name.$key }}">
					<input type="checkbox" id="{{ $name.$key }}" name="{{ $name.'[]' }}" value="{{ $item['value'] }}"
						{{ is_array($selected) ? (in_array($item['value'], $selected) ? 'checked' : '') : '' }}
						{!! Form::attributes($attributes) !!}>
					{{ $item['text'] }}
				</label>
			</div>
		@endforeach

		@if ($required && isset($errors))
			{!! $errors->first($name, '<p class="help-block text-danger">:message</p>') !!}
		@endif
	</div>
</div>