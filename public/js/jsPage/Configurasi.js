// url________________
const apiMenu = base_url+'/api/Menu';
// ___________________

(function(){

// visibiliti
$('#create_nav').show();
$('#create_hak_akses').hide();
// -------------------------


})();

let onClickActive = (act) =>{
	$('.child-conf').hide();
	$('#'+act).show();
}

$('.btn-li').click(function() {
	$('.btn-li').removeClass('active');
	$(this).addClass('active');
	console.log(apiMenu)
});

// $('#form-add-navigasi').submit(function(e) {
// 	e.preventDefault();
// 	$.ajax({
// 		type : "POST",
// 		url  : apiAddMenu,
// 		data : $(this).serialize(),
// 		success: function(response){
// 			console.log(response);
// 		}
// 	}); 
// });


