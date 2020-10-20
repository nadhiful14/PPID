<?php
// $this->set_css($this->default_theme_path . '/bootstrap/css/bootstrap/bootstrap.min.css');
// $this->set_css($this->default_theme_path . '/bootstrap/css/font-awesome/css/font-awesome.min.css');
// $this->set_css($this->default_theme_path . '/bootstrap/css/common.css');
$this->set_css($this->default_theme_path . '/bootstrap/css/list.css');
$this->set_css($this->default_theme_path . '/bootstrap/css/general.css');
$this->set_css($this->default_theme_path . '/bootstrap/css/plugins/animate.min.css');

if ($this->config->environment == 'production') {
    $this->set_js_lib($this->default_javascript_path . '/' . grocery_CRUD::JQUERY);
    $this->set_js_lib($this->default_theme_path . '/bootstrap/build/js/global-libs.min.js');
} else {
    $this->set_js_lib($this->default_javascript_path . '/' . grocery_CRUD::JQUERY);
    $this->set_js_lib($this->default_theme_path . '/bootstrap/js/jquery-plugins/jquery.form.js');
    $this->set_js_lib($this->default_theme_path . '/bootstrap/js/common/cache-library.js');
    $this->set_js_lib($this->default_theme_path . '/bootstrap/js/common/common.js');
}

//section libs
// $this->set_js_lib($this->default_theme_path . '/bootstrap/js/bootstrap/dropdown.min.js');
$this->set_js_lib($this->default_theme_path . '/bootstrap/js/bootstrap/modal.min.js');
$this->set_js_lib($this->default_theme_path . '/bootstrap/js/jquery-plugins/bootstrap-growl.min.js');
$this->set_js_lib($this->default_theme_path . '/bootstrap/js/jquery-plugins/jquery.print-this.js');

// $this->set_js_lib($this->default_javascript_path . '/jquery_plugins/eModal.min.js');
$this->set_js_lib($this->default_javascript_path . '/jquery_plugins/jquery.inputmask.bundle.js');
$this->set_js_lib($this->default_javascript_path . '/jquery_plugins/config/jquery_input_mask.js');
//page js
$this->set_js_lib($this->default_theme_path . '/bootstrap/js/datagrid/gcrud.datagrid.js');
$this->set_js_lib($this->default_theme_path . '/bootstrap/js/datagrid/list.js');
$this->set_js_config($this->default_theme_path . '/bootstrap/js/form/tambahan.js');

$colspans = (count($columns) + 2);

//Start counting the buttons that we have:
$buttons_counter = 0;

if (!$unset_edit) {
    $buttons_counter++;
}

if (!$unset_read) {
    $buttons_counter++;
}

if (!$unset_delete) {
    $buttons_counter++;
}

if (!empty($list[0]) && !empty($list[0]->action_urls)) {
    $buttons_counter = $buttons_counter +  count($list[0]->action_urls);
}

