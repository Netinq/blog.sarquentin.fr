/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************!*\
  !*** ./resources/js/read_analytics.js ***!
  \****************************************/
var start = Date.now();
var maxScroll = 0;
var base = offset(document.querySelector("#content")).top + document.querySelector("#content").clientHeight;

window.onbeforeunload = function () {
  fetch(document.querySelector('form#read').action, {
    headers: {
      "Content-Type": "application/json",
      "Accept": "application/json",
      "X-Requested-With": "XMLHttpRequest",
      "X-CSRF-Token": document.querySelector("input[name=\"_token\"]").value
    },
    method: "post",
    credentials: "same-origin",
    body: JSON.stringify({
      read_time: Math.floor((Date.now() - start) / 1000),
      percentage_read: Math.floor(maxScroll * 100 / base),
      article_id: document.querySelector('input[name="article_id"]').value
    })
  });
};

function offset(el) {
  var rect = el.getBoundingClientRect(),
      scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
      scrollTop = window.pageYOffset || document.documentElement.scrollTop;
  return {
    top: rect.top + scrollTop,
    left: rect.left + scrollLeft
  };
}

document.addEventListener('scroll', function () {
  return maxScroll = window.scrollY;
});
/******/ })()
;