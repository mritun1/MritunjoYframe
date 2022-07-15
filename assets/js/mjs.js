//ELEMENT SELECTOR
function _(e) {
  return document.querySelector(e);
}
//EVENT LISTENER - NORMAL
function event(selector, action, func) {
  _(selector).addEventListener(action, func);
}
//EVENT LISTENER = ONCLICK OUTSIDE DIV
function eventOutsideClick(selector1, selector2, func) {
  document.addEventListener("click", function (event) {
    var isClickInsideElement = _(selector1).contains(event.target);
    if (!isClickInsideElement) {
      var isClickInsideElement = _(selector2).contains(event.target);
      if (!isClickInsideElement) {
        return func();
      }
    }
  });
}
// ..........................................................
// DROP DOWN MENU
// ..........................................................
function dropDownToggle(e) {
  let x = _(e);
  if (x.classList.contains("display-block") == true) {
    x.classList.add("display-none");
    x.classList.remove("display-block");
  } else {
    x.classList.add("display-block");
    x.classList.remove("display-none");
  }
}
function dropDownToggleHide(e) {
  let x = _(e);
  if (x.classList.contains("display-block") == true) {
    x.classList.add("display-none");
    x.classList.remove("display-block");
  }
}
