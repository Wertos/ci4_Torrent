var $loading = $('#loading').hide();
$(document)
  .ajaxStart(function () {
    $loading.show();
  })
  .ajaxStop(function () {
    $loading.hide();
  	initializeTooltips();
  });

CI4_Admin.UserDelete = function(id) {
	url = '/admin/users/delete/'+id;
	$.post( url, { id : id, action: "UserDelete" })
  	.done(function( data ) {
  		if(data.error) {
  				alert(data.error);
  				return false;
  		}
  		$('#rowid-'+data.id).remove();
  	})
  	.fail(function( response ) {
    	alert(JSON.stringify(response));
		});
}
CI4_Admin.UserHardDelete = function(id) {
	url = '/admin/users/harddelete/'+id;
	$.post( url, { id : id, action: "UserHardDelete" })
  	.done(function( data ) {
  		if(data.error) {
  				alert(data.error);
  				return false;
  		}
  		location.reload();
  	})
  	.fail(function( response ) {
    	alert(JSON.stringify(response));
		});
}
CI4_Admin.UserRestore = function(id) {
	url = '/admin/users/restore/'+id;
	$.post( url, { id : id, action: "UserRestore" })
  	.done(function( data ) {
  		if(data.error) {
  				alert(data.error);
  				return false;
  		}
  		location.reload();
  	})
  	.fail(function( response ) {
    	alert(JSON.stringify(response));
		});
}

CI4_Admin.UserAct = function(id) {
	url = '/admin/users/act/'+id;
	$.post( url, { id : id, action: "UserAct" })
  	.done(function( data ) {
  		if(data.error) {
  				alert(data.error);
  				return false;
  		}
  		  $el = $('#username-'+data.id).html();
  		  if (data.action == 'deactivate') {
  		     $('#username-'+data.id).html($el+data.username);
  		  } else {
	  			$('#act_icon_'+data.id).remove();
  		  }
	  		$('#useract-'+data.id+' a')
	  					.attr('data-bs-title', data.title)
	  					.html(data.icon);
	  		$('.tooltip').removeClass('show').addClass('hide');
  	})
  	.fail(function( response ) {
    	alert(JSON.stringify(response));
		});
}

CI4_Admin.UserBan = function(id) {
	url = '/admin/users/ban/'+id;
	reason = '';
	act = $('#userban-'+id+' a').attr('data-action');
	if (act == 'ban') {
		reason = prompt('Укажите причину бана!');
	}
	$.post( url, { id : id, action: "UserBan", reason : reason })
  	.done(function( data  ) {
  		if(data.error) {
  				alert(data.error);
  				return false;
  		}
	  		if (act == 'ban') {
	  			$el = $('#username-'+data.id).html();
	  			$('#username-'+data.id).html($el+data.username);
	  			$('#userban-'+data.id+' a').attr('data-action', '');
	  		} else {
	  			$('#ban_icon_'+data.id).remove();
	  		  $('#userban-'+data.id+' a').attr('data-action', 'ban');
	  		}
	  		$('#userban-'+data.id+' a')
	  					.attr('data-bs-title', data.title)
	  					.html(data.icon);
  	})
  	.fail(function( response ) {
    	alert(JSON.stringify(response));
		});
}

CI4_Admin.CatDelete = function(id) {
	url = '/admin/categories/delete/'+id;
	$.post( url, { id : id, action: "CatDelete" })
  	.done(function( data ) {
  		if(data.error) {
  				alert(data.error);
  				return false;
  		}
  		$('#rowid-'+data.id).remove();
  	})
  	.fail(function( response ) {
    	alert(JSON.stringify(response));
		});
}

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