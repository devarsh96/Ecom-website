function registrationValidationCheck() {
  let regUsername = document.getElementById("regUsername");
  let regEmail = document.getElementById("regEmail");
  let regPassword = document.getElementById("regPassword");
  let regPhone = document.getElementById("regPhone");

  if (regUsername.value === "") {
    alert("Username cannot be blank");
    return false;
  }
  if (regEmail.value === "") {
    alert("Email cannot be blank");
    return false;
  }
  if (regPassword.value === "") {
    alert("Password cannot be blank");
    return false;
  }

  if (regPhone.value === "") {
    alert("Phone number cannot be blank");
    return false;
  }

  if (regPhone.value.length !== 10) {
    alert("Phone number must be exactly 10 digits long.");
    return false;
  }

  if (regPassword.value.length < 8) {
    alert("Password must contain be minimum eight characters");
    return false;
  }

  return true;
}

function onlyNumber(evt) {
  var charCode = evt.which ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
  }
  return true;
}
