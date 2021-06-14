let sizeButton = document.querySelectorAll('.selectionButton');

sizeButton.forEach(btn =>{
    btn.addEventListener('click', evt => {
        let current = document.querySelector('.selected');
        if(current!== null){
            current.classList.remove("selected");
        }
        btn.classList.add('selected');
    })
})


function subtractQuantity(){
    let quantity = document.querySelector('#quantity');
    if(quantity.value ==='1'){
        return;
    }
    quantity.value--;
}

function addQuantity(){
    let quantity = document.querySelector('#quantity');
    if(quantity.value ==='100'){
        return;
    }
    quantity.value++;
}
