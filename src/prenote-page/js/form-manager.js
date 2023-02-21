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
    this.elements.firstStep.nextBtn.addEventListener("click", (event) => {
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
    this.elements.secondStep.previousBtn.addEventListener("click", (event) => {
      this.currentTab--;
      this.showStep();
    });
    this.elements.form.addEventListener("submit", (event) => {
      event.preventDefault();
      this.secondStepData = {
        motivation: this.elements.secondStep.motivationText.value,
        description: this.elements.secondStep.descriptionText.value,
        visitDate: this.elements.secondStep.visitDate.value,
        visitTime: this.elements.secondStep.visitTime.value,
      };
      console.log(this.firstStepData);
      console.log(this.secondStepData);
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
