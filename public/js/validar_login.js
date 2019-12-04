window.onload =function(){

var regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
var form = document.getElementById('form-login');


console.log(form);

  form.onsubmit = function (event){

    event.preventDefault();

    for (element of form.elements) {

      switch (element.name) {

        // email
        case 'email':
          if (!regexEmail.test(element.value)){
            console.log('el email no es valido');
            element.classList.add('is-invalid');
            var divError = element.parentElement.querySelector('span.invalid-feedback');
            divError.innerHTML = '<a> El formato es invalido </a>'
          }
        break;
        // email
        // pass
        case 'password':
          if (element.value.trim().length == 0) {
            console.log('el password esta vacio');
            element.classList.add('is-invalid');
            var divError = element.parentElement.querySelector('span.invalid-feedback');
            divError.innerHTML = '<a> El campo esta vacio </a>'
          }
        break;
        // pass

      }
    }
  }
}
