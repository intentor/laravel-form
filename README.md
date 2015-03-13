# Laravel Form Helper

**Form helpers for Laravel 5**

## Contents

1. <a href="#introduction">Introduction</a>
2. <a href="#installation">Installation</a>
3. <a href="#quick-start">Quick start</a>
4. <a href="#helpers">Helpers</a>
    * <a href="#form-open">open</a>
    * <a href="#form-model">model</a>
    * <a href="#form-close">close</a>
    * <a href="#form-label">label</a>
    * <a href="#form-readonly">readonly</a>
    * <a href="#form-hidden">hidden</a>
    * <a href="#form-text">text</a>
    * <a href="#form-textarea">textarea</a>
    * <a href="#form-email">email</a>
    * <a href="#form-url">url</a>
    * <a href="#form-number">number</a>
    * <a href="#form-password">password</a>
    * <a href="#form-checkbox">checkbox</a>
    * <a href="#form-radio">radio</a>
    * <a href="#form-checkboxGroup">checkboxGroup</a>
    * <a href="#form-radioGroup">radioGroup</a>
    * <a href="#form-dropdown">dropdown</a>
    * <a href="#form-submit">submit</a>
    * <a href="#form-reset">reset</a>
    * <a href="#form-buttons">buttons</a>
5. <a href="#utilities">Utilities</a>
    * <a href="#form-modelToList">modelToList</a>
    * <a href="#form-modelToSelected">modelToSelected</a>
6. <a href="#themes">Themes</a>
7. <a href="#changelog">Changelog</a>
8. <a href="#support">Support</a>
9. <a href="#license">License</a>

## <a id="introduction"></a>Introduction

*Laravel Form* provides a series of helpers for form creation in PHP pages and Blade templates.

Compatible with Laravel 5.

## <a id="installation"></a>Installation

At `composer.json` of your Laravel installation, add the following require line:

``` json
{
    "require": {
        "intentor/laravel-form": "~1.0"
    }
}
```

Run `composer update` to add the package to your Laravel app.

At `config/app.php`, add the Service Provider and the Facade:

```php
    'providers' => [
		'Intentor\LaravelForm\ServiceProvider',
    ]

	//...

    'aliases' => [
        ''Form' => 'Intentor\LaravelForm\Facade'
    ]
```

## <a id="quick-start"></a>Quick start

To create a form, you can user either Blade helpers or the `Form` Facade.

Using Blade helpers:

```php
@form_open(action('SomeController@action'))
                    
@form_close
```

Using Facades:

```php
{!! Form::open(action('SomeController@action')) !!}
					
{!! Form::close() !!}
```

Any controls you want to create must be placed between the opening and closing of the form.

Using Blade helpers:

```php
@form_open(action('SomeController@action'))
    
@form_text('name', 'Name')
                        
@form_buttons('Send', 'Reset')
            
@form_close
```

Using Facades:
```php
{!! Form::open(action('SomeController@action')) !!}
	
{!! Form::text('name', 'Name') !!}
						
{!! Form::buttons('Send', 'Reset') !!}
			
{!! Form::close() !!}
```

## <a id="helpers"></a>Helpers

### <a id="form-open"></a>open

Opens a form. See <a href="#themes">Themes</a> for more details on form themes.

#### Blade helper

```php
@form_open($url, $method = 'POST', $theme = null, $includeCsrfToken = true, $attributes = [])
```

#### Facade

```php
{!! Form::open($url, $method = 'POST', $theme = null, $includeCsrfToken = true, $attributes = []) !!}
```

#### Parameters

* string `$url` Action URL.
* string `$method` Form method.
* bool `$theme` Controls' theme. It's a subfolder on the partials.form folder.
* bool `$includeCsrfToken` Indicates whether the CSRF token should be included.
* array `$attributes` Form attributes.

### <a id="form-model"></a>model

Opens a form for a model. See <a href="#themes">Themes</a> for more details on form themes.

#### Blade helper

```php
@form_
```

#### Facade

```php
{!! Form::model($model, $url, $method = 'POST', $theme = null, $includeCsrfToken = true, $attributes = []) !!}
```

#### Parameters

* object `$model` Model object.
* string `$url` Action URL.
* string `$method` Form method.
* bool `$theme` Controls' theme. It's a subfolder on the partials.form folder.
* bool `$includeCsrfToken` Indicates whether the CSRF token should be included.
* array `$attributes` Form attributes.

### <a id="form-close"></a>close

Closes a from.

#### Blade helper

```php
@form_close
```

#### Facade

```php
{!! Form::close() !!}
```

#### Parameters

None.

### <a id="form-label"></a>label

Creates a label.

#### Blade helper

```php
@form_label($text, $field = null, $attributes = [])
```

#### Facade

```php
{!! Form::label($text, $field = null, $attributes = []) !!}
```

#### Parameters
 
