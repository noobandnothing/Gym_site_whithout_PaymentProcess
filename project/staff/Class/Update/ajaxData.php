<?php
// Include the database config file

require "../../../Global_Stuff/DB_func.php";
if(!empty($_POST["class_id"])){
    // Fetch state data based on the specific country
    $query = "SELECT * FROM Class WHERE class_id =".$_POST['class_id']." ) Order by name;";

    $result = excuteQuery($query);
   // print_r($result);

    // Generate HTML of state options list
    if(count($result) > 0){
        $counter = 0;
        while($counter < count($result)){
            $name = $result['name'];

            $describe =  $result['describe'];
            $start = $result['start'];
            $end =  $result['end'];
            $Day =  $result['Day'];
            echo "<option value=".$result[$counter]['id'].">".$result[$counter]['name']."</option>";
            $counter = $counter +1;
        }
    }
}
?>