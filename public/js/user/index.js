$("#tab-user").DataTable({
	// dom: "Bfrtip", //Thêm dom vào thì nó sẽ hiện đồng thời giữa language và bottom
	responsive: true,
	lengthChange: false,
	autoWidth: false,
	language: {
		url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json",
	},
});

$(function () {
	$('[data-toggle="tooltip"]').tooltip();
});

$(".btn-edit").click(function (e) {
	var email = $(this).data("email");
	var fname = $(this).data("fname");
	var lname = $(this).data("lname");
	var gender = $(this).data("gender");
	var age = $(this).data("age");
	var phone = $(this).data("phone");
	var img = $(this).data("img");
	// console.log(email, fname, lname, gender, age, phone);
	$("#EditUserModal input[name='email']").val(email);
	$("#EditUserModal input[name='fname']").val(fname);
	$("#EditUserModal input[name='lname']").val(lname);
	if (gender)
		$("#EditUserModal #Nam").prop(
			"checked",
			true
		); //Search checked input radio jquery
	else $("#EditUserModal #Nu").prop("checked", true);
	$("#EditUserModal input[name='age']").val(age);
	$("#EditUserModal input[name='phone']").val(phone);
	$("#EditUserModal input[name='img']").val(img);
	$("#EditUserModal").modal("show");
});

$(".btn-changepass").click(function (e) {
	var email = $(this).data("email");
	$("#EditPassModal input[name='email']").val(email);
	$("#EditPassModal").modal("show");
});

$(".btn-delete").click(function (e) {
	var email = $(this).data("email");
	var img = $(this).data("img");
	$("#DeleteUserModal input[name='email']").val(email);
	$("#DeleteUserModal input[name='img']").val(img);
	$("#DeleteUserModal").modal("show");
});
