import PrenotationsManager from "../../admin-page/js/prenotations-manager.js";

class ModalManager {
    static showModal(title) {
        this.rootElement = document.querySelector(".modal-overlay");
        this.closeModalBtn = this.rootElement.querySelector(".close-modal");
        this.modalContainer = this.rootElement.querySelector(".modal-container");
        this.modalContent = this.rootElement.querySelector(".modal-content");
        this.modalContent.innerHTML = title;
        this.rootElement.classList.toggle("modal-hide", false);
        this.rootElement.classList.toggle("modal-show", true);
        const elements = {
            textArea: this.rootElement.querySelector("textarea"),
            form: this.rootElement.querySelector("form"),
        }
        elements.form.addEventListener("submit", (event) => {
            event.preventDefault();
            this.rootElement.classList.toggle("modal-hide", true);
            this.rootElement.classList.toggle("modal-show", false);
            PrenotationsManager.submitCancellation();
            if (elements.textArea.value != "") {
                elements.form.reset();
            }
        });
        this.closeModalBtn.addEventListener("click", () => {
            this.rootElement.classList.toggle("modal-hide", true);
            this.rootElement.classList.toggle("modal-show", false);
        });
    }
}

export default ModalManager;