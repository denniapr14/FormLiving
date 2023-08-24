<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        <blade import|%20url(%26%2334%3Bhttps%3A%2F%2Ffonts.googleapis.com%2Fcss2%3Ffamily%3DRaleway%3Aital%2Cwght%401%2C200%26display%3Dswap%26%2334%3B)%3B%0D>* {
            margin: 0;
            padding: 0;
            border: 0;
        }

        body {
            font-family: sans-serif;
            background-color: #ffffff;
            font-size: 19px;
            max-width: 800px;
            margin: 0 auto;
            padding: 3%;
        }

        img {
            max-width: 100%;
        }

        footer {
            background-color: #ffffff;
        }

        .header {
            position: relative;
            width: 98%;
            z-index: 2;
            background-image: url("{{ asset('Home') }}/images/waves-background.png");
            background-color: #32CD32;
        }

        #logo {
            max-width: 120px;
            margin: 3% 3% 3% 3%;
            float: right;
        }

        #wrapper {
            background-color: white;
        }

        #social {
            float: right;
            margin: 3% 2% 4% 3%;
            list-style-type: none;
        }

        #social>li {
            display: inline;
        }

        #social>li>a>img {
            max-width: 35px;
        }

        h1,
        p {
            margin: 3%;
        }

        #text-right {
            float: right;
        }

        .centercore {
            text-align: center;
        }

        .btn {

            background-color: #beb20b;
            color: #fdfdfd;
            text-decoration: none;
            font-weight: 800;
            padding: 8px 12px;
            border-radius: 8px;
            letter-spacing: 2px;
        }

        hr {
            height: 1px;
            background-color: #303840;
            clear: both;
            width: 96%;
            margin: auto;
        }

        #contact {
            text-align: center;
            padding-bottom: 3%;
            line-height: 16px;
            font-size: 16px;
            font-weight: bold;
            color: #090a0a;

        }

        #banner {
            min-height: 100%;
            min-width: 100%;
            position: relative;
            padding-bottom: 2%;
            background-color: white;
        }

        .container {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: white;
        }

        .table {

            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            grid-gap: 3px;
            border-collapse: collapse;
            border-radius: 20px;
            margin-top: 20px;
        }

        .table th,
        .table td {

            padding: 10px;
            text-align: left;
        }

        .table tr {
            border: 1px solid #ccc;
        }

        .table th {
            background-color: #f2f2f2;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }

        <blade media|%20all%20and%20(max-width%3A639px)%20%7B%0D>.table {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .wrapper {
            width: 320px !important;
            padding: 0 !important;
        }

        .container {
            width: 300px !important;
            padding: 0 !important;
        }

        .mobile {
            width: 300px !important;
            display: block !important;
            padding: 0 !important;
        }

        img {
            height: auto !important;
            display: block !important;
        }

        *[class="mobileOff"] {
            width: 0px !important;
            display: none !important;
        }

        *[class*="mobileOn"] {
            display: block !important;
            max-height: none !important;
        }

        img {
            max-width: 100%;
        }
        }

    </style>
</head>

<body>
    <div id="wrapper">
        <div id="banner">
            <div>
                <img src="{{ asset('Home') }}/images/mail/Header-Kalm.jpg" alt="">
            </div>
        </div>
        <div class="one-col" style="background-color:white;">
            <h2 style="text-align: center;">Selamat! Pesanan Pre-Order anda telah dibuat</h2>
            <p style="margin-left: 5%">Berikut data pre-order yang telah dipesan pada Formsliving</p>
            <br>
            <div class="container">
                <h4>Nama Perumahan : Kalm Residence</h4>
                <br>
                <div>
                    <table width="100%" style="border: 1px solid #ccc;">
                        <tr>
                            <td>
                                <h2>Invoice</h2>
                            </td>
                            <td style="text-align:right;">
                                <p id="text-right" ">Jatuh Tempo Pembayaran :<br>
                                    <b>ISI TANGGAL</b>
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>
                <div>
                    <table width=" 100%" style="border: 1px solid #ccc;">
                        <tr>
                        <tr>
                            <td>
                                <p>Unit Yang Dipilih </p>
                                <h2 style="padding-left: 4%">ISI BLOK - ISI NOMOR</h2>
                                <br>
                                <p>Tipe Pre-Order </p>
                                <h2 style="padding-left: 4%">REFUND/NON-REFUND</h2>
                                <br>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="one-col" style="padding-bottom: 4%; background-color : white;">
            <h1 style="text-align:center;">Pembayaran via Virtual Account</h1>
            <p>
                Anda Dapat membayar melalu Virtual Account kami yang tertera dibawah ini.
            </p>
            <div class="centercore">
                <img style="max-width:200px" src="{{ asset('Home') }}/images/icons/ocbc-logo.png"
                    alt="">
                <br>
                <h4>ISI NOMOR VA</h4>
            </div>
            <p>setelah membayar, silahkan konfirmasi pada link dibawah ini : <a class="btn"
                    href="{{ route('userConfirmed') }}">Klik Disini</a></p>

        </div>
        <footer>
            <img src="{{ asset('Home') }}/images/mail/Footer-Kalm.jpg" alt="">
        </footer>
    </div>
</body>

</html>
