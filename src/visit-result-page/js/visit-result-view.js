import ResultManager from "./result-manager.js";

const prenoteId = new URLSearchParams(window.location.search).get('prenotationId');
const parentElement = document.querySelector(".form-container");
const resultManager = new ResultManager(parentElement, prenoteId);
resultManager.init();