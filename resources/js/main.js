//   switch light mode
document.addEventListener('DOMContentLoaded', () => {
  const toggleSwitch = document.querySelector('.switch input[type="checkbox"]');
  const logo = document.getElementById('nav-logo');

  if (localStorage.getItem('theme') === 'light') {
    document.body.classList.add('light-mode');
    toggleSwitch.checked = true;
    logo.src = '/media/intellex.png';
  }

  toggleSwitch.addEventListener('change', () => {
    document.body.classList.toggle('light-mode');


    if (document.body.classList.contains('light-mode')) {
      localStorage.setItem('theme', 'light');
      logo.src = '/media/intellex.png';
    } else {
      localStorage.setItem('theme', 'dark');
      logo.src = '/media/intellex.png';
    }
  });
});
// fine switch light mode 

// trasparenza della navbar
let prevScrollpos = window.pageYOffset;
const navbar = document.querySelector('.nav-bar');
window.onscroll = function () {
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

//validazioni password
const passwordInput = document.getElementById('password');

const uppercaseCheck = document.getElementById('uppercaseCheck');
const lowercaseCheck = document.getElementById('lowercaseCheck');
const numberCheck = document.getElementById('numberCheck');
const symbolCheck = document.getElementById('symbolCheck');
const lengthCheck = document.getElementById('minCheck');

passwordInput.addEventListener('input', function () {
  const value = passwordInput.value;


  const maiusc = /[A-Z]/.test(value);
  const minusc = /[a-z]/.test(value);
  const number = /[0-9]/.test(value);
  const specialSymbol = /[@$!%*#?&]/.test(value);
  const mincar = value.length >= 8;


  uppercaseCheck.className = maiusc ? 'text-success' : 'text-danger';
  uppercaseCheck.textContent = `${maiusc ? '✅' : '❌'} una lettera maiuscola`;

  lowercaseCheck.className = minusc ? 'text-success' : 'text-danger';
  lowercaseCheck.textContent = `${minusc ? '✅' : '❌'} una minuscola`;

  numberCheck.className = number ? 'text-success' : 'text-danger';
  numberCheck.textContent = `${number ? '✅' : '❌'} un numero`;

  symbolCheck.className = specialSymbol ? 'text-success' : 'text-danger';
  symbolCheck.textContent = `${specialSymbol ? '✅' : '❌'} un simbolo speciale @$!%*#?&`;

  lengthCheck.className = mincar ? 'text-success' : 'text-danger';
  lengthCheck.textContent = `${mincar ? '✅' : '❌'} minimo 8 caratteri`;
});
//fine validazioni password

function startLogging(label, delayStart = 0) {
  setTimeout(() => {
    let count = 0;
    const interval = setInterval(() => {
      count++;
      console.log(`${label} - messaggio numero ${count}`);
      if (count >= 10) {
        clearInterval(interval);
        // Ricomincia dopo 500ms (puoi modificare il ritardo qui)
        startLogging(label, 500);
      }
    }, 500);
  }, delayStart);
}

// Primo log parte subito
startLogging("Inizio pagina");

// Secondo log parte dopo 5 secondi (per simulare "a metà")
startLogging("Meta pagina", 5000);

