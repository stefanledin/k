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

		var checkboxes = document.getElementById('filter').elements;
		
		// Add eventlistener
		[].forEach.call(checkboxes, function (el) {
			
			el.addEventListener('change', filterCategories);

		});

		function filterCategories () {
			[].forEach.call(checkboxes, function (el) {
				if (el.checked) {
					[].forEach.call(document.querySelectorAll('article'+el.value), function (project) {
						project.style.display="block";
					});
				} else {
					[].forEach.call(document.querySelectorAll('article'+el.value), function (project) {
						project.style.display="none";
					});
				}
			});
		}

	}

	return function () {
		// Boot foundationstuff
		$(document).foundation();

		getTweets();
		
		filterProjects();
	};

}(jQuery));

App();