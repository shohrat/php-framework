<?php // Created by Bayramklychov Shohrad ?>
<?php require APPROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
        <div class="card card-body bg-light mt-5">
        <?php flash('register_success'); ?>
            <h2>Add Post</h2>
            <p>Create a post with this form</p>
            <form action="<?php echo URLROOT; ?>/posts/add" method="post">

            <div class="form-group">
                    <label for="title">Title: <sup>*</sup></label>
                    <input type="title" name="title" id="send_title" class="form-control form-control-lg <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['title']; ?>">
                    <input type="hidden" id="send_user_id" value="<?php echo  $_SESSION['user_id']; ?>">
                    <span class="invalid-feedback">
                    <?php echo $data['title_err']; ?>
                    </span>
                </div>
                <div class="form-group">
                    <label for="body">Body: <sup>*</sup></label>
                    <textarea name="body" rows="10" id="add_text" class="form-control form-control-lg <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>">
                        <?php echo base64_decode($data['body']); ?>
                    </textarea>
                    <span class="invalid-feedback">
                    <?php echo $data['body_err']; ?>
                    </span>
                </div>
                
                <input type="submit" class="btn btn-success" id="submit_btn" value="Submit">
            </form>
        </div>

<?php require APPROOT . '/views/inc/footer.php'; ?>