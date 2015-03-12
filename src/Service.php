<?php namespace Intentor\LaravelForm;

use Input;

/**
 * Form service, to aid on form creation.
 * 
 * The default theme can be set on config/app.php under 'form_theme'.
 */
class Service {
	/** Base path of form views. */
	public $baseViewPath = 'partials.form';	
	/** Current path of form views. */
	public $viewPath;
	/** Current form model. */
	public $model;
	
	/**
	 * Opens a form.
	 * 
	 * @param string $url Action URL.
	 * @param string $method Form method.
	 * @param bool $theme Controls theme. It's a subfolder on the partials.form folder.
	 * @param bool $includeCsrfToken Indicates whether the CSRF token should be included.
	 * @param array $attributes Form attributes.
	 */
	public function open($url, $method = 'POST', $theme = null, $includeCsrfToken = true, $attributes = []) {
		$restMethod = null;
		if (in_array(strtoupper($method), ['PUT', 'PATCH', 'DELETE'])) {
			$restMethod = $method;
			$method = 'POST';
		}
		
		//Checks for the theme.
		if (empty($theme)) {
			$theme = config('app.form_theme');
			
			if (empty($theme)) {
				$theme = 'default';
			}
		}
		
		$this->viewPath = $this->baseViewPath.'.'.$theme;
		
		echo view($this->viewPath.'.form', compact('url', 'method', 'includeCsrfToken', 'restMethod', 'attributes'));
	}
	
	/**
	 * Opens a form for a model.
	 * 
	 * @param object $model Model object.
	 * @param string $url Action URL.
	 * @param string $method Form method.
	 * @param bool $theme Controls theme. It's a subfolder on the partials.form folder.
	 * @param bool $includeCsrfToken Indicates whether the CSRF token should be included.
	 * @param array $attributes Form attributes.
	 */
	public function model($model, $url, $method = 'POST', $theme = null, $includeCsrfToken = true, $attributes = []) {
		$this->model = $model;		
		$this->open($url, $method, $theme, $includeCsrfToken, $attributes);
	}
	
	/**
	 * Closes a from.
	 */
	public function close() {
		$this->data = null;
		echo '</form>';
	}
	
	/**
	 * Creates a label.
	 * 
	 * @param string $text Label text.
	 * @param string $field Related field name.
	 * @param array $attributes Element attributes.
	 */
	public function label($text, $field = null, $attributes = []) {
		echo view($this->viewPath.'.label', compact('text', 'field', 'attributes'));
	}
	
	/**
	 * Creates a readonly control.
	 * 
	 * @param string $label Label text.
	 * @param string $text Field text.
	 * @param array $attributes Element attributes.
	 */
	public function readonly($label, $text, $attributes = []) {
		echo view($this->viewPath.'.readonly', compact('label', 'text', 'attributes'));
	}
	
	/**
	 * Creates a hidden field.
	 * 
	 * @param string $name Field name.
	 * @param string $value Field value.
	 * @param array $attributes Element attributes.
	 */
	public function hidden($name, $value = null, $attributes = []) {
		echo view($this->viewPath.'.hidden', compact('name', 'value', 'attributes'));
	}
	
	/**
	 * Creates a text field.
	 * 
	 * @param string $name Field name.
	 * @param string $label Field label.
	 * @param array $attributes Element attributes.
	 */
	public function text($name, $label = null, $attributes = []) {
		$required = (!empty($attributes['required']) && $attributes['required']);
		
		echo view($this->viewPath.'.text', compact('name', 'label', 'required', 'attributes'));
	}
	
	/**
	 * Creates a textarea field.
	 * 
	 * @param string $name Field name.
	 * @param string $label Field label.
	 * @param array $attributes Element attributes.
	 */
	public function textarea($name, $label = null, $attributes = []) {
		$required = (!empty($attributes['required']) && $attributes['required']);
		
		if (empty($attributes['rows'])) {
			$attributes['rows'] = 3;
		}
		
		echo view($this->viewPath.'.textarea', compact('name', 'label', 'required', 'attributes'));
	}
		
	/**
	 * Creates an e-mail field.
	 * 
	 * @param string $name Field name.
	 * @param string $label Field label.
	 * @param array $attributes Element attributes.
	 */
	public function email($name, $label = null, $attributes = []) {
		$required = (!empty($attributes['required']) && $attributes['required']);
		
		echo view($this->viewPath.'.email', compact('name', 'label', 'required', 'attributes'));
	}
		
