<?php

include 'simple_html_dom.php';

/**
 * User: platico
 * Date: 9/27/16
 * Time: 12:05 AM
 */


/**
 * @param $url url of the page to be parsed
 * @param $bibtex_wrapper the wrapper tag of the bibtex (ex. span)
 * @param $bibtex_class the class of the wrapper tag
 * @param $filename file name of the oupput file
 */
function get_bibtex_from($url,$bibtex_wrapper,$bibtex_class,$filename){
    //gets the source code of the html page
    $html = file_get_html($url);

    //appends first elements of the output html file
    $htmlFileData = "<html>\n<head></head>\n<body>\n";
    file_put_contents($filename, $htmlFileData, FILE_APPEND | LOCK_EX);


    //finds all the text wrapped by the specific wrapper in a specific class
    foreach($html->find($bibtex_wrapper.'.'.$bibtex_class) as $e){
        file_put_contents($filename, $e->innertext.'</br>', FILE_APPEND | LOCK_EX); //prints the in the file
    }

    $htmlFileData = "\n</html>";
    file_put_contents($filename, $htmlFileData, FILE_APPEND | LOCK_EX);

    echo "Done! Your file can be found in: ".$filename;

}

?>
