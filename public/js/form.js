const nameEl = document.querySelector('#name');
const emailEl = document.querySelector('#email');
const yourMessageEl = document.querySelector('#message');
const form = document.querySelector('#contact');

const checkName = function() {
    let valid = false;
    const name = nameEl.value.trim();

    if(!isRequired(name)) {
        showError(nameEl, 'Le nom ne peut être vide');
    } else {
        showSuccess(nameEl);
        valid = true;
    }
    return valid; 
};

const checkEmail = function() {
    let valid = false;
    const email = emailEl.value.trim();

    if (!isRequired(email)) {
        showError(emailEl, "L'email ne peut pas être vide");
    } else if (!isEmailValid(email)) {
        showError(emailEl, "L'email est invalide")
    } else {
        showSuccess(emailEl);
        valid = true;
    }
    return valid;
};

const checkMessage = function() {
    let valid = false;
    const min = 25;
    const max = 300;
    const yourMessage = yourMessageEl.value.trim();

    if (!isRequired(yourMessage)) {
        showError(yourMessageEl, "Le message ne peut pas être vide");
    } else if (!isBetween(yourMessage.length, min, max)) {
        showError(yourMessageEl, `Le nom d'utilisateur doit être compris entre ${min} et ${max} caractères.`)
    } else {
        showSuccess(yourMessageEl);
        valid = true;
    }
    return valid;
};

const showError = function(input, message) {
    const formField = input.parentElement;
   
    formField.classList.remove('success');
    formField.classList.add('error');

    const error = formField.querySelector('small');
    error.textContent = message;
};

const showSuccess = function(input) {
    const formField = input.parentElement;

    formField.classList.remove('error');
    formField.classList.add('success');

    const error = formField.querySelector('small');
    error.textContent = "C'est okayyyy Messire !";
};


const isEmailValid = function(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};

const isRequired = value => value === '' ? false : true;

const isBetween = (length, min, max) => length < min || length > max ? false : true;

form.addEventListener('button', function (e) {
    e.preventDefault();

    let isNameValid = checkName();
    let isEmailValid = checkEmail();
    let isMessageValid = checkMessage();

    let isFormValid = isNameValid && isEmailValid && isMessageValid;
});

form.addEventListener('input', function (e) {
    switch (e.target.id) {
        case 'name':
            checkName();
            break;
        case 'email':
            checkEmail();
            break;
        case 'message':
            checkMessage();
            break;
    };
});