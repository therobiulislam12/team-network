<?php

/**
 * Class Admin
 * All Admin Dashboard Class call here
 *
 * @since 1.0.0
 */
class Admin {

    public function __construct() {

        // call require class method
        $this->require_classes();

        // menu instance
        new Menu();

        // post column instance
        new TN_Columns();
    }

    /**
     * Require needed class
     * 
     * 
     * @return void
     * @since 1.0.0
     */
    public function require_classes(){
        require_once __DIR__ . '/Admin/Menu.php';
        require_once __DIR__ . '/Admin/TN_Columns.php';
    }
}