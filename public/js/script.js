window.addEventListener("DOMContentLoaded", () => {
    const printTriggerButton = document.getElementById("print-trigger");
    const villageSelection = document.getElementById("village_selection");
    const village = document.getElementById("village");
    if (printTriggerButton) {
        printTriggerButton.addEventListener("click", () => window.print());
    }

    if (villageSelection) {
        villageSelection.addEventListener("change", () =>
            changeUrl(villageSelection.value)
        );
    }

    if (village) {
        village.addEventListener("change", () =>
            changeUrl(village.options[village.selectedIndex]?.dataset.id)
        );
    }
});

function changeUrl(value) {
    const url = new URL(location.href);
    url.searchParams.set("village", value);
    location.href = url.toString();
}