	/**
	 * Creates an URL field.
	 * 
	 * @param string $name Field name.
	 * @param string $label Field label.
	 * @param array $attributes Element attributes.
	 */
	public function url($name, $label = null, $attributes = []) {
		$required = (!empty($attributes['required']) && $attributes['required']);
		
		echo view($this->viewPath.'.url', compact('name', 'label', 'required', 'attributes'));
	}
		
	/**
	 * Creates an URL field.
	 * 
	 * @param string $name Field name.
	 * @param string $label Field label.
	 * @param int $min Minimum number.
	 * @param int $max Maximum number.
	 * @param int $step Combined with the min value, defines the acceptable numbers in the range.
	 * @param array $attributes Element attributes.
	 */
	public function number($name, $label = null, $min = 0, $max = 9999, $step = 1, $attributes = []) {
		$required = (!empty($attributes['required']) && $attributes['required']);
		$attributes['min'] = $min;
		$attributes['max'] = $max;
		$attributes['step'] = $step;
		
		//NOTE: the name of the view is on plural because Laravel always cause error
		//when using only "number" as view name.
		echo view($this->viewPath.'.numbers', compact('name', 'label', 'required', 'attributes'));
	}
		
	/**
	 * Creates a password field.
	 * 
	 * @param string $name Field name.
	 * @param string $label Field label.
	 * @param array $attributes Element attributes.
	 */
	public function password($name, $label = null, $attributes = []) {
		$required = (!empty($attributes['required']) && $attributes['required']);
		
		echo view($this->viewPath.'.password', compact('name', 'label', 'required', 'attributes'));
	}
		
	/**
	 * Creates a checkbox field.
	 * 
	 * @param string $name Field name.
	 * @param string $label Field label.
	 * @param string $value Field value.
	 * @param array $attributes Element attributes.
	 */
	public function checkbox($name, $label = null, $value = 1, $attributes = []) {
		$required = (!empty($attributes['required']) && $attributes['required']);
		
		echo view($this->viewPath.'.checkbox', compact('name', 'label', 'value', 'required', 'attributes'));
	}
		
	/**
	 * Creates a radio field.
	 * 
	 * @param string $name Field name.
	 * @param string $label Field label.
	 * @param array $attributes Element attributes.
	 */
	public function radio($name, $label = null, $attributes = []) {
		$required = (!empty($attributes['required']) && $attributes['required']);
		
		echo view($this->viewPath.'.radio', compact('name', 'label', 'required', 'attributes'));
	}
		
	/**
	 * Creates a checkbox group.
	 * 
	 * @param string $name Field name.
	 * @param string $label Field label.
	 * @param array $list Item's list. Should be on format [ 'value' => '', 'text' => '' ].
	 * @param array $selected Selected values.
	 * @param array $attributes Element attributes.
	 */
	public function checkboxGroup($name, $label = null, $list = [], $selected = [], $attributes = []) {
		$required = (!empty($attributes['required']) && $attributes['required']);
		
		//If required, the attribute needs to be removed
		//to avoid all the checkboxes being required.
		if ($required) {
			unset($attributes['required']);
		}
		
		if (empty($selected)) {
			$selected = $this->getValue($name, []);
		}
		
		echo view($this->viewPath.'.checkbox_group', compact('name', 'label', 'list', 'selected', 'required', 'attributes'));
	}
		
	/**
	 * Creates a radio group.
	 * 
	 * @param string $name Field name.
	 * @param string $label Field label.
	 * @param array $list Item's list. Should be on format [ 'value' => '', 'text' => '' ].
	 * @param string $selected Selected value.
	 * @param array $attributes Element attributes.
	 */
	public function radioGroup($name, $label = null, $list = [], $selected = null, $attributes = []) {
		$required = (!empty($attributes['required']) && $attributes['required']);
		
		if (empty($selected)) {
			$selected = $this->getValue($name);
		}
		
		echo view($this->viewPath.'.radio_group', compact('name', 'label', 'list', 'selected', 'required', 'attributes'));
	}
		
