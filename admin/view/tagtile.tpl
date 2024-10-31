<style type="text/css">
  .alert.alert-danger
  {
    background: red;
    color: #fff;
    padding: 6px;
    font-weight: 600;
  }
  .alert.alert-success {
    background: green;
    color: #fff;
    padding: 6px;
    font-weight: 600;
  }
</style>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <h1><?php echo $heading_title; ?></h1>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <?php if($success){ ?>
    <div class="alert alert-success"><i class="fa fa-exclamation-circle"></i> <?= $success ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="panel panel-default">
      <div class="panel-body">
          <div class="cart">
            <div class="video-guide">
              <i></i>
              <a target="_blank" href="https://hqline.ru/kupit-platnuyu-versiyu-plagina-wordpress-plitka-tegov-seo-tag-tile/#button-buy"><?= $text_video_request; ?></a>
            </div>
            <div>
              <?= $text_advantages; ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-module_tagtile_excel"><?= $entry_excel_input ?></label>
            <div class="col-sm-10">
              <form action="<?= $import?>" method="post" enctype="multipart/form-data" id="form-upload" class="form-horizontal">
                    <input type="radio" name="incremental" value="0" checked="checked">
                    <?= $entry_incremental_no?>    
                    <input size="60" type="file" name="module_tagtile_excel" id="module_tagtile_excel">
                    <div>
                      <button type="button" id="uploadata" onclick="submitImportForm()" class="btn btn-primary">
                        <span><?= $entry_button_import?></span>
                      </button>
                    </div>
              </form>
            </div>
        </div>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-promo-code" class="form-horizontal"> 
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-tagtile_rel_active_color"><?php echo $entry_rel_active_color; ?></label>
            <div class="col-sm-10">
              <input size="60" type="text" name="tagtile_rel_active_color" value="<?= $rel_active_color; ?>">
            </div>
          </div> 
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-tagtile_rel_hover_color"><?php echo $entry_rel_hover_color; ?></label>
            <div class="col-sm-10">
              <input size="60" type="text" name="tagtile_rel_hover_color" value="<?= $rel_hover_color; ?>">
            </div>
          </div> 
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-tagtile_border_active_color"><?php echo $entry_border_active_color; ?></label>
            <div class="col-sm-10">
              <input size="60" type="text" name="tagtile_border_active_color" value="<?= $border_active_color; ?>">
            </div>
          </div> 
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-tagtile_border_hover_color"><?php echo $entry_border_hover_color; ?></label>
            <div class="col-sm-10">
              <input size="60" type="text" name="tagtile_border_hover_color" value="<?= $border_hover_color; ?>">
            </div>
          </div> 
          <div class="form-group">
            <button type="submit" data-toggle="tooltip" title="<?= $button_save ?>" class="btn btn-primary"><i class="fa fa-save"><?= $button_save ?></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    function checkFileSize(id) {
  // See also http://stackoverflow.com/questions/3717793/javascript-file-upload-size-validation for details
  var input, file, file_size;

  if (!window.FileReader) {
    // The file API isn't yet supported on user's browser
    return true;
  }

  input = document.getElementById(id);
  if (!input) {
    // couldn't find the file input element
    return true;
  }
  else if (!input.files) {
    // browser doesn't seem to support the `files` property of file inputs
    return true;
  }
  else if (!input.files[0]) {
    // no file has been selected for the upload
    alert( '<?= $waring_no_file_choice ?>' );
    return false;
  }
  else {
    file = input.files[0];
    file_size = file.size;
        // check against PHP's post_max_size
    post_max_size = 1047527424;
    if (file_size > post_max_size) {
      alert( '<?= $waring_large_file?>' );
      return false;
    }
            // check against PHP's upload_max_filesize
    upload_max_filesize = 1047527424;
    if (file_size > upload_max_filesize) {
      alert( '<?= $waring_upload_large_file?>' );
      return false;
    }
        return true;
  }
}
  function submitImportForm() {
    form = document.getElementById('form-upload');
        if (checkFileSize('module_tagtile_excel')) {
          form.submit();
      }
  }
</script>