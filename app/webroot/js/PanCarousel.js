/*<![CDATA[*/
// PanCarousel (20-11-2009)


// The Pan Carousel is a highly configurable, continuous scrolling carousel.
// The Pan Carousel scrolls left or right and the scroll speed relative on the mouse position from the carousel ends.
// Alteratively the scroll direction may be changed, paused or restarted by element event calls.
// The code allows as many Pan Carousels on the page as required.

// ****** Application Notes

// **** The HTML and CSS Code
//
// The contents of the Pan Carousel is defined as normal HTML on the pagenested in a DIV element.
// This DIV element must be assigned a unique ID attribute and nested in a parent DIV element.
// This parent DIV element must be assigned a style position of 'relative' or 'absolute' and
// width and height specified by CSS class name or inline style.
// e.g.
//   <div class="V" >
//    <div id="V1" >
//     <img src="One.gif" width="100" height="50" />
//     <img src="Two.gif" width="100" height="50" />
//     <img src="Three.gif" width="100" height="50" />
//    </div>
//   </div>


// **** Initialising the Script
//
// the script must be initialised after the page has loaded by creating a new instance of the script.
// e.g.
//  var S=new zxcPanCarousel({
//   id:'H1',         // the unique id name of the div to scroll.                 (string)
//   mode:'H',        // the mode, H = horizontal, V = vertical.                  (string, default = H)
//   defaultspeed:1,  // (optional) the default speed to pan, 1 = slow, 5 = fast. (digits, default = 1)
//   separation:5,    // (optional) the separation between the div elements.      (digits, default = 0)
//   direction:-1,    // (optional) the initial direction, 1 or -1.               (digits, default = 1)
//   start:true,      // (optional) start automatically.                          (boolean, default = false = no autostart)
//   panends:{        // (optional) increase the speed by mouseover of the ends.  (object, default = No increase the speed by mouseover of the ends)
//    distance:50,     // (optional) the distance from the ends to pan.      digits, default = parent node width/4)
//    maxspeed:10,     // (optional) the maximum speed to pan.              (digits, default = 5)
//    mouseout:true,   // (optional) restart default pan onmouseout.        (boolean, default = false = no restart)
//    reverse:true     // (optional) reverse the pan direction of the ends. (boolean, default = false = no reverse)
//   }
//  });
//
// This instance must be assigned to a variable if script functions are to be called from other elements.
// e.g.
//  S.Button({
//    id:'B2',           // the unique id name of the button element.                (string)
//    progressive:true,  // (optional) progressively increase the pan speed.         (boolean, default = false = no prgressive increase)
//    direction:1,      // (optional) the direction, 1 or -1.                        (digits, default = the current direction)
//    minspeed:1,        // (optional) the maximum speed to pan.                     (digits, default = the default speed)
//    maxspeed:10,       // (optional) the maximum speed to pan.                     (digits, default = minspeed*5)
//    duration:2000,     // (optional) the increase duration in milliseconds.        (digits, default = 2000)
//    start:'mouseover', // (optional) the event type to execute the requirement.    (string)
//    stop:'mouseout'    // (optional) the event type to stop the pan.               (string)
//   }
//  );
//
// ****** Functional Code(5.39K) - No Need to Change.

function zxcPanCarousel(opts) {
    var slide = document.getElementById(opts.id);
    if (slide) {
        this.obj = slide.parentNode;
        slide.style.position = 'absolute';
        var mde = typeof (opts.mode) == 'string' ? opts.mode : 'H';
        this.mde = mde.charAt(0).toUpperCase() == 'V' ? ['top', 'left', 'height', 1, 'offsetHeight'] : ['left', 'top', 'width', 0, 'offsetWidth'];
        var clds = null;
        clds = slide.childNodes;
        this.clds = [];
        var s = typeof (opts.separation) == 'number' ? opts.separation : 0;
        for (var lft = 0, z0 = 0; z0 < clds.length; z0++) {
            if (clds[z0].nodeType == 1) {
                clds[z0].style.position = 'absolute';
                clds[z0].style[this.mde[0]] = lft + 'px';
                clds[z0].style[this.mde[1]] = '0px';
                lft += clds[z0][this.mde[4]] + s;
                this.clds.push(clds[z0]);
            }
        }
        slide.style[this.mde[2]] = lft + 'px';
        this.slide = [[slide, -lft]];
        var nu = Math.max(Math.ceil(this.obj[this.mde[4]] / lft) + 1, 3);
        for (var z1 = 0; z1 < nu; z1++) {
            this.slide[z1 + 1] = [slide.cloneNode(true), lft * z1];
            this.obj.appendChild(this.slide[z1 + 1][0]);
        }
        this.lft = lft;
        this.spd = typeof (opts.defaultspeed) == 'number' ? opts.defaultspeed : 1;
        this.ud = typeof (opts.direction) == 'number' ? opts.direction > 0 ? 1 : -1 : 1;
        this.inc = opts.start ? this.spd : 0;
        this.to1 = null;
        this.to2 = null;
        this.Pan();
        if (opts.panends) {
            this.PanEnds(opts.panends);
        }
    }
}

zxcPanCarousel.prototype.PanEnds = function (opts) {
    this.max = typeof (opts.maxspeed) == 'number' ? opts.maxspeed : 5;
    pan = typeof (opts.distance) == 'number' ? opts.distance : this.obj[this.mde[4]] / 4;
    this.pan = [pan, this.obj[this.mde[4]] - pan];
    this.ends = opts.reverse ? [-1, 1] : [1, -1];
    this.addevt(this.obj, 'mousemove', 'Move');
    if (opts.mouseout) {
        this.addevt(this.obj, 'mouseout', 'ReStart', this.obj);
    }
}

