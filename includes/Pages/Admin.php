<?php 
/**
 * @package  TutPlugin
 */
namespace Includes\Pages;

use Includes\Base\BaseController;
use Includes\Api\SettingsApi;
use Includes\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
    public $settings;
    public $callbacks;
    public $pages = array();
    public $subpages = array();

    

	public function register() {

        $this->settings = new SettingsApi;

        $this->callbacks = new AdminCallbacks;

        $this->setPages();

        $this->setSubPages();

        $this->setSettings();

        $this->setSections();

        $this->setFields();

        $this->settings->addPages( $this->pages )->withSubPage( 'Dashboard' )
            ->addSubPages( $this->subpages )->register();
	
    } 
    
    public function setPages() {
        $this->pages = array(
			array(
                'page_title' => 'Tut Plugin',
                'menu_title' => 'Tut',
                'capability' => 'manage_options',
                'menu_slug' => 'tut_plugin',
                'callback' => array($this->callbacks, 'adminDashboard'),
                'icon_url' => 'dashicons-store',
                'position' => 110
                )
            );
    }

    public function setSubPages() {
        $this->subpages = array(
            array(
                'parent_slug' => 'tut_plugin',
                'page_title' => 'Custom Post Types',
                'menu_title' => 'CPT',
                'capability' => 'manage_options',
                'menu_slug' => 'tut_cpt',
                'callback' => array($this->callbacks, 'adminCpt')               
            ),
            array(
                'parent_slug' => 'tut_plugin',
                'page_title' => 'Custom Taxonomies',
                'menu_title' => 'Taxonomies',
                'capability' => 'manage_options',
                'menu_slug' => 'tut_taxonomies',
                'callback' => array($this->callbacks, 'adminTaxonomies')               
            ),
            array(
                'parent_slug' => 'tut_plugin',
                'page_title' => 'Custom Widgets',
                'menu_title' => 'Widgets',
                'capability' => 'manage_options',
                'menu_slug' => 'tut_widgets',
                'callback' => array($this->callbacks, 'adminWidgets')                
            )
		);
    }

    public function setSettings() {

        $args = array(
            array(
                'option_group' => 'tut_options_group',
                'option_name' => 'text_example',
                'callback' => array($this->callbacks, 'tutOptionsGroup')
            ),
            array(
                'option_group' => 'tut_options_group',
                'option_name' => 'first_name'                
            )
        );

        $this->settings->setSettings($args);
    }

    public function setSections() {

        $args = array(
            array(
                'id' => 'tut_admin_index',
                'title' => 'Settings',
                'callback' => array($this->callbacks, 'tutAdminSection'),
                'page' => 'tut_plugin'
            )
        );

        $this->settings->setSections($args);
    }

    public function setFields() {

        $args = array(
            array(
                'id' => 'text_example',
                'title' => 'Text example fields',
                'callback' => array($this->callbacks, 'tutTextExample'),
                'page' => 'tut_plugin',
                'section' => 'tut_admin_index',
                'args' => array(
                    'label_for' => 'text_example',
                    'class' => 'example-class'
                )
            ),
                array(
                    'id' => 'first_name',
                    'title' => 'First Name',
                    'callback' => array($this->callbacks, 'tutFirstName'),
                    'page' => 'tut_plugin',
                    'section' => 'tut_admin_index',
                    'args' => array(
                        'label_for' => 'text_example',
                        'class' => 'example-class'
                    )
            )
        );

        $this->settings->setFields($args);
    }

    public function tutTextExample() {

        $value = esc_attr(get_option('text_example'));
        echo '<input type="text" class="regular-text" name="text_example" value="" placeholder="Write something here!">';
    }

}