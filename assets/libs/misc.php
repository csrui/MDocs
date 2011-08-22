<?php 

function auto_link_text($text) {
	
   $pattern  = '#\b(([\w-]+://?|www[.])[^\s()<>]+(?:\([\w\d]+\)|([^[:punct:]\s]|/)))#';
   $callback = create_function('$matches', '
       $url       = array_shift($matches);
       $url_parts = parse_url($url);

       $text = parse_url($url, PHP_URL_HOST) . parse_url($url, PHP_URL_PATH);
       $text = preg_replace("/^www./", "", $text);

       $last = -(strlen(strrchr($text, "/"))) + 1;
       if ($last < 0) {
           $text = substr($text, 0, $last) . "&hellip;";
       }

       return sprintf(\'<a rel="nofollow" href="%s">%s</a>\', $url, $text);
   ');

   return preg_replace_callback($pattern, $callback, $text);

}

function toc($folder) {

	$toc = array();
	
	$iterator = new DirectoryIterator($folder);
    foreach ($iterator as $fileinfo) {
        if ($fileinfo->isFile()) {
            $toc[$fileinfo->getMTime()] = substr($fileinfo->getFilename(), 0, -3);
        }
    }

	return $toc;
	
}

?>