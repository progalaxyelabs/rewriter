class BootstrapFormControl {
    constructor(c) {
        this.controlDefinition = c
        this.wrapDiv = document.createElement('div')
        this.wrapDiv.className = 'col col-sm-10 col-md-8 my-3'        
    }

    createElement(tag, attributes) {
        let element = document.createElement(tag)
        return Object.assign(element, attributes)
    }

    getLabelElement() {
        return this.createElement('label', {
            innerHTML: this.controlDefinition.label
        })
    }

    get() { return this.wrapDiv }
}

class BaseInputFormControl extends BootstrapFormControl {
    constructor(c) {
        super(c)
        this.label = this.getLabelElement()
        this.input = this.createElement('input', {
            type: 'text', 
            name: this.controlDefinition.name,
            className: 'form-control'
        })
        this.wrapDiv.appendChild(label)
        this.wrapDiv.appendChild(input)
    }
}

class SimpleTextFormControl extends BaseInputFormControl {
    constructor(c) {
        super(c)        
    }
}

class NumberFormControl extends BaseInputFormControl {
    constructor(c) {
        super(c)  
        this.input.type = 'number'      
    }
}

class EmailFormControl extends BaseInputFormControl {
    constructor(c) {
        super(c)  
        this.input.type = 'email'      
    }
}

class DateFormControl extends BaseInputFormControl {
    constructor(c) {
        super(c)  
        this.input.type = 'date'      
    }
}

class PasswordFormControl extends BaseInputFormControl {
    constructor(c) {
        super(c)  
        this.input.type = 'password'      
    }
}

class TickboxFormControl extends BootstrapFormControl {

}

class ParagraphFormControl extends BootstrapFormControl {

}


class GotoScreenFormControl extends BootstrapFormControl {

}

class OptionsFormControl extends BootstrapFormControl {
    constructor(c) {
        super(c)
        let label = this.getLabelElement()
        let select = this.createElement('select', {
            type: 'text', 
            name: this.controlDefinition.name,
            className: 'form-select'
        })
        
        for(let item in this.controlDefinition.list) {
            let option = this.createElement('option', {
                label: item.label,
                value= item.value
            })
            select.appendChild(option)
        }
        
        this.wrapDiv.appendChild(label)
        this.wrapDiv.appendChild(select)
    }
}

class MultipleChoiceFormControl extends BootstrapFormControl {

}

class ButtonFormControl extends BootstrapFormControl {

}

