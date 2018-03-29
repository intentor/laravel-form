<?php

//Form Facade helpers

//@form_open
Blade::directive('form_open', function($expression) {
    return "<?php echo Form::open($expression; ?>";
});

//@form_model
Blade::directive('form_model', function($expression) {
    return "<?php echo Form::model($expression; ?>";
});

//@form_close
Blade::directive('form_close', function() {
    return "<?php echo Form::close(); ?>";
});

//@form_label
Blade::directive('form_label', function($expression) {
    return "<?php echo Form::label($expression); ?>";
});

//@form_readonly
Blade::directive('form_readonly', function($expression) {
    return "<?php echo Form::readonly($expression); ?>";
});

//@form_hidden
Blade::directive('form_hidden', function($expression) {
    return "<?php echo Form::hidden($expression); ?>";
});

//@form_text
Blade::directive('form_text', function($expression) {
    return "<?php echo Form::text($expression); ?>";
});

//@form_textarea
Blade::directive('form_textarea', function($expression) {
    return "<?php echo Form::textarea($expression); ?>";
});

//@form_email
Blade::directive('form_email', function($expression) {
    return "<?php echo Form::email($expression); ?>";
});

//@form_url
Blade::directive('form_url', function($expression) {
    return "<?php echo Form::url($expression); ?>";
});

//@form_number
Blade::directive('form_number', function($expression) {
    return "<?php echo Form::number($expression); ?>";
});

//@form_password
Blade::directive('form_password', function($expression) {
    return "<?php echo Form::password($expression); ?>";
});

//@form_checkbox
Blade::directive('form_checkbox', function($expression) {
    return "<?php echo Form::checkbox($expression); ?>";
});

//@form_radio
Blade::directive('form_radio', function($expression) {
    return "<?php echo Form::radio($expression); ?>";
});

//@form_checkbox_group
Blade::directive('form_checkbox_group', function($expression) {
    return "<?php echo Form::checkboxGroup($expression); ?>";
});

//@form_radio_group
Blade::directive('form_radio_group', function($expression) {
    return "<?php echo Form::radioGroup($expression); ?>";
});

//@form_dropdown
Blade::directive('form_dropdown', function($expression) {
    return "<?php echo Form::dropdown($expression); ?>";
});

//@form_submit
Blade::directive('form_submit', function($expression) {
    return "<?php echo Form::submit($expression); ?>";
});

//@form_reset
Blade::directive('form_reset', function($expression) {
    return "<?php echo Form::reset($expression); ?>";
});

//@form_buttons
Blade::directive('form_buttons', function($expression) {
    return "<?php echo Form::buttons($expression); ?>";
});
