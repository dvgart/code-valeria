<?php 

class BulkController extends Controller
{
    /**
     * Construct this object by extending the basic Controller class
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function upload()
    {
        $this->View->render('bulk/upload', array('file'=>BulkModel::upload_csv()));
    }

    public function bulk_action()
    {
        $bulk_successful = BulkModel::upload_csv();

        if($bulk_successful){
           Redirect::to('bulk/uploaded');
        }else{
        	Redirect::to('bulk/upload');
        }
    }

    public function uploaded()
    {
        $this->View->render('bulk/uploaded');

    }

    

   
      
}