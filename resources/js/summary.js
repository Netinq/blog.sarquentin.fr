const titles = document.querySelectorAll("h2");
const summary = document.querySelector('#summary');
const scrollPos = [];
let previous = 0;

const summaryOffset = offset(summary);
let index = 0;
Array.from(titles).forEach(title => {
    title.id = '#'+clean(title.innerText);
    let elem = document.createElement("button");
    let bar = document.createElement("div");
    let barbg = document.createElement("div");
    bar.classList.add("bar");
    barbg.classList.add("bar-bg");
    elem.classList.add("title");
    elem.onclick = () => {window.scroll({top: offset(title).top-75-50, behavior: 'smooth'});};
    elem.innerText = title.innerText;
    summary.appendChild(elem);
    elem.appendChild(barbg);
    barbg.appendChild(bar);
    if (index !=0)
    {
        scrollPos.push([previous, offset(title).top-75-50])
        previous = offset(title).top-75-50;
    }
    index++;
})

function offset(el) {
    var rect = el.getBoundingClientRect(),
        scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
        scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    return { top: rect.top + scrollTop, left: rect.left + scrollLeft }
}
function clean (string)
{
    string = string.replaceAll(' ', '-');
    return string;
}

document.addEventListener('scroll', (e) => {
    const bar = document.querySelectorAll('.bar');
    const scroll = window.scrollY;

    if (scroll >= summaryOffset.top-75 && !summary.classList.contains('attach')) summary.classList.add("attach");
    else if (scroll < summaryOffset.top-75 && summary.classList.contains('attach')) summary.classList.remove("attach");

    let index = 0;
    scrollPos.forEach(pos => {
        if (pos[0] <= scroll && scroll < pos[1]) {
            document.querySelectorAll('.bar')[index].style.width = (scroll-pos[0])*100/(pos[1]-pos[0])+'%';
            for (let i = 0; i < index; i++) bar[i].style.width = '100%';
            for (let i = index+1; i < bar.length; i++) bar[i].style.width = '0';
        }
        index++;
    })
})
