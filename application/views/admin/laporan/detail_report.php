
   <?php
		// foreach ($datanilai as $key) {
		// 	$dosen[] = $key->nama_dosen;
		// 	$nilai[] = $key->nilai;
		// }
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

<div class="panel panel-info side-body">

<form action="<?php echo site_url('laporan/detail_report');?>" method="post" >
  <div id="select" class="col-lg-6 col-md-6 col-sm-6">    
    <label>Pilih Matakuliah</label>
    <select name="matakuliah" id="input" class="form-control" required="true">
      <option value="" selected="true"></option>
      <?php foreach ($daftar_mk as $key) {?>
      <option value="<?php echo $key->id_mk ?>"><?php echo $key->id_mk." - ".$key->nama_mk ?></option>
    <?php } ?>
    </select>
  </div>
  <div id="select" class="col-lg-6 col-md-6 col-sm-6">    
    <label>Pilih Tahun Ajaran</label>
    <select name="tahun" id="input" class="form-control" required="true">
      <option value="" selected="true"></option>
    <?php foreach ($tahun as $key) {?>
      <option value="<?php echo $key->tahun ?>"><?php echo $key->tahun ?></option>
    <?php } ?>
    </select>
    <button type="submit">cari</button>
  </div>
  </form>
  <br>
  <br>
  <br>
  <br>
  <br>
  <div id="chartdiv"></div> 
        
 </div>


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