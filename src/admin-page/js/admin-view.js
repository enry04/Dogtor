import FetchUtil from "../../common/js/fetch-util.js";
import PrenotationsManager from "./prenotations-manager.js";
import CookieManager from "../../common/js/cookie-manager.js";

const noPrenotationText = document.querySelector(".no-prenotation-text");
const prenotationsTable = document.querySelector(".prenotation-table");
let prenotationData = 

FetchUtil.postData("./php/read-prenotations.php", {}).then((response) => {
    if (response.status == "success") {
        noPrenotationText.classList.toggle("hide", true);
        prenotationsTable.classList.toggle("hide", false);
        const prenotationsManager = new PrenotationsManager(prenotationsTable);
        prenotationsManager.init();
        let parseData = JSON.parse(response.data);
        console.log(parseData);
        parseData.forEach(prenotationData => {
            //prenotationsManager.setRowData();
        }); 
    } else {
        noPrenotationText.classList.toggle("hide", false);
        prenotationsTable.classList.toggle("hide", true);
    }
});