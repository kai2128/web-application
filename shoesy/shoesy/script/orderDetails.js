function minus(element){
    var temp=element.nextElementSibling.value;
    if((temp--)>1){
        element.nextElementSibling.value--;
    }
}

function add(element){
    var temp=element.previousElementSibling.value;
    if((temp++)<5){
        element.previousElementSibling.value++;
    }
}

function validation(element){
    if(/^[a-zA-Z0-9]+[ a-zA-Z0-9]*$/.test(element.value)&&
    element.value!=""){
        element.nextElementSibling.removeAttribute("disabled");
    }
}