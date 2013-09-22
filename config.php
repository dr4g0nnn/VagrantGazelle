<?php
if (PHP_VERSION_ID < 50400) {
	die("Gazelle requires PHP 5.4 or later to function properly");
}
date_default_timezone_set('UTC');

// Main settings
define('SITE_NAME', 'gazelle test'); //The name of your site
define('NONSSL_SITE_URL', 'localhost'); //The FQDN of your site
define('SSL_SITE_URL', 'localhost'); //The FQDN of your site, make this different if you are using a subdomain for ssl
define('SITE_IP', ''); //The IP address by which your site can be publicly accessed
define('SERVER_ROOT', '/var/www'); //The root of the server, used for includes, purpose is to shorten the path string
define('ANNOUNCE_URL', 'http://'.NONSSL_SITE_URL.':34000'); //Announce URL

// Allows you to run static content off another server. Default is usually what you want.
define('NONSSL_STATIC_SERVER', 'static/');
define('SSL_STATIC_SERVER', 'static/');

// Keys
define('ENCKEY', 'JRFb5tW89xBSjaJPIq1u'); //Random key. The key for encryption
define('SITE_SALT', 'xwNXjg2BL5C5gLPIUMlq'); //Random key. Default site wide salt for passwords, DO NOT LEAVE THIS BLANK/CHANGE AFTER LAUNCH!
define('SCHEDULE_KEY', 'OL9n0m2JxhBxYyMvXWJg'); // Random key. This key must be the argument to schedule.php for the schedule to work.
define('RSS_HASH', 'weFQmRVNrfcbhq0TNWZA'); //Random key. Used for generating unique RSS auth key.

// MySQL details
define('SQLHOST', 'localhost'); //The MySQL host ip/fqdn
define('SQLLOGIN', 'root');//The MySQL login
define('SQLPASS', 'em%G9Lrey4^N'); //The MySQL password
define('SQLDB', 'gazelle'); //The MySQL database to use
define('SQLPORT', 3306); //The MySQL port to connect on
define('SQLSOCK', '/var/run/mysqld/mysqld.sock');

// Memcached details
$MemcachedServers = array(
	// unix sockets are fast, and other people can't telnet into them
	array('host' => 'unix:///var/run/memcached.sock', 'port' => 0, 'buckets' => 1),
);

// Sphinx details
define('SPHINX_HOST', 'localhost');
define('SPHINX_PORT', 9312);
define('SPHINXQL_HOST', '127.0.0.1');
define('SPHINXQL_PORT', 9306);
define('SPHINXQL_SOCK', false);
define('SPHINX_MAX_MATCHES', 1000); // Must be <= the server's max_matches variable (default 1000)
define('SPHINX_INDEX', 'torrents');

// Ocelot details
define('TRACKER_HOST', 'localhost');
define('TRACKER_PORT', 34000);
define('TRACKER_SECRET', '1737853d77069dc24824916a8d0e501e'); // Must be 32 characters and match site_password in Ocelot's config.cpp