	/**
	 * Creates a dropdown field.
	 * 
	 * @param string $name Field name.
	 * @param string $label Field label.
	 * @param array $list Item's list. Should be on format [ 'value' => 'text', 'text' => '' ].
	 * @param string $empty Empty value text. If no text is provided, there will not be an empty option.
	 * @param string $selected Selected value.
	 * @param array $attributes Element attributes.
	 */
	public function dropdown($name, $label = null, $list = [], $empty = null, $selected = null, $attributes = []) {
		$required = (!empty($attributes['required']) && $attributes['required']);
		
		if (empty($selected)) {
			$selected = $this->getValue($name);
		}
		
		echo view($this->viewPath.'.dropdown', compact('name', 'label', 'list', 'empty', 'selected', 'required', 'attributes'));
	}
	
	/**
	 * Creates a submit button.
	 * 
	 * @param string $label Control label.
	 */
	public function submit($label) {
		echo view($this->viewPath.'.submit', compact('label'));
	}
	
	/**
	 * Creates a reset button.
	 * 
	 * @param string $label Control label.
	 */
	public function reset($label) {
		echo view($this->viewPath.'.reset', compact('label'));
	}
	
	/**
	 * Creates form buttons (submit and reset).
	 * 
	 * @param string $submitLabel Submit button label.
	 * @param string $resetLabel Reset button label. If no label is given, the button is not created.
	 */
	public function buttons($submitLabel, $resetLabel = null) {
		echo view($this->viewPath.'.buttons', compact('submitLabel', 'resetLabel'));
	}
	
	/**
	 * Gets a value for a field.
	 * 
	 * @param string $name Field name.
	 * @param string $default Default value.
	 */
	public function value($name, $default = '') {
		echo $this->getValue($name, $default);
	}
	
	/**
	 * Formats attributes.
	 * 
	 * @param array $attributes Attributes to be formated.
	 * @param array $merge Attributes to merge.
	 */
	public function attributes($attributes, $merge = []) {
		echo $this->getAttributes($attributes, $merge);
	}
	
	/**
	 * Gets a value for a field without writing it on the page.
	 * 
	 * @param string $name Field name.
	 * @param string $default Default value.
	 */
	public function getValue($name, $default = '') {
		if (!empty(old($name))) {
			return old($name);
		} else if (!empty($this->model[$name])) {
			return $this->model[$name];
		} else if (!empty($default)) {
			return $default;
		} else if (Input::get($name) != '') {
			return Input::get($name);
		} else {
			return '';
		}
	}
	
	/**
	 * Gets formatted attributes.
	 * 
	 * @param array $attributes Attributes to be formated.
	 * @param array $merge Attributes to merge.
	 * @return string Attributes in HTML format.
	 */
	public function getAttributes($attributes, $merge = []) {
		if (count($attributes) == 0 && count($merge) == 0) {
			return '';
		}
		
		if (count($merge) > 0) {
			foreach ($merge as $key => $value) {
				if (isset($attributes[$key])) {
					$attributes[$key] .= ' '.$value;
				} else {
					$attributes[$key] = $value;
				}
			}
		}
		
		return join(' ', array_map(function($key) use ($attributes) {
			//If attribute is bool and true, uses the attribute.
			if (is_bool($attributes[$key])) {
			   return $attributes[$key] ? $key : '';
			}
			
			return $key.'="'.$attributes[$key].'"';
		}, array_keys($attributes)));
	}
	
	/**
	 * Generates an array compatible with lists (dropdowns, checkbox groups, etc.).
	 * 
	 * @param object $model Model to be converted.
	 * @param string $valueField Field on data that is the value.
	 * @param string $textField Field on data that is the text.
	 * @return array Array of [ 'value' => '', 'text' => '' ].
	 */
	public function modelToList($model, $valueField, $textField) {
		$list = [];
		
		foreach ($model as $item) {
			$listItem = [
				'value' => $item[$valueField],
				'text' => $item[$textField]
			];
			
			array_push($list, $listItem);
		}
		
		return $list;
	}
	
	/**
	 * Generates an array of selected values.
	 * 
	 * @param object $model Model to be converted.
	 * @param string $valueField Field on data that is the value.
	 * @return array Array of values.
	 */
	public function modelToSelected($model, $valueField) {
		$selected = [];
		
		foreach ($model as $item) {
			array_push($selected, $item[$valueField]);
		}
		
		return $selected;
	}
}