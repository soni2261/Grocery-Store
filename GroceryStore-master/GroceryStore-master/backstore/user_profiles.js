function editUser(email) {
    document.location = 'user_profile_edit.php?user=' + email;
}

fetch('../database/users.json').then(response => {
    return response.json();
}).then(users => {
    displayUsers(users);
}).catch(err => {
    console.log("Could not fetch data from users list")
});

const usersContainer = document.getElementById("usersContainer");
let form = document.getElementById("form");

function displayUsers(users){

    for (const user in users){

        // console.log(products[product]['product_name']);
        const div = document.createElement('div');
        div.className = "row colorfill-grey align-items-center";
        div.id = users[user]['email'];
        div.innerHTML = "<div class=\"col-md-3\"><h5>" + users[user]['email'] + "</h5></div>\n" +
            "            <div class=\"col-md-2\"><h5>" + users[user]['firstName'] + "</h5></div>\n" +
            "            <div class=\"col-md-2\"><h5>" + users[user]['lastName'] + "</h5></div>\n" +
            "            <div class=\"col-md-2\"><h5>" + users[user]['postalCode'] + "</h5></div>\n" +
            "            <div class=\"col-md-1\"><h5>" + users[user]['role'] + "</h5></div>\n" +
            "            <div class=\"col-md-1\">\n" +
            "                <button type=\"button\" class=\"btn\" onclick='editUser(\"" + users[user]['email'] + "\")'>\n" +
            "                    <i class=\"fa fa-edit\" style=\"font-size:24px\"></i>\n" +
            "                </button>\n" +
            "            </div>\n" +
            "            <div class=\"col-md-1\">\n" +
            "                <button type=\"button\" class=\"btn btn\" id='" + users[user]['email'] + "Button'>\n" +
            "                    <i class=\"fa fa-trash-o\" style=\"font-size:24px\"></i>\n" +
            "                </button>\n" +
            "            </div>";

        usersContainer.insertBefore(div,document.getElementById("emptyContainer"));

        var userButton = document.getElementById(users[user]['email'] + "Button");

        userButton.addEventListener("click", ()=>{
            var userName = users[user]['email'];
            console.log(userName + " has been clicked");
            //fill the invisible form to send to PHP server to make a request in json list
            var result = confirm("Are you sure to delete " + userName + " from the inventory?");
            if (result){
                document.getElementById("input_email").value = userName;
                form.submit();
            }
        })
    }
}
