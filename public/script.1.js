var temp = document.getElementById("modal-input");

var ok = document.getElementById("ok");

var display = document.getElementById("display");

var popup = document.getElementById("exampleModalLabel");

document.getElementById("create-password").onclick = function() {
    popup.innerHTML='Passwordbox Name:';
}

document.getElementById("create-button").onclick = function() {
    popup.innerHTML='Button Name:';
}

document.getElementById("create-checkbox").onclick = function() {
    popup.innerHTML='Checkbox Name:';
}

document.getElementById("create-link").onclick = function() {
    popup.innerHTML='Link:';
}


ok.onclick = function(){

    alert(temp.value);    

}