import FetchUtil from "../../common/js/fetch-util.js";
import ModalManager from "../../common/js/modal-manager.js";

class PrenotationsManager {
  constructor(tableElement) {
    this.rootElement = tableElement;
    this.headerValues = [
      "Nome paziente",
      "Specie",
      "Razza",
      "Proprietario",
      "Accompagnatore",
      "Motivazione",
      "Data",
      "Gravità",
      "Dettagli",
      "Conferma",
      "Annulla",
    ];
    this.tHead = this.rootElement.createTHead();
    this.tBody = this.rootElement.createTBody();
    this.prenotationId;
    this.currentRowIndex;
  }

  init() {
    this.initElements();
  }

  initElements() {
    let row = this.tHead.insertRow();
    for (let i = 0; i < this.headerValues.length; i++) {
      let th = document.createElement("th");
      th.innerHTML = this.headerValues[i];
      row.appendChild(th);
    }
  }
  setRowData(patientName, species, breed, ownerName, ownerSurname, companionName, companionSurname, motivation, date, time, state, rowIndex, prenotationId) {
    let data = [patientName, species, breed, ownerName + " " + ownerSurname, companionName + " " + companionSurname, motivation, date + " alle " + time, state, this.getDetailsBtn(prenotationId, rowIndex), this.getConfirmBtn(prenotationId, rowIndex), this.getRemoveBtn(prenotationId, rowIndex)];
    let row = this.tBody.insertRow();
    row.id = rowIndex;
    for (let i = 0; i < this.headerValues.length; i++) {
      let td = document.createElement("td");
      if (i < 8) {
        td.innerHTML = data[i];
      } else {
        td.appendChild(data[i]);
      }
      row.appendChild(td);
    }
    this.initEventListeners();
  }

  initEventListeners() {
    const detailsBtns = this.tBody.querySelectorAll(".details-btn");
    detailsBtns.forEach(detailBtn => {
      detailBtn.addEventListener("click", (event) => {
        detailBtn.disabled = true;
      })
    });
    const confirmBtns = this.tBody.querySelectorAll(".confirm-btn");
    confirmBtns.forEach(confirmBtn => {
      confirmBtn.addEventListener("click", (event) => {
        confirmBtn.disabled = true;
      });
    })
    const removeBtns = this.tBody.querySelectorAll(".remove-btn");
    removeBtns.forEach(removeBtn => {
      removeBtn.addEventListener("click", (event) => {
        this.currentRowIndex = event.target.attributes.getNamedItem('rowIndex').value;
        this.prenotationId = event.target.id;
        ModalManager.showModal("Aggiungi una nota (opzionale)");
      });
    })
  }

  checkTbody() {
    if (!this.tBody.hasChildNodes()) {
      this.rootElement.classList.toggle("hide", true);
      document.querySelector(".no-prenotation-text").classList.toggle("hide", false);
    }
  }

  static submitCancellation() {
    const prenotationData = {
      prenotationId: this.prenotationId,
      status: "da effettuare",
    }
    debugger
    FetchUtil.postData("./php/update-prenotation.php", prenotationData).then((response) => {
      if (response.status == "success") {
        let row = this.tBody.querySelector(`[id="${this.currentRowIndex}"]`);
        row.remove();
        this.checkTbody();
      } else {
        console.log(response.status);
      }
    });
  }

  getDetailsBtn(prenotationId, rowIndex) {
    let input = document.createElement("input");
    input.setAttribute("type", "button");
    input.setAttribute("value", "Dettagli");
    input.classList.toggle("details-btn", true);
    input.classList.toggle("table-btn", true);
    input.setAttribute("rowIndex", rowIndex);
    input.id = prenotationId;
    return input;
  }

  getConfirmBtn(prenotationId, rowIndex) {
    let input = document.createElement("input");
    input.setAttribute("type", "button");
    input.setAttribute("value", "Conferma");
    input.classList.toggle("confirm-btn", true);
    input.classList.toggle("table-btn", true);
    input.setAttribute("rowIndex", rowIndex);
    input.id = prenotationId;
    return input;

  }

  getRemoveBtn(prenotationId, rowIndex) {
    let input = document.createElement("input");
    input.setAttribute("type", "button");
    input.setAttribute("value", "Annulla");
    input.classList.toggle("remove-btn", true);
    input.classList.toggle("table-btn", true);
    input.setAttribute("rowIndex", rowIndex);
    input.id = prenotationId;
    return input;
  }
}

export default PrenotationsManager;
