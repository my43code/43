// Mobile menu toggle
const mobileMenuBtn = document.getElementById("mobileMenuBtn");
const mainNav = document.querySelector(".main-nav");

if (mobileMenuBtn && mainNav) {
    mobileMenuBtn.addEventListener("click", () => {
        if (mainNav.style.display === "block") {
            mainNav.style.display = "none";
        } else {
            mainNav.style.display = "block";
        }
    });
}

// Dynamic year in footer
const yearSpan = document.getElementById("year");
if (yearSpan) {
    yearSpan.textContent = new Date().getFullYear();
}
