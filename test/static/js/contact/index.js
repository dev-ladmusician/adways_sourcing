$(document).ready(function () {
    function initialize() {
        var myLatlng = new google.maps.LatLng(37.491691, 127.030252);
        var mapOptions = {
            zoom: 16,
            center: myLatlng
        };
        var map = new google.maps.Map(document.getElementById('aw-map'), mapOptions);

        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: 'ADWAYS!'
        });
    }

    google.maps.event.addDomListener(window, 'load', initialize);
});