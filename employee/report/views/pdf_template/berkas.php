<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>E-Berkas Sekolah Utsman</title>

        <style type="text/css">
            * {
                font-family: Verdana, Arial, sans-serif;
            }
            table{
                font-size: x-small;
            }
            tfoot tr td{
                font-weight: bold;
                font-size: x-small;
            }
            .gray {
                background-color: #f2c195
            }

        </style>

    </head>
    <body style="background-image: url('<?php echo base_url() . $page[0]->logo_website ?>'); opacity: 0.2; background-repeat: no-repeat;background-attachment: fixed;background-position: center;">
        <table width="100%">
            <tr>
                <td valign="top" width="90"><img src="<?php echo base_url() . $page[0]->logo_website ?>" alt="" width="100"/></td>
                <td align="left" >
                    <h2 style="color:#f77d0e; margin-top:-7px"><?php echo $page[0]->nama_website; ?></h2>
                    <?php echo $contact[0]->alamat; ?><br>
                    <?php echo $contact[0]->nomor_telephone; ?> / <?php echo $contact[0]->no_handphone; ?><br>
                    <?php echo $contact[0]->email; ?><br>
                    <?php echo $contact[0]->url_website; ?><br>               

                </td>
            </tr>
        </table>

        <table width="100%" border="1">

        </table>
        <br/>
        <table width="100%">
            <thead style="background-color: #f2c195;">
                <tr>
                    <th style="font-size:20px">BERKAS UPLOAD SISWA</th>
                </tr>
            </thead>
        </table>
        <br/>

        <table width="100%">
            <thead style="background-color: #f2c195;">
                <tr>
                    <th style="font-size:18px">DATA SISWA</th>
                </tr>
                <tr>
                    <th scope="row" style="background-color: #cccccc;">#Data Personal Siswa</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row" align="left">NISN</th>
                    <th scope="row" align="left" width="10">:</th>
                    <td align="left"><?php echo ($formulir[0]->nisn); ?></td>
                    <th scope="row" align="left">Nama Lengkap Siswa</th>
                    <th scope="row" align="left" width="10">:</th>
                    <td align="left"><?php echo strtoupper($formulir[0]->nama_lengkap); ?></td>
                </tr>
                <tr>
                    <th scope="row" align="left">NIK</th>
                    <th scope="row" align="left" width="10">:</th>
                    <td align="left"><?php echo ($formulir[0]->nik); ?></td>
                    <th scope="row" align="left">No. Akta Kelahiran</th>
                    <th scope="row" align="left" width="10">:</th>
                    <td align="left"><?php echo ($formulir[0]->no_akta_kelahiran); ?></td>
                </tr>
            </tbody>
        </table>
        <br/>
        <table width="100%">
            <tbody>
                <tr>
                    <th scope="row" align="left">
                        <img src="<?php echo (base_url() . $formulir[0]->foto_siswa); ?>" alt="" width="150"/>
                    </th>            
                </tr>
                <tr>
                    <th scope="row" align="left">
                        <img src="<?php echo (base_url() . $formulir[0]->kartu_keluarga); ?>" alt="" style="width: auto; height: 100%;"/>
                    </th>
                </tr>    
                <tr>
                    <th scope="row" align="left">
                        <img src="<?php echo (base_url() . $formulir[0]->akta_kelahiran); ?>" alt="" style="transform: rotate(270deg) translateX(25%); width: auto !important; height: 150% !important; margin-left:120px;"/>
                    </th>
                </tr>     
            </tbody>
        </table>
       
    </body>
</html>