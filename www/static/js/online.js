var codeOriginal = '',
    codeResorted = '';

var app = {
    container: {
        codeOriginal: document.getElementsByClassName('code-original')[0],
        codeResorted: document.getElementsByClassName('code-resorted')[0],
        resortButton: document.getElementById('resort-button'),
        modeSelector: document.getElementById('mode-selector'),
        copyResultButton: document.getElementById('copy-result-button')
    },

    // Функция считает сколько строк в тексте text
    countLines: function (text) {
        var matches = text.match(/\n/g);
        if (!matches) {
            matches = '';
        }
        return (matches.length + 1);
    }
};

// Функция рисует в нужном месте (target) номера строк
function drawLineNumbers(length, target) {
    var c = document.createElement("div"),
        i,
        span;

    for (i = 1; i <= length; i++) {
        span = document.createElement("span");
        span.innerHTML = i + '.';
        c.appendChild(span);
    }

    target.appendChild(c);
}

function drawDiff() {
    var lnr, i, lno, k, code;

    lnr = document.getElementsByClassName('code-line-numbers-resorted');
    for (i = 0; i < lnr.length; i++) {
        drawLineNumbers(app.countLines(codeResorted), lnr[i]);
    }

    lno = document.getElementsByClassName('code-line-numbers-original');
    for (k = 0; k < lno.length; k++) {
        drawLineNumbers(app.countLines(codeOriginal), lno[k]);
    }
    code = document.createElement("code");
    code.innerHTML = codeOriginal;
    app.container.codeOriginal.appendChild(code);

    code = document.createElement("code");
    code.innerHTML = codeResorted;
    app.container.codeResorted.appendChild(code);

    app.container.codeResorted.parentNode.removeAttribute('style');

    $(app.container.resortButton).addClass('disabled');
    app.container.resortButton.setAttribute('disabled','disabled');
    app.container.copyResultButton.removeAttribute('disabled');
}

function drawEdit() {
    var textarea = document.createElement("textarea");

    textarea.id = 'textarea';
    textarea.className = 'allow_tab_key';
    textarea.innerHTML = codeOriginal;
    textarea.style.height = app.container.codeOriginal.parentNode.offsetHeight - 4 + 'px'; // WTF?
    app.container.codeOriginal.parentNode.appendChild(textarea);

    app.container.codeResorted.parentNode.setAttribute('style','display:none;');

    app.container.copyResultButton.setAttribute('disabled','disabled');
    app.container.resortButton.removeAttribute('disabled');
    $(app.container.resortButton).removeClass('disabled');
}

function clear() {
    app.container.codeOriginal.innerHTML = app.container.codeResorted.innerHTML = '';

    if (document.getElementById('textarea')) {
        $('#textarea').remove();
    }

    var lno = document.getElementsByClassName('code-line-numbers-original')[0];
    lno.innerHTML = '';
    var lnr = document.getElementsByClassName('code-line-numbers-resorted')[0];
    lnr.innerHTML = '';

}

// Режим редактирования
$('#mode-edit').click(function() {
    var e = $('#mode-edit');

    if (!e.hasClass('selected')) {
        e.addClass('selected');
        $('#mode-diff').removeClass();
        $('.code table').attr('class','edit-mode');
        clear();
        drawEdit();
    }

    return false;
});

// Режим сравнения
$('#mode-diff').click(function() {
    $('.code table').attr('class','diff-mode');
    doResort();
    return false;
});

drawEdit();
$('#mode-edit').addClass('selected');

$(app.container.resortButton).click(function() {
    doResort();
});


function doResort() {
    var order = '',
        code = $('#textarea').val();

    if (getCookie('csscomb-order')) {
        var c = getCookie('csscomb-order'),
            lines = c.split(/\%0A/),
            i,
            customSortOrder;

        for (i = 0; i < lines.length; i++) {
            lines[i] = '"' + lines[i] + '"';
        }

        customSortOrder = '[' + lines.join(',') + ']';
        order = decode(customSortOrder);
    }

    codeOriginal = code;
    if (!code) {
        code = ' ';
    }

    $.post(
        "/gate/gate.php",

        {
            code  : code,
            order : order
        },

        function (data) {
            var e = $('#mode-diff');

            codeResorted = data;

            if (!e.hasClass('selected')) {
                e.addClass('selected');
                $('#mode-edit').removeClass();
                clear();
                drawDiff();
            }
        },

        "text"
    );
}


/**
 * s settings
 * ctrl+enter / r
 * c copy
 * d diff
 * e edit
 * l clear
 * u url
 * f file
 * b bug report
 *
 */

$.Shortcuts.add({
    type: 'down',
    mask: 'Ctrl+R,Ctrl+Enter',
    enableInInput: true,
    handler: function () {
        doResort();
    }
});

