<div class="container">
    <h1>BulkController/upload</h1>

    <div class="box">
       
        <!-- echo out the system feedback (error and success messages) -->
        <?php
            //print_r($this->csv_data);
            
            $this->renderFeedbackMessages();
            
            

        ?>
         <table class="overview-table">
                <thead>
                <tr>
                	<td>user id</td>
                    <td>name</td>
                    <td>value</td>
                   
                </tr>
                </thead>
                <?php foreach($this->csv_data as $csv){
                 ?>	
                    <tr>
                    
            	        <td>
                    		<?php echo $csv->user_id; ?>
                        </td>
                    	<td>
                    		<?php echo $csv->name; ?>
                        </td>
                        <td>
                    		<?php echo $csv->value; ?>
                        </td>
                   </tr>
                    <?php
                    } ?> 
              
            </table>
    </div>   
        
</div>