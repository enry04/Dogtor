import FetchUtil from "../../common/js/fetch-util,js";


class FormManager {
  constructor(parentElement) {
    this.rootElement = parentElement;
    this.elements = {};

  }

  init(){
    this.initElements();
    this.initEventListeners();
  }

  initElements(){
    this.elements = {
        email: this.rootElement.querySelector(".email-text"),
        username: this.rootElement.querySelector(".username-text"),
        password: this.rootElement.querySelector(".password-text"),
        form: this.rootElement.querySelector("submit-btn"),
    }
  }

  initEventListeners(){
    this.elements.form.addEventListener("submit",(event)=>{
        event.preventDefault();
    });
  }
}

export default FormManager;
