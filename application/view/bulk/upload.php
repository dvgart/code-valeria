<div class="container">
    <h1>BulkController/upload</h1>

    <div class="box">
    
        <!-- echo out the system feedback (error and success messages) -->
        <?php
           
            $this->renderFeedbackMessages();

        ?>


        <form action="<?php echo Config::get('URL'); ?>bulk/bulk_action" method='post' enctype="multipart/form-data">
        	Upload CSV: <input type="file" name="file" />
            <input type="submit" name='btn_submit' value='Uplaod CSV'>
        </form>

    </div>   
        
</div>