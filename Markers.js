async function initMap() {
    const map=new google.maps.Map(document.getElementById("map"),{
        mapTypeControl:false,
        center:{lat:19.0760,lng:72.8777},
        zoom:13,
        mapId: "3a71071e0d14660b"
    });
  
    new google.maps.Marker({
      position: {lat:18.951802519745133,lng: 72.82259758476641},
      map,
      title: "Metro Construction",
      icon:{
        url:"../imges/const.svg",
        scaledSize:new google.maps.Size(38,31),
    },
    });
    new google.maps.Marker({
        position: {lat:18.951892248334573,lng: 72.82300271124872},
        map,
        title: "Construction",
        icon:{
            url:"../imges/const.svg",
            scaledSize:new google.maps.Size(38,31),
        },
        
        });

        new google.maps.Marker({
            position: {lat:18.952986473771688, lng:72.82502638827091},
            map,
            title: "Construction",
            icon:{
                url:"../imges/const.svg",
                scaledSize:new google.maps.Size(38,31),
            },
            
            });

            new google.maps.Marker({
                position: {lat:18.951512459649592, lng:72.82291904787925},
                map,
                title: "Construction",
                icon:{
                    url:"../imges/const.svg",
                    scaledSize:new google.maps.Size(38,31),
                },
                
                });

                new google.maps.Marker({
                    position: {lat:18.948251512368476, lng:72.83475248841475},
                    map,
                    title: "Construction",
                    icon:{
                        url:"../imges/const.svg",
                        scaledSize:new google.maps.Size(38,31),
                    },
                    
                    });
  }
  
  window.initMap = initMap;
  