var form = document.getElementById("form");
var username = document.getElementById("username");
var surname1 = document.getElementById("primerApellido");
var surname2 = document.getElementById("segundoApellido");
var email = document.getElementById("email");
var password = document.getElementById("password");




function checkNombre() {
  let nameValue = username.value.trim();
  if(nameValue==="") { 
    setStatus(username, "Rellene este campo", "error");
     return false; 
    }
 
    setStatus(username, null, "success");
    return true;
  
  
};


function checkPrimerApellido() {
  let apellidoValue = surname1.value.trim();
  if(apellidoValue==="") { 
    setStatus(surname1, "Rellene este campo", "error");
     return false; 
    }

    setStatus(surname1, null, "success");
    return true;
  
  
};

function checkSegundoApellido() {
  let apellidoValue = surname2.value.trim();
  if(apellidoValue==="") { 
    setStatus(surname2, "Rellene este campo", "error");
     return false; 
    }

    setStatus(surname2, null, "success");
    return true;
  
  
};

function checkLogin() {
  let nameValue = login.value.trim();
  if(nameValue==="") { 
    setStatus(login, "Rellene este campo", "error");
     return false; 
    }
  
    setStatus(login, null, "success");
    return true;
  
  
};

function checkEmail() {
  
  let emailValue = email.value;

  if (emailValue === "") {
    setStatus(email, "Rellene este campo", "error");
    return false;
  }  

  const pattern = new RegExp(/^[A-Za-z0-9_!#$%&'*+\/=?`{|}~^.-]+@[A-Za-z0-9.-]+$/, "gm");

  if (!pattern.test(emailValue)) {
    setStatus(email, "Email invalido", "error");
    return false;
  }


  
    setStatus(email, null, "success");
    return true;
};

function checkPassword() {

  let passwordValue = password.value;
  let isValid = true;

  if (passwordValue === "") {
    setStatus(password, "Rellene este campo", "error");
    isValid = false;
    
   
  } 
  
  if (passwordValue.length < 4 || passwordValue.length > 8) {
    setStatus(password,  "Debe tener entre 4 y 8 caracteres", "error");
    isValid = false;
    
  } else {
    setStatus(password, null, "success");
    isValid = true;
    
  }

return isValid;

};


  var setStatus = (field, message, status) => {
  const successIcon = field.parentElement.querySelector(".icon-success");
  const errorIcon = field.parentElement.querySelector(".icon-error");
  const errorMessage = field.parentElement.querySelector(".error-message");

  if (status === "success") {
    if (errorIcon) {
      errorIcon.classList.add("hidden");
    }
    if (errorMessage) {
      errorMessage.innerText = "";
    }

    successIcon.classList.remove("hidden");
    field.classList.add("success");
    field.classList.remove("error-input");
  }

  if (status === "error") {
    if (successIcon) {
      successIcon.classList.add("hidden");
    }
    field.parentElement.querySelector(".error-message").innerText = message;

    errorIcon.classList.remove("hidden");
    field.classList.add("error-input");
    field.classList.remove("success");

  }
};