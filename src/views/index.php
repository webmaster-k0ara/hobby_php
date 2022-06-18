<h1 class="h2 text-dark mb-4">読書ログの一覧</h1>
<a class="btn btn-primary mb-4" href="new.php">読書ログを登録する</a>
<main>
  <?php if (count($reviews) > 0) : ?>
    <?php foreach ($reviews as $review) : ?>
      <section class="card shadow-sm mb-4">
        <div class="card-body <?php echo $review['status'] ;?>">
          <h2 class="card-title h4 mb-3"><?php echo escape($review['title']); ?></h2>
          <div>
            <?php echo escape($review['author']) . '&nbsp;/&nbsp;' . escape($review['status']) . '&nbsp;/&nbsp;' . escape($review['score']); ?>
          </div>
          <p>
            <?php echo nl2br(escape($review['summary']), false); ?>
          </p>
        </div>
      </section>
    <?php endforeach; ?>
  <?php else : ?>
    <p>読書ログが登録されていません。</p>
  <?php endif; ?>
</main>
<?php
var_dump($review['status']);
?>
