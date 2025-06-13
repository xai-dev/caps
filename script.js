
const bookingsLink = document.querySelector('.bookings-link');
const bookings = document.querySelector('.bookings');
const closeBtn = document.querySelector('.close-btn');

bookingsLink.addEventListener('click', (event) => {
  event.preventDefault();
  bookings.classList.remove('hidden');
});

closeBtn.addEventListener('click', () => {
  bookings.classList.add('hidden');
});
