const toggleButton = document.getElementById("login-button");
const contentDiv = document.getElementById("login-popup");

toggleButton.addEventListener("click", () => {
  if (contentDiv.style.display === "none") {
    contentDiv.style.display = "block";
    toggleButton.style.display = "none";
  } else {
    contentDiv.style.display = "none";
  }
});

document.addEventListener('mouseup', function(e) {
  if (!contentDiv.contains(e.target)) {
      contentDiv.style.display = 'none';
      toggleButton.style.display = "block";
  }
});