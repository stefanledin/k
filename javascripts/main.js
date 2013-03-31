;(function ($) {
	
	// Boot Foundation-stuff
	$(document).foundation();

	// Get tweets
	$.getJSON('https://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name=k_berglund&count=5&callback=?', function(data) {
		var data = data,
			html = '';

		for (var i = 0; i < data.length; i++) {
			html += '<li>'+data[i].text+'</li>';
		};

		document.getElementById('tweets').innerHTML = twitterify(html);
	});

}(jQuery));