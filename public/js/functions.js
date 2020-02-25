document.addEventListener("DOMContentLoaded", () => {
    const openPanel = document.querySelector("#openPanel");
    const closePanel = document.querySelector("#closePanel");
    const editPanel = document.querySelector(".edit-panel");


    if(openPanel){
        openPanel.addEventListener("click", (e) => {
            editPanel.classList.add("show");
        })
    }

    if(closePanel){
        closePanel.addEventListener("click", (e) => {
            editPanel.classList.remove("show");
        })
    }

});