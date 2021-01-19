<form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>
       
    <div class="form-group">
        <label for="post_categories">Post Category Id</label>
        <input type="text" class="form-control" name="post_category_id">
    </div>
       
    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" name="post_author">
    </div>
       
    <div class="form-group">
        <label for="post_status">Post status</label>
        <input type="text" class="form-contol" name="post_status">
    </div>
       
    <div class="form-group">
        <label for="post_image">Image</label>
        <input type="file" class="form-contol" name="post_image">
    </div>
    
    <div class="form-group">
        <label for="post_tags">Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
       
    <div class="form-group">
        <label for="post_content">Content</label>
        <textarea name="post_content" class = "form-control" id="" cols="30" rows="10"></textarea>
    </div>
       
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="publish_post">
    </div>
</form>