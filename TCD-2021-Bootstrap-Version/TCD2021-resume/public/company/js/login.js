function empty () {

    Swal.fire({
        icon: 'warning',
        title: 'Empty Field Detected',
        text: 'Please fill up the details !!',
    })

}

function detailsError () {

    Swal.fire({
        icon: 'warning',
        title: 'Incorrect password/email !!',
        text: 'Try Again !!',
    })

}

function emailError () {

    Swal.fire({
        icon: 'warning',
        title: 'Email unavailable',
        text: 'Try Again !!',
    })

}

function emailFailed () {

    Swal.fire({
        icon: 'warning',
        title: 'Email Send Failed',
        text: 'Try Again !!',
    })

}

function emailSuccess() {

    Swal.fire({
        icon: 'success',
        title: 'Email Sent !!',
        text: 'Check your inbox now !!',
    })

}

function loginAnimation(){

    var span = document.querySelector(".login-text");
    var loading = document.querySelector(".login-loading");
    var icon = document.querySelector(".login-icon");

    span.classList.add("active");
    loading.classList.add("active");
    icon.classList.add("active");
    
}

function sendAnimation(){

    var span = document.querySelector(".send-text");
    var loading = document.querySelector(".send-loading");
    var icon = document.querySelector(".send-hover");

    span.classList.add("active");
    loading.classList.add("active");
    icon.classList.add("active");
    
}