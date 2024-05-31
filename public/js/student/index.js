$("#tab-student").DataTable({
    responsive: false,
    lengthChange: false,
    autoWidth: false,
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json",
    },
    pageLength: 10
});

$(".btn-edit").click(function (e) {
    var id = $(this).data("id");
    $("#EditStudentModal input[name='id']").val(id);
    $('#EditStudentModal').modal('show');
});

$(".btn-delete").click(function (e) {
	var id = $(this).data("id");
	$("#DeleteStudentModal input[name='id']").val(id);
	$('#DeleteStudentModal').modal('show');
})