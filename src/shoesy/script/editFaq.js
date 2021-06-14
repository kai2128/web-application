var form = document.getElementById("form");
var banner = document.getElementById("banner");
var allFaq = document.getElementById("allFaq").children[0];
var id_form = document.getElementById("id_form");
var category_form = document.getElementById("category_form");
var question_form = document.getElementById("question_form");
var answer_form = document.getElementById("answer_form");
var submit_form = document.getElementById("submit_form");
var id_delete = document.getElementById("id_delete");
var submit_delete = document.getElementById("submit_delete");
var reset_form = document.getElementById("reset_form");

function showForm(element, id, category, question, answer) {
    form.classList.add("showForm");
    banner.classList.add("hide");
    allFaq.classList.add("hide");

    //if user click edit
    if (element.getAttribute("class") == "edit") {
        submit_form.setAttribute("name", "submit_edit");
        id_form.value = id;
        category_form.value = category;
        question_form.value = question;
        answer_form.value = answer;
        submit_form.innerHTML = "Save";
    }
    //user click add
    else {
        submit_form.setAttribute("name", "submit_add");
        id_form.value = id;
    }
}
//check the content type by admin
function validation() {
    if (/^[A-Za-z0-9]+[ A-Za-z0-9~!?|/@#$%^&*()_+=:;<>,.-]*$/.test(question_form.value) && question_form.value != "" &&
        /^[A-Za-z0-9]+[ A-Za-z0-9~!?|/@#$%^&*()_+=:;<>,.-]*$/.test(answer_form.value) && answer_form.value != "") {
        console.log("validate done");
        submit_form.removeAttribute("disabled");
    }
    else {
        submit_form.setAttribute("disabled", "");
    }
};

function cancelEdit(element) {
    var c = confirm("Cancel current action?");
    if (c == true) {
        closeForm(element);
        reset_form.click();
    }
}

function closeForm(element) {
    form.classList.remove("showForm");
    banner.classList.remove("hide");
    allFaq.classList.remove("hide");
    if (element.innerHTML == "Add") {
        alert("FAQ added successfully!");
    }
    else if (element.innerHTML == "Save") {
        alert("FAQ edited successfully!");
    }
    window.scrollTo(0, 0);
}

function deleteFaq(id) {
    var c = confirm("Delete this FAQ?");
    if (c == true) {
        id_delete.value = id;
        submit_delete.click();
    }
}