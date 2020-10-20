<script src="<?php echo base_url('assets/pluggins/filesaver') ?>/FileSaver.min.js"></script>
<script>
     $(document).on('click', '#excel', function (e) {
		var vTitleXXX = 'ABCD';
		var vEncodeHead = '<html><head><meta charset="UTF-8"></head><body>';
		var vReportName = '';
		 var Qlik = new Blob([vEncodeHead +vReportName  + $('#toPrint').html() + '</body></html>'], {
				type: "application/vnd.ms-excel;charset=utf-8"
		 });

		 saveAs(Qlik, "<?php echo @$namaFile."-".date('Y-m-d H:i:s')?>.xls");
		
	});
</script>