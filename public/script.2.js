window.addEventListener('DOMContentLoaded', (e) => {
    let pageModuleElements = document.querySelectorAll('.screen-js-module');
    if (!pageModuleElements) {
        return;
    }

    for (let i = 0; i < pageModuleElements.length; i++) {
        let element = pageModuleElements[i];
        let moduleName = element.getAttribute('data-module');

        if (!moduleName) {
            continue;
        }

        if (!window[moduleName]) {
            continue;
        }

        let module = window[moduleName]();
        module.init();
    }
});

var HomeCreateForm = function () {
    let isInitialized = false;
    let init = function () {
        if (isInitialized) {
            return;
        }

        bindUiActions();

        isInitialized = true;
    };

    let bindUiActions = function () {
        console.log('HomeCreateForm module initialized');

        var temp = document.getElementById("modal-input");

        var ok = document.getElementById("ok");

        var modal = document.getElementById("exampleModal");

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



            if( popup.value == 'Passwordbox Name:')
            {
                document.getElementById("username").innerHTML = temp.value;
            }
            alert(popup.value);

        }
    };

    return {
        init: init
    };
};



var ThirdScreen = function () {
    let isInitialized = false;

    let init = function () {
        if(isInitialized) {
            return;
        }

        bindUiActions();
        isInitialized = true;
        console.log('ThirsScreen module initialized');
    };

    let bindUiActions = function() {

        // scripts for third screen

    };

    return {
        init: init
    };
};