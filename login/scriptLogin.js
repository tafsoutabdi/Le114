const Toggle1 = document.querySelector(".toggle1");
const Toggle2 = document.querySelector(".toggle2");
const Toggle3 = document.querySelector(".toggle3");
const Toggle4 = document.querySelector(".toggle4");
const Inscription = document.querySelector(".inscription");
const Connect = document.querySelector(".connect");

Toggle1.addEventListener('click', () => {
    Inscription.classList.add("inactive");
    Connect.classList.add("active");
    Inscription.classList.remove("active");
    Connect.classList.remove("inactive");
});

Toggle2.addEventListener('click', () => {
    Inscription.classList.add("active");
    Connect.classList.add("inactive");
    Inscription.classList.remove("inactive");
    Connect.classList.remove("active");
});

Toggle3.addEventListener('click', () => {
    Inscription.classList.add("inactive");
    Connect.classList.add("active");
    Inscription.classList.remove("active");
    Connect.classList.remove("inactive");
});

Toggle4.addEventListener('click', () => {
    Inscription.classList.add("active");
    Connect.classList.add("inactive");
    Inscription.classList.remove("inactive");
    Connect.classList.remove("active");
});
