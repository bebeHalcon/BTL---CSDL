$('#TAB-bill').DataTable({
    "responsive": true, "lengthChange": false, "autoWidth": false,
    language: {
        url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json"
    } ,
    columnDefs: [
        { orderable: false,
             targets: 6
            }
      ]
    }).buttons().container().appendTo('#TAB-bill_wrapper .col-md-6:eq(0)');
    $("#form-add-student").submit(function (e) {
        e.preventDefault();
      
        //Write code to check if student id is existed!
        //Camel case
        var form = $(this);
        var title = $("#form-add-student input[name='title']").val();
        var description = $("#form-add-student textarea[name='description']").val();
        var content = $("#form-add-student textarea[name='content']").val();
        if (title == "" || description == "" || content == "" ) {
          $(document).Toasts("create", {
            class: "bg-danger",
            title: "Quản lý",
            subtitle: "Library",
            body: "Bạn phải nhập đầy đủ thông tin",
          });
        } else {
          form.unbind("submit").submit();
            $(document).Toasts("create", {
                class: "bg-success",
                title: "Quản lý",
                subtitle: "Library",
                body: "Bạn Thêm mới thành công",
              });
              form.unbind("submit").submit();
              setTimeout(function () {
              }, 1000);
    
        }
      
        //     if (data.status == "FOUND") alert("Đã tồn tại mã số sinh viên này!");
      });
$(".btn-edit").click(function (e) {
    var id = $(this).data("id");

    var description = $(this).data("description");
    var content = $(this).data("content");
    var title = $(this).data("title");
    // console.log(title);
    $("#EditStudentModal input[name='id']").val(id);
    $("#EditStudentModal textarea[name='description']").val(description);
    $("#EditStudentModal textarea[name='content']").val(content);
    $("#EditStudentModal input[name='title']").val(title);
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
