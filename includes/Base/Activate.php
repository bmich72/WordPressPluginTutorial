<?php
/**
 * @package TutPlugin
 */

namespace Includes\Base;

class Activate {
    
    public static function activate() {      
        // flush rewrite rules
        flush_rewrite_rules();
    }
}
