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