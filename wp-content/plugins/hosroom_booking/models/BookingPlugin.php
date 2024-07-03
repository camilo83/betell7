<?php

namespace Seguriserver\Hosroom;

class BookingPlugin
{

    private $settings, $short_code;

    public function __construct()
    {
        register_activation_hook(__FILE__, [$this, 'install']);
        register_deactivation_hook(__FILE__, [$this, 'deactivation']);
        register_uninstall_hook(__FILE__, 'uninstall');
        $this->initSettings();
        $this->registerShortCode();
    }

    public static function install()
    {
    }

    public static function uninstall()
    {
    }

    public static function deactivation()
    {
    }

    public function initSettings()
    {
        $this->settings = new Settings();
    }

    private function registerShortCode()
    {
        $this->short_code = new ShortCode($this->settings->getUrl());
    }
}
