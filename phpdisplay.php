<?php
function pagi($pagelen,$colnum,$pages,$sql){#pagi(จำนวนข้อมูลต่อหน้า,จำนวนคอลัมน์,เพจที่ทำงานอยู่ในขณะนี้,คำสั่งsql)
global $conn;
$pagelen=$pagelen;
$numrang=5;#ระยะห่างระหว่างจำนวนเลขหน้า
$page=$pages*1;
if($page==''){ $page=1; }
$result =  $conn->Execute($sql); 
$totalrecords= $num_rows = $result->RecordCount();
$totalpage = ceil($num_rows / $pagelen);  
$goto = ($page-1) * $pagelen; 
$start=$page-$numrang;
$endd=$page+$numrang;
if ($start <= 1)  $start = 1;
if($endd >= $totalpage)$endd=$totalpage;
 $sqlshopd = $sql." LIMIT ".$goto.",".$pagelen; 
$qrypd=$conn->Execute($sqlshopd) ;
echo "<table border=0 cellpadding=3 width=100%>";
echo "<tr>";
$i=0;
$j=0;
if($qrypd->RecordCount()>0){
while(!$qrypd->EOF){
 if($i == $colnum){
     	echo "</tr><tr>";
      	 $i = 0;
 } 
 switch($qrypd->fields["pd_status"]){
	case 1:$img_status="<img src='images/icon/icon_new.gif' width=25 height=11 />"; break;
	case 2:$img_status="<img src='images/icon/icon_hot.gif' width=25 height=11 />"; break;
	case 3:$img_status="<img src='images/icon/icon_cool.gif' width=25 height=11 />"; break;
	default:$img_status="";
 }
 if($qrypd->fields["pd_img"]=="")$imgpd="no-image.jpg"; else $imgpd=$qrypd->fields["pd_img"];#ตรวจชื่อไฟล์รูปภาพ
 if($_SERVER["QUERY_STRING"]!="") $qscring="&".$_SERVER["QUERY_STRING"];
  echo "<td valign=top  align=left>
<center><img  width='100' src='img_pd/".$imgpd."'/><br>".$img_status."<br>
  <a href='fp_showpd_detail.php?pdid=".$qrypd->fields["pd_id"].$qscring."'><b>". $qrypd->fields['pd_name']."</b></a><br>";
	echo "<b>ราคา : </b>".$qrypd->fields["pd_price"]."<br>";	
	echo "<a href='chkcart.php?cartid=".$qrypd->fields["pd_id"]."'><img src='images/icon/addtocart.png' border='0'></a></center></td>";
	$i++;	
	$qrypd->MoveNext();
}
	echo "</tr>";	
}else{
	echo "<tr align=\"center\"><td class=\"".$i."\"><b>ไม่พบข้อมูลที่ต้องการค้ันหา</b></td></tr>";	
}
	echo "</table>";
	if($pages!='0'){
  echo "<br><div id=-page- align=right>";
 if ($page > 1) { $back = $page - 1;  
  echo "<span id=page-no><a href='".$_SERVER['PHP_SELF']."?page=1'>First</a> </span>";
  echo "<span id=page-no><a href='".$_SERVER['PHP_SELF']."?page=".$back."'>&laquo;</a></span>";
		if ($start > 1) { 
  echo "<span id=jood>...</span>";
	} 
}
if($totalpage >1){
			for($i=$start ; $i<=$endd ; $i++){
 				if ($i == $page ) { 	
	echo "<span id=page-no-absolute>";		
  echo $i;
  echo "</span>";
 				} else  { 				
  echo "<span id=page-no>";
  echo "<a href='".$_SERVER['PHP_SELF']."?page=".$i."';>";
  echo $i;
  echo "</a></span>";
 				} 
			}  
		}
	if ($page< $totalpage) { 
		 $next = $page  +1; 
			 if ($endd < $totalpage) { 	
  				echo "<span id=jood>...</span>";
			 }
 				 echo "<span id=page-no><a href='".$_SERVER['PHP_SELF']."?page=".$next."'>&raquo;</a></span>";
  				echo "<span id=page-no><a href=".$_SERVER['PHP_SELF']."?page=".$totalpage."'>Last</a></span>";
		}
		echo "</div><br>";
	}
}
function convert_date($strDate, $mode, $type=""){ //ฟังก์ชั่นแปลงวันที่เวลาในฐานข้อมูล
	$month_key = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"); 
	$month_full = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
	$month_short = array("ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
	
	$dYear = substr($strDate,0,4);  //format Y-m-d H:i:s
	$dMonth = substr($strDate,5,2);
	$dDay = substr($strDate,8,2);
	if($dYear < 2550){
		$dYear += 543;
	}
	switch($mode){
		case 'full': // วันที่ 23 เดือนสิงหาคม พ.ศ. 2526
			if(substr($dDay,0,1) == 0){ // 02 ตัด 0 ออก เพื่อให้เป็นตัวเลขนับ
				$dDay = substr($dDay,1,1);
			}
			$thMonth = array_combine($month_key, $month_full);  
			$new_date = "วันที่ ".$dDay." เดือน".$thMonth[$dMonth]." พ.ศ. ".$dYear ;
		break;
		case 'short': // 23 ส.ค. 26
			$thMonth = array_combine($month_key, $month_short); 
			$new_date = $dDay." ".$thMonth[$dMonth]." ". substr($dYear,2,2);
		break;
		case 'digit': // 23/08/2550
			$new_date = $dDay."/".$dMonth."/".$dYear;
		break;
	}	
	switch($type){
		case 'datetime':
			$dTime = substr($strDate,11,8); 
			$new_date = $new_date." ".$dTime." น.";
		break;
	}
	return $new_date;
}
?>