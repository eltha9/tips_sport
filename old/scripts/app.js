function initMap() {

    let pos = {
        lat: null,
        lng: null
    }

    let main_url= './model/salle_location.php'
    let state = false

    
    let fetching=(url)=>{
        fetch(url)
        .then((_response)=>{
        
            return _response.json()
        })
        .then((response)=>{
            if(state){
                pos.lat=response.localisation[0].lat
                pos.lng=response.localisation[0].lng
            }
            // Create a map object and specify the DOM element
            // for display.
            let map = new google.maps.Map(document.getElementById('map'), {
            center: pos,
            zoom: 14
            })

            if(state){
                //create the markers
                for(let i=0; i<response.result.length; i++){
                    let marker = new google.maps.Marker({
                        map: map,
                        position: response.result[0][i].location,
                        title: response.result[0][i].name
                    })

                }
            }
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

    let with_cord= (url,lat,lng)=>{
        url = `${url}?lat=${lat}&lng=${lng}`
        fetching(url)
    }

    let without_cord = (url)=>{
        state= true
        fetching(url)
    }


    if ("geolocation" in navigator) {
        navigator.permissions.query({name:'geolocation'}).then((result) =>{
            let options = {
                enableHighAccuracy: true,
                timeout: 6000,
                maximumAge: 10000
              }
            if(result.state == 'granted'){
                navigator.geolocation.getCurrentPosition((event)=>{
                    pos.lat=event.coords.latitude
                    pos.lng=event.coords.longitude
                    with_cord(main_url,pos.lat,pos.lng)
                },
                (event)=>{
                    without_cord(main_url)
                },options)

            }else{
                without_cord(main_url)
            }            
        })
    
    }else{
        without_cord(main_url)
    }  
    
}




initMap()


