$(".btn-edit").click(function (e) {
    var id = $(this).data("id");
    var content = $(this).data("content");
    // console.log(content);
    $("#EditStudentModal input[name='id']").val(id);
    $("#EditStudentModal input[name='title']").val(content);
    $('#EditStudentModal').modal('show');
});

$(".btn-delete").click(function (e) {
    var id = $(this).data("id");
    $("#DeleteStudentModal input[name='id']").val(id);
    $('#DeleteStudentModal').modal('show');
});
$(".btn-hide").click(function (e) {
    var id = $(this).data("id");
    $("#HideStudentModal input[name='id']").val(id);
    $('#HideStudentModal').modal('show');
});