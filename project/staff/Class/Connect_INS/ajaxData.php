<?php
// Include the database config file

require "../../../Global_Stuff/DB_func.php";
if(!empty($_POST["class_id"])){
    // Fetch state data based on the specific country
    $query = "SELECT Instructor.Ins_id as id , CONCAT(Instructor.Ins_Firstname, ' ', Instructor.Ins_Lastname) as name
              FROM Instructor
              WHERE Ins_id NOT IN (SELECT Ins_id
                                   FROM  Instructor   JOIN Ins_Class USING(Ins_id)
                                   WHERE class_id =".$_POST['class_id']." ) Order by name;";

    $result = excuteQuery($query);
   // print_r($result);

    // Generate HTML of state options list
    if(count($result) > 0){
        echo '<option value="" disabled selected hidden>Choose Instructor</option>';
        $counter = 0;
        while($counter < count($result)){
            echo "<option value=".$result[$counter]['id'].">".$result[$counter]['name']."</option>";
            $counter = $counter +1;
        }
    }else{
        echo '<option value="">Instructor not available</option>';
    }
}
?>