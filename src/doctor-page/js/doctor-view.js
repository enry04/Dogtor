import FetchUtil from "../../common/js/fetch-util.js";
import FilterManager from "./filter-manager.js";
import FutureManager from "./future-manager.js";
import OdiernManager from "./odiern-manager.js";
import PastManager from "./past-manager.js";

/* const parentElement = document.querySelector("main");
const filterManager = new FilterManager(parentElement);
filterManager.init(); */

const odiernTable = document.querySelector(".odiern-table");
const noOdiernText = document.querySelector(".no-odiern-text");
await FetchUtil.postData("./php/read-odiern-visits.php", {}).then((response) => {
    if (response.status == "success") {
        noOdiernText.classList.toggle("hide", true);
        odiernTable.classList.toggle("hide", false);
        const odiernManager = new OdiernManager(odiernTable);
        odiernManager.init();
        let parseData = JSON.parse(response.data);
        let rowIndex = 0;
        parseData.forEach(data => {
            odiernManager.setRowData(data["specie"], data["razza"], data["motivazione"], data["descrizione"], new Date(data["data"]).toLocaleDateString("en-GB"), data["ora"], data["gravita"], rowIndex, data["idPrenotazione"])
            rowIndex++;
        });
    } else {
        noOdiernText.classList.toggle("hide", false);
        odiernTable.classList.toggle("hide", true);
    }
});

const pastTable = document.querySelector(".past-table");
const noPastText = document.querySelector(".no-past-text");
await FetchUtil.postData("./php/read-past-visits.php", {}).then((response) => {
    if (response.status == "success") {
        noPastText.classList.toggle("hide", true);
        pastTable.classList.toggle("hide", false);
        const pastManager = new PastManager(pastTable);
        pastManager.init();
        let parseData = JSON.parse(response.data);
        let rowIndex = 0;
        parseData.forEach(data => {
            pastManager.setRowData(data["specie"], data["razza"], data["motivazione"], data["descrizione"], new Date(data["data"]).toLocaleDateString("en-GB"), data["ora"], data["gravita"], rowIndex, data["idPrenotazione"]);
            rowIndex++;
        });
    } else {
        noPastText.classList.toggle("hide", false);
        pastTable.classList.toggle("hide", true);
    }
});

const futureTable = document.querySelector(".future-table");
const noFutureText = document.querySelector(".no-future-text");
await FetchUtil.postData("./php/read-future-visits.php", {}).then((response) => {
    if (response.status == "success") {
        noFutureText.classList.toggle("hide", true);
        futureTable.classList.toggle("hide", false);
        const futureManager = new FutureManager(futureTable);
        futureManager.init();
        let parseData = JSON.parse(response.data);
        let rowIndex = 0;
        parseData.forEach(data => {
            futureManager.setRowData(data["specie"], data["razza"], data["motivazione"], data["descrizione"], new Date(data["data"]).toLocaleDateString("en-GB"), data["ora"], data["gravita"], rowIndex, data["idPrenotazione"]);
        })
    } else {
        noFutureText.classList.toggle("hide", false);
        futureTable.classList.toggle("hide", true);
    }
})