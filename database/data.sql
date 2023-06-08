
--INSERT INTO Address (Id, Street, City, ZipCode) VALUES (101, '404 Saratoga Ave', 'Santa Clara', '95051');
--INSERT INTO Address (Id, Street, City, ZipCode) VALUES (102, '123 Main St', 'Los Angeles', '90001');
--INSERT INTO Address (Id, Street, City, ZipCode) VALUES (103, '789 Elm St', 'New York', '10001');
--INSERT INTO Address (Id, Street, City, ZipCode) VALUES (104, '456 Oak Ave', 'Chicago', '60601');
--INSERT INTO Address (Id, Street, City, ZipCode) VALUES (105, '987 Pine Rd', 'San Francisco', '94101');
--INSERT INTO Address (Id, Street, City, ZipCode) VALUES (106, '321 Maple Dr', 'Seattle', '98101');


INSERT INTO Branch (BranchNumber, BranchPhone, Street, City, ZipCode) VALUES (01, 8134044040, '404 Saratoga Ave', 'Santa Clara', '95051');
INSERT INTO Branch (BranchNumber, BranchPhone, Street, City, ZipCode) VALUES (02, 1234567890, '123 Main St', 'Los Angeles', '90001');
INSERT INTO Branch (BranchNumber, BranchPhone, Street, City, ZipCode) VALUES (03, 9876543210, '789 Elm St', 'Sunnyvale', '93001');
INSERT INTO Branch (BranchNumber, BranchPhone, Street, City, ZipCode) VALUES (04, 5551234567, '456 Oak Ave', 'San Diego', '90601');
INSERT INTO Branch (BranchNumber, BranchPhone, Street, City, ZipCode) VALUES (05, 8889990000, '987 Pine Rd', 'San Francisco', '94101');
INSERT INTO Branch (BranchNumber, BranchPhone, Street, City, ZipCode) VALUES (06, 1112223333, '321 Maple Dr', 'Malibu', '98101');

----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID) VALUES (1, 'John Smith', 7777777777, TO_DATE('2003/05/03', 'yyyy/mm/dd'), 'staff', 01);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID) VALUES (2, 'Jane Doe', 8888888888, TO_DATE('2005/10/15', 'yyyy/mm/dd'), 'manager', 02);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID) VALUES (3, 'Mike Johnson', 9999999999, TO_DATE('2010/07/01', 'yyyy/mm/dd'), 'supervisor', 03);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID) VALUES (4, 'Emily Williams', 6666666666, TO_DATE('2012/02/22', 'yyyy/mm/dd'), 'staff', 04);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID) VALUES (5, 'Robert Davis', 5555555555, TO_DATE('2018/09/10', 'yyyy/mm/dd'), 'manager', 05);
INSERT INTO Employee (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID) VALUES (6, 'Sarah Thompson', 4444444444, TO_DATE('2020/04/05', 'yyyy/mm/dd'), 'supervisor', 06);

----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

INSERT INTO Owner(OwnerId, OwnerPhone, OwnerName, Street, City, ZipCode) VALUES (11, 8453657652, 'Henry Ford', '678 Lincoln Rd', 'Seattle', '80713' );
INSERT INTO Owner (OwnerId, OwnerPhone, OwnerName, Street, City, ZipCode) VALUES (12, 9876543210, 'Alice Johnson', '123 Elm St', 'Los Angeles', '90001');
INSERT INTO Owner (OwnerId, OwnerPhone, OwnerName, Street, City, ZipCode) VALUES (13, 5551112222, 'Michael Smith', '456 Oak Ave', 'Chicago', '60601');
INSERT INTO Owner (OwnerId, OwnerPhone, OwnerName, Street, City, ZipCode) VALUES (14, 8889990000, 'Emily Davis', '789 Maple Dr', 'New York', '10001');
INSERT INTO Owner (OwnerId, OwnerPhone, OwnerName, Street, City, ZipCode) VALUES (15, 3334445555, 'Robert Johnson', '987 Pine Rd', 'San Francisco', '94101');
INSERT INTO Owner (OwnerId, OwnerPhone, OwnerName, Street, City, ZipCode) VALUES (16, 1112223333, 'Sarah Thompson', '321 Oak St', 'Seattle', '98101');

