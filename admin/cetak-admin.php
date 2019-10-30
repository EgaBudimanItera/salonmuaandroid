<?php 
  include 'admin/action/koneksi.php';

require('pdf/fpdf.php');
    // Setting halaman PDF
   @$daritanggal = $_POST['dari'];
   @$sampaitanggal = $_POST['sampai'];
   
   $dari =date("d-m-Y", strtotime($daritanggal));
   $sampai =date("d-m-Y", strtotime($sampaitanggal));
   @$id_salon = $_POST['id_salon'];
    $pdf = new FPDF('l','mm','A4');
    // Menambah halaman baru
    $pdf->AddPage();
    // Setting jenis font
    $pdf->SetFont('Arial','B',16);
    // Membuat string
    $pdf->Cell(280,7,'Laporan Pemesanan',0,1,'C');
    $pdf->SetFont('Arial','B',9);
    $pdf->Cell(280,7,'Periode '.$dari.' - ' . $sampai,0,1,'C');
    // Setting spasi kebawah supaya tidak rapat
    $pdf->Cell(10,7,'',0,1);

    
    $pdf->SetFont('Arial','B',10);
$pdf->Cell(10,6,'NO',1,0);
$pdf->Cell(50,6,'NAMA',1,0);
$pdf->Cell(95,6,'ALAMAT',1,0);
$pdf->Cell(30,6,'JASA',1,0);
$pdf->Cell(60,6,'KETERANGAN',1,0);
$pdf->Cell(40,6,'HARGA',1,1);

$pdf->SetFont('Arial','',10);
$tanggal = date('d/m/Y');
$no=1;
$query = mysqli_query($conn, "select * from tbl_order as a
inner join tbl_pendaftaran as b on a.`id_pendaftar` = b.`id_pendaftar`
inner join tbl_jenis_jasa as c on a.`id_jenis_jasa` = c.`id_jenis`

where a.tanggal between '$dari' and '$sampai' and c.`id_salon` ='$id_salon' ");
while ($row = mysqli_fetch_array($query)){
    $pdf->Cell(10,6,$no,1,0);
    $pdf->Cell(50,6,$row['nama'],1,0);
    $pdf->Cell(95,6,$row['alamat'],1,0);
    $pdf->Cell(30,6,$row['jasa'],1,0);
    $pdf->Cell(60,6,$row['keterangan'],1,0);
    $pdf->Cell(40,6,$row['jml_harga'],1,1);
    $no ++;
}
 $pdf->Cell(10,15,'',0,1);

$pdf->SetFont('Arial','',10);
$pdf->Cell(10,6,'Bandar Lampung, '. $tanggal,0,1);
 // $pdf->Cell(10,5,'',0,1);
$pdf->Cell(10,6,'Admin',0,1);
$pdf->Cell(10,30,'',0,1);
		//$pdf->Ln(20);
		//buat garis horisontal
		$pdf->Line(10,100,60,100);


    $pdf->Output();
    
?>