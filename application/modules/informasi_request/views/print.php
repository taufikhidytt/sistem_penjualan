<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url()?>assets/logo/logo.png" type="image/x-icon">
    <title><?= $title?></title>
    <style type="text/css">
        #print {
            margin:auto;
            text-align:center;
            font-family:"Calibri", Courier, monospace;
            width:1200px;
            font-size:14px;
        }
        #print .title {
            margin:20px;
            text-align:right;
            font-family:"Calibri", Courier, monospace;
            font-size:12px;
        }
        #print span {
            text-align:center;
            font-family:"Trebuchet MS", Arial, Helvetica, sans-serif;   
            font-size:18px;
        }
        #print table {
            border-collapse:collapse;
            width:100%;
            margin:10px;
        }
        #print .table1 {
            border-collapse:collapse;
            width:90%;
            text-align:center;
            margin:10px;
        }
        #print table hr {
            border:3px double #000;   
        }
        #print .ttd {
            float:right;
            width:250px;
            background-position:center;
            background-size:contain;
        }
        #print table th {
            color:#000;
            font-family:Verdana, Geneva, sans-serif;
            font-size:12px;
        }
        #logo{
            width:111px;
            height:90px;
            padding-top:10px;   
            margin-left:10px;
        }

        h2,h3{
            margin: 0px 0px 0px 0px;
        }
    </style>
</head>
<body>
    <div id="print">
        <table class='table1'>
            <tr>
                <td><img src='<?= base_url()?>assets/logo/logo.png' height="100" width="100"></td>
                <td>
                    <h2>Data Informasi Request Barang Customer </h2>
                    <h2>CV AMALI SHOES</h2>
                    <p style="font-size:14px;"><i> GMC Blok i 1 No. 13 Jl.Teratai II Kecamatan Panongan Kabupaten Tangerang Banten</i></p>
                </td>
            </tr>
        </table>
    
        <table class='table'>   
            <td><hr /></td>
    
        </table>
            <td>
                <h3>Form Request Barang</h3>
            </td>
        <tr>
            <td>
                <table border='1' class='table' width="90%">
                    <tr style="height: 50px;">
                        <th>No Invoice</th>
                        <th>Nama Customer</th>
                        <th>Nama Barang</th>
                        <th>Kategori Barang</th>
                        <th>Qty</th>
                    </tr>
                    <tr style="height: 50px;">
                        <td>
                            <?= $data->no_invoice?>
                        </td>
                        <td>
                            <?= $data->nama?>
                        </td>
                        <td>
                            <?= $data->nama_barang?>
                        </td>
                        <td>
                            <?= $data->nama_kategori?>
                        </td>
                        <td>
                            <?= $data->qty?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    <!-- </table> -->
    </div>
    <div id="print">
        <table width="450" align="right" class="ttd">
            <tr>
                <td width="100px" style="padding:20px 20px 20px 20px;" align="center">
                    <strong>Adminitrasi</strong>
                    <br><br><br><br>
                    <strong><u><?= $this->checkusers->users_login()->nama;?>[<?= $this->checkusers->users_login()->level;?>]</u><br></strong><small></small>
                </td>
            </tr>
        </table>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>
