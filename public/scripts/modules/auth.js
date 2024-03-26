const spans = document.querySelectorAll('label > span'); // titres de mes champs à remplir
const inputs = document.querySelectorAll('input'); // les inputs des formulaires

const PasswordsInputs = document.querySelectorAll('.password-input'); // les inputs correspondants aux mots de passes
const passwordsImg = document.querySelectorAll('.password-input + svg'); // les images pour afficher le mot de

function goUp(index) {
  // fonction qui ajoute une classe pour que le titre soit + haut que l'input
    if (inputs[index].value !== '') {
        spans[index].classList.add('go-up');
    } else {
        spans[index].classList.remove('go-up');
    }
}

function passwordVisibility(index) {
  // fonction qui permet d'afficher le mot de passe en passant du type password au type text
    const Attribute = PasswordsInputs[index].getAttribute('type');
    passwordsImg[index].classList.toggle('password');
    if (Attribute === 'password') {
        PasswordsInputs[index].setAttribute('type', 'text');
    } else if (Attribute === 'text') {
        PasswordsInputs[index].setAttribute('type', 'password');
    }
}

inputs.forEach((input, i) => {
    input.addEventListener('input', () => {
        goUp(i);
    });
});

passwordsImg.forEach((img, i) => {
    img.addEventListener('click', () => {
        passwordVisibility(i);
    });
});

window.addEventListener('load', () => {
    inputs.forEach((input, i) => {
        if (input.value !== '') {
            spans[i].classList.add('go-up');
        }
    });
});