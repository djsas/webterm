//var histnum = 1;

var HttpObj = {  
  create: function(){
  var xho = false;
  try {
    xho = new ActiveXObject("Msxml2.XMLHTTP");} catch(e){		
      try {
	xho = new ActiveXObject("Microsoft.XMLHTTP");} catch(e){				
	  try {
	    xho = new XMLHttpRequest();} catch(e){
	      return false;}
	}
    }
  return xho;
  }
};


function run(cmd){
  var el = document.getElementById("term");
  el.innerHTML += "[" + histnum + "] " + cmd + "<br />";
  histnum++;
  
  var xho = HttpObj.create();
  xho.open("POST", "run.php");
  xho.onreadystatechange = function(){
    if(xho.readyState == 4 && xho.status == 200){
      var res = xho.responseText;
      el.innerHTML += res;
    }
  }
  xho.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  cmd = encodeURI(cmd).replace(/&/g, "%26");
  xho.send("cmd=" + cmd);
}

function pushedKey(e){
  var in_keycode = e.keyCode;
  if(in_keycode == 13){  //pushed Enter key
    var el = document.getElementById("cmd");
    var cmd = el.value;
    el.value = "";
    run(cmd);
  }
}

// keydownイベントリスナーをセットする
function setListeners(e) {  
  addListener(document, 'keydown', pushedKey, false);
}

function addListener(elem, eventType, func, cap) { 
  if(elem.addEventListener) {
    elem.addEventListener(eventType, func, cap);
  } else if(elem.attachEvent) {
    elem.attachEvent('on' + eventType, func);
  } else {
    alert('ご利用のブラウザーはサポートされていません。');
    return false;
  }
}

// HTMLがロードされた際に、setListeners()関数を実行させる
addListener(window, 'load', setListeners, false);
