function resizeInput() {
    let lenght = this.value.length;
    if(lenght <= 21){
        return;
    }
    let x = 1;
    if(lenght > 15){
        x = (lenght / Math.pow(lenght, 1.03));
    }
    this.style.width = (lenght * x) + "ch";
}
var input = document.querySelectorAll('.dynamic-input'); // get the input element
input.forEach(element => {
    element.addEventListener('input', resizeInput);
    resizeInput.call(element); // immediately call the function
});