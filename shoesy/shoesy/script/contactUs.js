var myname = document.getElementById("myname");
var email = document.getElementById("email");
var submit = document.getElementById("submit");
function validation() {
    if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email.value) && email.value != "" &&
        /^[a-zA-Z]+[ a-zA-Z]*$/.test(myname.value) && myname.value != "") {
        submit.removeAttribute("disabled");
    }
}