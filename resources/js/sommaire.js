const titles = document.querySelectorAll("h2");
const sommaire = document.querySelector('#sommaire');

function setup() {
    let ul = document.createElement("ul");
    sommaire.appendChild(ul);
    Array.from(titles).forEach(title => {
        let li = document.createElement("li");
        ul.appendChild(li);

        let a = document.createElement("a");
        a.href = "#" + clean(title.innerText);
        a.innerText = title.innerText;
        li.appendChild(a);
    })
}
function clean (string)
{
    string = string.replaceAll(' ', '-');
    return string;
}

setup();
