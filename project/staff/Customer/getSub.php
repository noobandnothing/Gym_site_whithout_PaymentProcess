<?php
require "../../Global_Stuff/DB_func.php";
require "../../Global_Stuff/picture.php";
require "../../Global_Stuff/GClass.php";
require "../../Global_Stuff/Customer.php";
$tmp_Cus = new Customer();
$cus_id = $_POST['cutomer'];
$tmp_Cus->fill_object($cus_id);
$res = excuteQuery("Select * from subscription where cust_id =".$cus_id);
?>

<html>
    <body>
        <table>
            <?php
                if(count($res) != 0){
                    for($counter = 1 ; $counter < count($res);$counter++){
                        echo "<tr>";
                        echo "<td>";
                        echo excuteQuery("SELECT class_name from Class where  class_id =".$res[$counter-1]['class_name'])['class_name'];
                        echo "</td>";
                        echo "</tr>";
                    }
                }
            ?>
        </table>
    </body>
</html>


