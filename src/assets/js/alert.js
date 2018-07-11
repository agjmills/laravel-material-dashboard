var asdfx = {};

asdfx.alert = function(msg, options) {
    var options = options || {};
    var status = options.status || 'info';
    var timeout = (typeof options.timeout !== 'undefined') ? options.timeout : true;
    var id = options.id || Math.random();

    var alertTpl = '' +
        '<div data-alert-id="' + id + '" class="alert alert-{{status}} alert-dismissable alert-fixed alert-fixed-hidden js-alert">' +
        '<button type="button" class="js-alert-close close" aria-hidden="true">×</button>' +
        '{{msg}}' +
        '</div>' +
        '';

    switch(status) {
        case 'danger':
            $('.js-alert.alert-danger').remove();
            alertTpl = alertTpl.replace('{{msg}}', '<span class="icon icon-exclamation-triangle"></span> {{msg}}')
            break;
        default:
            alertTpl = alertTpl.replace('{{msg}}', '<span class="icon icon-info-circle"></span> {{msg}}');
            break;
    }

    alertTpl = alertTpl
        .replace('{{msg}}', msg)
        .replace('{{status}}', status);

    var alertSelector = '.js-alert[data-alert-id="' + id + '"]';

    $(alertSelector).remove();

    $('body').prepend(alertTpl);

    setTimeout(function(){
        $(alertSelector).removeClass('alert-fixed-hidden');
    }, 50);

    // Auto timeout if not an error
    if ((status === 'info' || status === 'success') && timeout) {
        setTimeout(function(){
            $(alertSelector).addClass('alert-fixed-hidden');
            setTimeout(function () {
                $(alertSelector).remove();
            }, 300);
        }, 5000);
    }
};

asdfx.alertClose = function(id) {
    var $alert = $('.js-alert[data-alert-id="' + id + '"]');
    $alert.addClass('alert-fixed-hidden');
    setTimeout(function () {
        $alert.remove();
    }, 300);
};

$(document).on('click', '.js-alert-close', function () {
    var $alert = $(this).parent();
    $alert.addClass('alert-fixed-hidden');
    setTimeout(function () {
        $alert.remove();
    }, 300);
});
