<?php 

class BulkModel {

	public static function upload_csv(){

		if(isset($_POST['btn_submit']) && $_POST['btn_submit'] !=""){

			if(empty($_FILES['file']['name'])){
                 Session::add('feedback_negative', Text::get('FEEDBACK_FILE_IS_NOT_CHOSEN'));
                 return false;
			}else{
		
			    $filename = explode('.', $_FILES['file']['name']);

				if($filename[1] != "csv"){
	                Session::add('feedback_negative', Text::get('FEEDBACK_CSV_FILE_INVALID'));
	                return false;
				}else{

				    $file = fopen($_FILES['file']['tmp_name'], 'r');
				    $user_id =  Session::get('user_id');

                    while($data=fgetcsv($file)){

                        $name = $data[0];
                        $value = $data[1];
                        $database = DatabaseFactory::getFactory()->getConnection();
                        $sql = "INSERT INTO csv_data (id, user_id, name, value)
                        VALUES (:id, :user_id, :name, :value)";

                        $query = $database->prepare($sql);

                        $query->execute(array(
                        	":id"=>null,
                        	":user_id"=>$user_id,
                        	":name"=>$name,
                        	":value"=>$value
                        ));
                    }

					Session::add('feedback_positive', Text::get('FEEDBACK_FILE_UPLOADED'));
					return true;
				}

			}
		}
		return false;
	}


	public static function getAllCsv(){
		$database = DatabaseFactory::getFactory()->getConnection();

        $sql = "SELECT * FROM csv_data ORDER BY user_id ASC";

        $query = $database->prepare($sql);
        $query->execute();
      
        $result = $query->fetchAll();
        
        return $result; 

    }
}