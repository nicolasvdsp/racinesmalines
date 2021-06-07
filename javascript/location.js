let currentCity = document.querySelector('#location');
let btnMaps = document.querySelector('.maps');
getLocation();

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(getLatLong);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function getLatLong(position) {
    let lat = position.coords.latitude;
    console.log(lat); 
    let long = position.coords.longitude;
    console.log(long); 

    getCity(lat, long);
}

function getCity(lat, long){
    let key = "830f3a3c0fdb4b1fbaae8e1d5e96373f";
    let url = `https://api.opencagedata.com/geocode/v1/json?q=${lat}+${long}&pretty=1&key=${key}`;

    fetch(url).then((response) => {
        return response.json();
    }).then((json) => {
        console.log(json);

        let city = json.results['0'].components['town'];
        let street = json.results['0'].components['road'];
        let houseNumber = json.results['0'].components['house_number'];

        let gardenCity = btnMaps.dataset["gardencity"];
        let gardenStreet = btnMaps.dataset["gardenstreet"];
        let gardenHouseNumber = btnMaps.dataset["gardenhousenumber"];
        let gardenName = btnMaps.dataset["gardenname"];
        
        btnMaps.setAttribute("data-city", city);
        btnMaps.setAttribute("data-street", street);
        btnMaps.setAttribute("data-housenumber", houseNumber);
        btnMaps.href=`https://www.google.com/maps/dir/${street}+${houseNumber},+${city}/${gardenName},+${gardenStreet}+${gardenHouseNumber},+${gardenCity}`;
        console.log(city);
        console.log(street);
        console.log(houseNumber);
    });
    
    
}