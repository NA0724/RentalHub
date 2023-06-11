# RentalHub
An application for Rental Management Office, to manage rental properties, owners and renters.This company is responsible for managing rental properties on behalf of property owners. The objective is to develop a system that supports the rental manager in effectively monitoring and organizing rental properties and lease agreements. This will be accomplished by utilizing a relational database for efficient data storage and transaction management.!



## Technology
- PHP
- HTML 
- JavaScript 
- JQuery 
- Oracle 

## Database Structure 

#### Tables Created

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


#### Relationship between Tables

- Branch to Employee -> One to many(one or many) 
- Employee to Employee (to find out supervisor and manager relation) -> One to many Supervisor (Employee) to Rental Property -> One to Many 
- Owner to Rental Property -> One to many (one or many) 
- Rental Property to Lease Agreement -> One to Many (zero or many) 


#### Constraints

- **trg_supervisor_limit** - A supervisor cannot supervise more than 3 rental properties
- **trg_remove_from_supervise** - when a rental property is removed from the list of rentals, it should also be removed from its supervise list
- **trg_leaseagreement_rent** - a lease aggrement should be for a minimum of six months and a maximum of one year, The rent for a six-month lease is 10% more than the regular rent for that property. 
- **trg_assign_supervisor** - assigns a supervisor to a rental property based on certain criteria
- **trg_lease_creation** - If no supervisor assigned to rental property do not allow for lease agreement


#### Assumptions

1.	If there is no supervisor associated with a rental property then a lease agreement cannot be created.
2.	A manager from any branch can supervise supervisors from any branch.
3.	A branch manages properties in its area, and a supervisor from that branch supervises properties of that area.
4.	A renter with a home phone number can rent one property only once.


