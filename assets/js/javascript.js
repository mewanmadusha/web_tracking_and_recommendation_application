$('select[multiple]').multiselect();
$(document).ready(function() {
	// alert("hello");
	$('#genre_id').multiselect({
		enableFiltering: true,
		enableCaseInsensitiveFiltering: true,
		buttonWidth: '400px',
		columns  : 3,
		search   : true,
		selectAll: true,
		texts    : {
			placeholder: 'Select Music Genres',
			search     : 'Search Music Genres'
		}
	});
});
