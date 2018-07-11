<?php 

class bulkviewController extends Controller {

	public function __construct()
    {
        parent::__construct();
    }

	public function index()
    {
        $this->View->render('bulkview/index', array('csv_data'=>BulkModel::getAllCsv()));
        
    }
}