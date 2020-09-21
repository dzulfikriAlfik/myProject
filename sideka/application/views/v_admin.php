<?php 	
	$logo_desa = $konten_logo->konten_logo_desa;
	//$logo_kabupaten = $konten_logo->konten_logo_kabupaten;
?>
<div class="row">
		<div class="col-md-6">
			<h3>Selamat Datang <b>Administrator</b></h3>
			<legend></legend>
		</div>
		<div class="col-md-6" >
					
		</div>
		
		<div class="col-md-12">
			<a href="<?php echo site_url('admin/c_dusun/');?>">
				<button type="button" class="btn btn-success"><i class="fa fa-eye fa-fw"></i> Lihat Data Dusun</button>
			</a>
			<a href="<?php echo site_url('admin/c_ped_pertanian/');?>">
				<button type="button" class="btn btn-success"><i class="fa fa-eye fa-fw"></i> Lihat Data Pertanian</button>
			</a>		
		</div>
	</div>
	<br>
<div class="row">	

		
		
	<div class="col-md-6" id="keluarga" style="margin: 0 auto;"></div>
	<div class="col-md-6" id="penduduk" style="margin: 0 auto;"></div>
			
		
		
		
</div>
		
		
	</div>
	<!-- /.row -->
     

<script type="text/javascript">
$(function () {

    // Radialize the colors
    Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
        return {
            radialGradient: { cx: 0.5, cy: 0.3, r: 0.7 },
            stops: [
                [0, color],
                [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
            ]
        };
    });

   $('#keluarga').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Statistik Desa'
        },
        subtitle: {
            text: 'Berdasarkan Jenis Kelamin Kepala Keluarga'
        },
        xAxis: {
            categories: [
                'Kepala Keluarga'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Kepala Keluarga'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} KK</b></td></tr>',
            footerFormat: '</table>',
            shared: false,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Laki Laki',
            data: [
					<?php echo $jumlah_kk_laki ; ?>
				]

        }, {
            name: 'Perempuan',
            data: [
					<?php echo $jumlah_kk_perempuan ; ?>
				]

        } ]
		
    });
	
	 $('#penduduk').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: 'Grafik Statistik Desa'
        },
		subtitle: {
				text: 'Berdasarkan Jenis Kelamin Pendudukan'
		},
        tooltip: {
            //pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
			headerFormat: '<span style="font-size:10px">{point.key}: {point.percentage:.1f}%</span><table><br>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} Jiwa</b></td></tr>',
            footerFormat: '</table>',
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    },
                    connectorColor: ''
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'sebanyak',
            data: [
					['L ',<?php echo $jumlah_penduduk_laki ; ?>],
					['P ',<?php echo $jumlah_penduduk_perempuan ; ?>]
						
				]            
       
	   }]
    });
});

	
</script>



</script>

<script>
function nav_active(){
	document.getElementById("a-admin").className = "collapsed active";
	}
 
// very simple to use!
$(document).ready(function() {
  nav_active();
});
</script>

<script type="text/javascript" src="<?php echo base_url(); ?>assetku/highchart/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assetku/highchart/highcharts-3d.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assetku/highchart/exporting.js"></script>