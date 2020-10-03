<?php



function My_Crypt($password){
    return hash ('sha256', $password);
}
// uploadfile(fichier, "/uploads/images/activites/")
function UploadFile($file, $destination, $types = null) {
    $MimeTypes = array (
        '3dmf'		=> 'x-world/x-3dmf',
        '3dm'		=> 'x-world/x-3dmf',
        'avi'		=> 'video/x-msvideo',
        'ai'		=> 'application/postscript',
        'bin'		=> 'application/octet-stream',
        'bin'		=> 'application/x-macbinary',
        'bmp'		=> 'image/bmp',
        'cab'		=> 'application/x-shockwave-flash',
        'c'			=> 'text/plain',
        'c++'		=> 'text/plain',
        'class'		=> 'application/java',
        'css'		=> 'text/css',
        'csv'		=> 'text/comma-separated-values',
        'cdr'		=> 'application/cdr',
        'doc'		=> 'application/msword',
        'dot'		=> 'application/msword',
        'docx'		=> 'application/msword',
        'dwg'		=> 'application/acad',
        'eps'		=> 'application/postscript',
        'exe'		=> 'application/octet-stream',
        'gif'		=> 'image/gif',
        'gz'		=> 'application/gzip',
        'gtar'		=> 'application/x-gtar',
        'flv'		=> 'video/x-flv',
        'fh4'		=> 'image/x-freehand',
        'fh5'		=> 'image/x-freehand',
        'fhc'		=> 'image/x-freehand',
        'help'		=> 'application/x-helpfile',
        'hlp'		=> 'application/x-helpfile',
        'html'		=> 'text/html',
        'htm'		=> 'text/html',
        'ico'		=> 'image/x-icon',
        'imap'		=> 'application/x-httpd-imap',
        'inf'		=> 'application/inf',
        'jpeg'		=> 'image/jpeg',
        'jpe'		=> 'image/jpeg',
        'jpg'		=> 'image/jpeg',
        'js'		=> 'application/x-javascript',
        'java'		=> 'text/x-java-source',
        'latex'		=> 'application/x-latex',
        'log'		=> 'text/plain',
        'm3u'		=> 'audio/x-mpequrl',
        'midi'		=> 'audio/midi',
        'mid'		=> 'audio/midi',
        'mov'		=> 'video/quicktime',
        'mp3'		=> 'audio/mpeg',
        'mpeg'		=> 'video/mpeg',
        'mpg'		=> 'video/mpeg',
        'mp2'		=> 'video/mpeg',
        'ogg'		=> 'application/ogg',
        'phtml'		=> 'application/x-httpd-php',
        'php'		=> 'application/x-httpd-php',
        'pdf'		=> 'application/pdf',
        'pgp'		=> 'application/pgp',
        'png'		=> 'image/png',
        'pps'		=> 'application/mspowerpoint',
        'ppt'		=> 'application/mspowerpoint',
        'ppz'		=> 'application/mspowerpoint',
        'pot'		=> 'application/mspowerpoint',
        'ps'		=> 'application/postscript',
        'qt'		=> 'video/quicktime',
        'qd3d'		=> 'x-world/x-3dmf',
        'qd3'		=> 'x-world/x-3dmf',
        'qxd'		=> 'application/x-quark-express',
        'rar'		=> 'application/x-rar-compressed',
        'ra'		=> 'audio/x-realaudio',
        'ram'		=> 'audio/x-pn-realaudio',
        'rm'		=> 'audio/x-pn-realaudio',
        'rtf'		=> 'text/rtf',
        'spr'		=> 'application/x-sprite',
        'sprite'	=> 'application/x-sprite',
        'stream'	=> 'audio/x-qt-stream',
        'swf'		=> 'application/x-shockwave-flash',
        'svg'		=> 'text/xml-svg',
        'sgml'		=> 'text/x-sgml',
        'sgm'		=> 'text/x-sgml',
        'tar'		=> 'application/x-tar',
        'tiff'		=> 'image/tiff',
        'tif'		=> 'image/tiff',
        'tgz'		=> 'application/x-compressed',
        'tex'		=> 'application/x-tex',
        'txt'		=> 'text/plain',
        'vob'		=> 'video/x-mpg',
        'wav'		=> 'audio/x-wav',
        'wrl'		=> 'model/vrml',
        'wrl'		=> 'x-world/x-vrml',
        'xla'		=> 'application/msexcel',
        'xls'		=> 'application/msexcel',
        'xls'		=> 'application/vnd.ms-excel',
        'xlc'		=> 'application/vnd.ms-excel',
        'xml'		=> 'text/xml',
        'zip'		=> 'application/x-zip-compressed',
        'zip'		=> 'application/zip',
    );

    $tmp_name = $file['tmp_name'];
    $name = $file['name'];
    $type = $file['type'];
    $error = $file['error'];
    $size = $file['size'];

    $key = array_search($type, $MimeTypes);

    //if($error > 0) {
       // var_dump($error);
        //return array(null);
    //}

    $nameArray = explode(".", $name); //array("01","JGP") -> 2 élements
    $lastIndex = count($nameArray) - 1;//total des éléments (2) mais je veux trouver le dernier index
    $extention = strtolower($nameArray[$lastIndex]);//deux elements dans le tb, mais -1 pour l'index du dernier element car index commence a zero


    $photoName = time() . "." . $extention;


    //$real_name = uniqid("image_") . "." . $key;

    move_uploaded_file($tmp_name, $_SERVER['DOCUMENT_ROOT']."/".$destination . $photoName);

    return array($photoName);

}


