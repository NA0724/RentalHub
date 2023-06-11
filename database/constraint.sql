 SET SERVEROUTPUT ON ;
ALTER TABLE Employee
	ADD  CONSTRAINT employee_cons1
	foreign key(ManagerID)  references Employee(EmployeeId)
	ON DELETE SET NULL
;

ALTER TABLE LeaseAgreement
    ADD CONSTRAINT check_deposit_rent
    CHECK (Deposite = Rent);

-- triggle owneris_assign
--find a algorithm that keep ownerid unique
--a)A supervisor cannot supervise more than 3 rental properties
CREATE OR REPLACE TRIGGER trg_supervisor_limit
BEFORE INSERT OR UPDATE ON Supervise
FOR EACH ROW
DECLARE
  total_supervision NUMBER;
BEGIN
  SELECT COUNT(*) INTO total_supervision
  FROM Supervise
  WHERE SupId = :new.SupId;
  
  IF total_supervision >= 3 THEN
    RAISE_APPLICATION_ERROR(-20001, 'A supervisor cannot supervise more than 3 rental properties.');
  END IF;
END;
/




--d)when a rental property is removed from the list of rentals, 
--it should also be removed from its supervise list
CREATE OR REPLACE TRIGGER trg_remove_from_supervise
AFTER DELETE ON RentalProperty
FOR EACH ROW
BEGIN
    -- Remove the rental property from the supervise list
    DELETE FROM Supervise
    WHERE RPNumber = :old.RPNumber;
END;
/

--a lease aggrement should be for a minimum of six months and a maximum of one year. 
--The rent for a six-month lease is 10% more than the regular rent for that property. 
CREATE OR REPLACE TRIGGER trg_leaseagreement_rent
BEFORE INSERT ON LeaseAgreement
FOR EACH ROW
DECLARE
    v_previous_rent REAL;
    v_property_status VARCHAR2(20);
    V_VAR NUMBER;
BEGIN
    
    SELECT PropertyStatus, Rent INTO v_property_status, v_previous_rent
    FROM RentalProperty
    WHERE RPNumber = :new.RPNumber;

    V_VAR:=:new.EndDate - :new.StartDate ;
         DBMS_OUTPUT.PUT_LINE(V_VAR);

    IF v_property_status != 'available' THEN
        RAISE_APPLICATION_ERROR(-20001, 'Property is not available');
    END IF;
    -- Check if the property status needs to be updated
    IF v_property_status = 'available' THEN
        IF V_VAR < 180 THEN
            RAISE_APPLICATION_ERROR(-20001, 'Lease agreement duration should be a minimum of 6 months.');
        END IF;
         -- Maximum lease duration of 1 year (365 days)
        IF V_VAR > 365 THEN
            RAISE_APPLICATION_ERROR(-20002, 'Lease agreement duration should be a maximum of 1 year.');
        END IF;
        IF V_VAR = 180 THEN
            :new.Rent := v_previous_rent;
            :new.Rent := :new.Rent * 1.1;
            :new.Deposite := :new.Rent;
        ELSE
            -- Set the initial rent if there is no previous lease
        -- v_previous_rent := :new.Rent;
            :new.Rent := v_previous_rent;
            :new.Deposite := v_previous_rent;
        END IF;
        
        -- check renter 

        UPDATE RentalProperty
            SET Rent = :new.Rent * 1.1,
                PropertyStatus = (CASE WHEN SYSDATE BETWEEN :new.StartDate AND :new.EndDate THEN 'leased' ELSE 'not-available' END)
            WHERE RPNumber = :new.RPNumber;
    END IF;
EXCEPTION
    WHEN NO_DATA_FOUND THEN
        NULL; -- Handle exception when no corresponding property is found
END;
/




--assigns a supervisor to a rental property based on certain criteria
CREATE OR REPLACE TRIGGER trg_assign_supervisor
AFTER INSERT ON RentalProperty
FOR EACH ROW
DECLARE
    supervisor_id NUMBER;
BEGIN
    SELECT EmployeeId INTO supervisor_id 
    FROM ((SELECT EmployeeId FROM Employee WHERE JobDesignation='supervisor') MINUS (SELECT SupId FROM Supervise GROUP BY SupId HAVING COUNT(*) = 3)) 
    WHERE ROWNUM = 1; -- Select the first tuple

    IF supervisor_id IS NOT NULL THEN
        -- Insert a new tuple into the Supervise table
        INSERT INTO Supervise (RPNumber, SupId)
        VALUES (:new.RPNumber, supervisor_id);
    ELSE
        -- Delete the tuple in the RentalProperty table
        DELETE FROM RentalProperty
        WHERE RPNumber = :new.RPNumber;
        -- Raise an exception if no supervisor is available
        RAISE_APPLICATION_ERROR(-20003, 'No supervisor available');
    END IF;
END;

ALTER TABLE RentalProperty
    ADD CONSTRAINT keep_ownerphone_not_null
    CHECK (OwnerPhone IS NOT null);
/

-- If no supervisor assigned to rental property do not allow for lease agreement
CREATE OR REPLACE TRIGGER trg_lease_creation
BEFORE INSERT ON LeaseAgreement
FOR EACH ROW
DECLARE
    supervisor_id NUMBER;
    supId NUMBER;
BEGIN
    SELECT SupId INTO supervisor_id
    FROM Supervise
    WHERE RPNumber = :new.RPNumber;

    IF supervisor_id IS NULL THEN
        RAISE_APPLICATION_ERROR(-20004, 'No supervisor assigned to the rental property. Lease agreement creation not allowed.');
    END IF;
        
END;
/