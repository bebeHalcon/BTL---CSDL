$("#tab-employee")
  .DataTable({
    responsive: true,
    lengthChange: false,
    autoWidth: false,
    language: {
      url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json",
    },
    columnDefs: [{ orderable: false, targets: 6 }],
  })
  .buttons()
  .container()
  .appendTo("#tab-employee_wrapper .col-md-6:eq(0)");


$("#form-add-student").submit(function (e) {
  e.preventDefault();

  var name = $("#form-add-student input[name='name']").val();
  var price = $("#form-add-student input[name='price']").val();
  var description = $("#form-add-student textarea[name='description']").val();
  var content = $("#form-add-student textarea[name='content']").val();

  var url = $("#fileToUpload").val();
  var length = url.length;
  var form = $(this);
  var a = url[length - 1];
  var b = url[length - 2];
  var c = url[length - 3];
  var ext = c + b + a;
  if (name == "" || description == "" || content == "" || url == "") {
    $(document).Toasts("create", {
      class: "bg-danger",
      title: "Quản lý",
      subtitle: "Library",
      body: "Bạn phải nhập đầy đủ thông tin",
    });
  } else {
    if (price < 1000) {
      $(document).Toasts("create", {
        class: "bg-danger",
        title: "Quản lý",
        subtitle: "Library",
        body: "Bạn phải nhập giá lớn hơn 1000 đồng",
      });
    } else {
      if (ext == "jpg" || ext == "png" || ext == "jpeg" || ext == "gif") {
        $(document).Toasts("create", {
          class: "bg-success",
          title: "Quản lý",
          subtitle: "Library",
          body: "Bạn Thêm mới thành công",
        });
        form.unbind("submit").submit();
        setTimeout(function () {
        }, 1000);
      } else {
        $(document).Toasts("create", {
          class: "bg-danger",
          title: "Quản lý",
          subtitle: "Library",
          body: "Bạn phải gửi file định dạng ảnh",
        });
      }
    }
  }
});


$(".btn-edit").click(function (e) {
  var id = $(this).data("id");
  var name = $(this).data("name");
  var price = $(this).data("price");
  var description = $(this).data("description");
  var content = $(this).data("content");
  var img = $(this).data("img");
  $("#EditStudentModal input[name='id']").val(id);
  $("#EditStudentModal input[name='name']").val(name);
  $("#EditStudentModal input[name='price']").val(price);
  $("#EditStudentModal textarea[name='description']").val(description);
  $("#EditStudentModal textarea[name='content']").val(content);
  $("#EditStudentModal input[name='imggg']").val(img);
  $("#EditStudentModal").modal("show");
});

$(".btn-delete").click(function (e) {
	var id = $(this).data("id");
  console.log(id);
	$("#DeleteEmployeeModal input[name='id']").val(id);
	$('#DeleteEmployeeModal').modal('show');
})