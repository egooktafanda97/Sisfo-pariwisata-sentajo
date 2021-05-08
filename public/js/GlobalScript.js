// const loadingPage = $('.page-loader-wrapper');

function responseReload(ress,msg = "Berhasil"){
	if(ress.error == false || ress.error == 0){
		swal({
			text: msg,
			icon: "success"
		}).then((value) => {
			location.reload();
			return true;
		});
	}else{
		swal({
			text: "Maaf Sepertinya ada kesalahan",
			icon: "error"
		}).then((value) => {
			return false;
		});

	}
}

function getDesa(data,res){
	$.ajax({
		url: base_url+"/getDesa",
		dataType: 'json',
		data: data,
		type: 'post',
		success: function(response) {
			res(response);
		}
	});
}