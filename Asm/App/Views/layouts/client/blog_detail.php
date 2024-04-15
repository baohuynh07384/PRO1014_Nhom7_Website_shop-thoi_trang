<?php include "header.php" ?>
<?php use App\Controllers\ClientHomeController; ?>
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="section-title">
             
                <h5 class="title"><?= $data['title']  ?></h5>
            </div>
           <p>
            <?= $data['content']  ?>
           </p>

        </div>
       
    </div>
    <!-- /container -->
</div>
<?php include "footer.php" ?>