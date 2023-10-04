const modeToggle = document.getElementById("mode-toggle");

// Cek apakah ada preferensi mode pada Local Storage
if (localStorage.getItem("mode") === "dark") {
    document.body.classList.add("dark-mode");
} else {
    document.body.classList.add("light-mode");
}

modeToggle.addEventListener("click", function() {
    document.body.classList.toggle("dark-mode");
    document.body.classList.toggle("light-mode");

    // Simpan preferensi mode pada Local Storage
    if (document.body.classList.contains("dark-mode")) {
        localStorage.setItem("mode", "dark");
    } else {
        localStorage.setItem("mode", "light");
    }
});
