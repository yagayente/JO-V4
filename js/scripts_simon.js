////// MENU HOVER COLOR

function changeColorIn() {
    var fond = document.getElementById("Menu_background");
    var boutonleft = document.getElementById("showButton");
    var boutonright = document.getElementById("ButtonRight");
    fond.classList.toggle('active_gauche');
    boutonleft.classList.toggle('bouton_color_gauche');
    boutonright.classList.toggle('bouton_color_droite');
}
function changeColorOut() {
    var fond = document.getElementById("Menu_background");
    var boutonleft = document.getElementById("showButton");
    var boutonright = document.getElementById("ButtonRight");
    fond.classList.toggle('active_gauche');
    boutonleft.classList.toggle('bouton_color_gauche');
    boutonright.classList.toggle('bouton_color_droite');
}

function changeColorIn_right() {
    var fond = document.getElementById("Menu_background");
    var boutonright = document.getElementById("ButtonRight");
    var boutonleft = document.getElementById("showButton");
    fond.classList.toggle('active_droite');
    boutonright.classList.toggle('bouton_color_droite');
    boutonleft.classList.toggle('bouton_color_gauche');
}
function changeColorOut_right() {
    var fond = document.getElementById("Menu_background");
    var boutonright = document.getElementById("ButtonRight");
    var boutonleft = document.getElementById("showButton");
    fond.classList.toggle('active_droite');
    boutonright.classList.toggle('bouton_color_droite');
    boutonleft.classList.toggle('bouton_color_gauche');
}
////// CALL THE MOBILE MENU

function loadmenu() {
      var archive = document.getElementById("listing");
      var bodyscroll = document.getElementById("johl");
      archive.classList.toggle('close');
      bodyscroll.classList.toggle('noscroll');
}
function hidemenu() {
      var archive = document.getElementById("listing");
      var bodyscroll = document.getElementById("johl");
      archive.classList.toggle('close');
      bodyscroll.classList.toggle('noscroll');
}
function remove_no_scroll() {
      var bodyscroll = document.getElementById("johl");
      if (bodyscroll.classList.contains("noscroll")) {
       bodyscroll.classList.remove("noscroll");
     }
}


////// CALL THE INFO

function fn(e) {
	var tooltip = document.querySelectorAll('.post_hover');
    for (var i=tooltip.length; i--;) {
        tooltip[i].style.left = e.clientX + 'px';
        tooltip[i].style.top = e.clientY + 'px';
    }
}

function myFunction(i) {
        var box = document.getElementById(i + '_box');
        box.style.opacity = 1;
        box.style.position = 'fixed';
}

function normalImg(p) {
    var box = document.getElementById(p + '_box');
    box.style.opacity = 0;
    box.style.position = 'absolute';
}

function listeFunc(i) {
    var box = document.getElementById(i + '_box');
    box.style.opacity = 1;
    box.style.display = 'block';
    box.style.position = 'fixed';

}
function listeFuncOut(p) {
    var box = document.getElementById(p + '_box');
    box.style.opacity = 0;
    box.style.display = 'none';
   box.style.position = 'absolute';
}

function addClassCurrent() {
    var current = document.getElementById('statut');
    current.classList.toggle('current_page');
}

//////

function PageTransition(){
    var tl = gsap.timeline();
    tl.to('.rendu', {duration: 0.5, opacity: 0})
}
function PageTransitionEnter(){
    var tl = gsap.timeline();
    tl.from('.rendu', {duration: 0.5, opacity: 0})
}

function ListeTransition(){
    var tl = gsap.timeline();
    tl.to('.liste', {duration: 0.5, opacity: 0 })
}
function ListeTransitionEnter(){
    var tl = gsap.timeline();
    tl.from('.liste', {duration: 0.5, opacity: 0 })
}

function contentAnimation(){
    var tl = gsap.timeline();
    tl.from('.first', {duration: 0.5, x: 30, opacity: 0, stagger: 0.4 })
    tl.from('.second', {duration: 0.5,  x: 30, opacity: 0, stagger: 0.4 }, '.1')
    tl.from('.third', {duration: 0.5,  x: 30, opacity: 0, stagger: 0.4 }, '.1')
}

function delay(n) {
    n = n || 2000;
    return new Promise(done => {
        setTimeout(() => {
            done();
        }, n);
    });
}

barba.hooks.enter(() => {
  window.scrollTo(0, 0);

});


console.log("First loading of »myPage«…");
barba.init({
    sync: true,
    views: [
        {
        namespace: 'single',
           beforeEnter({ next }) {
            setuphover();
           },
           enter(data) {
               addClassCurrent();
           }
        },
        ],// a poursuivre
    transitions: [
        {
        name: 'default',
        async leave(data) {
            const done = this.async();
            PageTransition();
            await delay(700);
            done();

        },
        async enter(date) {
            PageTransitionEnter();
            contentAnimation();

        },
        async once(date) {
        }
    },
    {
      name: 'menu_end',
      from: {
          custom: ({ trigger }) => {
            if (trigger.classList && trigger.classList.contains('menulienmobile')) {
              return true
            }
          }
        },
        async leave(data) {
          const done = this.async();
          await delay(700);
          PageTransition();
          ListeTransition(); // disparition de la liste
          done();
      },
      async enter(date) {
          hidemenu();
          PageTransitionEnter();
          remove_no_scroll();// disparition de la class no scroll body
          
      },
    },
    {
        name: 'effet de fade pour la liste et la page lors de la fermeture',
        from: {
            custom: ({ trigger }) => {
              if (trigger.classList && trigger.classList.contains('homepage')) {
                return true
              }
              if (trigger.classList && trigger.classList.contains('nav-link')) {
                return true
              }
            }
          },
          async leave(data) {
            const done = this.async();
            PageTransition();
            ListeTransition(); // disparition de la liste
            remove_no_scroll();// disparition de la class no scroll body
            await delay(700);
            done();
        },
        async enter(date) {
            PageTransitionEnter();
        },
    },
    {
        name: 'Fade la liste lors de larrivé apres avoir été sur la home',
        from: {
            custom: ({ trigger }) => {
              if (trigger.classList && trigger.classList.contains('linked')) {
                return true
              }
            }
          },
          async leave(data) {
              const done = this.async();
              PageTransition();
              await delay(700);
              done();
          },
          async enter(data) {
            PageTransitionEnter();
            ListeTransitionEnter();
            contentAnimation();

        },
        async once(date) {
            setuphover();
            contentAnimation();
        }

    },


],
})
