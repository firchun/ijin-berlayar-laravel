<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Rekomendasi Logistik</title>
    <meta http-equiv="Content-Type" content="charset=utf-8" />
    <link rel="stylesheet" href="{{ asset('css/') }}/pdf/bootstrap.min.css" media="all" />
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
        }

        hr {
            margin: 1px;
            border: none;
            border-top: 2px solid #000;
        }

        .table-custom {
            border-collapse: collapse;
            width: 100%;
            font-size: 13px;
        }

        .table-custom tr,
        .table-custom th,
        .table-custom td {
            padding: 4px;
            border: 1px solid black;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .fw-bold {
            font-weight: bold;
        }

        .page-break {
            page-break-after: always;
        }

        .no-break {
            page-break-inside: avoid;
        }


        @media print {
            .no-print {
                display: none;
            }

            .page-break {
                page-break-after: always;
            }
        }
    </style>
    <link href="{{ public_path('img/logo.png') }}" rel="icon" type="image/png">
</head>

<body>
    <main>
        <div>
            <!-- Header -->
            <table style="width:100%; border-bottom: 3px solid black; margin-bottom: 10px;">
                <tr>
                    <td style="width: 15%; text-align: center;">
                        <img src="{{ public_path('img') }}/logo.png" alt="Logo KKP" style="width: 100px;">
                    </td>
                    <td style="width: 70%; text-align: center;">
                        <h2 style="margin: 0; font-size: 24px;">KEMENTERIAN KELAUTAN DAN PERIKANAN NUSANTARA</h2>
                        <h3 style="margin: 0; font-size: 18px;">MERAUKE</h3>
                        <p style="margin: 0; font-size: 14px;">
                            Jl. Pelabuhan Perikanan karang indah, Kec. Merauke 99614 <br>
                            Telepon: (021) 3519070 | Email: info@kkp.go.id | Website: www.kkp.go.id
                        </p>
                    </td>
                    <td style="width: 15%; text-align: center;">
                        <img src="{{ public_path('img') }}/garuda.png" alt="Lambang Garuda" style="width: 80px;">
                    </td>
                </tr>
            </table>
            <hr>
            <br>
            @php
                $permohonan = $data->first()->permohonan_berlayar;
            @endphp
            <table class="table-custom">
                <tr>
                    <td style="width: 20%; font-weight:bold;">No. Rekomendasi</td>
                    <td>{{ $permohonan->no_rekomendasi }}</td>
                </tr>
                <tr>
                    <td style="width: 20%; font-weight:bold;">Kapal</td>
                    <td>{{ $permohonan->kapal->nama_kapal }}</td>
                </tr>
                <tr>
                    <td style="width: 20%; font-weight:bold;">Nahkoda Kapal</td>
                    <td>{{ $permohonan->nama_nahkoda }}</td>
                </tr>
                <tr>
                    <td style="width: 20%; font-weight:bold;">Keberangkatan</td>
                    <td>{{ $permohonan->tgl_keberangkatan }}</td>
                </tr>
            </table>
            <br>
            <table class="table-custom ">
                <thead>
                    <tr>
                        <th colspan="4" class="text-center" style="background-color: rgb(0, 115, 255); color:white;">
                            REKOMENDASI
                            LOGISTIK </th>
                    </tr>
                    <tr>
                        <th style="width: 10%;">No.</th>
                        <th style="width: 30%;">Nama Barang</th>
                        <th style="width: 20%;">Jumlah</th>
                        <th style="width: 20%;">Satuan</th>
                    <tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->jumlah }}</td>
                            <td>{{ $item->satuan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    {{-- <script>
        window.onload = function() {
            window.print();
        };
    </script> --}}
</body>

</html>
