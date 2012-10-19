<?php

/**
 * Class for option input in HTML form field tag.
 *
 * @author James Lloyd R. Atwil
 */
class Padd_Theme_Input {

	/**
	 * The keyword. The keyword is used as an option name in <code>get_optionn</code> function.
	 *
	 * @var string
	 */
	protected $keyword;

	/**
	 * The value of the option.
	 *
	 * @var string
	 */
	protected $value;

	/**
	 * Option name.
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * The description of the option.
	 *
	 * @var string
	 */
	protected $description;

	/**
	 * Option properties. The properties may vary from one field type to another.
	 *
	 * @var array
	 */
	protected $properties;

	/**
	 * Option input constructor.
	 *
	 * @param string $keyword
	 * @param string $name
	 * @param string $description
	 * @param string $properties
	 */
	function __construct($keyword,$name,$description='',$properties=array('type'=>'textfield','width'=>500,'height'=>100)) {
		$this->keyword = $keyword;
		$this->value = '';
		$this->name = $name;
		$this->description = $description;
		$this->properties = $properties;
	}

	/**
	 * Returns the keyword of the option.
	 *
	 * @return string
	 */
	public function get_keyword() {
		return $this->keyword;
	}

	/**
	 * Sets the keyword of the option.
	 *
	 * @param string $keyword
	 */
	public function set_keyword($keyword) {
		$this->keyword = $keyword;
	}

	/**
	 * Returns the value of the option.
	 *
	 * @return string
	 */
	public function get_value() {
		return $this->value;
	}

	/**
	 * Sets the value of the option.
	 *
	 * @param string $value
	 */
	public function set_value($value) {
		$this->value = $value;
	}

	/**
	 * Returns the name of the option.
	 *
	 * @return string
	 */
	public function get_name() {
		return $this->name;
	}

	/**
	 * Sets the name of the option.
	 *
	 * @param string $name
	 */
	public function set_name($name) {
		$this->name = $name;
	}

	/**
	 * Returns the description of the option.
	 *
	 * @return string
	 */
	public function get_description() {
		return $this->description;
	}

	/**
	 * Sets the description of the option.
	 *
	 * @param string $description
	 */
	public function set_description($description) {
		$this->description = $description;
	}

	/**
	 * Retruns the properties of the option.
	 *
	 * @return array
	 */
	public function get_properties() {
		return $this->properties;
	}

	/**
	 * Sets the properties of the option.
	 *
	 * @param array $properties
	 */
	public function set_properties($properties) {
		$this->properties = $properties;
	}

	/**
	 * Returns the onClick event for upload type of the Padd_Theme_Input class.
	 * Use this if you are setting the input type to upload.
	 *
	 * @return string
	 */
	public function get_js_upload_click() {
		$str_js = "
		jQuery('#" . $this->keyword . '_btn' . "').click(function() {
			formfield = jQuery('#" . $this->keyword . "').attr('name');
			tb_show('', 'media-upload.php?type=image&TB_iframe=true');
			popswitch = " . intval($this->properties['switch_no']) . ";
			return false;
		});";
		return $str_js;
	}

	/**
	 * Returns the case number and its functions during switching of items to upload.
	 * Use this when you are setting the input type to upload.
	 *
	 * @return string
	 */
	public function get_js_upload_switch() {
		$str_js = "
			case " . intval($this->properties['switch_no']) . ":
				jQuery('#" . $this->keyword . "').val(imgurl);
				break;";
		return $str_js;
	}

	/**
	 * Returns the object as string.
	 *
	 * @return string
	 */
	public function __toString() {
		$strHTML  = '';
		$strHTML .= '<tr valign="top" id="tr-' . $this->keyword . '">';
		$strHTML .= '	<th scope="row"><label for="' . $this->keyword . '">' . $this->name . '</label></th>';
		$strHTML .= '	<td>';
		switch ($this->properties['type']) {
			default:
			case 'textfield':
				$strHTML .= '<input name="' . $this->keyword . '" type="text" id="' . $this->keyword . '" value="' . $this->value . '" style="width: ' . (!empty($this->properties['width']) ? ($this->properties['width'] == 'auto' ? '100%' : $this->properties['width'] . 'px') : '500px') . '" />';
				break;
			case 'textarea':
				$strHTML .= '<textarea name="' . $this->keyword . '" id="' . $this->keyword . '" style="width: ' . (!empty($this->properties['width']) ? ($this->properties['width'] == 'auto' ? '100%' : $this->properties['width'] . 'px') : '500px') . '; height: ' . (!empty($this->properties['height']) ? $this->properties['height'] : 100) . 'px;">' . stripslashes($this->value). '</textarea>';
				break;
			case 'category':
				$strHTML .= wp_dropdown_categories('name=' . $this->keyword . '&echo=0&selected=' . $this->value . '&class=');
				break;
			case 'page':
				$strHTML .= wp_dropdown_pages("name=" . $this->keyword . "&echo=0&show_option_none=".__('- Выбрать -')."&selected=" . $this->value);
				break;
			case 'dropdown':
				$strHTML .= '<select name="' . $this->keyword . '" id="' . $this->keyword . '">';
				foreach ($this->properties['choices'] as $k => $v) {
					if ($this->value == $k) {
						$strHTML .= '<option selected="selected" value="' . $k . '">' . $v . '</option>';
					} else {
						$strHTML .= '<option value="' . $k . '">' . $v . '</option>';
					}
				}
				$strHTML .= '</select>';
				break;
			case 'checkbox':
				$strHTML .= '<input name="' . $this->keyword . '" type="checkbox" id="' . $this->keyword . '" value="1"' . ($this->value === '1' ? ' checked="checked"': '') . ' />';
				break;
			case 'upload':
				$strHTML .= '<input name="' . $this->keyword . '" type="text" id="' . $this->keyword . '" value="' . $this->value . '" style="width: ' . (!empty($this->properties['width']) ? $this->properties['width'] : 500) . 'px" /><button id="' . $this->keyword . '_btn" type="button">Загрузить</button>';
				break;
		}
		$strHTML .= '		<br /><small>' . $this->description . '</small>';
		$strHTML .= '	</td>';
		$strHTML .= '</tr>';
		return $strHTML;
	}

}

?>