if (!empty($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 80) {
	define('SITE_URL', NONSSL_SITE_URL);
	define('STATIC_SERVER', NONSSL_STATIC_SERVER);
} else {
	define('SITE_URL', SSL_SITE_URL);
	define('STATIC_SERVER', SSL_STATIC_SERVER);
}

// Site settings
define('CRYPT_HASH_PREFIX', '$2y$07$');
define('DEBUG_MODE', true); //Set to false if you dont want everyone to see debug information, can be overriden with 'site_debug'
define('DEBUG_WARNINGS', true); //Set to true if you want to see PHP warnings in the footer
define('OPEN_REGISTRATION', true); //Set to false to disable open regirstration, true to allow anyone to register
define('USER_LIMIT', 5000); //The maximum number of users the site can have, 0 for no limit
define('STARTING_INVITES', 0); //# of invites to give to newly registered users
define('BLOCK_TOR', false); //Set to true to block Tor users
define('BLOCK_OPERA_MINI', false); //Set to true to block Opera Mini proxy
define('DONOR_INVITES', 2);

// User class IDs needed for automatic promotions. Found in the 'permissions' table
// Name of class	Class ID (NOT level)
define('ADMIN',		'1');
define('USER',		'2');
define('MEMBER',	'3');
define('POWER',		'4');
define('ELITE',		'5');
define('VIP',		'6');
define('TORRENT_MASTER','7');
define('LEGEND',	'8');
define('CELEB',		'9');
define('MOD',		'11');
define('DESIGNER',	'13');
define('CODER',		'14');
define('SYSOP',		'15');
define('ARTIST',	'19');
define('DONOR',		'20');
define('FLS_TEAM',	'21');
define('POWER_TM',	'22');
define('ELITE_TM',	'23');

// Pagination
define('TORRENT_COMMENTS_PER_PAGE', 10);
define('POSTS_PER_PAGE', 25);
define('TOPICS_PER_PAGE', 50);
define('TORRENTS_PER_PAGE', 50);
define('REQUESTS_PER_PAGE', 25);
define('MESSAGES_PER_PAGE', 25);
define('LOG_ENTRIES_PER_PAGE', 50);

// Cache catalogues
define('THREAD_CATALOGUE', 500); // Limit to THREAD_CATALOGUE posts per cache key.

// IRC settings
define('BOT_NICK', '');
define('BOT_SERVER', ''); // IRC server address. Used for onsite chat tool.
define('BOT_PORT', 6667);
define('BOT_CHAN', '#'.NONSSL_SITE_URL);
define('BOT_ANNOUNCE_CHAN', '#');
define('BOT_STAFF_CHAN', '#');
define('BOT_DISABLED_CHAN', '#'); // Channel to refer disabled users to.
define('BOT_HELP_CHAN', '#');
define('BOT_DEBUG_CHAN', '#');
define('BOT_REPORT_CHAN', '#');
define('BOT_NICKSERV_PASS', '');
define('BOT_INVITE_CHAN',BOT_CHAN.'-invites'); // Channel for non-members seeking an interview
define('BOT_INTERVIEW_CHAN',BOT_CHAN.'-interview'); // Channel for the interviews
define('BOT_INTERVIEW_NUM',5);
define('BOT_INTERVIEW_STAFF',BOT_CHAN.'-interviewers'); // Channel for the interviewers
define('SOCKET_LISTEN_PORT', 51010);
define('SOCKET_LISTEN_ADDRESS', 'localhost');
define('ADMIN_CHAN', '#');
define('LAB_CHAN', '#');
define('STATUS_CHAN', '#');

// Miscellaneous values
define('RANK_ONE_COST', 5);
define('RANK_TWO_COST', 10);
define('RANK_THREE_COST', 15);
define('RANK_FOUR_COST', 20);
define('RANK_FIVE_COST', 30);
define('MAX_RANK', 6);
define('MAX_EXTRA_RANK', 8);
define('DONOR_FORUM_RANK', 6);
define('DONOR_FORUM', 70);
define('MAX_SPECIAL_RANK', 3);

$ForumsRevealVoters = array();
$ForumsDoublePost = array();

$Categories = array('Music', 'Applications', 'E-Books', 'Audiobooks', 'E-Learning Videos', 'Comedy', 'Comics');
$GroupedCategories = array_intersect(array('Music'), $Categories);
$CategoryIcons = array('music.png', 'apps.png', 'ebook.png', 'audiobook.png', 'elearning.png', 'comedy.png', 'comics.png');

$Formats = array('MP3', 'FLAC', 'Ogg Vorbis', 'AAC', 'AC3', 'DTS');
$Bitrates = array('192', 'APS (VBR)', 'V2 (VBR)', 'V1 (VBR)', '256', 'APX (VBR)', 'V0 (VBR)', 'q8.x (VBR)', '320', 'Lossless', '24bit Lossless', 'Other');
$Media = array('CD', 'DVD', 'Vinyl', 'Soundboard', 'SACD', 'DAT', 'Cassette', 'WEB');

$CollageCats = array(0=>'Personal', 1=>'Theme', 2=>'Genre introduction', 3=>'Discography', 4=>'Label', 5=>'Staff picks', 6=>'Charts', 7=>'Artists');

$ReleaseTypes = array(1=>'Album', 3=>'Soundtrack', 5=>'EP', 6=>'Anthology', 7=>'Compilation', 9=>'Single', 11=>'Live album', 13=>'Remix', 14=>'Bootleg', 15=>'Interview', 16=>'Mixtape', 21=>'Unknown');
//$ForumCats = array(1=>'Site', 5=>'Community', 10=>'Help', 8=>'Music', 20=>'Trash'); //No longer needed

$ZIPGroups = array(
	0 => 'MP3 (VBR) - High Quality',
	1 => 'MP3 (VBR) - Low Quality',
	2 => 'MP3 (CBR)',
	3 => 'FLAC - Lossless',
	4 => 'Others'
);

//3D array of attributes, OptionGroup, OptionNumber, Name
$ZIPOptions = array(
	'00' => array(0,0,'V0'),
	'01' => array(0,1,'APX'),
	'02' => array(0,2,'256'),
	'03' => array(0,3,'V1'),
	'10' => array(1,0,'224'),
	'11' => array(1,1,'V2'),
	'12' => array(1,2,'APS'),
	'13' => array(1,3,'192'),
	'20' => array(2,0,'320'),
	'21' => array(2,1,'256'),
	'22' => array(2,2,'224'),
	'23' => array(2,3,'192'),
	'30' => array(3,0,'FLAC / 24bit / Vinyl'),
	'31' => array(3,1,'FLAC / 24bit / DVD'),
	'32' => array(3,2,'FLAC / 24bit / SACD'),
	'33' => array(3,3,'FLAC / Log (100) / Cue'),
	'34' => array(3,4,'FLAC / Log (100)'),
	'35' => array(3,5,'FLAC / Log'),
	'36' => array(3,6,'FLAC'),
	'40' => array(4,0,'DTS'),
	'41' => array(4,1,'Ogg Vorbis'),
	'42' => array(4,2,'AAC - 320'),
	'43' => array(4,3,'AAC - 256'),
	'44' => array(4,4,'AAC - q5.5'),
	'45' => array(4,5,'AAC - q5'),
	'46' => array(4,6,'AAC - 192')
);

// Ratio requirements, in descending order
// Columns: Download amount, required ratio, grace period
$RatioRequirements = array(
	array(50 * 1024 * 1024 * 1024, 0.60, date('Y-m-d H:i:s')),
	array(40 * 1024 * 1024 * 1024, 0.50, date('Y-m-d H:i:s')),
	array(30 * 1024 * 1024 * 1024, 0.40, date('Y-m-d H:i:s')),
	array(20 * 1024 * 1024 * 1024, 0.30, date('Y-m-d H:i:s')),
	array(10 * 1024 * 1024 * 1024, 0.20, date('Y-m-d H:i:s')),
	array(5 * 1024 * 1024 * 1024,  0.15, date('Y-m-d H:i:s', time() - (60 * 60 * 24 * 14)))
);

//Captcha fonts should be located in /classes/fonts
$CaptchaFonts=array('ARIBLK.TTF','IMPACT.TTF','TREBUC.TTF','TREBUCBD.TTF','TREBUCBI.TTF','TREBUCIT.TTF','VERDANA.TTF','VERDANAB.TTF','VERDANAI.TTF','VERDANAZ.TTF');
//Captcha images should be located in /captcha
$CaptchaBGs=array('captcha1.png','captcha2.png','captcha3.png','captcha4.png','captcha5.png','captcha6.png','captcha7.png','captcha8.png','captcha9.png');

// Special characters, and what they should be converted to
// Used for torrent searching
$SpecialChars = array(
		'&' => 'and'
);
?>
