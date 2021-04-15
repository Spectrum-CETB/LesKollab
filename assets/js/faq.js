var elementOld = null;
var openClass = "Accordion__tab--open";

function toggleAccordion(element) {
    content = element.querySelector(".Accordion__tab__content");

    if(elementOld != null){
        elementOld.classList.remove(openClass);
        contentOld = elementOld.querySelector(".Accordion__tab__content");
        contentOld.style.maxHeight = "0px";
    }

    if(elementOld !== element){
        element.classList.add(openClass);
        content.style.maxHeight = content.scrollHeight + "px";
        elementOld = element;
    }else{
        elementOld = null;
    }
}