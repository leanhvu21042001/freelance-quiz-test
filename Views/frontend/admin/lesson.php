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
  <h1 class="fs-1 text-center">Quản lý bài</h1>

  <form action="?controller=admin&action=lesson" method="post" class="w-50 mx-auto">
    <input name="lesson_name" class="form-control me-2 mb-3 w-100" type="text" placeholder="Tên bài">
    <select name="chapter_id" class="form-control me-2 mb-3 w-100">
      <?php foreach ($chapters as $key => $chapter) : ?>
        <option value="<?= $chapter['id'] ?>"><?= $chapter['chapter_name'] ?></option>
      <?php endforeach; ?>
    </select>
    <div class="text-center">
      <button name="save" value="save" class="btn btn-primary" type="submit">Thêm mới</button>
    </div>
  </form>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">#Tên bài #Tên chương</th>
        <th scope="col">Chức năng</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($lessons as $key => $lesson) : ?>
        <tr>
          <th scope="row"><?= $key + 1 ?></th>

          <td class="text-lesson-<?= $lesson['id'] ?>">
            <strong>Tiều đề bài: </strong><?= $lesson['lesson_name'] ?>
            <br />
            <strong>Tiêu đề chương:</strong>
            <?php
            $chapterId = $lesson['chapter_id'];
            $chapterFoundArray = array_filter($chapters, function ($chapter) use ($chapterId) {
              return $chapter['id'] == $chapterId;
            });

            $chapterFound = reset($chapterFoundArray);
            echo $chapterFound['chapter_name'];
            ?>
          </td>

          <!-- Start Form update -->
          <td style="display: none;" id="form-lesson-<?= $lesson['id'] ?>">
            <form class="d-flex" action="?controller=admin&action=lesson" method="post">
              <input name="lesson_id" value="<?= $lesson['id'] ?>" type="hidden">
              <div class="input-group">
                <input name="lesson_name" value="<?= $lesson['lesson_name'] ?>" placeholder="Tên bài" type="text" class="form-control me-2">
              </div>

              <div class="input-group">
                <select name="chapter_id" class="form-select me-2">
                  <?php foreach ($chapters as $key => $chapter) : ?>
                    <option value="<?= $chapter['id'] ?>"><?= $chapter['chapter_name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>

              <button name="update" value="update" class="btn btn-primary btn-sm" type="submit" style="min-width: 110px;">Lưu chỉnh sửa</button>

            </form>
          </td>
          <!-- End Form update -->

          <td style="min-width: 200px;">
            <button class="mx-2 btn btn-warning update" name="button-update" data-toggle="close" value="<?= $lesson['id'] ?>">Sửa</button>
            <form action="?controller=admin&action=lesson" method="post" class="d-inline">
              <input type="hidden" name="lesson_id" value="<?= $lesson['id'] ?>">
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
      const lessonId = event.target.value;
      const toggleString = event.target.dataset.toggle;

      const formLesson = document.querySelector(`#form-lesson-${lessonId}`);
      const textLessons = document.querySelectorAll(`.text-lesson-${lessonId}`);

      // nếu đang close thì open
      if (!isOpen(toggleString)) {
        textLessons.forEach(textLesson => textLesson.style.display = 'none')
        formLesson.style.display = 'block';

        event.target.dataset.toggle = 'open';
      } else {
        textLessons.forEach(textLesson => textLesson.style.display = 'block')
        formLesson.style.display = 'none';
        event.target.dataset.toggle = 'close';
      }

    }))

  })
</script>

<!-- END MAIN CONTENT -->