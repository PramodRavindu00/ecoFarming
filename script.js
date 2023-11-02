let clickCounter = 0; //variable to check a form is open or not

function openForm(formId) {
  //open a popup form
 
  if (clickCounter === 0) {
    document.getElementById(formId).style.display = "block";
    document.getElementById("overlay").style.display = "block";
    clickCounter = 1;
  }
}

function closeForm(formId) {
  //closing a popup form
  const form = document.getElementById(formId);
  form.style.display = "none";
  document.getElementById("overlay").style.display = "none";
  clickCounter = 0;
}

function backToPrevious(formId) {
  //navigating to previous page

  if (formId == "newPasswordForm") {
    //checking the current form id
    closeForm(formId); //closing the current form
    openForm("email-submit"); //opening a new form
  }
  if (formId == "email-submit") {
    closeForm(formId);
    openForm("loginForm");
  }
}

function scrollFunction(elementId) {
  const element = document.getElementById(elementId);
  if (element) {
    element.scrollIntoView({
      behavior: "smooth"
    });
  }
}

function hideResults(button) {
  let tableRow = button.closest("tr");
  if (tableRow) {
    tableRow.style.display = "none";
  }
}

function formValidation() {
  let userName = document.getElementById("userName").value;
  let password = document.getElementById("password").value;
  let confirmPassword = document.getElementById("confirmPassword").value;
  let errorSpan = document.getElementById("error-message");
  let errors = [];

  if (/\s/.test(userName) || /\s/.test(password)) {
    errors.push("* Credentials can not contain spaces *");
    if (/\s/.test(userName)) {
      document.getElementById("userName").value = "";
    }
    if (/\s/.test(password)) {
      document.getElementById("password").value = "";
      document.getElementById("confirmPassword").value = "";
    }
  } else if (password.length < 6) {
    errors.push(" *     Password is too short    *");
    document.getElementById("password").value = "";
    document.getElementById("confirmPassword").value = "";
  } else if (password !== confirmPassword) {
    errors.push("*     Passwords do not match      *");
    document.getElementById("password").value = "";
    document.getElementById("confirmPassword").value = "";
  }
  if (errors.length > 0) {
    errorSpan.innerHTML = errors.join("<br>");
    return false;
  }
  return true;
}
function changePasswordValidation() {
  let currentPassword = document.getElementById("current_password").value;
  let newPassword = document.getElementById("new_password").value;
  let confirmPassword = document.getElementById("confirm_password").value;
  let errorSpan = document.getElementById("password-error");
  let errors = [];

  console.log(currentPassword);
  console.log(newPassword);
  console.log(confirmPassword);

  if (
    /\s/.test(currentPassword) ||
    /\s/.test(newPassword) ||
    /\s/.test(confirmPassword)
  ) {
    errors.push("* Passwords must not contain spaces *");
    document.getElementById("current_password").value = "";
    document.getElementById("new_password").value = "";
    document.getElementById("confirm_password").value = "";
  } else if (newPassword.length < 6) {
    errors.push(" * Password should have at least 6 characters *");
    document.getElementById("new_password").value = "";
    document.getElementById("confirm_password").value = "";
  } else if (newPassword !== confirmPassword) {
    errors.push("* Passwords do not match *");
    document.getElementById("new_password").value = "";
    document.getElementById("confirm_password").value = "";
  }
  if (errors.length > 0) {
    errorSpan.innerHTML = errors.join("<br>");
    return false;
  }
  return true;
}

