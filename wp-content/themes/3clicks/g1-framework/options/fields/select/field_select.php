<?php
class Redux_Options_select {

    /**
     * Field Constructor.
     *
     * Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
     *
     * @since Redux_Options 1.0.0
    */
    function __construct($field = array(), $value ='', $parent) {
        $this->field = $field;
		$this->value = $value;
		$this->args = $parent->args;
    }

    /**
     * Field Render Function.
     *
     * Takes the vars and outputs the HTML for the field in the settings
     *
     * @since Redux_Options 1.0.0
    */
    function render() {
        $class = (isset($this->field['class'])) ? 'class="' . $this->field['class'] . '" ' : '';

        echo '<select id="' . $this->field['id'] . '" name="' . $this->args['opt_name'] . '[' . $this->field['id'] . ']" ' . $class . 'rows="6" >';

        foreach($this->field['options'] as $k => $v) {
            if ( is_array($v) ) {
                echo '<optgroup label="'. esc_attr($k) .'">';
                    foreach ( $v as $option_value => $option_label ) {
                        echo '<option value="' . esc_attr($option_value) . '" ' . selected($this->value, $option_value, false) . '>' . esc_html($option_label) . '</option>';
                    }

                echo '</optgroup>';
            } else {
                echo '<option value="' . esc_attr($k) . '" ' . selected($this->value, $k, false) . '>' . esc_html($v) . '</option>';
            }


        }

        echo '</select>';
        echo (isset($this->field['desc']) && !empty($this->field['desc'])) ? ' <span class="description">' . $this->field['desc'] . '</span>' : '';
    }
}