$list_displaying = str_replace(
    array(
        '{start}',
        '{end}',
        '{results}'
    ),
    array(
        '<span class="paging-starts">1</span>',
        '<span class="paging-ends">10</span>',
        '<span class="current-total-results">' . $this->get_total_results() . '</span>'
    ),
    $this->l('list_displaying')
);
?>
<script type='text/javascript'>
    var base_url = '<?php echo base_url(); ?>';

    var subject = '<?php echo $subject ?>';
    var ajax_list_info_url = '<?php echo $ajax_list_info_url; ?>';
    var ajax_list_url = '<?php echo $ajax_list_url; ?>';
    var unique_hash = '<?php echo $unique_hash; ?>';

    var message_alert_delete = "<?php echo $this->l('alert_delete'); ?>";

    //multi button
    function confirm_multi_button(url_multi_button, title, message) {
        eModal.confirm(message, title).then(function() {
            multi_button_click(url_multi_button, title);
        }, function() {
            //untuk cancel
        });
    }

    function multi_button_ajax(urlAjax, title) {
        var delete_selected = [],
            data_to_send;
        $('.select-row:checked').each(function() {
            hilangSatu = $(this).data('id').replace("/", "");
            delete_selected.push(hilangSatu.replace("/", ""));
        });
        data_to_send = {
            ids: delete_selected
        };
        var params = {
            buttons: [{
                    text: 'Cancel',
                    close: true,
                    style: 'danger'
                },
                {
                    text: 'Yes',
                    close: true,
                    style: 'success',
                    click: function() {
                        submitFormModal()
                    }
                }
            ],
            size: eModal.size.lg,
            title: title,
            url: urlAjax + "?id=" + delete_selected
        };

        return eModal.ajax(params);
    }

    function multi_button_click(url_multi_button, title) {
        var delete_selected = [],
            data_to_send;
        $('.select-row:checked').each(function() {
            delete_selected.push($(this).data('id'));
        });
        data_to_send = {
            ids: delete_selected
        };
        $.ajax({
            beforeSend: function() {
                $('.gc-container').addClass('loading-opacity');
            },
            error: function() {
                $('.gc-container').removeClass('loading-opacity');
            },
            data: data_to_send,
            method: 'post',
            dataType: 'json',
            url: url_multi_button,
            success: function(output) {
                if (output.success) {
                    showNotification(title);
                }
            }
        }).done(function() {
            $('.gc-refresh').click();
        });
    }

    function showNotification(title) {
        $.growl(title + " Berhasil", {
            type: 'info',
            delay: 10000,
            animate: {
                enter: 'animated bounceInDown',
                exit: 'animated bounceOutUp'
            }
        });
    }
    //untuk emodal iframe
    // function emodal(url, title) {
    //     eModal.iframe(url, title);
    // }

    function ajaxModal(urlAjax, title) {
        var params = {
            buttons: [{
                    text: 'Cancel',
                    close: true,
                    style: 'danger'
                },
                {
                    text: 'Yes',
                    close: true,
                    style: 'success',
                    click: function() {
                        submitFormModal()
                    }
                }
            ],
            size: eModal.size.lg,
            title: title,
            url: urlAjax
        };

        return eModal.ajax(params);
    }

    function submitFormModal() {
        $.ajax({
            type: 'post',
            url: $('#form_modal_ajax').attr('action'),
            data: $('#form_modal_ajax').serialize(),
            success: function() {
                showNotification('Transaksi ');
            }
        }).done(function() {
            $('.gc-refresh').click();
        });
    }

    function submitButtonAddSideAdd(url) {
        eModal.confirm("Anda Yakin", "Konfirmasi").then(function() {
            window.location.href = url;
        }, function() {
            //untuk cancel
        });
    }
</script>
<br />
<?php //print_r($multi_button) 
?>
<!-- tambahan image preview -->
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-body modal-lg">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <img src="" class="imagepreview" style="width: 100%;">
            </div>
        </div>
    </div>
