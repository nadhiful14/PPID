<div class="table table-resoponsive">
<table class="table table-bordered" width="100%">
    <thead>
    <tr>
        <th style="text-align:center">No</th>
        <th>Nama</th>
        <th>Nama Departemen</th>
        <th style="text-align:center">Jam Kedatangan</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($dataLaporan)) { ?>
        <?php foreach ($dataLaporan as $k => $val) {
        ?>
            <tr class="trHideShow">
                <td align="center"><?php echo @$k + 1 ?></td>
                <td><?php echo @$val->nama ?></td>
                <td><?php echo @$val->nama_departemen ?></td>
                <td align="center"><?php echo @$val->masuk ?></td>
            </tr>
        <?php
                                }
                            } else {
        ?>
        <tr>
            <td colspan="4">Data Tidak Ditemukan</td>
        </tr>
    <?php
                            } ?>
</tbody>
</table>
</div>
<?php
echo $this->load->view('pluggins/table_sequence','',true);
?>