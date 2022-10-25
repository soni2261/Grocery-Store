const urlParams = new URLSearchParams(window.location.search);
const message = urlParams.get('msg');
const productMessage = urlParams.get('id');

if (message != null) {
    console.log(message);
    const input = document.createElement("h5");
    if (message === 'Successfully Added' || message === 'Successfully Modified') {
        input.style.color = "green";
    } else {
        input.style.color = "red";
    }
    input.style.textAlign = "center";
    input.innerHTML = message;
    let editBlock = document.getElementById("editBlock");
    editBlock.insertBefore(input, null);
}


let productName = document.getElementById("productName"),
    productImg = document.getElementById("productImage"),
    description = document.getElementById("description"),
    quantity = document.getElementById("quantity"),
    aisle = document.getElementById("aisle"),
    price = document.getElementById("price"),
    save_changes = document.getElementById("save_changes");

function fillForm(products) {
    for (const product in products) {
        if (products[product]['id'] == productMessage) {
            console.log(productMessage);
            productImg.src = "../" + products[product]['img_src'];
            productName.value = products[product]['product_name'];
            description.value = products[product]['description'];
            quantity.value = products[product]['quantity'];
            aisle.value = products[product]['aisle'];
            price.value = products[product]['product_price'];

            document.getElementById("image").src = productImg.src;
        }
    }
}

if (productMessage != null) {
    fetch('../database/inventory.json').then(response => {
        return response.json();
    }).then(products => {
        fillForm(products);
    }).catch(err => {
        console.log("Could not fetch data from products list")
    });
}

//create a form with invisible inputs then onclick of save changes button, submit the form to php
function isValid() {
    if (productName.value == '') {
        alert("Please add a product name");
        return false;
    } else if (description.value == '') {
        alert("Please add a description");
        return false;
    } else if (quantity.value == '') {
        alert("Please add a quantity");
        return false;
    } else if (aisle.value == '') {
        alert("Please add an aisle");
        return false;
    } else if (price.value == '') {
        alert("Please add a price");
        return false;
    }
}