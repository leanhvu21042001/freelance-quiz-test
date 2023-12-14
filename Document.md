# Mô hình MVC

- Buoc1: V --> C --> M
- Buoc2: V <-- C <-- M

## Namespace

## Rule MVC

- Controllers:

  - Tên class & tên file luôn phải giống nhau
  - Chữ cái đầu tiên phải viết hoa
  - Tên class luôn luôn có "Controller" cuối cùng.
  - Ex: ProductController (class name) -> ProductController.php (file name). <br/> UserController (class name) -> UserController.php (file name)

- Models:

  - Giống Controller nhứng tên cố định là "Model"
  - Chữ cái đầu tiên phải viết hoa
  - Ex: ProductModel (class name) -> ProductModel.php (file name). <br/> UserModel (class name) -> UserModel.php (file name).

- Views (Không bắt buộc nhưng nên):

  - Tên của File View nên giống với tên Method trong FileView đó.
  - Ex: Method trong controller là index -> tên file view sẽ là index.php

  - Tên thư mục View nên giống với Controller nhưng ở dạng số nhiều.
  - Ex: UserController -> Folder view là "users"

- Param Name

  - controller: Quy định gọi vào controller nào. Name phải trung tên với Controller Name
  - Ex: UserController -> Params controller: user. <br/>
    ProductController -> Param controller: product
  - action: Quy định gọi vào method nào. Trường hợp không có -> mặc định action là index

- Route: Từ sau dấy '?' sẽ có tên là route

- Build Model

  - Connect database
  - Active Record for BaseModel
    - User:all()
    - User:insert()
