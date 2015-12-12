<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;margin:0px auto; }
.tg td{font-family:Arial, sans-serif;margin:50px 50px;  overflow:hidden;word-break:normal;}

.tg th{font-family:Arial, sans-serif;font-weight:normal; margin:50px 50px;overflow:hidden;word-break:normal;}

.tg .tg-hgcj{font-weight:bold;text-align:center ; font-size:14px;}

.tg .head{font-weight:bold; text-align:center; padding-top:2px; vertical-align: middle;}
.tg .no{width:50px; text-align:center ;}
.tg .kolom{width:30%; }
.tg .rupiah{ text-align:right; }
.tg .angka{ text-align:center; }
.tg .text{ text-align:left; }
</style>
<table class="tg">
  <tr>
    <th class="tg-hgcj" colspan="4">PEMERINTAH KOTA MOJOKERTO</th>
  </tr>
  <tr>
    <td class="tg-hgcj" colspan="4">JUMLAH SP2D MENURUT JENIS TAHUN {{ $tahun or '…'}}*) <br><hr></td>
  </tr>
  <tr>
    <td class="" colspan="4"></td>
  </tr>

  </table>



  <table class="tg" border="1"  style=" padding:3px 3px 3px 3px;">
  <tr>
    <td class=" head no">NO <br></td>
    <td class=" head kolom">Jenis SP2D<br></td>
    <td class=" head kolom">Jumlah SP2D<br></td>
    <td class=" head kolom">Nilai SP2D (Rp.)<br></td>
  </tr>
  <tr>
    <td class="angka head">1</td>
    <td class="angka head">2</td>
    <td class="angka head">3</td>
    <td class="angka head">4</td>
  </tr>
  <?php $total=0; ?>
  <?php //dd($rows); ?>

@foreach ($rows as $key => $row) 
  <tr>
    <td class=" no"  >{{ $key+1 }}</td>
    <td class="text tg-031e kolom"  >{{ $row['nama_jenis_sppd'] or ''}}</td>
    <td class="angka tg-031e kolom" >{{ $row['sppd_jumlah'] or ''}}</td>
    <td class="rupiah kolom" >{{ format_rupiah($row['sppd_nilai']) }}</td>
  </tr>
  <?php $total +=$row['sppd_nilai']; ?>
@endForeach

    <tr>
      <td class="" colspan="4"></td>
    </tr>
    <tr>
      <td class="tg-031e rupiah" colspan="2">Jumlah </td>
      <td class="tg-031e angka">{{ $total_sppd_jumlah or ''}}</td>
      <td class="tg-031e rupiah">{{ format_rupiah($total_sppd_nilai) }}</td>
    </tr>
</table>
<br>
<br>
<br>
<table>
  <tr>
    <td class="tg-031e" colspan="4">Keterangan:<br>,:,*) Diisi tahun data SP2D yang ditampilkan,<br>1,Diisi nomor urut,<br>2 Diisi jenis SP2D (hanya ada 4 jenis),<br>3 Diisi jumlah SP2D yang diterbitkan,<br>4 Diisi jumlah nilai uang pada,SP2D yang diterbitkan</td>
  </tr>
</table>

