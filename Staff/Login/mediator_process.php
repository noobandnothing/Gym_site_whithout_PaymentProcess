<?php
    $dest = $_POST['req'];

    if(is_null($dest)){
        session_destroy();
        header("Location:Login.php");
    }else{
        $data = [];
        if(strcmp($dest,"fp_button") == 0 ){
            $data['trick'] = false;
            $data['dest'] = "FP_process.php";
        }else if(strcmp($dest,"na_button") == 0){
            $data['trick'] = false;
            $data['dest'] = "R_process.php";
        }else{
            $data['trick'] = true;
            $data['dest'] = "Login.php";
            $data['message'] = "STOP THIS SHIT (Where are going ?)";
        }
        echo json_encode($data);
    }
    die();
?>