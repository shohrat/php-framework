<?php // Created by Bayramklychov Shohrad ?>
<?php require APPROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>
<div class="row mb-3">
    <div class="col-md-6">
        <h1>Posts</h1>
    </div>

    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i>
            Add Post
        </a>
    </div>
</div>
<?php foreach($data['posts'] as $post): ?>

    <div class="card card-body mb-3">
        <h4 class="card-title"><?php echo $post->title; ?></h4>
        <div class="bg-light p-2 mb-3">
            written by <?php echo $post->name; ?> on <?php echo $post->postCreated; ?>
        </div>

        <p class="card-text">
            <?php 
              $body = base64_decode($post->body);
              if (strlen($body)> 200){
                $pos = mb_strpos($body, ' ', 200);
              }
              if(!$pos) {
                $pos = 200;
              }
              echo mb_substr(base64_decode($post->body), 0, $pos).'...'; 
            ?>
        </p>

        <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-dark">More</a>
    </div>

<?php endforeach; ?>

<!-- ////////////////////////////Pagination ///////////////////////////////////-->
<?php 
$total_pages = ceil($data['total_rows']->count / $data['limit_posts']); 
$prev = $_GET['page']-1;
$next = $_GET['page']+1;
?>
<nav aria-label="Page navigation">
  <ul class="pagination justify-content-center">
  <!-- Prev -->
  <?php if($prev < 1 ){ ?>
    <li class="page-item disabled">
      <span class="page-link" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
  </span>
    </li>
  <?php } else { ?>
    <li class="page-item">
      <a class="page-link" href="?page=<?=$prev;?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
      </a>
    </li>
  <?php } ?>  
<!-- page numbers -->
    <?php for($i=1; $i<=$total_pages; $i++): ?>
        <?php if($i==$_GET['page']){ ?>    
        <li class="page-item active">
            <span class="page-link">
                <?php echo $i; ?>
                <span class="sr-only">(current)</span>
            </span>
        </li>
        <?php } else {?>
        <li class="page-item">
            <a class="page-link" href="<?php echo URLROOT; ?>/posts/index.php?page=<?=$i; ?>">
                <?php echo $i; ?>
            </a>
        </li>
        <?php } ?>    
    <?php endfor; ?>
<!-- End page numbers -->
<?php if ($next > $total_pages) {?>
    <li class="page-item disabled">
      <span class="page-link" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
       </span>
    </li>
<?php } else {?>
    <li class="page-item">
      <a class="page-link" href="?page=<?=$next;?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
      </a>
    </li>
<?php } ?>    
  </ul>
</nav>
<!-- ////////////////////////End pagination///////////////////////// -->

<?php require APPROOT . '/views/inc/footer.php'; ?>
