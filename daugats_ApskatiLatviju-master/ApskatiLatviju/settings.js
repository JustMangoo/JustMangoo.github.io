const userButton = document.getElementById("user-button");
const userPanel = document.getElementById("user-panel");

userButton.addEventListener("click", () => {
  if (userPanel.style.display === "none") {
    userPanel.style.display = "block";
    userButton.style.display = "none";
  } else {
    userPanel.style.display = "none";
  }
});

document.addEventListener('mouseup', function(e) {
  if (!userPanel.contains(e.target)) {
    userPanel.style.display = 'none';
    userButton.style.display = "block";
  }
});