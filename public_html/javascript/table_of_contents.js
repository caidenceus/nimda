var titles = document.getElementsByClassName('toc');
var table_of_contents = document.getElementById('table-of-contents');
var tocHTML = '<h1 class="title">Table of Contents</h1>';


function replaceAll(string, search, replace)
{
    return string.split(search).join(replace);
}


function sterilizeTitle(title)
{
    let rtn = title;
    rtn = replaceAll(rtn, ' ', '-');
    rtn = rtn.toLowerCase();
    return rtn;
}


for (let i = 0; i < titles.length; i++)
{
    var title = titles[i].textContent;
    var sterile_title = sterilizeTitle(title);

    // Add the link to the table of contents HTML
    var toc_link = `<a href="#${sterile_title}" class="toc-link">${title}</a>`;
    tocHTML = tocHTML.concat(toc_link);
    
    // Update the ID of the actual h1 tag for each title
    titles[i].id = sterile_title;
}

table_of_contents.innerHTML = tocHTML;