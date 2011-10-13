/*
 * Modified from qTip by Craig Erskine (http://qrayg.com/learn/code/qtip)
 * This code is licensed under the GNU FDL v1.3
 * (http://www.gnu.org/licenses/fdl.html)
 *
 * Compress with http://jscompress.com
 */
tooltip = {
	name: "tool-tip",
	naturalWidth: 0,
	naturalHeight: 0,
	tip: null
}
tooltip.init = function() {
	var tipNameSpaceURI = "http://www.w3.org/1999/xhtml";
	if ( !tipContainerID ) {
		var tipContainerID = "tool-tip";
	}
	var tipContainer = document.getElementById(tipContainerID);
	if ( !tipContainer ) {
		tipContainer = document.createElementNS ?
			document.createElementNS(tipNameSpaceURI, "div") :
			document.createElement("div");
		tipContainer.setAttribute("id", tipContainerID);
		document.getElementsByTagName("body").item(0).appendChild(tipContainer);
	}
	if ( !document.getElementById ) {
		return;
	}
	this.tip = document.getElementById(this.name);
	if ( this.tip ) {
		document.onmousemove = function(evt){tooltip.move(evt)};
	}
	var elem, sTitle, elements, elementList = ['area', 'a'];
	for ( var j = 0; j < elementList.length; j++ ) {
		elements = document.getElementsByTagName(elementList[j]);
		if ( elements ) {
			for ( var i = 0; i < elements.length; i++ ) {
				elem = elements[i];
				sTitle = elem.getAttribute("title");
				if ( !sTitle ) {
					sTitle = elem.getAttribute("alt");
				}
				if ( sTitle ) {
					elem.setAttribute("tiptitle", sTitle);
					elem.removeAttribute("title");
					elem.removeAttribute("alt");
					elem.onmouseover = function(){tooltip.show(this.getAttribute('tiptitle'))};
					elem.onmouseout = function(){tooltip.hide()};
				}
			}
		}
	}
}
tooltip.move = function(evt) {
	var x, y, winWidth;
	if ( typeof(window.innerWidth) == 'number' ) {
		winWidth = window.innerWidth; // Non-IE
	} else if ( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
		winWidth = document.documentElement.clientWidth; // IE 6+ in 'standards compliant mode'
	}
	if ( document.all ) {
		// IE
		x = (document.documentElement && document.documentElement.scrollLeft) ? document.documentElement.scrollLeft : document.body.scrollLeft;
		y = (document.documentElement && document.documentElement.scrollTop) ? document.documentElement.scrollTop : document.body.scrollTop;
		x += window.event.clientX;
		y += window.event.clientY;
	} else {
		// Good Browsers
		x = evt.pageX;
		y = evt.pageY;
	}
	this.tip.style.left = (x - this.naturalWidth*x/winWidth) + "px";
	this.tip.style.top = (y + 15) + "px";
}
tooltip.show = function(text) {
	if ( !this.tip ) {
		return;
	}
	this.tip.innerHTML = text;
	this.tip.style.display = "block";
	this.naturalWidth = this.tip.offsetWidth;
	this.naturalHeight = this.tip.offsetHeight;
}
tooltip.hide = function() {
	if ( !this.tip ) {
		return;
	}
	this.tip.innerHTML = "";
	this.tip.style.display = "none";
}
window.onload = function() {
	tooltip.init();
}
