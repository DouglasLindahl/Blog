<link rel="stylesheet" href="{{ asset('/css/createPost.css') }}">

<body>
    <form class="createPostForm" action="createBlogPost" method="POST">
        @csrf
        <div class="formGroup">
          <label for="title">Title:</label>
          <input type="text" name="title" id="title" required>
        </div>
        <div class="formGroup">
          <label for="content">Content:</label>
          <textarea name="content" id="content" cols="30" rows="10" required></textarea>
        </div>
        <input type="hidden" name="user_id" value="<?=Auth::user()->id?>">
        <input class="createPostButton" type="submit" value="Post Content">
      </form>
</body>
