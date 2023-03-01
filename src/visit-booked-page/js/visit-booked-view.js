import CookieManager from "../../common/js/cookie-manager.js";
import FetchUtil from "../../common/js/fetch-util.js";
import VisitBooked from "./visit-booked-manager.js";

const table = document.querySelector("table");
const bookedText = document.querySelector(".booked-visits-text");
let prenData = {
    userId: CookieManager.getCookie("user_id"),
};
await FetchUtil.postData("./php/read-prenotations.php", prenData).then((response) => {
    if (response.status == "success") {
        bookedText.classList.toggle("hide", false);
        table.classList.toggle("hide", false);
        const bookedVisitManager = new VisitBooked(table);
        bookedVisitManager.init();
        let parseData = JSON.parse(response.data);
        console.log(parseData);
        parseData.forEach(data => {
            bookedVisitManager.setRowData(data["specie"], data["razza"], data["motivazione"], new Date(data["data"]).toLocaleDateString("en-GB"), data["ora"], data["nomeAccompagnatore"], data["cognomeAccompagnatore"], data["stato"]);
        });
    } else {
        console.log("error");
        bookedText.classList.toggle("hide", true);
        table.classList.toggle("hide", true);
    }
});