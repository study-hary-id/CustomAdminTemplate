<?php
/**
 * @package CustomAdmin
 */

/**
 * Class Deactivation operates the deactivation process.
 */
final class DeactivationCustomAdmin
{
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}
