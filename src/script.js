// Function untuk menambahkan baris pada data
function addProductRow() {
    let numProductsInput = document.querySelector("input[name='numProducts']");
    numProductsInput.value = parseInt(numProductsInput.value) + 1;

    let table = document.querySelector("table");
    let row = table.insertRow(table.rows.length - 1);
    let cell1 = row.insertCell(0);
    let cell2 = row.insertCell(1);
    let cell3 = row.insertCell(2);
    let cell4 = row.insertCell(3);

    cell1.innerHTML = `<input type="text" name="namaProduct${numProductsInput.value}" size="20" value="">`;
    cell2.innerHTML = `<input type="text" name="hargaProduct${numProductsInput.value}" size="15" value="" onFocus="startCalc(${numProductsInput.value});" onBlur="stopCalc(${numProductsInput.value});">`;
    cell3.innerHTML = `<input type="text" name="jumlahProduct${numProductsInput.value}" size="15" value="" onFocus="startCalc(${numProductsInput.value});" onBlur="stopCalc(${numProductsInput.value});">`;
    cell4.innerHTML = `<input type="text" name="subTotal${numProductsInput.value}" size="15" value="" readonly>`;
}

function startCalc(productNumber){
    interval = setInterval(function(){
        calc(productNumber);
    }, 1);
}
function calc(productNumber){
    let one = document.inputProduct['hargaProduct' + productNumber].value;
    let two = document.inputProduct['jumlahProduct' + productNumber].value;
    document.inputProduct['subTotal' + productNumber].value = (one * 1) * (two * 1);}
function stopCalc(){
    clearInterval(interval);}