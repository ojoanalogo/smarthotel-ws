<?php include "includes/header.php" ?>
<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>
<div id="map"></div>
<?php include "includes/footer.php" ?>
<script>
    function initMap() {
        var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 4,
            center: uluru
        });
        var marker = new google.maps.Marker({
            position: uluru,
            map: map
        });
    }
</script>