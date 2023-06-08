--spool out
set serveroutput on
set echo on
set time on
set timing on
spool /home/nliang/DB/Project/result.log
--

-- CREATE TABLE Address (
--	Id INT PRIMARY KEY,
--	Street VARCHAR,
--	City VARCHAR,
--	ZipCode VARCHAR
--);

create table Branch(
	BranchNumber int primary key,
	BranchPhone numeric(20) unique not null,
    Street VARCHAR,
	City VARCHAR,
	ZipCode VARCHAR
);

create table Employee(
	EmployeeId numeric(20) primary key,
    EmpName varchar2(20),
	EmpPhoneNo numeric(20) unique not null,
	EmpStartDate DATE,
    JobDesignation VARCHAR(20) CHECK (jobDesignation IN ('staff', 'manager', 'supervisor')),
    BranchID int,
    FOREIGN KEY (BranchID) REFERENCES Branch(BranchNumber)
);



CREATE TABLE OWNER(
	OwnerId int PRIMARY KEY,
	OwnerPhone numeric(20),
	OwnerName varchar2(20),
	Street VARCHAR,
	City VARCHAR,
	ZipCode VARCHAR
);

CREATE TABLE RentalProperty(
	RPNumber numeric(20) primary key, 
	Street VARCHAR,
	City VARCHAR,
	ZipCode VARCHAR,
	NoOfRooms int CHECK(RoomNo > 0),
	Rent real CHECK(rent >= 0),
	PropertyStatus VARCHAR(20) CHECK(PropertyStatus IN ('available', 'not-available' ,' leased')),
	StartAvlDate DATE,
	OwnerId int,
	FOREIGN KEY (OwnerId) REFERENCES  OWNER(OwnerId)
);


CREATE TABLE LeaseAggrement(
	AgreementId int PRIMARY KEY,
	RPNumber numeric(20),
	RPStreet varchar,
	RPCity varchar,
	RPZipCode varchar,
	RenterName varchar2(20),
	RenterHomePhone numeric(20) unique,
	RenterWorkPhone numeric(20) unique,
	Rent real CHECK(rent >= 0),
	Deposit real ,
	StartDate DATE,
	Duration int,
	EndDate DATE ,
	primary key(RPNumber, RenterName ),
	FOREIGN KEY (RPNumber) REFERENCES  RentalProperty(RPNumber)
);

ALTER TABLE LeaseAggrement
	ADD CONSTRAINT check_duration CHECK (duration IN (6, 12));
	ADD CONSTRAINT check_deposit_rent CHECK (deposit = rent);
	ADD CONSTRAINT check_end_date CHECK(EndDate = ADD_MONTHS(StartDate, duration));
