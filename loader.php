<?php

if (function_exists('vikinger_get_logged_user_data')) {
  /**
   * Add admin bar routes
   */
  function vikinger_admin_bar_add_routes() {
    global $wp_admin_bar;
  
    $user_domain = bp_loggedin_user_domain();

    $logged_user = vikinger_get_logged_user_data();

    if (!$logged_user) {
      return;
    }

    ob_start();
    ?>
    <?php printf(esc_html('Hi, %s!', 'vikinger'), $logged_user['name']); ?><img src="<?php echo esc_url($logged_user['avatar_url']); ?>" srcset="<?php echo esc_url($logged_user['avatar_url']); ?> 2x" class="avatar avatar-26 photo" height="26" width="26">
    <?php
    $account_info_html = ob_get_clean();

    // My Account menu link
    $wp_admin_bar->add_menu([
      'id'      => 'my-account',
      'title'   => $account_info_html,
      'href'    => trailingslashit($user_domain . 'activity')
    ]);

    ob_start();
    ?>
    <a class="ab-item" tabindex="-1" href="<?php echo esc_url(trailingslashit($user_domain . 'activity')); ?>">
      <img src="<?php echo esc_url($logged_user['avatar_url']); ?>" srcset="<?php echo esc_url($logged_user['avatar_url']); ?> 2x" class="avatar avatar-64 photo" height="64" width="64">
      <span class="display-name"><?php echo esc_html($logged_user['name']); ?></span>
    </a>
    <?php
    $user_info_html = ob_get_clean();

    // User info menu link
    $wp_admin_bar->add_menu([
      'id'      => 'user-info',
      'title'   => $user_info_html,
      'href'    => trailingslashit($user_domain . 'activity')
    ]);

    // User info menu link
    $wp_admin_bar->add_menu([
      'id'      => 'edit-profile',
      'title'   => _x('Edit My Profile', '(Admin Bar) Quick Access Settings Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'settings')
    ]);

    // Profile menu link
    $wp_admin_bar->add_menu([
      'parent'  => 'my-account-buddypress',
      'id'      => 'vikinger-profile',
      'title'   => _x('Profile', '(Admin Bar) Profile Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'activity')
    ]);
  
    // About submenu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-profile',
      'id'      => 'vikinger-profile-about',
      'title'   => _x('About', '(Admin Bar) Profile Activity Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'about')
    ]);

    // Timeline submenu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-profile',
      'id'      => 'vikinger-profile-timeline',
      'title'   => _x('Timeline', '(Admin Bar) Profile Timeline Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'activity')
    ]);

    // Friends submenu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-profile',
      'id'      => 'vikinger-profile-friends',
      'title'   => _x('Friends', '(Admin Bar) Profile Friends Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'friends')
    ]);

    // Groups submenu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-profile',
      'id'      => 'vikinger-profile-groups',
      'title'   => _x('Groups', '(Admin Bar) Profile Groups Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'groups')
    ]);

    // Blog submenu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-profile',
      'id'      => 'vikinger-profile-blog',
      'title'   => _x('Blog', '(Admin Bar) Profile Blog Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'posts')
    ]);

    // Photos submenu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-profile',
      'id'      => 'vikinger-profile-photos',
      'title'   => _x('Photos', '(Admin Bar) Profile Photos Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'photos')
    ]);

    // Credits submenu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-profile',
      'id'      => 'vikinger-profile-credits',
      'title'   => _x('Credits', '(Admin Bar) Profile Credits Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'credits')
    ]);

    // Badges submenu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-profile',
      'id'      => 'vikinger-profile-badges',
      'title'   => _x('Badges', '(Admin Bar) Profile Badges Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'badges')
    ]);

    // Quests submenu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-profile',
      'id'      => 'vikinger-profile-quests',
      'title'   => _x('Quests', '(Admin Bar) Profile Quests Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'quests')
    ]);

    // Ranks submenu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-profile',
      'id'      => 'vikinger-profile-ranks',
      'title'   => _x('Ranks', '(Admin Bar) Profile Ranks Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'ranks')
    ]);

    // Settings menu link
    $wp_admin_bar->add_menu([
      'parent'  => 'my-account-buddypress',
      'id'      => 'vikinger-settings',
      'title'   => _x('Settings', '(Admin Bar) Settings Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'settings')
    ]);

    // Settings menu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-settings',
      'id'      => 'vikinger-settings-myprofile',
      'title'   => _x('Profile', '(Admin Bar) Profile Settings Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'settings')
    ]);
  
    // Profile Info settings submenu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-settings-myprofile',
      'id'      => 'vikinger-settings-profile-info',
      'title'   => _x('Profile Info', '(Admin Bar) Profile Info Settings Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'settings')
    ]);

    // Social settings submenu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-settings-myprofile',
      'id'      => 'vikinger-settings-social',
      'title'   => _x('Social', '(Admin Bar) Social Settings Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'settings/social')
    ]);

    // Notifications settings submenu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-settings-myprofile',
      'id'      => 'vikinger-settings-notifications',
      'title'   => _x('Notifications', '(Admin Bar) Notification Settings Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'settings/notifications')
    ]);

    // Messages settings submenu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-settings-myprofile',
      'id'      => 'vikinger-settings-messages',
      'title'   => _x('Messages', '(Admin Bar) Message Settings Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'settings/messages')
    ]);

    // Friend Requests settings submenu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-settings-myprofile',
      'id'      => 'vikinger-settings-friend-requests',
      'title'   => _x('Friend Requests', '(Admin Bar) Friend Requests Settings Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'settings/friend-requests')
    ]);

    // Settings menu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-settings',
      'id'      => 'vikinger-settings-account',
      'title'   => _x('Account', '(Admin Bar) Account Settings Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'settings/account')
    ]);

    // Settings menu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-settings-account',
      'id'      => 'vikinger-settings-account-info',
      'title'   => _x('Account Info', '(Admin Bar) Account Info Settings Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'settings/account')
    ]);

    // Settings menu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-settings-account',
      'id'      => 'vikinger-settings-account-password',
      'title'   => _x('Change Password', '(Admin Bar) Change Password Settings Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'settings/password')
    ]);

    // Settings menu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-settings',
      'id'      => 'vikinger-settings-groups',
      'title'   => _x('Groups', '(Admin Bar) Groups Settings Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'settings/manage-groups')
    ]);

    // Settings menu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-settings-groups',
      'id'      => 'vikinger-settings-manage-groups',
      'title'   => _x('Manage Groups', '(Admin Bar) Manage Groups Settings Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'settings/manage-groups')
    ]);

    // Settings menu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-settings-groups',
      'id'      => 'vikinger-settings-send-group-invitations',
      'title'   => _x('Send Group Invitations', '(Admin Bar) Send Group Invitations Settings Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'settings/send-group-invitations')
    ]);

    // Settings menu link
    $wp_admin_bar->add_menu([
      'parent'  => 'vikinger-settings-groups',
      'id'      => 'vikinger-settings-received-group-invitations',
      'title'   => _x('Received Group Invitations', '(Admin Bar) Received Group Invitations Settings Page Link', 'vikinger'),
      'href'    => trailingslashit($user_domain . 'settings/received-group-invitations')
    ]);
  }

  add_action('bp_setup_admin_bar', 'vikinger_admin_bar_add_routes', 300);

  /**
   * Remove admin bar unused routes
   */
  function vikinger_admin_bar_remove_unused_routes() {
    global $wp_admin_bar;

    // remove bp notifications
    $wp_admin_bar->remove_menu('bp-notifications');

    // remove activity
    $wp_admin_bar->remove_menu('my-account-activity');

    // remove profile
    $wp_admin_bar->remove_menu('my-account-xprofile');

    // remove notifications
    $wp_admin_bar->remove_menu('my-account-notifications');

    // remove messages
    $wp_admin_bar->remove_menu('my-account-messages');

    // remove friends
    $wp_admin_bar->remove_menu('my-account-friends');

    // remove groups
    $wp_admin_bar->remove_menu('my-account-groups');

    // remove settings
    $wp_admin_bar->remove_menu('my-account-settings');
  }

  add_action('admin_bar_menu', 'vikinger_admin_bar_remove_unused_routes', 300);
}

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