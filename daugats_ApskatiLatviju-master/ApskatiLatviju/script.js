function open_popup(field) {
    field.style.display = "block";
}

function close_popup(field) {
    field.style.display = "none";
}

const lasitOpen = document.getElementById("user-button");
const lasitClose = document.getElementById("user-button");
const lasit_popup = document.getElementById("user-panel");

lasitOpen.addEventListener("click", () => {
    lasit_popup.style.display = "none";
});

lasitClose.addEventListener("click", () => {
    lasit_popup.style.display = "block";
});