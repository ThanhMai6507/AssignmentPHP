<?php 
    function writeInfo() 
    {
        $myFile = fopen("students.txt", "w");

        $txt = "Nguyễn Văn A | 20\n";
        fwrite($myFile, $txt);
        $txt = "Nguyễn Văn B | 30\n";
        fwrite($myFile, $txt);
        $txt = "Nguyễn Văn C | 35\n";
        fwrite($myFile, $txt);
        $txt = "Nguyễn Văn D | 25";
        fwrite($myFile, $txt);

        fclose($myFile);
    }

    function readInfo() {
        $row = file_get_contents("students.txt");
        $arr = explode("\n", $row); 
        print_r($arr);
    }
?>
