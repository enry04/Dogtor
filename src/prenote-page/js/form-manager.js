import CookieManager from "../../common/js/cookie-manager.js";
import FetchUtil from "../../common/js/fetch-util.js";

class FormManager {
  constructor(parentElement) {
    this.rootElement = parentElement;
    this.elements = {};
    this.currentTab = 0;
    this.firstStepData = {};
    this.secondStepData = {};
  }

  init() {
    this.initElements();
    this.initEventListeners();
  }

  initElements() {
    this.elements = {
      steps: this.rootElement.querySelectorAll(".step"),
      firstStep: {
        patientText: this.rootElement.querySelector(".patient-text"),
        birthDate: this.rootElement.querySelector(".birth-date"),
        bornText: this.rootElement.querySelector(".born-text"),
        residenceText: this.rootElement.querySelector(".residence-text"),
        speciesText: this.rootElement.querySelector(".species-text"),
        breedText: this.rootElement.querySelector(".breed-text"),
        nameText: this.rootElement.querySelector(".name-text"),
        surnameText: this.rootElement.querySelector(".surname-text"),
        nextBtn: this.rootElement.querySelector(".next-btn"),
      },
      secondStep: {
        motivationText: this.rootElement.querySelector(".motivation-text"),
        descriptionText: this.rootElement.querySelector(".description-text"),
        visitDate: this.rootElement.querySelector(".visit-date"),
        visitTime: this.rootElement.querySelector(".visit-time"),
        previousBtn: this.rootElement.querySelector(".previous-btn"),
        confirmBtn: this.rootElement.querySelector(".confirm-btn"),
      },
      form: this.rootElement.querySelector("form"),
    };
    this.showStep();
  }

  initEventListeners() {
    this.elements.firstStep.nextBtn.addEventListener("click", () => {
      if (this.isStepValid()) {
        this.firstStepData = {
          patient: this.elements.firstStep.patientText.value,
          birth: this.elements.firstStep.birthDate.value,
          born: this.elements.firstStep.bornText.value,
          residence: this.elements.firstStep.residenceText.value,
          species: this.elements.firstStep.speciesText.value,
          breed: this.elements.firstStep.breedText.value,
          name: this.elements.firstStep.nameText.value,
          surname: this.elements.firstStep.surnameText.value,
        };
        this.currentTab++;
        this.showStep();
      }
    });
    this.elements.secondStep.previousBtn.addEventListener("click", () => {
      this.currentTab--;
      this.showStep();
    });
    this.elements.form.addEventListener("submit", async (event) => {
      event.preventDefault();
      this.secondStepData = {
        motivation: this.elements.secondStep.motivationText.value,
        description: this.elements.secondStep.descriptionText.value,
        visitDate: this.elements.secondStep.visitDate.value,
        visitTime: this.elements.secondStep.visitTime.value,
      };
      let patientData = {
        name: this.firstStepData.patient,
        birth: this.firstStepData.birth,
        bornPlace: this.firstStepData.born,
        residence: this.firstStepData.residence,
        species: this.firstStepData.species,
        breed: this.firstStepData.breed,
        ownerId: CookieManager.getCookie("user_id"),
        companionName: this.firstStepData.name,
        companionSurname: this.firstStepData.surname,
      }
      let patientId;
      await FetchUtil.postData("./php/check-animal.php", patientData).then(async (response) => {
        if (response.status == "already present") {
          let parseData = JSON.parse(response.data);
          patientId = parseData['id'];
        } else {
          await FetchUtil.postData("./php/insert-Animal.php", patientData).then((response) => {
            if (response.status == "success") {
              let parseData = JSON.parse(response.data);
              patientId = parseData['LAST_INSERT_ID()'];
            } else {
              console.log(response.status);
            }
          });
        }
      });
    });
  }

  showStep() {
    if (this.currentTab == 0) {
      this.elements.steps[0].classList.toggle("hide", false);
      this.elements.steps[1].classList.toggle("hide", true);
    } else {
      this.elements.steps[0].classList.toggle("hide", true);
      this.elements.steps[1].classList.toggle("hide", false);
    }
  }

  isStepValid() {
    let inputs = this.elements.steps[this.currentTab].querySelectorAll("input");
    for (let i = 0; i < inputs.length; i++) {
      if (inputs[i].value == "") {
        return false;
      }
    }
    return true;
  }
}

export default FormManager;
