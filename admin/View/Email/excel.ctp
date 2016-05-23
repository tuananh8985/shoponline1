<STYLE type="text/css">
 table{
  font-family:"Times New Roman";
  font-size: 12pt;
 }
 .tableTd {
     border-width: 0.5pt; 
  border: solid; 
  font-family::"Times New Roman";
  font-size: 12pt;
 }
 .tableTdContent{
  border-width: 0.5pt; 
  border: solid;
  vertical-align: middle;
     font-family:"Times New Roman";
     font-size: 12pt;
 }
 
 .tableTdContent span{
  text-transform:uppercase;
 }
 #titles{
  font-weight: bolder;
 }
 
 #namecard{
 text-transform:uppercase;
 }
   
</STYLE>
<?php 
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Type: application/force-download");
header("Content-Type: application/download");;
header ("Content-Disposition: attachment; filename=\"Order.xls" );
header ("Content-Description: Generated Report" );
?>
<table>
<tr id="titles">
<td class="tableTd">TT</td>
<td class="tableTd">Tiêu đề</td>
<td class="tableTd">Email</td>
<td class="tableTd">Cập nhật</td>
</tr>       
<?php
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
$i=0; foreach($rows as $row):

//$phone = "&nbsp;".substr($row['Email']['created'],0,255);

$ngaydk = "&nbsp;".date('d/m/Y', strtotime($row['Email']['created']));
echo "<tr>";
echo "<td class='tableTdContent'>".($i+1)."</td>";
echo "<td class='tableTdContent'>".$row['Email']['name']."</span></td>";
echo "<td class='tableTdContent'>".$row['Email']['email']."</span></td>";
echo "<td class='tableTdContent'>".$ngaydk."</td>";
echo "</tr>"; 
$i++;          
endforeach;
?>               
</table>