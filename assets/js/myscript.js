//sweet alert success
const flashData = $('.flash-data').data('flashdata');

if (flashData) {
	Swal.fire({
  type: 'success',
  title: '' + flashData,
  showConfirmButton: false,
  timer: 1500
})
}

//sweet alert gagal
const flashdatagagal = $('.flashdatagagal').data('flashdata');
if (flashdatagagal) {
	Swal.fire({
  type: 'error',
  title: '' + flashdatagagal
})
}
///=====> input user
$('#hiden-kelas').hide();
$('#btn-hiden').hide();
$('#btn-show').show();
$('#nis-show').show();
$('#user').change(function(){
	var user = $('#user').val();
	if (user == 'Murid') 
	{
		$('#tambah').show();
		$('#hiden-kelas').show();
		$('#show-kelas').show();
		$('#nama-hiden').hide();
		$('#nama-show').hide();
		$('#btn-hiden').hide();
		$('#btn-show').hide();
		$('#nis-show').hide();
		$('#nis-hiden').hide();
		$('#kelas').attr('required',true);
	} else if (user =='Guru') {
		$('#kelas').removeAttr('required',true);
		$('#hiden-kelas').hide();
		$('#show-kelas').hide();
		$('#nis-hiden').show();
		$('#nis-show').show();
		$('#nama-hiden').hide();
		$('#nama-show').hide();
		$('#btn-show').hide();
		$('#btn-hiden').hide();

		$.ajax({
			cache:false,
			url:"guru_list",
			data:{user:user},
			type:"POST",
			success:function(data){
				$('#nis').html(data);
			},
		});
	}
});


$('#nis-hiden').hide();
$('#kelas').change(function(){
	var kelas = $('#kelas').val();
	if (kelas != '') {
		$('#nis-hiden').show();
		$('#nis-show').show();
		$('#nama-hiden').hide();
		$('#nama-show').hide();
		$('#btn-hiden').hide();
		$('#btn-show').hide();
		$.ajax({
			cache:false,
			url:"murid_list",
			data:{kelas:kelas},
			type:"POST",
			success:function(data){
				$('#nis').html(data);
			},
		});
	} else {
		$('#nis-hiden').hide();
		$('#nis-show').hide();
		$('#nama-hiden').hide();
		$('#nama-show').hide();
		$('#btn-show').hide();
		$('#btn-hiden').hide();
	}
});



$('#nama-hiden').hide();
$('#nama-show').show();
$('#nis').change(function(){
	var nis = $('#nis').val();
	if (nis !='') {
		$('#nama-hiden').show();
		$('#nama-show').show();
		$('#btn-hiden').show();
		$('#btn-show').show();
		$.ajax({
			cache:false,
			url:"nama_admin",
			data:{nis:nis},
			type:"POST",
			dataType:"json",
			success:function(data){
				$('#nama').val(data.nama);
			},
		});
	} else {
		$('#nama').val('');
		$('#nama-hiden').hide();
		$('#nama-show').hide();
		$('#btn-show').hide();
		$('#btn-hiden').hide();
	}
});
/// ===== > end input user


//// form upload

$('#kelastm').change(function(){
	var kelas = $('#kelastm').val();
	if (kelas != "") {
		$('#mapelup').removeAttr('readonly',true);
		$.ajax({
			cache:false,
			url:"mapel_list",
			data:{kelas:kelas},
			type:"POST",
			success:function(data){
				$('#mapelup').html(data);
			},
		});
	} else{
		var kosong = "<option value=''></option>";
		$('#mapelup').html(kosong);
		$('#mapelup').attr('readonly',true);
	}
});
//// end form upload