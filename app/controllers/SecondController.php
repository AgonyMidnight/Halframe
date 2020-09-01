<?php
namespace Controllers;
use Core\Controller;
use Models\SecondModel;
class SecondController extends Controller
{
    public function index()
    {
        $date = (new SecondModel)->getTable($_GET['url']);
        $this->view('secondPage/secondPage', $date);
    }
}