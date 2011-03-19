/*
// 2007-02-12
// Copyright (c) Art. Lebedev | http://www.artlebedev.ru/
// Author - Vladimir Tokmakov
*/

function cmnInformation(){
	this.sUser_agent = navigator.userAgent.toLowerCase();
	this.bIE       = ( ( this.sUser_agent.indexOf("msie") != -1 ) && ( this.sUser_agent.indexOf("opera") == -1 ) );
	this.bOpera    = ( this.sUser_agent.indexOf("opera") != -1 );
	if( this.bOpera ){ cmnSet_class( document.getElementsByTagName( 'html' )[0], 'Opera' ); }
	this.bMAC      = ( this.sUser_agent.indexOf("mac") != -1 );
	this.bGecko    = ( navigator.product == "Gecko" );
	this.bMozilla  = this.bGecko;
	this.sLanguage = null;
	this.bHTTP = null;
	return this;
}

function cmnPlaceholder( eThis, sText, sClass_on_empty ){
	eThis.onfocus = function(){ if( eThis.value.length && eThis.value == sText ){ eThis.value = ''; } cmnRemove_class( this, sClass_on_empty ); eThis.select(); }
	eThis.onblur = function(){ if( !this.value.length ){ cmnSet_class( this, sClass_on_empty ); this.value = sText; } }
	if( !eThis.value.length ){ eThis.onblur(); }
	if( !eThis.getAttribute( 'placeholder' ) ){ eThis.setAttribute( 'placeholder', sText ); }
}

