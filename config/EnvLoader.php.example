<?php

// SET ALL ENVIRONMENT VARIABLES AS CONSTANTS
foreach ($_ENV as $KEY => $VALUE):
	$VALUE = (in_array($KEY, ['UNDER_CONSTRUCTION', 'MINIFY_HTML_OUTPUT'])) ? (getenv($KEY) === "TRUE") : getenv($KEY);
	defined($KEY) ? NULL : define($KEY, $VALUE);
endforeach;

// ENVIRONMENT CONSTANTS THAT AREN'T DEFINED
defined('DEPLOYMENT_STATE') 	? NULL : define("DEPLOYMENT_STATE", 	"local");
defined('UNDER_CONSTRUCTION') 	? NULL : define("UNDER_CONSTRUCTION", 	FALSE);
defined('MINIFY_HTML_OUTPUT') 	? NULL : define("MINIFY_HTML_OUTPUT", 	TRUE);

defined('DB_HOST') 				? NULL : define("DB_HOST", 				"localhost");
defined('DB_USERNAME') 			? NULL : define("DB_USERNAME", 			"");
defined('DB_PASSWORD') 			? NULL : define("DB_PASSWORD", 			"secret");
defined('DB_NAME') 				? NULL : define("DB_NAME", 				"");

defined('MAIL_DRIVER') 			? NULL : define("MAIL_DRIVER", 			"smtp");
defined('MAIL_HOST') 			? NULL : define("MAIL_HOST", 			"smtp.gmail.com");
defined('MAIL_USERNAME') 		? NULL : define("MAIL_USERNAME", 		"");
defined('MAIL_PASSWORD') 		? NULL : define("MAIL_PASSWORD", 		"secret");
// ssl = 465 or tls = 587
defined('MAIL_SMTPSECURE') 		? NULL : define("MAIL_SMTPSECURE", 		"ssl");
defined('MAIL_PORT') 			? NULL : define("MAIL_PORT", 			"465");
defined('MAIL_EMAIL') 			? NULL : define("MAIL_EMAIL", 			MAIL_USERNAME);
