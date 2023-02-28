class PrenotationManager {
    constructor(tableElement) {
        this.rootElement = tableElement;
        this.headerValues = ["Motivazione", "Descrizione", "Data", "Ora", "Gravità"];
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

    setRowData(motivation, description, date, time, state) {
        let data = [motivation, description, date, time, state];
        let row = this.tBody.insertRow();
        for (let i = 0; i < this.headerValues.length; i++) {
            let td = document.createElement("td");
            td.innerHTML = data[i];
            row.appendChild(td);
        }
    }
}

export default PrenotationManager;