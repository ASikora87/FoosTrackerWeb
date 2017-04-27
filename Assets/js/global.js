// Set to true if on server
var LIVE = false;

function addJavascript(jsname,pos) {
    var th = document.getElementsByTagName(pos)[0];
    var s = document.createElement('script');
    s.setAttribute('type','text/javascript');
    s.setAttribute('src',jsname);
    th.appendChild(s);
}

// Inlude js files here
addJavascript((LIVE ? 'http://autotest.harman.com:80/FoosTracker/' : '../') + 'Assets/js/main.js','body');
addJavascript((LIVE ? 'http://autotest.harman.com:80/FoosTracker/' : '../') + 'Assets/js/navBar.js','body');
addJavascript((LIVE ? 'http://autotest.harman.com:80/FoosTracker/' : '../') + 'Assets/js/dataTable.js','head');

