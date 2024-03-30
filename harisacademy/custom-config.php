<?php
/**
 * Custom WordPress Configuration
 *
 * This file contains custom configuration settings for WordPress.
 */

// Define custom constants
define('WP_DEBUG', true); // Enable debug mode
define('WP_MEMORY_LIMIT', '256M'); // Increase memory limit
define('AUTOMATIC_UPDATER_DISABLED', true); // Disable automatic updates

// Configure WordPress database connection
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
define('DB_HOST', 'mysql'); // MySQL database host (use the same value as WORDPRESS_DB_HOST in Dockerfile)
define('DB_NAME', 'wordpress'); // Database name (use the same value as WORDPRESS_DB_NAME in Dockerfile)
define('DB_USER', 'root'); // Database username (use the same value as WORDPRESS_DB_USER in Dockerfile)
define('DB_PASSWORD', 'password'); // Database password (use the same value as WORDPRESS_DB_PASSWORD in Dockerfile)

// Configure WordPress table prefix
$table_prefix = 'wp_';

// Enable WordPress debugging (optional)
define('WP_DEBUG_LOG', true); // Log debug messages to wp-content/debug.log
define('WP_DEBUG_DISPLAY', false); // Disable displaying errors on the front end

// Disable file editing from the WordPress admin dashboard
define('DISALLOW_FILE_EDIT', true);

// Set custom directory paths (optional)
define('WP_CONTENT_DIR', '/var/www/html/wp-content'); // Custom wp-content directory path
define('WP_PLUGIN_DIR', '/var/www/html/wp-content/plugins'); // Custom plugins directory path
define('WPMU_PLUGIN_DIR', '/var/www/html/wp-content/mu-plugins'); // Custom mu-plugins directory path

// Define any other custom configurations here
