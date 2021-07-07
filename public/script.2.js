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

    let modalInput ,secondModalInput ,modalOk ,secondModalOk , modal, modalInputLabel, btnCreateTextbox, btnCreatePassword, btnCreateCheckbox, btnCreateLink, btnCreateButton, modalOpenedBy, controlType, label,modalInstance,form;
    let config = [];
    let Opener = {
        TEXTBOX: 'textBox',
        PASSWORD: 'password',
        BUTTON: 'button',
        CHECKBOX: 'checkbox',
        LINK: 'link'
    };
    let destination,modalSelect,secondmodal,secondModalInstance;
    let wrapDiv;
    let init = function () {
        if (isInitialized) {
            return;
        }
        modal = document.getElementById('exampleModal');
        secondmodal = document.getElementById('exampleModal1');
        modalOk = document.getElementById('ok');
        secondModalOk = document.getElementById('ok1');
        modalInput = document.getElementById('modal-input');
        secondModalInput = document.getElementById('recipient-name');
        modalInputLabel = document.getElementById('exampleModalLabel');
        btnCreateTextbox = document.getElementById('create-textbox');
        btnCreatePassword = document.getElementById('create-password');
        btnCreateCheckbox = document.getElementById('create-checkbox');
        btnCreateLink = document.getElementById('create-link');
        btnCreateButton = document.getElementById('create-button');
        modalOpenedBy = document.getElementById('opened-by');
        modalInstance = bootstrap.Modal.getOrCreateInstance(modal);
        secondModalInstance = bootstrap.Modal.getOrCreateInstance(secondmodal);
        form = document.getElementById('frame');
        modalSelect = document.getElementById('select');

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
            let c={ controlType: controlType, label: label };
            config.push(c);
            console.log('HomeCreateForm module, on modalOk, config is');
            console.log(config);
            addControlToForm(c);
            modalInstance.hide();
        })
        secondModalOk.addEventListener('click',function(e) {
            controlType =modalOpenedBy.value;
            label = secondModalInput.value;
            destination =modalSelect.value;
            let c={ controlType: controlType, label: label, destination: destination };
            config.push(c);
            console.log('it is for link');
            console.log(config);
            addLink(c);
            secondModalInstance.hide();

        })
    };

    function addControlToForm(c) {
        
            let input,label;
            wrapDiv = document.createElement('div');
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
    }
    function addLink(c) {
        let input;
        wrapDiv = document.createElement('div');
        input = document.createElement('a');
        input.innerHTML = c.destination;

        input.href = c.label;
        wrapDiv.appendChild(input);

        form.appendChild(wrapDiv);
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