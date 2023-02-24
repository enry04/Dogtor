class OwnerManager {
    constructor(tableElement) {
        this.rootElement = tableElement;
        this.headerValues = ["Nome", "Cognome", "Codice fiscale", "Nome utente", "Email", "Numero di telefono", "Indirizzo", "CAP"];
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

    setRowData(name, surname, taxCode, userName, email, telephoneNumber, cap, street, houseNumber) {
        let data = [name, surname, taxCode, userName, email, telephoneNumber,street + " " + houseNumber, cap];
        let row = this.tBody.insertRow();
        for (let i = 0; i < this.headerValues.length; i++) {
            let td = document.createElement("td");
            td.innerHTML = data[i];
            row.appendChild(td);
        }
    }
}

export default OwnerManager;