-- DROP DATABASE IF EXISTS CHETCOM;

-- CREATE DATABASE IF NOT EXISTS CHETCOM;
-- USE CHETCOM;

-- --------------------------------------------------------

--
-- Table structure for table BE_WARNED
--

CREATE TABLE BE_WARNED (
  Warn_ID INT(10) ,
  Student_ID VARCHAR(12) ,
  PRIMARY KEY (Warn_ID, Student_ID)
);

-- --------------------------------------------------------

--
-- Table structure for table BILL
--

CREATE TABLE BILL (
  Bill_ID INT(10)  ,
  Detail VARCHAR(100),
  Amount INT,
  Date_paid DATE,
  Date_issue DATE,
  Date_expire DATE,
  Mgr_ID VARCHAR(12),
  Student_ID VARCHAR(12), 
  PRIMARY KEY (Bill_ID),
  CHECK (Date_issue < Date_expire)
);

-- --------------------------------------------------------

--
-- Table structure for table BUILDING
--

CREATE TABLE BUILDING (
  Name VARCHAR(100),
  Status CHAR CHECK (Status = 'A' OR Status = 'F' OR Status = 'R'), -- Available, Full, Repairing
  Mgr_ID VARCHAR(12),
  PRIMARY KEY (Name)
);

-- --------------------------------------------------------

--
-- Table structure for table EMPLOYEE
--

CREATE TABLE EMPLOYEE (
  CCCD_number VARCHAR(12),
  CCCD_date DATE,
  Fname VARCHAR(100),
  Lname VARCHAR(100),
  DOB DATE,
  Sex CHAR CHECK (Sex = 'M' OR Sex = 'F'),
  Religion VARCHAR(10),
  Ethnicity VARCHAR(10),
  Email VARCHAR(100),
  Phone VARCHAR(10),
  Address VARCHAR(100),
  Bname VARCHAR(10),
  PRIMARY KEY (CCCD_number)
);

-- --------------------------------------------------------

--
-- Table structure for table LIVES_IN
--

CREATE TABLE LIVES_IN (
  Student_ID VARCHAR(12) ,
  Date_in DATE,
  Date_out DATE,
  Room_ID VARCHAR(4) ,
  PRIMARY KEY (Student_ID, Date_in),
  CHECK (Date_in < Date_out)
);

-- --------------------------------------------------------

--
-- Table structure for table MANAGER
--

CREATE TABLE MANAGER (
  CCCD_number VARCHAR(12) ,
  Mgr_start_date DATE,
  High_Mgr VARCHAR(12) , -- CCCD Of High Mgr
  PRIMARY KEY (CCCD_number)
);

-- --------------------------------------------------------

--
-- Table structure for table NOTIFICATION
--

CREATE TABLE NOTIFICATION (
  ID INT(10) ,
  Title VARCHAR(100),
  Content VARCHAR(100),
  Date DATE,
  Mgr_ID VARCHAR(12),
  PRIMARY KEY (ID)
);

-- --------------------------------------------------------

--
-- Table structure for table RELATIVE
--

CREATE TABLE RELATIVE (
  Student_ID VARCHAR(12) ,
  Fname VARCHAR(10),
  Lname VARCHAR(100),
  DOB DATE,
  Phone VARCHAR(10),
  Address VARCHAR(100),
  Relationship VARCHAR(10),
  PRIMARY KEY (Fname, Lname, Student_ID)
);

-- --------------------------------------------------------

--
-- Table structure for table ROOM
--

CREATE TABLE ROOM (
  Room_ID VARCHAR(4)  ,
  Status CHAR CHECK (Status = 'A' OR Status = 'F' OR Status = 'R'),
  Bname VARCHAR(100),
  Room_type_ID VARCHAR(2) ,
  Leader_ID VARCHAR(12)  ,
  PRIMARY KEY (Room_ID)
);

-- --------------------------------------------------------

--
-- Table structure for table ROOM_TYPE
--

CREATE TABLE ROOM_TYPE (
  Room_type_ID VARCHAR(2),
  Room_type_name VARCHAR(100),
  Max_student INT,
  Cost INT,
  PRIMARY KEY (Room_type_ID)
);

-- --------------------------------------------------------

--
-- Table structure for table STAFF
--

CREATE TABLE STAFF (
  CCCD_number VARCHAR(12) ,
  Job VARCHAR(100),
  Super_CCCD_number VARCHAR(12),
  PRIMARY KEY (CCCD_number)
);

-- --------------------------------------------------------

--
-- Table structure for table STUDENT
--

CREATE TABLE STUDENT (
  CCCD_number VARCHAR(12) ,
  CCCD_date DATE,
  Fname VARCHAR(10),
  Lname VARCHAR(100),
  DOB DATE,
  Sex CHAR CHECK (Sex = 'M' OR Sex = 'F'),
  Religion VARCHAR(100),
  Ethnicity VARCHAR(100),
  Phone VARCHAR(10),
  Email VARCHAR(100),
  Avatar VARCHAR(100),
  Bank_name VARCHAR(100),
  Bank_number VARCHAR(10),
  Address VARCHAR(100),
  Status VARCHAR (100),
  PRIMARY KEY (CCCD_number)
);

-- --------------------------------------------------------

--
-- Table structure for table STUDIES_IN
--

CREATE TABLE STUDIES_IN (
  CCCD_number VARCHAR(12),
  Student_ID VARCHAR(8),
  Uni_ID VARCHAR(1),
  Department VARCHAR(100),
  PRIMARY KEY (CCCD_number)
);

-- --------------------------------------------------------

--
-- Table structure for table UNIVERSITY
--

CREATE TABLE UNIVERSITY (
  Uni_ID VARCHAR(1),
  Name VARCHAR(100),
  Uni_Email VARCHAR(100),
  Uni_phone VARCHAR(10),
  PRIMARY KEY (Uni_ID)
);

-- --------------------------------------------------------

--
-- Table structure for table UNI_ADDRESS
--

CREATE TABLE UNI_ADDRESS (
  Uni_ID VARCHAR(1),
  Uni_address VARCHAR(100),
  PRIMARY KEY (Uni_ID, Uni_address)
);

-- --------------------------------------------------------

--
-- Table structure for table WARNING
--

CREATE TABLE WARNING (
  ID INT(10)  ,
  Date DATE,
  Detail VARCHAR(100),
  Note VARCHAR(100),
  Mgr_ID VARCHAR(12),
  Type VARCHAR(100),
  PRIMARY KEY (ID)
);

-- --------------------------------------------------------
--
-- Table structure for table WORK_IN
--

CREATE TABLE WORK_IN (
  Employee_ID VARCHAR(12),
  Date_in DATE,
  Date_out DATE,
  Bname VARCHAR(100),
  PRIMARY KEY (Employee_ID, Date_in),
  CHECK (Date_in < Date_out)
);

-- ALTER TABLE --
-- ADD CONSTRAINT--


-- ALTER TABLE BE_WARNED  
--   ADD CONSTRAINT fk_be_warned_Stu_CCCD FOREIGN KEY (Student_ID) REFERENCES STUDENT(CCCD_number)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;

-- ALTER TABLE BE_WARNED 
--   ADD CONSTRAINT fk_be_warned_ID FOREIGN KEY (Warn_ID) REFERENCES WARNING(ID)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;



-- ALTER TABLE BILL 
--   ADD CONSTRAINT fk_bill_Stu_CCCD FOREIGN KEY (Student_ID) REFERENCES STUDENT(CCCD_number)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;

-- ALTER TABLE BILL 
--   ADD CONSTRAINT fk_bill_Mgr_CCCD FOREIGN KEY (Mgr_ID) REFERENCES MANAGER(CCCD_number)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;

-- ALTER TABLE BUILDING 
--   ADD CONSTRAINT fk_building_Mgr_CCCD FOREIGN KEY (Mgr_ID) REFERENCES MANAGER(CCCD_number)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;

-- ALTER TABLE LIVES_IN
--   ADD CONSTRAINT fk_lives_in_Stu_CCCD FOREIGN KEY (Student_ID) REFERENCES STUDENT(CCCD_number)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;

-- ALTER TABLE LIVES_IN
--   ADD CONSTRAINT fk_lives_in_room_ID FOREIGN KEY (Room_ID) REFERENCES ROOM(Room_ID)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;

-- ALTER TABLE MANAGER
--   ADD CONSTRAINT fk_manager_Mgr_CCCD FOREIGN KEY (High_Mgr) REFERENCES EMPLOYEE(CCCD_number)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;
    

-- ALTER TABLE MANAGER
--   ADD CONSTRAINT fk_manager_employee_CCCD FOREIGN KEY (CCCD_number) REFERENCES EMPLOYEE(CCCD_number)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;



