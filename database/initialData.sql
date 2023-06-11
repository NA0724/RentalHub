



INSERT INTO Branch (BranchNumber, BranchPhone, Street, City, ZipCode) VALUES (01, 8134044040, '404 Saratoga Ave', 'Santa Clara', '95051');
INSERT INTO Branch (BranchNumber, BranchPhone, Street, City, ZipCode) VALUES (02, 7483921478, '123 Main St', 'Los Angeles', '90001');
INSERT INTO Branch (BranchNumber, BranchPhone, Street, City, ZipCode) VALUES (03, 7128944387, '789 Elm St', 'Sunnyvale', '93001');
INSERT INTO Branch (BranchNumber, BranchPhone, Street, City, ZipCode) VALUES (04, 1378219432, '456 Oak Ave', 'San Diego', '90601');
INSERT INTO Branch (BranchNumber, BranchPhone, Street, City, ZipCode) VALUES (05, 4290813974, '987 Pine Rd', 'San Francisco', '94101');
INSERT INTO Branch (BranchNumber, BranchPhone, Street, City, ZipCode) VALUES (06, 1903820173, '321 Maple Dr', 'Malibu', '98101');
INSERT INTO Branch (BranchNumber, BranchPhone, Street, City, ZipCode) VALUES (07, 1398208749, '555 Cedar Ln', 'San Jose', '95101');
INSERT INTO Branch (BranchNumber, BranchPhone, Street, City, ZipCode) VALUES (08, 1932791081, '222 Birch St', 'Oakland', '94601');
INSERT INTO Branch (BranchNumber, BranchPhone, Street, City, ZipCode) VALUES (09, 8219701832, '777 Oak Rd', 'Sacramento', '95801');
INSERT INTO Branch (BranchNumber, BranchPhone, Street, City, ZipCode) VALUES (10, 8290183092, '333 Elm Ave', 'Fresno', '93701');

----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


-- Employees
-- Employees for Branch 1
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (1, 'John Smith', 4087521394, TO_DATE('2003/05/03', 'yyyy/mm/dd'), 'manager', 1, NULL);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (2, 'Jane Doe', 4087521395, TO_DATE('2005/10/15', 'yyyy/mm/dd'), 'supervisor', 1, 1);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (3, 'Mike Johnson', 4087521396, TO_DATE('2010/07/01', 'yyyy/mm/dd'), 'staff', 1, 2);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (4, 'Emily Williams', 4087521397, TO_DATE('2012/02/22', 'yyyy/mm/dd'), 'staff', 1, 2);
-- Add more employees for Branch 1 if needed

-- Employees for Branch 2
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (5, 'Robert Davis', 4087521398, TO_DATE('2018/09/10', 'yyyy/mm/dd'), 'manager', 2, NULL);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (6, 'Sarah Thompson', 4087521399, TO_DATE('2020/04/05', 'yyyy/mm/dd'), 'supervisor', 2, 5);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (7, 'Abi', 4087531393, TO_DATE('2020/09/03', 'yyyy/mm/dd'), 'supervisor', 2, 5);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (8, 'Neha Raj', 3894243234, TO_DATE('2021/01/03', 'yyyy/mm/dd'), 'supervisor', 2, 5);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (9, 'Batri', 7324230532, TO_DATE('2009/05/03', 'yyyy/mm/dd'), 'staff', 2, 6);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (10, 'Amber Wang', 6891230877, TO_DATE('2007/05/03', 'yyyy/mm/dd'), 'staff', 2, 6);
-- Add more employees for Branch 2 if needed

-- Employees for Branch 3
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (11, 'Steven West', 121087323, TO_DATE('2020/04/05', 'yyyy/mm/dd'), 'manager', 3, NULL);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (12, 'Sarah Hank', 9798123644, TO_DATE('2020/04/05', 'yyyy/mm/dd'), 'supervisor', 3, 11);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (13, 'David Wilson', 1234567891, TO_DATE('2021/01/01', 'yyyy/mm/dd'), 'staff', 3, 12);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (14, 'Michael Johnson', 5552228888, TO_DATE('2016/07/15', 'yyyy/mm/dd'), 'staff', 3, 12);
-- Employees for Branch 4
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (15, 'Emily Adams', 4087521400, TO_DATE('2019/02/10', 'yyyy/mm/dd'), 'manager', 4, NULL);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (16, 'Jacob Smith', 4087521401, TO_DATE('2020/09/01', 'yyyy/mm/dd'), 'supervisor', 4, 15);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (17, 'Olivia Wilson', 4087521402, TO_DATE('2020/12/01', 'yyyy/mm/dd'), 'staff', 4, 16);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (18, 'Sophia Clark', 4087521403, TO_DATE('2021/04/01', 'yyyy/mm/dd'), 'staff', 4, 16);
-- Add more employees for Branch 4 if needed

-- Employees for Branch 5
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (19, 'Jessica Adams', 4087521404, TO_DATE('2018/12/01', 'yyyy/mm/dd'), 'manager', 5, NULL);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (20, 'David Williams', 4087521405, TO_DATE('2019/06/10', 'yyyy/mm/dd'), 'supervisor', 5, 19);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (21, 'Sophie Turner', 4087521406, TO_DATE('2020/03/15', 'yyyy/mm/dd'), 'staff', 5, 20);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (22, 'Daniel Scott', 4087521407, TO_DATE('2021/01/01', 'yyyy/mm/dd'), 'staff', 5, 20);
-- Add more employees for Branch 5 if needed

