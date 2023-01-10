const colors = [
    '#099fe3', '#0892d0', '#0785bd', '#0777aa', '#066a97', '#055d84', '#045072',
    '#04425f', '#03354c', '#022839', '#011b26', '#010d13'
];

const colorsSize = colors.length;
const a = document.querySelectorAll('.waterfall-color');

for (let i = 0; i < a.length; i += 1) {
    if (i < colorsSize)
        a[i].style.backgroundColor  = colors[i];
    else
        a[i].style.backgroundColor = '#000000';
}