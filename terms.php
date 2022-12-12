<?php 
include('./component/header.php');
include('./component/elsemenu.php');
$args_privacy = mysqli_query($dbconnect,"SELECT content FROM page_terms");
$assoc = mysqli_fetch_assoc($args_privacy);
?>
<main>
<section id="page_content_privacy" class="page_content_privacy">
<div class="header_content">
    <div class="container">
      <div class="row_item align_item">
        <div class="content_privacy">
            <?php echo $assoc['content'];?>
        </div>           
      </div>
    </div>
</div>
</section>
</main>
<?php include('./component/footer.php'); ?>