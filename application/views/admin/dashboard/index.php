<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
		<center><span class="icon fa fa-institution fa-2x">Sistem Informasi Penilaian Kinerja Dosen (Polling)</span></center>
		</h4>
    </div>
	
	<div class="panel-body">         
		<div class="padding-top">
			<div class="row">
                <div class="col-sm-4">
	                <div class="panel fresh-color panel-danger">
		             	<div class="panel-heading"><i class="icon fa fa-user fa-2x"> Dosen</i></div>
	                   	<div class="panel-body">
		                    	<div class="sub-title" align="center"><H2><b><?php $jumlah_dosen=$this->m_dosen->jumlah_dosen()->num_rows();
		                    		echo $jumlah_dosen;?></b></H2>
	                		</div>
                		</div>
	            	</div>		            
         		</div>
         		 <div class="col-sm-4">
	                <div class="panel fresh-color panel-warning">
		             	<div class="panel-heading"><i class="icon fa fa-user fa-2x"> Tata Usaha</i></div>
	                   	<div class="panel-body">
		                    	<div class="sub-title" align="center"><H2><b><?php $jumlah_tu=$this->m_tata_usaha->jumlah_tu()->num_rows(); 
		                    		echo $jumlah_tu;?></b></H2>
	                		</div>
                		</div>
	            	</div>		            
         		</div>
				 <div class="col-sm-4">
	                <div class="panel fresh-color panel-info">
		             	<div class="panel-heading"><i class="icon fa fa-user fa-2x"> Mahasiswa</i></div>
	                   	<div class="panel-body">
		                    	<center><H2><b><?php $jumlah_mhs=$this->m_mahasiswa->jumlah_mhs()->num_rows();
		                    		echo $jumlah_mhs;?></b></H2></center>
	                		</div>
                		</div>
	            	</div>		            
         		</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div id="pie"></div> 
				</div>
				<div class="col-sm-6">
					<div id="serial"></div> 
				</div>
			</div>
		</div>
	</div>
</div>	
<script>
  
var chart = AmCharts.makeChart( "pie", {
  "type": "pie",
  "theme": "light",
  "titles": [{
		"text": "Mahasiswa Yang Melakukan Poling", 
		"color": "#0a0", 
		"size": 24, 
		"url": "#" //custom url property to simplify the click event setup
  }],
  "dataProvider": [ {
    "mahasiswa": "Mahasiswa <br> Sudah Menilai",
    "jumlah": <?php echo $sudah ?>
  }, {
    "mahasiswa": "Mahasiswa <br> Belum Menilai",
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
<script>
var chart = AmCharts.makeChart("serial",
{
    "type": "serial",
    "theme": "light",
    "titles": [{
		"text": "Perolehan Nilai Dosen Terbaik Tahun Ajaran <?php echo date('Y') ?>", 
		"color": "#0a0", 
		"size": 20, 
		"url": "#" //custom url property to simplify the click event setup
  }],
    "dataProvider": [
    	<?php foreach ($topdosen as $key) {?>
    	{
        "name": "<?php echo $key->nama_dosen ?>",
        "points": <?php echo $key->nilai ?>,
        "color": "#<?php echo str_pad( dechex( mt_rand( 0, 255 ) ), 3, '0', STR_PAD_LEFT); ?>",
        "bullet": "https://www.amcharts.com/lib/images/faces/A04.png"
    },<?php } ?> ],
    "valueAxes": [{
        "maximum": 100,
        "minimum": 0,
        "axisAlpha": 0,
        "dashLength": 4,
        "position": "left"
    }],
    "startDuration": 1,
    "graphs": [{
        "balloonText": "<span style='font-size:13px;'>[[category]]: <b>[[value]]</b></span>",
        "bulletOffset": 10,
        "bulletSize": 52,
        "colorField": "color",
        "cornerRadiusTop": 8,
        "customBulletField": "bullet",
        "fillAlphas": 0.8,
        "lineAlpha": 0,
        "type": "column",
        "valueField": "points"
    }],
    "marginTop": 0,
    "marginRight": 0,
    "marginLeft": 0,
    "marginBottom": 0,
    "autoMargins": false,
    "categoryField": "name",
    "categoryAxis": {
        "axisAlpha": 0,
        "gridAlpha": 0,
        "inside": true,
        "tickLength": 0
    },
    "export": {
    	"enabled": true
     }
});
</script>
			