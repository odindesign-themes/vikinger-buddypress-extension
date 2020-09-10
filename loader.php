<?php

/**
 * Only define extension if the buddypress groups component is active
 */
if (bp_is_active('groups')) {
  /**
   * Group Photos Page
   */
  class Vikinger_Group_Media_Extension extends BP_Group_Extension {
    /**
     * Your __construct() method will contain configuration options for 
     * your extension, and will pass them to parent::init()
     */
    function __construct() {
      $args = [
        'slug' => 'photos',
        'name' => 'Photos',
      ];

      parent::init( $args );
    }
 
    /**
     * display() contains the markup that will be displayed on the main 
     * plugin tab
     */
    function display($group_id = NULL) {
      $group_id = bp_get_group_id();

    ?>
      <div id="activity-media-list" data-groupid=<?php echo esc_attr($group_id); ?>></div>
    <?php
    }
  }

  bp_register_group_extension('Vikinger_Group_Media_Extension');
}

?>