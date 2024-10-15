// Toggle class avtive
const navbarNav = document.querySelector(".navbar-nav");
// Ketika menu di klik
document.querySelector("#menubar").onclick = () => {
  navbarNav.classList.toggle("active");
};

// klik di luar sidebar untuk menghilangkan nav
const menubar = document.querySelector("#menubar");

document.addEventListener("click", function (e) {
  if (!menubar.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
});

// Smooth scroll untuk navigasi
const links = document.querySelectorAll(".navbar-nav a");

for (const link of links) {
  link.addEventListener("click", smoothScroll);
}

function smoothScroll(e) {
  e.preventDefault();
  const targetId = this.getAttribute("href").substring(1);
  const targetSection = document.getElementById(targetId);

  window.scrollTo({
    top: targetSection.offsetTop - 70, // 70px untuk menyesuaikan dengan navbar
    behavior: "smooth",
  });

  // Close the navbar after clicking (for mobile view)
  navbarNav.classList.remove("active");
}

let slideIndex = 0;
let slideInterval;

function showSlide(index) {
  const slides = document.querySelector(".awards-slides");
  const totalSlides = slides.children.length;
  slideIndex = (index + totalSlides) % totalSlides;
  slides.style.transform = `translateX(-${slideIndex * 100}%)`;
}

function changeSlide(n) {
  clearInterval(slideInterval); // Reset timer on manual control
  showSlide(slideIndex + n);
  startAutoSlide(); // Restart the auto-slide after manual control
}

function startAutoSlide() {
  slideInterval = setInterval(() => {
    showSlide(slideIndex + 1);
  }, 3000); // Change slide every 3 seconds
}

// Start automatic slide on page load
document.addEventListener("DOMContentLoaded", startAutoSlide);

// Script for modal
const modal = document.getElementById("konsultasiModal");
const btn = document.querySelectorAll(".btn-konsultasi");
const span = document.getElementsByClassName("close")[0];

// Open the modal when "Konsultasi Hukum" button is clicked
btn.forEach((button) => {
  button.onclick = function () {
    modal.style.display = "block";
  };
});

// Close the modal when "x" is clicked
span.onclick = function () {
  modal.style.display = "none";
};

// Close the modal when clicking outside of it
window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};
