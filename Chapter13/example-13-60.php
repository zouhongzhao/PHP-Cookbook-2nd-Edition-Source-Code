// When the page loads, run this code
dojo.addOnLoad(function() {
    // Call the search() function when the 'go' button is clicked
    dojo.event.connect(dojo.byId('go'), 'onclick', 'search');
});

function search() {
    // What's in the text box?
    var q = dojo.byId('q').value;
    // Send request to the server
    // The url should be to wherever you save the search page
    dojo.io.bind({ 'url': '/search.php', 
                 'content': { 'q': q },
                 // Type of the response
                 'mimetype': 'text/json',
                 // Function to call when the response comes
                 'load': showResults });
}

// Handle the results
function showResults(type, results, evt) {
    var html = '';
    // If we got some results...
    if (results.length > 0) {
        html = '<ul>';
        // Build a list of them
        for (var i in results) {
            html += '<li>' + dojo.string.escapeXml(results[i]) + '</li>';
        }
        html += '</ul>';
    } else {
        html = 'No results.';
    }
    // Put the result HTML in the page
    dojo.byId('output').innerHTML = html;
}