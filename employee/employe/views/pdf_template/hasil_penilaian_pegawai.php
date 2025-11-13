<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Penilaian Pelaksanaan Pekerjaan (DP3)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
            margin: 20px;

            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
        }

        .judul {
            text-align: center;
            font-weight: bold;
            text-transform: uppercase;
            font-size: 13px;
            margin-bottom: 10px;
            margin-top: 2px;
            text-decoration: underline;
            color: #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 4px;
            vertical-align: top;
        }

        th {
            background-color: #cce5ff;
            text-align: center;
        }

        .section-title {
            background-color: #ffe699;
            font-weight: bold;
        }

        .center {
            text-align: center;
        }

        .no-border {
            border: none !important;
        }
    </style>
</head>

<body style="background-image: url('<?php echo base_url() . $page[0]->logo_website ?>');">
    <table class="no-border" width="100%">
        <tr>
            <td class="no-border" valign="top"><img src="<?php echo base_url() . $page[0]->logo_website ?>" alt="" width="120" /></td>
            <td class="no-border" align="right">
                <h2 style="color:#f77d0e"><?php echo $page[0]->nama_website; ?></h2>
                <?php echo $contact[0]->alamat; ?><br>
                <?php echo $contact[0]->nomor_telephone; ?> / <?php echo $contact[0]->no_handphone; ?><br>
                <?php echo $contact[0]->email; ?><br>
                <?php echo $contact[0]->url_website; ?><br>
            </td>
        </tr>
    </table>
    <br>

    <div class="judul"><strong>PENILAIAN PEGAWAI SEKOLAH UTSMAN</strong></div>

    <div style="width:100%; font-size:11px; margin-bottom:5px;">
        <div style="float:left;">
            <strong>Jenis Penilaian:</strong> <?php echo $jenis_penilian; ?>
        </div>
        <div style="float:right;">
            <strong>Tanggal Penilaian:</strong> <?php echo $tanggal_penilaian ?>
        </div>
        <div style="clear:both;"></div>
    </div>

    <table class="no-border" style="width:100%; border-collapse:collapse; font-size:11px;">
        <tr>
            <td style="width:20%;"><strong>Nama Guru yang Dinilai</strong></td>
            <td style="width:30%;"><?php echo ucwords(strtolower($id_pegawai[0]->nama_lengkap)); ?></td>
            <td style="width:40%; text-align: center;"><strong><?php echo strtoupper(strtolower($questionnaire[0]->nama_kuisioner)); ?></strong></td>
            <td style="width:10%; text-align: center;"><strong>SKOR</strong></td>
        </tr>
        <tr>
            <td><strong>Jabatan</strong></td>
            <td><?php echo strtoupper(strtolower($id_pegawai[0]->hasil_nama_jabatan)); ?></td>
            <td rowspan="3" style=" text-align: center;"><?php echo $questionnaire[0]->deskripsi_kuisioner; ?> </td>
            <?php
            $predikat = "-";

            $personal_result    = !empty(@$result_personal[0]->jumlah_nilai_personal) ? $result_personal[0]->jumlah_nilai_personal : 0;
            $colleague_result   = !empty(@$result_colleague[0]->jumlah_nilai_sejawat) ? $result_colleague[0]->jumlah_nilai_sejawat : 0;
            $subordinate_result = !empty(@$result_subordinate[0]->jumlah_nilai_bawahan) ? $result_subordinate[0]->jumlah_nilai_bawahan : 0;
            $leader_result      = !empty(@$result_leader[0]->jumlah_nilai_atasan) ? $result_leader[0]->jumlah_nilai_atasan : 0;

            $abjad_value = ($personal_result + $colleague_result + $subordinate_result + $leader_result) / $total_kuisioner;

            foreach ($predicate_value as $value) {
                if ($abjad_value >= $value['nilai_minimal'] && $abjad_value <= $value['nilai_maksimal']) {
                    $predikat = $value['predikat_abjad'];
                    break;
                } else {
                    $predikat = "-";
                }
            }
            ?>
            <td rowspan="3" style="text-align: center; font-size: 50px; margin-bottom:-20px; padding-bottom: -10px;"><strong><?php echo $predikat; ?></strong></td>
        </tr>
        <tr>
            <td><strong>Tingkat</strong></td>
            <td>
                <?php if ($id_pegawai[0]->level_tingkat == 1 || $id_pegawai[0]->level_tingkat == 2) { ?>
                    DC/KB/TK
                <?php } elseif ($id_pegawai[0]->level_tingkat == 3) { ?>
                    SD
                <?php } elseif ($id_pegawai[0]->level_tingkat == 4) { ?>
                    SMP
                <?php } elseif ($id_pegawai[0]->level_tingkat == 5) { ?>
                    SMA
                <?php } elseif ($id_pegawai[0]->level_tingkat == 6) { ?>
                    UMUM
                <?php } ?>
            </td>

        </tr>
        <tr>
            <td><strong>Sekolah</strong></td>
            <td><?php echo $page[0]->nama_website; ?></td>

        </tr>
    </table>

    <br>

    <table>
        <thead>
            <tr>
                <th width="4%">No</th>
                <th width="25%">Aspek yang Dinilai</th>
                <th width="50%">Keterangan</th>
                <th width="5%">Nilai Personal</th>
                <th width="5%">Nilai Sejawat</th>
                <th width="5%">Nilai Atasan</th>
                <th width="5%">Nilai Bawahan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if (!empty($question_type)) {
                foreach ($question_type as $key => $value_type) {
            ?>
                    <tr class="section-title">
                        <td colspan="7"> <?php echo strtoupper($value_type->nama_tipe_pertanyaan); ?></td>
                    </tr>
                    <?php
                    if (!empty($question_personal) || !empty($question_colleague) || !empty($question_leader) || !empty($question_subordinate)) {
                        foreach ($question_personal as $key => $value) {
                            if ($value->tipe_pertanyaan == $value_type->id_tipe_pertanyaan) {
                                $personal     = !empty($value->total_isi_jawaban) ? $value->total_isi_jawaban : 0;
                                $colleague    = !empty($question_colleague[$key]->total_isi_jawaban) ? $question_colleague[$key]->total_isi_jawaban : 0;
                                $leader       = !empty($question_leader[$key]->total_isi_jawaban) ? $question_leader[$key]->total_isi_jawaban : 0;
                                $subordinate  = !empty($question_subordinate[$key]->total_isi_jawaban) ? $question_subordinate[$key]->total_isi_jawaban : 0;
                    ?>
                                <tr>
                                    <td class="center"><?php echo $no; ?></td>
                                    <td><?php echo $value->deskripsi_pertanyaan; ?></td>
                                    <td><?php echo ucfirst(strtolower($value->isi_pertanyaan)); ?></td>
                                    <td class="center"><?= $personal; ?></td>
                                    <td class="center"><?= $colleague; ?></td>
                                    <td class="center"><?= $subordinate; ?></td>
                                    <td class="center"><?= $leader; ?></td>
                                </tr>

                    <?php
                                $no++;
                            }
                        }
                    } ?>
            <?php
                }
            } ?>

            <tr class="section-title">
                <td colspan="3" class="center"><strong>JUMLAH NILAI PER PENILAIAN</strong></td>
                <td class="center"><strong><?= $personal_result; ?></strong></td>
                <td class="center"><strong><?= $colleague_result; ?></strong></td>
                <td class="center"><strong><?= $subordinate_result; ?></strong></td>
                <td class="center"><strong><?= $leader_result; ?></strong></td>

            </tr>
            <tr class="section-title">
                <td colspan="3" class="center"><strong>TOTAL NILAI</strong></td>
                <td colspan="4" class="center"><strong><?php echo ($personal_result + $colleague_result + $subordinate_result + $leader_result); ?></strong></td>
            </tr>
            <tr class="section-title">
                <td colspan="3" class="center"><strong>RATA RATA </strong></td>
                <td colspan="4" class="center"><strong><?php echo round(($personal_result + $colleague_result + $subordinate_result + $leader_result) / $total_question / $total_kuisioner, 2); ?></strong></td>
            </tr>
        </tbody>
    </table>
    <br>
    <div style="font-size:11px; text-align:justify; margin-top:10px; margin-bottom:25px; line-height:1.5;">
        <ul style="margin:0; padding-left:18px;">
            <li>
                Dengan ini saya menyatakan bersedia melakukan penilaian pelaksanaan pekerjaan pegawai sesuai ketentuan dan pedoman yang berlaku.
            </li>
            <li>
                Saya memahami bahwa penilaian ini bertujuan untuk menilai kinerja secara objektif, memberikan umpan balik bagi peningkatan kinerja, serta mendukung pembinaan dan pengembangan pegawai.
            </li>
            <li>
                Saya berkomitmen melaksanakan penilaian dengan penuh tanggung jawab, integritas, dan menjaga kerahasiaan hasil penilaian.
            </li>
        </ul>
    </div>
    <br><br>
    <table class="no-border" style="margin-bottom: 30px;">
        <tr>
            <td class="no-border center">Mengetahui, <br>Ketua Yayasan <br> <br> <img src="data:image/png;base64,<?php $qr_code_ketua; ?>" width="70"><br><br><strong>Qodrat Asyraf Rutbah</strong></td>
            <td class="no-border center"><br>Pegawai Yang Dinilai, <br> <br> <img src="data:image/png;base64,<?php $qr_code_dinilai; ?>" width="70"><br><br><strong><?php echo ucwords(strtolower($id_pegawai[0]->nama_lengkap)); ?></strong></td>
        </tr>
    </table>
    <br><br>
    <br><br>
    <br><br>
    <br><br>
    <div style="font-size:11px; text-align:justify; margin-top:30px">
        <strong>KETERANGAN: </strong>
        <?php echo $questionnaire[0]->keterangan; ?>
    </div>
</body>

</html>