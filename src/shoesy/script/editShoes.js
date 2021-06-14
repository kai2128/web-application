var form = document.getElementById("form");
var banner = document.getElementById("banner");
var allShoes = document.getElementById("allShoes");
var id_form = document.getElementById("id_form");
var currentImage = document.getElementById("currentImage");
var image_form = document.getElementById("image_form");
var imageName = document.getElementById("imageName");
var name_form = document.getElementById("name_form");
var brand_form = document.getElementById("brand_form");
var category_form = document.getElementById("category_form");
var year_form = document.getElementById("year_form");
var description_form = document.getElementById("description_form");
var male_form = document.getElementById("male_form");
var female_form = document.getElementById("female_form");
var uk0p5_form = document.getElementById("uk0p5_form");
var uk1_form = document.getElementById("uk1_form");
var uk1p5_form = document.getElementById("uk1p5_form");
var uk2_form = document.getElementById("uk2_form");
var uk2p5_form = document.getElementById("uk2p5_form");
var uk3_form = document.getElementById("uk3_form");
var uk3p5_form = document.getElementById("uk3p5_form");
var uk4_form = document.getElementById("uk4_form");
var uk4p5_form = document.getElementById("uk4p5_form");
var uk5_form = document.getElementById("uk5_form");
var uk5p5_form = document.getElementById("uk5p5_form");
var uk6_form = document.getElementById("uk6_form");
var uk6p5_form = document.getElementById("uk6p5_form");
var uk7_form = document.getElementById("uk7_form");
var uk7p5_form = document.getElementById("uk7p5_form");
var uk8_form = document.getElementById("uk8_form");
var uk8p5_form = document.getElementById("uk8p5_form");
var uk9_form = document.getElementById("uk9_form");
var uk9p5_form = document.getElementById("uk9p5_form");
var uk10_form = document.getElementById("uk10_form");
var uk10p5_form = document.getElementById("uk10p5_form");
var uk11_form = document.getElementById("uk11_form");
var uk11p5_form = document.getElementById("uk11p5_form");
var uk12_form = document.getElementById("uk12_form");
var uk12p5_form = document.getElementById("uk12p5_form");
var uk13_form = document.getElementById("uk13_form");
var uk13p5_form = document.getElementById("uk13p5_form");
var uk14_form = document.getElementById("uk14_form");
var price_form = document.getElementById("price_form");
var discount_form = document.getElementById("discount_form");
var submit_form = document.getElementById("submit_form");
var id_delete = document.getElementById("id_delete");
var submit_delete = document.getElementById("submit_delete");
var cancel_form = document.getElementById("cancel_form");

var chooseImage = document.getElementById("image_form");
var imageName = document.getElementById("imageName");
chooseImage.addEventListener("change", function () {
    imageName.value = this.files[0].name;
    imageName.style.color = "seagreen";
});

