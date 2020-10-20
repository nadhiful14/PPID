<?php
$data = $this->db->get('formulir_permohonan_informasi')->result();
foreach ($data as $form) {
    $cara = explode(",", $form['cara_memperoleh']);


?>

    <input type="checkbox" name="cara_memperoleh[]" value="Melihat/Membaca/Mendengarkan/Mencatat" <?php foreach ($cara as $key) {
                                                                                                        if ($key == 'Melihat/Membaca/Mendengarkan/Mencatat') {
                                                                                                            echo 'checked';
                                                                                                        }
                                                                                                    } ?>> Melihat/Membaca/Mendengarkan/Mencatat <br>

    <input type="checkbox" name="cara_memperoleh[]" value="Mendapatkan salinan informasi hardcopy/ softcopy" <?php foreach ($cara as $key) {
                                                                                                                    if ($key == 'Mendapatkan salinan informasi hardcopy/ softcopy') {
                                                                                                                        echo 'checked';
                                                                                                                    }
                                                                                                                } ?>> Mendapatkan salinan informasi hardcopy/ softcopy

<?php } ?>