import FetchUtil from "../../common/js/fetch-util.js";
import VisitsManager from "./visits-manager.js";

class FilterManager {
    constructor(parentElement) {
        this.rootElement = parentElement;
        this.elements = {};
        this.visitManager = new VisitsManager(this.rootElement.querySelector(".visits-table"));
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
        }
    }

    initEventListeners() {
        this.elements.searchBtn.addEventListener("click", () => {
            const filterData = {
                filter: this.elements.keyword.value,
            }
            FetchUtil.postData("./php/read-visits.php", filterData).then((response) => {
                if (response.status == "success") {
                    let parseData = JSON.parse(response.data);
                    parseData.forEach(data => {
                        this.visitManager.setRowData(data["specie"], data["razza"], data["motivazione"], data["descrizione"], data["data"], data["ora"], data["gravita"],)
                    });
                } else {
                    console.log(response.status);
                }
            })
        });
    }
}

export default FilterManager;