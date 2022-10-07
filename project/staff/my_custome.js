function GoTo(event){
    let x = 'staff_Area.php';
    if(event.id.localeCompare("AddINS") == 0) {
        x = "Instructor/Instructor_Fill.php";
    }else if(event.id.localeCompare("AddBRA") == 0) {
        x = "Branch/Branch_Fill.php";
    }else if(event.id.localeCompare("AddCLASS") == 0){
        x ="Class/Class_Fill.php"
    }else if(event.id.localeCompare("Connect_CI") == 0){
        x = "Class/Connect_INS/Class_Con_INS.php";
    }else if(event.id.localeCompare("Connect_CC") == 0){
        x = "Class/Connect_INS/Class_Con_Cus.php";
    }else if(event.id.localeCompare("Add_Admin") == 0){
        x = "Admin/addAdmin_Fill.php";
    }else if(event.id.localeCompare("Remove_Admin") == 0){
        x = "Admin/remove_Admin_Fill.php";
    }

    location.href = x;
}