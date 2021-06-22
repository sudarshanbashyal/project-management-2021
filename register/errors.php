<?php
                if (count($errors) > 0) :
 ?>
    <div class= "error">
        <?php 
        foreach ($errors as $error) : 
        ?>
          <p><?php echo $error ?></p>
        <?php endforeach ?>
    </div>
  <?php  endif  ?>
  <?php
                if (count($successs) > 0) :
 ?>
    <div class= "success">
        <?php 
        foreach ($successs as $success) : 
        ?>
          <p><?php echo $success ?></p>
        <?php endforeach ?>
    </div>
  <?php  endif  ?>