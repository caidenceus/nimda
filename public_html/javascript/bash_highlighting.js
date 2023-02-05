var bash_sections = document.querySelectorAll('.lang-bash');


const colors = {
    'sudo ': '#2777ff',    // Blue
    'apt ': '#2777ff',     // Blue
    'apt-get ': '#2777ff', // Blue
    'cd ': '#2777ff',      // Blue
    'python3 ': '#2777ff', // Blue
    'git ': '#2777ff',     // Blue
    'pip3 ': '#2777ff',    // Blue
};


function replaceAll(string, search, replace) {
    return string.split(search).join(replace);
}

for (let i = 0; i < bash_sections.length; i++) {
    var temp = bash_sections[i].innerHTML;

    for (const [key, value] of Object.entries(colors)) {
        temp = replaceAll(temp, key, `<span style="color: ${value}">${key}</span>`);
    }
    
    bash_sections[i].innerHTML = temp;
}


