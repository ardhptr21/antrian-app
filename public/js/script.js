window.addEventListener("DOMContentLoaded", () => {
    const printTriggerButton = document.getElementById("print-trigger");

    if (printTriggerButton) {
        printTriggerButton.addEventListener("click", () => window.print());
    }
});
