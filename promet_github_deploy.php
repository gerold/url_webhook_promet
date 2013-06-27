<?php

// Absolute paths to directories.
$site_docroot = array(
  '/Users/arnoldfrench/Sites/prometsource.dev',
);

$commands = array(
  'git pull',
  'git status',
);

// ----------------------------------------------------------------------------
// No editing beyond this point.

$output = '';
foreach ($site_docroot as $dir) {
  if (!chdir($dir)) {
    continue;
  }

  foreach ($commands as $command) {
    // Run it
    $tmp = shell_exec($command);
    // Output
    $output .= "<span style=\"color: #6BE234;\">\$</span> <span style=\"color: #729FCF;\">{$command}\n</span>";
    $output .= htmlentities(trim($tmp)) . "\n";
  }
}

// Make it pretty for manual user access (and why not?)
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>GIT DEPLOYMENT SCRIPT</title>
</head>
<body style="background-color: #000000; color: #FFFFFF; font-weight: bold; padding: 0 10px;">
<pre>
 .  ____  .    ____________________________
 |/      \|   |                            |
[| <span style="color: #FF0000;">&hearts;    &hearts;</span> |]  | Git Deployment Script v0.1 |
 |___==___|  /              &copy; oodavid 2012 |
              |____________________________|

<?php echo $output; ?>
</pre>
</body>
</html>
