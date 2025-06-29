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
//  document.addEventListener('DOMContentLoaded', function () {
//     const navbar = document.querySelector('.navbar-bg-blur');

//     window.addEventListener('scroll', () => {
//         const scrollTop = window.scrollY || document.documentElement.scrollTop;
//         const scrollPercent = (scrollTop / document.body.scrollHeight) * 100;

//         if (scrollPercent > 3) {
//             navbar.classList.add('scrolled');
//         } else {
//             navbar.classList.remove('scrolled');
//         }
//     });
// });
// fine trasparenza navbar

// transition del body

// fine transition