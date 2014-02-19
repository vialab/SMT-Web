function updateDate() {
	var uri = "http://github.com/vialab/SMT/commits/master.atom";
	var encodedURI = encodeURIComponent(uri);
	$.get( 'proxy.php?url=' + uri, function ( data) {
		var xml = $.parseXML( data);
		var entry = $(xml).find( "entry")[0];
		var txtDate = $(entry).find( "updated").text().substring( 0, 10);
		var now = new Date();
		var entryDate = new Date();
		var daysPast;

		entryDate.setFullYear(
			txtDate.substring( 0, 4),
			parseInt( txtDate.substring( 5, 7)) - 1,
			txtDate.substring( 8, 10));

		daysPast = daysBetween( now, entryDate);

		if (daysPast == 0)
			daysPast = "Today";
		else if( daysPast == 1)
			daysPast = "Yesterday";
		else
			daysPast = daysPast + " days ago";

		document.getElementById( "lastUpdate").innerHTML = daysPast;
	});
}


function daysBetween( date1, date2) {
	// The number of milliseconds in one day
	var ONE_DAY = 1000 * 60 * 60 * 24;

	// Convert both dates to milliseconds
	var date1_ms = date1.getTime();
	var date2_ms = date2.getTime();

	// Calculate the difference in milliseconds
	var difference_ms = Math.abs( date1_ms - date2_ms);

	// Convert back to days and return
	return Math.round( difference_ms / ONE_DAY);
}