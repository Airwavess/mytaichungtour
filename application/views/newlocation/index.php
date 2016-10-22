<?php
foreach ($data->result() as $row) {
	echo " 景點名稱：";
	echo $row->lc_name;
	echo " 圖片路徑：";
	echo $row->img_path;
	echo " 景點描述：";
	echo $row->description;
	echo " 景點地址：";
	echo $row->address;
	echo " 經度：";
	echo $row->lat;
	echo " 緯度：";
	echo $row->lng;
	echo "</br>";
}
