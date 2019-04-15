var request = require('request');
request('https://api.github.com/search/repositories?q=language:java&page=1&per_page=100', function (error, response, body) {
//   // console.log('error:', error); // Print the error if one occurred
//   // console.log('statusCode:', response && response.statusCode); // Print the response status code if a response was received
//   // var parsedWeather = JSON.parse(body);
	console.log(body); // Print the HTML for the Google homepage.
});
