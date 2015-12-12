<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;margin:0px auto; }
.tg td{font-family:Arial, sans-serif;padding:20px 20px;  overflow:hidden;word-break:normal;}

.tg th{font-family:Arial, sans-serif;font-weight:normal; padding:20px 20px;overflow:hidden;word-break:normal;}


.tg .tg-by3v{font-weight:bold;font-size:14px;text-align:center;}


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
    <td class="tg-by3v" colspan="9">JUMLAH SP2D MENURUT SKPD TAHUN : {{ $tahun or '…….'}} <br><hr></td>
  </tr>
  <tr>
  <TD></TD>
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
  <table class="tg" border="1"  style=" padding:3px 3px 3px 3px;" >
  <tr>
    <td class="angka head" style="width:7%" rowspan="2">NO</td>
    <td class="angka head" style="width:15%" rowspan="2">NAMA SKPD</td>
    <td class="angka head" colspan="3" style="width:45%" >SPM</td>
    <td class="angka head" colspan="2" style="width:25%">SP2D</td>
    <td class="angka head" rowspan="2"  style="width:12%" >KETERANGAN</td>
  </tr>
  <tr>
    <td class="angka head" style="width:5%" >JML</td>
    <td class="angka head" style="width:20%" >NILAI (Rp.)<br></td>
    <td class="angka head" style="width:20%" >POTONGAN (Rp.)</td>
    <td class="angka head"  style="width:5%" >JML <br></td>
    <td class="angka head" style="width:20%">NILAI (Rp.)</td>
  </tr>
  <tr>
    <td class="angka head">1</td>
    <td class="angka head">2</td>
    <td class="angka head">3</td>
    <td class="angka head">4</td>
    <td class="angka head">5</td>
    <td class="angka head">6</td>
    <td class="angka head">7</td>
    <td class="angka head">8</td>
  </tr>
<?php //dd($rows)
?>
@foreach($rows as $key => $row)
   <tr>
      <td style="width:7%" class="no">{{ $key+1 }}</td>
      <td style="width:15%" class="text" >{{ $row['nama_singkat_skpd'] or '' }}           </td>
      <td style="width:5%" class="angka">{{ $row['spm_jumlah'] or '' }}            </td>
      <td style="width:20%; font-size:8px;" class="rupiah">{{  format_rupiah( $row['spm_nilai']  ) }}</td>
      <td style="width:20%; font-size:8px;" class="rupiah">{{  format_rupiah( $row['spm_potongan']  ) }}</td>
      <td style="width:5%" class="angka">{{ $row['sppd_jumlah'] or '' }}           </td>
      <td style="width:20%; font-size:8px;" class="rupiah">{{  format_rupiah( $row['sppd_nilai']  ) }}</td>
      <td style="width:12%" class="text">{{ $row['keterangan'] or '' }}<?php  echo $row['keterangan']>0?' Buah SP2D Telat ':''; ?>            </td>
  </tr>
  <?php 
  ?>

@endForeach
  <tr>
    <td class="tg-031e" colspan="8"></td>

  </tr>
  
  <tr>
    <td class="tg-e3zv" colspan="2">JUMLAH</td>
    <td class=" angka">{{$total_spm_jumlah or ''}} </td>
    <td class=" rupiah"> {{  format_rupiah( $total_spm_nilai ) }} </td>
    <td class=" rupiah"> {{  format_rupiah( $total_spm_potongan ) }} </td>
    <td class=" angka">{{$total_sppd_jumlah or ''}} </td>
    <td class=" rupiah"> {{  format_rupiah( $total_sppd_nilai ) }} </td>
    <td class="tg-031e" style="width:12%"  ></td>
  </tr>

  </table>
  <BR>
  <BR>
  <table>
  <tr>
    <td class="tg-031e" colspan="9">Keterangan :<br>,*) Diisi,Nama SKPD yang dipilih,<br>**) Diisi,tahun data SP2D yang ditampilkan,<br>1,Diisi nomor urut,<br>2 Diisi,jenis SP2D (hanya ada 4 jenis),<br>3 Diisi,jumlah SPM yang diajukan,<br>4 Diisi,jumlah nilai uang pada,SPM yang,diajukan,<br>5 Diisi,jumlah nilai potongan pada SPM yang diajukan,<br>6 Diisi,jumlah SP2D yang diterbitkan,<br>7 Diisi,jumlah nilai uang pada,SP2D yang,diterbitkan,<br>8 Diisi,jumlah SP2D yang terlambat diterbitkan dengan tulisan (… SP2D Terlambat)</td>
  </tr>
</table>

