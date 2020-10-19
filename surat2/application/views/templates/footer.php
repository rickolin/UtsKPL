<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="<?php echo base_url().'assets/css/js/bootstrap-datepicker.js';?>"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


<script type="text/javascript">
	$(function () {
  		$('[data-toggle="tooltip"]').tooltip();
	});
</script>

<script type="text/javascript">
	$('#myModal').on('shown.bs.modal', function () {
  		$('#myInput').trigger('focus');
	});
</script>

 <script type="text/javascript">
            $(document).ready(function () {
                $('.tanggal').datepicker({
                    format: "yyyy-mm-dd",
                    autoclose:true
                });
            });
  </script>

  <script type="text/javascript">
  Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#858796';

  var ctx = document.getElementById('chart').getContext('2d');
  var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
        datasets: [{
            label: 'Surat Masuk',
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [<?php
            if (count($jumlah_surat_masuk_perbulan)>0) {
              foreach ($jumlah_surat_masuk_perbulan as $data) {
                echo "'" .$data['jumlah'] ."',";
              }
            }
              ?>]
            },
            {
            label: 'Surat Disetujui',
            lineTension: 0.3,
            backgroundColor: "rgba(173, 255, 47, 0.05)",
            borderColor: "rgba(173, 255, 47, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(173, 255, 47, 1)",
            pointBorderColor: "rgba(173, 255, 47, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(173, 255, 47, 1)",
            pointHoverBorderColor: "rgba(173, 255, 47, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [<?php
            if (count($jumlah_surat_disetujui_perbulan)>0) {
              foreach ($jumlah_surat_disetujui_perbulan as $data) {
                echo "'" .$data['jumlah'] ."',";
              }
            }
              ?>]
            },
            {
            label: 'Surat Disetujui Bersyarat',
            lineTension: 0.3,
            backgroundColor: "rgba(255, 215, 0, 0.05)",
            borderColor: "rgba(255, 215, 0, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(255, 215, 0, 1)",
            pointBorderColor: "rgba(255, 215, 0, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(255, 215, 0, 1)",
            pointHoverBorderColor: "rgba(255, 215, 0, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [<?php
            if (count($jumlah_surat_disetujui_bersyarat_perbulan)>0) {
              foreach ($jumlah_surat_disetujui_bersyarat_perbulan as $data) {
                echo "'" .$data['jumlah'] ."',";
              }
            }
              ?>]
            },
            {
            label: 'Surat Ditangguhkan',
            lineTension: 0.3,
            backgroundColor: "rgba(255, 69, 0, 0.05)",
            borderColor: "rgba(255, 69, 0, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(255, 69, 0, 1)",
            pointBorderColor: "rgba(255, 69, 0, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(255, 69, 0, 1)",
            pointHoverBorderColor: "rgba(255, 69, 0, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: [<?php
            if (count($jumlah_surat_ditangguhkan_perbulan)>0) {
              foreach ($jumlah_surat_ditangguhkan_perbulan as $data) {
                echo "'" .$data['jumlah'] ."',";
              }
            }
              ?>]
            }
            ]
    },
    // Configuration options go here
    options: {
      maintainAspectRatio: false,
      layout: {
        padding: {
          left: 10,
          right: 25,
          top: 25,
          bottom: 0
        }
      }
    }
});
 </script>

  </body>
</html>