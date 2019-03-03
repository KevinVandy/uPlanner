const itemsSection = document.getElementById('items');

const eventItemsSection = document.getElementById('eventItems');
const meetingItemsSection = document.getElementById('meetingItems');
const homeworkItemsSection = document.getElementById('homeworkItems');
const workItemsSection = document.getElementById('workItems');
const taskItemsSection = document.getElementById('taskItems');

(function () {
  GenerateItems();
})();

function GenerateItems() {
  eventItemsSection.innerHTML = generateEventItemsSkelaton();
  meetingItemsSection.innerHTML = generateMeetingItemsSkelaton();
  homeworkItemsSection.innerHTML = generateHomeworkItemsSkelaton();
  workItemsSection.innerHTML = generateWorkItemsSkelaton();
  taskItemsSection.innerHTML = generateTaskItemsSkelaton();
}

function generateEventItemsSkelaton() {
  let html = /*html*/ '<h3>Events</h3>';

  if (currentView == "year") {
    html += /*html*/ `<table class="itemsTable">`;
    Array.from(account.events).forEach(function (eventItem) {
      if (eventItem.date.getFullYear() == currentDayYear) {
        html += //html
          `
            <tr class="itemDateYearView">
              <th>
                ${monthShortLabels[eventItem.date.getMonth()]} ${eventItem.date.getDate() + 1}
              </th>
              `;
        if (eventItem.completed == 0) {
          html += /*html*/ `<td class="itemName">`
        } else {
          html += /*html*/ `<td class="itemName" style="text-decoration: line-through">`
        }
        html += //html
          `
                ${eventItem.eventName}
              </td>
            </tr>
          `;
      }
    });
    html += /*html*/ `</table>`;
  }
  if (currentView == "month") {
    html += /*html*/ `<table class="itemsTable">`;
    Array.from(account.events).forEach(function (eventItem) {
      if (eventItem.date.getFullYear() == currentDayYear && eventItem.date.getMonth() == currentDayMonth) {
        html += //html
          `
          <tr>
            <th class="itemDateMonthView">
              ${eventItem.date.getDate() + 1}
            </th>
          `;
        if (eventItem.completed == 0) {
          html += /*html*/ `<td class="itemName">`
        } else {
          html += /*html*/ `<td class="itemName" style="text-decoration: line-through">`
        }
        html += //html
          `
                ${eventItem.eventName}
              </td>
            </tr>
          `;
        if (eventItem.startTime != null && eventItem.startTime.format("HH:mm") != "00:00") {
          html += //html
            `
              <tr>
                <th class="itemStartTimeLabel">
                </th>
                <td class="itemStartTime">
                  ${eventItem.startTime.format("HH:mm")}
              `;
          if (eventItem.endTime != null && eventItem.endTime.format("HH:mm") != "00:00") {
            html += /*html*/ ` - ${eventItem.endTime.format("HH:mm")}`;
          }
          html += //html
            `
                </td>
              </tr>
            `;
        }
      }
    });
    html += /*html*/ `</table>`;
  }
  return html;
}

function generateMeetingItemsSkelaton() {
  let html = /*html*/ '<h3>Meetings</h3>';

  if (currentView == "year") {
    html += /*html*/ `<table class="itemsTable">`;
    Array.from(account.meetings).forEach(function (meetingItem) {
      if (meetingItem.date.getFullYear() == currentDayYear) {
        html += //html
          `
            <tr class="itemDateYearView">
              <th>
                ${monthShortLabels[meetingItem.date.getMonth()]} ${meetingItem.date.getDate() + 1}
              </th>
              <td class="itemName">
                ${meetingItem.meetingName}
              </td>
            </tr>
          `;
      }
    });
    html += /*html*/ `</table>`;
  }
  if (currentView == "month") {
    html += /*html*/ `<table class="itemsTable">`;
    Array.from(account.meetings).forEach(function (meetingItem) {
      if (meetingItem.date.getFullYear() == currentDayYear && meetingItem.date.getMonth() == currentDayMonth) {
        html += //html
          `
          <tr>
            <th class="itemDateMonthView">
              ${meetingItem.date.getDate() + 1}
            </th>
            <td class="itemName">
              ${meetingItem.meetingName}
            </td>
          </tr>
        `;
        if (meetingItem.startTime != null && meetingItem.startTime.format("HH:mm") != "00:00") {
          html += //html
            `
              <tr>
                <th class="itemStartTimeLabel">
                </th>
                <td class="itemStartTime">
                  ${meetingItem.startTime.format("HH:mm")}
              `;
          if (meetingItem.endTime != null && meetingItem.endTime.format("HH:mm") != "00:00") {
            html += /*html*/ ` - ${meetingItem.endTime.format("HH:mm")}`;
          }
          html += //html
            `
                </td>
              </tr>
            `;
        }
      }
    });
    html += /*html*/ `</table>`;
  }
  return html;
}

function generateHomeworkItemsSkelaton() {
  let html = '';


  return html;
}

function generateWorkItemsSkelaton() {
  let html = '';


  return html;
}

function generateTaskItemsSkelaton() {
  let html = '';


  return html;
}