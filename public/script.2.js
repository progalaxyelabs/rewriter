var httpRequest = function (url, data, headers) {
    return new Promise((resolve, reject) => {
        var handleResponse = () => {
            try {
                if (httpRequest.readyState === XMLHttpRequest.DONE) {
                    if (httpRequest.status === 200) {
                        resolve(req.response)
                    } else {
                        reject(req.responseText)
                    }
                }
            }
            catch (e) {
                reject(e.description);
            }
        };

        let req = new XMLHttpRequest();
        req.onreadystatechange = handleResponse
        req.open('POST', url)
        for (const key in headers) {
            req.setRequestHeader(key, headers[key])
        }
        req.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        req.send((new URLSearchParams(data).toString()))
    })
}

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

    let modalInput, secondModalInput, modalOk, secondModalOk, modal, modalInputLabel, btnCreatePassword, btnCreateCheckbox, btnCreateButton, modalOpenedBy, controlType, label, modalInstance, form;
    let btnCreateName,btnLongTextarea, btnCreateEmail,btnCreateDate,btnGoToScreen,btnCreateOption,thirdmodal,thirdModalInstance,thirdModalOk,thirdModalInput,thirdModalInputLabel;
    let config = [];
    let Opener = {
        EMAIL: 'email',
        PASSWORD: 'password',
        BUTTON: 'button',
        CHECKBOX: 'checkbox',
        NAME: 'name',
        LONGTEXT: 'text',
        DATE: 'date',
        GOTOSCREEN: 'gotoscreen',
        OPTION: 'option'
    };
    let destination, modalSelect, secondmodal, secondModalInstance;
    let wrapDiv, saveForm;
    let formId;
    let init = function () {
        if (isInitialized) {
            return;
        }
        modal = document.getElementById('exampleModal');
        secondmodal = document.getElementById('exampleModal1');
        thirdmodal = document.getElementById('exampleModal2')
        modalOk = document.getElementById('ok');
        secondModalOk = document.getElementById('ok1');
        thirdModalOk = document.getElementById('ok2')
        modalInput = document.getElementById('modal-input');
        secondModalInput = document.getElementById('recipient-name');
        thirdModalInput =document.getElementById('select-number');
        modalInputLabel = document.getElementById('homeFormModalLabel');
        thirdModalInputLabel = document.getElementById('optionLabel')
        btnLongTextarea = document.getElementById('longtextarea');
        btnCreateName = document.getElementById('name');
        btnCreateDate = document.getElementById('date');
        btnCreateEmail = document.getElementById('email');
        btnGoToScreen = document.getElementById('go_to_screen');
        btnCreateOption = document.getElementById('options');
        btnCreatePassword = document.getElementById('create-password');
        btnCreateCheckbox = document.getElementById('create-checkbox');
        btnCreateButton = document.getElementById('create-button');
        modalOpenedBy = document.getElementById('opened-by');
        modalInstance = bootstrap.Modal.getOrCreateInstance(modal);
        secondModalInstance = bootstrap.Modal.getOrCreateInstance(secondmodal);
        thirdModalInstance = bootstrap.Modal.getOrCreateInstance(thirdmodal);
        form = document.getElementById('frame');
        modalSelect = document.getElementById('select');
        saveForm = document.getElementById('save-form');
        formId = document.getElementById('form-id').value;

        fetchFormConfig()
            .then(() => {
                for (c of config) {
                    controlBuilder.build(c)
                }
            })


        bindUiActions();

        isInitialized = true;
    };

    let bindUiActions = function () {
        //console.log('HomeCreateForm module initialized');

        btnGoToScreen.addEventListener('click', function (e) {
            modalInputLabel.innerHTML = 'Enter Label Name';
            modalOpenedBy.value = Opener.GOTOSCREEN;
        })
        btnCreateOption.addEventListener('click', function (e) {
            modalInputLabel.innerHTML = 'Enter Label Name';
            modalOpenedBy.value = Opener.OPTION;
        })
        btnCreateName.addEventListener('click', function (e) {
            modalInputLabel.innerHTML = 'Name:';
            modalOpenedBy.value = Opener.NAME;
        })
        btnLongTextarea.addEventListener('click', function (e) {
            modalInputLabel.innerHTML = 'Long Textarea';
            modalOpenedBy.value = Opener.LONGTEXT;
        })
        btnCreateDate.addEventListener('click', function (e) {
            modalInputLabel.innerHTML = 'Date Name:';
            modalOpenedBy.value = Opener.DATE;
        })
        btnCreateEmail.addEventListener('click', function (e) {
            modalInputLabel.innerHTML = 'Email label:';
            modalOpenedBy.value = Opener.EMAIL;
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
        modalOk.addEventListener('click', function (e) {
            controlType = modalOpenedBy.value;
            label = modalInput.value;
            let c = { controlType: controlType, label: label };
            config.push(c);
            controlBuilder.build(c);
            modalInstance.hide();
        })
        secondModalOk.addEventListener('click', function (e) {
            controlType = modalOpenedBy.value;
            label = secondModalInput.value;
            destination = modalSelect.value;
            let c = { controlType: controlType, label: label, destination: destination };
            config.push(c);
            controlBuilder.build(c);
            secondModalInstance.hide();

        })
        thirdModalOk.addEventListener('click', function (e) {
            controlType = modalOpenedBy.value;
            label = thirdModalInputLabel.value;
            destination = modalSelect.value;
            let c = { controlType: controlType, label: label, destination: destination };
            config.push(c);
            controlBuilder.build(c);
            thirdModalInstance.hide();

        })
        saveForm.addEventListener('click', function (e) {
            new httpRequest('/home/save_form',{form_id: formId, config: config})
                .then(function (response) {

                })
                .catch(function (error) {
                    console.log(error);
                })
        })
    };

    var fetchFormConfig = function () {
        return new httpRequest('/home/form_config',{form_id: formId})
            .then(function (response) {
                console.log('response from /home/form_config', response)
            })
            .catch(function (error) {
                console.log(error);
            })
     }

    var controlBuilder = (function () {
        let build = function (c) {
            switch (c.controlType) {
                case Opener.NAME:
                    return buildInputControl(c)
                case Opener.DATE:
                    return buildInputControl(c)
                case Opener.LONGTEXT:
                    return buildInputControl(c)
                case Opener.EMAIL:
                    return buildInputControl(c)
                case Opener.GOTOSCREEN:
                    return buildLinkControl(c)
                case Opener.OPTION:
                    return buildInputControl(c)
                case Opener.PASSWORD:
                    return buildInputControl(c)
                case Opener.CHECKBOX:
                    return buildInputControl(c)
                case Opener.BUTTON:
                    return buildInputControl(c)
                default:
                    return null
            }
        }
    
        let buildInputControl = function (c) {
            let input, label , option , i;
            wrapDiv = document.createElement('div');
            if (controlType == Opener.BUTTON) {
                input = document.createElement('button');
                input.innerHTML = c.label;
            }
            else if (controlType == Opener.LONGTEXT) {
                label = document.createElement('label');
                label.innerHTML = c.label;
                input = document.createElement('textarea');
                
            }
            else if (controlType == Opener.OPTION) {
                label = document.createElement('label');
                label.innerHTML = c.label;
                input = document.createElement('select');
                for(i=0;i<thirdModalInput.value;i++) {
                option = document.createElement('option');
                input.appendChild(option);
                }
            }
            else {
                label = document.createElement('label');
                label.innerHTML = c.label;
    
                input = document.createElement('input');
            }
            let inputType;
            switch (c.controlType) {
                case Opener.NAME:
                    inputType = 'text';
                    break;
                case Opener.LONGTEXT:
                    inputType = 'text';
                    break;
                case Opener.DATE:
                    inputType = 'date';
                    break;
                case Opener.EMAIL:
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
            if (controlType == Opener.BUTTON) {
                wrapDiv.appendChild(input);
            }
            else if (controlType == Opener.LONGTEXT) {
                wrapDiv.appendChild(label);
                wrapDiv.appendChild(input);
            }
            else if (controlType == Opener.OPTION) {
                wrapDiv.appendChild(label);
                wrapDiv.appendChild(input);
            }

            else {
                wrapDiv.appendChild(label);
                wrapDiv.appendChild(input);
            }
            form.appendChild(wrapDiv);
        }
    
        let buildLinkControl = function (c) {
            let input;
            wrapDiv = document.createElement('div');
            input = document.createElement('a');
            input.innerHTML = c.destination;
    
            input.href = c.label;
            wrapDiv.appendChild(input);
    
            form.appendChild(wrapDiv);
        }
    
        return { build: build }
    })()

    

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