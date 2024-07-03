<?php
namespace Seguriserver\Hosroom;

class Settings {

    private $endpoint = null;
    private $token = null;

    public function __construct()
    {
        if (isset($_GET['error_message'])) {
            add_action('admin_notices', [$this, 'settingsMessages']);
            do_action('admin_notices', $_GET['error_message']);
        }
        add_action('admin_init', [$this, 'updateSettings']);
        $this->registerMenu();
        $this->endpoint = get_option('hosroom_hotel_booking_endpoint', 'https://sys.hosroom.com/booking/');
        $this->token = get_option('hosroom_hotel_booking_token');
    }

    public function updateSettings()
    {
        register_setting('hosroom_wp_booking', 'hosroom_hotel_booking_token');
        register_setting('hosroom_wp_booking', 'hosroom_hotel_booking_endpoint');
    }

    public function settingsMessages($error_message)
    {
        switch ($error_message) {
            case '1':
                $message = __('There was an error adding this setting. Please try again.  If this persists, shoot us an email.', 'hosroom_booking');
                $err_code = esc_attr('hosroom_wp_booking');
                $setting_field = 'hosroom_wp_booking';

                break;
        }
        $type = 'error';
        add_settings_error(
            $setting_field,
            $err_code,
            $message,
            $type
        );
    }

    public function settingsPage()
    {
        require_once plugin_dir_path(__DIR__).'views/settings.php';
    }

    public function getUrl() {
        return $this->endpoint && $this->token ? $this->endpoint . $this->token : false;
    }

    private function registerMenu()
    {
        add_action('admin_menu', function () {
            add_menu_page(
                'Hosroom',
                'Reservas',
                'administrator',
                'hosroom_booking',
                [$this, 'settingsPage'],
                'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTIiIGhlaWdodD0iMTUiIHZpZXdCb3g9IjAgMCAyNjUgMzQwIiBmaWxsPSJub25lIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPgo8cGF0aCBkPSJNMCA2Ny4zMTE5VjEyNy43MjdDMCAxMzEuMDg3IDMuNTQ2NjIgMTMzLjI2MyA2LjU0MTUgMTMxLjc0TDEwNS42MTUgODEuMzg2MUMxMTEuODcyIDc4LjIwNiAxMTUuODEzIDcxLjc4MTkgMTE1LjgxMyA2NC43NjMzVjcuMTUzNjlDMTE1LjgxMyAzLjgzODk3IDExMi4zNTIgMS42NjA5MyAxMDkuMzYzIDMuMDk1MDVMMTAuNTc5MSA1MC41MDA4QzQuMTEzMjYgNTMuNjAzNyAwIDYwLjE0IDAgNjcuMzExOVoiIGZpbGw9ImJsYWNrIi8+CjxwYXRoIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMjAwLjc2NCAwLjY0MTQzOUMxOTYuNzczIC0xLjM1NDA3IDE5Mi4wNzggMS41NDgwNyAxOTIuMDc4IDYuMDEwMTdWNjguMzY3NEMxOTIuMDc4IDgxLjI2MDIgMTg0LjkyOCA5My4wODk0IDE3My41MTIgOTkuMDgyNEw3Mi4wMjkxIDE1Mi4zNjFMMTYuNTkwMyAxODAuMDgxQzYuNDIyNjggMTg1LjE2NCAwIDE5NS41NTcgMCAyMDYuOTI0VjI4NS4xODRDMCAyOTUuODU4IDUuNjY5NjMgMzA1LjcyOSAxNC44ODk5IDMxMS4xMDhMNjMuMDAyMyAzMzkuMTczQzY3LjAwMzggMzQxLjUwNyA3Mi4wMjkxIDMzOC42MjEgNzIuMDI5MSAzMzMuOTg4VjIzMi4zMzlDNzIuMDI5MSAyMzEuMTM4IDcyLjY4MjUgMjMwLjAzMyA3My43MzQxIDIyOS40NTVMMTg3LjIwMSAxNjcuMDQ4QzE4OS4zOTQgMTY1Ljg0MiAxOTIuMDc4IDE2Ny40MjkgMTkyLjA3OCAxNjkuOTMyVjIyMC41OTFDMjEwLjcwMyAyMjMuNjA4IDIyNC45MjcgMjM5LjgyNCAyMjQuOTI3IDI1OS4zNzRDMjI0LjkyNyAyNzguOTI1IDIxMC43MDMgMjk1LjE0MSAxOTIuMDc4IDI5OC4xNThWMzMzLjk4OEMxOTIuMDc4IDMzOC42MjEgMTk3LjEwMyAzNDEuNTA4IDIwMS4xMDUgMzM5LjE3M0wyMzcuMzA1IDMxOC4wNTZDMjUzLjkwMSAzMDguMzc1IDI2NC4xMDcgMjkwLjYwNyAyNjQuMTA3IDI3MS4zOTNWNjUuN0MyNjQuMTA3IDQ1LjIzOCAyNTIuNTQ2IDI2LjUzMjIgMjM0LjI0NCAxNy4zODEzTDIwMC43NjQgMC42NDE0MzlaIiBmaWxsPSJibGFjayIvPgo8cGF0aCBkPSJNMTg1LjQ5NyAyODEuODU0QzE5Ny44MzQgMjgxLjg1NCAyMDcuODM1IDI3MS43OCAyMDcuODM1IDI1OS4zNTRDMjA3LjgzNSAyNDYuOTI3IDE5Ny44MzQgMjM2Ljg1NCAxODUuNDk3IDIzNi44NTRDMTczLjE2MSAyMzYuODU0IDE2My4xNiAyNDYuOTI3IDE2My4xNiAyNTkuMzU0QzE2My4xNiAyNzEuNzggMTczLjE2MSAyODEuODU0IDE4NS40OTcgMjgxLjg1NFoiIGZpbGw9ImJsYWNrIi8+Cjwvc3ZnPgo=',
                26
            );
        });
    }
}