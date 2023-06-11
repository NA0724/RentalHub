--test data fof all constraints:

-- Rental Property 1
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1111, '123 Main St', 'Los Angeles', '90001', 3, 1500.00, 'available', 4087521428);

-- Rental Property 2
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1112, '456 Elm St', 'New York', '10001', 2, 1200.00, 'available', 4087521429);

-- Rental Property 3
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1113, '789 Oak Ave', 'Chicago', '60601', 4, 2000.00, 'available', 4087521430);

-- Rental Property 4
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1114, '987 Pine Rd', 'San Francisco', '94101', 1, 900.00, 'available', 4087521431);

-- Rental Property 5
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1115, '321 Maple Dr', 'Seattle', '98101', 3, 1600.00, 'available', 5678901234);

-- Rental Property 6
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1116, '555 Oak St', 'Houston', '77002', 2, 1300.00, 'available', 6789012345);

-- Rental Property 7
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1117, '777 Elm St', 'Atlanta', '30303', 1, 950.00, 'available', 7890123456);

-- Rental Property 8
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1118, '999 Oak Ave', 'Dallas', '75201', 3, 1800.00, 'available', 8901234567);

-- Rental Property 9
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1119, '222 Pine Rd', 'Miami', '33130', 2, 1400.00, 'available', 9012345678);

-- Rental Property 10
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1120, '444 Maple Dr', 'Boston', '02108', 4, 2200.00, 'available', 8901234567);

-- Rental Property 11
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1121, '666 Oak St', 'Philadelphia', '19103', 2, 1100.00, 'available', 9876543210);
-- Rental Property 12
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1122, '888 Elm St', 'Chicago', '60606', 1, 1000.00, 'available', 4087521428);

-- Rental Property 13
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1123, '999 Maple Dr', 'New York', '10007', 3, 1800.00, 'available', 4087521429);

-- Rental Property 14
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1124, '777 Pine Rd', 'San Francisco', '94102', 2, 1300.00, 'available', 4087521430);

-- Rental Property 15
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1125, '444 Oak St', 'Seattle', '98102', 1, 950.00, 'available', 4087521431);

-- Rental Property 16
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1126, '555 Maple Dr', 'Los Angeles', '90006', 3, 1600.00, 'available', 5678901234);

-- Rental Property 17
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1127, '777 Oak Ave', 'Chicago', '60607', 2, 1200.00, 'available', 6789012345);

-- Rental Property 18
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1128, '999 Pine Rd', 'New York', '10008', 4, 2000.00, 'available', 7890123456);

-- Rental Property 19
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1129, '222 Oak St', 'San Francisco', '94103', 3, 1500.00, 'available', 8901234567);

-- Rental Property 20
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1130, '444 Pine Rd', 'Seattle', '98103', 2, 1200.00, 'available', 9012345678);

-- Rental Property 21
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1131, '666 Maple Dr', 'Los Angeles', '90007', 4, 2000.00, 'available', 0123456789);

-- Rental Property 22
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1132, '888 Oak Ave', 'Chicago', '60608', 1, 950.00, 'available', 9876543210);

-- Rental Property 23
INSERT INTO RentalProperty (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone) VALUES (1133, '999 Maple Dr', 'New York', '10009', 3, 1700.00, 'available', 8765432109);


INSERT INTO LeaseAgreement (RPNumber, RPStreet, RPCity, RPZipCode, RenterName, RenterHomePhone, RenterWorkPhone, Rent, Deposite, StartDate, EndDate) VALUES (1133, '999 Maple Dr', 'New York', '10009', 'Samntha Sander', 6543567265, 5435627876, 1700.0, 1700.0, TO_DATE('2023/06/01', 'yyyy/mm/dd'),TO_DATE('2024/05/20', 'yyyy/mm/dd'));



COMMIT;




