<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;margin:0px auto; }
.tg td{font-family:Arial, sans-serif;padding:20px 20px;  overflow:hidden;word-break:normal;}

.tg th{font-family:Arial, sans-serif;font-weight:normal; padding:20px 20px;overflow:hidden;word-break:normal;}
.tg .head{font-weight:bold; text-align:center; padding-top:2px; }

.tg .tg-by3v{font-weight:bold;font-size:14px;text-align:center}

.tg .head{font-weight:bold; text-align:center; padding-top:2px; vertical-align: middle;}
.tg .no{width:50px; text-align:center ;}
.tg .kolom{width:30%; }
.tg .rupiah{ text-align:right; font-size:8px; }
.tg .angka{ text-align:center; }
.tg .text{ text-align:left; }

</style>
<table class="tg">
  <tr>
    <th class="tg-by3v" colspan="9">PEMERINTAH KOTA MOJOKERTO</th>
  </tr>
  <tr>
    <td class="tg-by3v" colspan="9">JUMLAH SP2D MENURUT JENISNYA <br></td>
  </tr>
  <tr>
    <td class="tg-by3v" colspan="9">NAMA SKPD : {{ UPPER( $nama_singkat_skpd ) }},TAHUN :{{ $tahun or ' …….'}}<br> <hr></td>
  </tr>
  <tr>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
    <td class="tg-031e"></td>
  </tr>

 </table>

 <table border="1" class="tg"  style=" padding:3px 3px 3px 3px;">
 <tr>
   <th class="angka head" rowspan="2" style="width:7%" >NO</th>
   <th class="angka head" rowspan="2"style="width:6%">Jenis SPPD</th>
   <th class="angka head" colspan="3"style="width:47%" >SPM</th>
   <th class="angka head" colspan="2" style="width:27%" >SP2D</th>
   <th class="angka head" rowspan="2" style="width:15%" >KETERANGAN</th>
 </tr>
 <tr> 
   <td class="angka head" style="width:7%" >JUMLAH</td>
   <td class="angka head" style="width:20%">NILAI (Rp.)<br></td>
   <td class="angka head" style="width:20%">POTONGAN (Rp.)</td>
   <td class="angka head" style="width:7%" >JUMLAH <br></td>
   <td class="angka head" style="width:20%">NILAI (Rp.)</td>
 </tr>
 <tr>
   <td class="angka">1</td>
   <td class="angka">2</td>
   <td class="angka">3</td>
   <td class="angka">4</td>
   <td class="angka">5</td>
   <td class="angka">6</td>
   <td class="angka">7</td>
   <td class="angka">8</td>
 </tr>
 <?php //dd($rows)

 ?>
 @foreach($rows as $key => $row)
    <tr>
       <td class=" angka" style="width:7%" >{{ $key+1 }}</td>
       <td class=" text" style="width:6%" >{{ $row['nama_jenis_sppd'] or '' }}           </td>
       <td class=" angka" style="width:7%">{{ $row['spm_jumlah'] or '' }}            </td>
       <td class=" rupiah" style="width:20%" > {{ format_rupiah( $row['spm_nilai'] ) }},--</td>
       <td class=" rupiah" style="width:20%" > {{ format_rupiah( $row['spm_potongan'] ) }},--</td>
       <td class=" angka" style="width:7%" >{{ $row['sppd_jumlah'] or '' }}           </td>
       <td class=" rupiah" style="width:20%" > {{ format_rupiah( $row['sppd_nilai'] ) }},--</td>
       <td class=" text" style="width:15%" >{{ $row['keterangan'] or '' }} <?php  echo $row['keterangan']>0?' Buah SP2D Telat ':''; ?>          </td>
   </tr>
   <?php 
 
   ?>
 @endForeach

 <tr>
   <td class="tg-031e" colspan="8"></td>
 </tr>
 <tr>
   <td class="tg-e3zv" colspan="2">JUMLAH</td>
   <td class=" angka">{{ $total_spm_jumlah or ''}}</td>
   <td class="rupiah"> {{ format_rupiah( $total_spm_nilai ) }},--</td>
   <td class="rupiah"> {{ format_rupiah( $total_spm_potongan ) }},--</td>
   <td class="angka">{{ $total_sppd_jumlah or ''}}</td>
   <td class="rupiah"> {{ format_rupiah( $total_sppd_nilai ) }},--</td>
   <td class=""></td>
 </tr>

 </table>
 <table class="tg">
  <tr>
    <td class="tg-031e" colspan="9"><br><br><br><br>Keterangan :<br>,*) Diisi,Nama SKPD yang dipilih,<br>**) Diisi,tahun data SP2D yang ditampilkan,<br>1,Diisi nomor urut,<br>2 Diisi,jenis SP2D (hanya ada 4 jenis),<br>3 Diisi,jumlah SPM yang diajukan,<br>4 Diisi,jumlah nilai uang pada,SPM yang,diajukan,<br>5 Diisi,jumlah nilai potongan pada SPM yang diajukan,<br>6 Diisi,jumlah SP2D yang diterbitkan,<br>7 Diisi,jumlah nilai uang pada,SP2D yang,diterbitkan,<br>8 Diisi,jumlah SP2D yang terlambat diterbitkan dengan tulisan (… SP2D Terlambat)</td>
  </tr>
</table>
