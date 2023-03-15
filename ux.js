const menuBtn = document.getElementById('Toggle-nav');
const nav = document.querySelector('.vertical-nav');

menuBtn.addEventListener('click', () => {
  nav.classList.toggle('open');
});
