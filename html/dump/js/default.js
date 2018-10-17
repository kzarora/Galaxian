	var currenttheme="default";
	var theme=localStorage.getItem("currenttheme");
  var curcom="C++";
	var com=localStorage.getItem("curcom");
	var code = $(".codemirror-textarea")[0];
	var editor = CodeMirror.fromTextArea(code, {
		"lineNumbers": true,
		"styleActiveLine": true,
		"autoCloseBrackets": true,
		"extraKeys" :{ "Alt-F":"findpersistent"},
		"mode":"text/x-c++src"
	});
function savedata(){
	localStorage.setItem("currenttheme",theme);
	localStorage.setItem("curcom",com);
}

window.onload = function() {
			editor.setOption("theme",localStorage.getItem("currenttheme"));
			editor.setOption("com",localStorage.getItem("curcom"));
			document.getElementById(localStorage.getItem("currenttheme")).selected="true";
			document.getElementById(localStorage.getItem("curcom")).selected="true";
}
var input=document.getElementById("select");
var input2=document.getElementById("compiler");
var ca="text/x-c++src";
var ca1="text/x-java";
var ca2="text/x-csrc";

function selectCompiler(){
	com=input2.options[input2.selectedIndex].textContent;
  alert(com);
	if(com.localeCompare("C++")==0)
	{
			editor.setOption("mode",ca);
	}
	else if(!com.localeCompare("C"))
	{
			editor.setOption("mode",ca2);
	}
	else
	{		//alert("Hello2"+com);
			editor.setOption("mode",ca1);
	}
}

function selectTheme(){
  theme=input.options[input.selectedIndex].textContent;
  editor.setOption("theme",theme);
}
function showCode(){
	var text=editor.mirror.getValue();
	alert("hello"+text);
	document.getElementById("compiler").innerHTML = text;
}

/*

Client ID
eb32bfb04de7a2a4749144d60e6114ea
Client Secret
4c7c1ba251ed3eea6d4e674d3dced1e79d7d2714efe17a7d6c30b02b02bff270
*/
