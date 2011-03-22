var codeOriginal = '',
    codeResorted = '';

var app = {

    container: {
        codeOriginal: document.getElementsByClassName('code-original')[0],

        codeResorted: document.getElementsByClassName('code-resorted')[0],

        resortButton: $('#resort-button'),

        copyResultButton: document.getElementById('copy-result-button'),

        modeSelector: document.getElementById('mode-selector')

    },

    /* Функция считает сколько строк в тексте text */
    countLines: function(text){
        var matches = text.match(/\n/g);
        if(matches==null) matches = '';
        return matches.length + 1;
    }



}




// Функция рисует в нужном месте (target) номера строк
function drawLineNumbers(length, target){
    var n = document.createElement("div"); // создает контейнер-сборщик, чтобы дергать DOM только один раз для его вставки
    for(var i = 1; i <= length; i++){
        var span = document.createElement("span");
        span.innerHTML = i + '.';
        n.appendChild(span);
    }
    target.appendChild(n);
}

function drawDiff(){
    var ln = document.getElementsByClassName('code-line-numbers');
    for(var i = 0; i < ln.length; i++){
        drawLineNumbers(app.countLines(codeResorted), ln[i]);
    }

    var code = document.createElement("code");
    code.innerHTML = codeOriginal;
    app.container.codeOriginal.appendChild(code);

    var code = document.createElement("code");
    code.innerHTML = codeResorted;
    app.container.codeResorted.appendChild(code);

    app.container.codeResorted.parentNode.removeAttribute('style');

    app.container.resortButton.addClass('disabled');
    app.container.copyResultButton.removeAttribute('disabled');
}

function drawEdit(){
    var textarea = document.createElement("textarea");
    textarea.id = 'textarea';
    textarea.className = 'allow_tab_key';
    textarea.innerHTML = codeOriginal;
    textarea.style.height = app.container.codeOriginal.parentNode.offsetHeight - 4 + 'px'; // WTF?
    app.container.codeOriginal.parentNode.appendChild(textarea);

    app.container.codeResorted.parentNode.setAttribute('style','display:none;');

    app.container.copyResultButton.setAttribute('disabled','disabled');
    app.container.resortButton.removeClass('disabled');
}
//	drawEdit();

function clear(){
    app.container.codeOriginal.innerHTML = app.container.codeResorted.innerHTML = '';

    if(document.getElementById('textarea')){
        $('textarea').remove();
    }

    var ln = document.getElementsByClassName('code-line-numbers');
    for(var i = 0; i < ln.length; i++){
        ln[i].innerHTML = '';
    }
}
//	clear();

// режим редактирования
$('#mode-edit').click(function(){
    var e = $('#mode-edit');
    if(!e.hasClass('selected')){
        e.addClass('selected');
        $('#mode-diff').removeClass();
        clear();
        drawEdit();
    }
    return false;
});

// режим сравнения
$('#mode-diff').click(function(){
    var e = $('#mode-diff');
    if(!e.hasClass('selected')){
        e.addClass('selected');
        $('#mode-edit').removeClass();
        clear();
        drawDiff();
    }
    return false;
});



// кнопка копирования отсортированного кода
$('#copy-result-button').click(function(){
    var e = $('#copy-result-button');
    if(e.attr('disabled') != 'disabled'){
        alert('1');
    }

    return false;
});


//drawDiff();
drawEdit();
$('#mode-edit').addClass('selected');


$('#resort-button').click(function(){

    doResort();

});


function doResort(){
    var code = $('#textarea').val();

    $.post("/gate/gate.php", {code:code},
        function(data){
            codeResorted = data;
            codeOriginal = code;
            var e = $('#mode-diff');
            if(!e.hasClass('selected')){
                e.addClass('selected');
                $('#mode-edit').removeClass();
                clear();
                drawDiff();
            }
        }, "text"
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
    handler: function(){
        doResort();
    }
});

$.Shortcuts.add({
    type: 'down',
    mask: 'Ctrl+E',
    enableInInput: true,
    handler: function(){
        drawEdit();
    }
});

$.Shortcuts.add({
    type: 'down',
    mask: 'Ctrl+D',
    enableInInput: true,
    handler: function(){
        drawDiff();
    }
});

$.Shortcuts.start();



jQuery(document).ready(function(){
     $("textarea").tabby();
});
