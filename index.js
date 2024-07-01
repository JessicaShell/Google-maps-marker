async function initMap()
{
    const { Map, InfoWindow } = await google.maps.importLibrary("maps");
    const { AdvancedMarkerElement, PinElement } = await google.maps.importLibrary(
      "marker",
    );
    
    const map=new google.maps.Map(document.getElementById("map"),{
        mapTypeControl:false,
        center:{lat:18.9547,lng: 72.8139},
        zoom:13,
        mapId: "3a71071e0d14660b"
    });
    const constructionLoction = [
        {
          position: { lat:18.951802519745133,lng: 72.82259758476641 },
          title: "Metro Construction , Timings of construction : 12:00-00:00 , Estimate completion time : 3 years"
            //   icon:{
            //     url:"../imges/const.svg",
            //     scaledSize:new google.maps.Size(38,31)
            // }
        },
        {
          position: { lat:18.951892248334573,lng: 72.82300271124872 },
          title: "Thakurdwar, Timings of construction : 00:00-06:00 , Estimate completion time : 4 months",
        },
        {
          position: { lat:18.952986473771688, lng:72.82502638827091 },
          title: "Bhuleshwar, Timings of construction : 00:00-06:00 , Estimate completion time : 4 years",
        },
      
        {
            position: {lat:18.951512459649592, lng:72.82291904787925},
            title: "Thakurdwar, Timings of construction : 12:00-00:00 , Estimate completion time : 3 years",
          },
          {
            position: { lat:18.972724070613832, lng:72.82217031988783},
            title: "Nair Hospital, Timings of construction : 18:00-06:00 , Estimate completion time : 1 years",
          },
        {
            position:{lat:18.948251512368476, lng:72.83475248841475},
            title:"CSMT, Timings of construction : 00:00-06:00 , Estimate completion time : 2 years"
        },
        {
            position:{lat:18.961253288842705,lng: 72.8289265899559},
            title:"Duncan Road, Timings of construction : 18:00-06:00 , Estimate completion time : 1 years"
        },
        {
            position:{lat:18.955987215129436, lng:72.82362714107897},
            title:"V.P.Road, Timings of construction : 00:00-06:00 , Estimate completion time :  6 months"
        },
        {
            position:{lat:18.980002581631545, lng:72.81250802110652},
            title:"Worli, Timings of construction : 12:00-00:00 , Estimate completion time : 2 years"
        },
        {
            position:{lat:18.950706886009392, lng:72.83279111016077},
            title:"Abdul Rehman Street, Timings of construction : 12:00-00:00 , Estimate completion time : 1 years"
        },
        {
            position:{lat:18.951282272459913, lng:72.81734832012957},
            title:"Marine Lines, Timings of construction : 12:00-00:00 , Estimate completion time : 2 years"
        },
        {
            position:{lat:18.932437898422844, lng:72.83184961327824},
            title:"Flora Fountain, Timings of construction : 12:00-00:00 , Estimate completion time : 8 months "
        },
        {
            position:{lat:18.932205916732748, lng:72.82743684145026},
            title:"Churchgate, Timings of construction : 12:00-00:00 , Estimate completion time : 3 years"
        },
        {
            position:{lat:18.913120086111054, lng:72.8203171126329},
            title:"Cuffe Parade, Timings of construction : 18:00-06:00 , Estimate completion time : 3 years"
        },
        {
            position:{lat:18.96301689460539, lng:72.81793586438657},
            title:"Grant Road, Timings of construction : 12:00-00:00 , Estimate completion time : 3 years"
        },
        {
            position:{lat:18.947487394893944,lng: 72.82696168490365},
            title:"Kalbadevi, Timings of construction : 12:00-00:00 , Estimate completion time : 3 years"
        },
        {
            position:{lat:18.96078266660999, lng:72.8319921278654},
            title:"Mohammed Ali Rd, Timings of construction : 12:00-00:00 , Estimate completion time : 6 months"
        },
        {
            position:{lat:18.965086748726783, lng:72.81619937507793},
            title:"Sleater Road, Timings of construction : 18:00-06:00 , Estimate completion time : 1 years"
        },
        {
            position:{lat:18.960115459632313, lng:72.81968140965525},
            title:"RajaRam Road, Timings of construction : 12:00-00:00 , Estimate completion time : 3 months"
        }
        
    ];
        const infoWindow = new InfoWindow();
        constructionLoction.forEach(({ position, title }, i) => {
            const pin = new PinElement({
              glyph: `${i + 1}`,
              scale: 1.5,
            });
            const marker = new AdvancedMarkerElement({
              position,
              map,
              title: `${i + 1}. ${title}`,
              content: pin.element,
            });
        
           
            marker.addListener("click", ({ domEvent, latLng }) => {
              const { target } = domEvent;
              const pos = marker.positon;
        
              infoWindow.close();
              infoWindow.setContent(marker.title);
              infoWindow.open(marker.map, marker);
              console.log("Marker Title:" + marker.title);
              var data = latLng.toString();
              var sp = data.split(",");
              var lat = sp[0].replace("(","");
              var lng = sp[1].replace(")","");
              console.log("latitude " + lat);
              console.log("Longitude " + lng);
              $('#lat').val(lat)
              $('#lng').val(lng)
            });
          });
    new AutocompleteDirectionsHandler(map);
        }
        initMap();
