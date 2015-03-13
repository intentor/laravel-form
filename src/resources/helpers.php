<?php

//Form Facade helpers

/**
 * Creates a pattern matcher for multiline functions.
 * @param string $function
 * @return string The patterhn.
 */
function createMultilineFunctionMatcher($function) {
	return '/(@'.$function.')(\s*)?(\(((?>[^()]+)|(?3))*\))/';
}

//@form_open
Blade::extend(function($view, $compiler) {
    $pattern = createMultilineFunctionMatcher('form_open');
    return preg_replace($pattern, '<?php echo Form::open$3; ?>', $view);
});

//@form_model
Blade::extend(function($view, $compiler) {
    $pattern = createMultilineFunctionMatcher('form_model');
    return preg_replace($pattern, '<?php echo Form::model$3; ?>', $view);
});

//@form_close
Blade::extend(function($view, $compiler) {
    $pattern = $compiler->createPlainMatcher('form_close');
    return preg_replace($pattern, '<?php echo Form::close(); ?>', $view);
});

//@form_label
Blade::extend(function($view, $compiler) {
    $pattern = createMultilineFunctionMatcher('form_label');
    return preg_replace($pattern, '<?php echo Form::label$3; ?>', $view);
});

//@form_readonly
Blade::extend(function($view, $compiler) {
    $pattern = createMultilineFunctionMatcher('form_readonly');
    return preg_replace($pattern, '<?php echo Form::readonly$3; ?>', $view);
});

//@form_hidden
Blade::extend(function($view, $compiler) {
    $pattern = createMultilineFunctionMatcher('form_hidden');
    return preg_replace($pattern, '<?php echo Form::hidden$3; ?>', $view);
});

//@form_text
Blade::extend(function($view, $compiler) {
    $pattern = createMultilineFunctionMatcher('form_text');
    return preg_replace($pattern, '<?php echo Form::text$3; ?>', $view);
});

//@form_textarea
Blade::extend(function($view, $compiler) {
    $pattern = createMultilineFunctionMatcher('form_textarea');
    return preg_replace($pattern, '<?php echo Form::textarea$3; ?>', $view);
});

//@form_email
Blade::extend(function($view, $compiler) {
    $pattern = createMultilineFunctionMatcher('form_email');
    return preg_replace($pattern, '<?php echo Form::email$3; ?>', $view);
});

//@form_url
Blade::extend(function($view, $compiler) {
    $pattern = createMultilineFunctionMatcher('form_url');
    return preg_replace($pattern, '<?php echo Form::url$3; ?>', $view);
});

//@form_number
Blade::extend(function($view, $compiler) {
    $pattern = createMultilineFunctionMatcher('form_number');
    return preg_replace($pattern, '<?php echo Form::number$3; ?>', $view);
});

//@form_password
Blade::extend(function($view, $compiler) {
    $pattern = createMultilineFunctionMatcher('form_password');
    return preg_replace($pattern, '<?php echo Form::password$3; ?>', $view);
});

//@form_checkbox
Blade::extend(function($view, $compiler) {
    $pattern = createMultilineFunctionMatcher('form_checkbox');
    return preg_replace($pattern, '<?php echo Form::checkbox$3; ?>', $view);
});

//@form_radio
Blade::extend(function($view, $compiler) {
    $pattern = createMultilineFunctionMatcher('form_radio');
    return preg_replace($pattern, '<?php echo Form::radio$3; ?>', $view);
});

//@form_checkbox_group
Blade::extend(function($view, $compiler) {
    $pattern = createMultilineFunctionMatcher('form_checkbox_group');
    return preg_replace($pattern, '<?php echo Form::checkboxGroup$3; ?>?>', $view);
});

//@form_radio_group
Blade::extend(function($view, $compiler) {
    $pattern = createMultilineFunctionMatcher('form_radio_group');
    return preg_replace($pattern, '<?php echo Form::radioGroup$3; ?>', $view);
});

//@form_dropdown
Blade::extend(function($view, $compiler) {
    $pattern = createMultilineFunctionMatcher('form_dropdown');
    return preg_replace($pattern, '<?php echo Form::dropdown$3; ?>', $view);
});

//@form_submit
Blade::extend(function($view, $compiler) {
    $pattern = createMultilineFunctionMatcher('form_submit');
    return preg_replace($pattern, '<?php echo Form::submit$3; ?>', $view);
});

//@form_reset
Blade::extend(function($view, $compiler) {
    $pattern = createMultilineFunctionMatcher('form_reset');
    return preg_replace($pattern, '<?php echo Form::reset$3; ?>', $view);
});

//@form_buttons
Blade::extend(function($view, $compiler) {
    $pattern = createMultilineFunctionMatcher('form_buttons');
    return preg_replace($pattern, '<?php echo Form::buttons$3; ?>', $view);
});