import FetchUtil from "../../common/js/fetch-util.js";
import PrenotationManager from "./prenotation-manager.js";
import OwnerManager from "./owner-manager.js";
import PatientManager from "./patient-manager.js";

const prenotationId = new URLSearchParams(window.location.search).get('prenotationId');
const prenotationTable = document.querySelector(".prenotation-table");
const prenotationData = {
    prenotationId: prenotationId,
}
let patientId;
await FetchUtil.postData("./php/read-prenotation.php", prenotationData).then((response) => {
    if (response.status == "success") {
        const prenotationManager = new PrenotationManager(prenotationTable);
        prenotationManager.init();
        let parseData = JSON.parse(response.data);
        patientId = parseData["idAnimale"];
        prenotationManager.setRowData(parseData["motivazione"], parseData["descrizione"], new Date(parseData["data"]).toLocaleDateString("en-GB"), parseData["ora"], parseData["gravita"]);
    } else {
        console.log(response.status);
    }
});
const patientTable = document.querySelector(".patient-table");
const patientData = {
    patientId: patientId,
};
let ownerId;
await FetchUtil.postData("./php/read-patient.php", patientData).then((response) => {
    if (response.status == "success") {
        const patientManager = new PatientManager(patientTable);
        patientManager.init();
        let parseData = JSON.parse(response.data);
        ownerId = parseData['idProprietario'];
        patientManager.setRowData(parseData["nome"], parseData["dataNascita"], parseData["luogoNascita"], parseData["luogoResidenza"], parseData["specie"], parseData["razza"], parseData["nomeAccompagnatore"], parseData["cognomeAccompagnatore"]);
    } else {
        console.log(response.status);
    }
});


const ownerTable = document.querySelector(".owner-table");
const ownerData = {
    ownerId: ownerId,
};
await FetchUtil.postData("./php/read-owner.php", ownerData).then((response) => {
    if (response.status == "success") {
        const ownerManager = new OwnerManager(ownerTable);
        ownerManager.init();
        let parseData = JSON.parse(response.data);
        ownerManager.setRowData(parseData["nome"], parseData["cognome"], parseData["codiceFiscale"], parseData["nomeUtente"], parseData["email"], parseData["numeroTelefonoPrincipale"], parseData["CAP"], parseData["via"], parseData["numeroCivico"]);
    } else {
        console.log(response.status);
    }
});