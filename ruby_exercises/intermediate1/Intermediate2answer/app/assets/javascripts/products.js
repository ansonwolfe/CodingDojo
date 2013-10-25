$(document).ready(function()
{
	$("#comment_for_product").on("submit", function()
	{
		var form = $(this);

		$.post(form.attr("action"), form.serialize(), function(data)
		{
			if(data.status)
			{
				$(data.comment_html).prependTo("#comments").hide().fadeIn();
			}
		}, "json");

		return false;
	});
});