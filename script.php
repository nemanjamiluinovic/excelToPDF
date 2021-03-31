<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

if($_FILES["ee"]["name"] != ''){

    $allowed_extension = array('xls', 'xlsx');

    $file_array = explode(".", $_FILES['ee']['name']);
    $file_extension = end($file_array);

    if(in_array($file_extension, $allowed_extension)){

        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($_FILES['ee']['tmp_name']);

        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment;filename="myfile.pdf"');

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Mpdf');
        $writer->save('php://output');

    }
  
}
else{
    echo "file not selected!";
}

    ?>