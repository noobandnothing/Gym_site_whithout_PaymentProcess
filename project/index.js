function GoTo(event){
    let x = `staff_Area.php`;
    if(event.id.localeCompare("Main") == 0) {
        x = "Main/Main.php";
    }else if(event.id.localeCompare("Stuff") == 0) {
        x = "staff/Login.php";
    }
    location.href = x;
}