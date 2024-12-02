@extends('V_Admin.app')

@extends('flashdata')
@section('title', 'Forms| Komisi')
@section('pageTitle', 'Komisi')
@section('back', route('komisi.admin', [$getProjek->nama_projek]))
@section('breadcrumb', 'Komisi')
{{-- @section('breadcrumb2', 'Tambah Produk') --}}
@section('content')
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .header {
            text-align: center;
            margin: 20px 0;
            font-weight: bold;
        }

        .signatures {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        .signature-block {
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="card-body">
            <div class="header">
                <h2>TERMIN PENCAIRAN FEE SALES</h2>
                <p>Bulan Closing : November 2023</p>
                <p>Sales : Neneng</p>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tgl. Closing</th>
                        <th>Nama User</th>
                        <th>Blok</th>
                        <th>LB/LT</th>
                        <th>Pembayaran</th>
                        <th>Harga Jual</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <h3>Prosentase Fee Sales</h3>
            <table>
                <thead>
                    <tr>
                        <th>Termin</th>
                        <th>Keterangan</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Cek-list</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>100%</td>
                        <td>Fee Closing</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>50%</td>
                        <td>Bonus Penjualan setelah Realisasi (KPR) / Uang Masuk 50% (In-House)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>50%</td>
                        <td>Bonus Penjualan setelah BAST (Berita Acara Serah Terima)</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="2">Total</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <div class="signatures">
                <div class="signature-block">
                    <p>Disetujui Oleh,</p>
                    <br><br>
                    <p>Gilbert Setiawan</p>
                    <p><i>Chief Executive Officer</i></p>
                </div>
                <div class="signature-block">
                    <p>Diketahui Oleh,</p>
                    <br><br>
                    <p>Andreas Wibisono</p>
                    <p><i>Accounting Manager</i></p>
                </div>
                <div class="signature-block">
                    <p>Dibuat Oleh,</p>
                    <br><br>
                    <p>Neneng Agustin</p>
                    <p><i>Sales</i></p>
                </div>
            </div>

            <div style="text-align: right; margin-top: 20px;">
                Malang, ....................................
            </div>

        </div>
    </div>

</body>
@endsection