function getModeSelector()
{
    const map=new google.maps.Map(document.getElementById("map"),{
        mapTypeControl:false,
        center:{lat:19.0760,lng:72.8777},
        zoom:13,
    });
    new AutocompleteDirectionsHandler(map);
}
class AutocompleteDirectionsHandler
{
    map;
    originPlaceId;
    destinationPlaceId;
    travelMode;
    directionsService;
    directionsRenderer;
    constructor(map){
        this.map=map;
        this.originPlaceId="";
        this.destinationPlaceId="";
        this.travelMode= google.maps.TravelMode.WALKING;
        this.directionsService=new google.maps.DirectionsService();
        this.directionsRenderer=new google.maps.DirectionsRenderer();
        this.directionsRenderer.setMap(map);

        const originInput=document.getElementById("origin-input");
        const destinationInput=document.getElementById("destination-input");
        const modeSelector =document.getElementById("mode-selector");

        const originAutocomplete=new google.maps.places.Autocomplete(
            originInput,
            {fields:["place_id"]},
        );
        const destinationAutocomplete=new google.maps.places.Autocomplete(
            destinationInput,
            {fields:["place_id"]},
        );
        
        this.setupClickListener(
            "changemode-walking",
            google.maps.TravelMode.WALKING,
        );
        this.setupClickListener(
            "changemode-transit",
            google.maps.TravelMode.TRANSIT,
        );
        this.setupClickListener(
            "changemode-driving",
            google.maps.TravelMode.DRIVING,
        );
        
        this.setupPlaceChangedListener(originAutocomplete,"ORIG");
        this.setupPlaceChangedListener(destinationAutocomplete,"DEST");
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(originInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(destinationInput);
        this.map.controls[google.maps.ControlPosition.TOP_LEFT].push(modeSelector);
    }
    setupClickListener(id,mode){
        const radioButton=document.getElementById(id);
        radioButton.addEventListener("click",()=>
        {
        this.travelMode=mode;
        this.route();
        });
    }
    setupPlaceChangedListener(autocomplete,mode)
    {
        autocomplete.bindTo("bounds",this.map);
        autocomplete.addListener("place_changed",()=>{
            const place=autocomplete.getPlace();

            if(!place.place_id)
            {
                window.alert("Please select an option from the drop-down list");
                return;
            }

            if(mode==="ORIG")
            {
                this.originPlaceId=place.place_id;
            }
            else
            {
                this.destinationPlaceId=place.place_id;
            }
            this.route();
        });
    }
    route()
    {
        if(!this.originPlaceId || !this.destinationPlaceId)
        {
            return;
        } 
        const me=this;
        this.directionsService.route(
        {
            origin:{placeId:this.originPlaceId},
            destination:{placeId:this.destinationPlaceId},
            travelMode:this.travelMode,
        },
        (response,status)=>{
            if(status==="OK")
            {
                me.directionsRenderer.setDirections(response);
            }
            else
            {
                window.alert("Directions request failed due to "+status);
            }
        },
    );
        
    }

}
//window.initMap = initMap;
