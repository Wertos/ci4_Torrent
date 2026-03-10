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
function getParameterByName(name, url = window.location.href) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

function replaceUrlParam(url = window.location.href, paramName, paramValue)
{
    if (paramValue == null) {
        paramValue = '';
    }
    var pattern = new RegExp('\\b('+paramName+'=).*?(&|#|$)');
    if (url.search(pattern)>=0) {
        return url.replace(pattern,'$1' + paramValue + '$2');
    }
    url = url.replace(/[?#]$/,'');
    return url + (url.indexOf('?')>0 ? '&' : '?') + paramName + '=' + paramValue;
}

$('select#sort').on('change', function() {
  insertParam('sort', this.value );
});

$('select#filterByStatus').on('change', function (e) {
    var valueSelected = this.value;
	window.location.href = replaceUrlParam(url = window.location.href, 'statusid', valueSelected);
});
$('select#filterByCat').on('change', function (e) {
    var valueSelected = this.value;
	window.location.href = replaceUrlParam(url = window.location.href, 'catid', valueSelected);
});
$('select#filterByMaterial').on('change', function (e) {
    var valueSelected = this.value;
	window.location.href = replaceUrlParam(url = window.location.href, 'location', valueSelected);
});

$('#torrSelect, #comSelect').click(function() {
	$(this).attr('disabled', 'disabled');
	if($("#torrSelect, #comSelect").is(':checked')) {
    	$('input[id^="select-"]').attr('type', 'checkbox');
        $('#btnManage').removeClass('d-none');
	} else {
    	$('input[id^="select-"]').attr('type', 'hidden');
		$('#btnManage').addClass('d-none');
	}
});

$('input[id^="select-"]').each(function (e) {
	$(this).on('click', function () {
		var id = $(this).attr('value');
		if($(this).is(':checked')) {
	    	$('tr#rowid-'+id).addClass('border border-2 border-danger');
	    	$('tr#rowid-'+id+' td').css('background-color','#f8d7da');
		} else {
	    	$('tr#rowid-'+id).removeClass('border border-2 border-danger');
	    	$('tr#rowid-'+id+' td').attr('style', "");
		}
	});
});

$('#tDel, #tMov, #cDel').on('click', function () {
	var event = $(this).data('event');
	let idsArray = new Array;
	$('input[name="torrSelect"]:checked, input[name="comSelect"]:checked').each(function (e) {
		var val = $(this).attr('value');
		idsArray.push(val);
	});
	if (Object.keys(idsArray).length <= 0) {
		return false;
	}
	if(event == 'tdelete' || event == 'tmove') {
		CI4_Admin.TorrManage(idsArray, event);
	} 
	else if (event == 'cdelete')
	{
		window.location.href = '/admin/comments/del?del='+idsArray;
	}
	else
	{
		alert("Invalid event");	
	}
});
