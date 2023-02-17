const checkBox = document.querySelector(".option-btn");
const popUp = document.querySelector(".popUp-menu-container")
checkBox.addEventListener("change", () => {
    if(checkBox.checked){   
        popUp.classList.toggle("hide", false);
    }else{
        popUp.classList.toggle("hide", true);
    }
});