function addJavascript(jsname,pos) {
var th = document.getElementsByTagName(pos)[0];
var s = document.createElement('script');
s.setAttribute('type','text/javascript');
s.setAttribute('src',jsname);
th.appendChild(s);
}

// Inlude js files here
addJavascript('../Assets/js/main.js','body');
addJavascript('../Assets/js/navBar.js','body');
addJavascript('../Assets/js/dataTable.js','body');

