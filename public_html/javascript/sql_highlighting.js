var sql_sections = document.querySelectorAll('.lang-sql');


const colors = {
    'SELECT': '#2777ff', // Blue
    'ORDER': '#2777ff',  // Blue
    'WHERE': '#2777ff',  // Blue
    'BY': '#2777ff',     // Blue
    'GROUP': '#2777ff',  // Blue
    'FROM': '#2777ff',   // Blue
    'UNION': '#2777ff',  // Blue
    'NULL': '#f79d28'    // Orange
};


function replaceAll(string, search, replace) {
    return string.split(search).join(replace);
}


for (let i = 0; i < sql_sections.length; i++) {
    var temp = sql_sections[i].innerHTML;

    for (const [key, value] of Object.entries(colors)) {
        temp = replaceAll(temp, key, `<span style="color: ${value}">${key}</span>`);
    }

    sql_sections[i].innerHTML = temp;
}


