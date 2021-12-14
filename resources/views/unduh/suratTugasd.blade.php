<html>
<head>
    <title>Surat Tugas</title>
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
    <br>
    <center>
        <u><b><font size="4" face="Times New Roman">SURAT TUGAS</font></b></u><br>
        Nomor: {{ $unduh->no_surat }}
    </center>
    <br>
    <br>
    <font size="3" face="Times New Roman" class="element">
        <p style="text-align: justify;">
            Dengan ini Dekan Fakultas Teknologi Informasi Universitas Kristen Duta Wacana Yogyakarta memberikan tugas kepada {{ Auth::user()->role }} tersebut di bawah ini:
        </p>
        @php
            $no = 1;
            $name = array();
            $name = explode(',', $unduh->suratkeluar->nama);
            $code = array();
            $code = explode(',', $unduh->suratkeluar->userid);
        @endphp
        <table align="center" border="1">
            <thead>
                <tr style="text-align: center;">
                    <td >No.</td>
                    <td >Nama</td>
                    @if(Auth::user()->role=="mahasiswa")
                    <td >NIM</td>
                    @else
                    <td >NIK</td>
                    @endif
                </tr>
            </thead>
            <tbody>
            @foreach($code as $key => $value)
                <tr>
                    <td style="text-align: center;" width="50px">{{ $no++ }}.</td>
                    <td width="350px"><?php echo $name[$key]; ?></td>
                    <td style="text-align: center;" width="200px"><?php echo $code[$key]; ?></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
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
        <p style="text-align: justify;">
            Untuk mengikuti {{ $unduh->suratkeluar->perihal }} yang dilaksanakan oleh {{ $unduh->suratkeluar->penyelenggara }} ke {{$unduh->suratkeluar->tempat}}. Kunjungan akan dilaksanakan pada hari <?php echo tanggal_indo(date('Y-m-d', strtotime($unduh->suratkeluar->tanggal)), true); ?>.
        </p>
        <p style="text-align: justify;">
            Demikian surat tugas ini dibuat untuk dapat dipergunakan sebagaimana perlunya. Kepada penerima tugas setelah menyelesaikan tugas dimohon menyampaikan laporan kepada pemberi tugas.
        </p>
        <br>
        <table style="text-align: left;">
            <tr><td>{{ $unduh->dosen->jabatan }}</td></tr>
            <tr><td><br><br><br><br></td></tr>
            <tr><td><u>{{ $unduh->dosen->name }}</u></td></tr>
            <tr><td>{{ $unduh->dosen->user_id }}</td></tr>
        </table>
    </font>
</body>

</html>
