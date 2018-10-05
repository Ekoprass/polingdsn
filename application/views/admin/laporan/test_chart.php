<!DOCTYPE html>
<html>
<head>
    <title>Grafik Stok Barang</title>
 
	<style>
		canvas {
			-moz-user-select: none;
			-webkit-user-select: none;
			-ms-user-select: none;
		}
		#chartdiv {
			  width: 100%;
			  height: 500px;
			}		
	</style>

<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/none.js"></script>

</head>
<body>

<div id="chartdiv"></div> 

<script>
  
var chart = AmCharts.makeChart( "chartdiv", {
  "type": "pie",
  "theme": "light",
  "dataProvider": [ {
    "mahasiswa": "Mahasiswa Sudah Menilai",
    "jumlah": <?php echo $sudah ?>
  }, {
    "mahasiswa": "Mahasiswa Belum Menilai",
    "jumlah": <?php echo $belum ?>
  } ],
  "valueField": "jumlah",
  "titleField": "mahasiswa",
   "balloon":{
   "fixedPosition":true
  },
  "export": {
    "enabled": true
  }
} );
</script>
</body>
</html>