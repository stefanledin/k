var App = (function($) {

	function getTweets () {
		$.getJSON('https://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name=k_berglund&count=5&callback=?', function(data) {
			var data = data,
				html = '';

			for (var i = 0; i < data.length; i++) {
				html += '<li>'+data[i].text+'</li>';
			};

			document.getElementById('tweets').innerHTML = twitterify(html);
		});		
	}
	
	function filterProjects () {

		// Boot isotope
		$('#project-container').isotope({
			itemSelector: 'article',
			layoutMode: 'fitRows'/*,
			cellsByRow: {
				columnWidth: 322,
				rowHeight: 360
			}*/
		});

	}

	return function () {
		// Boot foundationstuff
		$(document).foundation();

		getTweets();
		
		filterProjects();
	};

}(jQuery));

App();