-- ALTER TABLE NOTIFICATION
--   ADD CONSTRAINT fk_notification_Mgr_CCCD FOREIGN KEY (Mgr_ID) REFERENCES MANAGER(CCCD_number)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;

-- ALTER TABLE RELATIVE 
--   ADD CONSTRAINT fk_relative_Stu_CCCD FOREIGN KEY (Student_ID) REFERENCES STUDENT(CCCD_number)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;

-- ALTER TABLE ROOM
--   ADD CONSTRAINT fk_room_Stu_CCCD FOREIGN KEY (Leader_ID) REFERENCES STUDENT(CCCD_number)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;

-- ALTER TABLE ROOM
--   ADD CONSTRAINT fk_room_Bname FOREIGN KEY (Bname) REFERENCES BUILDING(Name)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;

-- ALTER TABLE ROOM
--   ADD CONSTRAINT fk_room_type_ID FOREIGN KEY (Room_type_ID) REFERENCES ROOM_TYPE(Room_type_ID)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;

-- ALTER TABLE STAFF
--   ADD CONSTRAINT fk_staff_Mgr_CCCD FOREIGN KEY (Super_CCCD_number) REFERENCES MANAGER(CCCD_number)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;

-- ALTER TABLE STAFF
--   ADD CONSTRAINT fk_staff_employee_CCCD FOREIGN KEY (CCCD_number) REFERENCES EMPLOYEE(CCCD_number)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;

-- ALTER TABLE STUDIES_IN 
--   ADD CONSTRAINT fk_studies_in_Stu_CCCD FOREIGN KEY (CCCD_number) REFERENCES STUDENT(CCCD_number)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;

-- ALTER TABLE STUDIES_IN 
--   ADD CONSTRAINT fk_studies_in_Uni_ID FOREIGN KEY (Uni_ID) REFERENCES UNIVERSITY(Uni_ID)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;

-- ALTER TABLE UNI_ADDRESS 
--   ADD CONSTRAINT fk_uni_address_ID FOREIGN KEY (Uni_ID) REFERENCES UNIVERSITY(Uni_ID)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;



-- ALTER TABLE WARNING 
--   ADD CONSTRAINT fk_warning_CCCD FOREIGN KEY (Mgr_ID) REFERENCES MANAGER(CCCD_number)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;

-- ALTER TABLE WORK_IN 
--   ADD CONSTRAINT fk_work_in_name FOREIGN KEY (Bname) REFERENCES BUILDING(Name)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;

-- ALTER TABLE WORK_IN 
--   ADD CONSTRAINT fk_work_in_CCCD FOREIGN KEY (Employee_ID) REFERENCES EMPLOYEE(CCCD_number)
--     ON UPDATE RESTRICT
--     ON DELETE RESTRICT;

--
-- CREATE USER
--

-- DROP USER IF EXISTS 'admin_ktx'@'localhost';
-- CREATE USER 'admin_ktx'@'localhost' IDENTIFIED BY 'admin_ktx';
-- GRANT ALL PRIVILEGES on chetcom.* TO 'admin_ktx'@'localhost';

-- --
-- -- 1.2.1
-- --
-- USE chetcom;
-- DROP PROCEDURE IF EXISTS InsertStudent;
-- DROP PROCEDURE IF EXISTS DeleteStudent;
-- DROP PROCEDURE IF EXISTS UpdateStudent;
-- DELIMITER //
-- USE chetcom //
-- CREATE PROCEDURE InsertStudent(
--     IN p_CCCD_number VARCHAR(12),
--     IN p_CCCD_date DATE,
--     IN p_Fname VARCHAR(50),
--     IN p_Lname VARCHAR(50),
--     IN p_DOB DATE,
--     IN p_Sex CHAR,
--     IN p_Religion VARCHAR(50),
--     IN p_Ethnicity VARCHAR(50),
--     IN p_Phone VARCHAR(10),
--     IN p_Email VARCHAR(50),
--     IN p_Avatar VARCHAR(100),
--     IN p_Bank_name VARCHAR(50),
--     IN p_Bank_number VARCHAR(10),
--     IN p_Address VARCHAR(100),
--     IN p_Status VARCHAR (100),
--     IN p_Room_ID VARCHAR (5),
--     IN p_Uni_ID VARCHAR (1),
--     IN p_Student_ID VARCHAR(8),
--     IN p_Department VARCHAR(100)
-- )
-- BEGIN
--     IF p_CCCD_number IS NULL OR p_CCCD_date IS NULL OR p_Fname IS NULL OR p_Lname IS NULL OR p_DOB IS NULL 
--     OR p_Sex IS NULL OR p_Religion IS NULL OR p_Ethnicity IS NULL OR p_Phone IS NULL OR p_Email IS NULL 
--     OR p_Bank_name IS NULL OR p_Bank_number IS NULL OR p_Address IS NULL OR p_Room_ID IS NULL 
--     OR p_Uni_ID IS NULL OR p_Student_ID IS NULL OR p_Department IS NULL 
--     THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Không được để trống bất kỳ trường nào trừ avatar và status!';
--     END IF;
--     IF EXISTS (SELECT 1 FROM STUDENT WHERE CCCD_number = p_CCCD_number) THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Đã tồn tại định danh sinh viên!';
--     END IF;
--     IF TIMESTAMPDIFF(YEAR, p_DOB, CURDATE()) < 18 THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Sinh viên phải trên 18 tuổi!';
--     END IF;

--     IF NOT (p_CCCD_number REGEXP '^[0-9]{12}$') THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Định dạng CCCD không hợp lệ!';
--     END IF; 

--     IF NOT (p_Sex = 'M' OR p_Sex = 'F') THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Giới tính không hợp lệ!';
--     END IF;

--     IF NOT (p_Phone REGEXP '^0[1-9][0-9]{8}$') THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Định dạng số điện thoại không hợp lệ!';
--     END IF;

--     IF LOCATE('@', p_Email) = 0 OR LOCATE('.', p_Email) = 0 THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Định dạng email không hợp lệ!';
--     END IF;

--     IF NOT (p_Bank_number REGEXP '^80[0-9]{8}') THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Định dạng số tài khoản ngân hàng không hợp lệ!';
--     END IF;

--     IF NOT (p_Room_ID REGEXP '^[1-4][0-9]{3}$') THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Định dạng mã số phòng không hợp lệ!';
--     END IF;

--     -- Thêm dữ liệu vào bảng nếu không có lỗi
--     INSERT INTO STUDENT(CCCD_number, CCCD_date, Fname, Lname, DOB, Sex, Religion, Ethnicity, Phone, Email, Avatar, Bank_name, Bank_number, Address, Status)
--     VALUES (p_CCCD_number, p_CCCD_date, p_Fname, p_Lname, p_DOB, p_Sex, p_Religion, p_Ethnicity, p_Phone, p_Email, p_Avatar, p_Bank_name, p_Bank_number, p_Address, p_Status);

--     INSERT INTO LIVES_IN(Student_ID, Date_in, Date_out, Room_ID)
--     VALUES (p_CCCD_number, CURDATE(), NULL, p_Room_ID);

--     INSERT INTO STUDIES_IN(CCCD_number, Student_ID, Uni_ID, Department)
--     VALUES (p_CCCD_number, p_Student_ID, p_Uni_ID, p_Department);
-- END //

-- CREATE PROCEDURE DeleteStudent(IN p_CCCD_number VARCHAR(12))
-- BEGIN
--     IF p_CCCD_number IS NULL THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Không được để trống vùng cccd!';
--     END IF;

--     IF NOT EXISTS (SELECT 1 FROM STUDENT WHERE CCCD_number = p_CCCD_number) THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Không tìm thấy sinh viên!';
--     END IF;

--     -- Delete foreign key
--     IF EXISTS (SELECT 1 FROM RELATIVE WHERE Student_ID = p_CCCD_number) THEN
--         DELETE FROM RELATIVE WHERE Student_ID = p_CCCD_number;
--     END IF;

--     IF EXISTS (SELECT 1 FROM STUDIES_IN WHERE CCCD_number = p_CCCD_number) THEN
--         DELETE FROM STUDIES_IN WHERE CCCD_number = p_CCCD_number;
--     END IF;

--     IF EXISTS (SELECT 1 FROM BILL WHERE Student_ID = p_CCCD_number) THEN
--         DELETE FROM BILL WHERE Student_ID = p_CCCD_number;
--     END IF;

--     IF EXISTS (SELECT 1 FROM ROOM WHERE Leader_ID = p_CCCD_number) THEN
--         DELETE FROM ROOM WHERE Leader_ID = p_CCCD_number;
--     END IF;

