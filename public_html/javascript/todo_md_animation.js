var btn = document.querySelectorAll(".todo-button-animation");

for (let i = 0; i < btn.length; i++) {
    btn[i].addEventListener("mouseover", function() {
        // Get element text without the "[ ]" at the beginning
        var currentText = this.textContent.substring(3);
        this.style.color = "purple";
        this.textContent = `[X] ${currentText}`;
    })
 

    btn[i].addEventListener("mouseout", function() {
        // Get element text without the "[X]" at the beginning
        var currentText = this.textContent.substring(3);
        this.style.color = "#333";
        this.textContent = `[ ] ${currentText}`;
    })
}