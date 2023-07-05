const slider = document.querySelector('.slider');
const sliderImages = document.querySelectorAll('.slider img');
const slideWidth = 100 / sliderImages.length;
let currentSlide = 0;
let slideTimeout;

slider.style.width = `${sliderImages.length * 100}%`;

function slide() {
  currentSlide = (currentSlide + 1) % sliderImages.length;
  slider.style.transform = `translateX(-${currentSlide * slideWidth}%)`;

  slideTimeout = setTimeout(slide, 5000); // Wait for 5 seconds before sliding to the next image
}

slider.addEventListener('mouseenter', () => {
  clearTimeout(slideTimeout); // Clear the timeout when hovering over the slider
});

slider.addEventListener('mouseleave', () => {
  slideTimeout = setTimeout(slide, 500); // Restart the slide after leaving the slider
});

slide(); // Start the sliding process