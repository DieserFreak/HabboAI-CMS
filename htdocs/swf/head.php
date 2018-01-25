<?php
    $base = 'http://www.habbo.nl/habbo-imaging/avatarimage?figure=';
    $figure = $_GET['figure'];

    // Create image instances
    $src = imagecreatefrompng($base.$figure);
    $dest = imagecreate(54, 62);
	
    // Copy
    imagecopy($dest, $src, 0, 0, 6, 8, 54, 51);
    
    // Output and free from memory
    header('Content-Type: image/gif');
    imagegif($dest);
    
    imagedestroy($dest);
    imagedestroy($src);
?>