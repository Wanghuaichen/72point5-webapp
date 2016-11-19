var url = 'http://192.168.33.10/'; // development

casper.test.begin('Title test', 1, function suite(test) {
	casper.start(url, function() {
		test.assertTitle(casper.getTitle());
	});
});

casper.run();
