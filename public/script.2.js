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

    let modalInput,modalOk,modal,modalInputLabel,btnCreateTextbox,btnCreatePassword,btnCreateCheckbox,btnCreateLink,btnCreateButton;
    let config = [];

    let init = function () {
        if (isInitialized) {
            return;
        }
        modal = document.getElementById('exampleModal');
        modalOk = document.getElementById('ok');
        modalInput = document.getElementById('modal-input');
        modalInputLabel = document.getElementById('exampleModalLabel');
        btnCreateTextbox = document.getElementById('create-textbox');
        btnCreatePassword = document.getElementById('create-password');
        btnCreateCheckbox = document.getElementById('create-checkbox');
        btnCreateLink = document.getElementById('create-link');
        btnCreateButton = document.getElementById('create-button');

        bindUiActions();

        isInitialized = true;
    };

    let bindUiActions = function () {
        console.log('HomeCreateForm module initialized');

        btnCreateTextbox.addEventListener('click', function (e) {
            modalInputLabel.innerHTML = 'TextBox:';
        })

        btnCreatePassword.addEventListener('click', function (e) {
            modalInputLabel.innerHTML = 'Passwordbox Name:';
        })

        btnCreateButton.addEventListener('click', function (e) {
            modalInputLabel.innerHTML = 'Button Name:';
        })

        btnCreateCheckbox.addEventListener('click', function (e) {
            modalInputLabel.innerHTML = 'Checkbox Name:';
        })

        btnCreateLink.addEventListener('click', function (e) {
            modalInputLabel.innerHTML = 'Link:';
        })

        modalOk.addEventListener('click',function(e) {
            config.push({controlType: 'textbox', label: 'User entered value'});
        })
    };

    return {
        init: init
    };
};



var ThirdScreen = function () {
    let isInitialized = false;

    let init = function () {
        if (isInitialized) {
            return;
        }

        bindUiActions();
        isInitialized = true;
        console.log('ThirsScreen module initialized');
    };

    let bindUiActions = function () {

        // scripts for third screen

    };

    return {
        init: init
    };
};