window.addEventListener("DOMContentLoaded", () => {
    const printTriggerButton = document.getElementById("print-trigger");
    const villageSelection = document.getElementById("village_selection");
    const village = document.getElementById("village");
    if (printTriggerButton) {
        printTriggerButton.addEventListener("click", () => window.print());
    }

    if (villageSelection) {
        villageSelection.addEventListener("change", () =>
            changeUrl(villageSelection)
        );
    }

    if (village) {
        village.addEventListener("change", () => changeUrl(village));
    }
});

function changeUrl(el) {
    const url = new URL(location.href);
    url.searchParams.set("village", el.value);
    location.href = url.toString();
}
