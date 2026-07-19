function check() {
    var inputValue = parseInt(document.getElementById("check").value);
    console.log(inputValue);
    var resultElement = document.getElementById("result");
    if (inputValue % 2 == 0) {
        resultElement.textContent += (inputValue + " là số chẵn");
    }
    else resultElement.textContent += (inputValue + " là số lẻ");
}
