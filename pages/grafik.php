<link rel="stylesheet" href="assets/css/jack-morris.css">
<script src="assets/js/jack-morris.js" charset="utf-8"></script>
<body>
   <?php if ($hak_akses == 'member'): ?>
      <h1>Proyek Aplikasi Per Bulan Saya</h1>
   <?php elseif ($hak_akses != 'member'): ?>
      <h1>Proyek Aplikasi Per Bulan Semua</h1>
   <?php endif; ?>
    <div id="graph" class="graph">
    </div>
    <div id="code">
      <?php if ($hak_akses == 'member'): ?>
         <?php $appdate = $table->viewpermonth_id('data_aplikasi',$id_user); ?>
      <?php elseif ($hak_akses != 'member'): ?>
         <?php $appdate = $table->viewpermonth_all('data_aplikasi'); ?>
      <?php endif; ?>
      <script type="text/javascript">
      var month_data = [
      </script>
      <?php foreach($appdate as $key => $rmonth ){ ?>

      <script type="text/javascript">
      {"period":"<?= $rmonth['bulan']?>", "permonth": "<?= $rmonth['jumlah_bulanan']?>"},
      </script>

      <?php } ?>

      <script type="text/javascript">
      ];
      Morris.Line({
         element: 'graph',
         data: month_data,
         xkey: 'period',
         ykeys: ['permonth'],
         labels: ['Total App Per Bulan'],
         smooth: false
      });
      </script>

	</div>
</body>
