<?php

use Blaze\File\File;

print "<pre>";
print '<p><a href="'.__url("./", TRUE).'">Home</a></p>';
print "<p>Welcome Guest \u{1F60D}</p>";
print "<p>Write your test code here:</p>";

print "<p>Memory Usage: ".File::sizeBytesToText(memory_get_usage(true))."</p>";
