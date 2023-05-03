$(document).ready(function() {
    const api_url = window.location.href + "/../api/properties";

    if (document.getElementById("map") !== null) {
        var mapOptions = {
            scrollWheelZoom: false
        };
        window.map = L.map("map", mapOptions);
        $("#scrollEnabling").hide();

        function locationData(
            locationURL,
            locationImg,
            locationTitle,
            locationAddress,
            locationRating,
        ) {
            return (
                "" +
                '<div class="container map_container">' +
                '<div class="row">' +
                '<div class="col-md-12 px-0">' +
                '<div class="ps-project__image" id="marker_info">' +
                '<img src="' +
                locationImg +
                '" alt="..."/>' +
                '<div class = "marker_price trend-open">' +
                "<p>" +
                "$" +
                locationAddress +
                "<span>month</span>" +
                "</p>" +
                "</div>" +
                '<span class="featured_btn">' +
                locationRating +
                "</span>" +
                "</div>" +
                '<div class="marker-text">' +
                '<h3 class="ps-project__name"><a href="' +
                locationURL +
                '">' +
                locationTitle +
                "</a></h3>" +
                "</div>" +
                "</div>" +
                "</div>" +
                "</div>"
            );
        }

        // var locations = [
        //     [locationData('single-listing-one.html', 'images/property/property_1.jpg', "Chaktai on Chattaogram", '15000', 'For Rent', '4', '3','2','2240'), 22.336190162160296, 91.85713632005306],
        //    [locationData('single-listing-one.html', 'images/property/property_1.jpg', "Kotowali on Chattaogram", '15000', 'For Rent', '4', '3','2','2240'), 22.342655620420928, 91.82768887078672],
        //    [locationData('single-listing-one.html', 'images/property/property_1.jpg', "Kazir Dewri on Hartfold", '15000', 'For Rent', '4', '3','2','2240'), 22.350148578940146, 91.82639293442351],
        //    [locationData('single-listing-one.html', 'images/property/property_1.jpg', "Patiya on Chattaogram", '15000', 'For Rent', '4', '3','2','2240'), 22.254024243647397, 92.01446570678988],
        //    [locationData('single-listing-one.html', 'images/property/property_1.jpg', "Villa on Hartfold", '15000', 'For Rent', '4', '3','2','2240'), 22.437085978486266, 91.7643134345852],
        // ];
        L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution:
                " &copy;  <a href='https://www.mapbox.com/about/maps/'>Mapbox</a> &copy;  <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a>",
            maxZoom: 10,
            id: "mapbox.streets",
            accessToken:
                "pk.eyJ1IjoidmFzdGVyYWQiLCJhIjoiY2p5cjd0NTc1MDdwaDNtbnVoOGwzNmo4aSJ9.BnYb645YABOY2G4yWAFRVw"
        }).addTo(map);
        markers = L.markerClusterGroup({
            spiderfyOnMaxZoom: true,
            showCoverageOnHover: false
        });

        async function getData() {
            const response = await fetch(api_url);
            const locations = await response.json();
            for (var i = 0; i < locations.length; i++) {
                var markerArray = [];
                marker = new L.marker([locations[i].lat, locations[i].lon], {
                    icon: listeoIcon
                }).bindPopup(
                    '<div class="ps-grid__item">' +
                        '<div class="ps-project">' +
                        '<div class="ps-project__thumbnail">' +
                        '<div class="ps-project__image" id="marker_info">' +
                        '<img src="images/thumbnail/' +
                        locations[i].thumbnail +
                        '" alt="..."/>' +
                        '<div class = "ps-project__price">' +
                        "<p>" +
                        "$" +
                        locations[i].price +
                        "<span></span>" +
                        "</p>" +
                        "</div>" +
                        '<span class="featured_btn">' +
                        locations[i].type +
                        "</span>" +
                        "</div>" +
                        '<div class="marker-text">' +
                        '<h3 class="ps-project__name"><a href="properties/' +
                        locations[i].id +
                        '">' +
                        locations[i].title +
                        "</a></h3>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</div>",
                    popupOptions
                );
                marker.on("click", function(e) {});
                map.on("popupopen", function(e) {
                    L.DomUtil.addClass(e.popup._source._icon, "clicked");
                }).on("popupclose", function(e) {
                    if (e.popup) {
                        L.DomUtil.removeClass(e.popup._source._icon, "clicked");
                    }
                });
                markers.addLayer(marker);
            }
            map.addLayer(markers);
            markerArray.push(markers);
            if (markerArray.length > 0) {
                map.fitBounds(
                    L.featureGroup(markerArray)
                        .getBounds()
                        .pad(0.2)
                );
            }
            map.removeControl(map.zoomControl);
            var zoomOptions = {
                zoomInText: "+",
                zoomOutText: "-"
            };
            var zoom = L.control.zoom(zoomOptions);
            zoom.addTo(map);
        }

        getData();
    }
});
