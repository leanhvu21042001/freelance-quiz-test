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
  <h1 class="fs-1 text-center">Quản lý kết quản, điểm sinh viên</h1>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tên tài khoản</th>
        <th scope="col">Tên bài làm</th>
        <th scope="col">Tổng câu hỏi</th>
        <th scope="col">Số lần làm</th>
        <th scope="col">Số câu trả lời đúng</th>
        <th scope="col">Số câu trả lời sai</th>
        <th scope="col">Xếp loại</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($userLessonStats as $key => $userLessonStat) : ?>
        <tr>
          <th scope="row"><?= $key + 1 ?></th>
          <td><?= $userLessonStat['student_name'] ?> </td>
          <td><?= $userLessonStat['lesson_name'] ?> </td>
          <td><?= $userLessonStat['total_questions'] ?> </td>
          <td><?= $userLessonStat['attempt_count'] ?> </td>
          <td><?= $userLessonStat['correct_answers'] ?> </td>
          <td><?= $userLessonStat['incorrect_answers'] ?> </td>
          <td><?= $userLessonStat['performance_evaluation'] ?> </td>
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>
</div>

<!-- END MAIN CONTENT -->