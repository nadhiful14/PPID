<div class="table table-responsive">
<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th>Nama</th>
            <th>Departemen</th>
            <th class="text-center">Jam Presensi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(!empty($dataLaporan)){
            foreach($dataLaporan as $key=>$dl){
            ?>
            <tr>
                <td class="text-center"><?php echo $key+1 ?></td>
                <td><?php echo $dl->nama ?></td>
                <td><?php echo $dl->nama_departemen ?></td>
                <td class="text-center"><?php echo $dl->masuk ?></td>
            </tr>
            <?php
            }
        }else{
            ?>
            <tr>
                <td colspan="4"> Data Kosong</td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
</div>
<?php
echo $this->load->view('pluggins/table_sequence','',true);
?>