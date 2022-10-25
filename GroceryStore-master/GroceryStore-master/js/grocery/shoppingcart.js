let jsonObj = JSON.parse(localStorage.getItem("cart"));
const shoppingListContainer = document.getElementById("shoppingList");

let subTotal = 0;

function getElementValueByItemName(itemName, element) {
    if (jsonObj != null)
        for (let i = 0; i < jsonObj.length; i++) {
            let obj = jsonObj[i];

            if (obj["product_name"] == itemName)
                return obj[element];
        }

    localStorage.setItem("cart", JSON.stringify(jsonObj));
}

function editElementByItemName(itemName, element, value) {
    if (jsonObj != null)
        for (let i = 0; i < jsonObj.length; i++) {
            if (jsonObj[i] == null)
                continue;

            let obj = jsonObj[i];

            if (obj["product_name"] == itemName)
                obj[element] = value;
        }

    localStorage.setItem("cart", JSON.stringify(jsonObj));
}

function removeItem(itemName) {
    let index;

    if (jsonObj != null) {
        for (let i = 0; i < jsonObj.length; i++) {
            let obj = jsonObj[i];

            if (obj["product_name"] == itemName) {
                index = i;
                break;
            }
        }
        jsonObj.splice(index, 1);
        localStorage.setItem("cart", JSON.stringify(jsonObj));
    }
}

function addProductRow(jsonObj) {
    const div = document.createElement('div');
    div.className = "product-rows justify-content-center border-top";
    div.id = jsonObj["product_name"];

    div.innerHTML = "<div class=\"col-5\">\n" +
        "            <div class=\"row d-flex align-items-center\">\n" +
        "                <div class=\"col\">\n" +
        "                    <div class=\"cat-img-wrapper\" style=\"width: 400px; height: 30vw\">\n" +
        "                        <img class=\"cat-img\" src=\"" + jsonObj["img_path"] + "\"/>\n" +
        "                    </div>\n" +
        "                </div>\n" +
        "                <div class=\"col d-flex justify-content-center align-items-center\" style=\"margin-top: 10%\">\n" +
        "                    <button onclick='removeProductRow(\"" + jsonObj["product_name"] + "\")' style='background-color: white; border: none'>\n" +
        "                        <img src=\"assets/shopping_cart/trash-icon.png\" style=\"align-items: center; height:35px;\"/>\n" +
        "                    </button>\n" +
        "                </div>\n" +
        "                <div class=\"empty-spacer\"></div>\n" +
        "            </div>\n" +
        "        </div>\n" +
        "        <div class=\"my-auto col-7\">\n" +
        "            <div class=\"row align-items-center\">\n" +
        "                <div class=\"col-4\">\n" +
        "                    <div class=\"row\"><h1 id=\"productName1\" class=\"name3\">" + jsonObj["product_name"] + "</h1></div>\n" +
        "                </div>\n" +
        "                <div class=\"col-4\">\n" +
        "                    <div class=\"row d-flex justify-content-end px-3\">\n" +
        "                        <div class=\"increment-wrapper\">\n" +
        "                            <span style=\"cursor: pointer\" onclick='decrementQuantity(\"" + jsonObj["product_name"] + "\")' class=\"minus\" id=\"minus\">-</span>\n" +
        "                            <span class=\"number\" id=\"quantity" + jsonObj["product_name"] + "\">" + jsonObj["amount"] + "</span>\n" +
        "                            <span style=\"cursor: pointer\" onclick='incrementQuantity(\"" + jsonObj["product_name"] + "\")' class=\"plus\" id=\"plus\">+</span>\n" +
        "                        </div>\n" +
        "                    </div>\n" +
        "                </div>\n" +
        "                <div class=\"col-4 price\">\n" +
        "                    <h1 class=\"name3\">$<span id=\"productPrice" + jsonObj["product_name"] + "\">" + (jsonObj["amount"] * jsonObj["price_per_unit"]).toFixed(2) + "</span></h1>\n" +
        "                </div>\n" +
        "            </div>\n" +
        "        </div>"

    shoppingListContainer.insertBefore(div, document.getElementById("purchaseWrapper"));

    subTotal += jsonObj["amount"] * jsonObj["price_per_unit"];
    updateCheckout();
}

function removeProductRow(id) {
    subTotal = Math.abs(subTotal - getElementValueByItemName(id, "amount") * getElementValueByItemName(id, "price_per_unit"));
    document.getElementById(id).remove();
    removeItem(id);
    updateCheckout();
}

function updateCheckout() {

    let amountOfItems = 0;
    if (jsonObj != null)
        for (let i = 0; i < jsonObj.length; i++) {
            let obj = jsonObj[i];

            amountOfItems += obj["amount"] * 1;
        }

    document.getElementById("amountCheckout").innerText = amountOfItems.toString();
    document.getElementById("subtotal").innerText = subTotal.toFixed(2).toString();

    const gst = (subTotal * 0.05);
    const qst = (subTotal * 0.10);
    document.getElementById("gst").innerText = gst.toFixed(2).toString();
    document.getElementById("qst").innerText = qst.toFixed(2).toString();
    document.getElementById("total").innerText = (subTotal + gst + qst).toFixed(2).toString();

    if (jsonObj != null) {
        if (jsonObj.length == 0) {
            const header = document.createElement('h1');
            header.className = "name1";
            header.innerHTML = "No items in the cart";
            shoppingListContainer.insertBefore(header, document.getElementById("purchaseWrapper"));
        }
    } else {
        const header = document.createElement('h1');
        header.className = "name1";
        header.innerHTML = "No items in the cart";
        shoppingListContainer.insertBefore(header, document.getElementById("purchaseWrapper"));
    }
}

function incrementQuantity(productName) {
    const quantityElement = document.getElementById("quantity" + productName);
    const priceElement = document.getElementById("productPrice" + productName);

    let quantity = getElementValueByItemName(productName, "amount") + 1;

    editElementByItemName(productName, "amount", quantity); // Saved the new quantity

    quantityElement.innerText = quantity.toString();
    priceElement.innerText = (quantity * getElementValueByItemName(productName, "price_per_unit")).toFixed(2).toString();
    subTotal += getElementValueByItemName(productName, "price_per_unit") * 1;
    updateCheckout();
}

function decrementQuantity(productName) {
    const quantityElement = document.getElementById("quantity" + productName);
    const priceElement = document.getElementById("productPrice" + productName);

    let quantity = getElementValueByItemName(productName, "amount");

    if (quantity == 1)
        return;
    else
        quantity--;

    editElementByItemName(productName, "amount", quantity); // Saved the new quantity

    quantityElement.innerText = quantity.toString();
    priceElement.innerText = (quantity * getElementValueByItemName(productName, "price_per_unit")).toFixed(2).toString();
    subTotal -= getElementValueByItemName(productName, "price_per_unit");
    updateCheckout();
}

if (jsonObj != null)
    for (let i = 0; i < jsonObj.length; i++) {
        let obj = jsonObj[i];

        addProductRow(obj);
    }
updateCheckout();