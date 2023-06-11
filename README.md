# RentalHub
An application for Rental Management Office, to manage rental properties, owners and renters.This company is responsible for managing rental properties on behalf of property owners. The objective is to develop a system that supports the rental manager in effectively monitoring and organizing rental properties and lease agreements. This will be accomplished by utilizing a relational database for efficient data storage and transaction management.!



## Technology
- PHP
- HTML 
- JavaScript 
- JQuery 
- Oracle 

## Database Structure 

### Tables Created

**Branch** (BranchNumber, BranchPhone, Street, City, ZipCode)
- PK – BranchNumber

**Employee** (EmployeeId, EmpName, EmpPhoneNo, EmpStartDate, JobDesignation, BranchID, ManagerID)
- PK- EmployeeId

**Owner** (OwnerPhone, OwnerName, Street, City, ZipCode)
- PK – OwnerPhone

**RentalProperty** (RPNumber, Street, City, ZipCode, RoomNo, Rent, PropertyStatus, OwnerPhone)
- PK-RPNumber
- FK – OwnerPhone referencing OwnerPhone of Owner Table

**LeaseAgreement** (RPNumber, RPStreet, RPCity, RPZipCode, RenterName, RenterHomePhone, RenterWorkPhone, Rent, Deposit, StartDate, EndDate)
- Composite Primary Key – RPNumber, RenterHomePhone
- FK – RPNumber referencing the RPNumber of RentalProperty table

**Supervise** (RPNumber, SupId)
- Composite PK – RPNumber, SupId
- FK – RPNumber referencing the RPNumber of RentalProperty table
- FK – SupId referencing EmployeeId of Employee Table


### Relationship between Tables

- Branch to Employee -> One to many(one or many) 
- Employee to Employee (to find out supervisor and manager relation) -> One to many Supervisor (Employee) to Rental Property -> One to Many 
- Owner to Rental Property -> One to many (one or many) 
- Rental Property to Lease Agreement -> One to Many (zero or many) 


### Constraints

- trg_supervisor_limit - A supervisor cannot supervise more than 3 rental properties
- trg_remove_from_supervise - when a rental property is removed from the list of rentals, 
- it should also be removed from its supervise list
- trg_leaseagreement_rent - a lease aggrement should be for a minimum of six months and a maximum of one year, The rent for a six-month lease is 10% more than the regular rent for that property. 
- trg_assign_supervisor - assigns a supervisor to a rental property based on certain criteria
- trg_lease_creation - If no supervisor assigned to rental property do not allow for lease agreement


### Assumptions

1.	If there is no supervisor associated with a rental property then a lease agreement cannot be created.
2.	A manager from any branch can supervise supervisors from any branch.
3.	A branch manages properties in its area, and a supervisor from that branch supervises properties of that area.
4.	A renter with a home phone number can rent one property only once.

