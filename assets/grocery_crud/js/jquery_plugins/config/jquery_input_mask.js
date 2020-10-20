//ketika direfresh browser
$(function () {
	loadRupiah();
	loadNomorPisah();

});
//ketika diajax
$(document).on("ajaxComplete", function (e) {
	loadRupiah();
	loadNomorPisah();
});
function loadRupiah() {
	$('.rupiah').inputmask("numeric", {
		radixPoint: ",",
		groupSeparator: ".",
		digits: 2,
		autoGroup: true,
		autoUnmask: true,
		prefix: 'Rp ', //No Space, this will truncate the first character
		rightAlign: false,
		oncleared: function () { self.Value(''); }
	});
}
function loadNomorPisah() {
	$('.nomor_pisah').inputmask("numeric", {
		radixPoint: ",",
		groupSeparator: ".",
		digits: 2,
		autoUnmask: true,
		autoGroup: true,
		prefix: '', //No Space, this will truncate the first character
		rightAlign: false,
		oncleared: function () { self.Value(''); }
	});
}

