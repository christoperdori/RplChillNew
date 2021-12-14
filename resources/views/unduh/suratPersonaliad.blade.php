<html>
<head>
    <title>Surat Personalia</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body onload="window.print()">
    <style type="text/css">
        .letter5 { 
            letter-spacing: 1px; 
        }
    </style>
    <table>
        <tr>
            <td width="60px">
                <img src="https://www.ukdw.ac.id/wp-content/uploads/2017/10/logo-ukdw.png" width="60" height="80"/>
            </td>
            <td>&nbsp;&nbsp;</td>
            <td>
                <font size="2" class="letter5">
                    UNIVERSITAS KRISTEN DUTA WACANA
                </font>
                <br>
                <font size="3">
                    <b>FAKULTAS TEKNOLOGI INFORMASI</b>
                </font>
                <br>
                <font size="1">
                    <li type="square" style="margin-left: 10px;"> PROGRAM STUDI INFORMATIKA
                    <li type="square" style="margin-left: 10px;"> PROGRAM STUDI SISTEM INFORMASI </li>
                </font>
            </td>
        </tr>
    </table>
    @php
        function tanggal_indo($tanggal, $cetak_hari = false){
            $hari = array ( 1 =>    'Senin',
                        'Selasa',
                        'Rabu',
                        'Kamis',
                        'Jumat',
                        'Sabtu',
                        'Minggu'
                    );
                    
            $bulan = array (1 =>   'Januari',
                        'Februari',
                        'Maret',
                        'April',
                        'Mei',
                        'Juni',
                        'Juli',
                        'Agustus',
                        'September',
                        'Oktober',
                        'November',
                        'Desember'
                    );
            $split 	  = explode('-', $tanggal);
            $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
                
            if ($cetak_hari) {
                $num = date('N', strtotime($tanggal));
                return $hari[$num] . ', ' . $tgl_indo;
            }
            return $tgl_indo;
        }
    @endphp
    <table>
        <tr>
            <td><font size="3" face="Times New Roman">Nomor</font></td>
            <td><font size="3" face="Times New Roman"> : </font></td>
            <td width="400px"><font size="3" face="Times New Roman">{{ $unduh->no_surat }}</font></td>
            <td style="text-align: right;" width="250px"><font size="3" face="Times New Roman"><?php echo tanggal_indo(date('Y-m-d', strtotime($unduh->tanggal)), false); ?></font></td>
        </tr>
        <tr>
            <td><font size="3" face="Times New Roman">Hal</font></td>
            <td><font size="3" face="Times New Roman"> : </font></td>
            <td><font size="3" face="Times New Roman">{{ $unduh->suratkeluar->perihal }}</font></td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td><font size="3" face="Times New Roman">Lamp.</font></td>
            <td><font size="3" face="Times New Roman"> : </font></td>
            <td><font size="3" face="Times New Roman">1 Lembar</font></td>
            <td>&nbsp;</td>
        </tr>
    </table>
    <br>
    <br>
    <table>
        <tr><td><b><font size="3" face="Times New Roman">Kepada Yth.:</font></b></td></tr>
        <tr><td><b><font size="3" face="Times New Roman">{{ $unduh->suratkeluar->kepada }}</font></b></td></tr>
        <tr><td><b><font size="3" face="Times New Roman">Universitas Kristen Duta Wacana</font></b></td></tr>
        <tr><td><b><font size="3" face="Times New Roman">Yogyakarta</font></b></td></tr>
    </table>
    <br>
    <table>
        <tr><td><font size="3" face="Times New Roman">Salam sejahtera,</font></td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td style="text-align: justify;"><font size="3" face="Times New Roman"><?php echo $unduh->suratkeluar->keterangan; ?></font></td></tr>
        <tr><td>&nbsp;</td></tr>
        <tr><td style="text-align: justify;"><font size="3" face="Times New Roman">Demikian surat ini kami sampaikan. Atas perhatian dan kerjasama yang diberikan kami mengucapkan terima kasih.</font></td></tr>
    </table>
    <br>
    <table style="text-align: left;">
        <tr><td>{{ $unduh->dosen->jabatan }}</td></tr>
        <tr><td><br><br><br><br></td></tr>
        <tr><td><u>{{ $unduh->dosen->name }}</u></td></tr>
        <tr><td>{{ $unduh->dosen->user_id }}</td></tr>
    </table>
</body>

</html>
