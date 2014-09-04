<?php
function stag_framework_update(){
  $source = new STAG_Framework_Updater;
  echo '<div class="wrap">
    <div id="icon-link-manager" class="icon32"></div>
    <h2>'.__('SMG Framework Update', 'stag').'</h2>';
  if($source->has_update()){ ?>
    <form method="post" id="stag-update">
      <h3>A new version of SMG Framework is available.</h3>
      <p>This updater will download and extract the latest SMG Framework files to your current theme's framework folder.</p>
      <p>Only the SMG Framework files will be updated with this functionality, any customization made to theme would not be affected.</p>
      <p><strong>&rarr; Current Version:</strong> <?php echo $source->get_framework_version(); ?></p>
      <p><strong>&rarr; New Version:</strong> <?php echo $source->get_remote_version(); ?></p>
      <input type="hidden" name="stag-do-update" value="update" />
      <input type="submit" value="Update SMG Framework" class="button" />
    </form>
    <div id="changelog-wrap">
      <?php echo $source->get_changelog(); ?>
    </div>
  <?php
  }else{
    echo '<p><strong>&rarr; You are using the latest SMG Framework Version:</strong> '.$source->get_framework_version().'</p>';
    echo $source->get_changelog();
  }
  echo '</div>';
}