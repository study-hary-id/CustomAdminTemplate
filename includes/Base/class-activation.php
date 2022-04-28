<?php
/**
 * @package CustomAdmin
 */

/**
 * Class Activation operates the activation process.
 */
class ActivationCustomAdmin
{
    public static function activate()
    {
        flush_rewrite_rules();
    }
}
