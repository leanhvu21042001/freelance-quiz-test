<!-- START HEADER -->
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link" href="?controller=admin&action=chapter">Chương</a>
          <a class="nav-link" href="?controller=admin&action=lesson">Bài</a>
          <a class="nav-link" href="?controller=admin&action=question">Câu hỏi</a>
          <a class="nav-link" href="?controller=admin&action=result">Kết quả</a>
        </div>
      </div>
    </div>
  </nav>
</header>
<!-- END HEADER -->

<!-- START MAIN CONTENT -->
<div class="container">
  <h1 class="fs-1 text-center">Quản lý câu hỏi</h1>

  <form action="?controller=admin&action=question" method="post" class="w-75 mx-auto">
    <div class="card mb-3">
      <div class="card-body">
        <div class="input-group">
          <strong>Câu hỏi:</strong>
          <input name="question_text" placeholder="Câu hỏi" type="text" class="form-control me-2 mb-2 w-100">
        </div>

        <div class="d-flex flex-wrap flex-row justify-content-between gap-3">

          <div class="input-group" style="max-width: calc(95%/2)">
            <strong>Đáp án A:</strong>
            <input name="option_a" placeholder="Đáp án A" type="text" class="form-control mb-2 w-100">
          </div>

          <div class="input-group" style="max-width: calc(95%/2)">
            <strong>Đáp án B:</strong>
            <input name="option_b" placeholder="Đáp án B" type="text" class="form-control mb-2 w-100">
          </div>

          <div class="input-group" style="max-width: calc(95%/2)">
            <strong>Đáp án C:</strong>
            <input name="option_c" placeholder="Đáp án C" type="text" class="form-control mb-2 w-100">
          </div>

          <div class="input-group" style="max-width: calc(95%/2)">
            <strong>Đáp án D:</strong>
            <input name="option_d" placeholder="Đáp án D" type="text" class="form-control mb-2 w-100">
          </div>

        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <div class="d-flex flex-wrap flex-row justify-content-between gap-3">
          <div class="input-group" style="max-width: calc(95%/2)">
            <strong>Chọn đáp án đúng:</strong>
            <select name="correct_answer" class="form-control mb-2 w-100">
              <?php foreach (array(
                'A' => 'A',
                'B' => 'B',
                'C' => 'C',
                'D' => 'D',
              ) as $key => $value) : ?>
                <option value="<?= $key ?>"><?= $value ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="input-group" style="max-width: calc(95%/2)">
            <strong>Chọn bài học:</strong>
            <select name="lesson_id" class="form-control me-2 mb-2 w-100">
              <?php foreach ($lessons as $key => $lesson) : ?>
                <option value="<?= $lesson['id'] ?>"><?= $lesson['lesson_name'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>

        </div>
      </div>
    </div>

    <div class="text-center">
      <button name="save" value="save" class="btn btn-primary mt-3" type="submit">Thêm mới</button>
    </div>
  </form>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Câu hỏi</th>
        <th scope="col">Chức năng</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($questions as $key => $question) : ?>
        <tr>
          <th scope="row"><?= $key + 1 ?></th>

          <td class="text-question-<?= $question['id'] ?>">
            <p><strong>Câu hỏi: </strong><?= $question['question_text'] ?></p>
            <p>
              <strong>Lựa chọn:</strong>
              <br />
              <strong>A: </strong><?= $question['option_a'] ?>
              <br />
              <strong>B: </strong><?= $question['option_b'] ?>
              <br />
              <strong>C: </strong><?= $question['option_c'] ?>
              <br />
              <strong>D: </strong><?= $question['option_d'] ?>
            </p>
            <p>Đáp án đúng: <strong><?= $question['correct_answer'] ?></strong></p>
          </td>

          <!-- Start Form update -->
          <td style="display: none;" id="form-question-<?= $question['id'] ?>">
            <form action="?controller=admin&action=question" method="post" class="w-75 mx-auto">

              <div class="card mb-3">
                <div class="card-body">
                  <div class="input-group">
                    <strong>Câu hỏi:</strong>
                    <input name="question_text" value="<?= $question['question_text'] ?>" placeholder="Câu hỏi" type="text" class="form-control me-2 mb-2 w-100">
                  </div>

                  <div class="d-flex flex-wrap flex-row justify-content-between gap-3">

                    <div class="input-group" style="max-width: calc(95%/2)">
                      <strong>Đáp án A:</strong>
                      <input name="option_a" value="<?= $question['option_a'] ?>" placeholder="Đáp án A" type="text" class="form-control mb-2 w-100">
                    </div>

                    <div class="input-group" style="max-width: calc(95%/2)">
                      <strong>Đáp án B:</strong>
                      <input name="option_b" value="<?= $question['option_b'] ?>" placeholder="Đáp án B" type="text" class="form-control mb-2 w-100">
                    </div>

                    <div class="input-group" style="max-width: calc(95%/2)">
                      <strong>Đáp án C:</strong>
                      <input name="option_c" value="<?= $question['option_c'] ?>" placeholder="Đáp án C" type="text" class="form-control mb-2 w-100">
                    </div>

                    <div class="input-group" style="max-width: calc(95%/2)">
                      <strong>Đáp án D:</strong>
                      <input name="option_d" value="<?= $question['option_d'] ?>" placeholder="Đáp án D" type="text" class="form-control mb-2 w-100">
                    </div>

                  </div>
                </div>
              </div>

              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-wrap flex-row justify-content-between gap-3">
                    <div class="input-group" style="max-width: calc(95%/2)">
                      <strong>Chọn đáp án đúng:</strong>
                      <select name="correct_answer" class="form-control mb-2 w-100">
                        <?php foreach (array(
                          'A' => 'A',
                          'B' => 'B',
                          'C' => 'C',
                          'D' => 'D',
                        ) as $key => $value) : ?>
                          <option value="<?= $key ?>" <?= $question['correct_answer'] == $value ?  "selected" : "" ?>><?= $value ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>

                    <div class="input-group" style="max-width: calc(95%/2)">
                      <strong>Chọn bài học:</strong>
                      <select name="lesson_id" class="form-control me-2 mb-2 w-100">
                        <?php foreach ($lessons as $key => $lesson) : ?>
                          <option value="<?= $lesson['id'] ?>" <?= $question['lesson_id'] == $lesson['id'] ?  "selected" : "" ?>>
                            <?= $lesson['lesson_name'] ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                    </div>

                  </div>
                </div>
              </div>

              <div class="text-center">
                <button name="save" value="save" class="btn btn-primary mt-3" type="submit">Cập nhập lại dữ liệu mới</button>
              </div>
            </form>
          </td>
          <!-- End Form update -->

          <td style="min-width: 200px;">
            <button class="mx-2 btn btn-warning update" name="button-update" data-toggle="close" value="<?= $question['id'] ?>">Sửa</button>
            <form action="?controller=admin&action=question" method="post" class="d-inline">
              <input type="hidden" name="question_id" value="<?= $question['id'] ?>">
              <button class="mx-2 btn btn-danger" type="submit" name="delete" value="delete">Xóa</button>
            </form>
          </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
</div>

<script>
  window.addEventListener('DOMContentLoaded', () => {

    const isOpen = (toggleString) => toggleString === 'open';

    const buttonsUpdate = document.querySelectorAll('.update');
    buttonsUpdate.forEach((button) => button.addEventListener('click', (event) => {
      const questionId = event.target.value;
      const toggleString = event.target.dataset.toggle;

      const formQuestion = document.querySelector(`#form-question-${questionId}`);
      const textQuestions = document.querySelectorAll(`.text-question-${questionId}`);

      // nếu đang close thì open
      if (!isOpen(toggleString)) {
        textQuestions.forEach(textQuestion => textQuestion.style.display = 'none')
        formQuestion.style.display = 'block';

        event.target.dataset.toggle = 'open';
      } else {
        textQuestions.forEach(textQuestion => textQuestion.style.display = 'block')
        formQuestion.style.display = 'none';
        event.target.dataset.toggle = 'close';
      }

    }))

  })
</script>

<!-- END MAIN CONTENT -->