<?php

/* mCMS
 * A first CMS by Micki 
 * -------------------------
 * Copyright (C) by Micki
 * Copyright reserved!
 */

class Filter 
{
	public function escape($string) {
        global $mysqli;
        return $mysqli->real_escape_string($string);
    }
	
	public function FilterText($string) {
        global $mysqli;
        return $mysqli->real_escape_string(addslashes(htmlspecialchars($string)));
    }
	
	function NewsText($string) {
		global $mysqli;
		if(get_magic_quotes_gpc()){ $string = stripslashes($string); }
		$string = preg_replace(array('/\x{0001}/u','/\x{0002}/u','/\x{0003}/u','/\x{0005}/u','/\x{0009}/u'),' ',$string);
		$string = $mysqli->real_escape_string($string);
		$string = nl2br($string);
		return $string;
	}
	
	function bbcode($str){
	   $str = htmlentities($str);

	   $format_search =  array(
		  '#\[b\](.*?)\[/b\]#is', // Bold [b]text[/b]
		  '#\[i\](.*?)\[/i\]#is', // Italics [i]text[/i]
		  '#\[u\](.*?)\[/u\]#is', // Underline [u]text[/u]
		  '#\[s\](.*?)\[/s\]#is', // Strikethrough [s]text[/s]
		  '#\[quote\](.*?)\[/quote\]#is', // Quote [quote]text[/quote]
		  '#\[code\](.*?)\[/code\]#is', // Monospaced code [code]text[/code]
		  '#\[size=([1-9]|1[0-9]|20)\](.*?)\[/size\]#is', // Font size 1-20px [size=20]text[/size])
		  '#\[color=\#?([A-F0-9]{3}|[A-F0-9]{6})\](.*?)\[/color\]#is', // Font color ([color=#00F]text[/color])
		  '#\[url=((?:ftp|https?)://.*?)\](.*?)\[/url\]#i', // Hyperlink with descriptive text ([url=http://url]text[/url])
		  '#\[url\]((?:ftp|https?)://.*?)\[/url\]#i', // Hyperlink ([url]http://url[/url])
		  '#\[img\](https?://.*?\.(?:jpg|jpeg|gif|png|bmp))\[/img\]#i' // Image ([img]http://url_to_image[/img])
	   );

	   $format_replace = array(
		  '<strong>$1</strong>',
		  '<em>$1</em>',
		  '<span style="text-decoration: underline;">$1</span>',
		  '<span style="text-decoration: line-through;">$1</span>',
		  '<blockquote>$1</blockquote>',
		  '<pre>$1</'.'pre>',
		  '<span style="font-size: $1px;">$2</span>',
		  '<span style="color: #$1;">$2</span>',
		  '<a href="$1">$2</a>',
		  '<a href="$1">$1</a>',
		  '<img src="$1" alt="" />'
	   );

	   $str = preg_replace($format_search, $format_replace, $str);
	   $str = nl2br($str); // Convert line breaks in the <br /> tag
	   return $str;
	}
}

?>