function toggleModal(event){
    const currentTarget = event.target
    const targetModal = document.getElementById(currentTarget.getAttribute("sp-target"))

    targetModal.style.display = "flex"
    targetModal.addEventListener("click", (_event)=>{
        if(_event.target.classList.contains("sp-modal")){
            targetModal.style.display = "none"
        }
    })
}

function hideElement(event){
    const targetElement = document.getElementById(event.target.getAttribute("sp-target"));
    console.log(targetElement)
    targetElement.classList.toggle("sp-hidden")
}