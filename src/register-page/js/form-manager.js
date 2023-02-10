import FetchUtil from "../../common/js/fetch-util.js";

class FormManager {
    constructor(parentElement) {
        this.rootElement = parentElement;
        this.elements = {};
    }

    init() {
        this.initElements();
        this.initEventListeners();
    }

    initElements() {
        this.elements = {
            name: this.rootElement.querySelector(".name-text"),
            surname: this.rootElement.querySelector(".surname-text"),
            taxCode: this.rootElement.querySelector(".tax-code"),
            userName: this.rootElement.querySelector(".username-text"),
            password: this.rootElement.querySelector(".password-text"),
            email: this.rootElement.querySelector(".email-text"),
            postalCode: this.rootElement.querySelector(".postal-code"),
            street: this.rootElement.querySelector(".street-text"),
            houseNumber: this.rootElement.querySelector(".house-number"),
            telephoneNumber: this.rootElement.querySelectorAll(".telephone-number"),
            telephoneRow: this.rootElement.querySelector(".row:nth-child(4)"),
            plusBtn: this.rootElement.querySelector(".plus-container"),
            form: this.rootElement.querySelector("form"),
        }
    }

    initEventListeners() {

        this.elements.plusBtn.addEventListener("click", (event) => {
            let div = document.createElement("div");
            div.classList.toggle("input-container", true);
            let input = document.createElement("input");
            input.type = "number";
            input.required = "true";
            let span = document.createElement("span");
            span.textContent = "N. di telefono (secondario)";
            div.appendChild(input);
            div.appendChild(span);
            this.elements.telephoneRow.appendChild(div);
        })

        this.elements.form.addEventListener("submit", (event) => {
            event.preventDefault();
            this.resetElements();
            const formData = {
                name: this.elements.name.value,
                surname: this.elements.surname.value,
                taxCode: this.elements.taxCode.value,
                userName: this.elements.userName.value,
                password: this.elements.password.value,
                email: this.elements.email.value,
                postalCode: this.elements.postalCode.value,
                street: this.elements.street.value,
                houseNumber: this.elements.houseNumber.value,
                telephoneNumber: this.elements.telephoneNumber.value,
            }
            FetchUtil.postData("", formData).then((response) => {
                console.log(response);
            });

        });
    }

    resetElements() {
        this.elements.name.value = "";
        this.elements.surname.value = "";
        this.elements.taxCode.value = "";
        this.elements.userName.value = "";
        this.elements.userName.value = "";
        this.elements.password.value = "";
        this.elements.email.value = "";
        this.elements.postalCode.value = "";
        this.elements.street.value = "";
        this.elements.houseNumber.value = "";
        this.elements.telephoneNumber.value = "";
    }

}

export default FormManager;