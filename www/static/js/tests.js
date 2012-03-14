$('.test-title span').click(function() {
    var c = this.parentNode.parentNode.getElementsByClassName('test-content')[0],
        t = this.getElementsByClassName('toggle')[0];

    if (c.getAttribute('style')) {
        c.removeAttribute('style');
        t.innerHTML = '+';
    } else {
        c.setAttribute('style','display:block;');
        t.innerHTML = '&minus;';
    }
});


function showAllTests() {
    $('.test-list .success').show();
    $('.test-list .error').show();
    $('.test-list .warning').show();
    $('#show-all-tests').toggleClass('current');
}

$('#show-errors-only').click(function() {
    showAllTests();
    $('.test-list .success').hide();
    $('.test-list .warning').hide();
    $('.filter-for-tests .current').toggleClass('current');
    $('#show-errors-only').addClass('current');
});

$('#show-warnings-only').click(function() {
    showAllTests();
    $('.test-list .success').hide();
    $('.test-list .error').hide();
    $('.filter-for-tests .current').toggleClass('current');
    $('#show-warnings-only').addClass('current');
});

$('#show-errors-and-warnings').click(function() {
    showAllTests();
    $('.test-list .success').hide();
    $('.filter-for-tests .current').toggleClass('current');
    $('#show-errors-and-warnings').addClass('current');
});

$('#show-success-only').click(function() {
    showAllTests();
    $('.test-list .error').hide();
    $('.test-list .warning').hide();
    $('.filter-for-tests .current').toggleClass('current');
    $('#show-success-only').addClass('current');
});

$('#show-all-tests').click(function() {
    showAllTests();
    $('.filter-for-tests .current').toggleClass('current');
    $('#show-all-tests').addClass('current');
});

$('#show-all-tests').addClass('current');

if (window.location.hash !== '') {
    $(window.location.hash + ' .test-content').css('display','block');
}
