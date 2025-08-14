function initializeTooltips() {
//    const tooltipTriggerList = document.querySelectorAll('[title]');
		const tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'))
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

$('form#editProfile')
  	  .each(function(){
    	    $(this).data('serialized', $(this).serialize())
    	})
    	.on('change input', function(){
      	  $(this)             
        	    .find('button#submitProfile')
          	      .prop('disabled', $(this).serialize() == $(this).data('serialized'))
        	;
     	})
    	.find('button#submitProfile')
    			.prop('disabled', true)
;

///spoiler
$('.spoiler').click(function() {
     const icon = $(this).children('i');
     if(icon.is('.bi-plus-square')) {
				icon.removeClass('bi-plus-square').addClass('bi-dash-square');
     } else {
     		icon.removeClass('bi-dash-square').addClass('bi-plus-square');
     }
     $(this).next('.card-body').toggleClass('d-none');
});

var BuildForm = function(id, cls, action, method, name) {
	id = id ? id : 'form';
	cls = cls ? cls : '';
	action = action ? action : '/';
	method = method ? method : 'POST';
	name = name ? name : '';
	textarea = '<textarea data-editor id="textarea-'+id+'" class="form-control '+cls+'" name="'+name+'"></textarea>';
	button = '<button class="btn btn-primary btn-xs '+cls+'" id="button-'+id+'" type="submit">Отправить</button>';
	const form = { open : '<form id="'+id+'" class="'+cls+'" action="'+action+'" method="'+method+'">', close : '</form>' };
	return form.open+textarea+button+form.close;
}
//
//  BBCode Start
//
$(document).ready(function() {
    var editors = $("[data-editor]");
    $(editors).each(function(i, el) {
        const buttons = `
        <div class="editor-buttons btn-toolbar" data-parent="editor-` + i + `">
        	<div class="btn-group mr-2 me-3">
        		<button type="button" class="bbcode btn btn-primary btn-sm" data-bbcode="b"><i class="bi bi-type-bold"></i></button>
        		<button type="button" class="bbcode btn btn-primary btn-sm" data-bbcode="i"><i class="bi bi-type-italic"></i></button>
        		<button type="button" class="bbcode btn btn-primary btn-sm" data-bbcode="u"><i class="bi bi-type-underline"></i></button>
        		<button type="button" class="bbcode btn btn-primary btn-sm" data-bbcode="s"><i class="bi bi-type-strikethrough"></i></button>
        	</div>
        	<div class="btn-group mr-2 me-3">
        		<button type="button" class="bbcode btn btn-primary btn-sm" data-bbcode="left"><i class="bi bi-text-left"></i></button>
        		<button type="button" class="bbcode btn btn-primary btn-sm" data-bbcode="center"><i class="bi bi-text-center"></i></button>
        		<button type="button" class="bbcode btn btn-primary btn-sm" data-bbcode="right"><i class="bi bi-text-right"></i></button>
        	</div>
        	<div class="btn-group mr-2 me-3">
        		<button type="button" class="bbcode btn btn-primary btn-sm" data-bbcode="quote"><i class="bi bi-chat-left-quote"></i></button>
        		<button type="button" class="bbcode btn btn-primary btn-sm" data-bbcode="img"><i class="bi bi-image"></i></button>
        		<button type="button" class="bbcode btn btn-primary btn-sm" data-bbcode="url"><i class="bi bi-link"></i></button>
        		<button type="button" class="bbcode btn btn-primary btn-sm" data-bbcode="spoiler"><i class="bi bi-plus-square-dotted"></i></button>
        	</div>
        		<div class="dropdown">
        			<button type="button" class="btn btn-primary btn-sm dropdown-toggle" type="button" id="smilies" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-emoji-smile"></i></button>
        			<div class="dropdown-menu" aria-labelledby="smilies" id="smilies_table"></div>
        		</div>
        </div>`;
        $(el).before(buttons);
        $(el).addClass("editor-" + i);
    });
});

$(document).ready(function() {
    $('#smilies_table').html(CI4.smilies);
    $('.editor-buttons button.bbcode').click(function() {
        var button_id = attribs = $(this).attr("data-bbcode");
        button_id = button_id.replace(/[.*]/, '');
        if (/[.*]/.test(attribs)) {
            attribs = attribs.replace(/.*[(.*)]/, ' $1');
        } else attribs = '';
        var start = '[' + button_id + attribs + ']';
        var end = '[/' + button_id + ']';
        insert(start, end);
        return false;
    });
});

function insert(start, end) {
//    element = document.getElementById('floatingDescInput');
    element = document.querySelector('[data-editor]');;
    if (document.selection) {
        element.focus();
        sel = document.selection.createRange();
        sel.text = start + sel.text + end;
    } else if (element.selectionStart ||
        element.selectionStart == '0') {
        element.focus();
        var startPos = element.selectionStart;
        var endPos = element.selectionEnd;
        element.value = element.value.substring(0, startPos) +
            start + element.value.substring(startPos, endPos) + end +
            element.value.substring(endPos, element.value.length);
        element.setSelectionRange(startPos + start.length, endPos + end.length - 1);
    } else {
        element.value += start + end;
    }
}
// header search start
$('#search-cat a.cat').on('click', function() {
		var el = $(this);
		$('#search-cat-btn span').text(el.text());
		$('#search-cat-btn').attr('data-cat', el.data('id'));
});
$('#search-cat a.cat').each(function() {
		if($(this).data('select') == true) {
				$('#search-cat-btn span').text($(this).text());
				$('#search-cat-btn').attr('data-cat', $(this).data('id'));
		}
});
/*
$('#search-cat a.cat').on('click', function() {
		var el = $(this);
		$('#search-cat-btn span').text(el.text());
		$('#search-cat-btn').attr('data-cat', el.data('id'));
});
*/
$('#search-cat-reset').on('click', function() {
		var el = $('#search-cat-btn');
		el.attr('data-cat', 0);
		el.children('span').text(el.attr('data-orig-text'));
});
$('#search-cat-submit').on('click', function() {
		var catId = $('#search-cat-btn').attr('data-cat');
		var searchText = $('#search-cat-text').val();
		var textError = $('#search-cat-text').attr('data-error');
		if(searchText.length < 3) {
				$('#search-cat-text').attr('placeholder', textError);
  			$('#search-cat-text').val(textError);
  			$('#search-cat-submit').attr({disabled:true});
			setTimeout(function() {
  				$('#search-cat-text').val(searchText);
					$('#search-cat-submit').attr({disabled:false});
  		}, 500);
  		return false;
		}
		var searchLink = '/browse/search?cat='+catId+'&text='+searchText;
		if(catId == 0)
					var searchLink = '/browse/search?text='+searchText;
		window.location.href = searchLink;
});
// header search end
$('#tor-filelist > ul.tree-root').treeview({
		collapsed: true,
		unique: true
});
$('#tor-filelist i').each(function () {
    var size_bytes = this.innerHTML;
    //this.innerHTML = '(' + size_bytes + ')';
    $(this).html('<s>' + humn_size(size_bytes) + '</s> ');
//    $(this).css('display', 'none');
});

function humn_size (size) {
	var i = 0;
	var units = ["B", "KB", "MB", "GB", "TB", "PB", "EB", "ZB", "YB"];
	while ((size/1024) >= 1) {
		size = size/1024;
		i++;
	}
	size = new String(size);
	if (size.indexOf('.') != -1) {
		size = size.substring(0, size.indexOf('.') + 3);
	}
		return size + ' ' + units[i];
}

$('*[data-pass="viewpass"]').click(function(){
		if ($(this).prev().prev('#floatingPasswordInput').is('[type="password"]')) {
			$(this).prev().prev('#floatingPasswordInput').attr('type', 'text')
			$(this).html('<i class="bi bi-lock"></i>');
		} else {	
			$(this).prev().prev('#floatingPasswordInput').attr('type', 'password');
			$(this).html('<i class="bi bi-unlock"></i>');
		}
		
});

function confirmation() {
		const message = prompt('Вы подтверждаете удаление ? Если да введите в поле YES');
		if (message == 'YES') {
				return;
		} else {
				return false;
		}
}
