<?php
    // echo "<pre>";
    // print_r($_POST);
    //die();
    $conn = new mysqli("localhost","id22108291_tmaps_user","TMaps@110","id22108291_tmaps");

    if(count($_POST)>0){
        $action=$_POST['btnSubmit'];
        if($action== "Submit")
        {
            $lat = mysqli_real_escape_string($conn,$_POST['lati']);
            $lon = mysqli_real_escape_string($conn,$_POST['lon']);
            $name_of_location = mysqli_real_escape_string($conn,$_POST['name_of_location']);
            $Timeslots = mysqli_real_escape_string($conn,$_POST['Timeslots']);
            $Select_time = mysqli_real_escape_string($conn,$_POST['Select_time']);
            $Select_duration = mysqli_real_escape_string($conn,$_POST['Select_duration']);
            
            if((strlen($lat) > 0 && $lat !="") && (strlen($lon) > 0 && $lon !="")){
                if(!is_uploaded_file($_FILES['image_file']['tmp_name'])){
                     echo "<script type='text/javascript'>alert('Please upload Image');</script>";
                }
                $query="insert into locationdb(latitude,longitude,location_name,Timeslots,timings_of_construction,Estimate_completion_time) VALUES('$lat','$lon','$name_of_location','$Timeslots','$Select_time','$Select_duration')";
            
                if(mysqli_query($conn, $query))
                {
                    $last_id = mysqli_insert_id($conn);
                    if(is_uploaded_file($_FILES['image_file']['tmp_name'])){
                        //To store the image in the directory
                        $path = "../images/";
                        $d = $path . $name_of_location."_".$_FILES['image_file']['name'];
                        //To store this value in DB
                        $db_path = "images/";
                        $db = $db_path . $name_of_location."_".$_FILES['image_file']['name'];

                        
                        if(move_uploaded_file($_FILES['image_file']['tmp_name'],$d)){
                            $update_image = "update locationdb set image_path='$db' where location_id=$last_id";
                            mysqli_query($conn,$update_image);
                            echo "<script type='text/javascript'>alert('New Entry Updated');window.location.href='../Homepage/index.php';</script>";       
                        }else{
                            $deleteEntry = "delete from locationdb where location_id=$last_id";
                            mysqli_query($conn,$deleteEntry);
                             echo "<script type='text/javascript'>alert('Failed to upload data, Try Again!');</script>"; 
                        }
                    }
                    else{
                        
                    }
                }
                else
                {
                    echo "<script type='text/javascript'>alert('Failed to update entry');</script>";
                }
            }else{
                
            }
        }
        else
        {
            echo "No Data";
        }
      
    }
   

?>