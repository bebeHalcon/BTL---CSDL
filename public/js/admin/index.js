$("#tab-admin")
    .DataTable({
        // dom: "Bfrtip", //Thêm dom vào thì nó sẽ hiện đồng thời giữa language và bottom
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        language: {
            url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json",
        },
    })

$(".btn-edit").click(function (e) {
    var username = $(this).data("username");
    // console.log(username);
    $("#EditAdminModal input[name='username']").val(username);
    $('#EditAdminModal').modal('show');
});



$(".btn-delete").click(function (e) {
    var username = $(this).data("username");
    //console.log(username);
    $("#DeleteAdminModal input[name='username']").val(username);
    $('#DeleteAdminModal').modal('show');
});