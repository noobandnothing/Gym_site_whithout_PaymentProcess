function GoTo(event){
    let x = `Main.php`;
    if(event.id.localeCompare("LogOut") == 0) {
        x = "../Customer/Logout.php";
    }else if(event.id.localeCompare("REG") == 0){
        x = "../Customer/Registration.php";
    }
    location.href = x;
}