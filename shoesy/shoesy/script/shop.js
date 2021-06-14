function checkoutCart() {
    if (confirm("Are you sure you want to checkout?")) {
        window.alert("Thank You For The Purchase!");
        document.getElementById("submit_checkout").click();
    }
}

// var price = document.getElementById(".price").value;
// var subtotal;
// var total;
// subtotal += price;
// document.getElementById(".subtotal").value = subtotal;
// var delivery = document.getElementById(".delivery").value;
// if(delivery == westMalaysia)
//     deliveryFee = 30;
//     else(delivery == eastMalaysia)
//     deliveryFee = 40;
// total = subtotal + deliveryFee;
// document.getElementById(".total").value = total;

function remove(itemid, itemsize) {
    if (confirm("Are you sure to remove this item?")) {
        location.href = 'shop.php?remove=1&itemid=' + itemid + "&itemsize=" + itemsize;
    }
}

function increment(itemid, itemsize, incrementButton) {
    let quantity = incrementButton.previousElementSibling;
    let tempval = quantity.value;
    tempval++;
    if (tempval == 100) {
        return;
    } else {
        location.href = "shop.php?increment=1&itemid=" + itemid + "&newqty=" + tempval + "&itemsize=" + itemsize;
    }
}
function decrement(itemid, itemsize, decrementButton) {
    let quantity = decrementButton.nextElementSibling;
    let tempval = quantity.value;
    tempval--;
    if (tempval == 0) {
        return;
    } else {
        location.href = "shop.php?decrement=1&itemid=" + itemid + "&newqty=" + tempval + "&itemsize=" + itemsize;
    }
}

function calculateTotalPrice() {
    let priceList = document.querySelectorAll(".unitprice");
    let subtotal = 0.00;
    let totalprice = 0.00;

    priceList.forEach(function (price) {
        subtotal += parseFloat(price.innerHTML);
        console.log(subtotal);
    });

    //stop calculating if none is selected and disable checkout button
    if (subtotal <= 0) {
        document.querySelector(".subtotal").value = "";
        document.querySelector('.totalprice').value = "";
        document.getElementById('checkout').disabled = true;
        return;
    }
    else {
        if (subtotal < 400) {
            totalprice = subtotal + 35.00;
            document.querySelector(".deliveryfee").value = 35.00.toFixed(2);
        }
        else {
            totalprice = subtotal;
            document.querySelector(".deliveryfee").value = 0.00.toFixed(2);
        }
        document.querySelector(".subtotal").value = subtotal.toFixed(2);
        document.querySelector('.totalprice').value = totalprice.toFixed(2);
        document.getElementById('checkout').disabled = false;
    }
}

function showOrderDetails(orderId) {
    window.location.href = "orderDetails.php?orderid=" + orderId;
}