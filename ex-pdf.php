<?php

$filepath = realpath(dirname(__FILE__));
include_once $filepath."/lib/Session.php";


Session::init();

spl_autoload_register(function($classes){

    include 'classes/'.$classes.".php";

});

$users = new Users();

if (Session::get("roleid") == '1') {

    require('inc/fpdf/fpdf.php');
    $pdf = new FPDF();
    $pdf->AddPage();

    $width_cell = array(10, 30, 20, 20, 40, 20, 20, 30);
    $pdf->SetFont('Arial', 'B', 10);

//Background color of header//
    $pdf->SetFillColor(193, 229, 252);

    $d = date('Y-m-d H:m:s');

    $pdf->SetXY('75%', 10);
    $pdf->Write(7, 'User list in ' . $d);
    $pdf->Ln();
    $pdf->Ln();


// Header starts ///
    $pdf->Cell($width_cell[0], 10, 'SL', 1, 0, 'C', true);
    $pdf->Cell($width_cell[1], 10, 'Name', 1, 0, 'C', true);
    $pdf->Cell($width_cell[2], 10, 'Username', 1, 0, 'C', true);
    $pdf->Cell($width_cell[3], 10, 'Role', 1, 0, 'C', true);
    $pdf->Cell($width_cell[4], 10, 'Email address', 1, 0, 'C', true);
    $pdf->Cell($width_cell[5], 10, 'Mobile', 1, 0, 'C', true);
    $pdf->Cell($width_cell[6], 10, 'Status', 1, 0, 'C', true);
    $pdf->Cell($width_cell[7], 10, 'Created', 1, 1, 'C', true);
//// header ends ///////

    $pdf->SetFont('Arial', '', 8);
//Background color of header//
    $pdf->SetFillColor(235, 236, 236);
//to give alternate background fill color to rows//
    $fill = false;

    $allUser = $users->selectAllUserData();

    $i = 0;
    $role = '';
    $status = '';

/// each record is one row  ///
    foreach ($allUser as $value) {

        $i++;

        if ($value->roleid == '1') {
            $role = "Admin";
        } elseif ($value->roleid == '2') {
            $role = "Editor";
        } elseif ($value->roleid == '3') {
            $role = "User Only";
        }

        if ($value->isActive == '0') {
            $status = 'Active';
        } else {
            $status = 'Deactive';
        }

        $pdf->Cell($width_cell[0], 10, $i, 1, 0, 'C', $fill);
        $pdf->Cell($width_cell[1], 10, $value->name, 1, 0, 'C', $fill);
        $pdf->Cell($width_cell[2], 10, $value->username, 1, 0, 'C', $fill);
        $pdf->Cell($width_cell[3], 10, $role, 1, 0, 'C', $fill);
        $pdf->Cell($width_cell[4], 10, $value->email, 1, 0, 'C', $fill);
        $pdf->Cell($width_cell[5], 10, $value->mobile, 1, 0, 'C', $fill);
        $pdf->Cell($width_cell[6], 10, $status, 1, 0, 'C', $fill);
        $pdf->Cell($width_cell[7], 10, $value->created_at, 1, 1, 'C', $fill);
        //to give alternate background fill  color to rows//
        $fill = !$fill;
    }
/// end of records ///

    $pdf->Output();
}else{
    header('Location: index.php');
}