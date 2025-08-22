const showSidebarBtn = document.querySelector('#show_sidebar_phone');
const showSidebarBtnPc = document.querySelector('#show_sidebar_pc');
const closeSidebarBtn = document.querySelector('#close_sidebar');
const overlay = document.querySelector('#overlay');
const fullscreen = document.querySelector('#fullscreen');
const wrapper = document.querySelector('.wrapper');

showSidebarBtn.onclick = function () {
  wrapper.classList.toggle('show');
}

closeSidebarBtn.onclick = function () {
  wrapper.classList.remove('show');
}

overlay.onclick = function () {
  wrapper.classList.remove('show');
}

showSidebarBtnPc.onclick = function () {
  wrapper.classList.toggle('show_pc');
}
function initializeTooltips() {
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl, {
      html: true,
      boundary: document.body,
      container: 'body',
      trigger: 'hover'
    }));
}
$(document).ready(function() {
    initializeTooltips();
});

fullscreen.onclick = function () {
  const i = document.querySelector('#fullscreen i');
  if (i.classList.contains('fa-expand')) {
    i.classList.add('fa-compress');
    i.classList.remove('fa-expand');
    document.documentElement.requestFullscreen();
  } else {
    i.classList.add('fa-expand');
    i.classList.remove('fa-compress');
    document.exitFullscreen();
  }
}

var timeDisplay = document.getElementById("curr_date_time");
function refreshTime() {
  var dateString = new Date().toLocaleString("ru-RU", {timeZone: "Europe/Moscow"});
  var formattedString = dateString.replace(", ", " - ");
  timeDisplay.innerHTML = formattedString;
}
setInterval(refreshTime, 1000);

const collapseElement = document.querySelector('[data-bs-toggle="collapse"]');
collapseElement.classList.add('collapsed');
let isCollapsed = true;

collapseElement.addEventListener('click', function () {
  if (isCollapsed) {
    this.classList.add('collapsed');
    isCollapsed = false;
  } else {
    this.classList.remove('collapsed');
    isCollapsed = true;
  }
});

const childItems = $('div.collapse .nav-item');
childItems.each(function() {
  if ($(this).hasClass('active')) {
    $(this).parent('div.collapse').addClass('show');
    $(this).parent('div.collapse').prev('li.position-relative').removeClass('collapsed');
  } else {
    $(this).parent('div.collapse').prev('li.position-relative').addClass('collapsed');
  }
});

function confirmation() {
		const message = prompt('Вы подтверждаете удаление ? Если да введите в поле YES');
		if (message == 'YES') {
				return true;
		} else {
				return false;
		}
}
function insertParam(key, value) {
    key = encodeURIComponent(key);
    value = encodeURIComponent(value);

    // kvp looks like ['key1=value1', 'key2=value2', ...]
    var kvp = document.location.search.substr(1).split('&');
    let i=0;

    for(; i<kvp.length; i++){
        if (kvp[i].startsWith(key + '=')) {
            let pair = kvp[i].split('=');
            pair[1] = value;
            kvp[i] = pair.join('=');
            break;
        }
    }

    if(i >= kvp.length){
        kvp[kvp.length] = [key,value].join('=');
    }

    // can return this or...
    let params = kvp.join('&');

    // reload page with new params
    document.location.search = params;
}
$('select#sort').on('change', function() {
  insertParam('sort', this.value );
});
