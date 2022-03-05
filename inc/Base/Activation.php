<?php

class Activation {
    public static function activate() {
        flush_rewrite_rules();
    }
}