function openPopup(id) {
    const popup = document.getElementById(id);
    const overlay = document.getElementById("overlay");

    if (popup && overlay) {
        popup.classList.add("open-popup");
        overlay.style.display = "block";
        document.body.style.overflow = "hidden";
    }
}

function closeAllPopups() {
    document
        .querySelectorAll(".popup")
        .forEach((p) => p.classList.remove("open-popup"));
    document.getElementById("overlay").style.display = "none";
    document.body.style.overflow = "auto";
}
