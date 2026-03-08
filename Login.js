function loginValidationCheck() {
  let loginUser = document.getElementById("loginUser");
  let loginPassword = document.getElementById("loginPassword");

  if (loginUser.value === "") {
    alert("Username cannot be blank");
    return false;
  }
  if (loginPassword.value === "") {
    alert("Password cannot be blank");
    return false;
  }
  return true;
}
