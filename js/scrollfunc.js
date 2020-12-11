function setuphover() {
        var el = getElementsByClassName('back');
        for(var i = 0; i < el.length; i++) {

            var box = document.getElementById(el[i].id + '_boxx');
                box.style.display = 'none';

            el[i].onmouseover = function(e) {
                var mousePos = getMouseLocation(e);

                var box = document.getElementById(this.id + '_boxx');
                box.style.display = 'block';
                box.style.top = (mousePos[1]-200) + 'px';
                box.style.left = (mousePos[0]+50) + 'px';
            };
            el[i].onmousemove = function(e) {
                var mousePos = getMouseLocation(e);

                var box = document.getElementById(this.id + '_boxx');
                box.style.top = (mousePos[1]-200) + 'px';
                box.style.left = (mousePos[0]+50) + 'px';
            };
            el[i].onmouseout = function() {
                var box = document.getElementById(this.id + '_boxx');
                box.style.display = 'none';
            };
        }
    }

    function getMouseLocation(e) {
        if (!e) var e = window.event;
        if (e.pageX || e.pageY) {
            posx = e.pageX;
            posy = e.pageY;
        }
        else if (e.clientX || e.clientY) {
            posx = e.clientX + document.body.scrollLeft    + document.documentElement.scrollLeft;
            posy = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
        }
        return new Array(posx, posy);
    }

    function getElementsByClassName(className, tag, elm){
        var testClass = new RegExp("(^|\\\\s)" + className + "(\\\\s|$)");
        var tag = tag || "*";
        var elm = elm || document;
        var elements = (tag == "*" && elm.all)? elm.all : elm.getElementsByTagName(tag);
        var returnElements = [];
        var current;
        var length = elements.length;
        for(var i=0; i<length; i++){
            current = elements[i];
            if(testClass.test(current.className)){
                returnElements.push(current);
            }
        }
        return returnElements;
    }

    function fn(e) {
    	var tooltip = document.querySelectorAll('.post_hover');
        for (var i=tooltip.length; i--;) {
            tooltip[i].style.left = e.clientX + 'px';
            tooltip[i].style.top = e.clientY + 'px';
        }
    }

    function myFunction(i) {
            var box = document.getElementById(i + '_liste');
            box.style.opacity = 1;
            box.style.display = 'block';
            box.style.position = 'fixed';
    }

    function normalImg(p) {
        var box = document.getElementById(p + '_liste');
        box.style.opacity = 0;
        box.style.display = 'none';
        box.style.position = 'absolute';
    }

    function listeFunc(i) {
        var box = document.getElementById(i + '_box');
        var col = document.getElementById(i + '_color');
        var arrow = document.getElementById(i + '_color_arrow');
        box.style.display = 'block';
        box.style.position = 'fixed';
        col.classList.toggle('post_color'+ i);
        arrow.classList.toggle('post_color'+ i);
    }
    function listeFuncOut(p) {
        var box = document.getElementById(p + '_box');
        var col = document.getElementById(p + '_color');
        var arrow = document.getElementById(p + '_color_arrow');
        box.style.display = 'none';
       box.style.position = 'absolute';
       col.classList.toggle('post_color'+ p);
       arrow.classList.toggle('post_color'+ p);
    }

    ////// MENU HOVER COLOR

    function changeColorIn_home() {
        var fond = document.getElementById("Menu_background");
        fond.classList.toggle('active_home');
    }
    function changeColorOut_home() {
        var fond = document.getElementById("Menu_background");
        fond.classList.toggle('active_home');
    }

    function changeColorIn_work() {
        var fond = document.getElementById("Menu_background");
        fond.classList.toggle('active_work');
    }
    function changeColorOut_work() {
        var fond = document.getElementById("Menu_background");
        fond.classList.toggle('active_work');
    }
    function changeColorIn_infos() {
        var fond = document.getElementById("Menu_background");
        fond.classList.toggle('active_infos');
    }
    function changeColorOut_infos() {
        var fond = document.getElementById("Menu_background");
        fond.classList.toggle('active_infos');
    }

    ////// CALL THE MOBILE MENU

    function loadmenu() {
          var archive = document.getElementById("liste_slide_mobile");
          var bodyscroll = document.getElementById("johl");
          var arrow = document.getElementById("animationfleche");
          var arrowsec = document.getElementById("animationflechedeux");
          var work_not_bold = document.getElementById("work_link");
          var project_in_bold = document.getElementById("changeit");
          archive.classList.toggle('close');
          bodyscroll.classList.toggle('noscroll');
          arrow.classList.toggle('tourne');
          arrowsec.classList.toggle('tournedeux');
          work_not_bold.classList.toggle('current-menu-item');
          project_in_bold.classList.toggle('bold_link');

    }
    function hidemenu() {
          var archive = document.getElementById("liste_slide_mobile");
          var bodyscroll = document.getElementById("johl");
          var arrowclose = document.getElementById("animationfleche");
          var arrowsecclose = document.getElementById("animationflechedeux");
          var work_not_bold = document.getElementById("work_link");
          var project_in_bold = document.getElementById("changeit");
          archive.classList.toggle('close');
          bodyscroll.classList.toggle('noscroll');
          arrowclose.classList.toggle('tourne');
          arrowsecclose.classList.toggle('tournedeux');
          work_not_bold.classList.toggle('current-menu-item');
          project_in_bold.classList.toggle('bold_link');
    }
    function remove_no_scroll() {
          var bodyscroll = document.getElementById("johl");
          if (bodyscroll.classList.contains("noscroll")) {
           bodyscroll.classList.remove("noscroll");
         }
    }
