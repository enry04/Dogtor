import FetchUtil from "../../common/js/fetch-util.js";
import VisitsManager from "./visits-manager.js";

class FilterManager {
    constructor(parentElement) {
        this.rootElement = parentElement;
        this.elements = {};
        this.visitManager = new VisitsManager(this.rootElement.querySelector(".filter-table"));
        this.visitManager.init();
    }
    init() {
        this.initElements();
        this.initEventListeners();
    }

    initElements() {
        this.elements = {
            keyword: this.rootElement.querySelector(".keyword-text"),
            searchBtn: this.rootElement.querySelector(".search-btn"),
            odiernSection: this.rootElement.querySelector(".odiern-section"),
            pastSection: this.rootElement.querySelector(".past-section"),
            futureSection: this.rootElement.querySelector(".future-section"),
            filterSection: this.rootElement.querySelector(".filter-section"),
            noFilterText: this.rootElement.querySelector(".no-filter-text"),
            filterTable: this.rootElement.querySelector(".filter-table"),
            findText: this.rootElement.querySelector(".find-text"),
        }
    }

    initEventListeners() {
        this.elements.searchBtn.addEventListener("click", () => {
            let tBody = this.elements.filterTable.querySelector("tbody");
            tBody.innerHTML = "";
            const filterData = {
                filter: this.elements.keyword.value,
            }
            if (filterData.filter == "") {
                this.elements.odiernSection.classList.toggle("hide", false);
                this.elements.pastSection.classList.toggle("hide", false);
                this.elements.futureSection.classList.toggle("hide", false);
                this.elements.filterSection.classList.toggle("hide", true);
            } else {
                this.elements.odiernSection.classList.toggle("hide", true);
                this.elements.pastSection.classList.toggle("hide", true);
                this.elements.futureSection.classList.toggle("hide", true);
                this.elements.filterSection.classList.toggle("hide", false);
                FetchUtil.postData("./php/read-visits.php", filterData).then((response) => {
                    if (response.status == "success") {
                        this.elements.findText.classList.toggle("hide", false);
                        this.elements.filterTable.classList.toggle("hide", false);
                        this.elements.noFilterText.classList.toggle("hide", true);
                        let parseData = JSON.parse(response.data);
                        let rowIndex = 0;
                        parseData.forEach(data => {
                            this.visitManager.setRowData(data["specie"], data["razza"], data["motivazione"], data["descrizione"], data["data"], data["ora"], data["gravita"], data["stato"], rowIndex, data["idPrenotazione"]);
                            rowIndex++;
                        });
                    } else {
                        this.elements.findText.classList.toggle("hide", true);
                        this.elements.filterTable.classList.toggle("hide", true);
                        this.elements.noFilterText.classList.toggle("hide", false);
                    }
                })
            }
        });
    }
}

export default FilterManager;