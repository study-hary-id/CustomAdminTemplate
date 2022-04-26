<?php

final class Deactivation
{
    public static function deactivate()
    {
        flush_rewrite_rules();
    }
}
