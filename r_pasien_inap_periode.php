<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print</title>
<style>
.line_a{
	border-top:thin #333 solid;
}
.line_ki{
	border-left:thin #333 solid;
}
.line_ka{
	border-right:thin #333 solid;
}
.line_ba{
	border-bottom:thin #333 solid;
}
</style>
</head>

<body onload="javascript:window.print();">
<?php
include "config/koneksi.php";
include "config/ubah_tanggal.php";

$tgl_awal=$_POST['tgl_awal'];
$tgl_akhir=$_POST['tgl_akhir'];

$a=mysql_query("SELECT cek_in.idpasien,pasien.namapasien FROM cek_in,pasien WHERE cek_in.idpasien=pasien.idpasien AND cek_in.tanggalmasuk BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY namapasien ASC") or die(mysql_error());


?>
<center>
<table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <th  rowspan="1"><img width="70px" src="assets/images/avtar/logo_rsa.png" alt="..."></th>
    <th colspan="2" ><p align="center"><strong>RSUD dr. MUHAMMAD ZEIN PAINAN KAB. PESSEL</strong></br>Jalan dr. A Rivai Painan,Pesisir Selatan, Sumatera Barat</br>Telp. (0756) 214-282151 </p></th>
    <th rowspan="1"><img width="70px" src="assets/images/avtar/kab.jpg" alt="..."></th>
  </tr>
  <tr>
    <th colspan="4" ><hr></th>
  </tr>
  </br>
  <tr>
    <td colspan="3"  ></td>
    <td colspan="3"></td>
  </tr>
</tabel>

<table width="600" border="0" cellspacing="0" cellpadding="0">
<tr>
    <th colspan="3"><p align="center"><strong>LAPORAN JUMLAH PASIEN RAWAT INAP</strong></p></th>
</tr>
<tr>
    <th colspan="3"><div align="center">Periode: <?php echo DateToIndo($tgl_awal); ?> s/d <?php echo DateToIndo($tgl_akhir); ?></tr></div></th>
</tr>
</table>

<table width="600" border="0" cellspacing="0" cellpadding="5">
    <th class="line_ba line_a line_ki line_ka "><div align="center">NO.</div></th>
    <th class="line_ba line_ka line_a"><div >NO. RM</div></th>
    <th class="line_ba line_ka line_a"><div align="center">NAMA PASIEN</div></th>
  </tr>
  <?php $no=1; while ($aa=mysql_fetch_array($a)){ ?>
  <tr>
    <td align="center" class="line_ki line_ka line_ba"><?php echo $no; ?></td>
    <td align="center" class="line_ka line_ba"><?php echo $aa['idpasien'];?></td>
    <td align="center" class="line_ka line_ba"><?php echo $aa['namapasien'];?></td>
  </tr>
  <?php $no++; } 
  
    $hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
    $bulan = array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
    
  ?>
  <tr>
      <td colspan="2"></td>
      <td colspan="2" align="center"></br>Painan, <?php echo $hari[date("w")].", ".date("j")." ".$bulan[date("n")]." ".date("Y");?></td>
   </tr>
   <tr>
      <td colspan="2"></td>
      <td colspan="2" align="center">Diketahui Pimpinan RSUD dr. Muhammad Zein Painan</td>
   </tr>
   <tr>
      <td colspan="4" class="header"></td>
   </tr>
   <tr>
      <td colspan="4" class="header"></td>
   </tr>
    <tr>
      <td colspan="4" class="header"></td>
   </tr>
   <tr>
      <td colspan="4" class="header"></td>
   </tr>
   <tr>
      <td colspan="4" class="header"></td>
   </tr>
   <tr>
      <td colspan="2"></td>
      <td colspan="2" align="center"><strong>drg. H. BUSRIL, MPH</strong></td>
   </tr>
   <tr>
      <td colspan="2"></td>
      <td colspan="2" align="center"><strong>NIP.19740227 200212 1 004</strong></td>
   </tr>
   <tr>
      <td colspan="4" class="header"></td>
   </tr>
   <tr>
      <td colspan="4" class="header"></td>
   </tr>
    <tr>
      <td colspan="4" class="header"></td>
   </tr>
   <tr>
      <td colspan="4" class="header"></td>
   </tr>
  </table>
</center>
</body>
</html>