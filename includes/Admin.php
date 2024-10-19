<?php

/**
 * Class Admin
 * All Admin Dashboard Class call here
 *
 * @since 1.0.0
 */
class Admin {

    public function __construct() {
        $menu = require_once __DIR__ . '/Admin/Menu.php';

        $menu = new Menu();
    }
}