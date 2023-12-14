INSERT INTO chapters (chapter_name) VALUES
("CHỦ ĐỀ 1. MÁY TÍNH VÀ CỘNG ĐỒNG"),
("CHỦ ĐỀ 2. TỔ CHỨC LƯU TRỮ, TÌM KIẾM VÀ TRAO ĐỔI THÔNG TIN"),
("CHỦ ĐỀ 3. ĐẠO ĐỨC, PHÁP LUẬT VÀ VĂN HÓA TRONG MÔI TRƯỜNG SỐ"),
("CHỦ ĐỀ 4. ỨNG DỤNG TIN HỌC"),
("CHỦ ĐỀ 5. GIẢI QUYẾT VẤN ĐỀ VỚI SỰ TRỢ GIÚP CỦA MÁY TÍNH"),
("CHỦ ĐỀ 6. HƯỚNG NGHIỆP VỚI TIN HỌC");

INSERT INTO lessons (lesson_name, chapter_id) VALUES
('Bài 1: Lịch Sử Phát Triển Máy Tính', 1),
('Bài 2: Thông Tin Trên Môi Trường Số', 2),
('Bài 3: Thông Tin Với Giải Quyết Vấn Đề', 2);

INSERT INTO questions (question_text, option_a, option_b, option_c, option_d, correct_answer, lesson_id) 
VALUES 
-- Chủ đề 1. bài 1.
('Sản phẩm được phát minh, sáng chế vào năm 1642 là', 'Máy tính Z1', 'Máy tính Z2', 'Máy Turing', 'Máy tính Pascaline', 'D', 1),
('Máy tính thế hệ thứ hai xuất hiện trong khoảng thời gian nào', '1955 – 1965', '1965 – 1974', '1990 – nay', '1945 – 1955', 'A', 1),
('Máy tính được phát triển từ những năm 1990 sử dụng công nghệ nào', 'Bóng bán dẫn', 'Mạch tích hợp', 'Vi xử lí VLSI', 'Vi xử lí ULSI', 'D', 1),
('Sản phẩm được phát minh, sáng chế vào năm 1936 là', 'Máy Turing', 'Máy tính Z2', 'Máy tính Z1', 'Máy tính Pascaline', 'A', 1),
('Phát biểu nào sau đây sai', 'Năm thế hệ máy tính gắn liền với các tiến bộ công nghệ: đèn điện tử chân không, bóng bán dẫn, mạch tích hợp, vi xử lí mật độ tích hợp rất cao, vi xử lí mật độ tích hợp siêu cao', 'Máy tính điện tử ra đời vào những năm 1950', 'Càng về sau, các máy tính càng nhỏ, nhẹ, tiêu thụ ít điện năng, tốc độ, độ tin cậy cao hơn, dung lượng bộ nhớ lớn hơn, thông minh hơn và giá thành hợp lí hơn', 'Có thể máy tính lượng tử sẽ là thế hệ máy tính tiếp theo trong tương lai', 'B', 1),
('Phát biểu nào sau đây là sai', 'Máy tính làm thay đổi cách thức con người thu thập, lưu trữ, xử lí, chia sẻ thông tin', 'Các thiết bị thông minh phối hợp với nhau tạo thành hệ thống thông minh có thể tự thu thập, truyền, xử lí thông tin và tự ra quyết định hành động', 'Trong công nghiệp, đã xuất hiện những nhà máy thông minh được tự động hóa hoàn toàn, không có công nhân làm việc trong nhà máy', 'Các thiết bị thông minh không phải là thành phần của hệ thống thông minh', 'D', 1),
('Tên sản phẩm được sáng chế vào năm 1938 là', 'Máy tính Z2', 'Máy Turing', 'Máy tính Z1', 'Máy tính Pascaline', 'C', 1),
('Sự thay đổi mà máy tính mang lại trong lĩnh vực giáo dục là', 'Giao tiếp, chia sẻ, tham gia các hoạt động cộng đồng trên mạng', 'Xem phim, chơi game trực tuyến', 'Dạy học trực tuyến', 'Du lịch thực tế ảo', 'C', 1),
('Chiếc máy tính cơ học Pascal do ai sáng tạo ra', 'Charles Babbage', 'John Mauchly', 'Blaise Pascal', 'J. Presper Eckert', 'C', 1),
('Máy tính thế hệ thứ nhất có tốc độ xử lí ….. phép tính mỗi giây', 'Vài chục nghìn', 'Vài nghìn', 'Hàng triệu', 'Hàng tỉ', 'B', 1);
-- 