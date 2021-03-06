<?= form_open(site_url("campaign/edit/$module[id]"),array('id'=>'bigform')); ?>

<h1>Edit Campaign <a href='<?=site_url().'campaign/index'?>' class='small'>back</a></h1>
<p><?= form_label('Name','name'); ?></p>
<?= form_error('name'); ?>
<?= form_input(array('id'=>'name','name'=>'name','value'=>"$module[name]",'size'=>30)); ?>

<p><?= form_label('Description','description'); ?></p>
<?= form_error('description'); ?>
<?= form_textarea(array('id'=>'description','name'=>'description','cols'=>37,'rows'=>2, 'value'=>"$module[description]")); ?>

<div class="view">
<? $this->module->load($module['id']);  // LOAD VISUALIZATION ?>
</div>

<?php
$this->load->model($module['module'],'viz_module');
$this->viz_module->load_options($module['id']);  // LOAD OPTIONS
?>
<!-- START FILTERS -->
<?php
echo "<table id='list' border='0' cellpadding='10' cellspacing='2'>\n";
echo "<thead><tr><td>Active</td><td>Label</td><td>Memos</td><td>Color</td><td>Actions</td></tr></thead><tbody>\n";
$i=0;
foreach($filters as $d) {
  $row_class = $i++ % 2 == 0 ? 'c1' : 'c2';
  $checked = $d['active'] == 't' ? 'checked' : '';
  echo "<tr class='$row_class'><td><input type='checkbox' name='$d[filter_id]_active' value='$d[filter_id]'$checked></td><td>" . $d['name'] . "</td>";
  echo "<td><ul>";
  foreach($this->filter->get_memos($d['filter_id']) AS $f) {
    echo "<li>$f[memo]</li>\n";
  }
  echo "</ul></td>";


  $colors = array('Green'=>'#006600',
		  'Red'=>'#CC0000',
		  'Blue'=>'#0033CC',
		  'Yellow'=>'#FFEA00',		  
		  'Purple'=>'#660066',
		  'Orange'=>'#FF9900');

  echo "<td><select name='" . $d['filter_id'] . "_color'>";
  foreach($colors AS $key=>$value) {
    $selected = $d['color'] == $value ? "selected" : "";
    echo "<option value='$value'$selected>$key</option>\n";
  }
  echo "</select></td>\n";
  echo "<td><a href='/filters/edit/$d[filter_id]'>Edit</a> <a href='/campaign/remove_filter/$module[id]/$d[filter_id]'>Remove</a></td></tr>";
  echo "</tr>\n";
}
?>

<tfoot><tr><td colspan='5'>
<a href='/campaign/add_filter/<?=$module['id']?>'>Add Filter</a>
<?=form_submit(array('id'=>'submit','value'=>'Save')); ?>
</td></tr></tfoot>

<?php
echo "</tbody></table>";
echo form_close();
