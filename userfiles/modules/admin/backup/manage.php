<?php if(!is_admin()){

    return;

}

$keyword = false;
if(isset($params['keyword'])){
$keyword = $params['keyword'];
}
 ?>



<style>
.restore-loading-indicator {
	display:none;
}
.restore-loading-indicator.restoring-backup {
	display:block !important;
	width: 20px;
	height: 20px;
	-webkit-animation:spin 4s linear infinite;
	-moz-animation:spin 4s linear infinite;
	animation:spin 4s linear infinite;
}
@-moz-keyframes spin {
100% {
-moz-transform: rotate(360deg);
}
}
@-webkit-keyframes spin {
100% {
-webkit-transform: rotate(360deg);
}
}
@keyframes spin {
100% {
-webkit-transform: rotate(360deg);
transform:rotate(360deg);
}
}
</style>

<div id="backups_list" >
  <h2>
    <?php _e("Available Backups"); ?>
  </h2>
  <table   cellspacing="0" cellpadding="0" class="mw-ui-table">
    <thead>
      <tr>
        <th><?php _e("Filename"); ?>
        </th>
        <th><?php _e("Date"); ?></th>
        <th><?php _e("Time"); ?></th>
        <th><?php _e("Size"); ?></th>
        <th><?php _e("Download"); ?></th>
        <th><?php _e("Restore"); ?></th>
        <th><?php _e("Delete"); ?></th>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td><?php _e("Filename"); ?></td>
        <td><?php _e("Date"); ?></td>
        <td><?php _e("Time"); ?></td>
        <td><?php _e("Size"); ?></td>
        <td><?php _e("Download"); ?></td>
        <td><?php _e("Restore"); ?></td>
        <td><?php _e("Delete"); ?></td>
      </tr>
    </tfoot>
    <tbody>
      <?php
      $backups = mw(\depexorPackages\LegacyBackup\Backup::class)->get($keyword);
		  if(isarr($backups )): ?>
      <?php
	  $i = 1;
	   foreach($backups  as $item): ?>

       <?php

        $fname = explode('.', $item['filename']);  $extension = end($fname);

        $tip = $extension == 'zip' ? _e("Download full backup", true) : _e("Download database backup", true);

       ?>

      <tr class="mw_admin_backup_item_<?php print $i ?>">
        <td><?php print $item['filename']  ?> <span id="restore-<?php print md5($item['filename']) ?>" class="restore-loading-indicator mw-icon-load-c" title="Working"></span></td>
        <td><span class="mw-date"><?php print $item['date']  ?></span></td>
        <td><span class="mw-date"><?php print $item['time']  ?></span></td>
        <td><span class="mw-date"><?php print file_size_nice( $item['size'])  ?></span></td>
        <td class="mw-backup-download">
            <a class="mw-ui-btn tip mw-ui-btn-icon mw-ui-btn-<?php print ($extension == 'sql' ? 'warn' : 'notification'); ?>" data-tip="<?php print $tip; ?>" data-tipposition="top-center" target="_blank" title="<?php _e("Download"); ?>"
               href="<?php print api_url('depexorPackages/LegacyBackup/Backup/download'); ?>?file=<?php print $item['filename']  ?>"><span class="mw-icon-download"></span></a></td>
        <td class="mw-backup-restore">
          <a title="<?php _e("Restore"); ?>" class="mw-icon-reload" href="javascript:mw.admin_backup.restore('<?php print $item['filename']  ?>','#restore-<?php print md5($item['filename']) ?>')"></a></td>
        <td class="mw-backup-delete"><span title="<?php _e("Delete"); ?>" class="mw-icon-bin" onclick="mw.admin_backup.remove('<?php print $item['filename']  ?>', '.mw_admin_backup_item_<?php print $i ?>');"></span></td>
      </tr>
      <?php $i++; endforeach ; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>
