
<div class="slidersection templete clear">
        <div id="slider">
        <?php
         $getAllslider = $pt->ALLSliderFont();
         if ($getAllslider) {
         	while ($result = $getAllslider->fetch_assoc()) {
         	

?>
            <a href="#"><img src="admin/<?php echo $result['image'];?>" alt="nature 1" title="<?php echo $result['title'];?>" /></a>
            
        <?php } }?>
        </div>

</div>