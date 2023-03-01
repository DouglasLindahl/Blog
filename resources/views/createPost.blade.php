<form action="createBlogPost" method = "POST">
    @csrf
    <label for="title">Title</label>
    <input type="text" name = "title">
    <label for="content">Content</label>
    <textarea name="content" id="content" cols="30" rows="10"></textarea>
    <input type="hidden" name = "user_id" value = <?=Auth::user()->id?>>
    <input type="submit" value = "post content">
</form>
