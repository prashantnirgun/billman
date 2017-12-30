var myname ="login";
$(document).ready(function ()
{
	//as table is added as sub view dynamically and to register the event
	//register_event();
	//Save Button
	var pid = document.getElementById('pid').value;
	if (pid == 1)
	{
		document.getElementById("otp").focus();
	}else{
		document.getElementById("name").focus();
	}
	
	function site_url()
	{
		if (window.location.host == 'localhost' || window.location.host == 'billman.local' ){
			base_url = window.location.protocol + '//billman.local/';
		}
		else
		{
			//base_url = window.location.protocol + '//dev.tss.net.in/';
			base_url = 'https://' + window.location.hostname;
		}
		//console.log(base_url);
		return base_url;

	}

});
