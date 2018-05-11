//validation
function validateForm(){
	var error_bit = 0; //if this is one, return false
				
	/* rest of the form validation */
	var elem = document.getElementById('contact').elements;
	for(var i = 0; i < elem.length; i++){
		if ((elem[i].value).replace(/\s/g, "").length == 0){
			elem[i].setAttribute("style", "background-color: #ffcccc");
			if (elem[i].name == 'comment'){
				elem[i].style.width = '600px';
			}
			error_bit = 1;
		}else if (elem[i].disabled == false && elem[i].type !== 'radio' && (elem[i].value).replace(/\s/g, "").length > 0){
	
			if (elem[i].name == 'email'){
				var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
				if (emailPattern.test(elem[i].value) == false){
					elem[i].setAttribute("style", "background-color: #ffcccc");
					var error_msg = '\n** (invalid email format)';
					error_bit = 1;
				}else{
					elem[i].setAttribute("style", "background-color: #ffffff");
					elem[i+1].setAttribute("style", "background-color: #ffffff");
				}  
			}else{
				elem[i].setAttribute("style", "background-color: #ffffff");
				if (elem[i].name == 'comment'){
					elem[i].style.width = '600px';
				}	
			}
		}
	} 
	/* form validation ends here */
		
	if (error_bit > 0){ 
		alert('Please fill in fields highlighted in red '+error_msg);
		return false;
	}
}