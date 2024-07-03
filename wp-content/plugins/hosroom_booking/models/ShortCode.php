<?php
namespace Seguriserver\Hosroom;

class ShortCode
{
    public $endpoint = null;

    public function __construct($endpoint) {
        $this->endpoint = $endpoint;
        add_shortcode('hosroom_booking', function ($attribs) {
            if (empty($this->endpoint)) {
                return "-Módulo de reservas no configurado-";
            }
            $attribs = shortcode_atts([
                'iframe' => false,
            ], $attribs);
            $path = plugin_dir_url(__DIR__);
            ob_start();
            require_once plugin_dir_path( __DIR__ ) . "views/short_codes/" . ($attribs['iframe'] ? "iframe.php" : "form.php");
            return ob_get_clean();
        });
    }
}