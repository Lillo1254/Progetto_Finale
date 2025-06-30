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
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.querySelector('.nav-bar').style.top = "0";
  } else {
    document.querySelector('.nav-bar').style.top = "-15%";
  }
  prevScrollpos = currentScrollPos;
}
// fine trasparenza navbar

// transition del body

// fine transition