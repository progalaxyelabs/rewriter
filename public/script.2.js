var HomeCreateForm = function () {
    let isInitialized = false;
    let init = function () {
        if(isInitialized) {
            return;
        }

        console.log('HomeCreateForm module initialized');
        isInitialized = true;
    }

    return {
        init: init
    };
};

window.addEventListener('DOMContentLoaded', (e) => {
    let pageModuleElements = document.querySelectorAll('.screen-js-module');
    if(!pageModuleElements) {
        return;
    }

    for(let i = 0; i < pageModuleElements.length; i++) {
        let element = pageModuleElements[i];
        let moduleName = element.getAttribute('data-module');
        
        if(!moduleName) {
            continue;
        }

        if(!window[moduleName]) {
            continue;            
        }

        let module = window[moduleName]();
        module.init();
    }
});