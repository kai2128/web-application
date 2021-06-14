//create a function to toggle all searched result

function toggleAnswer(id){
    var ques=document.getElementById(id);
    var ans=ques.nextElementSibling;
    if(ans.classList.contains("toggleAnswer")){
        ques.children[0].innerHTML="+";
        ans.classList.remove("toggleAnswer");
    }
    else{
        ques.children[0].innerHTML="-";
        ans.classList.add("toggleAnswer");
    }
}

function toggleQuestion(id){
    var category=document.getElementById(id);
    var ques=category.nextElementSibling;
    if(ques.classList.contains("toggleQuestion")){
        category.children[0].innerHTML="+";
        ques.classList.remove("toggleQuestion");
    }
    else{
        category.children[0].innerHTML="-";
        ques.classList.add("toggleQuestion");
    }
}