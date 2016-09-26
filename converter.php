<?php

include 'simple_html_dom.php';

/**
 * Created by PhpStorm.
 * User: platico
 * Date: 9/27/16
 * Time: 12:05 AM
 */


get_bibtex_from('http://oswinds.csd.auth.gr/publications/','span','pub_bibtex','output.html');

function get_bibtex_from($url,$bibtex_wrapper,$bibtex_class,$filename){
//gets the source code of the html page
    $html = file_get_html($url);
    $htmlFileData = "<html>\n<head></head>\n<body>\n";
    file_put_contents($filename, $htmlFileData, FILE_APPEND | LOCK_EX);


//finds all the text wrapped by the specific wrapper in a specific class
    foreach($html->find($bibtex_wrapper.'.'.$bibtex_class) as $e){
        file_put_contents($filename, $e->innertext.'</br>', FILE_APPEND | LOCK_EX);
    }

    $htmlFileData = "\n</html>";
    file_put_contents($filename, $htmlFileData, FILE_APPEND | LOCK_EX);

    echo "Done! Your file can be found in: ".$filename;

}

?>
