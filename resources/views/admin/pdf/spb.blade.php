<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Persetujuan Berlayar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            font-weight: bold;
        }

        .title {
            text-align: center;
            text-transform: uppercase;
            margin-top: 10px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .info-table td {
            padding: 5px;
            vertical-align: top;
        }

        .info-table .label {
            font-weight: bold;
            width: 35%;
        }

        .underline {
            text-decoration: underline;
        }

        .signature {
            text-align: right;
            margin-top: 50px;
        }

        .footer {
            margin-top: 20px;
            font-size: 11px;
        }

        .stamp {
            text-align: center;
            margin-top: 30px;
        }

        .stamp img {
            width: 120px;
        }

        .section-title {
            font-weight: bold;
            text-align: center;
            margin-top: 20px;
            text-transform: uppercase;
        }

        .legal-text {
            font-size: 11px;
            text-align: justify;
            margin-top: 10px;
        }

        .paragraf {
            margin-bottom: 10px;
        }

        .title h2,
        .title h4,
        .title p {
            margin-bottom: 0;
            padding-bottom: 0;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <img src="{{ public_path('img') }}/garuda.png" alt="Lambang Garuda" style="width: 80px;">
            <p><span style="font-size: 20px;">REPUBLIK INDONESIA</span><br><i>THE REPUBLIC OF INDONESIA</i></p>
        </div>

        <div class="title">
            <h2 class="underline">SURAT PERSETUJUAN BERLAYAR</h2>
            <h4><i>PORT CLEARANCE</i></h4>
            <p>No: {{ $surat->nomor_surat }}</p>
        </div>
        <center>
            <p>Berdasarkan UU No. 31 Tahun 2004 jo UU No. 45 Tahun 2009 Pasal 42 ayat 3<br>
                <i><b>Under Fisheries Act No. 31, 2004 jo Under Fisheries Act No. 45, 2009 Article 42(3)</b></i>
            </p>
        </center>
        <table class="info-table">
            <tr>
                <td><span>Nama Kapal Perikanan</span><br><i>Fishing Vessel Name</i></td>
                <td>: {{ $surat->nama_kapal }}</td>
                <td><span>Tonnage Kolor</span><br><i>Gross Tonnage</i></td>
                <td>: {{ $surat->tonase }}</td>
            </tr>
            <tr>
                <td><span>Bendera Kebangsaan</span><br><i>Nationality Flag</i></td>
                <td>: {{ $surat->bendera }}</td>
                <td><span>Nakhoda</span><br><i>Master</i></td>
                <td>: {{ $surat->nakhoda }}</td>
            </tr>
        </table>

        <p class="paragraf" style="font-size: 10.5px;">Sesuai dengan Surat Pernyataan Keberangkatan Kapal Perikanan yang
            dibuat oleh Nakhoda
            Kapal
            Perikanan tertanggal {{ $surat->tanggal_terbit }}.<br><i>In accordance with Sailing Declaration issued
                by
                Master
                on dated
                {{ $surat->tanggal_terbit }}</i></p>

        <center style="font-size: 10.5px;">
            <p class="paragraf">Bahwa kapal perikanan telah memenuhi ketentuan dalam UU No. 31 Tahun 2004 jo UU No. 45
                Tahun
                2009 Pasal 42 ayat 3.<br><i>That fishing vessel has fully comply with the provision Fisheries Act No.
                    31, 2004 jo
                    Under Fisheries Act No. 45, 2009 Article 42 (3)</i></p>
            <p class="paragraf">Dengan ini kapal perikanan tersebut di atas disetujui untuk<br><i>The above mentioned
                    fishing vessel is hereby granted for</i></p>
        </center>


        <table class="info-table">
            <tr>
                <td class="label">Bertolak dari</td>
                <td>: {{ $surat->pelabuhan_keberangkatan }}</td>
                <td class="label">Pada tanggal/jam</td>
                <td>: {{ $surat->tanggal_berangkat }}</td>
            </tr>
            <tr>
                <td class="label">Jumlah Awak Kapal</td>
                <td>: {{ $surat->jumlah_awak }}</td>
                <td class="label">Alat Penangkap Ikan/Muatan</td>
                <td>: {{ $surat->alat_penangkap }}</td>
            </tr>
            <tr>
                <td class="label">Tempat Diterbitkan</td>
                <td>: {{ $surat->tempat_terbit }}</td>
                <td class="label">Pada tanggal</td>
                <td>: {{ $surat->tanggal_terbit }}</td>
            </tr>
            <tr>
                <td class="label">Jam</td>
                <td>: 10:57 WIB</td>
            </tr>
        </table>


        <div class="footer">
            <p><u><b>Perhatian:</b></u><br><i>Attention</i></p>
            <ol>
                <li>Surat Persetujuan Berlayar ini berlaku paling lama 24 jam sejak diterbitkan dan kapal perikanan
                    wajib meninggalkan pelabuhan perikanan.<br>
                    <i>This port clearance expired 24 hours due to date of issued and fishing vessel should leave of
                        fishing port.</i>
                </li>
                <li>Apabla dalam 24 jam pemilik atau nakhoda kapal perikanan tidak melayarkan kapainya sejak Surat
                    Parsetujuai Berlayar diterbitkan agar disampaikan ke Syahbandar di Pelabuhan Perikanan kembali
                    apablla periu mengajuka permohonan Surat Persetujuan Berlayar yang baru.<br><i>
                        Within 24 hours after issued the port clearance, the owner, agent or master of any fishing
                        vessels
                        which fails to sail po clearance shall be returned to the fishing port master for the reissued
                        an if
                        so required obtain a new port clearance.</i></li>
                <li>Surat Persetujuan Berlayar ini tidak berlaku apabila terdapat coretan-coretan atau
                    perubahan-perubahan.<br><i>
                        This port clearance expired if any correction or deletions</i></li>
            </ol>
        </div>
    </div>

</body>

</html>