* string `$text` Label text.
* string `$field` Related field name.
* array `$attributes` Element attributes. Format: [ 'attribute' => 'value' ].

### <a id="form-readonly"></a>readonly

Creates a readonly control.

#### Blade helper

```php
@form_readonly($label, $text, $attributes = [])
```

#### Facade

```php
{!! Form::readonly($label, $text, $attributes = []) !!}
```

#### Parameters
 
* string `$label` Label text.
* string `$text` Field text.
* array `$attributes` Element attributes. Format: [ 'attribute' => 'value' ].

### <a id="form-hidden"></a>hidden

Creates a hidden field.

#### Blade helper

```php
@form_hidden($name, $value = null, $attributes = [])
```

#### Facade

```php
{!! Form::hidden($name, $value = null, $attributes = []) !!}
```

#### Parameters
 
* string `$name` Field name.
* string `$value` Field value.
* array `$attributes` Element attributes. Format: [ 'attribute' => 'value' ].

### <a id="form-text"></a>text

Creates a text field.

#### Blade helper

```php
@form_text($name, $label = null, $attributes = [])
```

#### Facade

```php
{!! Form::text($name, $label = null, $attributes = []) !!}
```

#### Parameters
 
* string `$name` Field name.
* string `$label` Field label.
* array `$attributes` Element attributes. Format: [ 'attribute' => 'value' ].

### <a id="form-textarea"></a>textarea

Creates a textarea field.

#### Blade helper

```php
@form_textarea($name, $label = null, $attributes = [])
```

#### Facade

```php
{!! Form::textarea($name, $label = null, $attributes = []) !!}
```

#### Parameters
 
* string `$name` Field name.
* string `$label` Field label.
* array `$attributes` Element attributes. Format: [ 'attribute' => 'value' ].

### <a id="form-email"></a>email

Creates an e-mail field.

#### Blade helper

```php
@form_email($name, $label = null, $attributes = [])
```

#### Facade

```php
{!! Form::email($name, $label = null, $attributes = []) !!}
```

#### Parameters
 
* string `$name` Field name.
* string `$label` Field label.
* array `$attributes` Element attributes. Format: [ 'attribute' => 'value' ].

### <a id="form-url"></a>url

Creates an URL field.

#### Blade helper

```php
@form_url($name, $label = null, $attributes = [])
```

#### Facade

```php
{!! Form::url($name, $label = null, $attributes = []) !!}
```

#### Parameters
 
* string `$name` Field name.
* string `$label` Field label.
* array `$attributes` Element attributes. Format: [ 'attribute' => 'value' ].

### <a id="form-number"></a>number

Creates a number field.

#### Blade helper

```php
@form_number($name, $label = null, $min = 0, $max = 9999, $step = 1, $attributes = [])
```

#### Facade

```php
{!! Form::number($name, $label = null, $min = 0, $max = 9999, $step = 1, $attributes = []) !!}
```

#### Parameters
 
* string `$name` Field name.
* string `$label` Field label.
* int `$min` Minimum number.
* int `$max` Maximum number.
* int `$step` Combined with the min value, defines the acceptable numbers in the range.
* array `$attributes` Element attributes. Format: [ 'attribute' => 'value' ].

### <a id="form-password"></a>password

Creates a password field.

#### Blade helper

```php
@form_password($name, $label = null, $attributes = [])
```

#### Facade

```php
{!! Form::password($name, $label = null, $attributes = []) !!}
```

#### Parameters
 
* string `$name` Field name.
* string `$label` Field label.
* array `$attributes` Element attributes. Format: [ 'attribute' => 'value' ].

### <a id="form-checkbox"></a>checkbox

Creates a checkbox field.

#### Blade helper

```php
@form_checkbox($name, $label = null, $value = 1, $attributes = [])
```

#### Facade

```php
{!! Form::checkbox($name, $label = null, $value = 1, $attributes = []) !!}
```

#### Parameters
 
* string `$name` Field name.
* string `$label` Field label.
* string `$value` Field value.
* array `$attributes` Element attributes. Format: [ 'attribute' => 'value' ].

### <a id="form-radio"></a>radio

Creates a radio field.

#### Blade helper

```php
@form_radio($name, $label = null, $attributes = [])
```

#### Facade

```php
{!! Form::radio($name, $label = null, $attributes = []) !!}
```

#### Parameters
 
* string `$name` Field name.
* string `$label` Field label.
* array `$attributes` Element attributes. Format: [ 'attribute' => 'value' ].

### <a id="form-checkboxGroup"></a>checkboxGroup

Creates a checkbox group.

#### Blade helper

```php
@form_checkbox_group($name, $label = null, $list = [], $selected = [], $attributes = [])
```

#### Facade

```php
{!! Form::checkboxGroup($name, $label = null, $list = [], $selected = [], $attributes = []) !!}
```

#### Parameters
 
