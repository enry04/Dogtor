import FetchUtil from "../../common/js/fetch-util.js";
import CompletedVisitManager from "./completed-visit-manager.js";

const table = document.querySelector("table");
const completedText = document.querySelector(".completed-visits-text")
await FetchUtil.postData("./php/read-completed-visits.php", {}).then((response) => {
    if (response.status == "success") {
        completedText.classList.toggle("hide", false);
        table.classList.toggle("hide", false);
        const completedVisitManager = new CompletedVisitManager(table);
        completedVisitManager.init();
        let parseData = JSON.parse(response.data);
        console.log(parseData);
        parseData.forEach(data => {
            completedVisitManager.setRowData(data["specie"], data["razza"], data["mot"], new Date(data["data"]).toLocaleDateString("en-GB"), data["ora"], data["diagnosi"], data["cura"], data["prezzo"]);
        });
    } else {
        console.log("error");
        completedText.classList.toggle("hide", true);
        table.classList.toggle("hide", true);
    }
});

const prenotationText = document.querySelector(".prenotations-text");
await FetchUtil.postData("./php/read-prenotations.php", {}).then((response) => {
    if (response.status == "success") {
        let parseData = JSON.parse(response.data);
        if (parseData["nPrenotazioni"] == "1") {
            prenotationText.textContent = "E' stata prenotata " + parseData["nPrenotazioni"] + " visita in questo mese";
        } else {
            prenotationText.textContent = "Sono state prenotate " + parseData["nPrenotazioni"] + " visite in questo mese";
        }
    } else {
        console.log(response.status);
    }
});
