const calendarArea = document.getElementById('calendar');

const monthLongLabels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
const monthShortLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];

const dayOfWeekLabels = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

var currentDay = new Date();
// var dd = currentDay.getDate();
// var mm = currentDay.getMonth()+1;
// var yyyy = currentDay.getFullYear();

var currentDayYear = currentDay.getFullYear();
var currentDayMonth = currentDay.getMonth(); //index
var currentDayDay = currentDay.getDate();

var currentDayMonthWord = monthLongLabels[currentDayMonth];

(function () {

    showMonthView(); //todo show view based on setting

})();

function showMonthView() {
    calendarArea.innerHTML = createMonthSkelaton();
}

function showWeekView() {
    calendarArea.innerHTML = createWeekSkelaton();
}

function showDayView() {
    calendarArea.innerHTML = createDaySkelaton();
}

function createMonthSkelaton() {
    let html = //html
        `
        <table class="view-month">
            <tr>
                <th colspan="2" class="year-previous"><a id="year-previous"><</a></th>
                <th colspan="3" id="year">${currentDayYear}</th>
                <th colspan="2" class="year-next"><a id="year-next">></a></th>
            </tr>
            <tr>
                <th colspan="2" class="month-previous"><a id="month-previous"><</a></th>
                <th colspan="3" id="month">${currentDayMonthWord}</th>
                <th colspan="2" class="month-next"><a id="month-next">></a></th>
            </tr>
            <tr>
        `;
    dayOfWeekLabels.forEach(function (dayLabel) {
        html += //html
            `
                <td class="day-of-week-label">${dayLabel}</td>
            `;
    });
    html += /*html*/ `</tr>`

    let dayOfMonth = 1 - new Date(currentDayYear + "-" + currentDayMonthWord + "-01").getDay();
    for (let week = 1; week <= 6; week++) {
        html += /*html*/ `<tr>`;
        for (let dayOfWeek = 1; dayOfWeek <= 7; dayOfWeek++) {
            if(dayOfMonth > 0 && dayOfMonth <= calcDaysInMonth(currentDayYear,currentDayMonth + 1)){
                if (dayOfMonth % 2 == 1) {
                    html += /*html*/ `<td class="odd-day"><div class="day-label">${dayOfMonth++}</div></td>`;
                } else {
                    html += /*html*/ `<td class="even-day"><div class="day-label">${dayOfMonth++}</div></td>`;
                }
            } else{
                html += /*html*/ `<td class="blank-day"></td>`;
                dayOfMonth++;
            }
            
        }
        html += /*html*/ `</tr>`;
    }
    html += /*html*/ `</table>`
    return html;
}

function createWeekSkelaton() {
    let html = /*html*/ `<table class="view-week">`;
    dayOfWeekLabels.forEach(function (dayLabel) {
        html += //html
            `
            <tr>
                <th class="day-of-week-label">${dayLabel}</th>
                <td></td>
            </tr>
        `;
    });

    html += /*html*/ `</table>`;

    return html;
}

function createDaySkelaton() {
    let html = //html
        `
        <table class="view-day">
            <tr>
                <th>Date</th>
            </tr>
            <tr>
                <td>
                
                </td>
            </tr>
        </table>
    `;
    return html;
}

$(document).on('click','#year-previous',function (e) { 
    e.preventDefault();
    currentDayYear--;
    showMonthView();
});

$(document).on('click','#year-next',function (e) { 
    e.preventDefault();
    currentDayYear++;
    showMonthView();
});

$(document).on('click','#month-previous',function (e) { 
    e.preventDefault();
    if(currentDayMonth == 0){
        currentDayMonth = 11;
        currentDayMonthWord = monthLongLabels[currentDayMonth];
        currentDayYear--;
    } else{
        currentDayMonthWord = monthLongLabels[--currentDayMonth];
    }
    showMonthView();
});

$(document).on('click','#month-next',function (e) { 
    e.preventDefault();
    if(currentDayMonth == 11){
        currentDayMonth = 0;
        currentDayMonthWord = monthLongLabels[currentDayMonth];
        currentDayYear++;
    } else{
        currentDayMonthWord = monthLongLabels[++currentDayMonth];
    }
    showMonthView();
});



function calcDaysInMonth (m, y) {
    return new Date(m, y, 0).getDate();
}