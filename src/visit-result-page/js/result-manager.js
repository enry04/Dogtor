import FetchUtil from "../../common/js/fetch-util.JS";

class ResultManager {
    constructor(parentElement, prenotationId) {
        this.rootElement = parentElement;
        this.elements = {};
        this.prenotationId = prenotationId;
    }
    init() {
        this.initElements();
        this.initEventListeners();
    }

    initElements() {
        this.elements = {
            motivationText: this.rootElement.querySelector(".motivation-text"),
            diagnosisText: this.rootElement.querySelector(".diagnosis-text"),
            cureText: this.rootElement.querySelector(".cure-text"),
            priceText: this.rootElement.querySelector(".price-text"),
            form: this.rootElement.querySelector("form"),
        }
    }

    initEventListeners() {
        this.elements.form.addEventListener("submit", async (event) => {
            event.preventDefault();
            let resultData = {
                prenotationId: this.prenotationId,
                motivation: this.elements.motivationText.value,
                diagnosis: this.elements.diagnosisText.value,
                cure: this.elements.cureText.value,
                price: parseInt(this.elements.priceText.value),
            };
            console.log(resultData);
            await FetchUtil.postData("./php/insert-result.php", resultData).then(async (response) => {
                if (response.status == "success") {
                    this.elements.form.reset();
                    let prenoteData = {
                        prenotationId: this.prenotationId,
                    };
                    await FetchUtil.postData("./php/update-prenotation.php", prenoteData).then((response) => {
                        if (response.status == "success") {
                            location.href = "../doctor-page/doctor-page.php";
                        } else {
                            console.log(response.data);
                        }
                    });
                } else {
                    console.log(response.data);
                }
            });

        });
    }
}

export default ResultManager;