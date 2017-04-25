<div class="selected-page">
    <div class="inner">
        <h1>
            <i class="fa fa-cog" aria-hidden="true"></i>
            <?= lang('selected_manage_firms') ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Library</a></li>
            <li class="active">Data</li>
        </ol>
    </div>
    <div class="border"></div>
</div>
<div class="row">
    <div class="col-sm-8 col-md-6">
        <div class="panel-content">
            <div class="head">
                <div><?= lang('list_firms') ?></div>
            </div>
            <div>
                <div class="body">
                    <ul class="list-firms">
                        <?php foreach ($firms as $firm) { ?>
                            <li>
                                <?= $firm['name'] ?>
                                <a href="?delete=<?= $firm['id'] ?>" class="confirm" data-my-message="<?= lang('delete_firm_confirm') ?>">
                                    <i class="fa fa-remove" aria-hidden="true"></i>
                                </a>
                                <a href="<?= lang_url('user/managefirms/edit/' . $firm['id']) ?>">
                                    <i class="fa fa-wrench" aria-hidden="true"></i>
                                </a>
                                <?php if ($firm['is_default'] == 1) { ?>
                                    <span class="label label-success"><?= lang('firm_default') ?></span>
                                <?php } else { ?>
                                    <a href="" class="confirm" data-my-message="<?= lang('default_firm_confirm') ?>">
                                        <span class="label label-danger"><?= lang('make_firm_default') ?></span>
                                    </a>
                                <?php } ?>
                            </li> 
                        <?php } ?>
                        <li> 
                            <a href="javascript:void(0);" class="btn btn-xs btn-default" data-toggle="modal" data-target="#modalAddCompany"> 
                                <?= lang('add_new_company') ?>
                            </a>
                            <div class="clearfix"></div>
                        </li> 
                    </ul>
                </div>
                <div class="footer"> </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add Company -->
<div class="modal fade" id="modalAddCompany" tabindex="-1" role="dialog" aria-labelledby="modalAddCompany">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="site-form" method="POST" action="">
                <input type="hidden" name="addFirm" value="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?= lang('add_new_company') ?></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><?= lang('firm_name') ?></label>
                        <input type="text" name="firm_name" class="form-control field" value="<?= trim($this->session->flashdata('firm_name')) ?>">
                    </div>
                    <div class="form-group">
                        <label><?= lang('firm_bulstat') ?></label>
                        <input type="text" name="firm_bulstat" value="<?= trim($this->session->flashdata('firm_bulstat')) ?>" class="form-control field">
                    </div>
                    <div class="form-group">
                        <label><?= lang('firm_reg_address') ?></label>
                        <textarea name="firm_reg_address" class="form-control field"><?= trim($this->session->flashdata('firm_reg_address')) ?></textarea>
                    </div>
                    <div class="form-group">
                        <label><?= lang('firm_city') ?></label>
                        <input type="text" name="firm_city" value="<?= trim($this->session->flashdata('firm_city')) ?>" class="form-control field">
                    </div>
                    <div class="form-group">
                        <label><?= lang('firm_mol') ?></label>
                        <input type="text" name="firm_mol" value="<?= trim($this->session->flashdata('firm_mol')) ?>" class="form-control field">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?= lang('close') ?></button>
                    <button type="submit" class="btn btn-primary"><?= lang('add_new_company') ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if ($this->session->flashdata('addFirm') == '1') {
    ?>
    <script>
        $(document).ready(function () {
            $('#modalAddCompany').modal('show');
        });
    </script>
    <?php
}
?>