class VisitsManager {
    constructor(parentElement) {
        this.rootElement = parentElement;
        this.headerValues = ["Paziente", "Motivazione", "Descrizione", "Data", "Gravità", "Stato", "Dettagli"];
        this.tHead = this.rootElement.createTHead();
        this.tBody = this.rootElement.createTBody();
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

    setRowData(species, breed, motivation, description, date, time, isSerious, state, rowIndex, prenotationId) {
        let data = [species + ", " + breed, motivation, description, date + " alle " + time, isSerious, state, this.getDetailsBtn(rowIndex, prenotationId)];
        let row = this.tBody.insertRow();
        for (let i = 0; i < this.headerValues.length; i++) {
            let td = document.createElement("td");
            if (i < 6) {
                td.innerHTML = data[i];
            } else {
                td.appendChild(data[i]);
            }
            row.appendChild(td);
        }
        this.initEventListeners();
    }

    initEventListeners() {

    }

    getDetailsBtn(rowIndex, prenotationId) {
        let input = document.createElement("input");
        input.setAttribute("type", "button");
        input.setAttribute("value", "Dettagli");
        input.classList.toggle("details-btn", true);
        input.classList.toggle("table-btn", true);
        input.setAttribute("rowIndex", rowIndex);
        input.id = prenotationId;
        return input;
    }
}

export default VisitsManager;