<link rel="StyleSheet" type="text/css" href="<?= $path ?>assets/style.css" />
<form action="<?= $this->endpoint ?>" method="GET" class="form_hosroom" target="_blank">
    <div>
        <label for="since">Llegada</label>
        <input type="date" min="<?= $today = date("Y-m-d") ?>" value="<?= $today ?>" name="checkin" required>
    </div>
    <div>
        <label for="checkout">Salida</label>
        <input type="date" min="<?= $tomorrow = date("Y-m-d", strtotime('+1 day')) ?>" value="<?= $tomorrow ?>" name="checkout" required>
    </div>
    <div>
        <label for="checkout">Huéspedes</label>
        <input type="number" name="occupancy" value="2" min="1" max="10" step="1" required>
    </div>
    <input type="submit" class="wp-element-button" value="Buscar reserva">
</form>