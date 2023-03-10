const toggleButton = document.getElementById("login-button");
const contentDiv = document.getElementById("login-popup");

toggleButton.addEventListener("click", () => {
  if (contentDiv.style.display === "none") {
    contentDiv.style.display = "block";
  }
});

document.addEventListener("click", (event) => {
  if (!contentDiv.contains(event.target) && event.target !== toggleButton) {
    contentDiv.style.display = "none";
    
  }
});