<link rel="StyleSheet" type="text/css" href="<?= $path ?>assets/style.css" />
<script type="text/javascript" src="<?= $path ?>assets/plugin.js"></script>
<div id="hosroom_booking">
    <div class="loading"><span>Cargando...</span></div>
    <iframe frameborder="0" allowtransparency="true" id="hosroom_booking_iframe" width="100%" 
        src="<?= $this->endpoint ?>?embebed=true" onload="hosroom_booking.iframeLoaded()"></iframe>
</div>