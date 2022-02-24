window.addEventListener("DOMContentLoaded", () => {
    const printTriggerButton = document.getElementById("print-trigger");
    const villageSelection = document.getElementById("village_selection");
    const village = document.getElementById("village");

    // input filter
    const filter_btn = document.getElementById("filter_btn");
    const village_filter = document.getElementById("village_filter");
    const vaccine_filter = document.getElementById("vaccine_filter");
    const date_filter = document.getElementById("date_filter");

    if (printTriggerButton) {
        printTriggerButton.addEventListener("click", () => window.print());
    }

    if (villageSelection) {
        villageSelection.addEventListener("change", () =>
            changeUrl({ key: "village", value: villageSelection.value })
        );
    }

    if (village) {
        village.addEventListener("change", () =>
            changeUrl({
                key: "village",
                value: village.options[village.selectedIndex]?.dataset.id,
            })
        );
    }

    if (filter_btn) {
        filter_btn.addEventListener("click", () => {
            const filters = [];
            if (village_filter.value) {
                filters.push({ key: "village", value: village_filter.value });
            }
            if (vaccine_filter.value) {
                filters.push({ key: "vaccine", value: vaccine_filter.value });
            }
            if (date_filter.value) {
                filters.push({ key: "date", value: date_filter.value });
            }
            changeUrl(filters);
        });
    }
});

function changeUrl(data) {
    const url = new URL(location.href);
    if (Array.isArray(data) && data.length > 0) {
        data.forEach((entry) => {
            url.searchParams.set(entry.key, entry.value);
        });
    } else {
        url.searchParams.set(data.key, data.value);
    }
    location.href = url.toString();
}

function formatDate(date) {
    var d = new Date(date),
        month = "" + (d.getMonth() + 1),
        day = "" + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = "0" + month;
    if (day.length < 2) day = "0" + day;

    return [year, month, day].join("-");
}
