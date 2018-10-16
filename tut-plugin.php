<?php
/**
 * @package TutPlugin
 */
/*
Plugin Name: TutPlugin
Plugin URI: http://tutplugin.com/plugin
Description: This is the description
Version: 1.0.0
Author: Bryan Micheal
Author URI: http://bryanmicheal.com
License: GPLv2 or later
Text Domain: tutplugin-plugin
*/
/* if ( !defined('ABSPATH')){
    die;
} */


defined('ABSPATH') or die('Access is not permitted');

if(file_exists(dirname( __FILE__ ) . '/vendor/autoload.php')) {
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

function activate_tut_plugin() {
    Includes\Base\Activate::activate();
}
register_activation_hook(__FILE__, 'activate_tut_plugin');

function deactivate_tut_plugin() {
    Includes\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_tut_plugin');


if ( class_exists( 'Includes\\Init' ) ) {
	Includes\Init::register_services();
}

/* use Includes\Activate;
use Includes\Deactivate;
use Includes\Admin\AdminPages;

if(!class_exists('TutPlugin')) {

    class TutPlugin {
        
        public $plugin;

        function __construct() {
            $this->plugin = plugin_basename(__FILE__);
        }


        function register() {
            add_action('admin_enqueue_scripts', array($this, 'enqueue'));

            add_action('admin_menu', array($this, 'add_admin_pages'));

            add_filter("plugin_action_links_$this->plugin" , array($this, 'settings_link'));
        }

        public function settings_link($links) {
            $settings_link = '<a href="admin.php?page=tut_plugin">Settings</a>';
            array_push($links, $settings_link);
            return $links;
        }

        public function add_admin_pages() {
            add_menu_page('Tut Plugin', 'Tut', 'manage_options', 'tut_plugin', array($this, 'admin_index'), 'dashicons-store', 110);
        }

        public function admin_index() {
            // require template        
            require_once plugin_dir_path(__FILE__) . 'templates/admin.php';
        }

        protected function create_post_type() {
            add_action('init', array($this, 'custom_post_type'));
            
        }
        
        function custom_post_type() {
            register_post_type( 'book', ['public' => true, 'label' => 'Books']);

        }

        function enqueue() {
            // enqueue all our scripts
            wp_enqueue_style('mypluginstyle', plugins_url('/assets/style.css', __FILE__));
            wp_enqueue_script('mypluginscript', plugins_url('/assets/scripts.js', __FILE__));

        }

        
        function activate() {
            Activate::activate();            
        }

        function deactivate() {
            Deactivate::deactivate();            
        }      

    }
    
   
    // activation
    register_activation_hook( __FILE__, array('Activate', 'activate'));

    // deactivation
    
    register_deactivation_hook(__FILE__, array('Deactivate', 'deactivate'));        
} */