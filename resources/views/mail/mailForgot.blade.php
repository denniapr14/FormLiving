<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,200&display=swap");

        * {
            margin: 0;
            padding: 0;
            border: 0;
        }

        body {
            font-family: sans-serif;
            background-color: #d8dada;
            font-size: 19px;
            max-width: 800px;
            margin: 0 auto;
            padding: 3%;
        }

        img {
            max-width: 100%;
        }

        footer {
            background-color: #bef7be;
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
            background-color: #f0f6fb;
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

            background-color: #be950b;
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
            background-image: url("{{ asset('Home') }}/images/waves-background.png");
            min-height: 300px;
            min-width: 100%;
            position: relative;
            z-index: 1;
        }

        .container {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .table {

            width: 100%;
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

        @media screen and (max-width: 600px) {

            table,
            th,
            td {
                text-align: center;
                display: block;
            }
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="banner">
            <div id="logo">
                <img src="{{ asset('Home') }}/images/logo-forms-living1.png" alt="">
            </div>
        </div>
        <div class="one-col" style="padding-top:6%;">
            <h2 style="text-align: center;">Selamat! Pesanan Pre-Order anda telah dibuat</h2>
            <p>Berikut data pre-order yang telah dipesan pada Formsliving</p>
            <br>

            <div class="container">
                <h4>Nama Perumahan : Kalm Residence</h4>
                <br>
                <div>
                    <table>
                        <tr>
                            <td style="min-width: 300px;">
                                <h2>Invoice</h2>
                            </td>
                            <td>
                                <p id="text-right">Jatuh Tempo Pembayaran pada : <br>
                                    10 September 2023 23:00:14
                                </p>
                            </td>
                        </tr>
                    </table>


                </div>

                <table class="table">
                    <tbody>
                        <tr>
                            <td>
                                <p>Unit Yang Dipilih </p>
                                <h2>A - 3</h2>
                                <br>
                                <p>Tipe Pre-Order </p>
                                <h2>Refundable</h2>
                            </td>
                        </tr>
                        <tr>
                            <td>Jane Smith</td>
                            <td>jane@example.com</td>
                            <td>Designer</td>
                        </tr>
                        <tr>
                            <td>Michael Johnson</td>
                            <td>michael@example.com</td>
                            <td>Manager</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <a href="#" class="btn">Learn more</a>

            <hr />
        </div>

        <div class="one-col" style="padding-bottom: 20px;">
            <h1 style="text-align:center;">cool, look at this</h1>
            <p>
                Anda Dapat membayar melalu Virtual Account kami yang tertera dibawah ini.
            </p>
            <div class="centercore">
                <h4>1223 4533 4342 23452</h4>
                <br>
                <a href="#" class="btn">Learn more</a>
            </div>



        </div>
        <footer>
            <hr />
            <p id="contact">
                <img src="{{ asset('Home') }}/images/480px.gif" alt="" style="max-height: 100px;">
            </p>
        </footer>
    </div>
</body>

</html>