$.Shortcuts.add({
    type: 'down',
    mask: 'Ctrl+E',
    enableInInput: true,
    handler: function () {
        var e = $('#mode-edit');
        if (!e.hasClass('selected')) {
            e.addClass('selected');
            $('#mode-diff').removeClass();
            clear();
            drawEdit();
        }
    }
});

$.Shortcuts.add({
    type: 'down',
    mask: 'Ctrl+D',
    enableInInput: true,
    handler: function () {
        drawDiff();
    }
});

$.Shortcuts.add({
    type: 'down',
    mask: 'Ctrl+S',
    enableInInput: true,
    handler: function () {
        toggleSettingsBar();
    }
});

$.Shortcuts.add({
    type: 'down',
    mask: 'Ctrl+C',
    enableInInput: true,
    handler: function () {
        var e = $('#copy-result-button');
        if (e.attr('disabled') != 'disabled') {
            $('#copyResultPopup').css('display','block');
            $('#copyResultPopup #copy-result-textarea').val(codeResorted).select();
        }
        return false;
    }
});

$.Shortcuts.add({
    type: 'down',
    mask: 'Esc',
    enableInInput: true,
    handler: function () {
        if ($('.settings-bar').css('right') != '-400px') { toggleSettingsBar(); }
        if ($('#shortcutsSheet').css('display') == 'block') { $('#shortcutsSheet').hide(); }
        if ($('#copyResultPopup').css('display') == 'block') { $('#copyResultPopup').hide(); }
    }
});

$.Shortcuts.start();

jQuery(document).ready(function () {
     $('#textarea').tabby();
});


$('.settings-link a, .settings-bar .hide').click(function () {
    toggleSettingsBar();
});

$('#textarea').focus(function () {
    if ($('.settings-bar').css('right') != '-400px') { toggleSettingsBar(); }
});

function toggleSettingsBar() {
    var bar = $('.settings-bar');

    if (bar.css('right') == '0px') {
        bar.animate({right:'-400px'}, 300);
    } else {
        bar.animate({right:'0px'}, 300);
    }
}

$('.settings-link a').hover(function () {
    $('.settings-bar').toggleClass('settings-bar__hovered');
});

jQuery(document).ready(function () {
    $('#toggleShortcutsSheet').click(function () {
        $('#shortcutsSheet').css('display','block');
    });
});


/* Cookies */
function getCookie(c_name) {
    var i, x, y,
        ARRcookies = document.cookie.split(";");

    for (i = 0; i < ARRcookies.length; i++) {
        x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
        y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
        x = x.replace(/^\s+|\s+$/g, "");
        if (x == c_name) {
            return y;
        }
    }
}

function setCookie(c_name, value, exdays) {
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value = escape(value) + ((exdays === null) ? "" : "; expires=" + exdate.toUTCString());
    document.cookie = c_name + "=" + c_value;
}

function decode(str) {
    return str
            .replace(/\%0A/g,"\n")
            .replace(/\%27/g,"'")
            .replace(/\%22/g,'"')
            .replace(/\%7B/g,'{')
            .replace(/\%7D/g,'}')
            .replace(/\%20/g,' ')
            .replace(/\%5B/g,'[')
            .replace(/\%5D/g,']')
            .replace(/\%2C/g,',')
            .replace(/\%3A/g,':')
            .replace(/\%28/g,'(')
            .replace(/\%29/g,')')
            .replace(/\%09/g,'  ')
            .replace(/\%5C/g,'\\');
}

jQuery(document).ready(function () {
    if (!getCookie('csscomb-order')) {
        var get_order = 'zen';

        $.post(
            "/gate/gate.php",
            {get_order: get_order},
            function (data) {
                setCookie('csscomb-order', data, 365);
                $('#settings-textarea').val(data);
            },
            "text"
        );
    } else {
        var currentSortOrder = getCookie('csscomb-order');

        currentSortOrder = decode(currentSortOrder);
        $('#settings-textarea').val(currentSortOrder);
    }

    $('#zen-sort-order').click(function () {
        $('#settings-textarea').val('zen');
    });

    $('#ya-sort-order').click(function () {
        $('#settings-textarea').val('ya');
    });

    $('#user-sort-order').click(function () {
        $('#settings-textarea').val('user');
    });

    $('#save-sort-order').click(function () {
        var value = $('#settings-textarea').val();

        setCookie('csscomb-order', value, 365);
    });

    // скопировать результат
    $('#copy-result-button').click(function () {
        var e = $('#copy-result-button');

        if (e.attr('disabled') != 'disabled') {
            $('#copyResultPopup').css('display','block');
            $('#copyResultPopup #copy-result-textarea').val(codeResorted).select();
        }
        return false;
    });

    // кнопка копирования отсортированного кода
    $('.popup-close').click(function () {
        this.parentNode.parentNode.style.display = 'none';
        return false;
    });
});
