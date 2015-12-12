{{--  with csss  --}}
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;margin:0px auto; }
.tg td{font-family:Arial, sans-serif;padding:20px 20px;  overflow:hidden;word-break:normal;}

.tg th{font-family:Arial, sans-serif;font-weight:normal;padding:20px 20px;overflow:hidden;word-break:normal;}
.tg .tg-hgcj{font-weight:bold;text-align:center; font-size:14px;}
.tg .head{font-weight:bold; text-align:center; padding-top:2px; }
.tg .tg-s6z2, .tg .tg-031e, .tg .tg-e3zv{text-align:center}
.tg .tg-rupiah{text-align:right}
.tg .tg-catatan{text-align:left}
.tg .tg-e3zv{font-weight:bold}
.tg .no{width:40px}
</style>
<table class="tg">
  <tr>
    <th class="tg-hgcj" colspan="4">PEMERINTAH KOTA MOJOKERTO</th>
  </tr>
  <tr>
    <th class="tg-hgcj" colspan="4">JUMLAH SP2D TAHUN {{ $awal_tahun or '…*)'}} S/D {{ $akhir_tahun or ',,,**)' }}<br></th>
  </tr>
  <tr>
    <th class="tg-s6z2" colspan="4"></th>
  </tr>
  
</table >
<table class="tg"  style=" padding:3px 3px 3px 3px;" border="1" >
  
  <tr>
    <td class="tg-e3zv head no" style="width: 10%" >NO <br></td>
    <td class="tg-e3zv head" style="width: 30%">Tahun</td>
    <td class="tg-e3zv head" style="width: 30%">Jumlah SP2D<br></td>
    <td class="tg-e3zv head" style="width: 30%">Nilai SP2D (Rp.)<br></td>
  </tr>
  <tr>
    <td class="tg-s6z2">1</td>
    <td class="tg-s6z2">2</td>
    <td class="tg-s6z2">3</td>
    <td class="tg-s6z2">4</td>
  </tr>
  <?php $total=0; ?>
  <?php //dd($rows); ?>

@foreach ($rows as $key => $row) 
  <tr style=" padding:20px;">
    <td class="tg-e3zv no" style="width: 10%; padding:20px;" >{{ $key+1 }}</td>
    <td class="tg-031e" style="width: 30%; padding:20px;" >{{ $row->tahun or ''}}</td>
    <td class="tg-031e" style="width: 30%; padding:20px;">{{ $row->jumlah or ''}}</td>
    <td class="tg-rupiah " style="width: 30%; padding:20px;"> {{ format_rupiah( $row->spm ) }},-</td>
  </tr>
  <?php $total +=$row->spm; ?>
@endForeach
 <tr>
    <td class="tg-e3zv"  colspan="4" ></td>
  
  </tr>
  <tr>
    
    <td class="tg-031e" colspan="2"style="width: 70%" >Total</td>
    <td class="tg-rupiah" colspan="3" style="width: 30%" >  {{ format_rupiah( $total ) }}</td>
  </tr>
  
</table>


<table class="tg">
   <tr>
    <th class="tg-catatan" colspan="4"><br><br><br><br>Keterangan<br>,:,*) Diisi tahun awal data SP2D yang,dientry,<br>**) Diisi tahun akhir data,SP2D yang dientry,<br>1,Diisi nomor urut,<br>2 Diisi tahun sesuai data SP2D yang,dientry,<br>3 Diisi jumlah SP2D yang diterbitkan,<br>4 Diisi jumlah nilai uang pada,SP2D yang diterbitkan</th>
  </tr>
</table>

{{-- no css =================================================================================== --}}
