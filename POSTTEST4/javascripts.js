const modeToggle = document.getElementById("mode-toggle");

if (localStorage.getItem("mode") === "dark") {
    document.body.classList.add("dark-mode");
} else {
    document.body.classList.add("light-mode");
}

modeToggle.addEventListener("click", function() {
    document.body.classList.toggle("dark-mode");
    document.body.classList.toggle("light-mode");

    if (document.body.classList.contains("dark-mode")) {
        localStorage.setItem("mode", "dark");
    } else {
        localStorage.setItem("mode", "light");
    }
});

function tampilkanInput() {
    var textInput = document.getElementById("text-input").value;
    var numberInput = document.getElementById("number-input").value;
    var passwordInput = document.getElementById("password-input").value;

    var hasilInput = document.getElementById("hasil-input");
    hasilInput.innerHTML = "<p>Nama: " + textInput + "</p>" +
                           "<p>Nomor Telpon: " + numberInput + "</p>" +
                           "<p>Kata Sandi: " + passwordInput + "</p>";
}