zxcPanCarousel.prototype.Button = function (opts) {
    var obj = document.getElementById(opts.id), o = obj;
    if (obj) {
        if (opts.progressive) {
            o = { min: opts.minspeed, max: opts.maxspeed, ms: opts.duration, obj: obj };
        }
        if (opts.start) {
            this.addevt(obj, opts.start, opts.progressive ? 'Progressive' : 'ReStart', o);
        }
        if (opts.direction) {
            var ud = typeof (opts.direction) == 'number' ? opts.direction > 0 ? 1 : -1 : false;
            this.addevt(obj, opts.start, 'Direction', ud);
        }
        if (opts.restart) {
            this.addevt(obj, opts.restart, 'ReStart', obj);
        }
        if (opts.stop) {
            this.addevt(obj, opts.stop, 'Stop', obj);
        }
    }
}

zxcPanCarousel.prototype.Direction = function (ud, e) {
    this.ud = typeof (ud) == 'number' ? ud > 0 ? 1 : -1 : 0;
}

zxcPanCarousel.prototype.Progressive = function (o, e) {
    if (!e || !o.obj || this.CkEvt(e, o.obj)) {
        this.Stop();
        this.Pan();
        this.min = typeof (o.min) == 'number' ? o.min : this.spd;
        this.max = typeof (o.max) == 'number' ? o.max : this.min * 10;
        this.mS = typeof (o.ms) == 'number' ? o.ms : 2000;
        this.pi = Math.PI / (2 * this.mS);
        this.srt = new Date().getTime();
        this.Progress();
    }
}

zxcPanCarousel.prototype.Progress = function (obj) {
    var oop = this, ms = new Date().getTime() - this.srt;
    this.inc = Math.floor(this.max - (this.max - this.min) * Math.cos(this.pi * ms));
    if (ms < this.mS) this.to2 = setTimeout(function () { oop.Progress() }, 10);
}

zxcPanCarousel.prototype.Stop = function () {
    clearTimeout(this.to1);
    clearTimeout(this.to2);
}

zxcPanCarousel.prototype.Next = function (nu, ud) {
    this.ud = typeof (ud) == 'number' ? ud > 0 ? 1 : -1 : this.ud;
    this.inc = ud ? this.inc : 0;
    var lft = this.clds[nu % this.clds.length].offsetLeft;
    for (var z0 = 0; z0 < this.slide.length; z0++) {
        this.slide[z0][1] += lft * this.ud;
    }
    this.Pan();
}

zxcPanCarousel.prototype.Pan = function () {
    clearTimeout(this.to1);
    for (var oop = this, lgth = this.slide.length, z0 = 0; z0 < lgth; z0++) {
        this.slide[z0][1] += this.inc * this.ud;
        this.slide[z0][0].style[this.mde[0]] = this.slide[z0][1] + 'px';
        if ((this.ud < 0 && this.slide[z0][1] < -this.lft) || (this.ud > 0 && this.slide[z0][1] > this.lft * (lgth - 2))) {
            this.slide[z0][1] += this.lft * lgth * (this.ud < 0 ? 1 : -1);
        }
    }
    if (this.ud != 0 && this.inc != 0) {
        this.to1 = setTimeout(function () { oop.Pan(); }, 20);
    }
}

zxcPanCarousel.prototype.CkEvt = function (e, obj) {
    var eo = e.relatedTarget ? e.relatedTarget : e.type == 'mouseout' ? e.toElement : e.fromElement;
    if (eo) {
        while (eo.parentNode) {
            if (eo == obj) {
                return false;
            }
            eo = eo.parentNode;
        }
    }
    return true;
}

zxcPanCarousel.prototype.ReStart = function (obj, e) {
    if (this.CkEvt(e, obj)) {
        this.inc = this.spd;
        this.Pan();
    }
}

zxcPanCarousel.prototype.Move = function (x, e) {
    var x = zxcMse(e)[this.mde[3]] - zxcPos(this.obj)[this.mde[3]];
    this.inc = 0;
    if (x < this.pan[0]) {
        this.ud = this.ends[0];
        this.inc = this.max * (1 - x / this.pan[0]);
    }
    if (x > this.pan[1]) {
        this.ud = this.ends[1];
        this.inc = this.max * ((x - this.pan[1]) / this.pan[0]);
    }

    this.Pan();
}

zxcPanCarousel.prototype.addevt = function (o, t, f, p) {
    var oop = this;
    if (o.addEventListener) o.addEventListener(t, function (e) { return oop[f](p, e); }, false);
    else if (o.attachEvent) o.attachEvent('on' + t, function (e) { return oop[f](p, e); });
    else {
        var prev = o['on' + t];
        if (prev) o['on' + t] = function (e) { prev(e); oop[f](p, e); };
        else o['on' + t] = o[f];
    }
}

function zxcMse(ev) {
    if (!ev) var ev = window.event;
    if (document.all) return [ev.clientX + zxcDocS()[0], ev.clientY + zxcDocS()[1]];
    return [ev.pageX, ev.pageY];
}

function zxcDocS() {
    if (!document.body.scrollTop) return [document.documentElement.scrollLeft, document.documentElement.scrollTop];
    return [document.body.scrollLeft, document.body.scrollTop];
}

function zxcPos(obj) {
    var rtn = [0, 0];
    while (obj) {
        rtn[0] += obj.offsetLeft;
        rtn[1] += obj.offsetTop;
        obj = obj.offsetParent;
    }
    return rtn;
}