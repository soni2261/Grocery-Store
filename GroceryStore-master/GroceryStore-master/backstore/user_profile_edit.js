const urlParams = new URLSearchParams(window.location.search);
const message = urlParams.get('msg');
const userMessage = urlParams.get('user');

var firstName = document.getElementById('firstName'),
    lastName = document.getElementById('lastName'),
    email = document.getElementById('email'),
    address = document.getElementById('address'),
    postalCode = document.getElementById('postalCode'),
    password = document.getElementById('password'),
    checkBox = document.getElementById('checkBox'),
    role = document.getElementById('role'),
    form = document.getElementById('form');

if ( message != null ){
    const input = document.createElement("h5");
    if (message === 'Successfully Added' || message === 'Successfully Modified'){
        input.style.color = "green";
    } else {
        input.style.color = "red";
    }
    input.style.textAlign = "center";
    input.innerHTML = message;
    let editBlock = document.getElementById("editBlock");
    editBlock.insertBefore(input,null);
}

function fillForm(users){
    for (const user in users){
        if (users[user]['email'] == userMessage){
            console.log(users[user]);
            console.log("test")

            firstName.value = users[user]['firstName'];
            lastName.value = users[user]['lastName'];
            email.value = users[user]['email'];
            address.value = users[user]['address'];
            postalCode.value = users[user]['postalCode'];
            password.value = users[user]['password'];
            role.value = users[user]['role'];

            if (role.value == "admin"){
                checkBox.checked = true;
                address.readOnly = true;
                postalCode.readOnly = true;
                address.value = "null";
                postalCode.value = "null";
            }

            //prevent email change. using disabled function didn't let the form submit the value!!
            email.readOnly = true;
            password.readOnly = true;
        }
    }
}

if (userMessage != null){
    fetch('../database/users.json').then(response => {
        return response.json();
    }).then(users => {
        console.log(users)
        fillForm(users);
    }).catch(err => {
        console.log(err)
        console.log("Could not fetch data from users list.")
    });
}

checkBox.addEventListener("change", ()=>{
    if (checkBox.checked == true){
        role.value = "admin";
        address.readOnly = true;
        postalCode.readOnly = true;
        address.value = "null";
        postalCode.value = "null";
    } else {
        role.value = "customer";
        address.readOnly = false;
        postalCode.readOnly = false;
        address.value = "";
        postalCode.value = "";
    }
})

save_changes = document.getElementById("save_changes");

save_changes.addEventListener("click", () => {
    console.log("clicked");

    if (firstName.value == '') {
        alert("Please add a first name")
    } else if (lastName.value == '') {
        alert("Please add a last name")
    } else if (email.value == '') {
        alert("Please add an email address")
    } else if (address.value == '' && role.value == 'customer'){
        alert("Please add an address")
    } else if (postalCode.value == '' && role.value == 'customer'){
        alert("Please add a postal code")
    } else if (password.value == ''){
        alert("Please add a password")
    } else {
        form.submit();
    }
});