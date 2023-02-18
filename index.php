<?php
require "config.php";
$sql = "SELECT * FROM posts";
$select = $conn->query($sql);
$rows = $select->fetchAll(PDO::FETCH_OBJ);





?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Like and Dislike System</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="" crossorigin="anonymous">
  <script>
    function UpdateRecord(Id, val){

      $.ajax({

        type: "POST",
        url: "update.php",
        data: "Id="+Id+"&val="+val,
        cache: false
      });

    }
  </script>
  
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
               <?php foreach($rows as $row) : ?>    
              <div class="card mt-5" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row->title; ?></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                       <?php if ($row->likes == 0) :?>
                        <button class="btn btn-primary mr-5"  onClick="UpdateRecord(<?php echo $row->Id; ?>, <?php echo $row->likes + 1; ?>)">like</button><span><?php echo $row->likes; ?></span> 
                        <?php else : ?>
                        <button class="btn btn btn-light text-primary mr-5"  onClick="UpdateRecord(<?php echo $row->Id; ?>, <?php echo $row->likes - 1; ?>)">liked</button><span><?php echo $row->likes; ?></span>
                        <?php endif; ?>
                        
                    </div>
              </div>
              <br>
              <?php endforeach; ?>

              </div>
                      
            </div>
       </div>
    </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>      
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" ></script>

  <script>
    //jquery code; to get final result without refresh.
    $(document).ready(function(){
       $("button").click(function(){
         if($(this).text() == "like"){
          $(this).text("liked");
         }else{
          $(this).text("like");
         }

         function withoutRef(){
          setInterval(function() {
            $("body").load("index.php");
          }, 1000);
         }

         withoutRef();

       });
    });
    </script>

</body>
</html>