<div class="reply">
    <h4> <?php echo $data['name']; ?> </h4>
    <p> <?php echo $data['date']; ?> </p>
    <p> <?php echo $data['comment']; ?> </p>

    <?php $reply_id = $data['id']; ?>
    <button class="reply" onclick= "reply(<?php echo $reply_id; ?>, '<?php echo $data['name']; ?>') ; openForm() ; scrollToTop()" > <h6 class="repz">Reply</h6></button>
    
    <?php 
    unset($datas);
    $datas = mysqli_query($conn, "SELECT * FROM tb_data WHERE reply_id = $reply_id");
    if(mysqli_num_rows($datas) > 0){
        foreach($datas as $data){
            require 'reply.php';
        }
    }
    ?>

</div>

