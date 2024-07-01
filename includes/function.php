<?php
function checkUser($con,$email)
{
    $data = array();
    $userQuery = "select * from registrationdb where email = '$email'";
    $resQuery = mysqli_query($con,$userQuery);
    $cntQuery = mysqli_num_rows($resQuery);
    if($cntQuery > 0){
        while($row = mysqli_fetch_assoc($resQuery)){
            $data[] = $row;
        }
    }
    return $data;
}
?>