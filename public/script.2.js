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

    let modalInput, modalOk, modal, modalInputLabel, btnCreateTextbox, btnCreatePassword, btnCreateCheckbox, btnCreateLink, btnCreateButton, modalOpenedBy, controlType, label,modalInstance,form;
    let config = [];
    let Opener = {
        TEXTBOX: 'textBox',
        PASSWORD: 'password',
        BUTTON: 'button',
        CHECKBOX: 'checkbox',
        LINK: 'link'
    };

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
        modalOpenedBy = document.getElementById('opened-by');
        modalInstance = bootstrap.Modal.getOrCreateInstance(modal);
        form = document.getElementById('frame');

        bindUiActions();

        isInitialized = true;
    };

    let bindUiActions = function () {
        //console.log('HomeCreateForm module initialized');

        btnCreateTextbox.addEventListener('click', function (e) {
            modalInputLabel.innerHTML = 'TextBox:';
            modalOpenedBy.value = Opener.TEXTBOX;
        })
        btnCreatePassword.addEventListener('click', function (e) {
            modalInputLabel.innerHTML = 'Passwordbox Name:';
            modalOpenedBy.value = Opener.PASSWORD;
        })
        btnCreateButton.addEventListener('click', function (e) {
            modalInputLabel.innerHTML = 'Button Name:';
            modalOpenedBy.value = Opener.BUTTON;
        })
        btnCreateCheckbox.addEventListener('click', function (e) {
            modalInputLabel.innerHTML = 'Checkbox Name:';
            modalOpenedBy.value = Opener.CHECKBOX;
        })
        btnCreateLink.addEventListener('click', function (e) {
            modalInputLabel.innerHTML = 'Link:';
            modalOpenedBy.value = Opener.LINK;
        })
        modalOk.addEventListener('click', function (e) {
            controlType = modalOpenedBy.value;
            label = modalInput.value;
            config.push({ controlType: controlType, label: label });
            console.log('HomeCreateForm module, on modalOk, config is');
            console.log(config);
            updateForm();
            modalInstance.hide();
        })
    };

    function updateForm() {
        //for (let i = 0; i < config.length; i++) {
            let i = (config.length)-1;
            let c = config[i];
            let input,label;
            let wrapDiv = document.createElement('div');
            if(controlType == Opener.BUTTON)
            {   input = document.createElement('button');
                input.innerHTML = c.label;}
            else{
                label = document.createElement('label');
                label.innerHTML = c.label;
                
                input = document.createElement('input'); 
            }
            
            let inputType;
            switch (c.controlType) {
                case Opener.TEXTBOX:
                    inputType = 'text';
                    break;
                case Opener.PASSWORD:
                    inputType = 'password';
                    break;
                case Opener.BUTTON:
                    inputType = 'button';
                    break;
                case Opener.CHECKBOX:
                    inputType = 'checkbox';
                    break;
                default:
                    break;
            }
            input.type = inputType;
            if(controlType == Opener.BUTTON){
                wrapDiv.appendChild(input);
            }
            else{
            wrapDiv.appendChild(label);  
            wrapDiv.appendChild(input);
            }

            form.appendChild(wrapDiv);
        //}
    }

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
        //console.log('ThirsScreen module initialized');
    };

    let bindUiActions = function () {

        // scripts for third screen

    };

    return {
        init: init
    };
};