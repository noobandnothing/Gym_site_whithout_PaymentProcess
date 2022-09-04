<?php
require "config.php";

      function  excuteQuery($Statment)
    {
        //connection
        $connection = mysqli_connect(SERVER, DBUSER, DBPASS, DBNAME);
        //query
        $query = mysqli_query($connection, $Statment);
        $result = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $result[] = $row;
        }
        mysqli_close($connection);
        return $result;
        //close connection
    }

      function excuteOther($Statment)
    {
        //connection
        $connection = mysqli_connect(SERVER, DBUSER, DBPASS, DBNAME);
        //query
        $query = mysqli_query($connection, $Statment);
        if ($query && mysqli_affected_rows($connection)){
            mysqli_close($connection);
            return true;
        }
        mysqli_close($connection);
        return false;
        //close connection
    }




