function toggle(){
    const passField = document.getElementById("pwd");
    
    if (passField.type === "password"){
        passField.type = "text";
    }
    else{
        passField.type = "password";
    }
}