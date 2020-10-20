<table width="100%" border="0" cellspacing="1" cellpadding="1" style="background: white;">
    <tr>
        <td align="center" valign="middle">
            <h3>Laporan Rincian Harian </h3>
            <h4>Bulan <?php echo $this->general->getTanggalIndo($dataLaporan['tanggal'][0]->date_dummy, 2) ?></h4>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" border="0" cellspacing="1" cellpadding="1">
                <tr>
                    <td width="6%">Nip</td>
                    <td width="1%" align="center">:</td>
                    <td width="93%"><?php echo @$dataProfile->nip ?></td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td align="center">:</td>
                    <td><?php echo @$dataProfile->nama ?></td>
                </tr>
                <tr>
                    <td>Instansi</td>
                    <td align="center">:</td>
                    <td>Uin Maulana Malik Ibrahim</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table width="100%" border="1" cellspacing="1" cellpadding="1">
                <tr>
                    <td width="5%" align="center">No</td>
                    <td width="10%" align="center">Tanggal</td>
					 <td width="10%" align="center">Jadwal</td>
                    <td width="20%" align="center">Masuk</td>
                    <td width="20%" align="center">Terlambat</td>
                    <td width="17%" align="center">Keluar</td>
                    <td width="14%" align="center">PSW</td>
                </tr>
                <?php
	//$this->general->testPre($dataLaporan);
                                    foreach ($dataLaporan['tanggal'] as $key => $rt) {
                                        $isWeekend = $this->lp->isWeekend($rt->date_dummy);
                                        if ($isWeekend and $isSatpam == false) {
                ?>
                        <tr style='background:#b0b0b0'>
                            <td align="center"><?php echo $key + 1; ?></td>
                            <td align="center"><?php echo $rt->date_dummy ?></td>
                            <td align="center"></td>
							<td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                            <td align="center"></td>
                        </tr>
                        <?php
                                            } else {
												if(!empty($hariLibur[$rt->date_dummy]) and $isSatpam == false){
													?>
													<tr style="background:#fa7066;">
															<td align="center"><?php echo $key + 1; ?></td>
															<td align="center"><?php echo $rt->date_dummy ?></td>
											
															<td colspan="4" align="center"><?php echo $hariLibur[$rt->date_dummy] ?></td>
															<td align="center">&nbsp;</td>
														</tr>
														<?php
												}else{
													//jika kosong maka artikan sebagai tidak masuk
													if (empty(@$dataLaporan['dataLaporan'][$rt->date_dummy])) {
													?>
														<tr style="background:<?php echo ($isSatpam)? '#b0b0b0':'#ffdde3'; ?>">
															<td align="center"><?php echo $key + 1; ?></td>
															<td align="center"><?php echo $rt->date_dummy ?></td>
															<td colspan="4" align="center"><?php echo ($isSatpam)? '' : 'Alpha' ?></td>
															<td align="center">&nbsp;</td>
														</tr>
													<?php
																			} else {
														if(@$dataLaporan['dataLaporan'][$rt->date_dummy]['status_presensi']=='Masuk'){
													?>
														<tr>
															<td align="center"><?php echo $key + 1; ?></td>
															<td align="center"><?php echo $rt->date_dummy ?></td>
															<td align="center"><?php echo @$dataLaporan['dataLaporan'][$rt->date_dummy]['nama_shift'] ?></td>
															<td align="center"><?php echo @$dataLaporan['dataLaporan'][$rt->date_dummy]['masuk'] ?></td>
															<td align="center"><?php echo @$dataLaporan['dataLaporan'][$rt->date_dummy]['terlambat'] ?></td>
															<td align="center"><?php echo @$dataLaporan['dataLaporan'][$rt->date_dummy]['keluar'] ?></td>
															<td align="center"><?php echo @$dataLaporan['dataLaporan'][$rt->date_dummy]['pulang_cepat'] ?></td>
														</tr>
													<?php
															}else{
															?>
				<tr style="background:#D7FF33">
				<td align="center"><?php echo $key + 1; ?></td>
															<td align="center"><?php echo $rt->date_dummy ?></td>
				<td colspan="4" align="center"><?php echo @$dataLaporan['dataLaporan'][$rt->date_dummy]['status_presensi'] ?></td>
					<td>&nbsp;</td>
				</tr>
				<?php
														}
													}
												}
                        ?>
                    <?php
                                            }//end else weekend
                    ?>
                <?php } 
				// $this->general->testPre($hariLibur);
				?>
            </table>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
</table>