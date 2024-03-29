const titles = document.querySelectorAll("h2");
const titlesh3 = document.querySelectorAll("h3");

function setup() {
    Array.from(titles).forEach(title => {
        title.id = clean(title.innerText);
    })
    Array.from(titlesh3).forEach(title => {
        title.id = clean(title.innerText);
    })
}
function clean (string)
{
    string = string.replaceAll(' ', '-');
    string = string.toLowerCase();
    string = string.replaceAll('é', 'e');
    string = string.replaceAll('è', 'e');
    string = string.replaceAll('ê', 'e');
    string = string.replaceAll('à', 'a');
    string = string.replaceAll('â', 'a');
    string = string.replaceAll('î', 'i');
    string = string.replaceAll('ô', 'o');
    string = string.replaceAll('û', 'u');
    string = string.replaceAll('ç', 'c');
    string = string.replaceAll('ù', 'u');
    string = string.replaceAll('\'', '');
    string = string.replaceAll('?', '');
    return string;
}

setup();
