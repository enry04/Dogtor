import FetchUtil from "../../common/js/fetch-util.js";

class FormManager {
  constructor(parentElement) {
    this.rootElement = parentElement;
    this.elements = {};
    this.maxNumbers = 2;
    this.currentNumbers = 0;
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
      telephoneNumber: this.rootElement.querySelector(".telephone-number"),
      telephoneRow: this.rootElement.querySelector(".row:nth-child(4)"),
      plusBtn: this.rootElement.querySelector(".plus-container"),
      minusBtn: null,
      secondaryTelephoneNumbers: [],
      form: this.rootElement.querySelector("form"),
    };
  }

  initEventListeners() {
    this.elements.plusBtn.addEventListener("click", (event) => {
      if (this.currentNumbers < this.maxNumbers) {
        if (this.currentNumbers == 1) {
          let divToRemove =
            this.elements.telephoneRow.querySelector(".minus-container");
          divToRemove.remove();
        }
        let div = document.createElement("div");
        div.classList.toggle("input-container", true);
        div.setAttribute("id", this.currentNumbers);
        let input = document.createElement("input");
        input.type = "number";
        input.required = "true";
        input.onkeydown = (event) => {
          return ["Backspace", "Delete", "ArrowLeft", "ArrowRight"].includes(
            event.code
          )
            ? true
            : !isNaN(Number(event.key)) && event.code !== "Space";
        };
        this.elements.secondaryTelephoneNumbers.push(input);
        let span = document.createElement("span");
        span.textContent = "N. di telefono (secondario)";
        div.appendChild(input);
        div.appendChild(span);
        this.elements.telephoneRow.appendChild(div);
        let minusDiv = document.createElement("div");
        minusDiv.classList.toggle("minus-container");
        div.appendChild(minusDiv);
        this.currentNumbers++;
        minusDiv.addEventListener("click", (event) => {
          this.currentNumbers--;
          let divToRemove = this.rootElement.querySelector(
            `[id="${this.currentNumbers}"]`
          );
          if (this.currentNumbers == 1) {
            let div = this.rootElement.querySelector(
              `[id="${this.currentNumbers - 1}"]`
            );
            div.appendChild(minusDiv);
          }
          this.elements.secondaryTelephoneNumbers.pop();

          divToRemove.remove();
        });
        this.elements.minusBtn = minusDiv;
      }
    });

    this.elements.form.addEventListener("submit", async (event) => {
      event.preventDefault();
      const addressData = {
        postalCode: this.elements.postalCode.value,
        street: this.elements.street.value,
        houseNumber: this.elements.houseNumber.value,
      };
      let addressId = null;
      await FetchUtil.postData("./php/check-address.php", addressData).then(
        async (response) => {
          if (response.status == "already present") {
            let parseData = JSON.parse(response.data);
            addressId = parseData["id"];
          } else {
            await FetchUtil.postData(
              "./php/insert-address.php",
              addressData
            ).then(async (response) => {
              if (response.status == "success") {
                let parseData = JSON.parse(response.data);
                addressId = parseData["LAST_INSERT_ID()"];
              } else {
                console.log(response.status);
              }
            });
          }
        }
      );
      const userData = {
        name: this.elements.name.value,
        surname: this.elements.surname.value,
        taxCode: this.elements.taxCode.value,
        username: this.elements.userName.value,
        password: this.elements.password.value,
        email: this.elements.email.value,
        idAddress: addressId,
        telephoneNumber: this.elements.telephoneNumber.value,
      };
      let userId = null;
      await FetchUtil.postData("./php/check-user.php", userData).then(
        async (response) => {
          console.log(response);
        //   console.log(response.data);
        //   if (response.status == "already present") {
        //     console.log("error");
        //   } else {
        //     await FetchUtil.postData("./php/insert-user.php", userData).then(
        //       (response) => {
        //         if (response.status == "success") {
        //           let parseData = JSON.parse(response.data);
        //           userId = parseData["LAST_INSERT_ID()"];
        //         } else {
        //           console.log(response.data);
        //         }
        //       }
        //     );
        //   }
        }
      );
      const telephonesData = {
        userId: userId,
        telephoneNumbers: this.getNumbers(),
      };
      console.log(telephonesData.telephoneNumbers);
      //this.resetElements();
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
    for (let i = 0; i < this.elements.secondaryTelephoneNumbers.length; i++) {
      this.elements.secondaryTelephoneNumbers[i].value = "";
      this.rootElement.querySelector(`[id="${i}"]`).remove();
    }
    this.elements.secondaryTelephoneNumbers = [];
    this.currentNumbers = 0;
  }

  getNumbers() {
    let values = [];
    for (let i = 0; i < this.elements.secondaryTelephoneNumbers.length; i++) {
      values.push(this.elements.secondaryTelephoneNumbers[i].value);
    }
    return values;
  }
}

export default FormManager;
