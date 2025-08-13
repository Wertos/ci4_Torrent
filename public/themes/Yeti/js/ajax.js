var $loading = $('#loading').hide();
$(document)
  .ajaxStart(function () {
    $loading.show();
  })
  .ajaxStop(function () {
    $loading.hide();
    initializeTooltips();
  });

CI4.updatePeers = function(id) {
	url = '/ajax/updatepeers/'+id;
	$.post( url, { id : id, action: "updatepeers" })
  	.done(function( data ) {
  		if(data.error.length > 0) {
  				alert(JSON.stringify(data.error));
  				return false;
  		}
  		$('#seed').text(data.seeders);
  		$('#completed').text(data.completed);
  		$('#leech').text(data.leechers);
  		//alert("Ok");
  	})
  	.fail(function( response ) {
    	alert(JSON.stringify(response));
		});
}

CI4.TorrMove = function(id) {
	url = '/ajax/tormove/'+id;
	newId = $( "select#category option:selected" ).val();
	$.post( url, { id : id, newid: newId, action: "tormove" })
  	.done(function( data ) {
  		if(data.error) {
  				alert(data.error);
  				return false;
  		}
  		alert(data.success);
  	})
  	.fail(function( response ) {
    	alert(JSON.stringify(response));
		});
}
$( "#modpanel a.status" ).on( "click", function() {
  id = $(this).attr('data-id');
  action = $(this).attr('data-action');
  status = $(this).attr('data-status');
	$("#modpanel a.status").removeClass('border-bottom border-3 border-dark');
	url = '/ajax/torstatus/'+id;
	$.post( url, { id : id, action: action, status: status })
  	.done(function( data ) {
  		if(data.error) {
  				alert(data.error);
  				return false;
  		}
  		$('#modpanel a[data-status="'+data.status+'"]').addClass('border-bottom border-3 border-dark');
  		$('#status #torrstatus')
  				.html(data.icon)
  				.attr('title', data.status_text);
  		var parent = $('#torrstatus').parent('div');
  		parent.attr('class',
  				parent.attr('class').replace(/border\-.+?\b/, data.class)
  		);
  	})
  	.fail(function( response ) {
    	alert(JSON.stringify(response));
		});
});

CI4.EditComment = function(id, tId) {
	url = '/ajax/commentedit/'+id;
	var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
	myModal.show();
	$('#staticBackdrop').find('.modal-body').html(BuildForm(id, 'class', url, 'POST', 'text'));
	$('#staticBackdropLabel').text('Редактирование комментария');
	//$('#textarea-'+id).val($.trim($('#commentText-'+id).text()));
	$.get( url, { id : id, action: "commentedit" })
  	.done(function( data ) {
  		if(data.error) {
  			alert(data.error);
  			return false;		
  		}
  		$('#textarea-'+data.id).val(data.text);
  	})
  	.fail(function( response ) {
    	alert(JSON.stringify(response));
		});
	
	$('#button-'+id).on('click', function() {
		var text = $('#textarea-'+id).val();
		$.post( url, { id : id, action: "commentedit", text : $.trim(text) })
  		.done(function( data ) {
  			if(data.error) {
  				alert(JSON.stringify(data.error));
  				return false;		
  			}
  			myModal.hide();
  			$('#commentText-'+data.id).html(data.html);
  		})
  		.fail(function( response ) {
    		alert(JSON.stringify(response));
			});
		return false;
	});
}

CI4.QuoteComment = function(id, user) {
	url = '/ajax/commentedit/'+id;
	$.get( url, { id : id, action: "commentedit" })
  	.done(function( data ) {
  		if(data.error) {
  			alert(data.error);
  			return false;		
  		}
	     var el = $("textarea#floatingTextInput");
    	 el.val('').focus().val("[quote=" + user + "]" + data.text + "[/quote]");
     	$('html,body').animate({
      	      scrollTop: $("#commentForm").offset().top
      	});
    	return false;
  	})
  	.fail(function( response ) {
    	alert(JSON.stringify(response));
		});
};

CI4.DelComment = function(id) {
	url = '/ajax/commentdelete/'+id;
	$.post( url, { id : id, action: "commentdelete" })
  		.done(function( data ) {
  			if(data.error) {
  				alert(JSON.stringify(data.error));
  				return false;		
  			}
  			$('#comment-'+data.id).remove();
  		})
  		.fail(function( response ) {
    		alert(JSON.stringify(response));
			});
		return false;
}
//$(document).ready(function(){

CI4.GetProfileData = function(userid, event, direction = '') {
	$('#torrents, #comments, #bookmarks').html('');
	url = '/ajax/user'+event;
	offset = $('#'+event).attr('data-offset');
	$.post( url, { uid : userid, offset : offset, event : event, action: "userdata", direction: direction })
  		.done(function( data ) {
  			if(data.error) {
  				alert(JSON.stringify(data.error));
  				return false;		
  			}
  			if(event == 'torrents') {
		  			var count = data.torCount;
  			} else if (event == 'comments') {
		  			var count = data.comCount;
  			} else if (event == 'bookmarks') {
		  			var count = data.bokCount;
  			} else {
  					return false;
  			}
//				var count = data.torCount || data.comCount;
				$('#'+event).html(data.html).attr('data-offset', data.offset);
  			
  			if (data.offset > 0) {
  					$('#backward').attr('disabled', false);
  			}
  			if (data.offset <= 0)	{
  					$('#backward').attr('disabled', true);
  			}
  			if(data.offset + data.perpage > count)	{
  					$('#forward').attr('disabled', true);
  			}	else {
  					$('#forward').attr('disabled', false);  			
  			}
  		})
  		.fail(function( response ) {
    		alert(JSON.stringify(response));
			});
		return false;
}