--     IF EXISTS (SELECT 1 FROM BE_WARNED WHERE Student_ID = p_CCCD_number) THEN
--         DELETE FROM BE_WARNED WHERE Student_ID = p_CCCD_number;
--     END IF;

--     IF EXISTS (SELECT 1 FROM LIVES_IN WHERE Student_ID = p_CCCD_number) THEN
--         DELETE FROM LIVES_IN WHERE Student_ID = p_CCCD_number;
--     END IF;

--     DELETE FROM STUDENT WHERE CCCD_number = p_CCCD_number;
--     SELECT 'Xóa sinh viên thành công!' AS Result;
-- END //

-- CREATE PROCEDURE UpdateStudent(
--     IN p_CCCD_number VARCHAR(12),
--     IN p_CCCD_date DATE,
--     IN p_Fname VARCHAR(50),
--     IN p_Lname VARCHAR(50),
--     IN p_DOB DATE,
--     IN p_Sex CHAR,
--     IN p_Religion VARCHAR(50),
--     IN p_Ethnicity VARCHAR(50),
--     IN p_Phone VARCHAR(10),
--     IN p_Email VARCHAR(50),
--     IN p_Avatar VARCHAR(100),
--     IN p_Bank_name VARCHAR(50),
--     IN p_Bank_number VARCHAR(10),
--     IN p_Address VARCHAR(100),
--     IN p_Status VARCHAR (100),
--     IN p_Room_ID VARCHAR (5),
--     IN p_Uni_ID VARCHAR (1),
--     IN p_Student_ID VARCHAR(8),
--     IN p_Department VARCHAR(100)
-- )
-- BEGIN
--     IF p_CCCD_number IS NULL THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Không được để trống vùng cccd!';
--     END IF;

--     IF p_CCCD_date IS NULL OR p_Fname IS NULL OR p_Lname IS NULL OR p_DOB IS NULL OR p_Sex IS NULL 
--     OR p_Religion IS NULL OR p_Ethnicity IS NULL OR p_Phone IS NULL OR p_Email IS NULL OR p_Bank_name IS NULL 
--     OR p_Bank_number IS NULL OR p_Address IS NULL OR p_Room_ID IS NULL 
--     OR p_Uni_ID IS NULL OR p_Student_ID IS NULL OR p_Department IS NULL 
--     THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Không được để trống bất kỳ trường nào trừ avatar và status!';
--     END IF;

--     IF TIMESTAMPDIFF(YEAR, p_DOB, CURDATE()) < 18 THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Sinh viên phải trên 18 tuổi!';
--     END IF;

--     IF NOT (p_CCCD_number REGEXP '^[0-9]{12}$') THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Định dạng CCCD không hợp lệ!';
--     END IF; 

--     IF NOT (p_Sex = 'M' OR p_Sex = 'F') THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Giới tính không hợp lệ!';
--     END IF;

--     IF NOT (p_Phone REGEXP '^0[1-9][0-9]{8}$') THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Định dạng số điện thoại không hợp lệ!';
--     END IF;

--     IF LOCATE('@', p_Email) = 0 OR LOCATE('.', p_Email) = 0 THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Định dạng email không hợp lệ!';
--     END IF;

--     IF NOT (p_Bank_number REGEXP '^80[0-9]{8}') THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Định dạng số tài khoản ngân hàng không hợp lệ!';
--     END IF;

--     IF NOT EXISTS (SELECT 1 FROM student WHERE CCCD_number = p_CCCD_number) THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Không tìm thấy sinh viên!';
--     END IF;

--     UPDATE student
--     SET
--         CCCD_date = p_CCCD_date,
--         Fname = p_Fname,
--         Lname = p_Lname,
--         DOB = p_DOB,
--         Sex = p_Sex,
--         Religion = p_Religion,
--         Ethnicity = p_Ethnicity,
--         Phone = p_Phone,
--         Email = p_Email,
--         Avatar = p_Avatar,
--         Bank_name = p_Bank_name,
--         Bank_number = p_Bank_number,
--         Address = p_Address,
--         Status = p_Status
--     WHERE CCCD_number = p_CCCD_number;

--     UPDATE LIVES_IN
--     SET
--         Room_ID = p_Room_ID
--     WHERE Student_ID = p_CCCD_number;

--     UPDATE STUDIES_IN
--     SET
--         Uni_ID = p_Uni_ID,
--         Student_ID = p_Student_ID,
--         Department = p_Department
--     WHERE CCCD_number = p_CCCD_number;

--     SELECT 'Cập nhật sinh viên thành công!' AS Result;
-- END //
-- DELIMITER ;

-- --
-- -- 1.2.2
-- --


-- USE chetcom;
-- ALTER TABLE ROOM ADD COLUMN IF NOT EXISTS student_count INT DEFAULT 0;
-- DROP TRIGGER IF EXISTS UpdateStudentCountAfterInsert;
-- DROP TRIGGER IF EXISTS UpdateStudentCountAfterDelete;
-- DROP TRIGGER IF EXISTS UpdateStudentCountAfterUpdate;
-- DROP TRIGGER IF EXISTS UpdateStudentStatusAfterInsert;

-- DROP TRIGGER IF EXISTS UpdateStudentStatusAfterDelete;
-- DELIMITER //
-- USE chetcom //

-- CREATE TRIGGER UpdateStudentCountAfterInsert
--     AFTER INSERT
--     ON LIVES_IN
--     FOR EACH ROW
-- BEGIN
--     DECLARE v_student_count INT;
--     DECLARE v_room_id VARCHAR(4);

--     SET v_room_id = NEW.Room_ID;

--     SET v_student_count = (
--         SELECT COUNT(*)
--         FROM LIVES_IN
--         WHERE Room_ID = v_room_id
--     );

--     UPDATE ROOM
--     SET status = CASE
--             WHEN v_student_count > 0 THEN 'A'
--             ELSE 'F'
--         END,
--         student_count = v_student_count
--     WHERE Room_ID = v_room_id;
-- END //

-- CREATE TRIGGER UpdateStudentCountAfterDelete
--     AFTER DELETE
--     ON LIVES_IN
--     FOR EACH ROW
-- BEGIN
--     DECLARE v_student_count INT;
--     DECLARE v_room_id VARCHAR(4);

--     SET v_room_id = OLD.Room_ID;

--     SET v_student_count = (
--         SELECT COUNT(*)
--         FROM LIVES_IN
--         WHERE Room_ID = v_room_id
--     );

--     UPDATE ROOM
--     SET status = CASE
--             WHEN v_student_count > 0 THEN 'A'
--             ELSE 'F'
--         END,
--         student_count = v_student_count
--     WHERE Room_ID = v_room_id;
-- END //

-- CREATE TRIGGER UpdateStudentCountAfterUpdate
--     AFTER UPDATE
--     ON LIVES_IN
--     FOR EACH ROW
-- BEGIN
--     DECLARE v_old_room_id VARCHAR(4);
--     DECLARE v_new_room_id VARCHAR(4);

--     SET v_old_room_id = OLD.Room_ID;
--     SET v_new_room_id = NEW.Room_ID;

--     IF v_old_room_id IS NOT NULL THEN
--         UPDATE ROOM
--         SET student_count = student_count - 1
--         WHERE Room_ID = v_old_room_id;
--     END IF;

--     UPDATE ROOM
--     SET student_count = student_count + 1
--     WHERE Room_ID = v_new_room_id;

--     UPDATE ROOM
--     SET status = CASE
--             WHEN student_count > 0 THEN 'A'
--             ELSE 'F'
--         END
--     WHERE Room_ID IN (v_old_room_id, v_new_room_id);
-- END //

-- CREATE TRIGGER UpdateStudentStatusAfterInsert
--     AFTER INSERT
--     ON BE_WARNED
--     FOR EACH ROW
-- BEGIN
--     DECLARE v_warn_count INT;
--     DECLARE v_student_ID VARCHAR(12);

--     SET v_student_ID = NEW.Student_ID;

--     SET v_warn_count = (
--         SELECT COUNT(*)
--         FROM BE_WARNED
--         WHERE Student_ID = v_student_ID
--     );

--     IF v_warn_count = 3 THEN
--         UPDATE STUDENT
--         SET Status = 'Bị đuổi'
--         WHERE CCCD_number = v_student_ID;
--     END IF;
-- END //

-- CREATE TRIGGER UpdateStudentStatusAfterDelete
--     AFTER DELETE
--     ON BE_WARNED
--     FOR EACH ROW
-- BEGIN
--     DECLARE v_warn_count INT;
--     DECLARE v_student_ID VARCHAR(12);

--     SET v_student_ID = OLD.Student_ID;

--     SET v_warn_count = (
--         SELECT COUNT(*)
--         FROM BE_WARNED
--         WHERE Student_ID = v_student_ID
--     );

