<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>E-RAPOR Penilain Pegawai</title>

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
        <br>
        <table width="100%">
            <thead style="background-color: #f2c195;">
                <tr>
                    <th style="font-size:20px">RAPOR PENILAIAN KINERJA PEGAWAI</th>
                </tr>
            </thead>          
        </table>
        <br>
        <table width="100%" border="2">
            <tbody>
                <tr>
                    <th scope="row" align="left">Periode Penilaian</th>
                    <th scope="row" align="left" width="10">:</th>
                    <td align="left"><?php echo ($questionnaire[0]->tgl_mulai . " sampai " . $questionnaire[0]->tgl_berakhir); ?></td>
                    <th scope="row" align="left">Tipe Penilaian</th>
                    <th scope="row" align="left" width="10">:</th>
                    <td align="left">
                        <?php
                        if ($questionnaire[0]->tipe_penilaian == 1) {
                            echo 'Formatif';
                        } else if ($questionnaire[0]->tipe_penilaian == 2) {
                            echo 'Sumatif';
                        } else if ($questionnaire[0]->tipe_penilaian == 3) {
                            echo 'Kemajuan';
                        }
                        ?>   
                    </td>
                </tr>
                <tr>
                    <th scope="row" align="left">Tanggal</th>
                    <th scope="row" align="left" width="10">:</th>
                    <td align="left"><?php echo strtoupper($questionnaire[0]->tgl_buat); ?></td>
                    <th scope="row" align="left">Tahun Ajaran</th>
                    <th scope="row" align="left" width="10">:</th>
                    <td align="left"><?php echo strtoupper($questionnaire[0]->tahun_awal . "/" . $questionnaire[0]->tahun_akhir . "/" . $questionnaire[0]->semester); ?></td>
                </tr>    

            </tbody>
        </table>
        <br>
        <table width="100%">
            <tbody>
                <tr>
                    <th scope="row" align="left">Nama</th>
                    <th scope="row" align="left" width="10">:</th>
                    <td align="left"><?php echo ($pegawai[0]->nama_lengkap); ?></td>
                    <th scope="row" align="left">NIP</th>
                    <th scope="row" align="left" width="10">:</th>
                    <td align="left"><?php echo strtoupper($pegawai[0]->nip); ?></td>
                </tr>
                <tr>
                    <th scope="row" align="left">Tempat/Tanggal Lahir</th>
                    <th scope="row" align="left" width="10">:</th>
                    <td align="left"><?php echo strtoupper($pegawai[0]->tempat_lahir); ?>/<?php echo strtoupper($pegawai[0]->tanggal_lahir); ?></td>
                    <th scope="row" align="left">Pangkat/Jabatan/Golongan</th>
                    <th scope="row" align="left" width="10">:</th>
                    <td align="left"><?php echo strtoupper($pegawai[0]->id_jabatan); ?></td>
                </tr>    
                <tr>
                    <th scope="row" align="left">TMT sebagai guru</th>
                    <th scope="row" align="left" width="10">:</th>
                    <td align="left">-</td>
                    <th scope="row" align="left">Masa Kerja</th>
                    <th scope="row" align="left" width="10">:</th>
                    <td align="left"><?php echo ($pegawai[0]->tanggal_masuk); ?></td>
                </tr>
                <tr>
                    <th scope="row" align="left">Jenis Kelamin</th>
                    <th scope="row" align="left" width="10">:</th>
                    <td align="left">
                        <?php
                        if ($pegawai[0]->jenis_kelamin == 1) {
                            echo 'Laki-Laki';
                        } else if ($pegawai[0]->jenis_kelamin == 2) {
                            echo 'Perempuan';
                        }
                        ?>   
                    </td>
                    <th scope="row" align="left">Pendidikan Terakhir/Spesialisasi</th>
                    <th scope="row" align="left" width="10">:</th>
                    <td align="left">
                        <?php
                        if ($pegawai[0]->pendidikan == 1) {
                            echo 'Tidak Sekolah';
                        } else if ($pegawai[0]->pendidikan == 2) {
                            echo 'SD';
                        } else if ($pegawai[0]->pendidikan == 3) {
                            echo 'SMP';
                        } else if ($pegawai[0]->pendidikan == 4) {
                            echo 'SMA';
                        } else if ($pegawai[0]->pendidikan == 5) {
                            echo 'D-I/D-II';
                        } else if ($pegawai[0]->pendidikan == 6) {
                            echo 'D-III';
                        } else if ($pegawai[0]->pendidikan == 7) {
                            echo 'D-IV/S1';
                        } else if ($pegawai[0]->pendidikan == 8) {
                            echo 'S2/S3';
                        }
                        ?>
                        /<?php echo ($pegawai[0]->spesialisasi); ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row" align="left">Program Keahlian</th>
                    <th scope="row" align="left" width="10">:</th>
                    <td align="left"><?php echo ($pegawai[0]->program_keahlian); ?></td>
                    <th scope="row" align="left">Nama Instansi/Sekolah </th>
                    <th scope="row" align="left" width="10">:</th>
                    <td align="left">
                        <?php echo ($page[0]->nama_website); ?>
                    </td>
                </tr>                
            </tbody>
        </table>
        <br/>
        <table width="100%">
            <thead style="background-color: #f2c195;">
                <tr>
                    <th style="font-size:20px">HASIL PENILAIAN KINERJA PEGAWAI</th>
                </tr>
            </thead> 

        </table>  
        <br>
        <table width="100%" border="1" id="table-eval">
            <thead>
                <tr class="title_row">
                    <th rowspan="2" colspan="1" class="text-dark">
                        No
                    </th>                                            
                    <th rowspan="1" colspan="1" class="text-dark">
                        KOMPETENSI
                    </th>
                    <th rowspan="1" colspan="3" class="text-dark">
                        NILAI
                    </th>
                    <th rowspan="1" colspan="3" class="text-dark">
                        REKAP
                    </th>
                    <th rowspan="1" colspan="1" class="text-dark">
                        NILAI
                    </th>
                </tr>
                <tr class="title_row">
                    <th>PERTANYAAN</th>
                    <th>DIRI</th>
                    <th>SEJAWAT</th>
                    <th>ATASAN</th>
                    <th><?php echo $questionnaire[0]->persentase_personal; ?>%</th>
                    <th><?php echo $questionnaire[0]->persentase_sejawat; ?>%</th>
                    <th><?php echo $questionnaire[0]->persentase_atasan; ?>%</th>
                    <th>REKAP</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                $num_1 = 0;
                $num_2 = 0;
                $num_3 = 0;
                $num_4 = 0;
                $num_5 = 0;
                $total_diri = 0;
                $total_sejawat = 0;
                $total_atasan = 0;
                $total_persen_jp = 0;
                $total_persen_js = 0;
                $total_persen_ja = 0;
                $rekap = 0;
                if (!empty($question)) {
                    foreach ($question as $key => $value) {
                        $no++;
                        if ($value->tipe_pertanyaan == 1) {
                            $num_1++;
                        } else if ($value->tipe_pertanyaan == 2) {
                            $num_2++;
                        } else if ($value->tipe_pertanyaan == 3) {
                            $num_3++;
                        } else if ($value->tipe_pertanyaan == 4) {
                            $num_4++;
                        } else if ($value->tipe_pertanyaan == 5) {
                            $num_5++;
                        }
                        ?> 
                        <tr>
                            <td class="font-weight-boldest table-center font-size-sm">
                                <?php echo $no; ?>
                            </td>
                            <td class="table-center font-size-sm text-left">
                                <?php echo ucfirst(strtolower($value->isi_pertanyaan)); ?>
                            </td>
                            <td class="table-center font-size-sm font-weight-bold col_1">
                                <?php echo (($value->jawaban_personal)); ?>
                                <?php
                                $total_diri += $value->jawaban_personal;
                                ?>
                            </td>
                            <td class="table-center font-size-sm font-weight-bold col_2">
                                <?php echo (($value->jawaban_sejawat)); ?>
                                <?php
                                $total_sejawat += $value->jawaban_sejawat;
                                ?>
                            </td>
                            <td class="table-center font-size-sm font-weight-bold col_3">
                                <?php echo (($value->jawaban_atasan)); ?>
                                <?php
                                $total_atasan += $value->jawaban_atasan;
                                ?>
                            </td>
                            <td class="table-center font-size-sm font-weight-boldest col_4">
                                <?php
                                $persen_jp = intval($value->jawaban_personal) * intval($questionnaire[0]->persentase_personal) / 100;
                                echo $persen_jp;
                                ?>
                                <?php
                                $total_persen_jp += $persen_jp;
                                ?>
                            </td>
                            <td class="table-center font-size-sm font-weight-boldest col_5">
                                <?php
                                $persen_js = intval($value->jawaban_sejawat) * intval($questionnaire[0]->persentase_sejawat) / 100;
                                echo $persen_js;
                                ?>
                                <?php
                                $total_persen_js += $persen_js;
                                ?>
                            </td>
                            <td class="table-center font-size-sm font-weight-boldest col_6">
                                <?php
                                $persen_ja = intval($value->jawaban_atasan) * intval($questionnaire[0]->persentase_atasan) / 100;
                                echo $persen_ja;
                                ?>
                                <?php
                                $total_persen_ja += $persen_ja;
                                ?>
                            </td>
                            <td class="table-center font-size-sm font-weight-boldest col_7">
                                <?php
                                $total_all = $persen_jp + $persen_js + $persen_ja;
                                echo $total_all;
                                ?>
                                <?php
                                $rekap += $total_all;
                                ?>
                            </td>
                        </tr>  
                        <?php
                    }  //ngatur nomor urut
                }
                ?>         
            </tbody>   
            <tfoot>
                <tr class="title_row">
                    <?php $jumlah_skor = intval($questionnaire[0]->nilai_penilaian_max) * $no; ?>
                    <th colspan="2">
                        Jumlah (Hasil penilaian kinerja guru)
                    </th>
                    <th id="hasil_1"><?php echo ($total_diri / $jumlah_skor * 100); ?></th>
                    <th id="hasil_2"><?php echo ($total_sejawat / $jumlah_skor * 100); ?></th>
                    <th id="hasil_3"><?php echo ($total_atasan / $jumlah_skor * 100); ?></th>
                    <th id="hasil_4"><?php echo ($total_persen_jp / $jumlah_skor * 100); ?></th>
                    <th id="hasil_5"><?php echo ($total_persen_js / $jumlah_skor * 100); ?></th>
                    <th id="hasil_6"><?php echo ($total_persen_ja / $jumlah_skor * 100); ?></th>
                    <th id="hasil_7"><?php echo ($rekap / $jumlah_skor * 100); ?></th>
                </tr>       
            </tfoot>  
        </table>
        <br>
        <table width="100%" border="1">
            <thead>
                <tr class="title_row_pkp">
                    <th rowspan="2" colspan="1" class="text-dark">
                        No
                    </th>   
                    <th rowspan="1" colspan="4" class="text-dark">
                        PKP
                    </th>   
                    <th rowspan="1" colspan="3" class="text-dark">
                        RERATA
                    </th> 
                    <th rowspan="2" colspan="1" class="text-dark">
                        NILAI
                    </th>
                </tr>
                <tr class="title_row_pkp">
                    <th>ASPEK</th>
                    <th>DIRI</th>
                    <th>SEJAWAT</th>
                    <th>ATASAN</th>
                    <th>DIRI</th>
                    <th>SEJAWAT</th>
                    <th>ATASAN</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $num = 0;
                if (!empty($question_sum)) {
                    foreach ($question_sum as $key => $value) {
                        $num++;
                        ?> 
                        <tr>
                            <td class="font-weight-boldest table-center font-size-sm">
                                <?php echo $num; ?>
                            </td>
                            <td class="table-center font-size-sm text-left font-weight-boldest">
                                <?php
                                $count_soal = 0;
                                if ($value->tipe_pertanyaan == 1) {
                                    $count_soal = $num_1;
                                    echo 'Pendagogik';
                                } else if ($value->tipe_pertanyaan == 2) {
                                    $count_soal = $num_2;
                                    echo 'Kepribadian';
                                } else if ($value->tipe_pertanyaan == 3) {
                                    $count_soal = $num_3;
                                    echo 'Sosial';
                                } else if ($value->tipe_pertanyaan == 4) {
                                    $count_soal = $num_4;
                                    echo 'Profesional';
                                } else if ($value->tipe_pertanyaan == 5) {
                                    $count_soal = $num_5;
                                    echo 'Spiritual & Karakter';
                                }
                                ?>                                                       
                            </td>
                            <td class="table-center font-size-sm font-weight-bold col_1_">
                                <?php echo (($value->jawaban_personal)); ?>
                            </td>
                            <td class="table-center font-size-sm font-weight-bold col_2">
                                <?php echo (($value->jawaban_sejawat)); ?>
                            </td>
                            <td class="table-center font-size-sm font-weight-bold col_3">
                                <?php echo (($value->jawaban_atasan)); ?>
                            </td>
                            <td class="table-center font-size-sm font-weight-boldest col_4">
                                <?php
                                $sum_jp = intval($value->jawaban_personal) / $count_soal;
                                echo round($sum_jp, 2);
                                ?>
                            </td>
                            <td class="table-center font-size-sm font-weight-boldest col_5">
                                <?php
                                $sum_js = intval($value->jawaban_sejawat) / $count_soal;
                                echo round($sum_js, 2);
                                ?>
                            </td>
                            <td class="table-center font-size-sm font-weight-boldest col_6">
                                <?php
                                $sum_ja = intval($value->jawaban_atasan) / $count_soal;
                                echo round($sum_ja, 2);
                                ?>
                            </td>
                            <td class="table-center font-size-sm font-weight-boldest col_7">
                                <?php echo round(($sum_jp + $sum_js + $sum_ja) / 3, 2); ?>
                            </td>
                        </tr>  
                        <?php
                    }  //ngatur nomor urut
                }
                ?>  
                <tr class="title_row_pkp">
                    <td colspan="10" align="center" style="background-color: #f2c195;">                       
                        <b><h3>KATEGORIKAL PKP</h3></b>                        
                    </td>
                </tr>
                <?php
                $number = 0;
                if (!empty($question_sum)) {
                    foreach ($question_sum as $key => $value) {
                        $number++;
                        ?> 
                        <tr>
                            <td class="font-weight-boldest table-center font-size-sm">
                                <?php echo $number; ?>
                            </td>
                            <td colspan="4" class="table-center font-size-sm text-left font-weight-boldest">
                                <?php
                                $count_soal = 0;
                                if ($value->tipe_pertanyaan == 1) {
                                    $count_soal = $num_1;
                                    echo 'Pendagogik';
                                } else if ($value->tipe_pertanyaan == 2) {
                                    $count_soal = $num_2;
                                    echo 'Kepribadian';
                                } else if ($value->tipe_pertanyaan == 3) {
                                    $count_soal = $num_3;
                                    echo 'Sosial';
                                } else if ($value->tipe_pertanyaan == 4) {
                                    $count_soal = $num_4;
                                    echo 'Profesional';
                                } else if ($value->tipe_pertanyaan == 5) {
                                    $count_soal = $num_5;
                                    echo 'Spiritual & Karakter';
                                }
                                ?>                                                       
                            </td>

                            <td class="table-center font-size-sm font-weight-boldest col_4">
                                <?php
                                $sum_jp = round(intval($value->jawaban_personal) / $count_soal);
                                if ($sum_jp <= 15) {
                                    echo "KURANG";
                                } else if ($sum_jp > 15 && $sum_jp <= 25) {
                                    echo "CUKUP";
                                } else if ($sum_jp > 26 && $sum_jp <= 35) {
                                    echo "BAIK";
                                } else if ($sum_jp > 35) {
                                    echo "SANGAT BAIK";
                                }
                                ?>
                            </td>
                            <td class="table-center font-size-sm font-weight-boldest col_5">
                                <?php
                                $sum_js = round(intval($value->jawaban_sejawat) / $count_soal, 2);
                                if ($sum_js <= 15) {
                                    echo "KURANG";
                                } else if ($sum_js > 15 && $sum_js <= 25) {
                                    echo "CUKUP";
                                } else if ($sum_js > 26 && $sum_js <= 35) {
                                    echo "BAIK";
                                } else if ($sum_js > 35) {
                                    echo "SANGAT BAIK";
                                }
                                ?>
                            </td>
                            <td class="table-center font-size-sm font-weight-boldest col_6">
                                <?php
                                $sum_ja = round(intval($value->jawaban_atasan) / $count_soal, 2);
                                if ($sum_ja <= 15) {
                                    echo "KURANG";
                                } else if ($sum_ja > 15 && $sum_ja <= 25) {
                                    echo "CUKUP";
                                } else if ($sum_ja > 26 && $sum_ja <= 35) {
                                    echo "BAIK";
                                } else if ($sum_ja > 35) {
                                    echo "SANGAT BAIK";
                                }
                                ?>
                            </td>
                            <td class="table-center font-size-sm font-weight-boldest col_7">
                                <?php
                                $sum_all = round(($sum_jp + $sum_js + $sum_ja) / 3, 2);
                                if ($sum_all <= 15) {
                                    echo "KURANG";
                                } else if ($sum_all > 15 && $sum_all <= 25) {
                                    echo "CUKUP";
                                } else if ($sum_all > 26 && $sum_all <= 35) {
                                    echo "BAIK";
                                } else if ($sum_all > 35) {
                                    echo "SANGAT BAIK";
                                }
                                ?>
                            </td>
                        </tr>  
                        <?php
                    }  //ngatur nomor urut
                }
                ?>  
            </tbody>      
        </table>
        <br>
        <br>
        <table width="100%">
            <tbody>
                <tr>
                    <td align="right" ><b>KEPALA SEKOLAH</b></td>
                    <br>         
                </tr> 
                <tr>
                    <br>
                </tr>
                 <tr>
                    <br>
                </tr>
                <tr>
                    <br>
                </tr>
                 <tr>
                    <br>
                </tr>
                <tr>
                    <td align="right"><b><?php echo strtoupper($kepsek[0]->nama_lengkap); ?></b></td>
                </tr>    
                <tr>
                    <td align="right"><b><?php echo $kepsek[0]->nip; ?></b></td>
                </tr>    
            </tbody>
        </table>
    </body>

</html>