document.addEventListener("DOMContentLoaded", () => {
    const toast = document.getElementById("toast");
    if (toast) {
        setTimeout(() => {
            toast.remove();
        }, 5000); // 5000ms = 5 detik
    }
});


document.addEventListener("DOMContentLoaded", () => {
    const alert = document.getElementsByClassName("alert");
    if (alert) {
        setTimeout(() => {
            toast.remove();
        }, 5000); // 5000ms = 5 detik
    }
});