----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, NoOfRooms, Rent, StartAvlDate, OwnerId) VALUES (1111, '123 Main St', 'Los Angeles', '90001', 3, 1500.00, TO_DATE('2023/06/01', 'yyyy/mm/dd'), 11);
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, NoOfRooms, Rent, StartAvlDate, OwnerId) VALUES (1112, '456 Elm St', 'New York', '10001', 2, 1200.00, TO_DATE('2023/07/01', 'yyyy/mm/dd'), 11);
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, NoOfRooms, Rent, StartAvlDate, OwnerId) VALUES (1113, '789 Oak Ave', 'Chicago', '60601', 4, 2000.00, TO_DATE('2023/08/01', 'yyyy/mm/dd'), 12);
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, NoOfRooms, Rent, StartAvlDate, OwnerId) VALUES (1114, '987 Pine Rd', 'San Francisco', '94101', 1, 900.00, TO_DATE('2023/09/01', 'yyyy/mm/dd'), 13);
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, NoOfRooms, Rent, StartAvlDate, OwnerId) VALUES (1115, '321 Maple Dr', 'Seattle', '98101', 3, 1600.00, TO_DATE('2023/10/01', 'yyyy/mm/dd'), 11);
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, NoOfRooms, Rent, StartAvlDate, OwnerId) VALUES (1116, '555 Oak St', 'Houston', '77002', 2, 1300.00, TO_DATE('2023/11/01', 'yyyy/mm/dd'), 14);
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, NoOfRooms, Rent, StartAvlDate, OwnerId) VALUES (1117, '777 Elm St', 'Atlanta', '30303', 1, 950.00, TO_DATE('2023/12/01', 'yyyy/mm/dd'), 15);
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, NoOfRooms, Rent, StartAvlDate, OwnerId) VALUES (1118, '999 Oak Ave', 'Dallas', '75201', 3, 1800.00, TO_DATE('2024/01/01', 'yyyy/mm/dd'), 16);
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, NoOfRooms, Rent, StartAvlDate, OwnerId) VALUES (1119, '222 Pine Rd', 'Miami', '33130', 2, 1400.00, TO_DATE('2024/02/01', 'yyyy/mm/dd'), 15);
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, NoOfRooms, Rent, StartAvlDate, OwnerId) VALUES (1120, '444 Maple Dr', 'Boston', '02108', 4, 2200.00, TO_DATE('2024/03/01', 'yyyy/mm/dd'), 14);
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, NoOfRooms, Rent, StartAvlDate, OwnerId) VALUES (1121, '666 Oak St', 'Philadelphia', '19103', 2, 1100.00, TO_DATE('2024/04/01', 'yyyy/mm/dd'), 12);



----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


INSERT INTO LeaseAgreement (AgreementId, RPNumber, RPStreet, RPCity, RPZipCode, RenterName, RenterHomePhone, RenterWorkPhone, Rent, Deposit, StartDate, EndDate) VALUES (10101, 1111, '123 Main St', 'Los Angeles', '90001', 'Samntha Sander', 6543567265, 5435627876, 1500.0, 1500.0, TO_DATE('2023/06/01', 'yyyy/mm/dd'),TO_DATE('2024/06/01', 'yyyy/mm/dd'));


CREATE OR REPLACE PROCEDURE UpdatePropertyStatus AS
BEGIN
  FOR lease IN (SELECT RPNumber, StartDate, EndDate FROM LeaseAggrement) LOOP
    IF lease.StartDate < SYSDATE AND lease.EndDate > SYSDATE THEN
      UPDATE RentalProperty SET PropertyStatus = 'leased' WHERE RPNumber = lease.RPNumber;
    ELSIF lease.StartDate > SYSDATE AND lease.EndDate > SYSDATE THEN
      UPDATE RentalProperty SET PropertyStatus = 'not-available' WHERE RPNumber = lease.RPNumber;
    ELSE
      UPDATE RentalProperty SET PropertyStatus = 'available' WHERE RPNumber = lease.RPNumber;
    END IF;
  END LOOP;
  COMMIT;
  DBMS_OUTPUT.PUT_LINE('PropertyStatus updated successfully.');
EXCEPTION
  WHEN OTHERS THEN
    ROLLBACK;
    DBMS_OUTPUT.PUT_LINE('Error updating PropertyStatus: ' || SQLERRM);
END;


