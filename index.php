<?php

require_once 'assets/libs/misc.php';
require_once 'assets/libs/PHPMarkdown_1.0.1n/markdown.php';
$parser = new Markdown_Parser();
if (!empty($_GET['url'])) {
	define('DOC_FILE', sprintf('docs/%s.md', $_GET['url']));
} else {
	define('DOC_FILE', sprintf('docs/index.md'));
}

?>
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title>Framework docs</title>
	<link href="assets/css/reset.css" rel="stylesheet" type="text/css" media="all" />
	<link href="assets/css/grid.css" rel="stylesheet" type="text/css" media="all" />
	<link href="assets/css/typography.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>

<div class="content container_12">
		
	<h1>Documentation</h1>
	
	<?php if (file_exists(DOC_FILE)) : ?>
		<span class="grid_8 alpha">
			<?php echo $parser->transform(file_get_contents(DOC_FILE)); ?>
		</span>
	<?php endif; ?>
	
	<span class="grid_4 omega">
		<?php include('toc.php') ?>
	</span>

</div>

</body>
</html>