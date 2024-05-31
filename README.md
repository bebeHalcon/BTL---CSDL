# Setup:
1. Chỉnh đường dẫn của Document Root nằm trong file httpd.conf của XAMPP tới thư mục nơi chứa source code của project.
2. Khởi động XAMPP Control Panel. Chạy 2 service: Apache và MySQL.
3. Vào trang phpMyAdmin, sau đó thực hiện import database (`database/web.sql`).
4. Truy cập vào trình duyệt web nào đó như Microsoft Edge hoặc Google Chrome, nhập đường dẫn [http://localhost](http://localhost). Trang web sẽ được hiển thị thành công.

# Login:
root - 

admin_ktx - admin_ktx

## Tạo bảng và dữ liệu mẫu (3 điểm):
1. [x] (2 điểm) Viết các câu lệnh hiện thực các bảng dữ liệu đã thiết kế, trong đó có các ràng buộc khóa chính, khóa ngoại, các ràng buộc dữ liệu và các ràng buộc ngữ nghĩa nêu trong bài tập lớn 1 (sử dụng check hoặc trigger). **(Nhân)**
2. [x] (1 điểm) Tạo dữ liệu mẫu có ý nghĩa ở tất cả các bảng (có thể nhập liệu bằng giao diện hoặc viết câu lệnh) **(Hào)**

## Task: Hiện thực ứng dụng (7 điểm)
1. [x] (1.2.1) (1 điểm) Viết các PROCEDURES để thêm (insert), sửa (update), xóa (delete) dữ liệu vào MỘT bảng dữ liệu (Chọn Bảng **STUDENT**). Yêu cầu:
   - Phải có thực hiện việc kiểm tra dữ liệu hợp lệ (validate) để đảm bảo các ràng buộc của bảng dữ liệu
   - Xuất ra thông báo lỗi có nghĩa, chỉ ra được lỗi sai cụ thể (không ghi chung chung là “Lỗi nhập dữ liệu!”) Ví dụ: kiểm tra tuổi sinh viên > 18 tuổi, kiểu format CCCD, số điện thoại, email là hợp lệ...
2. [ ] (1.2.2) (1 điểm) Viết 2 trigger để kiểm soát các hành động INSERT, UPDATE, DELETE trên một số bảng đã tạo. Thỏa yêu cầu sau:
    1. Trigger cập nhật Student_count trong **ROOM** mỗi khi INSERT/UPDATE/DELETE **STUDENT**.
    2. Trigger cập nhật Student_count trong **BUILDING** mỗi khi INSERT/UPDATE/DELETE **ROOM**. (Có bị trùng không?)
   - Có ít nhất 1 trigger có tính toán cập nhật dữ liệu trên bảng dữ liệu khác bảng đang được thiết lập trigger. (Trigger liên quan đến việc tính toán thuộc tính dẫn xuất)
   - Chuẩn bị câu lệnh và dữ liệu minh họa cho việc kiểm tra trigger khi báo cáo.
3. [x] (1.2.3) (1 điểm) Viết 2 PROCEDURES trong đó chỉ chứa các câu truy vấn để hiển thị dữ liệu và tham số đầu vào là các giá trị trong mệnh đề WHERE và/hoặc Having (nếu có), gồm:
    1. Procedure(X) xuất ra danh sách sinh viên (Họ tên, DOB, avatar,...) thuộc phòng X, theo thứ tự ngày nhận phòng.
    2. Procedure(X) xuất ra danh sách bao gồm các cột tên phòng, số sinh viên hiện tại và độ tuổi trung bình của các sinh viên trong phòng của các phòng thuộc tòa X.
   - 1 câu truy vấn từ 2 bảng trở lên có mệnh đề where, order by
   - 1 câu truy vấn có aggreate function, group by, having, where và order by có liên kết từ 2 bảng trở lên
   - Có ít nhất 1 thủ tục liên quan đến việc lấy dữ liệu từ bảng trong câu 1.2.1
   - Chuẩn bị câu lệnh và dữ liệu minh họa cho việc gọi thủ tục khi báo cáo.
4. [x] (1.2.4) (1 điểm) Viết 2 hàm thỏa yêu cầu sau:
    1. Hàm duyệt qua tất cả các sinh viên tìm sinh viên sinh tháng X.
    2. Hàm tính tổng số tiền điện nước tháng 6 của tất cả các phòng tòa Y. 
   - Chứa câu lệnh IF và/hoặc LOOP để tính toán dữ liệu được lưu trữ
   - Chứa câu lệnh truy vấn dữ liệu, lấy dữ liệu từ câu truy vấn để kiểm tra tính toán
   - Có tham số đầu vào và kiểm tra tham số đầu vào
   - Chuẩn bị các câu lệnh và dữ liệu để minh họa việc gọi hàm khi báo cáo.
5. (1.2.5) (3 điểm) Viết Web minh họa việc kết nối ứng dụng với CSDL. Trong đó:
   - [x] (a) (1 điểm) Hiện thực 1 màn hình để thể hiện chức năng thêm/xóa/sửa dữ liệu vào bảng dữ liệu trong câu 1.2.1: Chức năng "**Thêm Sinh viên**"
   - [x] (b) (1 điểm) 1 giao diện hiển thị danh sách dữ liệu từ việc gọi thủ tục trong câu số 1.2.3. Cho phép cập nhật, xóa dữ liệu từ danh sách. Ngoài ra còn có: các chức năng như tìm kiếm, sắp xếp, validate dữ liệu nhập vào, xử lý lỗi logic khi cập nhật và xóa dữ liệu, thông báo lỗi phù hợp và cụ thể, control sử dụng hợp lý, giao diện dễ nhìn: Chức năng "**Tìm hồ sơ sinh viên**"
   
   *Ví dụ*: 1 giao diện hiển thị danh sách các sản phẩm, trong đó có search, filter, sắp xếp, có chức năng tạo mới sản phẩm (gọi lại giao diện phần a), có chức năng chọn 1 hàng dữ liệu để xóa sản phẩm hoặc cập nhật thông tin sản phẩm.
   - [x] (c) (1 điểm) 1 Giao diện minh họa cho ít nhất 1 thủ tục khác trong câu 1.2.3 hoặc hàm trong câu 1.2.4. (có thể dùng chung giao diện phần b nếu cùng bảng dữ liệu): Chức năng "Báo cáo - thống kê"
### Lưu ý
- Các hàm và thủ tục phải có ý nghĩa và phù hợp với nghiệp vụ của ứng dụng.
- Chức năng hiển thị danh sách dữ liệu từ việc gọi thủ tục với các tham số đầu vào tương ứng trong mệnh đề Where hay Having do người dùng nhập trong các textbox hoặc combo box hoặc calendar picker, v.v. (Tương ứng với chức năng search thường thấy trong các ứng dụng hoặc website)
- Các thao tác thêm, sửa, xóa phải thực hiện việc gọi các thủ tục trong câu 1.2.1.