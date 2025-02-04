<?php
/**
 * Plugin Name: Custom Dashboard Widget
 * Description: Adds a friendly widget to the WordPress dashboard with random motivational quotes.
 * Version: 1.1.0
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

  // Array of random motivational quotes
  $quotes = [
    "The only way to do great work is to love what you do. – Steve Jobs",
    "Believe you can and you're halfway there. – Theodore Roosevelt",
    "Don't watch the clock; do what it does. Keep going. – Sam Levenson",
    "Success is not final, failure is not fatal: It is the courage to continue that counts. – Winston Churchill",
    "The best time to plant a tree was 20 years ago. The second best time is now. – Chinese Proverb",
    "You are never too old to set another goal or to dream a new dream. – C.S. Lewis",
    "The future belongs to those who believe in the beauty of their dreams. – Eleanor Roosevelt",
    "Strive not to be a success, but rather to be of value. – Albert Einstein",
    "The only limit to our realization of tomorrow is our doubts of today. – Franklin D. Roosevelt",
    "Do what you can, with what you have, where you are. – Theodore Roosevelt"
  ];

  // Get a random quote
  $random_quote = $quotes[array_rand($quotes)];

  echo "<div class='custom-dashboard-widget'>";
  echo "<p>Hello, <strong>$username</strong>! 🎉</p>";
  echo "<p>Your site has <strong>$post_count posts</strong> and <strong>$comment_count comments</strong>.</p>";
  echo "<p>Today's Quote: <em>$random_quote</em></p>";
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
