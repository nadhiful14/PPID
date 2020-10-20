            <?php
            echo $this->load->view('pluggins/daterange', '', true);
            echo $this->load->view('pluggins/print_css', '', true);
            // $this->general->testPre($dataLaporan);
            // $this->general->testPre($dataProfile);
            ?>
            <div style="padding:40px;background:white">
                <div class="row">
                    <form id="frm" method="post">
                    <div class="col-lg-3 col-md-3">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="=date" autocomplete="off" name="tanggal" class="form-control daterange">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group" style="margin-top:27px;">
                            <label></label>
                            <?php echo btn_proses('getLaporan'); ?>
                        </div>
                    </div>
                    </form>
                </div>
                <?php echo $this->load->view('pluggins/loading', '', true); ?>
                <div id="toPrint">
                    <div id="hasilCari" style="overflow-x: scroll"></div>
                </div>
            </div>
            <?php echo ajax_return_json('getLaporan', 'staff/prosesHarian', 'hasilCari'); ?>
            <script>
                $(function() {
                    getLaporan();
                });
            </script>