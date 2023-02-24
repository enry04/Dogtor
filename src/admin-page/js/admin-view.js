import FetchUtil from "../../common/js/fetch-util.js";
import PrenotationsManager from "./prenotations-manager.js";

const noPrenotationText = document.querySelector(".no-prenotation-text");
const prenotationsTable = document.querySelector(".prenotations-table");

FetchUtil.postData("./php/read-prenotations.php", {}).then((response) => {
    if (response.status == "success") {
        noPrenotationText.classList.toggle("hide", true);
        prenotationsTable.classList.toggle("hide", false);
        const prenotationsManager = new PrenotationsManager(prenotationsTable);
        prenotationsManager.init();
        let parseData = JSON.parse(response.data);
        console.log(parseData);
        let rowIndex = 0;
        parseData.forEach(prenotationData => {
            prenotationsManager.setRowData(prenotationData['nomePaziente'], prenotationData['specie'], prenotationData['razza'], prenotationData['nomeUtente'], prenotationData['cognome'], prenotationData['nomeAccompagnatore'], prenotationData['cognomeAccompagnatore'], prenotationData['motivazione'], new Date(prenotationData['data']).toLocaleDateString("en-GB"), prenotationData['ora'], prenotationData['gravita'], rowIndex, prenotationData['idPrenotazione']);
            rowIndex++;
        });
    } else {
        noPrenotationText.classList.toggle("hide", false);
        prenotationsTable.classList.toggle("hide", true);
    }
});