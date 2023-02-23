import PrenotationsManager from "../../admin-page/js/prenotations-manager.js";
import FetchUtil from "./fetch-util.js";

class ModalManager {
  static showModal(title, prenotationId) {
    this.rootElement = document.querySelector(".modal-overlay");
    this.modalContainer = this.rootElement.querySelector(".modal-container");
    this.modalContent = this.rootElement.querySelector(".modal-content");
    this.modalContent.innerHTML = title;
    this.rootElement.classList.toggle("modal-hide", false);
    this.rootElement.classList.toggle("modal-show", true);
    const elements = {
      textArea: this.rootElement.querySelector("textarea"),
      form: this.rootElement.querySelector("form"),
    };
    elements.form.addEventListener("submit", (event) => {
      event.preventDefault();
      this.rootElement.classList.toggle("modal-hide", true);
      this.rootElement.classList.toggle("modal-show", false);
      if (elements.textArea.value != "") {
        const noteData = {
          prenotationId: prenotationId,
          note: elements.textArea.value,
        };
        FetchUtil.postData("./php/update-note.php", noteData).then((response) => {
            if(response.status == "error"){
                console.log(response.data);
            }
        });
        elements.form.reset();
      }
    });
  }
}

export default ModalManager;
