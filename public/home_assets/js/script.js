let items = document.querySelectorAll(".accordion-body .item");
let forms = document.querySelectorAll(".forms");
for (let i = 0; i < items.length; i++) {
  items[i].onclick = function () {
    setTimeout(function () {
      window.scrollTo(0, 0);
    }, 2);
    for (let r = 0; r < items.length; r++) {
      items[r].classList.remove("active");
    }
    items[i].classList.add("active");
    for (let n = 0; n < forms.length; n++) {
      forms[n].classList.add("hide");
    }
    document.getElementById(items[i].dataset.item).classList.remove("hide");
  };
}
