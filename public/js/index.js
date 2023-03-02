const loginForm = document.querySelector(".loginForm");
const openLoginFormButton = document.querySelector(".openLoginFormButton")
const registerButton = document.querySelector(".registerButton");

openLoginFormButton.addEventListener("click", () =>{
    loginForm.classList.remove("hidden");
    openLoginFormButton.classList.add("hidden");
    registerButton.classList.remove("hidden");
})
