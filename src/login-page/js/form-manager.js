import FetchUtil from "../../common/js/fetch-util.js";

class FormManager {
  constructor(parentElement) {
    this.rootElement = parentElement;
    this.elements = {};
  }

  init() {
    this.initElements();
    this.initEventListeners();
  }

  initElements() {
    this.elements = {
      email: this.rootElement.querySelector(".email-text"),
      username: this.rootElement.querySelector(".username-text"),
      password: this.rootElement.querySelector(".password-text"),
      form: this.rootElement.querySelector("form"),
    };
  }

  initEventListeners() {
    this.elements.form.addEventListener("submit", (event) => {
      event.preventDefault();
      const userData = {
        email: this.elements.email.value,
        username: this.elements.username.value,
        password: this.elements.password.value,
      };
      FetchUtil.postData("./php/login-validation.php", userData).then((response) => {
        if(response.status == "success"){
          location.href = "../main-page/main-page.php";
        }
      });
      this.resetElements();
    });
  }
  resetElements() {
    this.elements.email.value = "";
    this.elements.username.value = "";
    this.elements.password.value = "";
  }
}

export default FormManager;
