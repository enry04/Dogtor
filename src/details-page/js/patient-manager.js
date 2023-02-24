class PatientManager {
    constructor(tableElement) {
        this.rootElement = tableElement;
        this.headerValues = ["Nome", "Data di nascita", "Luogo di nascita", "Residenza", "Specie", "Razza", "Accompagnatore"];
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

    setRowData(name, bornDate, bornPlace, residence, species, breed, companionName, companionSurname) {
        let data = [name, bornDate, bornPlace, residence, species, breed, companionName + " " + companionSurname];
        let row = this.tBody.insertRow();
        for (let i = 0; i < this.headerValues.length; i++) {
            let td = document.createElement("td");
            td.innerHTML = data[i];
            row.appendChild(td);
        }
    }
}

export default PatientManager;