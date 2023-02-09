import FormManager from "./form-manager.js";

const parentElement = document.querySelector(".login-container");
const formManager = new FormManager(parentElement);
formManager.init();
