<h1 class="h2 text-dark mb-4">読書ログ</h1>
<form action="create.php" method="post">
  <div class="form-group">
    <label for="title">書籍名</label>
    <input type="text" name="title" id="title" class="form-control" value="<?php echo $review['title']; ?>">
    <?php if (!empty($errors['title'])) : ?>
      <span class="text-danger"><?php echo $errors['title']; ?></span>
    <?php endif; ?>
  </div>
  <div class="form-group">
    <label for="author">著者名</label>
    <input type="text" name="author" id="author" class="form-control" value="<?php echo $review['author']; ?>">
    <?php if (!empty($errors['author'])) : ?>
      <span class="text-danger"><?php echo $errors['author']; ?></span>
    <?php endif; ?>
  </div>
  <div class="form-group">
    <label>読書状況</label>
    <div>
      <div class="form-check form-check-inline">
        <input type="radio" name="status" id="status1" class="form-check-input" value="unread" <?php echo ($review['status'] === 'pre') ? 'checked' : ''; ?>>
        <label class="form-check-label" for="status1">未読</label>
      </div>
      <div class="form-check form-check-inline">
        <input type="radio" name="status" id="status2" class="form-check-input" value="continuing" <?php echo ($review['status'] === 'continuing') ? 'checked' : ''; ?>>
        <label class="form-check-label" for="status2">読んでる</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="status" id="status3" class="form-check-input" value="read" <?php echo ($review['status'] === 'read') ? 'checked' : ''; ?>>
        <label class="form-check-label" for="status3">読了</label>
      </div>
    </div>
    <?php if (!empty($errors['status'])) : ?>
      <span class="text-danger"><?php echo $errors['status']; ?></span>
    <?php endif; ?>
  </div>
  <div class="form-group">
    <label for="score">評価（5点満点の整数）</label>
    <input type="number" name="score" id="score" class="form-control" value="<?php echo $review['score']; ?>">
    <?php if (!empty($errors['score'])) : ?>
      <span class="text-danger"><?php echo $errors['score']; ?></span>
    <?php endif; ?>
  </div>
  <div class="form-group">
    <label for="summary">感想</label>
    <textarea type="text" name="summary" id="summary" class="form-control" rows="10"><?php echo $review['summary']; ?></textarea>
    <?php if (!empty($errors['summary'])) : ?>
      <span class="text-danger"><?php echo $errors['summary']; ?></span>
    <?php endif; ?>
  </div>
  <button class="btn btn-primary" type="submit">登録する</button>
</form>
