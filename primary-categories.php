<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/*
 * Plugin Name: Primary Category Admin
 * Description: a WordPress plugin that allows publishers to designate a primary category for posts.
 * Author: Kilian Sweeney
 * Version: 1.0.0
 * Author URI: http://3tons.org/kiliansweeney
 */

define( 'PCA_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

include PCA_PLUGIN_PATH . 'classes/class-pca-meta-box.php';

$meta_box = new PCA_Meta_Box();