--     IF v_warn_count < 3 THEN
--         UPDATE STUDENT
--         SET Status = 'Đang ở'
--         WHERE CCCD_number = v_student_ID;
--     END IF;
-- END //
-- DELIMITER;

-- --
-- -- 1.2.3
-- --

-- -- Procedure(X) xuất ra danh sách sinh viên (Họ tên, DOB, avatar,...) thuộc phòng X, theo thứ tự ngày nhận phòng.
-- USE chetcom;
-- DROP PROCEDURE IF EXISTS PrintStudentListByDatein;
-- DROP PROCEDURE IF EXISTS PrintGeneralInfo;
-- DELIMITER //
-- USE chetcom //
-- CREATE PROCEDURE PrintStudentListByDatein(IN p_Room_ID VARCHAR(4))
-- BEGIN
--     IF p_Room_ID IS NULL THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Không được để trống vùng mã phòng!';
--     END IF;
--     IF NOT EXISTS (SELECT 1 FROM ROOM WHERE ROOM_ID = p_Room_ID) THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Không tồn tại mã phòng!';
--     END IF;
--     -- DECLARE studentIDList VARCHAR(12);

--     SELECT * 
--     FROM 
--         STUDENT S 
--     RIGHT JOIN
--         LIVES_IN L ON L.Student_ID = S.CCCD_number
--     WHERE
--         L.Room_ID = p_Room_ID
--     ORDER BY L.Date_in ASC;
    

--     -- SELECT Student_ID INTO studentIDList
--     -- FROM lives_in
--     -- WHERE Room_ID = p_Room_ID
--     -- ORDER BY Date_in ASC;

--     -- SELECT *
--     -- FROM student
--     -- WHERE CCCD_number = studentIDList;
-- END //

-- CREATE PROCEDURE PrintGeneralInfo(IN p_Building_name VARCHAR(50))
-- BEGIN
--     IF p_Building_name IS NULL THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Không được để trống vùng tên tòa!';
--     END IF;

--     IF NOT EXISTS (SELECT 1 FROM BUILDING WHERE Name = p_Building_name) THEN
--         SIGNAL SQLSTATE '45000'
--         SET MESSAGE_TEXT = 'Lỗi: Không tồn tại tên tòa!';
--     END IF;

--     SELECT
--         R.Room_ID,
--         R.Bname,
--         COUNT(L.Student_ID) AS StudentCount,
--         AVG(YEAR(NOW()) - YEAR(S.DOB)) AS AvgAge
--     FROM
--         ROOM R
--     LEFT JOIN
--         LIVES_IN L ON R.Room_ID = L.Room_ID
--     LEFT JOIN
--         STUDENT S ON L.Student_ID = S.CCCD_number
--     WHERE
--         R.Bname = p_Building_name
--     GROUP BY
--         R.Room_ID, R.Bname
--     ORDER BY
--         AvgAge ASC;
-- END //

-- DELIMITER ;

-- --
-- -- 1.2.4
-- --

-- USE chetcom;
-- DROP FUNCTION IF EXISTS FindStudentsInMonth;
-- DROP FUNCTION IF EXISTS CalculateExpensesForBuildingMonth;
-- DELIMITER //
-- USE chetcom //
-- CREATE FUNCTION FindStudentsInMonth(p_Month INT)
-- RETURNS VARCHAR(255)
-- BEGIN
--     DECLARE v_result VARCHAR(255);
--     DECLARE v_done BOOLEAN DEFAULT FALSE;
--     DECLARE v_student_id VARCHAR(12);
--     DECLARE v_student_name VARCHAR(100);
--     DECLARE v_student_dob DATE;

--     -- Create iterate
--     DECLARE student_cursor CURSOR FOR
--         SELECT CCCD_number, CONCAT(Lname, ' ', Fname) AS Fullname, DOB
--         FROM STUDENT;

--     DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_done = TRUE;

--     SET v_result = '';

--     OPEN student_cursor;

--     student_loop: LOOP
--         SET v_done = FALSE;

--         -- Iterating over student
--         FETCH student_cursor INTO v_student_id, v_student_name, v_student_dob;

--         -- Check rows
--         IF v_done THEN
--             LEAVE student_loop;
--         END IF;

--         -- Check month
--         IF MONTH(v_student_dob) = p_Month THEN
--             SET v_result = CONCAT(v_result, 'Student ID: ', v_student_id, ', Name: ', v_student_name, ', DOB: ', v_student_dob, '\n');
--         END IF;
--     END LOOP;

--     CLOSE student_cursor;

--     RETURN v_result;
-- END //

-- CREATE FUNCTION CalculateExpensesForBuildingMonth(p_Bname VARCHAR(50), p_Month INT)
-- RETURNS DECIMAL(10, 2)
-- BEGIN
--     DECLARE v_total_expenses DECIMAL(10, 2) DEFAULT 0;
--     DECLARE v_room_id VARCHAR(4);
--     DECLARE v_expense DECIMAL(10, 2);

--     DECLARE v_done BOOLEAN DEFAULT FALSE;

--     -- Create iterate
--     DECLARE room_cursor CURSOR FOR
--         SELECT Room_ID
--         FROM ROOM
--         WHERE Bname = p_Bname;

--     DECLARE CONTINUE HANDLER FOR NOT FOUND SET v_done = TRUE;

--     OPEN room_cursor;

--     -- Start the loop
--     room_loop: LOOP
--         SET v_done = FALSE;
        
--         -- Iterating over room
--         FETCH room_cursor INTO v_room_id;

--         -- Check rows
--         IF v_done THEN
--             LEAVE room_loop;
--         END IF;

--         -- Calculate expenses for the month
--         SELECT IFNULL(SUM(Amount), 0)
--         INTO v_expense
--         FROM BILL B
--         LEFT JOIN STUDENT S ON B.Student_ID = S.CCCD_number 
--         RIGHT JOIN LIVES_IN L ON S.CCCD_number = L.Student_ID AND L.Room_ID = v_room_id
--         WHERE MONTH(B.Date_issue) = p_Month;

--         SET v_total_expenses = v_total_expenses + v_expense;
--     END LOOP;

--     CLOSE room_cursor;

--     RETURN v_total_expenses;
-- END//
-- DELIMITER ;

-- SELECT CalculateExpensesForBuildingMonth('AG4', 6);

--
-- INSERT STUDENT
--

-- SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO STUDENT(CCCD_number, CCCD_date, Fname, Lname, DOB, Sex, Religion, Ethnicity, Phone, Email, Avatar, Bank_name, Bank_number, Address, Status)
VALUES
('083203001513', '2021-04-10', 'Nhân', 'Trần Thiện', '2003-10-30', 'M', 'Không', 'Kinh', '0120031030', 'NhanBK@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/656451.jpg', 'OCB', '8020031030', 'Bến Tre', 'Đang ở'),
('083203001514', '2021-04-10', 'Tân', 'Nguyễn Thái', '2003-11-07', 'M', 'Không', 'Kinh', '0120031107', 'TanBK@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/658020.jpg', 'OCB', '8020031107', 'Bến Tre', 'Đang ở'),
('095201002925', '2021-08-14', 'Linh', 'Phạm Nhật', '2001-02-04', 'M', 'Không', 'Kinh', '0911997511', 'Phamnhatlinh0911997515@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/170835.jpg', 'OCB', '8000731001', 'Bạc Liêu', 'Đang ở'),
('052201010829', '2022-09-22', 'Hùng', 'Phan Văn', '2001-01-03', 'M', 'Không', 'Kinh', '0911997512', 'hung.phanpvh0301@hcmut.edu.vn', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/660616.jpg', 'Agribank', '8061002052', 'Khánh Hòa', 'Đang ở'),
('083201008742', '2021-05-04', 'Phú', 'Nguyễn Thanh', '2002-02-02', 'M', 'Không', 'Kinh', '0868854613', 'phu.nguyen02022001@hcmut.edu.vn', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/034205011193.jpg', 'MB', '8012225663', 'Bến Tre', 'Đang ở'),
('025303001517', '2021-04-10', 'Anh', 'Võ Hữu', '2003-05-20', 'M', 'Không', 'Kinh', '0120030514', 'AnhVH@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/54203002733.jpg', 'ACB', '8020030524', 'Vĩnh Long', 'Đang ở'),
('095201002519', '2021-08-14', 'Đức', 'Nguyễn Thành', '2001-07-12', 'M', 'Không', 'Kinh', '0912998815', 'DucNguyen@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/064205000507.jpg', 'Techcombank', '8001234565', 'Quảng Nam', 'Đang ở'),
('025303001622', '2021-04-10', 'Nam', 'Lê Văn', '2003-06-25', 'M', 'Không', 'Kinh', '0120030616', 'NamLV@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/077204003301.jpg', 'Vietinbank', '8020030626', 'Tiền Giang', 'Đang ở'),

('025303001515', '2021-04-10', 'Yến', 'Lìu Ngọc', '2003-01-01', 'F', 'Không', 'Hoa', '0120030117', 'YenBK@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/644700.jpg', 'OCB', '8020030102', 'Đồng Nai', 'Đang ở'),
('025303001516', '2021-04-10', 'My', 'Lê Phạm Hoàng', '2003-12-14', 'F', 'Không', 'Kinh', '0120031218', 'MyNV@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/659113.jpg', 'OCB', '8020031213', 'Đồng Nai', 'Đang ở'),
('083203001517', '2021-04-10', 'Hương', 'Lê Thị', '2003-09-15', 'F', 'Không', 'Kinh', '0120030919', 'HuongLe@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/038305025344.jpg', 'Vietcombank', '8020030913', 'TP. Hồ Chí Minh', 'Đang ở'),
('052201010618', '2022-09-22', 'Thảo', 'Trần Thị', '2002-04-08', 'F', 'Không', 'Kinh', '0912003020', 'ThaoTran@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/630069.jpg', 'BIDV', '8062003041', 'Hải Phòng', 'Đang ở'),
('083201008719', '2021-05-04', 'Điệp', 'Nguyễn Phương', '2002-11-18', 'F', 'Không', 'Kinh', '0868888821', 'DiepNP@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/074305001855.jpg', 'Sacombank', '8029999999', 'Hà Nội', 'Đang ở'),
('083203001720', '2021-06-01', 'Loan', 'Phạm Thị', '2003-03-14', 'F', 'Không', 'Kinh', '0120030322', 'LoanPT@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/53.jpg', 'HSBC', '8020030315', 'Cần Thơ', 'Đang ở'),
('052201010921', '2022-10-22', 'Ngân', 'Lê Kim', '2001-09-01', 'F', 'Không', 'Kinh', '0912001123', 'NganLe@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/038302016745.jpg', 'ANZ', '8062001120', 'Cần Thơ', 'Đang ở'),
('052201010922', '2022-09-22', 'Nga', 'Hoàng Thuý', '2001-09-01', 'F', 'Không', 'Kinh', '0912001124', 'Nga@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/340.jpg', 'ANZ', '8062001121', 'TP. Hồ Chí Minh', 'Đang ở'),
('052201010923', '2022-12-22', 'Ngọc', 'Trần Lê Kim', '2001-09-01', 'F', 'Không', 'Kinh', '0912001125', 'Ngoc@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/092305006578.jpg', 'ANZ', '8062001122', 'Lâm Đồng', 'Đang ở'),
('052201010925', '2022-11-23', 'Phụng', 'Võ Thị', '2001-09-01', 'F', 'Không', 'Kinh', '0912001122', 'Phung@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/633043.jpg', 'ANZ', '8062001123', 'Lâm Đồng', 'Đang ở'),
('025303001526', '2021-04-18', 'Trúc', 'Lê Thanh', '2003-01-01', 'F', 'Không', 'Hoa', '0120001026', 'TrucBK@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/632923.jpg', 'OCB', '8020030100', 'Đồng Nai', 'Đang ở'),
('025303001527', '2021-01-03', 'Thanh', 'Lê Trúc', '2003-12-14', 'F', 'Không', 'Kinh', '0120031227', 'ThanhNV@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/051305009904.jpg', 'OCB', '8020031212', 'Đồng Nai', 'Đang ở'),

('095201002828', '2021-08-22', 'Ngọc', 'Nguyễn Thế', '2001-10-09', 'M', 'Không', 'Kinh', '0912997628', 'MinhNT@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/648637.jpg', 'Standard Chartered', '8009876543', 'Long An', 'Đang ở'),
('083201008829', '2021-07-07', 'Tùng', 'Nguyễn Minh', '2002-08-27', 'M', 'Không', 'Kinh', '0868777629', 'TungNM@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/086205004782.jpg', 'Shinhan Bank', '8112333444', 'Bà Rịa - Vũng Tàu', 'Đang ở'),
('083203001530', '2021-07-03', 'Hiểu', 'Trần Thế', '2003-10-30', 'M', 'Không', 'Kinh', '0120031032', 'HieuBK@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/628913.jpg', 'OCB', '8020031031', 'Bến Tre', 'Đang ở'),
('083203001531', '2021-04-01', 'Thời', 'Nguyễn Thái', '2003-11-07', 'M', 'Không', 'Kinh', '0120031102', 'Thoi@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/629058.jpg', 'OCB', '8020031109', 'Bến Tre', 'Đang ở'),
('095201002932', '2021-08-14', 'Tân', 'Phạm Nhật', '2001-02-04', 'M', 'Không', 'Kinh', '0911997513', 'Phamnhattan0911997515@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/663312.jpg', 'OCB', '8000731000', 'Bạc Liêu', 'Đang ở'),
('052201010833', '2022-09-22', 'Vũ', 'Phan Văn', '2001-01-03', 'M', 'Không', 'Kinh', '0911997515', 'vu.phanpvh0301@hcmut.edu.vn', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/654931.jpg', 'Agribank', '8061002055', 'Khánh Hòa', 'Đang ở'),
('083201008734', '2021-05-04', 'Liêm', 'Nguyễn Thanh', '2002-02-02', 'M', 'Không', 'Kinh', '0868854632', 'liem.nguyen02022001@hcmut.edu.vn', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/056205000367.jpg', 'MB', '8012225667', 'Bến Tre', 'Đang ở'),
('025303001535', '2021-04-30', 'Tài', 'Võ Hữu', '2003-05-20', 'M', 'Không', 'Kinh', '0120030520', 'TaiVH@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/630148.jpg', 'ACB', '8020030520', 'Nghệ An', 'Đang ở'),
('083201008836', '2021-05-04', 'Mẫn', 'Nguyễn Minh', '2002-08-27', 'M', 'Không', 'Kinh', '0868777666', 'ManNM@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/630544.jpg', 'Shinhan Bank', '8012333444', 'Bà Rịa - Vũng Tàu', 'Đang ở'),
('095201002537', '2021-08-17', 'Tài', 'Nguyễn Thành', '2001-07-12', 'M', 'Không', 'Kinh', '0912998822', 'TaiNguyen@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/657512.jpg', 'Techcombank', '8001234567', 'Quảng Nam', 'Đang ở'),

('025303001538', '2021-04-16', 'Ngà', 'Lã Ngọc', '2003-01-01', 'F', 'Không', 'Hoa', '0120030101', 'NgaBK@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/631882.jpg', 'OCB', '8020030101', 'Đồng Nai', 'Đang ở'),
('025303001539', '2021-07-12', 'Na', 'Lê', '2003-12-14', 'F', 'Không', 'Kinh', '0120031214', 'NaNV@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/631796.jpg', 'OCB', '8020031214', 'Đồng Nai', 'Đang ở'),
('083203001518', '2021-06-10', 'Hương', 'Lê Thanh', '2003-09-15', 'F', 'Không', 'Kinh', '0120030915', 'HuongNV@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/631846.jpg', 'Vietcombank', '8020030915', 'Hồ Chí Minh', 'Đang ở'),
('052201010620', '2022-09-22', 'Thảo', 'Trần Thanh', '2002-04-08', 'F', 'Không', 'Kinh', '0912003040', 'ThaoNV@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/631613.jpg', 'BIDV', '8062003040', 'Hải Phòng', 'Đang ở'),
('083201008721', '2021-05-04', 'Khánh', 'Nguyễn Phương', '2002-11-18', 'F', 'Không', 'Kinh', '0868888888', 'KhanhNP@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/644391.jpg', 'Sacombank', '8019999999', 'Hà Nội', 'Đang ở'),
('025303001640', '2021-06-06', 'Nhàn', 'Lê Thanh', '2003-06-25', 'F', 'Không', 'Kinh', '0120030625', 'NhanLV@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/070305005516.jpg', 'Vietinbank', '8020030625', 'Tiền Giang', 'Đang ở'),
('083203001723', '2021-04-11', 'Linh', 'Phạm Thị', '2003-03-14', 'F', 'Không', 'Kinh', '0120030314', 'LinhPT@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/200066.jpg', 'HSBC', '8020030314', 'Cần Thơ', 'Đang ở'),
('083203001724', '2021-05-10', 'Hoa', 'Trương Thiên', '2003-03-14', 'F', 'Không', 'Kinh', '0120030314', 'HoaTT@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/068305003270.jpg', 'HSBC', '8020030315', 'Cần Thơ', 'Đang ở'),
('083203001725', '2021-04-10', 'Ánh', 'Trịnh Ngọc', '2003-03-14', 'F', 'Không', 'Kinh', '0120030314', 'AnhTN@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/079305021038.jpg', 'HSBC', '8020030316', 'Cần Thơ', 'Đang ở'),
('095201002824', '2021-08-14', 'Anh', 'Nguyễn Kiều', '2001-10-09', 'F', 'Không', 'Kinh', '0912997654', 'AnhNK@gmail.com', 'http://ql.ktxhcm.edu.vn/Data/HinhSV/200356.jpg', 'Standard Chartered', '8009876545', 'Long An', 'Đang ở');
-- SET FOREIGN_KEY_CHECKS = 1;

--
-- INSERT EMPLOYEE
--

-- SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO EMPLOYEE(CCCD_number, CCCD_date, Fname, Lname, DOB, Sex, Religion, Ethnicity, Email, Phone, Address, Bname)
VALUES
('080087001513', '2021-04-10', 'Trọng', 'Trang Sĩ', '1987-10-27', 'M', 'Không', 'Kinh', 'TrongAH1@gmail.com', '0319871027', 'Long An', 'AH1'),
('012096001513', '2021-03-31', 'Thành', 'Nguyễn Sỹ', '1996-03-10', 'M', 'Phật', 'Kinh', 'ThanhAH1@gmail.com', '0319960310', 'Tiền Giang', 'AH1'),
('025099001513', '2021-04-05', 'Vũ', 'Trương Hoàng Nguyên', '1999-09-16', 'M', 'Chúa', 'Kinh', 'VuAH1@gmail.com', '0319990916', 'Đồng Nai', 'AH2'),
('077099001513', '2021-04-05', 'Điềm', 'Nguyễn Minh', '1999-11-29', 'M', 'Không', 'Kinh', 'DiemAH2@gmail.com', '0319991129', 'Bình Thuận', 'AH2'),
('083196001513', '2021-04-05', 'Giang', 'Trần Ngọc Quỳnh', '1996-04-24', 'F', 'Không', 'Kinh', 'GiangAG3@gmail.com', '0319960424', 'Bến Tre', 'AG3'),
('083204001513', '2021-04-05', 'Bảo', 'Ngô Quốc', '2004-01-15', 'M', 'Không', 'Kinh', 'BaoAG3@gmail.com', '0320040115', 'Bến Tre', 'AG3'),
('080080001513', '2021-04-05', 'Phúc', 'Trương Tấn', '1980-01-01', 'M', 'Không', 'Kinh', 'PhucAG4@gmail.com', '0319800101', 'Long An', 'AG4'),
('083098001513', '2021-04-05', 'Quân', 'Nguyễn Phúc Minh', '1998-12-23', 'M', 'Không', 'Kinh', 'QuanAG4@gmail.com', '0319981223', 'Bến Tre', 'AG4'),
('092085001513', '2021-04-10', 'Hương', 'Nguyễn Thị', '1985-08-20', 'F', 'Không', 'Kinh', 'HuongAH1@gmail.com', '0319850820', 'Hồ Chí Minh', 'AH1'),
('038094001513', '2021-03-31', 'Tuấn', 'Trần Văn', '1994-06-15', 'M', 'Không', 'Kinh', 'TuanAH1@gmail.com', '0319940615', 'Đồng Tháp', 'AH1'),
('065088001513', '2021-04-05', 'Linh', 'Đinh Thị Ngọc', '1988-12-05', 'F', 'Không', 'Kinh', 'LinhAH2@gmail.com', '0319881205', 'Cần Thơ', 'AH2'),
('077096001513', '2021-04-05', 'Hải', 'Vũ Đức', '1996-09-10', 'M', 'Không', 'Kinh', 'HaiAH2@gmail.com', '0319960910', 'Bình Dương', 'AH2'),
('063094001513', '2021-04-05', 'Thảo', 'Phan Thị', '1994-07-18', 'F', 'Không', 'Kinh', 'ThaoAG3@gmail.com', '0319940718', 'Bình Phước', 'AG3'),
('087205001513', '2021-04-05', 'Nhật', 'Lê Thị Kim', '2005-03-22', 'F', 'Không', 'Kinh', 'NhatAG3@gmail.com', '0320050322', 'Vũng Tàu', 'AG3'),
('060080001513', '2021-04-05', 'An', 'Nguyễn Minh', '1980-06-30', 'M', 'Không', 'Kinh', 'AnAG4@gmail.com', '0319800630', 'Hồ Chí Minh', 'AG4'),
('093098001513', '2021-04-05', 'Tâm', 'Nguyễn Văn', '1998-02-17', 'M', 'Không', 'Kinh', 'TamAG4@gmail.com', '0319980217', 'Đồng Nai', 'AG4');
-- SET FOREIGN_KEY_CHECKS = 1;

--
-- INSERT MANAGER
--

-- SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO MANAGER(CCCD_number, Mgr_start_date, High_Mgr)
VALUES
('080087001513', '2022-01-01', '083196001513'),
('025099001513', '2022-01-01', '083196001513'),
('083196001513', '2022-01-01', '083196001513'),
('080080001513', '2022-01-01', '083196001513');
-- SET FOREIGN_KEY_CHECKS = 1;

--
-- INSERT BUILDING
--

-- SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO BUILDING(Name, Status, Mgr_ID)
VALUES
('AH1', 'A', '080087001513'),
('AH2', 'A', '025099001513'),
('AG3', 'A', '083196001513'),
('AG4', 'A', '080080001513');
-- SET FOREIGN_KEY_CHECKS = 1;

--
-- INSERT ROOM_TYPE
--

-- SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO ROOM_TYPE(Room_type_ID, Room_type_name, Max_student, Cost)
VALUES
('21', 'Phòng 2 người dịch vụ', 2, 600000),
('60', 'Phòng 6 người không dịch vụ', 6, 250000),
('61', 'Phòng 6 người dịch vụ', 6, 350000),
('80', 'Phòng 8 người không dịch vụ', 8, 150000),
('41', 'Phòng 4 người dịch vụ', 4, 450000),
('40', 'Phòng 4 người không dịch vụ', 4, 300000);
-- SET FOREIGN_KEY_CHECKS = 1;

--
-- INSERT ROOM
--

-- SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO ROOM(Room_ID, Status, Bname, Room_type_ID, Leader_ID)
VALUES
('1101', 'F', 'AH1', '21', '083203001513'),
('1102', 'F', 'AH1', '21', '095201002925'),
('1201', 'F', 'AH1', '21', '083201008742'),
('1202', 'F', 'AH1', '21', '095201002519'),
('2101', 'F', 'AH2', '61', '025303001515'),
('2102', 'F', 'AH2', '60', '052201010921'),
('3101', 'A', 'AG3', '80', '095201002828'),
('3102', 'F', 'AG3', '40', '083201008734'),
('4101', 'F', 'AG4', '40', '025303001538'),
('4102', 'A', 'AG4', '41', '083201008721'),
('4103', 'A', 'AG4', '41', '083203001724');
-- SET FOREIGN_KEY_CHECKS = 1;

--
-- INSERT LIVES_IN
--

-- SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO LIVES_IN(Student_ID, Date_in, Date_out, Room_ID)
VALUES
('083203001513', '2021-09-15', '2022-09-15', '1101'),
('083203001514', '2021-09-15', '2022-09-15', '1101'),
('095201002925', '2021-09-15', '2022-09-15', '1102'),
('052201010829', '2021-09-15', '2022-09-15', '1102'),
('083201008742', '2021-09-15', '2022-09-15', '1201'),
('025303001517', '2021-09-15', '2022-09-15', '1201'),
('095201002519', '2021-09-15', '2022-09-15', '1202'),
('025303001622', '2021-09-15', '2022-09-15', '1202'),

('025303001515', '2021-09-15', '2022-09-15', '2101'),
('025303001516', '2021-09-15', '2022-09-15', '2101'),
('083203001517', '2021-09-15', '2022-09-15', '2101'),
('052201010618', '2021-09-15', '2022-09-15', '2101'),
('083201008719', '2021-09-15', '2022-09-15', '2101'),
('083203001720', '2021-09-15', '2022-09-15', '2101'),
('052201010921', '2021-09-15', '2022-09-15', '2102'),
('052201010922', '2021-09-15', '2022-09-15', '2102'),
('052201010923', '2021-09-15', '2022-09-15', '2102'),
('052201010925', '2021-09-15', '2022-09-15', '2102'),
('025303001526', '2021-09-15', '2022-09-15', '2102'),
('025303001527', '2021-09-15', '2022-09-15', '2102'),

('095201002828', '2021-09-15', '2022-09-15', '3101'),
('083201008829', '2021-09-15', '2022-09-15', '3101'),
('083203001530', '2021-09-15', '2022-09-15', '3101'),
('083203001531', '2021-09-15', '2022-09-15', '3101'),
('095201002932', '2021-09-15', '2022-09-15', '3101'),
('052201010833', '2021-09-15', '2022-09-15', '3101'),
('083201008734', '2021-09-15', '2022-09-15', '3102'),
('025303001535', '2021-09-15', '2022-09-15', '3102'),
('083201008836', '2021-09-15', '2022-09-15', '3102'),
('095201002537', '2021-09-15', '2022-09-15', '3102'),

('025303001538', '2021-09-15', '2022-09-15', '4101'),
('025303001539', '2021-09-15', '2022-09-15', '4101'),
('083203001518', '2021-09-15', '2022-09-15', '4101'),
('052201010620', '2021-09-15', '2022-09-15', '4101'),
('083201008721', '2021-09-15', '2022-09-15', '4102'),
('025303001640', '2021-09-15', '2022-09-15', '4102'),
('083203001723', '2021-09-15', '2022-09-15', '4102'),
('083203001724', '2021-09-15', '2022-09-15', '4103'),
('083203001725', '2021-09-15', '2022-09-15', '4103'),
('095201002824', '2021-09-15', '2022-09-15', '4103');
-- SET FOREIGN_KEY_CHECKS = 1;

--
-- INSERT NOTIFICATION
--

-- SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO NOTIFICATION(Title, Content, Date, Mgr_ID)
VALUES
('Thông báo về Ngày thứ 7 xanh (02-12-2023)', 'Đăng ký liên hệ trưởng toà', '2023-12-01', '083196001513'),
('Thông báo về Ngày thứ 7 xanh (09-12-2023)', 'Đăng ký liên hệ trưởng toà', '2023-12-08', '083196001513'),
('Thông báo về Ngày thứ 7 xanh (16-12-2023)', 'Đăng ký liên hệ trưởng toà', '2023-12-15', '083196001513'),
('Thông báo về Ngày thứ 7 xanh (22-12-2023)', 'Đăng ký liên hệ trưởng toà', '2023-12-22', '083196001513');
-- SET FOREIGN_KEY_CHECKS = 1;

--
-- INSERT RELATIVE
--

-- SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO RELATIVE(Student_ID, Fname, Lname, DOB, Phone, Address, Relationship)
VALUES
('083203001513', 'Hằng', 'Lê Thị Thanh', '1981-10-30', '0219811030', 'Bến Tre', 'Mẹ'),
('083203001514', 'Nhàn', 'Nguyễn Thị Thanh', '1977-11-09', '0219771109', 'Bến Tre', 'Mẹ'),
('095201002925', 'Hồng', 'Dương Thị', '1968-02-14', '0219680212', 'Đồng Nai', 'Mẹ'),
('052201010829', 'Kỳ', 'Đặng Châu', '1969-12-09', '0219691299', 'Đồng Nai', 'Cha'),
('083201008742', 'Bình', 'Võ Hữu', '1985-06-10', '0219850611', 'Vĩnh Long', 'Cha'),
('025303001517', 'Liên', 'Lê Thị', '1979-09-25', '0219790923', 'Hồ Chí Minh', 'Mẹ'),
('095201002519', 'Minh', 'Nguyễn Thanh', '1975-07-22', '0219750222', 'Quảng Nam', 'Cha'),
('025303001622', 'Hoa', 'Trần Thị', '1982-04-28', '0219820424', 'Hải Phòng', 'Mẹ'),

('025303001515', 'Đông', 'Nguyễn Phương', '1978-11-28', '0219781121', 'Hà Nội', 'Cha'),
('025303001516', 'Linh', 'Lê Văn', '1975-03-15', '0219750312', 'Tiền Giang', 'Mẹ'),
('083203001517', 'Tâm', 'Phạm Thanh', '1977-12-01', '0219771200', 'Cần Thơ', 'Mẹ'),
('052201010618', 'Vương', 'Nguyễn Thế', '1979-05-18', '0219790512', 'Long An', 'Cha'),
('083201008719', 'Hồng', 'Lê Thị', '1975-10-09', '0219751099', 'Vũng Tàu', 'Mẹ'),
('083203001720', 'Hồng', 'Lê Thị Thanh', '1975-10-09', '0219741009', 'Vũng Tàu', 'Mẹ'),
('052201010921', 'Ngân', 'Lê Kim', '1975-10-09', '0219751209', 'Vũng Tàu', 'Mẹ'),
('052201010922', 'Hường', 'Thái Thị', '1975-10-09', '0219451009', 'Vũng Tàu', 'Mẹ'),
('052201010923', 'Thoa', 'Trần Kim', '1975-10-09', '0219761009', 'Vũng Tàu', 'Mẹ'),
('052201010925', 'Bích', 'Lương Thị', '1975-10-09', '0219251009', 'Vũng Tàu', 'Mẹ'),
('025303001526', 'Kim', 'Trần Thị', '1975-10-09', '0219752209', 'Vũng Tàu', 'Mẹ'),
('025303001527', 'Thảo', 'Nguyễn Thu', '1978-07-02', '0219870702', 'Bà Rịa - Vũng Tàu', 'Mẹ'),

('095201002828', 'Nga', 'Lê Thị Hằng', '1981-10-30', '0219811003', 'Bến Tre', 'Mẹ'),
('083201008829', 'Tâm', 'Nguyễn Thị Thanh', '1977-11-09', '0219771108', 'Bến Tre', 'Mẹ'),
('083203001530', 'Thắm', 'Lê Thị', '1968-02-14', '0219680214', 'Đồng Nai', 'Mẹ'),
('083203001531', 'Nhàn', 'Đặng Thanh', '1969-12-09', '0219691209', 'Đồng Nai', 'Cha'),
('095201002932', 'Danh', 'Võ Thành', '1985-06-10', '0219850610', 'Vĩnh Long', 'Cha'),
('052201010833', 'Liên', 'Lê Kim', '1979-09-25', '0219790925', 'Hồ Chí Minh', 'Mẹ'),
('083201008734', 'Minh', 'Nguyễn Thành', '1975-07-22', '0219750722', 'Quảng Nam', 'Cha'),
('025303001535', 'Hòa', 'Trần Thị', '1982-04-28', '0219820428', 'Hải Phòng', 'Mẹ'),
('083201008836', 'Vinh', 'Nguyễn Phương', '1978-11-28', '0219781128', 'Hà Nội', 'Cha'),
('095201002537', 'Lan', 'Lê Văn', '1975-03-15', '0219750315', 'Tiền Giang', 'Mẹ'),

('025303001538', 'Tâm', 'Phạm Thị', '1977-12-01', '0219771201', 'Cần Thơ', 'Mẹ'),
('025303001539', 'Hoàng', 'Nguyễn Thế', '1979-05-18', '0219790518', 'Long An', 'Cha'),
('083203001518', 'Vinh', 'Lê Thế', '1975-10-09', '0219751009', 'Vũng Tàu', 'Cha'),
('052201010620', 'Sơn', 'Trần Thái', '1975-10-09', '0219751008', 'Vũng Tàu', 'Cha'),
('083201008721', 'Trí', 'Lê Hữu', '1975-10-09', '0219751007', 'Vũng Tàu', 'Cha'),
('025303001640', 'Trọng', 'Trần Bình', '1975-10-09', '0219751006', 'Vũng Tàu', 'Cha'),
('083203001723', 'Hữu', 'Lưu Bích', '1975-10-09', '0219751005', 'Vũng Tàu', 'Mẹ'),
('083203001724', 'Lệ', 'Lê Thị', '1975-10-09', '0219751004', 'Vũng Tàu', 'Mẹ'),
('083203001725', 'Hồng', 'Vũ Thị', '1975-10-09', '0219751003', 'Vũng Tàu', 'Mẹ'),
('095201002824', 'Thu', 'Nguyễn', '1978-07-02', '0219780702', 'Bà Rịa - Vũng Tàu', 'Mẹ');
-- SET FOREIGN_KEY_CHECKS = 1;

--
-- INSERT STAFF
--

-- SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO STAFF(CCCD_number, Job, Super_CCCD_number)
VALUES
('012096001513', 'Bảo vệ', '080087001513'),
('077099001513', 'Bảo vệ', '025099001513'),
('083204001513', 'Bảo vệ', '083196001513'),
('083098001513', 'Bảo vệ', '080080001513'),
('092085001513', 'Lao công', '080087001513'),
('038094001513', 'Lao công', '080087001513'),
('065088001513', 'Lao công', '025099001513'),
('077096001513', 'Lao công', '025099001513'),
('063094001513', 'Lao công', '083196001513'),
('087205001513', 'Lao công', '083196001513'),
('060080001513', 'Lao công', '080080001513'),
('093098001513', 'Lao công', '080080001513');
-- SET FOREIGN_KEY_CHECKS = 1;

--
-- INSERT UNIVERSITY
--

-- SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO UNIVERSITY(Uni_ID, Name, Uni_Email, Uni_phone)
VALUES
('1', 'Trường Đại học Bách Khoa', 'BK@edu.vn', '0421000000'),
('2', 'Trường Đại học Khoa học Xã hội và Nhân văn', 'NV@edu.vn', '0422000000'),
('3', 'Trường Đại học Công nghệ Thông tin', 'IT@edu.vn', '0423000000'),
('4', 'Trường Đại học Khoa học Tự nhiên', 'US@edu.vn', '0424000000'),
('5', 'Trường Đại học Quốc tế', 'IU@edu.vn', '0425000000');
-- SET FOREIGN_KEY_CHECKS = 1;

--
-- INSERT UNI_ADDRESS
--

-- SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO UNI_ADDRESS(Uni_ID, Uni_address)
VALUES
('1', '21, Đông Hoà, Dĩ An, Bình Dương'),
('2', '22, Đông Hoà, Dĩ An, Bình Dương'),
('3', '23, Đông Hoà, Dĩ An, Bình Dương'),
('4', '24, Đông Hoà, Dĩ An, Bình Dương'),
('5', '25, Đông Hoà, Dĩ An, Bình Dương');
-- SET FOREIGN_KEY_CHECKS = 1;

--
-- INSERT STUDIES_IN
--

-- SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO STUDIES_IN(CCCD_number, Student_ID, Uni_ID, Department)
VALUES
('083203001513', '12111913', '1', 'Khoa Khoa học và Kĩ thuật máy tính'),
('083203001514', '12112256', '1', 'Khoa Khoa học và Kĩ thuật máy tính'),
('095201002925', '12111120', '1', 'Khoa Khoa học và Kĩ thuật máy tính'),
('052201010829', '12111121', '1', 'Khoa Khoa học và Kĩ thuật máy tính'),
('083201008742', '12111122', '1', 'Khoa Khoa học và Kĩ thuật máy tính'),
('025303001517', '12111123', '1', 'Khoa Khoa học và Kĩ thuật máy tính'),
('095201002519', '12111124', '1', 'Khoa Khoa học và Kĩ thuật máy tính'),
('025303001622', '12111125', '1', 'Khoa Khoa học và Kĩ thuật máy tính'),

('025303001515', '52111126', '5', 'Khoa Khoa học và Kĩ thuật máy tính'),
('025303001516', '52111128', '5', 'Khoa Khoa học và Kĩ thuật máy tính'),
('083203001517', '52111118', '5', 'Khoa Khoa học và Kĩ thuật máy tính'),
('052201010618', '42111128', '4', 'Khoa Khoa học và Kĩ thuật máy tính'),
('083201008719', '42211128', '4', 'Khoa Khoa học và Kĩ thuật máy tính'),
('083203001720', '42221128', '4', 'Khoa Khoa học và Kĩ thuật máy tính'),
('052201010921', '32111128', '3', 'Khoa Khoa học và Kĩ thuật máy tính'),
('052201010922', '32211128', '3', 'Khoa Khoa học và Kĩ thuật máy tính'),
('052201010923', '22111128', '2', 'Khoa Khoa học và Kĩ thuật máy tính'),
('052201010925', '22011128', '2', 'Khoa Khoa học và Kĩ thuật máy tính'),
('025303001526', '12111118', '1', 'Khoa Khoa học và Kĩ thuật máy tính'),
('025303001527', '22222256', '2', 'Khoa Ngôn ngữ Ý'),

('095201002828', '22111914', '2', 'Khoa Khoa học và Kĩ thuật máy tính'),
('083201008829', '32112255', '3', 'Khoa Khoa học và Kĩ thuật máy tính'),
('083203001530', '22111128', '2', 'Khoa Khoa học và Kĩ thuật máy tính'),
('083203001531', '12111128', '1', 'Khoa Khoa học và Kĩ thuật máy tính'),
('095201002932', '52111128', '5', 'Khoa Khoa học và Kĩ thuật máy tính'),
('052201010833', '52211128', '5', 'Khoa Khoa học và Kĩ thuật máy tính'),
('083201008734', '42011128', '4', 'Khoa Khoa học và Kĩ thuật máy tính'),
('025303001535', '32211128', '3', 'Khoa Khoa học và Kĩ thuật máy tính'),
('083201008836', '22311128', '2', 'Khoa Khoa học và Kĩ thuật máy tính'),
('095201002537', '32131128', '3', 'Khoa Khoa học và Kĩ thuật máy tính'),

('025303001538', '12111110', '1', 'Khoa Khoa học và Kĩ thuật máy tính'),
('025303001539', '12311128', '1', 'Khoa Khoa học và Kĩ thuật máy tính'),
('083203001518', '12211128', '1', 'Khoa Khoa học và Kĩ thuật máy tính'),
('052201010620', '12111328', '1', 'Khoa Khoa học và Kĩ thuật máy tính'),
('083201008721', '32114128', '3', 'Khoa Khoa học và Kĩ thuật máy tính'),
('025303001640', '32121128', '3', 'Khoa Khoa học và Kĩ thuật máy tính'),
('083203001723', '32112268', '3', 'Khoa Khoa học và Kĩ thuật máy tính'),
('083203001724', '42111155', '4', 'Khoa Khoa học và Kĩ thuật máy tính'),
('083203001725', '42311128', '4', 'Khoa Khoa học và Kĩ thuật máy tính'),
('095201002824', '52222256', '5', 'Khoa Ngôn ngữ Ý');
-- SET FOREIGN_KEY_CHECKS = 1;


--
-- INSERT WARNING
--

-- SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO WARNING(Date, Detail, Note, Mgr_ID, Type)
VALUES
('2022-12-31', 'Cảnh cáo về trễ', 'lần 1', '080087001513', 'Cảnh cáo'),
('2022-12-31', 'Cảnh cáo về trễ', 'lần 2', '080087001513', 'Cảnh cáo'),
('2022-12-31', 'Cảnh cáo về trễ', 'lần 1', '025099001513', 'Cảnh cáo'),
('2022-12-31', 'Cảnh cáo về trễ', 'lần 2', '025099001513', 'Cảnh cáo');
-- SET FOREIGN_KEY_CHECKS = 1;

--
-- INSERT WORK_IN
--

-- SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO WORK_IN(Employee_ID, Date_in, Date_out, Bname)
VALUES
('080087001513', '2022-01-01', '2026-01-01', 'AH1'),
('012096001513', '2022-01-01', '2026-01-01', 'AH1'),
('025099001513', '2022-01-01', '2026-01-01', 'AH2'),
('077099001513', '2022-01-01', '2026-01-01', 'AH2'),
('083196001513', '2022-01-01', '2026-01-01', 'AG3'),
('083204001513', '2022-01-01', '2026-01-01', 'AG3'),
('080080001513', '2022-01-01', '2026-01-01', 'AG4'),
('083098001513', '2022-01-01', '2026-01-01', 'AG4'),
('092085001513', '2022-01-01', '2026-01-01', 'AH1'),
('038094001513', '2022-01-01', '2026-01-01', 'AH1'),
('065088001513', '2022-01-01', '2026-01-01', 'AH2'),
('077096001513', '2022-01-01', '2026-01-01', 'AH2'),
('063094001513', '2022-01-01', '2026-01-01', 'AG3'),
('087205001513', '2022-01-01', '2026-01-01', 'AG3'),
('060080001513', '2022-01-01', '2026-01-01', 'AG4'),
('093098001513', '2022-01-01', '2026-01-01', 'AG4');
-- SET FOREIGN_KEY_CHECKS = 1;

--
-- INSERT BE_WARNED
--

-- SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO BE_WARNED(Student_ID)
VALUES
('083203001514'),
('083203001514'),
('052201010829'),
('052201010829');
-- SET FOREIGN_KEY_CHECKS = 1;

--
-- INSERT BILL
--

-- SET FOREIGN_KEY_CHECKS = 0;
INSERT INTO BILL(Detail, Amount, Date_issue, Date_paid, Date_expire, Mgr_ID, Student_ID)
VALUES
('Tiền nước', 20000, '2023-06-01', '2023-06-02', '2023-06-15', '080080001513', '083203001513'),
('Tiền điện', 20000, '2023-06-01', '2023-06-02', '2023-06-15', '080080001513', '083203001513'),
('Tiền điện', 35000, '2023-06-01', '2023-06-02', '2023-06-15', '083196001513', '095201002925'),
('Tiền nước', 15000, '2023-06-01', '2023-06-02', '2023-06-15', '083196001513', '095201002925');
-- SET FOREIGN_KEY_CHECKS = 1;
