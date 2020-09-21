<?PHP
// create object
$zip = new ZipArchive();   

// open archive 
if ($zip->open('cv.pdf') !== TRUE) {
    die ("Could not open archive");
}

// get number of files in archive
$numFiles = $zip->numFiles;

// iterate over file list
// print details of each file
for ($x=0; $x<$numFiles; $x++) {
    $file = $zip->statIndex($x);
    printf("%s (%d bytes)", $file['name'], $file['size']);
    print "
";    
}

// close archive
$zip->close();
?>