-- Employees for Branch 6
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (23, 'Emily Johnson', 4087521408, TO_DATE('2019/07/01', 'yyyy/mm/dd'), 'manager', 6, NULL);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (24, 'Sophia Wilson', 4087521409, TO_DATE('2020/01/15', 'yyyy/mm/dd'), 'supervisor', 6, 23);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (25, 'Oliver Davis', 4087521410, TO_DATE('2020/05/10', 'yyyy/mm/dd'), 'staff', 6, 24);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (26, 'Emma Adams', 4087521411, TO_DATE('2021/02/01', 'yyyy/mm/dd'), 'staff', 6, 24);
-- Add more employees for Branch 6 if needed

-- Employees for Branch 7
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (27, 'Matthew Smith', 4087521412, TO_DATE('2021/01/01', 'yyyy/mm/dd'), 'manager', 7, NULL);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (28, 'Olivia Johnson', 4087521413, TO_DATE('2021/02/15', 'yyyy/mm/dd'), 'supervisor', 7, 27);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (29, 'James Wilson', 4087521414, TO_DATE('2021/03/01', 'yyyy/mm/dd'), 'staff', 7, 28);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (30, 'Sophia Adams', 4087521415, TO_DATE('2021/04/15', 'yyyy/mm/dd'), 'staff', 7, 28);
-- Add more employees for Branch 7 if needed

-- Employees for Branch 8
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (31, 'Daniel Johnson', 4087521416, TO_DATE('2021/05/01', 'yyyy/mm/dd'), 'manager', 8, NULL);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (32, 'Ava Wilson', 4087521417, TO_DATE('2021/06/15', 'yyyy/mm/dd'), 'supervisor', 8, 31);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (33, 'Benjamin Adams', 4087521418, TO_DATE('2021/07/01', 'yyyy/mm/dd'), 'staff', 8, 32);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (34, 'Emma Clark', 4087521419, TO_DATE('2021/08/15', 'yyyy/mm/dd'), 'staff', 8, 32);
-- Add more employees for Branch 8 if needed

-- Employees for Branch 9
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (35, 'Ethan Wilson', 4087521420, TO_DATE('2021/09/01', 'yyyy/mm/dd'), 'manager', 9, NULL);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (36, 'Ava Davis', 4087521421, TO_DATE('2021/10/15', 'yyyy/mm/dd'), 'supervisor', 9, 35);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (37, 'Noah Johnson', 4087521422, TO_DATE('2021/11/01', 'yyyy/mm/dd'), 'staff', 9, 36);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (38, 'Sophia Clark', 4087521423, TO_DATE('2021/12/15', 'yyyy/mm/dd'), 'staff', 9, 36);
-- Add more employees for Branch 9 if needed

-- Employees for Branch 10
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (39, 'Mason Adams', 4087521424, TO_DATE('2022/01/01', 'yyyy/mm/dd'), 'manager', 10, NULL);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (40, 'Olivia Johnson', 4087521425, TO_DATE('2022/02/15', 'yyyy/mm/dd'), 'supervisor', 10, 39);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (41, 'James Wilson', 4087521426, TO_DATE('2022/03/01', 'yyyy/mm/dd'), 'staff', 10, 40);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID) VALUES (42, 'Sophia Clark', 4087521427, TO_DATE('2022/04/15', 'yyyy/mm/dd'), 'staff', 10, 40);
-- Continue adding employees for the remaining branches with the appropriate designations and relationships.

----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

INSERT INTO Owner (OwnerPhone, OwnerName, Street, City, ZipCode) VALUES (4087521428, 'Emily Johnson', '456 Oak Ave', 'Chicago', '60603');
INSERT INTO Owner (OwnerPhone, OwnerName, Street, City, ZipCode) VALUES (4087521429, 'Daniel Davis', '789 Maple Dr', 'New York', '10003');
INSERT INTO Owner (OwnerPhone, OwnerName, Street, City, ZipCode) VALUES (4087521430, 'Olivia Thompson', '987 Pine Rd', 'San Francisco', '94104');
INSERT INTO Owner (OwnerPhone, OwnerName, Street, City, ZipCode) VALUES (4087521431, 'Sophia Wilson', '321 Oak St', 'Seattle', '98104');
INSERT INTO Owner (OwnerPhone, OwnerName, Street, City, ZipCode) VALUES (5678901234, 'James Johnson', '678 Lincoln Rd', 'Seattle', '98105');
INSERT INTO Owner (OwnerPhone, OwnerName, Street, City, ZipCode) VALUES (6789012345, 'Emma Davis', '123 Elm St', 'Los Angeles', '90004');
INSERT INTO Owner (OwnerPhone, OwnerName, Street, City, ZipCode) VALUES (7890123456, 'Noah Thompson', '456 Oak Ave', 'Chicago', '60605');
INSERT INTO Owner (OwnerPhone, OwnerName, Street, City, ZipCode) VALUES (8901234567, 'Sophia Davis', '789 Maple Dr', 'New York', '10005');
INSERT INTO Owner (OwnerPhone, OwnerName, Street, City, ZipCode) VALUES (9012345678, 'James Johnson', '987 Pine Rd', 'San Francisco', '94105');
INSERT INTO Owner (OwnerPhone, OwnerName, Street, City, ZipCode) VALUES (0123456789, 'Olivia Wilson', '321 Oak St', 'Seattle', '98106');
INSERT INTO Owner (OwnerPhone, OwnerName, Street, City, ZipCode) VALUES (9876543210, 'Emma Davis', '678 Lincoln Rd', 'Seattle', '98107');
INSERT INTO Owner (OwnerPhone, OwnerName, Street, City, ZipCode) VALUES (8765432109, 'William Johnson', '123 Elm St', 'Los Angeles', '90005');
-- Add more tuples for the Owner table if needed



----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
