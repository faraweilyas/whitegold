<!DOCTYPE html>
<html>
<head>
    <title>404 Error</title>
</head>
<body>
    <h3>404 Error: Page not found</h3>
    <p>Sorry, but the page <b>'<?= getSiteURL(); ?>'</b> you are looking for has not been found.</p>
    <a href="<?= __url("./") ?>">Return to homepage</a>
</body>
</html>