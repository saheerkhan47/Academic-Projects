<?php
include 'excel_controller.php';
$clinic = new DBController();
$productResult = $clinic->runQuery("SELECT count(*) as custcount,username,userid,contact,email FROM tbluser group by userid");

  
    $filename = "Export_doctorexcel.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");
    $isPrintHeader = false;
    if (! empty($productResult)) {
        foreach ($productResult as $row) {
            if (! $isPrintHeader) {
                echo implode("\t", array_keys($row)) . "\n";
                $isPrintHeader = true;
            }
            echo implode("\t", array_values($row)) . "\n";
        }
    }
    exit();

?>