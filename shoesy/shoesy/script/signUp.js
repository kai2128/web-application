
function nameExistedErr(i){
    if(i===1)
        document.querySelector("#nameError").style.display = "block";
    else
        document.querySelector("#nameError").style.display = "none";
}

function emailExistedErr(i){
    if(i===1)
        document.querySelector("#emailError").style.display = "block";
    else
        document.querySelector("#emailError").style.display = "none";
}

function nameCheck(str) {
    let xmlhttp;
    if (str.length !== 0) {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                if (xmlhttp.responseText === '1') {
                    nameExistedErr(1);
                    document.querySelector("button").disabled = true;
                } else {
                    nameExistedErr(0);
                    document.querySelector("button").disabled = false;
                }
            }
        };
        xmlhttp.open("GET", "signUp.php?username=" + str, true);
        xmlhttp.send(null);
    }
}

function emailCheck(str) {
    let xmlhttp;
    if (str.length !== 0) {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                if (xmlhttp.responseText === '1') {
                    emailExistedErr(1);
                    document.querySelector("button").disabled = true;
                } else {
                    emailExistedErr(0);
                    document.querySelector("button").disabled = false;
                }
            }
        };
        xmlhttp.open("GET", "signUp.php?email=" + str, true);
        xmlhttp.send(null);
    }
}