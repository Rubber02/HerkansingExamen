<?php
/*
Plugin Name: Custom Map Shortcode
Description: A Custom Plugin that adds a shortcode for rendering a map using Leaflet.
Version: 1.0
Author: Ruubs
*/

// Hook the function to WordPress initialization
add_action('init', 'register_custom_map_shortcode');

function register_custom_map_shortcode() {
    // Add the shortcode
    add_shortcode('custom_map', 'render_custom_map');
}

function render_custom_map() {
    ob_start();
    ?>
    
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

    <div id="map"></div>

    <style>
        #map { 
            height: 750px;
            width: 750px;
        }
    </style>

    <script src="test.js"></script>

    <script>
        var map = L.map('map').setView([52.21, 5.96944], 5);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var ned = L.geoJSON(bing).addTo(map);
    </script>
    <?php
    return ob_get_clean();
}
?>