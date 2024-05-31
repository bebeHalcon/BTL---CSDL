<?php
require_once('controllers/admin/base_controller.php');
require_once('models/room.php');
require_once('models/building.php');


class RoomsController extends BaseController
{
	function __construct()
	{
		$this->folder = 'rooms';
	}

	public function index()
	{
        $rooms = Room::getAll();
        $buildings = Building::getAll();
        $data = array('rooms' => $rooms, "buildings" => $buildings);
        $this->render('index', $data);
	}
    public function add(){
        $id = (string)date("Y_m_d_h_i_sa");
        $fileuploadname = (string)$id;
        $name = $_POST['name'];
        $description = $_POST['description'];
        $content = $_POST['content'];
        $target_dir = "public/img/products/";
        $path = $_FILES['fileToUpload']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        $fileuploadname .= ".";
        $fileuploadname .= $ext;
        $target_file = $target_dir . basename($fileuploadname);
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
        }
        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Allow certain file formats
        if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
        && $fileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $upload_ok = 0;
        }
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
        }
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        Room::insert($name, 0, $description, $content, $target_file);
        header('Location: index.php?page=admin&controller=rooms&action=index');
    }
    public function edit(){
        $id = $_POST['id'];
        $code = (string)date("Y_m_d_h_i_sa");
        $fileuploadname = (string)$code;
        $name = $_POST['name'];
        $description = $_POST['description'];
        $content = $_POST['content'];
        $urlcurrent = Room::get((int)$id)->img;
        if (!isset($_FILES["fileToUpload"]) || $_FILES['fileToUpload']['tmp_name'][0] == "")
        {
            Room::update($id, $name, 0, $description, $content, $urlcurrent);
            echo "Dữ liệu upload bị lỗi";
            header('Location: index.php?page=admin&controller=rooms&action=index');
            die;
        }
        else{
            $target_dir = "public/img/products/";
            $path = $_FILES['fileToUpload']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $fileuploadname .= ".";
            $fileuploadname .= $ext;
            $target_file = $target_dir . basename($fileuploadname);
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
            }
            $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Allow certain file formats
            if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
            && $fileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $upload_ok = 0;
            }
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
            }
            $file_pointer = $urlcurrent;
            unlink($file_pointer);
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
            Room::update($id, $name, 0, $description, $content, $target_file);
            header('Location: index.php?page=admin&controller=rooms&action=index');
        }
    }
    public function delete(){
        $id = $_POST['id'];
        $urlcurrent = Room::get((int)$id)->img;
        unlink($urlcurrent);
        Room::delete($id);
        header('Location: index.php?page=admin&controller=rooms&action=index');
    }
}
