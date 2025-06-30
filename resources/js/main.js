//   switch light mode
  document.addEventListener('DOMContentLoaded', () => {
        const toggleSwitch = document.querySelector('.switch input[type="checkbox"]');

       
        if (localStorage.getItem('theme') === 'light') {
            document.body.classList.add('light-mode');
            toggleSwitch.checked = true;
        }

        toggleSwitch.addEventListener('change', () => {
            document.body.classList.toggle('light-mode');

  
            if (document.body.classList.contains('light-mode')) {
                localStorage.setItem('theme', 'light');
            } else {
                localStorage.setItem('theme', 'dark');
            }
        });
    });
// fine switch light mode 

// trasparenza della navbar
let prevScrollpos = window.pageYOffset;
const navbar = document.querySelector('.nav-bar');
window.onscroll = function() {
  let currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    navbar.classList.remove('nav-hover');    
    navbar.classList.remove('scrolled');
  } else {
    navbar.classList.add('nav-hover');
    navbar.classList.add('scrolled');
  }
  prevScrollpos = currentScrollPos;
}
// fine trasparenza navbar

// transition del body

// fine transition