function validation() {
    var valid = true;
    var currentYear = new Date().getFullYear();
    if (submit_form.innerHTML == "Save") {
        if (/^[A-Za-z]+[ A-Za-z0-9~!?|/@#$%^&*()_+=:;<>,.-]*$/.test(name_form.value) && name_form.value != "" &&
            /^[0-9]*$/.test(year_form.value) && year_form.value != 4 && year_form.value <= currentYear && year_form.value >= 1970 && year_form.value != "" &&
            /^[A-Za-z0-9]+[ A-Za-z0-9~!?|/@#$%^&*()_+=:;<>,.-]*$/.test(description_form.value) && description_form.value != "" &&
            !(uk0p5_form.checked == false && uk1_form.checked == false && uk1p5_form.checked == false && uk2_form.checked == false &&
                uk2p5_form.checked == false && uk3_form.checked == false && uk3p5_form.checked == false && uk4_form.checked == false &&
                uk4p5_form.checked == false && uk5_form.checked == false && uk5p5_form.checked == false && uk6_form.checked == false &&
                uk6p5_form.checked == false && uk7_form.checked == false && uk7p5_form.checked == false && uk8_form.checked == false &&
                uk8p5_form.checked == false && uk9_form.checked == false && uk9p5_form.checked == false && uk10_form.checked == false &&
                uk10p5_form.checked == false && uk11_form.checked == false && uk11p5_form.checked == false && uk12_form.checked == false &&
                uk12p5_form.checked == false && uk13_form.checked == false && uk13p5_form.checked == false && uk14_form.checked == false) &&
            /^[0-9]+[.]+[[0-9]{2}]*$/.test(price_form.value) && price_form.value != "" &&
            /^[0-9]*$/.test(discount_form.value) && discount_form.value.length <= 3 && discount_form.value != ""
        ) {
            submit_form.removeAttribute("disabled");
        }
        else {
            submit_form.setAttribute("disabled", "");
        }
    }
    else if (submit_form.innerHTML == "Add") {
        if (image_form.value != "" &&
            /^[A-Za-z]+[ A-Za-z0-9~!?|/@#$%^&*()_+=:;<>,.-]*$/.test(name_form.value) && name_form.value != "" &&
            /^[0-9]*$/.test(year_form.value) && year_form.value != 4 && year_form.value <= currentYear && year_form.value >= 1970 && year_form.value != "" &&
            /^[A-Za-z]+[ A-Za-z0-9~!?|/@#$%^&*()_+=:;<>,.-]*$/.test(description_form.value) && description_form.value != "" &&
            !(uk0p5_form.checked == false && uk1_form.checked == false && uk1p5_form.checked == false && uk2_form.checked == false &&
                uk2p5_form.checked == false && uk3_form.checked == false && uk3p5_form.checked == false && uk4_form.checked == false &&
                uk4p5_form.checked == false && uk5_form.checked == false && uk5p5_form.checked == false && uk6_form.checked == false &&
                uk6p5_form.checked == false && uk7_form.checked == false && uk7p5_form.checked == false && uk8_form.checked == false &&
                uk8p5_form.checked == false && uk9_form.checked == false && uk9p5_form.checked == false && uk10_form.checked == false &&
                uk10p5_form.checked == false && uk11_form.checked == false && uk11p5_form.checked == false && uk12_form.checked == false &&
                uk12p5_form.checked == false && uk13_form.checked == false && uk13p5_form.checked == false && uk14_form.checked == false) &&
            /^[0-9]+[.]+[[0-9]{2}]*$/.test(price_form.value) && price_form.value != "" &&
            /^[0-9]*$/.test(discount_form.value) && discount_form.value.length <= 3 && discount_form.value != ""
        ) {
            submit_form.removeAttribute("disabled");
        }
        else {
            submit_form.setAttribute("disabled", "");
        }
    }
}

function showForm(element, id, image, name, brand, category, year, description, gender, sizes, price, discount) {
    form.classList.add("showForm");
    banner.classList.add("hide");
    allShoes.classList.add("hide");
    if (element.getAttribute("class") == "edit") {
        submit_form.setAttribute("name", "submit_edit");
        id_form.value = id;
        currentImage.setAttribute("src", "data:image/jpeg;base64," + image);
        name_form.value = name;
        brand_form.value = brand;
        category_form.value = category;
        year_form.value = year;
        description_form.value = description;
        if (gender == "Male") {
            male_form.checked = true;
        }
        else {
            female_form.checked = true;
        }
        for (var i = 0; i < sizes.length; i++) {
            if (sizes[i] == 0.5) {
                uk0p5_form.checked = true;
            }
            else if (sizes[i] == 1) {
                uk1_form.checked = true;
            }
            else if (sizes[i] == 1.5) {
                uk1p5_form.checked = true;
            }
            else if (sizes[i] == 2) {
                uk2_form.checked = true;
            }
            else if (sizes[i] == 2.5) {
                uk2p5_form.checked = true;
            }
            else if (sizes[i] == 3) {
                uk3_form.checked = true;
            }
            else if (sizes[i] == 2.5) {
                uk2p5_form.checked = true;
            }
            else if (sizes[i] == 3) {
                uk3_form.checked = true;
            }
            else if (sizes[i] == 3.5) {
                uk3p5_form.checked = true;
            }
            else if (sizes[i] == 4) {
                uk4_form.checked = true;
            }
            else if (sizes[i] == 4.5) {
                uk4p5_form.checked = true;
            }
            else if (sizes[i] == 5) {
                uk5_form.checked = true;
            }
            else if (sizes[i] == 5.5) {
                uk5p5_form.checked = true;
            }
            else if (sizes[i] == 6) {
                uk6_form.checked = true;
            }
            else if (sizes[i] == 6.5) {
                uk6p5_form.checked = true;
            }
            else if (sizes[i] == 7) {
                uk7_form.checked = true;
            }
            else if (sizes[i] == 7.5) {
                uk7p5_form.checked = true;
            }
            else if (sizes[i] == 8) {
                uk8_form.checked = true;
            }
            else if (sizes[i] == 8.5) {
                uk8p5_form.checked = true;
            }
            else if (sizes[i] == 9) {
                uk9_form.checked = true;
            }
            else if (sizes[i] == 9.5) {
                uk9p5_form.checked = true;
            }
            else if (sizes[i] == 10) {
                uk10_form.checked = true;
            }
            else if (sizes[i] == 10.5) {
                uk10p5_form.checked = true;
            }
            else if (sizes[i] == 11) {
                uk11_form.checked = true;
            }
            else if (sizes[i] == 11.5) {
                uk11p5_form.checked = true;
            }
            else if (sizes[i] == 12) {
                uk12_form.checked = true;
            }
            else if (sizes[i] == 12.5) {
                uk12p5_form.checked = true;
            }
            else if (sizes[i] == 13) {
                uk13_form.checked = true;
            }
            else if (sizes[i] == 13.5) {
                uk13p5_form.checked = true;
            }
            else if (sizes[i] == 14) {
                uk14_form.checked = true;
            }
        }
        price_form.value = price;
        discount_form.value = discount;
        submit_form.innerHTML = "Save";
    }
    else if (element.getAttribute("class") == "addBanner") {
        submit_form.setAttribute("name", "submit_add");
        submit_form.innerHTML = "Add"
        currentImage.removeAttribute("src");
        currentImage.style.fontSize = "0.7rem";
        currentImage.style.color = "red";
        currentImage.style.textDecoration = "underline";
        currentImage.style.backgroundColor = "whitesmoke";
        id_form.value = id;
    }
}

function closeForm(element) {
    form.classList.remove("showForm");
    banner.classList.remove("hide");
    allShoes.classList.remove("hide");
    id_form.removeAttribute("disabled");
    if (element.innerHTML == "Add") {
        alert("Shoe added successfully!");
    }
    else if (element.innerHTML == "Save") {
        alert("Shoe edited successfully!");
    }
    window.scrollTo(0, 0);
}

function cancelEdit(element) {
    var c = confirm("Cancel current action?");
    if (c == true) {
        closeForm(element);
        reset_form.click();
        submit_form.innerHTML = "Add";
        imageName.style.color = "red";
    }
}

function deleteShoe(id) {
    var c = confirm("Delete this shoe?");
    if (c == true) {
        id_delete.value = id;
        submit_delete.click();
    }
}

function checkid(id) {

    console.log(id);

}