const slider = document.querySelector(".slider");
const prevBtn = document.querySelector(".prev");
const nextBtn = document.querySelector(".next");
const slides = document.querySelectorAll(".slider img");

let slideIndex = 0;
const slideWidth = slides[0].clientWidth;

// Set initial position of slider
slider.style.transform = `translateX(-${slideWidth * slideIndex}px)`;

// Auto play slider
setInterval(() => {
  slideIndex++;
  if (slideIndex > slides.length - 1) {
    slideIndex = 0;
  }
  slider.style.transform = `translateX(-${slideWidth * slideIndex}px)`;
}, 5000);

// Manual navigation buttons
prevBtn.addEventListener("click", () => {
  slideIndex--;
  if (slideIndex < 0) {
    slideIndex = slides.length - 1;
  }
  slider.style.transform = `translateX(-${slideWidth * slideIndex}px)`;
});

nextBtn.addEventListener("click", () => {
  slideIndex++;
  if (slideIndex > slides.length - 1) {
    slideIndex = 0;
  }
  slider.style.transform = `translateX(-${slideWidth * slideIndex}px)`;
});