<?php

header('Content-Type: application/json');

$con = mysqli_connect("localhost","root","root","veloinfospublic");

// Check connection

$id = $_GET["id_cycliste"];
if (mysqli_connect_errno($con))
{
    echo "Failed to connect to DataBase: " . mysqli_connect_error();
}else
{
    $data_points = array();
    $result = mysqli_query($con, "SELECT Temps,Vitesse FROM releve where cycliste_id=".$id);
    // var_dump ($result);

    // while($row = mysqli_fetch_array($result))
    // {
    //     $point = array("label" => $row['temps'] , "y" => $row['vitesse']);
    //     var_dump ($point);
    //
    //
    // }

    while ($row = $result->fetch_assoc()) {
        $point = array("label" => $row['Temps'] , "y" => $row['Vitesse']);
        array_push($data_points, $point);
    }
    echo json_encode($data_points, JSON_NUMERIC_CHECK);
}
mysqli_close($con);

?>