* string `$name` Field name.
* string `$label` Field label.
* array `$list` Item's list. Format: [ 'value' => '', 'text' => '' ]. Use <a href="#form-modelToList">modelToList</a> to generate a list from models.
* array `$selected` Selected values. Format: [ 'value', 'value', ... ]. Use <a href="#form-modelToSelected">modelToSelected</a> to generate values from models.
* array `$attributes` Element attributes. Format: [ 'attribute' => 'value' ].

### <a id="form-radioGroup"></a>radioGroup

Creates a radio group.

#### Blade helper

```php
@form_radio_group($name, $label = null, $list = [], $selected = null, $attributes = [])
```

#### Facade

```php
{!! Form::radioGroup($name, $label = null, $list = [], $selected = null, $attributes = []) !!}
```

#### Parameters
 
* string `$name` Field name.
* string `$label` Field label.
* array `$list` Item's list. Format: [ 'value' => '', 'text' => '' ]. Use <a href="#form-modelToList">modelToList</a> to generate a list from models.
* string `$selected` Selected value.
* array `$attributes` Element attributes. Format: [ 'attribute' => 'value' ].

### <a id="form-dropdown"></a>dropdown

Creates a dropdown field.

#### Blade helper

```php
@form_dropdown($name, $label = null, $list = [], $empty = null, $selected = null, $attributes = [])
```

#### Facade

```php
{!! Form::dropdown($name, $label = null, $list = [], $empty = null, $selected = null, $attributes = []) !!}
```

#### Parameters
 
* string `$name` Field name.
* string `$label` Field label.
* array `$list` Item's list. Format: [ 'value' => 'text', 'text' => '' ]. Use <a href="#form-modelToList">modelToList</a> to generate a list from models.
* string `$empty` Empty value text. If no text is provided, there will not be an empty option.
* string `$selected` Selected value.
* array `$attributes` Element attributes. Format: [ 'attribute' => 'value' ].

### <a id="form-submit"></a>submit

Creates a submit button.

#### Blade helper

```php
@form_submit($label)
```

#### Facade

```php
{!! Form::submit($label) !!}
```

#### Parameters
 
* string `$label` Control label.

### <a id="form-reset"></a>reset

Creates a reset button.

#### Blade helper

```php
@form_reset($label)
```

#### Facade

```php
{!! Form::reset($label) !!}
```

#### Parameters
 
* string `$label` Control label.

### <a id="form-buttons"></a>buttons

Creates form buttons (submit and reset).

#### Blade helper

```php
@form_buttons($submitLabel, $resetLabel = null)
```

#### Facade

```php
{!! Form::buttons($submitLabel, $resetLabel = null) !!}
```

#### Parameters

* string `$submitLabel` Submit button label.
* string `$resetLabel` Reset button label. If no label is given, the button is not created.

## <a id="utilities"></a>Utilities
 
### <a id="form-modelToList"></a>modelToList

Generates an array compatible with lists (dropdowns, checkbox groups, etc.).

#### Facade

```php
Form::modelToList($model, $valueField, $textField)
```

#### Parameters

* object `$model` Model to be converted.
* string `$valueField` Field on data that is the value.
* string `$textField` Field on data that is the text.

### <a id="form-modelToSelected"></a>modelToSelected

Generates an array of selected values.

#### Facade

```php
Form::modelToSelected($model, $valueField)
```

#### Parameters
    
* object `$model` Model to be converted.
* string `$valueField` Field on data that is the value.

## <a id="themes"></a>Themes

Themes are a way to customize the look of forms using partial views.

### Available themes

There are three different themes available:

1. **default**: a simple form theme without any third party dependencies.
2. **horizontal**: default [Bootstrap horizontal](http://getbootstrap.com/css/#forms-horizontal) form (Requires [Bootstrap 3](http://getbootstrap.com/)).
3. **vertical**: default [Bootstrap vertical](http://getbootstrap.com/css/#forms-example) form (Requires [Bootstrap 3](http://getbootstrap.com/)).

All themes are subfolders at `src/resources/views/partials/form` folder.

### Creating a custom theme

To create a custom theme, copy a base theme from `vendor/intentor/laravel-form/src/resources/views/partials/form` at your local Laravel installation to the `resources/views/partials/form` of your app.

Each helper has its own Blade template file, which can then be customized.

**Note**: the name of the theme's folder is the name that must be used when <a href="#form-open">setting the theme</a>.

## <a id="changelog"></a>Changelog

Please see [CHANGELOG.md](CHANGELOG.md).

## <a id="support"></a>Support

Found a bug? Please create an issue on the [GitHub project page](https://github.com/intentor/laravel-form/issues) or send a pull request if have a fix or extension.

You can also send me a message at support@intentor.com.br to discuss more obscure matters about the component.

## <a id="license"></a>License

Licensed under the [The MIT License (MIT)](http://opensource.org/licenses/MIT). Please see [LICENSE](LICENSE) for more information.