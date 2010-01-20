<?php
$xml= "<chart caption='".htmlentities($mod['name'])."' xAxisName='Month' yAxisName='$' showValues='0' numberPrefix='$' canvasbgColor='FFFFFF' canvasBorderColor='000000' canvasBorderThickness='2'>";
$colors = array("FF0000","0E2964");
date_default_timezone_set('America/New_York');
$keys = array_keys($data);
$xml.= "<categories>";
foreach($data[$keys[0]] AS $d) {
  $d['label'] = date_format(date_create($d['label']), "M y");
  $xml.= "<category label='$d[label]'/>";
}
$xml.="</categories>";

$i = 0;
foreach($keys AS $index) {
  $xml.= "<dataset seriesName='$index' color='$colors[$i]'>";
  foreach($data[$index] AS $d) {
    $xml.= "<set value='".abs($d['value'])."'/>";
  }
  $xml.="</dataset>";
  $i++;
}
$xml.= "</chart>";
?>


<div id="module">
<?php
echo renderChartHTML("./system/application/libraries/MSColumn3D.swf", "", $xml, "myNext", 700, 300, false, false);
?>

</div>


