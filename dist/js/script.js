document.querySelector(".jsFilter").addEventListener("click", function () {
  document.querySelector(".filter-menu").classList.toggle("active");
});

document.querySelector(".grid").addEventListener("click", function () {
  document.querySelector(".list").classList.remove("active");
  document.querySelector(".grid").classList.add("active");
  document.querySelector(".products-area-wrapper").classList.add("gridView");
  document
    .querySelector(".products-area-wrapper")
    .classList.remove("tableView");
});

document.querySelector(".list").addEventListener("click", function () {
  document.querySelector(".list").classList.add("active");
  document.querySelector(".grid").classList.remove("active");
  document.querySelector(".products-area-wrapper").classList.remove("gridView");
  document.querySelector(".products-area-wrapper").classList.add("tableView");
});

var modeSwitch = document.querySelector('.mode-switch');
modeSwitch.addEventListener('click', function () {                      
  document.documentElement.classList.toggle('light');
 modeSwitch.classList.toggle('active');
});

const reader = new FileReader()

document.getElementById("custom__image-container").addEventListener("change", (e) => {
    const file = imgInput.files[0]
    const newImg = document.createElement("img")
    reader.readAsDataURL(file)
    reader.onload = () => {
        newImg.src = reader.result
    }
    const loadImage = document.getElementById("custom__image-container").appendChild(newImg)
    document.getElementById("image-label").setAttribute("hidden", "hidden")
})