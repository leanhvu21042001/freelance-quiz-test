<div class="container">
  <p class="fs-2 text-center">Đăng nhập</p>
  <form action="<?= HOST_URL ?>/?controller=user&action=login" method="post" class="mx-auto" style="width: fit-content;">
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input name="username" type="username" class="form-control" id="username">
    </div>
    <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input name="password" type="password" class="form-control" id="password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>