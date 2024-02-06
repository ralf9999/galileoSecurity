//Button actived with click
// const mobilbar = document.getElementById('id_menuarea_mobil_hp');
// const button = document.querySelector("#id_burger");
//   button.addEventListener("click", () => {
//     const currentState = button.getAttribute("data-state");

//     if (!currentState || currentState === "closed") {
//       button.setAttribute("data-state", "opened");
//       button.setAttribute("aria-expanded", "true");
//       mobilbar.classList.remove('cl_mobilNone');
//     } else {
//       button.setAttribute("data-state", "closed");
//       button.setAttribute("aria-expanded", "false");
//       mobilbar.classList.add('cl_mobilNone');
//     }
//   });

// let counter = 1;
// setInterval(function(){
//     document.getElementById('radio' + counter).checked = true;
//     counter++;
//     if(counter > 4){
//         counter = 1;
//     }
// }, 5000);
// //ChatGPT slider

// const slider = document.querySelector('.slider');
// const prevButton = document.querySelector('.prev');
// const nextButton = document.querySelector('.next');
// const slides = Array.from(slider.children);
// const slideWidth = slides[0].clientWidth;
// const slideCount = slides.length;
// let currentIndex = 0;

// // Füge eine Kopie der ersten Slide am Ende hinzu
// const firstSlideClone = slides[0].cloneNode(true);
// slider.appendChild(firstSlideClone);

// function goToSlide(index) {
//   currentIndex = index;
//   const offset = -currentIndex * slideWidth;
//   slider.style.transition = 'transform 0.5s ease-in-out';
//   slider.style.transform = `translateX(${offset}px)`;
// }

// function startAutoSlide() {
//   setInterval(nextSlide, 3000); // Automatisches Gleiten alle 3 Sekunden
// }
// startAutoSlide()

// function nextSlide() {
//     currentIndex++;
//     if (currentIndex === slideCount) {
//       slider.style.transition = 'none'; // Deaktiviere die Übergangseigenschaft, um nahtlos zurückzukehren
//       currentIndex = 0;
//       setTimeout(() => {
//         slider.style.transition = 'transform 0.5s ease-in-out'; // Wieder aktivieren der Übergangseigenschaft
//       }, 0);
//     }
//     goToSlide(currentIndex);
//   }
  
//   function prevSlide() {
//     currentIndex--;
//     if (currentIndex < 0) {
//       slider.style.transition = 'none'; // Deaktiviere die Übergangseigenschaft, um nahtlos zurückzukehren
//       currentIndex = slideCount - 1;
//       setTimeout(() => {
//         slider.style.transition = 'transform 0.5s ease-in-out'; // Wieder aktivieren der Übergangseigenschaft
//       }, 0);
//     }
//     goToSlide(currentIndex);
//   }
// nextButton.addEventListener('click', nextSlide);
// prevButton.addEventListener('click', prevSlide);