![image](https://github.com/NA0724/RentalHub/assets/115744904/cb399727-14da-4836-b16f-6280a8449e29)

## STEPS TO RUN
- Tables.sql → All Tables creation query
- InitialData.sql → owner, branch and employee data
- Constraints.sql → triggers 
- Property_lease.sql → rental property and lease agreement data

- Then `PHP:Serve Project`, and Run `login.php` in browser.

 
## Functionality Overview
- 1.	Login Page – The employees of the company can login to the portal using their Employee Id and Full name.
![image](https://github.com/NA0724/RentalHub/assets/115744904/37322135-63bc-4341-86ee-54fb6bee7e57)

- 2.	Dashboard Page – This page shows all the different transactions that the employee can do.!
![image](https://github.com/NA0724/RentalHub/assets/115744904/5f0be6a7-5031-4c52-b542-d8628b172cc7)
![image](https://github.com/NA0724/RentalHub/assets/115744904/07beaebd-c464-4a5a-a409-20a5dd850a82)

- All Branches Page – The employee can select a branch from the dropdown menu and submit and see all the employees in that branch and all the properties handled by that branch. Create Lease agreement button is displayed for available properties.
![image](https://github.com/NA0724/RentalHub/assets/115744904/137956ea-a36a-4f5d-ac02-7bbc16ff0bd2)
![image](https://github.com/NA0724/RentalHub/assets/115744904/b6d95d6b-460b-4813-bd06-97a1068b2166)
![image](https://github.com/NA0724/RentalHub/assets/115744904/f0ee578a-3ddf-4fae-9984-255fb9254828)
![image](https://github.com/NA0724/RentalHub/assets/115744904/82503fcc-aa56-49b7-af57-98946038eafc)

- 4.	All Managers Page – In this page the employee can select a manager and view the list of supervisors and rental properties. Create Lease agreement button is displayed for available properties.
![image](https://github.com/NA0724/RentalHub/assets/115744904/76b4fde5-10bd-41ff-b4e3-3bc6f532f325)
![image](https://github.com/NA0724/RentalHub/assets/115744904/9b0867c2-5942-47b4-af44-cbe4580467ae)
![image](https://github.com/NA0724/RentalHub/assets/115744904/3e40dafc-fce1-40a4-8dd1-a0d2b642ad5e)

- 5.	Add New Supervisor Page – A new supervisor can be added to the system under any manager.
![image](https://github.com/NA0724/RentalHub/assets/115744904/ba29d11c-b83f-4e40-b8a4-7f0fa6b4a682)
![image](https://github.com/NA0724/RentalHub/assets/115744904/37136f83-9b04-4ebf-ac3d-1c88d190a662)
![image](https://github.com/NA0724/RentalHub/assets/115744904/fa3a13e5-ac48-4c57-9021-1a9fc4aeef74)

- 6.	Add New Owner – A new owner of a rental property can be added to the company
![image](https://github.com/NA0724/RentalHub/assets/115744904/2c22f5c6-148d-4e30-9a8d-74b71044b85b)
![image](https://github.com/NA0724/RentalHub/assets/115744904/6df48147-8207-4e6d-aea7-7c0a4392346f)
![image](https://github.com/NA0724/RentalHub/assets/115744904/710bbf72-1877-4b95-a89c-c24fe7a1f83f)

- 7.	Search Rental Properties For an Owner – All properties listed under an owner can be searched and viewed in this page
![image](https://github.com/NA0724/RentalHub/assets/115744904/5038d4a8-de18-4216-8905-b9628ebee5fc)
![image](https://github.com/NA0724/RentalHub/assets/115744904/49b3a7fe-2145-457d-a972-fea9615e9f59)
![image](https://github.com/NA0724/RentalHub/assets/115744904/84c1d0ae-cb24-4b1b-be59-afc4ed9fd9d2)

- 8.	Add New Rental Property – A new rental property can be added to the system for existing owners
![image](https://github.com/NA0724/RentalHub/assets/115744904/791ae42e-159c-4272-aaf0-90b4af1d9b4c)
![image](https://github.com/NA0724/RentalHub/assets/115744904/9b5bf967-aa2c-42a0-851e-9d0c5f186922)
![image](https://github.com/NA0724/RentalHub/assets/115744904/b3117ce7-7516-4619-ae91-a595413f3e14)

- 9.	Search Rental Properties Based on Location, No of Rooms, Maximum and Minimum Rent
![image](https://github.com/NA0724/RentalHub/assets/115744904/4be5b4be-47d2-437a-b127-9435746ab390)
![image](https://github.com/NA0724/RentalHub/assets/115744904/5650e52c-1cbc-49d6-8b76-0d2cefef1f63)

- 10.	Show Renters with more than 2 Lease Agreements
![image](https://github.com/NA0724/RentalHub/assets/115744904/db04a498-84ad-46a2-9846-74f84e304ad5)

- 11.	Search Lease Agreement For a Renter
![image](https://github.com/NA0724/RentalHub/assets/115744904/d42c103b-51ba-4831-a428-773e18b05fed)

- 12.	Show Monthly Income
![image](https://github.com/NA0724/RentalHub/assets/115744904/88c80e6a-6f5b-4c3f-a114-640e0616e827)

- 13.	Calculate Average Rent For a location
![image](https://github.com/NA0724/RentalHub/assets/115744904/e3aca164-0b6d-481d-a827-878c6c31fa40)

- 14.	Expiring Lease in 2 months
![image](https://github.com/NA0724/RentalHub/assets/115744904/c6b96630-a74e-455b-a700-75e5867a34af)

- 15.	Create Lease Agreement Form
![image](https://github.com/NA0724/RentalHub/assets/115744904/bbd19de7-ca78-4b2b-848e-733f3c839f8a)
![image](https://github.com/NA0724/RentalHub/assets/115744904/2f9ee47a-0c97-4f3a-bd37-e9f7561a3894)
![image](https://github.com/NA0724/RentalHub/assets/115744904/53eb4581-9587-471c-bdef-d0c640b0acf3)
![image](https://github.com/NA0724/RentalHub/assets/115744904/5ac68e71-e095-467a-8c0f-38d4dfe4c8ca)

- 16.	Create Lease < 6 months – A lease cannot be created for a duration of less than 6 months
![image](https://github.com/NA0724/RentalHub/assets/115744904/8cc1ca2d-55f0-4991-9130-e15aa10c117c)
![image](https://github.com/NA0724/RentalHub/assets/115744904/2493fc67-0c9f-4781-851b-1f6d9a39a1b1)














