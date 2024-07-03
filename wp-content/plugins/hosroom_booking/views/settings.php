<?php

/**
 * Formulario de configuración
 *
 * Requerido para la configuración del plugin y conexión con Hosroom
 *
 * @link       https://hosroom.com
 * @since      1.0.0
 *
 * @package    hosroom_booking
 * @subpackage hosroom_booking/views/settings
 */
?>
<div class="wrap">
    <div id="icon-themes" class="icon32"></div>  
    <h2>Configuración del plugin - Hosroom Reservas</h2>
    <?php settings_errors(); ?>  
    <form method="POST" action="options.php">  
        <?php 
            settings_fields( 'hosroom_wp_booking' );
            do_settings_sections( 'hosroom_wp_booking' ); 
        ?>           
        <table class="form-table">
            <tr valign="top">
                <th scope="row">
                    Endpoint:
                </th>
                <td>
                    <input type="url" name="hosroom_hotel_booking_endpoint" style="width:350px" value="<?= $this->endpoint ?>" required/><br>
                    <small>Sólo editar si se posee un dominio personalizado</small>
                </td>
            </tr>
            </tr>
                <th scope="row">
                    Código de integración:
                </th>
                <td>
                    <input type="text" name="hosroom_hotel_booking_token" style="width:350px" value="<?= $this->token ?>" required/><br>
                    <small>Disponible en el sistema "Configuración" > "Integraciones" > "Motor de reservas"</small>
                </td>
            </tr>
        </table>  
        <?php submit_button(); ?>  
    </form>
    <?php if($this->token) : ?>
    <blockquote>
        <p>
            <strong>Utiliza el siguiente ShortCode para agregar el plugin de búsqueda a la web:</strong><br>
            <code>[hosroom_booking]</code>
        </p>
        <p>
            Alternativamente puedes parametrizar el plugin para usarse en modo iframe<br>
            <code>[hosroom_booking iframe="true"]</code>
        </p>
    </blockquote>
    <?php endif; ?> 
</div>