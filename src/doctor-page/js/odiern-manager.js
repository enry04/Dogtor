class OdiernManager {
    constructor(tableElement) {
        this.rootElement = tableElement;
        this.headerValues = ["Paziente", "Motivazione", "Descrizione", "Data", "Gravità", "Dettagli"];
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

    setRowData(species, breed, motivation, description, date, time, state, rowIndex, prenotationId) {
        let data = [species + ", " + breed, motivation, description, date + " alle " + time, state, this.getDetailsBtn(rowIndex, prenotationId)];
        let row = this.tBody.insertRow();
        row.id = rowIndex;
        for (let i = 0; i < this.headerValues.length; i++) {
            let td = document.createElement("td");
            if (i < 5) {
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
                location.href = "../details-page/details-page.php?prenotationId=" + event.target.id;
            })
        });
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

export default OdiernManager;