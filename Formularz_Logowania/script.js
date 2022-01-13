function inputFocused(name){
	document.querySelector(`input[name=${name}]`).classList.toggle("focusedInput");	
}

function inputUnfocused(name){
	document.querySelector(`input[name=${name}]`).classList.remove("focusedInput");	
}

function changeClassForMany(name, classname){
	var elements = document.querySelectorAll(name);
	for(var i = 0; i < elements.length; i++){
		elements[i].classList.toggle(classname);
	}
}

function changeClassForOne(name, classname){
	document.querySelector(name).classList.toggle(classname);
}