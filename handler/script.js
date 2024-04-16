document.addEventListener("DOMContentLoaded", () => {
  var disclaimer = document.querySelector("img[alt='www.000webhost.com']");
  if (disclaimer) {
    disclaimer.remove();
  }
});
function closePopup() {
  document.getElementById("overlay").style.display = "none";
  document.getElementById("popup").style.display = "none";
}

// Display the popup and overlay on page load
window.onload = function () {
  document.getElementById("overlay").style.display = "block";
  document.getElementById("popup").style.display = "block";
};
