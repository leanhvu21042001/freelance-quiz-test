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
  <h1 class="fs-1 text-center">Quản lý chương</h1>

  <form action="?controller=admin&action=chapter" method="post" class="w-50 mx-auto d-flex flex-row">
    <input name="chapter_name" class="form-control me-2" type="text" placeholder="Tên chương">
    <button name="save" value="save" class="btn btn-primary" type="submit">Thêm mới</button>
  </form>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tên chương</th>
        <th scope="col">Chức năng</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($chapters as $key => $chapter) : ?>
        <tr>
          <th scope="row"><?= $key + 1 ?></th>
          <td style="display: none;" id="form-chapter-<?= $chapter['id'] ?>">
            <form class="d-flex" action="?controller=admin&action=chapter" method="post">
              <input name="chapter_id" value="<?= $chapter['id'] ?>" placeholder="Tên chương" type="hidden">
              <input name="chapter_name" value="<?= $chapter['chapter_name'] ?>" placeholder="Tên chương" type="text" class="form-control me-2 flex-1">
              <button name="update" value="update" class="btn btn-primary" type="submit">Lưu chỉnh sửa</button>
            </form>
          </td>
          <td id="text-chapter-<?= $chapter['id'] ?>">
            <?= $chapter['chapter_name'] ?>
          </td>

          <td style="min-width: 200px;">
            <button class="mx-2 btn btn-warning update" name="button-update" data-toggle="close" value="<?= $chapter['id'] ?>">Sửa</button>
            <form action="?controller=admin&action=chapter" method="post" class="d-inline">
              <input type="hidden" name="chapter_id" value="<?= $chapter['id'] ?>">
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
      const chapterId = event.target.value;
      const toggleString = event.target.dataset.toggle;

      const formChapter = document.querySelector(`#form-chapter-${chapterId}`);
      const textChapter = document.querySelector(`#text-chapter-${chapterId}`);

      // nếu đang close thì open
      if (!isOpen(toggleString)) {
        textChapter.style.display = 'none';
        formChapter.style.display = 'block';

        event.target.dataset.toggle = 'open';
      } else {
        textChapter.style.display = 'block';
        formChapter.style.display = 'none';
        event.target.dataset.toggle = 'close';
      }

    }))

  })
</script>

<!-- END MAIN CONTENT -->