if ( CI4.urihash == '#torrents'
	 ||  CI4.urihash == '#comments'
	 || CI4.urihash == '#bookmarks' )
{
	const anchor = window.location.hash;
	var el = document.querySelector(anchor+'-tab'); // theTabID of the tab you want to open
	var tab = new bootstrap.Tab(el);
	tab.show();
  var event = $(el.getAttribute('data-bs-target')).attr('id').replace('#', '');
  var userid = el.getAttribute('data-user-id');
		if (event != 'profile') {
			$('#'+event).attr('data-offset', 0);
			CI4.GetProfileData(userid, event, '');
		}
}

$('[data-bs-toggle="tab"]').bind('click', function() {
  if($(this).hasClass('disabled')) return false;
  var event = $(this).attr('data-bs-target').replace('#', '');
  var userid = $(this).attr('data-user-id');
  window.location.hash = '#'+event;
		if (event != 'profile') {
			$('#'+event).attr('data-offset', 0);
			CI4.GetProfileData(userid, event, '');
		}
});

CI4.AjaxPag = function(catId, event) {
	url = '/ajax/ajaxpag';
	offset = $('#ajaxpag-'+catId).attr('data-offset');
	width = $('#catid_'+catId).width();
	height= $('#catid_'+catId).height();
	plug = '<div style="min-width:'+width+'px; height:'+height+'px;" class="cat_load"></div>';
	$('#catid_'+catId).html(plug);
	offset = $('#ajaxpag-'+catId).attr('data-offset');
	$.post( url, { catid : catId, offset : offset, event : event, action: "ajaxpag" })
  		.done(function( data ) {
  			if(data.error) {
  				alert(JSON.stringify(data.error));
  				return false;		
  			}
  			if (data.offset > 0) {
  					$('#backward-'+data.catId).attr('disabled', false);
  			}
  			if (data.offset <= 0)	{
  					$('#backward-'+data.catId).attr('disabled', true);
  			}
  			if(data.offset + data.perpage > data.torrcount)	{
  					$('#forward-'+data.catId).attr('disabled', true);
  			}	else {
  					$('#forward-'+data.catId).attr('disabled', false);  			
  			}
  			$('#ajaxpag-'+catId).attr('data-offset', data.offset);
  			$('#catid_'+catId).html(data.html);
  		})
  		.fail(function( response ) {
    		alert(JSON.stringify(response));
			});
		return false;
}

CI4.AddReport = function(id, type) {
	url = '/ajax/addreport';
	var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
	myModal.show();
	$('#staticBackdrop').find('.modal-body').html(BuildForm(id, 'class', url, 'POST', 'comment'));
	$('#staticBackdropLabel').text('Жалоба на раздачу');

	$('#button-'+id).on('click', function() {
		var comment = $('#textarea-'+id).val();
		$.post( url, { id : id, type : type, action: "addreport", comment : $.trim(comment) })
  		.done(function( data ) {
  			myModal.hide();
  			if(data.error) {
  				alert(JSON.stringify(data.error_text));
  				return false;		
  			}
 				alert(JSON.stringify(data.success_text));
 				return false;		
  		})
  		.fail(function( response ) {
    		alert(JSON.stringify(response));
			});
			return false;
		});
}

$('#uploadposter').click(function(e) {
		url = '/ajax/posterupload';
		action = 'posterupload';
    const fileInput = document.querySelector('input#floatingPosterInput');
		const file = fileInput.files[0];
    const formData = new FormData();
    if(!file) {
    	alert('File not selected !');
    	return false;
    }
    //return false;
    formData.append('poster', file);
    formData.append('action', action);
		$.ajax({
			 type: 'POST',
			 url: url,
       data: formData,
       cache: false,
       contentType: false,
       processData: false,
		})
 		.done(function( data ) {
 				if(data.error) {
 					alert(JSON.stringify(data.error));
 					return false;
 				}
 				$('#posterUpload input[type="file"], #posterUpload button').remove();
 				$('#posterUpload p').html(data.img);
  			$('#posterUpload input:hidden').val(data.filename);
 		})
 		.fail(function( response ) {
    		alert(JSON.stringify(response));
		});
		return false;
});

// implement JSON.stringify serialization
JSON.stringify = JSON.stringify || function (obj) {
    var t = typeof (obj);
    if (t != "object" || obj === null) {
        // simple data type
        if (t == "string") obj = '"'+obj+'"';
        return String(obj);
    }
    else {
        // recurse array or object
        var n, v, json = [], arr = (obj && obj.constructor == Array);
        for (n in obj) {
            v = obj[n]; t = typeof(v);
            if (t == "string") v = '"'+v+'"';
            else if (t == "object" && v !== null) v = JSON.stringify(v);
            json.push((arr ? "" : '"' + n + '":') + String(v));
        }
        return (arr ? "[" : "{") + String(json) + (arr ? "]" : "}");
    }
};