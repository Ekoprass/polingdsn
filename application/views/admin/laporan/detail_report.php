    <?php
		foreach ($datanilai as $key) {
			$dosen[] = $key->nama_dosen;
			$nilai[] = $key->nilai;
		}
	?>
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


  <div id="chartdiv" class="hidden"></div> 


<script>
var chart = AmCharts.makeChart( "chartdiv", {
  "type": "radar",
  "theme": "light",
  "titles": [{
		"text": "<?php echo $matkul['nama_mk']?>", 
		"color": "#0a0", 
		"size": 24, 
		"url": "#" //custom url property to simplify the click event setup
  }],
  "dataProvider": [ 
  		<?php 	foreach ($datanilai as $key) {?>
  {
    "dosen": "<?php echo $key->nama_dosen ?>",
    "nilai": "<?php echo $key->nilai ?>"
  }, <?php } ?> 


   ],
  "valueAxes": [ {
    "axisTitleOffset": 20,
    "minimum": 0,
    "axisAlpha": 0.15
  } ],
  "startDuration": 2,
  "graphs": [ {
    "balloonText": "[[value]] nilai dari mata kuliah <?php echo $matkul['nama_mk']?>",
    "bullet": "round",
    "lineThickness": 2,
    "valueField": "nilai"
  } ],
  "categoryField": "dosen",
  "export": {
    "enabled": true
  }
}

);
</script>


<script>
function myFunction() {
    document.getElementById("chartdiv").className = "unhidden";
}
</script>