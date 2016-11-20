var system = require('system');
var url = system.env.TEST_URL;

casper.test.begin('Title test', 1, function suite(test) {
	casper.start(url, function() {
		test.assertTitle(casper.getTitle());
	});
});

casper.run();
