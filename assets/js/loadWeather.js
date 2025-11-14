// Weather icons object (FontAwesome)
var weatherIcons = {
    sun: 'fa-solid fa-sun',
    moon: 'fa-solid fa-moon',
    cloud: 'fa-solid fa-cloud'
};

// Update weather icon based on conditions
function updateWeatherIcon(isDay, isRaining) {
    var weatherElements = document.querySelectorAll('.weather');
    var iconClass = weatherIcons.cloud; // default
    var i;
    
    if (isRaining) {
        iconClass = weatherIcons.cloud; // raining = cloud
    } else if (isDay) {
        iconClass = weatherIcons.sun; // day = sun
    } else {
        iconClass = weatherIcons.moon; // night = moon
    }
    
    for (i = 0; i < weatherElements.length; i++) {
        var el = weatherElements[i];
        var iconElement = el.querySelector('i');
        if (iconElement) {
            iconElement.className = iconClass;
        }
    }
}

// Update weather elements with location
function updateWeatherLocation(city) {
    var weatherElements = document.querySelectorAll('.weather');
    var i;
    
    for (i = 0; i < weatherElements.length; i++) {
        var el = weatherElements[i];
        var strong = el.querySelector('strong');
        if (strong) {
            strong.textContent = city;
        }
    }
}

// Update weather temperature in span
function updateWeatherTemperature(temperature) {
    var weatherElements = document.querySelectorAll('.weather');
    var i;
    
    for (i = 0; i < weatherElements.length; i++) {
        var el = weatherElements[i];
        var span = el.querySelector('span');
        if (span) {
            span.textContent = Math.round(temperature) + '°';
        }
    }
}

// Get weather based on coordinates
function getWeather(latitude, longitude) {
    var url = 'https://api.open-meteo.com/v1/forecast?latitude=' + latitude + '&longitude=' + longitude + '&current=temperature_2m,is_day,precipitation';
    
    fetch(url)
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            if (data.current) {
                if (data.current.temperature_2m !== undefined) {
                    updateWeatherTemperature(data.current.temperature_2m);
                }
                
                var isDay = data.current.is_day === 1;
                var isRaining = data.current.precipitation && data.current.precipitation > 0;
                
                updateWeatherIcon(isDay, isRaining);
            }
        })
        .catch(function(error) {
            updateWeatherTemperature('-');
        });
}

// Get user's current location
if (navigator.geolocation) {
    var isLocalhost = window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1';
    
    if (isLocalhost) {
        updateWeatherLocation('Sofia');
        getWeather(42.6977, 23.3219); // Sofia coordinates
    } else if (window.location.protocol === 'https:') {
        navigator.geolocation.getCurrentPosition(
            function(position) {
                var lat = position.coords.latitude;
                var lon = position.coords.longitude;
                // For now, showing coordinates or you can fetch city name
                updateWeatherLocation(lat.toFixed(2) + ', ' + lon.toFixed(2));
                getWeather(lat, lon);
            },
            function(error) {
                updateWeatherLocation('Unknown');
                updateWeatherTemperature('-');
            },
            { enableHighAccuracy: true, timeout: 5000 }
        );
    } else {
        updateWeatherLocation('Sofia');
        getWeather(42.6977, 23.3219); // Sofia coordinates
    }
}
