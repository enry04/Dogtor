class FormManager {
  constructor(parentElement) {
    this.rootElement = parentElement;
    this.elements = {};
    this.currentTab = 0;
  }

  init(){
    this.initElements();
    this.initEventListeners();
  }

  initElements(){
    this.elements = {
        steps: this.rootElement.querySelectorAll(".step"),
        firstStep : {
          patient: this.rootElement.querySelector(".patient-text"),
          birth: this.rootElement.querySelector(".birth-date"),
          born: this.rootElement.querySelector(".born-text"),
          residence: this.rootElement.querySelector(".residence-text"),
          species: this.rootElement.querySelector(".species-text"),
          breed: this.rootElement.querySelector(".breed-text"),
          name: this.rootElement.querySelector(".name-text"),
          surname: this.rootElement.querySelector(".surname-text"),
          nextBtn: this.rootElement.querySelector(".next-btn"),
        },
        secondStep : {
            motivation: this.rootElement.querySelector("motivation-text"),
            description: this.rootElement.querySelector("description-text"),
            visitDate: this.rootElement.querySelector("visit-date"),
            visitTime: this.rootElement.querySelector("visit-time"),
            previousBtn: this.rootElement.querySelector("previous-btn"),
            confirmBtn: this.rootElement.querySelector("confirm-btn"),
        },
        form: this.rootElement.querySelector("form"),
    }
    this.showStep();
  }

  initEventListeners(){
    
  }

  showStep(){

  }


}

export default FormManager;