</div>
<!-- end image preview -->
<div class="container gc-container">
    <div class="success-message hidden"><?php
                                        if ($success_message !== null) { ?>
            <?php echo $success_message; ?> &nbsp; &nbsp;
        <?php }
        ?></div>

    <div class="row">
        <div class="table-section">
            <div class="table-label" style="height: 50px;background: #cdf1e0;">
                <div class="floatL l5" style="margin-top:16px;">
                    <font size=3><b><i class="fa fa-newspaper-o"></i> <?php echo $subject_plural; ?></b></font>
                </div>
                <div class="clear"></div>
            </div>
            <div class="table-container">
                <?php echo form_open("", 'method="post" id="gcrud-search-form crud-form" style="border: 1px solid #DDDDDD;border-bottom:none"'); ?>
                <div class="header-tools">
                    <?php
                    if (!$unset_add) { ?>
                        <div class="floatL t5">
                            <a class="btn btn-default" href="<?php echo $add_url ?>"><i class="fa fa-plus"></i> &nbsp;
                                <?php echo $this->l('list_add'); ?> <?php echo $subject ?></a>
                            <!-- tambahanku -->
                            <?php if (!empty($button_side_add)) { ?>
                                <div class="btn-group dropdown">
                                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-plus"></i> &nbsp;Actions <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <?php foreach ($button_side_add as $keyButtonSideAdd => $valButtonSideAdd) { ?>
                                            <li>
                                                <?php if ($valButtonSideAdd->confirm) { ?>
                                                    <a href="javascipt:void(0)" onclick="submitButtonAddSideAdd('<?php echo $valButtonSideAdd->link_url ?>')">
                                                        <?php } else {

                                                        if ($valButtonSideAdd->type == 'ajax_type') {
                                                        ?>
                                                            <a href="javascipt:void(0)" onclick="ajaxModal('<?php echo $valButtonSideAdd->link_url ?>','<?php echo $valButtonSideAdd->label ?>')">
                                                            <?php
                                                        } else {


                                                            ?>
                                                                <a href="<?php echo $valButtonSideAdd->link_url ?>">
                                                            <?php
                                                        }
                                                    } ?>
                                                            <i class="<?php echo $valButtonSideAdd->css_class ?>"></i>
                                                            <span><?php echo $valButtonSideAdd->label ?></span>
                                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            <?php } ?>
                            <!-- tambahanku -->
                        </div>
                    <?php }
                    //untuk button add
                    if ($unset_add) { ?>
                        <div class="floatL t5">
                            <?php
                            if (!empty($button_side_add)) {
                                if (count($button_side_add) == 1) {
                                    foreach ($button_side_add as $keyButtonSideAdd => $valButtonSideAdd) { ?>
                                        <a class="btn btn-default" href="<?php echo $valButtonSideAdd->link_url ?>">
                                            <i class="<?php echo $valButtonSideAdd->css_class ?>"></i>
                                            <span><?php echo $valButtonSideAdd->label ?></span>
                                        </a>
                                    <?php
                                    }
                                } else {
                                    $firt_button_side_add = array_shift($button_side_add);
                                    ?>
                                    <a class="btn btn-default" href="<?php echo $firt_button_side_add->link_url ?>">
                                        <i class="<?php echo $firt_button_side_add->css_class ?>"></i>
                                        <span><?php echo $firt_button_side_add->label ?></span>
                                    </a>
                                    <!-- tambahanku -->
                                    <div class="btn-group dropdown">
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-plus"></i> &nbsp;Actions <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <?php
                                            foreach ($button_side_add as $keyButtonSideAdd => $valButtonSideAdd) { ?>
                                                <li>
                                                    <a href="<?php echo $valButtonSideAdd->link_url ?>">
                                                        <i class="<?php echo $valButtonSideAdd->css_class ?>"></i>
                                                        <span><?php echo $valButtonSideAdd->label ?></span>
                                                    </a>
                                                </li>
                                            <?php }
                                            ?>
                                        </ul>
                                    </div>
                                    <!-- tambahanku -->
                            <?php
                                }
                            } ?>

                        </div>
                    <?php }
                    // print_r($button_side_add);
                    ?>
                    <div class="floatR">
                        <?php if (!$unset_export) { ?>
                            <a class="btn btn-default t5 gc-export" data-url="<?php echo $export_url; ?>">
                                <i class="fa fa-cloud-download floatL t3"></i>
                                <span class="hidden-xs floatL l5">
                                    <?php echo $this->l('list_export'); ?>
                                </span>
                                <div class="clear"></div>
                            </a>
                        <?php } ?>
                        <?php if (!$unset_print) { ?>
                            <a class="btn btn-default t5 gc-print" data-url="<?php echo $print_url; ?>">
                                <i class="fa fa-print floatL t3"></i>
                                <span class="hidden-xs floatL l5">
                                    <?php echo $this->l('list_print'); ?>
                                </span>
                                <div class="clear"></div>
                            </a>
                        <?php } ?>

                        <a class="btn btn-primary search-button t5">
                            <i class="fa fa-search"></i>
                            <input type="text" name="search" class="search-input" />
                        </a>
                    </div>
                    <div class="clear"></div>
                </div>
                <div style="overflow-x:unset">
                    <!-- overflow table -->
                    <!-- <div class="table table-responsive"> -->
                    <table class="table table-bordered grocery-crud-table table-hover">
                        <thead>
                            <tr>
                                <th colspan="2" <?php if ($buttons_counter === 0) { ?>class="hidden" <?php } ?>>
                                    <?php echo $this->l('list_actions'); ?>
                                </th>
                                <?php foreach ($columns as $column) { ?>
                                    <th class="column-with-ordering" data-order-by="<?php echo $column->field_name; ?>">
                                        <?php echo $column->display_as; ?></th>
                                <?php } ?>
                            </tr>

                            <tr class="filter-row gc-search-row">
                                <td class="no-border-right <?php if ($buttons_counter === 0) { ?>hidden<?php } ?>">
                                    <?php if (!$unset_delete) { ?>
                                        <div class="floatL t5">
                                            <input type="checkbox" class="select-all-none" />
                                        </div>
                                    <?php } ?>
                                </td>
                                <td class="no-border-left <?php if ($buttons_counter === 0) { ?>hidden<?php } ?>">
                                    <div class="floatL">
                                        <!-- tambahanku -->
                                        <div class="btn-group dropdown multi-button hidden">
                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                Actions <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a href="javascript:void(0);" title="<?php echo $this->l('list_delete') ?>" class="hidden delete-selected-button">
                                                        <i class="fa fa-trash-o text-danger"></i>
                                                        <span class="text-danger"><?php echo $this->l('list_delete') ?></span>
                                                    </a>
                                                </li>
                                                <?php
                                                if (!empty($multi_button)) {
                                                    foreach ($multi_button as $key_multi => $val_multi) {
                                                        if ($val_multi->with_confirm) {
                                                            $onclick = "confirm_multi_button('$val_multi->link_url','$val_multi->title_confirm','$val_multi->message_confirm')";
                                                        } else if ($val_multi->type == 'ajax_type') {
                                                            $onclick = "multi_button_ajax('$val_multi->link_url','$val_multi->title_confirm')";
                                                        } else {
                                                            $onclick = "multi_button_click('$val_multi->link_url','$val_multi->title_confirm')";
                                                        }
                                                ?>
                                                        <li>
                                                            <a href="javascript:void(0)" onclick="<?php echo $onclick ?>"><i class="<?php echo $val_multi->css_class ?>"></i>
                                                                <?php echo $val_multi->label ?></a>
                                                        </li>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                        <!-- <a href="javascript:void(0);" title="<?php echo $this->l('list_delete') ?>"
                                               class="hidden btn btn-default delete-selected-button">
                                                <i class="fa fa-trash-o text-danger"></i>
                                                <span class="text-danger"><?php echo $this->l('list_delete') ?></span>
                                            </a> -->
                                    </div>
                                    <div class="floatR l5">
                                        <a href="javascript:void(0);" class="btn btn-default gc-refresh">
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                    </div>
                                    <!-- </div> -->
                                    <div class="clear"></div>
                                </td>
                                <?php foreach ($columns as $column) { ?>
                                    <td>
                                        <input type="text" autocomplete="off" class="form-control searchable-input floatL" placeholder="Search <?php echo $column->display_as; ?>" name="<?php echo $column->field_name; ?>" />
                                    </td>
                                <?php } ?>
                            </tr>

                        </thead>
                        <tbody>
                            <?php include(__DIR__ . "/list_tbody.php"); ?>
                        </tbody>
                    </table>
                </div>
            </div><!-- div overflow table -->
            <!-- Table Footer -->
            <div class="footer-tools" style="margin-bottom:0px !important;">

                <!-- "Show 10/25/50/100 entries" (dropdown per-page) -->
                <div class="floatL t20 l5" style="margin-top:10px !important">
                    <div class="floatL t10">
                        <?php list($show_lang_string, $entries_lang_string) = explode('{paging}', $this->l('list_show_entries')); ?>
                        <?php echo $show_lang_string; ?>
                    </div>
                    <div class="floatL r5 l5 t3">
                        <select name="per_page" class="per_page form-control">
                            <?php foreach ($paging_options as $option) { ?>
                                <option value="<?php echo $option; ?>" <?php if ($option == $default_per_page) { ?>selected="selected" <?php } ?>>
                                    <?php echo $option; ?>&nbsp;&nbsp;
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="floatL t10">
                        <?php echo $entries_lang_string; ?>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- End of "Show 10/25/50/100 entries" (dropdown per-page) -->


                <div class="floatR r5">

                    <!-- Buttons - First,Previous,Next,Last Page -->
                    <ul class="pagination" style="margin:10px 0 !Important">
                        <li class="disabled paging-first"><a href="#"><i class="fa fa-step-backward"></i></a></li>
                        <li class="prev disabled paging-previous"><a href="#"><i class="fa fa-chevron-left"></i></a>
                        </li>
                        <li>
                            <span class="page-number-input-container">
                                <input type="number" value="1" class="form-control page-number-input" style="text-align:center !important;width:100px !Important;padding:unset !important;" />
                            </span>
                        </li>
                        <li class="next paging-next"><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                        <li class="paging-last"><a href="#"><i class="fa fa-step-forward"></i></a></li>
                    </ul>
                    <!-- End of Buttons - First,Previous,Next,Last Page -->

                    <input type="hidden" name="page_number" class="page-number-hidden" value="1" />

                    <!-- Start of: Settings button -->
                    <div class="btn-group floatR t20 l10 settings-button-container" style="margin-top:10px !important">
                        <button type="button" class="btn btn-default dropdown-toggle settings-button" data-toggle="dropdown">
                            <i class="fa fa-cog r5"></i>
                            <span class="caret"></span>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-right">
                            <li>
                                <a href="javascript:void(0)" class="clear-filtering">
                                    <i class="fa fa-eraser"></i> Clear filtering
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- End of: Settings button -->

                </div>


                <!-- "Displaying 1 to 10 of 116 items" -->
                <div class="floatR r10 t30" style="margin-top:16px !important">
                    <?php echo $list_displaying; ?>
                    <span class="full-total-container hidden">
                        <?php echo str_replace(
                            "{total_results}",
                            "<span class='full-total'>" . $this->get_total_results() . "</span>",
                            $this->l('list_filtered_from')
                        );
                        ?>
                    </span>
                </div>
                <!-- End of "Displaying 1 to 10 of 116 items" -->

                <div class="clear"></div>
            </div>
            <!-- End of: Table Footer -->

            <?php echo form_close(); ?>
        </div>
    </div>

    <!-- Delete confirmation dialog -->
    <div class="delete-confirmation modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?php echo $this->l('list_delete'); ?></h4>
                </div>
                <div class="modal-body">
                    <p><?php echo $this->l('alert_delete'); ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $this->l('form_cancel'); ?></button>
                    <button type="button" class="btn btn-danger delete-confirmation-button"><?php echo $this->l('list_delete'); ?></button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Delete confirmation dialog -->

    <!-- Delete Multiple confirmation dialog -->
    <div class="delete-multiple-confirmation modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><?php echo $this->l('list_delete'); ?></h4>
                </div>
                <div class="modal-body">
                    <p><?php echo $this->l('alert_delete'); ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        <?php echo $this->l('form_cancel'); ?>
                    </button>
                    <button type="button" class="btn btn-danger delete-multiple-confirmation-button" data-target="<?php echo $delete_multiple_url; ?>">
                        <?php echo $this->l('list_delete'); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Delete Multiple confirmation dialog -->

</div>
</div>