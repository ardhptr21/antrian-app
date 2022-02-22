window.addEventListener("DOMContentLoaded", () => {
    const printTriggerButton = document.getElementById("print-trigger");
    const villageSelection = document.getElementById("village_selection");
    if (printTriggerButton) {
        printTriggerButton.addEventListener("click", () => window.print());
    }

    if (villageSelection) {
        villageSelection.addEventListener("change", () => {
            const url = new URL(location.href);
            url.searchParams.set("village", villageSelection.value);

            location.href = url.toString();
        });
    }
});
