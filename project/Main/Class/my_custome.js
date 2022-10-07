function GoTo(event){
    let x = "#";
    if(event.id.localeCompare("#") != 0) {
        if (event.id.localeCompare("REG") == 0) {
            x = "../Customer/Registration.php";
        } else if(event.id.localeCompare("LogOut") == 0){
            x = "../Customer/Logout.php";
        }else{
            var number=document.getElementById(event.id).value;
            if(event.id.localeCompare("Sub_Customer") == 0){
                x = "sub.php?class="+number;
            }else if(event.id.localeCompare("unSub_Customer") == 0){
                x = "unsub.php?class="+number;
            } else{
                x = "Class_Info.php?class="+number;
            }
        }
    }
    location.href = x;
}