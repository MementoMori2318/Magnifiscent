function incrementQty(productid, productstock) {
    let countEl = document.getElementById("count-el-" + productid);
    let count = parseInt(countEl.value);
    if (count < productstock) { // Check if count is less than product stock
        countEl.value = count + 1;
    }
}

function decrementQty(productid, productstock) {
    let countEl = document.getElementById("count-el-" + productid);
    let count = parseInt(countEl.value);
    if (count > 1) { // Check if count is greater than 1
        countEl.value = count - 1;
    }
}