var cmn_aPopup_defaults = [
	["width", 540],
	["height", 600],
	["menubar", "no"],
	["toolbar", "no"],
	["resizable", "yes"],
	["scrollbars", "yes"],
	["status", "yes"]
]
var cmn_aPopup = new Array();
function cmnPopup( sURL, sName, sFeatures, bReplace ){
	if( !sURL.length ){
		if( sURL && sURL.tagName.toLowerCase() == "a" ){
			if( !sName ){ sName = ( sURL.id ) ? sURL.id : "_blank"; }
			sURL = sURL.href;
		}else{
			return false;
		}
	}else if( !sName ){
		sName = "_blank";
	}
	for( var i = 0 ; i < cmn_aPopup_defaults.length ; i++ ){
		if( !cmnPairs_string_get_value( sFeatures, cmn_aPopup_defaults[i][0], "=", "," ) ){
			sFeatures = cmnPairs_string_set_value( sFeatures, cmn_aPopup_defaults[i][0], cmn_aPopup_defaults[i][1], "=", "," );
		}
	}

	var iWidth = cmnPairs_string_get_value( sFeatures, "width", "=", "," );
	var iHeight = cmnPairs_string_get_value( sFeatures, "height", "=", "," );
	if( screen ){
		var iScreen_height = screen.height ? screen.height - 100 : 0;
		var iScreen_width = screen.width ? screen.width - 100 : 0;
		var bScroll = false;
		if( iScreen_height < iHeight ){ bScroll = true; iHeight = iScreen_height; sFeatures = cmnPairs_string_set_value( sFeatures, "height", iHeight, "=", "," ); }
		if( iScreen_width < iWidth ){ bScroll = true; iWidth = iScreen_width; sFeatures = cmnPairs_string_set_value( sFeatures, "width", iWidth, "=", "," ); }
		if( bScroll ) {
			sFeatures = cmnPairs_string_set_value( sFeatures, "scrollbars", "yes", "=", "," );
		}
		sFeatures = cmnPairs_string_set_value( sFeatures, "top", Math.round( ( iScreen_height - iHeight ) / 2 ), "=", "," );
		sFeatures = cmnPairs_string_set_value( sFeatures, "left", Math.round( ( iScreen_width - iWidth ) / 2 ), "=", "," );
	}

	if( sURL.match(/\.(gif|jpe?g|png)$/i) ){
		cmn_aPopup[sName] = window.open( "", sName, sFeatures );
		if( cmn_aPopup[sName] ){
			var sTitle = unescape( cmnPairs_string_get_value( sFeatures, "title", "=", "," ) );
			sTitle = sTitle.replace( /<\/?\w[^>]*>/g, " " ).replace( /</g, "&lt;" ).replace( /</g, "&lt;" ).replace( /"/g, "&quot;" );
			cmn_aPopup[sName].document.open();
			cmn_aPopup[sName].document.write('<html><head><title>'
				+ sTitle
				+ '</title></head><body bgcolor="white" style="margin: 0px; padding: 0px;"><table cellpadding="0" cellspacing="0" border="0" width="100%" height="100%"><tr><td align="center"><img src="'
				+ sURL + '" alt="'
				+ sTitle + '" /></td></tr></table></body></html>');
			cmn_aPopup[sName].document.close();
		}
	}else{
		if( !cmn_aPopup[sName] || cmn_aPopup[sName].closed || cmn_aPopup[sName].location.href != sURL ){
			cmn_aPopup[sName] = window.open( sURL, sName, sFeatures, bReplace );
		}
	}
	if( sName != "_blank" ){
		cmn_aPopup[sName].focus();
	}

	return false;
}

var cmn_oInformation = new cmnInformation();

function cmnInit_Information(){
	cmn_oInformation.sLanguage = ( document.body && document.body.getAttribute( "lang" ) != "" ) ? document.body.getAttribute( "lang" ) : "ru";
	cmn_oInformation.bHTTP = ( document.location.href.indexOf("http://") == 0 ) ? true : false;
}

cmnAdd_event( window, "load", cmnInit_Information );

function cmnFlash(){
	var aeFlash = new Array();
	this.build = function( vEnabled, vDisabled, vNone, iVersion  ){
		var vVersion = this.get_version( iVersion );
		if( vVersion.toString() != "false" ){
			this.enable();
			vVersion = this.get_version( iVersion );
		}
		if( vVersion ){
			if( vEnabled.nodeType )	vEnabled.style.display = "block";
			else document.write( build_object(vEnabled) );
			if( vDisabled.nodeType ) vDisabled.style.display = "none";
			if( vNone.nodeType ) vNone.style.display = "none";
		}else{
			if( vEnabled.nodeType ) vEnabled.style.display = "none";
			if( vDisabled.nodeType ) vDisabled.style.display = "block";
			else if( vDisabled ) document.write( vDisabled );
			if( parseInt(vVersion) == 0 );
				if( vNone.nodeType ) vNone.style.display = "block";
				else if( vNone ) document.write( vNone );
		}
	}
	this.get_version = function( iVersion ){
		var vVersion = cmnGet_cookie( "flash" );
		if( !vVersion ){
			vVersion = check_flash_version( iVersion );
			set_flash_cookie( vVersion );
			return vVersion;
		}else if( iVersion && iVersion > vVersion ){
			vVersion = false;
		}
		return ( vVersion == "false" ) ?  false : vVersion;
	}
	this.disable = function(){
		set_flash_disabled( true );
	}
	this.enable = function(){
		set_flash_disabled( false );
	}
	this.set_disabled = function( bDisabled ){
		set_flash_disabled( bDisabled );
	}

	return this;

	function build_object( sOptions ){
		var asOptions = sOptions.split( "," );
		for( var i = 0 ; i < asOptions.length ; i++){
			asPair = asOptions[i].split( "=" );
			asOptions[asPair[0]] = unescape( asPair[1] );
		}
		var sHTML = '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"';
		sHTML += 'codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"' + 'width="' + asOptions.width + '" height="' + asOptions.height + '" align="middle">' + '<param name="allowScriptAccess" value="sameDomain">' + '<param name="movie" value="' + asOptions.source + '">' + '<param name="quality" value="high">';
		if( asOptions.background ){ sHTML += '<param name="bgcolor" value="' + asOptions.background + '">'; }
		if( asOptions.transparent ){ sHTML += '<param name="wmode" value="transparent">' }
		if( asOptions.flashvars ){ sHTML += '<param name="flashvars" value="' + asOptions.flashvars + '">'; }
		sHTML += '<embed quality="high" allowScriptAccess="sameDomain" type="application/x-shockwave-flash"' + ' pluginspage="http://www.macromedia.com/go/getflashplayer"' + ' src="' + asOptions.source + '" width="' + asOptions.width + '" height="' + asOptions.height + '"';
		if( asOptions.background ){ sHTML += ' bgcolor="' + asOptions.background + '"'; }
		if( asOptions.transparent ){ sHTML += ' wmode="transparent"' }
		if( asOptions.flashvars ){ sHTML += ' flashvars="' + asOptions.flashvars + '"'; }
		sHTML += '></embed></object>';
		return sHTML;
	}
	function set_flash_disabled( bDisabled ){
		set_flash_cookie( ( bDisabled ) ?  "false" : "" );
	}
	function check_flash_version( iVersion ){
		if( navigator.plugins && navigator.plugins['Shockwave Flash'] ){
			var sVersion = ( !iVersion ) ? "\\d+" : "[" + iVersion + "-9]\\d*";
			sVersion = parseInt( navigator.plugins['Shockwave Flash'].description.replace( new RegExp( "^[^\\d]+(" + sVersion + ").*$"), "$1" ) );
			return ( isNaN( sVersion ) ) ? ( !iVersion ) ? false : 0 : sVersion;
		}else if( cmn_oInformation.bIE && !cmn_oInformation.bMAC ){
			var oTemp, iMax = 20;
			iVersion = ( !iVersion ) ? 3 : iVersion;
			for( var i = iVersion ; i < iMax ; i++ ){
				try{
					oTemp = new ActiveXObject( "ShockwaveFlash.ShockwaveFlash." + i );
					iVersion = i;
				}catch(e){
					return ( i > iVersion ) ? iVersion : 0;
				}
			}
			return iVersion;
		}else{
			return ( !iVersion ) ? false : 0;
		}
	}
	function set_flash_cookie( sCookie_value ){
		var dNow = new Date();
		var dExpires = new Date();
		dExpires.setTime( dNow.getTime() + 1000 * 60 * 60 * 24 * 365 );
		cmnSet_cookie( "flash", ( !sCookie_value ) ? "" : sCookie_value, dExpires );
	}
}

function cmnSet_cookie( sName, vValue, dExpires ){
   document.cookie = sName + "=" + escape( vValue );
   + ( ( dExpires == null ) ? "" : ( "; expires=" + dExpires.toGMTString() ) );
   + "; path=/";
}

function cmnGet_cookie( sName ){
	return cmnPairs_string_get_value( document.cookie, sName );
}

function cmnReplace_class( eOn, sInstead, sClass_name ){
	cmnRemove_class( eOn, sInstead );
	cmnSet_class( eOn, sClass_name );
}

function cmnSwitch_class( eOn, sClass_name, sInstead ){
	if( cmnMatch_class( eOn, sClass_name ) ){
		cmnSet_class( eOn, sInstead, sClass_name );
	}else{
		cmnSet_class( eOn, sClass_name, sInstead );
	}
}

function cmnRemove_class( eOn, sClass_name ){
	cmnSet_class( eOn, "", sClass_name );
}

function cmnSet_class( eOn, sClass_name, sInstead ){
	if( eOn && eOn.className != null ){
		sClass_name = ( sClass_name.length ) ? sClass_name.replace( /(^\s+|\s+$)/, "" ) : "";
		if( eOn.className.length ){
			var sOld = sClass_name;
			if( sInstead && sInstead.length ){
				sInstead = sInstead.replace( /\s+(\S)/g, "|$1" );
				if( sOld ){
					sOld += "|";
				}
				sOld += sInstead;
			}
			eOn.className = eOn.className.replace( new RegExp("(^|\\s+)(" + sOld +")($|\\s+)", "g"), "$1" );
		}
		eOn.className += ( eOn.className.length && sClass_name ? " " : "" ) + sClass_name;
	}
}

function cmnMatch_class( eOn, sClass_name ){
	return ( sClass_name && eOn.className && eOn.className.length && eOn.className.match( new RegExp("(^|\\s+)(" + sClass_name +")($|\\s+)") ) );
}

function cmnPairs_string_get_value( sText, sName, sFrom, sBefore ){
	var sValue = "";
	if( sText ){
		if( !sFrom ) sFrom = "=";
		if( !sBefore ) sBefore = ";";
		sText = sText.replace( new RegExp( "(" + sBefore + ")\\s+", "g" ), "$1" );
		var iStart = sText.indexOf( sBefore + sName + sFrom );
		if( iStart >= 0 ){
			iStart += ( sBefore.length + sName.length + sFrom.length );
		}else{
			iStart = sText.indexOf( sName + sFrom );
			if( iStart == 0 ){
				iStart += ( sName.length + sFrom.length );
			}else{
				iStart = -1;
			}
		}
		if( iStart >= 0 ){
			var iEnd = sText.indexOf( sBefore, iStart );
			if( iEnd < 0 ){
				iEnd = sText.length;
			}
			sValue = sText.substring( iStart, iEnd );
		}
	}
	return sValue;
}

function cmnPairs_string_set_value( sText, sName, sValue, sFrom, sBefore ){
	if( !sFrom ) sFrom = "=";
	if( !sBefore ) sBefore = ";";
	var iStart = -1;
	if( sText ){
		sText = sText.replace( new RegExp( "\\s+(" + sBefore + "|" + sFrom + ")\\s+", "g" ), "$1" );
		iStart = sText.indexOf( sBefore + sName + sFrom );
		if( iStart >= 0 ){
			iStart += ( sBefore.length + sName.length + sFrom.length );
		}else{
			iStart = sText.indexOf( sName + sFrom );
			if( iStart == 0 ){
				iStart += ( sName.length + sFrom.length );
			}else{
				iStart = -1;
			}
		}
		if( iStart >= 0 ){
			var iEnd = sText.indexOf( sBefore, iStart );
			if( iEnd < 0 ){
				iEnd = sText.length;
			}
			sText = sText.substring( 0, iStart ) + sValue + sText.substr( iEnd );
		}
	}
	if( iStart < 0 ){
		if( sText && sText.lastIndexOf( sBefore ) != ( sText.length - sBefore.length ) ){
			sText += sBefore;
		}
		sText += sName + sFrom + sValue + sBefore;
	}
	return sText;
}

function cmnAdd_button_events( eOn ){
	cmnAdd_hover( eOn );
	cmnAdd_event( eOn, "mousedown", function(){ cmnSet_class( eOn, "mousedown" ) } );
	cmnAdd_event( eOn, "mouseup", function(){ cmnSwitch_class( eOn, "mousedown", "mouseup" ) } );
}

function cmnAdd_hover( eOn ){
	cmnAdd_event( eOn, "mouseover", function(){ cmnSet_class( eOn,    "hover" ) } );
	cmnAdd_event( eOn, "mouseout",  function(){ cmnRemove_class( eOn, "hover" ) } );
}

function cmnAdd_events( eOn, asEvent_type, ptrFunction ){
	for( var sName in asEvent_type ){
		cmnAdd_event(eOn, asEvent_type[sName], ptrFunction );
	}
}

var cmnFor_events = new Array();

function cmnAdd_event( eThis, sEvent, fEvent, bLow_priority ){
	if( eThis.addEventListener ){
		eThis.addEventListener( sEvent, fEvent, false );
	} else {
		if( eThis['on' + sEvent] && !eThis['for_' + sEvent] ){
			eThis['for_' + sEvent] = new Array();
			cmnFor_events[cmnFor_events.length] = eThis;
			eThis['for_' + sEvent][eThis['for_' + sEvent].length] = eThis['on' + sEvent];
			eThis['on' + sEvent] = cmnEvent.closure( eThis );
		}
		if( eThis['for_' + sEvent] ){
			eThis['for_' + sEvent][eThis['for_' + sEvent].length] = fEvent;
		}else{
			eThis['on' + sEvent] = fEvent;
		}
	}
}

function cmnEvent( evt ){
	var sEvent = 'for_' + ( evt ? evt.type : window.event.type );
	if( this && this[sEvent] )
	for( var i = 0 ; i < this[sEvent].length ; i++ ){
		this[sEvent][i]( this );
	}
}

Function.prototype.closure = function( obj ){
	if( !window.__objs ){
		window.__objs = [];
		window.__funs = [];
	}
	var fun = this, objId = obj.__objId;
	if( !objId ){
		__objs[objId = obj.__objId = __objs.length] = obj;
	}
	var funId = fun.__funId;
	if( !funId){
		__funs[funId = fun.__funId = __funs.length] = fun;
	}
	if( !obj.__closures ){
		obj.__closures = [];
	}
	var closure = obj.__closures[funId];
	if( closure ){
		return closure;
	}
	obj = null;
	fun = null;
	return __objs[objId].__closures[funId] = function(){
		return __funs[funId].apply(__objs[objId], arguments);
	};

}





/*
// 2006-04-24
// Copyright (c) Art. Lebedev | http://www.artlebedev.ru/
// Author - Vladimir Tokmakov
*/

cmnAdd_event( window, "load", atkAllow_tab_key_in_text_inputs );

function atkAllow_tab_key_in_text_inputs(){
	var aeText_input = document.getElementsByTagName("TEXTAREA");
	for( var i = 0 ; i < aeText_input.length ; i++ ){
		if( cmnMatch_class( aeText_input[i], "allow_tab_key" )
			&& aeText_input[i].bTab_pressed != false ){
			atkAllow_tab_key_for( aeText_input[i] );
		}
	}
	aeText_input = document.getElementsByTagName("INPUT");
	for( var i = 0, sType ; i < aeText_input.length ; i++ ){
		sType = aeText_input[i].getAttribute("type");
		if( sType && sType.toLowerCase() == "text"
			&& cmnMatch_class( aeText_input[i], "allow_tab_key" )
			&& aeText_input[i].bTab_pressed != false ){
			atkAllow_tab_key_for( aeText_input[i] );
		}
	}
}

atk_aeText_input = new Array();

function atkAllow_tab_key_for( eInput ){
	if( cmn_oInformation.bIE ){
		cmnAdd_event( eInput, "keydown",
			function(e){
				if( window.event.keyCode == 9 ){
					var etcRange = document.selection.createRange();
					if( etcRange.text.length ){
						if( window.event.shiftKey ){
							etcRange.text = atkRemove_tabs( etcRange.text );
						}else{
							etcRange.text = atkInsert_tabs( etcRange.text );
						}
					}else{
						etcRange.text = "\t";
					}
					return false;
				}
			}
		);
	}else if( eInput ){//&& eInput.selectionStart ){
		var i = atk_aeText_input.length;
		atk_aeText_input[i] = eInput;
		cmnAdd_event( eInput, "keypress",
			function(e){
				if( e.keyCode == 9 ){
					this.bTab_pressed = true;
					var iScroll_top = this.scrollTop;
					var iStart = this.selectionStart;
					var sA = this.value.substring( 0, iStart );
					var sB = this.value.substring( iStart, this.selectionEnd );
					var bSelection = false;
					var sC = this.value.substring( this.selectionEnd, this.value.length );
					if( sB.length ){
						bSelection = true;
						if( e.shiftKey ){
							sB = atkRemove_tabs( sB );
						}else{
							sB = atkInsert_tabs( sB );
						}
					}else{
						sB = "\t";
					}
					this.value = sA + sB + sC;
					this.focus();
					if( bSelection ){
						this.selectionStart = iStart;
						this.selectionEnd = iStart + sB.length;
					}else{
						this.selectionStart = ++iStart;
						this.selectionEnd = iStart;
					}
					this.scrollTop = iScroll_top;
					if( e.cancelable ){
						e.preventDefault();
						e.stopPropagation();
					}
				}
			}
		);
		cmnAdd_event( eInput, "blur",
			function(e){
				if( this.bTab_pressed ){
					this.bTab_pressed = false;
					setTimeout( "atk_aeText_input[" + i + "].focus()", 1 );
				}
			}
		);
	}
	eInput.bTab_pressed = false;

}

function atkRemove_tabs( sText ){
	return sText.replace( /(^|\n)\t/g, "$1" );
}

function atkInsert_tabs( sText ){
	return sText.replace( /(^|\n)([\t\S])/g, "$1\t$2" );
}

var bAllow_tab_key_script_loaded = true;