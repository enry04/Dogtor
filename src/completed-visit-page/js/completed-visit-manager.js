class CompletedVisitManager {
    constructor(tableElement) {
        this.rootElement = tableElement;
        this.headerValues = ["Paziente", "Motivazione", "Data", "Diagnosi", "Cura", "Prezzo"];
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

    setRowData(species, breed, motivation, date, time, diagnosis, cure, price) {
        let data = [species + ", " + breed, motivation, date + " alle " + time, diagnosis, cure, price + "Є"];
        let row = this.tBody.insertRow();
        for (let i = 0; i < this.headerValues.length; i++) {
            let td = document.createElement("td");
            td.innerHTML = data[i];
            row.appendChild(td);
        }
    }
}

export default CompletedVisitManager;