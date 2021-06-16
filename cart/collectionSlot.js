const collectionSlots = [
    {
        minTime: 10,
        maxTime: 13,
    },
    {
        minTime: 13,
        maxTime: 16,
    },
    {
        minTime: 16,
        maxTime: 19,
    },
];

const collectionDays = [
    {
        name: 'Wed',
        value: 4,
    },
    {
        name: 'Thus',
        value: 5,
    },
    {
        name: 'Fri',
        value: 6,
    },
];

const currentDate = new Date();
const currentDay = currentDate.getDay();
const currentTime = currentDate.getHours();

const collectionDaySelect = document.querySelector('.collection-day');
const collectionTimeSelect = document.querySelector('.collection-time');

window.addEventListener('load', () => {
    // setting collection times
    collectionSlots.forEach(collectionSlot => {
        const slotOption = document.createElement('option');

        slotOption.setAttribute(
            'value',
            `${collectionSlot.minTime}-${collectionSlot.maxTime}`
        );
        slotOption.textContent = `${collectionSlot.minTime}-${collectionSlot.maxTime}`;

        collectionTimeSelect.appendChild(slotOption);
    });

    // setting collection days
    collectionDays.forEach(collectionDay => {
        const dayOption = document.createElement('option');

        if (currentDay < collectionDay.value) {
            dayOption.setAttribute('value', collectionDay.name);
            dayOption.textContent = collectionDay.name;
            collectionDaySelect.appendChild(dayOption);
        } else {
            dayOption.setAttribute('value', collectionDay.name);
            dayOption.textContent = collectionDay.name + ' (Next week)';
            collectionDaySelect.appendChild(dayOption);
            collectionDay.value += 10;
        }
    });
});

collectionDaySelect.addEventListener('change', () => {
    let selectedDay;

    for (day of collectionDays) {
        if (day.name === collectionDaySelect.value) {
            selectedDay = day.value;
            break;
        }
    }

    if (selectedDay - currentDay === 1) {
        collectionTimeSelect.innerHTML = '';
        const defaultOption = document.createElement('option');
        defaultOption.disabled = true;
        defaultOption.selected = true;

        for (time of collectionSlots) {
            if (time.maxTime > currentTime) {
                const slotOption = document.createElement('option');

                slotOption.setAttribute(
                    'value',
                    `${time.minTime}-${time.maxTime}`
                );
                slotOption.textContent = `${time.minTime}-${time.maxTime}`;

                collectionTimeSelect.appendChild(slotOption);
            }
        }
    }
});
