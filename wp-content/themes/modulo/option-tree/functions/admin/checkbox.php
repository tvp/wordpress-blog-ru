<?php if (!defined('OT_VERSION')) exit('No direct script access allowed');
/**
 * ColorPicker Option
 *
 * @access public
 * @since 1.0.0
 *
 * @param array $value
 * @param array $settings
 * @param int $int
 *
 * @return string
 */
function option_tree_checkbox( $value, $settings, $int ) 
{ 
?>
  <div class="option option-checbox">
    <h3><?php echo htmlspecialchars_decode( $value->item_title ); ?></h3>
    <div id="<?php echo htmlspecialchars_decode( $value->item_id ); ?>" class="section">
      <div class="element">
        <?php
        // check for settings item value 
	      if ( isset( $settings[$value->item_id] ) ) {
          $ch_values = (array) $settings[$value->item_id];
        } else {
          $ch_values = array();
        }
        $count = 0;
        // loop through options array
	      foreach ( explode( ',', $value->item_options ) as $option ) 
	      {
          $checked = '';
	        if ( in_array( trim( $option ), $ch_values ) ) 
	        { 
            $checked = ' checked="checked"'; 
          }
	        echo '<div class="input_wrap"><input name="'.$value->item_id.'['.$count.']" id="'.$value->item_id.'_'.$count.'" type="checkbox" value="'.trim( $option ).'"'.$checked.' /><label for="'.$value->item_id.'_'.$count.'">'.trim( $option ).'</label></div>';
	        $count++;
     		}
        ?>
      </div>
      <div class="description">
        <?php echo htmlspecialchars_decode( $value->item_desc ); ?>
      </div>
    </div>
  </div>
<?php
}