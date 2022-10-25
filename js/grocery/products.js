/*
 * More description interactions
 */
const productName = document.getElementById("productName").innerText,
    moreDescButton = document.getElementById("moreDescButton"),
    moreDesc = document.getElementById("moreDesc");

moreDesc.style.visibility = "hidden";

function toggleDisplayMoreDesc() {
    if (moreDesc.style.visibility === "hidden") {
        moreDesc.style.visibility = "visible";
    } else {
        moreDesc.style.visibility = "hidden";
    }
}

/*
 * Quantity interactions
 */
const plus = document.querySelector(".plus"),
    minus = document.querySelector(".minus"),
    num = document.querySelector(".number"),
    displayedPrice = document.getElementById("displayedPrice"),
    pricePerUnit = document.getElementById("productPrice").innerText;

let calculatedPrice = pricePerUnit;
let quantity = 1;

if (localStorage.length !== 0) {
    quantity = localStorage.getItem(productName + ".quantity");
    if (quantity == null)
        quantity = 1;

    calculatedPrice = localStorage.getItem(productName + ".calculatedPrice");
    if (calculatedPrice == null)
        calculatedPrice = pricePerUnit;
}

displayedPrice.innerHTML = "$" + calculatedPrice;

num.innerHTML = quantity;

plus.addEventListener("click", () => {
    quantity++;
    num.innerHTML = quantity;
    changeDisplayedPrice(quantity);
});

minus.addEventListener("click", () => {
    if (quantity > 1) {
        quantity--;
        num.innerHTML = quantity;
        changeDisplayedPrice(quantity);
    }
});

function changeDisplayedPrice(quantity) {
    calculatedPrice = parseFloat(pricePerUnit * quantity).toFixed(2);
    displayedPrice.innerHTML = "$" + calculatedPrice;
    localStorage.setItem(productName + ".quantity", quantity);
    localStorage.setItem(productName + ".calculatedPrice", calculatedPrice);
}

/*
 * Add to cart interactions
 */
const imgPath = document.getElementById("imgSample").getAttribute("src");

function addToCart() {
    let jsonObject = JSON.parse(localStorage.getItem("cart"));

    let item_already_in_cart = false;
    if (jsonObject != null)
        for (let i = 0; i < jsonObject.length; i++) {
            let obj = jsonObject[i];

            if (obj["product_name"] == productName) {
                obj["amount"] += quantity;
                item_already_in_cart = true;
            }
        }


    if (!item_already_in_cart) {
        let item = {
            product_name: productName,
            img_path: imgPath,
            amount: quantity,
            price_per_unit: pricePerUnit
        }
        if (jsonObject == null)
            jsonObject = [item];
        else
            jsonObject.push(item);
    }

    localStorage.setItem("cart", JSON.stringify(jsonObject));
}
