<style>
  a {
    color: #333;
    cursor: pointer;
    text-decoration: none;
  }

  a:hover {
    color: #ff8400;
    text-decoration: underline;
  }
</style>

<div class="container">
  <div class="mx-auto" style="width: fit-content;">
    <h1 class="fs-1 mb-5">Các dạng đề trắc nghiệm theo chủ đề</h1>

    <!-- List Chapters -->
    <?php foreach ($chapters as $key => $chapter) : ?>
      <h2 class="fs-5" style="color: #116ab1;">
        <?= $chapter['chapter_name'] ?>
      </h2>

      <!-- List Lessons -->
      <?php foreach ($lessons as $key => $lesson) : ?>
        <?php if ($lesson['chapter_id'] === $chapter['id']) : ?>
          <p>
            <a href="?controller=question&action=index&lesson_id=<?= $lesson['id'] ?>" class="fs-6">
              <?= $lesson['lesson_name'] ?>
            </a>
          </p>
        <?php endif; ?>
      <?php endforeach; ?>

    <?php endforeach; ?>
  </div>
</div>