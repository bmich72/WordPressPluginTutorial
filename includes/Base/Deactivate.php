<?php
/**
 * @package TutPlugin
 */

namespace Includes\Base;

class Deactivate {
    public static function deactivate() {
        // flush rewrite rules
        flush_rewrite_rules();
    }
}