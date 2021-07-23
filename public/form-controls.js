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
        this.wrapDiv.appendChild(this.label)
        this.wrapDiv.appendChild(this.input)
    }
}

class SimpleTextFormControl extends BaseInputFormControl {
    constructor(c) {
        super(c)
        this.input.type = 'text'        
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
    constructor(c) {
        super(c)
        let label = this.getLabelElement()
        let input = this.createElement('input',{
            type: 'checkbox'
        })
    
        this.wrapDiv.appendChild(input)
        this.wrapDiv.appendChild(label)
    }
}

class ParagraphFormControl extends BootstrapFormControl {
    constructor(c) {
        super(c)
        let label = this.getLabelElement()
        let input = this.createElement('textarea',{
            className: 'form-control'
        })
        
        this.wrapDiv.appendChild(label)
        this.wrapDiv.appendChild(input)
    }
}


class GotoScreenFormControl extends BootstrapFormControl {
    constructor(c) {
        super(c)
        let input = this.createElement('a',{
            href: this.controlDefinition.destination ,
            innerHTML: this.controlDefinition.label
        })

        this.wrapDiv.appendChild(input)
    }

}

class OptionsFormControl extends BootstrapFormControl {
    constructor(c) {
        super(c)
        let label = this.getLabelElement()
        let select = this.createElement('select', {
            className: 'form-select'
        })
        
        for(let item in this.controlDefinition.list) {
            let option = this.createElement('option', {
                innerHTML: this.controlDefinition.list[item]
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
    constructor(c) {
        super(c)
        let input = this.createElement('button',{
            innerHTML: this.controlDefinition.label ,
            className: 'btn btn-primary'
        })

        this.wrapDiv.appendChild(input)
    }
}

