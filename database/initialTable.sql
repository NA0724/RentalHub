--spool out
set serveroutput on
set echo on
set time on
set timing on
spool res.log
--


create table Branch(
	BranchNumber int primary key,
	BranchPhone numeric(20) unique not null,
    Street VARCHAR(20),
	City VARCHAR(20),
	ZipCode VARCHAR(20)
);

create table Employee(
	EmployeeId int primary key,
    EmpName varchar2(20),
	EmpPhoneNo numeric(20) unique not null,
	EmpStartDate DATE,
    JobDesignation VARCHAR(20) CHECK (jobDesignation IN ('staff', 'manager', 'supervisor')),
    BranchID int,
	ManagerID int,
    FOREIGN KEY (BranchID) REFERENCES Branch(BranchNumber)
);



CREATE TABLE OWNER(
	OwnerPhone numeric(20) primary key,
	OwnerName varchar2(20),
	Street VARCHAR(20),
	City VARCHAR(20),
	ZipCode VARCHAR(20)
);

CREATE TABLE RentalProperty(
	RPNumber int primary key, 
	Street VARCHAR(20),
	City VARCHAR(20),
	ZipCode VARCHAR(20),
	-- FOREIGN KEY (AddressId) REFERENCES Address(AddressId),
	RoomNo int CHECK(RoomNo > 0),
	Rent real CHECK(rent >= 0),
	PropertyStatus VARCHAR(20) CHECK(PropertyStatus IN ('available', 'not-available' ,'leased')),
	OwnerPhone numeric(20) not NULL,
	-- SupervisorID int,
	FOREIGN KEY (OwnerPhone) REFERENCES  OWNER(OwnerPhone)
	-- FOREIGN KEY (SupervisorID) REFERENCES  Employee(EmployeeId)
	--add empid
);



CREATE TABLE LeaseAgreement(
	-- AgreementId int PRIMARY KEY,
	RPNumber int,
	RPStreet varchar(20),
	RPCity varchar(20),
	RPZipCode varchar(20),
	RenterName varchar2(20),
	RenterHomePhone numeric(20),
	RenterWorkPhone numeric(20),
	rent real CHECK(rent >= 0),
	Deposite real ,
	StartDate DATE,
	--duration int,
	EndDate DATE ,
	primary key(RPNumber, RenterHomePhone),
	FOREIGN KEY (RPNumber) REFERENCES  RentalProperty(RPNumber)
);

CREATE TABLE Supervise(
	RPNumber int,
	SupId int,
	-- NoofHouse int CHECK(NoofHouse in (1,2,3)),
	PRIMARY KEY (RPNumber,SupId),
	FOREIGN KEY (RPNumber) REFERENCES  RentalProperty(RPNumber),
	FOREIGN KEY (SupId) REFERENCES Employee(EmployeeId)
);

ALTER TABLE LeaseAggrement
	
	ADD CONSTRAINT check_deposit_rent CHECK (deposit = rent);
	ADD CONSTRAINT check_end_date CHECK(EndDate = ADD_MONTHS(StartDate, 6) or EndDate = ADD_MONTHS(StartDate, 12) );


spool off;