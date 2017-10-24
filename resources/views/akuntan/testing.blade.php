<?php
    $no = 0;
    $tpotongan = 0;
    $tsisa = 0;
?>    
    <h1> Laporan potongan perbulan <%% date('d-m-Y', strtotime($date))  %%></h1>
    <table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Potongan</th>
        <th>x Potongan</th>
        <th>Hutang</th>
        <th>Sisa</th>
        <th>Tgl</th>
    </tr>
      @foreach($data as $a)
       <tr>
            <td><%% $no=$no + 1 %%></td>
            <td><%% $a->nama  %%></td>
            <td><%% number_format($a->potongan,0,",",".") %%></td>
            <td><%% $a->jum  %%>x</td>
            <td><%% number_format($a->hutang,0,",",".")  %%></td>
            <td><%% number_format($a->sisa,0,",",".")%%></td>
            <td><%% date('d-m-Y', strtotime($a->tgl))   %%></td>
            <?php
                $tpotongan = $tpotongan + $a->potongan;
                $tsisa = $tsisa + $a->sisa;
            ?>
       </tr>
      @endforeach
      <tr><td colspan="2"></td><td><%% $tpotongan  %%></td><td></td><td colspan="2"><%% $tsisa  %%></td></tr>
    </table>

    <h3>Disainnya belakangan dulu, maklum puasa....</h3><br>
    <h4>Kalau mau print langusng ctrl + p aja</h4><br>
    <a href="<%%url('/ptk_search')%%>">Kembali</a>