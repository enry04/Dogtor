import FormManager from "./form-manager.js";

const parentElement = document.querySelector(".form-container");
const formManager = new FormManager(parentElement);
formManager.init();