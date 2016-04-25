function base_form_validation(element)
{
	var form = $(element);
	if (form.length > 0) {
		form.each(function ()
		{
			$(this).validate({
				rules: {
					base_form_first_name: {
						required: true
					},
					base_form_last_name: {
						required: true
					},
					base_form_email: {
						required: true
					},
					base_form_subject: {
						required: true
					},
					base_form_message: {
						required: true
					}
				},
				invalidHandler: function(form, validator)
				{
					$('.base_form_notice').addClass('error');
					//for (var i = 0; i < validator.errorList.length; i++) {
					//	var label = $(validator.errorList[i].element).siblings();
					//	label.addClass('error');
					//}
				},
				errorPlacement: function (error, element)
				{
					return false;
				}
			});
		});
	}
}