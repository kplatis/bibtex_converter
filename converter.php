<?php

include 'simple_html_dom.php';

/**
 * Created by PhpStorm.
 * User: platico
 * Date: 9/27/16
 * Time: 12:05 AM
 */


get_bibtex_from('http://oswinds.csd.auth.gr/publications/','span','pub_bibtex');

function get_bibtex_from($url,$bibtex_wrapper,$bibtex_class){
//gets the source code of the html page
    $html = file_get_html($url);

//finds all the text wrapped by the specific wrapper in a specific class
    $counter = 0;
    foreach($html->find($bibtex_wrapper.'.'.$bibtex_class) as $e){
        echo $e->innertext . '<br>';
    }
}


echo 'kostas';

?>
