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

  .form-check,
  .form-check-input,
  .form-check-label {
    cursor: pointer;
  }
</style>

<div class="container">
  <div class="mx-auto w-75">
    <h1 class="fs-1 text-center">NỘI DUNG TRẮC NGHIỆM</h1>
    <!-- List Chapters -->

    <div class="card">
      <div class="card-body">


        <?php if (isset($result['totalCorrect'])) : ?>
          <p class="text-success">
            Bạn làm đúng <?= $result['totalCorrect'] ?> câu.
            <strong class="text-danger">Xếp loại: <?= $result['performance_evaluation'] ?></strong>
          </p>

          <a href="?controller=question&action=index&lesson_id=<?php if (isset($_GET['lesson_id'])) echo $_GET['lesson_id'] ?>">
            <button class="btn btn-warning">Nhấn vào đây để làm lại</button>
          </a>
        <?php endif; ?>

        <a href="?controller=chapter&action=index">

          <button class="btn btn-primary">Trở về trang chủ đề câu hỏi</button>
        </a>
      </div>
    </div>

    <?php if (count($questions) !== 0) : ?>
      <form action="?controller=question&action=index&lesson_id=<?php if (isset($_GET['lesson_id'])) echo $_GET['lesson_id'] ?>" method="post" class="py-3 my-3 mx-auto" style="width: fit-content">
        <?php foreach ($questions as $key => $question) : ?>
          <div>
            <p class="mb-1 mt-3">
              <strong>Câu <?= $key + 1 ?>:</strong>
              <?= $question['question_text'] ?>
            </p>

            <div class="form-check">
              <input class="form-check-input" required value="A" type="radio" name="<?= $question['id'] ?>" id="a-<?= $question['id'] ?>">
              <label class="form-check-label" for="a-<?= $question['id'] ?>">
                A: <?= $question['option_a'] ?>
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" required value="B" type="radio" name="<?= $question['id'] ?>" id="b-<?= $question['id'] ?>">
              <label class="form-check-label" for="b-<?= $question['id'] ?>">
                B: <?= $question['option_b'] ?>
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" required value="C" type="radio" name="<?= $question['id'] ?>" id="c-<?= $question['id'] ?>">
              <label class="form-check-label" for="c-<?= $question['id'] ?>">
                C: <?= $question['option_c'] ?>
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" required value="D" type="radio" name="<?= $question['id'] ?>" id="d-<?= $question['id'] ?>">
              <label class="form-check-label" for="d-<?= $question['id'] ?>">
                D: <?= $question['option_d'] ?>
              </label>
            </div>
          </div>
        <?php endforeach; ?>

        <p class="mt-5">
          <button class="btn btn-primary" type="submit">Xem kết quả</button>
        </p>
      </form>
    <?php endif; ?>
  </div>
</div>