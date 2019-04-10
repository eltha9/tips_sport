function initMap() {
    let myLatLng = {lat: 48.85740, lng: 2.37950}

    // Create a map object and specify the DOM element
    // for display.
    let map = new google.maps.Map(document.getElementById('map'), {
      center: myLatLng,
      zoom: 14
    })


    let url= './model/salle_location.php'

    fetch(url)
    .then((_response)=>{
    
        return _response.json()
    })
    .then((response)=>{
        //create the markers
        for(let i=0; i<response.length; i++){
            let marker = new google.maps.Marker({
                map: map,
                position: response[i].location,
                title: response[i].name
            })

        }
    
    })
    
}

initMap()

