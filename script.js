function increaseQuantity(productid) {
    var inputEl = document.getElementById("count-el-" + productid);
    inputEl.value = parseInt(inputEl.value) + 1;
}

function decreaseQuantity(productid) {
    var inputEl = document.getElementById("count-el-" + productid);
    if (parseInt(inputEl.value) > 1) {
        inputEl.value = parseInt(inputEl.value) - 1;
    }
}