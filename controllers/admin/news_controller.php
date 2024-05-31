<?php
require_once('controllers/admin/base_controller.php');
require_once('models/news.php');
require_once('models/employee.php');


class NewsController extends BaseController
{
	function __construct()
	{
		$this->folder = 'news';
	}

	public function index()
	{
        $news = News::getAll();
        $managers = Employee::getAllManagers();
        $data = array('news' => $news, "managers" => $managers);
        $this->render('index', $data);
	}
    public function add(){
        $Title = $_POST['title'];
        $Content = $_POST['content'];
        $Mgr_ID = $_POST['CCCD_number'];
        News::insert($Title, $Content, $Mgr_ID);
        header('Location: index.php?page=admin&controller=news&action=index');
    }
    public function edit(){
        $id = $_POST['id'];
        $Title = $_POST['title'];
        $Content = $_POST['content'];
        News::update($id, $Title, $Content);
        header('Location: index.php?page=admin&controller=news&action=index');
    }
    public function delete(){
        $id = $_POST['id'];
        News::delete($id);
        header('Location: index.php?page=admin&controller=news&action=index');
    }
    public function hide(){
        
    }
}
