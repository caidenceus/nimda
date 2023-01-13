var btn = document.querySelector(".todo-button-animation");


btn.addEventListener("mouseover", function() {
    // Get element text without the "[ ]" at the beginning
    var currentText = this.textContent.substring(3);
    this.textContent = `[X] ${currentText}`;
})


btn.addEventListener("mouseout", function() {
    // Get element text without the "[X]" at the beginning
    var currentText = this.textContent.substring(3);
    this.textContent = `[ ] ${currentText}`;
})