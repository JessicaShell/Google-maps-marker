<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>T Maps</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'/>
    <link rel="stylesheet" href="sidebar.css" > 
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" -->
    <!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script-->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
     <div >
        <input 
            id="origin-input"
            class="controls"
            type="text"
            placeholder="Source Location"
            style="margin:10px;left:100px;"
        />  

        <input 
            id="destination-input"
            class="controls"
            type="text"
            placeholder="Destination Location"
            style="margin:10px;left:320px;"
        />  

        <div id="mode-selector" class="controls">
            <input
                type="radio"
                name="type"
                id="changemode-walking"
                checked="checked"
                onchange="getModeSelector()"
                style="margin:10px;left:370px;"
            />
            <label for="changemode-walking">Walking</label>
            
            
            <input type="radio" name="type" id="changemode-transit"/>
            <label for="changemode-walking">Transit</label>
            
            <input type="radio" name="type" id="changemode-driving"/>
            <label for="changemode-driving">Driving</label>
            
        </div>

    </div>
    
     <div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class='bx bxs-traffic'></i>
                 <span>T Maps</span>
            </div>
            <i class="bx bx-menu" id="btn"></i>
        </div>
       
        <ul>
            <li>
                <a href="index.php">
                    <i class='bx bxs-map'></i>
                    <span class="nav-item">Map</span>
                </a>
              
            </li>
            <li>
                <a href="../Database\AddLocationInfo.html">
                    <i class='bx bx-vertical-top'></i>
                    <span class="nav-item">Add Missing Places</span>
                </a>
                
            </li>
            <li>
                <a href="../Database\DeleteLocationInfo.html">
                    <i class='bx bx-vertical-bottom'></i>
                    <span class="nav-item">Delete Marker</span>
                </a>
               
            </li>
            <li>
                <a href="../Authentication\Register.html">
                    <i class='bx bxs-registered'></i>
                    <span class="nav-item"><Ri:a>Register</Ri:a></span>
                </a>
                
            </li>
            <li>
                <a href="../Authentication\Login.php">
                    <i class='bx bxs-log-in'></i>
                    <span class="nav-item">LOGIN</span>
                </a>
            </li>
        </ul>
        <script type="text/javascript" src="sidebar.js"></script>
    </div>
    <div class="main-content">
        <!-- <div class="container">
            <h6>Hustle Maps</h6>
        </div> -->
        <script type="text/javascript" src="sidebar.js"></script>
    </div>
    
    <div id="map" class="map"></div>

    
    <script type="text/javascript" src="index.js"></script>

    <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwSVZOcSkQL8xVWCrqNPQg25cZsN_n60s&callback=initMap&libraries=places&v=weekly"
    defer 
  ></script>  
   
</body>
</html>