import barba from '@barba/core'; // npm install @barba/core
import gsap from "gsap"; // npm install gsap
import 'lazysizes'; // npm i lazysizes

//////

function PageTransition(){
    var tl = gsap.timeline();
    tl.to('.rendu', {duration: 0.5, opacity: 0})
}
function PageTransitionEnter(){
    var tl = gsap.timeline();
    tl.from('.rendu', {duration: 0.5, opacity: 0})

}

function AddCurrentClass(){
  var lien_actif = window.location.href;
  var currentURLLink = document.querySelector("a.link_to_post[href='"+lien_actif+"']");
  var parent = currentURLLink.parentNode;

  const active = document.querySelector('.current');
  if(active){
    active.classList.remove('current');
  }
  parent.classList.add('current');
}

function AddCurrentClassMobile(){
  var lien_actif_second = window.location.href;
  var currentURLLink_second = document.querySelector("a.link_to_post_mobile[href='"+lien_actif_second+"']");
  var parent_second = currentURLLink_second.parentNode;

  const active_second = document.querySelector('.currentmobile');
  if(active_second){
    active_second.classList.remove('currentmobile');
  }
  parent_second.classList.add('currentmobile');
}

function AddWorkClass(){
  var work = document.getElementById('work');
  var parent_work = work.parentNode;

  const yooo = document.getElementById('it_is_single');
  if(yooo){
      parent_work.classList.add('current-menu-item');
  }
  else {
    parent_work.classList.remove('current-menu-item');
  }
}



function displaynone() {
  var box = document.getElementById('listing');
  setTimeout(function(){  box.style.display = 'none'; }, 700);
}

function ListeTransition(){
     var tl = gsap.timeline();
     tl.to('.liste', {duration: 0.5, opacity: 0});
     displaynone();
}
function ListeTransitionEnter(){
    var box = document.getElementById('listing');
     box.style.display = 'block';
     var tl = gsap.timeline();
     tl.to('.liste', {duration: 0.5, opacity: 1})
     box.scrollTo(0, 0);
}
function contentAnimation(){
    var tl = gsap.timeline();
    tl.from('.second', {duration: 0.5,  x: 30, opacity: 0, stagger: 0.4 }, '.1')
    tl.from('.third', {duration: 0.5,  x: 30, opacity: 0, stagger: 0.4 }, '.1')
}


////

function hide_liste(){
  var tl = gsap.timeline();
  tl.from('.liste', {duration: 0.5, opacity: 0 })
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

barba.init({


    sync: true,
    transitions: [
      {
          name: 'go_home',
          to: {
              namespace: [
                'homepage',
              ]
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
        name: 'default',
        async beforeOnce(data) {
          AddCurrentClass();
          AddCurrentClassMobile();
          AddWorkClass();
        },

        async leave(data) {
            const done = this.async();
            PageTransition();
            await delay(700);
            done();

        },
        async enter(data) {
            PageTransitionEnter();
            contentAnimation();
        },
        async once(data) {
        }
    },
    {
    name: 'liste_Current',
    from: {
        custom: ({ trigger }) => {
          if (trigger.classList && trigger.classList.contains('link_to_post')) {
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
        AddCurrentClass();
        AddCurrentClassMobile();
        PageTransitionEnter();
        contentAnimation();
    },
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
          done();
      },
      async enter(data) {
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
          async beforeOnce(data) {
            ListeTransitionEnter();
          },
          async leave(data) {
              const done = this.async();
              PageTransition();
              await delay(700);
              done();
          },
          async enter(data) {
            PageTransitionEnter();
            AddCurrentClass();
            AddCurrentClassMobile();
            contentAnimation();
            ListeTransitionEnter();
        },
        async once(date) {
            contentAnimation();
        }
    },
],
})
