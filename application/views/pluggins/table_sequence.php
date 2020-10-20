<script>
    // $("table tr").hide();
    // $("table tr").each(function(index) {
        // $(this).delay(index * 500).show(1000);
    // });
	</script>
	<script>
// $("tr:not(:first-child)").each(function (index ) {
   // $(this).css('animation-delay',index *0.1 +'s');
// });  
</script>
<style>
	table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}
 tr:not(:first-child){    
  opacity: 0;
  animation-name: fadeIn;
  animation-duration: 3s;
  animation-iteration-count: 1;
  animation-fill-mode: forwards;
}
@keyframes fadeIn {
  from {
    opacity: 0;
  }
  
  to {
    opacity: 1;
  }
}
</style>