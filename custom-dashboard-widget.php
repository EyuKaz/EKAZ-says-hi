<?php
/**
 * Plugin Name: EKAZ says hi
 * Description: Adds a friendly widget to the WordPress dashboard.
 * Version: 1.0.0
 * Author: EKAZ
 */

// Add the widget to the dashboard
function custom_dashboard_widget() {
  wp_add_dashboard_widget(
    'custom_dashboard_widget',    // Widget ID
    '🌟 Welcome to Your Dashboard!', // Widget title
    'custom_widget_content'       // Callback function
  );
}
add_action('wp_dashboard_setup', 'custom_dashboard_widget');

// Widget content
function custom_widget_content() {
  $username = wp_get_current_user()->display_name;
  $post_count = wp_count_posts()->publish;
  $comment_count = wp_count_comments()->approved;

  echo "<div class='custom-dashboard-widget'>";
  echo "<p>Hello, <strong>$username</strong>! 🎉</p>";
  echo "<p>Your site has <strong>$post_count posts</strong> and <strong>$comment_count comments</strong>.</p>";
  echo "<p>Today's Quote: <em>'The only way to do great work is to love what you do.' – Steve Jobs</em></p>";
  echo "</div>";
}

// Enqueue CSS
function custom_dashboard_styles() {
  wp_enqueue_style(
    'custom-dashboard-styles',
    plugins_url('dashboard-styles.css', __FILE__)
  );
}
add_action('admin_enqueue_scripts', 'custom_dashboard_styles');