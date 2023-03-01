class VisitsManager {
    constructor(parentElement) {
        this.rootElement = parentElement;
        this.headerValues = ["Paziente", "Motivazione", "Descrizione", "Data", "Gravità", "Dettagli", "Risultato"];
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

    setRowData(species, breed, motivation, description, date, time, state) {
        let data = [species + ", " + breed, motivation, description, date + " alle " + time, state, this.getDetailsBtn(), this.getDiagnosisBtn()];
        let row = this.tBody.insertRow();
        for (let i = 0; i < this.headerValues.length; i++) {
            let td = document.createElement("td");
            if (i < 8) {
                td.innerHTML = data[i];
            } else {
                td.appendChild(data[i]);
            }
            row.appendChild(td);
        }
        this.initEventListeners()
    }

    getDetailsBtn(){
        return "dettagli";
    }

    getDiagnosisBtn(){
        return "Invia risultato";
    }
}

export default VisitsManager;