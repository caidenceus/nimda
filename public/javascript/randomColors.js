/**
 * Generate a random RGB number between 0 and 255.
 */
function rgbRandomNumber() {
    let min = 0;
    let max = 255;
    return Math.floor(Math.random() * (max - min + 1) + min)
}


/**
 * Generate a random text color for all elements marked with the HTML class 'random-color'.
 */
function randomColor() {
    let red = rgbRandomNumber();
    let green = rgbRandomNumber();
    let blue = rgbRandomNumber();
    let rgb_color = `rgb(${red}, ${green}, ${blue})`;
    return rgb_color;
}


const a = document.querySelectorAll('.random-color');
for (let i = 0; i < a.length; i += 1) {
	  a[i].style.color = randomColor();
}