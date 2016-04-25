/** Adapted from Eric B. Dev - Simple Grid Wordpress :: https://github.com/ericbdev/simpleGridWordPress **/


function ericbdev_email_replace()
{
	var element = $('.js-replacer-text');
	if (element.length > 0) {
		element.each(function ()
		{
			var domain = $(this).data('domain'),
				extra = $(this).data('extra'),
				text = $(this).data('text');
			var email_string = extra + '@' + domain;
			$(this).attr('href', 'mailto:' + email_string);
			if(text != undefined) {
				$(this).text(text);
			} else {
				$(this).text(email_string);
			}
		});
	}
}