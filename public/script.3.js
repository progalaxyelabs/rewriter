var httpRequest = function (url, data, headers) {
    return new Promise((resolve, reject) => {
        let req = new XMLHttpRequest();
        req.addEventListener('load', (e) => {
            if (req.status !== 200) {
                console.error(req.responseText)
                resolve({})
                return
            }

            let response
            try {
                response = JSON.parse(req.response)
            } catch (ex) {
                console.error(ex)
                response = {}
            }
            resolve(response)
        })
        req.addEventListener('error', (e) => {
            console.error(e.description)
            resolve({})
        })
        req.open('POST', url)
        for (const key in headers) { req.setRequestHeader(key, headers[key]) }
        req.setRequestHeader('Content-Type', 'application/json');
        req.send(JSON.stringify(data))
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
    let btnCreateName, btnLongTextarea, btnCreateEmail, btnCreateDate, btnGoToScreen, btnCreateOption, thirdmodal, thirdModalInstance, thirdModalOk, thirdModalInput, thirdModalInputLabel;
    let btnCreateNumberInput, optionAddButton , optionInputarray = [] ,optionInput;
    let config = [];
    let Opener = {
        EMAIL: 'email',
        PASSWORD: 'password',
        BUTTON: 'button',
        CHECKBOX: 'checkbox',
        NAME: 'name',
        LONGTEXT: 'text',
        DATE: 'date',
        GOTOSCREEN: 'link',
        OPTION: 'option',
        NUMBER: 'number'
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
        thirdModalInput = document.getElementById('select-number');
        modalInputLabel = document.getElementById('homeFormModalLabel');
        thirdModalInputLabel = document.getElementById('optionLabel');
        btnCreateNumberInput = document.getElementById('number-input');
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
        optionAddButton = document.getElementById('optionAddButton');
        optionInput = document.getElementById('optionInput');
        optionBodyinput = document.getElementById('optionModalBody1');

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
        btnCreateNumberInput.addEventListener('click', function (e) {
            modalInputLabel.innerHTML = 'Number Input Label';
            modalOpenedBy.value = Opener.NUMBER;
        })
        btnLongTextarea.addEventListener('click', function (e) {
            modalInputLabel.innerHTML = 'TextBox';
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
            label = modalSelect.value;
            destination = secondModalInput.value;
            let c = { controlType: controlType, label: label, destination: destination };
            config.push(c);
            controlBuilder.build(c);
            secondModalInstance.hide();

        })
        thirdModalOk.addEventListener('click', function (e) {
            controlType = modalOpenedBy.value;
            label = thirdModalInputLabel.value;
            let c = { controlType: controlType, label: label, list: optionInputarray };
            config.push(c);
            controlBuilder.build(c);
            thirdModalInstance.hide();

        })
        optionAddButton.addEventListener('click',function(e) {
            optionInputarray.push(optionInput.value);
            optionBodyinput.innerHTML += optionInput.value + "<br>";
        })
        saveForm.addEventListener('click', function (e) {
            httpRequest('/home/save_form', { form_id: formId, config: config })
                .then((res) => { console.log(res) })
        })
    };

    var fetchFormConfig = function () {
        config = []
        return httpRequest('/home/form_config', { form_id: formId })
            .then((res) => { config = res.config ? res.config : [] })
    }

    var controlBuilder = (function () {
        let build = function(c) {
            console.log(c)
            switch (c.controlType) {
                case Opener.NAME:
                    return form.appendChild(new SimpleTextFormControl(c).get())
                case Opener.OPTION:
                    return form.appendChild(new OptionsFormControl(c).get())
                case Opener.NUMBER:
                    return form.appendChild(new NumberFormControl(c).get())
                case Opener.GOTOSCREEN:
                    return form.appendChild(new GotoScreenFormControl(c).get())
                case Opener.BUTTON:
                    return form.appendChild(new ButtonFormControl(c).get())
                case Opener.EMAIL:
                    return form.appendChild(new EmailFormControl(c).get())
                case Opener.DATE:
                    return form.appendChild(new DateFormControl(c).get())
                case Opener.PASSWORD:
                    return form.appendChild(new PasswordFormControl(c).get())
                case Opener.CHECKBOX:
                    return form.appendChild(new TickboxFormControl(c).get())
                case Opener.LONGTEXT:
                    return form.appendChild(new ParagraphFormControl(c).get())
            }
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