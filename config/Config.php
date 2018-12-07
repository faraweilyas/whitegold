<?php

// Set all environment variables as constants
foreach ($_ENV as $key => $value) defined($key) ? NULL : define($key, getenv($key));

// Environment Constants that aren't defined
defined('DB_HOST') 			? NULL : define("DB_HOST", 				"localhost");
defined('DB_USERNAME') 		? NULL : define("DB_USERNAME", 			"");
defined('DB_PASSWORD') 		? NULL : define("DB_PASSWORD", 			"secret");
defined('DB_NAME') 			? NULL : define("DB_NAME", 				"");

defined('MAIL_DRIVER') 		? NULL : define("MAIL_DRIVER", 			"smtp");
defined('MAIL_HOST') 		? NULL : define("MAIL_HOST", 			"smtp.gmail.com");
defined('MAIL_USERNAME') 	? NULL : define("MAIL_USERNAME", 		"");
defined('MAIL_PASSWORD') 	? NULL : define("MAIL_PASSWORD", 		"secret");
// ssl = 465 or tls = 587
defined('MAIL_SMTPSECURE') 	? NULL : define("MAIL_SMTPSECURE", 		"ssl");
defined('MAIL_PORT') 		? NULL : define("MAIL_PORT", 			"465");
defined('MAIL_EMAIL') 		? NULL : define("MAIL_EMAIL", 			MAIL_USERNAME);
