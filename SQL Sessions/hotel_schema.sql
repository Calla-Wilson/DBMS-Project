create SCHEMA Hotel_Project;
use Hotel_Project;

create TABLE Hotel(
HotelID INT PRIMARY KEY,
Addr varchar(255),
PNumber INT,
email VARCHAR(255),
PCode VARCHAR(10),
HName VARCHAR(255)
);

CREATE TABLE Staff(
    EmployeeID INT PRIMARY KEY,
    SSN INT,
    Addr varchar(255),
    HotelID INT,
    StartDate Varchar(50),
    DoB varchar (50),
    phone INT(10),
    email varchar(255),
    foreign key (HotelID) references Hotel(HotelID)
    );

CREATE TABLE RoomType(
    RoomType VARCHAR(50),
    Capacity INT,
    Avaliablity VARCHAR(5),
    PRIMARY KEY (RoomType)
);


CREATE TABLE Room(
  RoomID INT PRIMARY KEY,
  RoomNum INT,
  Hotel INT,
  RType VARCHAR(50),
  FloorNum INT,
  FOREIGN KEY (Hotel) REFERENCES Hotel(HotelID),
  FOREIGN KEY (RType) REFERENCES RoomType(RoomType)
);

CREATE TABLE Guest(
    GuestID INT PRIMARY KEY,
    FName VARCHAR(255),
    LName VARCHAR(255),
    Addr VARCHAR(255),
    DoB VARCHAR(50),
    Phone INT,
    Email VARCHAR(255)
);

CREATE TABLE Reservation (
    ResID INT PRIMARY KEY,
    RoomID INT,
    Guest INT,
    Payment VARCHAR(100),
    CheckIN VARCHAR(100),
    CheckOut VARCHAR(100),
    NumGuests INT,
    Hotel INT,
    FOREIGN KEY (RoomID) REFERENCES Room(RoomID),
    FOREIGN KEY (Guest) REFERENCES Guest(GuestID),
    FOREIGN KEY (Hotel) REFERENCES Hotel(HotelID)
);

CREATE TABLE Payment(
    OrderID INT PRIMARY KEY,
    CardNum INT,
    GuestID INT,
    PDate VARCHAR(50),
    ResNum INT,
    foreign key (GuestID) references Guest(GuestID),
    foreign key (ResNum) references Reservation(ResID)
);

-- Changing Pnumber from INT to BIGINT
ALTER TABLE Hotel MODIFY PNumber BIGINT;
ALTER TABLE Staff MODIFY phone BIGINT;
ALTER TABLE Guest MODIFY Phone BIGINT;
ALTER TABLE Payment MODIFY CardNum VARCHAR(20);


-- Data input

-- Hotel Table

USE Hotel_dbms;

INSERT INTO Hotel VALUES
(1, '123 King St, Oshawa', 9051234567, 'kinghotel@email.com', 'L1G7X6', 'King Hotel'),
(2, '789 Queen St, Toronto', 4169876543, 'queenhotel@email.com', 'M5H2N2', 'Queen Hotel'),
(3, '100 York Rd, Hamilton', 9052223344, 'yorkhotel@email.com', 'L8R3J2', 'York Hotel'),
(4, '400 Lakeshore Dr, Mississauga', 6470001111, 'lakehotel@email.com', 'L5B2C1', 'Lakeshore Hotel'),
(5, '555 Main St, Ottawa', 6138885555, 'mainhotel@email.com', 'K1N6A1', 'Main Hotel'),
(6, '920 Bay St, Barrie', 7053334444, 'bayhotel@email.com', 'L4N8Y2', 'Bay Hotel');

-- Staff Table

INSERT INTO Staff VALUES
(101, 100987654, '123 King St, Oshawa', 1, '2020-05-10', '1995-03-12', 9051234561, 'staff1@email.com', 'Manager', NULL),
(102, 100876543, '789 Queen St, Toronto', 2, '2019-03-15', '1989-07-22', 4169876541, 'staff2@email.com', 'Staff', NULL),
(103, 100765432, '100 York Rd, Hamilton', 3, '2022-10-01', '1992-12-01', 9052223341, 'staff3@email.com', 'Staff', NULL),
(104, 100654321, '400 Lakeshore Dr, Mississauga', 4, '2018-11-20', '1984-02-04', 6470001112, 'staff4@email.com', 'Staff', NULL),
(105, 100543210, '555 Main St, Ottawa', 5, '2021-07-19', '2000-06-16', 6138885551, 'staff5@email.com', 'Staff', NULL),
(106, 100432109, '920 Bay St, Barrie', 6, '2023-01-10', '1997-10-10', 7053334441, 'staff6@email.com', 'Staff', NULL);

-- RoomType Table

INSERT INTO RoomType VALUES
('Single', 1, 'Yes'),
('Double', 2, 'Yes'),
('Suite', 4, 'No'),
('Deluxe', 3, 'Yes'),
('Family', 5, 'No'),
('Penthouse', 6, 'Yes');

-- Room Table

INSERT INTO Room VALUES
(2001, 101, 1, 'Single', 1),
(2002, 102, 1, 'Double', 1),
(2003, 201, 2, 'Suite', 2),
(2004, 202, 2, 'Family', 2),
(2005, 301, 3, 'Deluxe', 3),
(2006, 401, 4, 'Penthouse', 4);

-- Guest Table

INSERT INTO Guest VALUES
(301, 'John', 'Doe', '12 Elm St, Oshawa', '1980-06-18', 9055671234, 'john.doe@email.com'),
(302, 'Jane', 'Smith', '34 Pine St, Toronto', '1992-08-07', 4167891234, 'jane.smith@email.com'),
(303, 'Arjun', 'Patel', '56 Oak St, Hamilton', '1988-11-02', 9051112222, 'arjun.patel@email.com'),
(304, 'Lily', 'Wong', '78 Maple St, Mississauga', '1999-09-30', 6473332222, 'lily.wong@email.com'),
(305, 'Ahmed', 'Ali', '90 Birch St, Ottawa', '2001-04-21', 6134442211, 'ahmed.ali@email.com'),
(306, 'Maria', 'Garcia', '101 Spruce St, Barrie', '1983-12-15', 7055551122, 'maria.garcia@email.com');

-- Reservation Table

INSERT INTO Reservation VALUES
(401, 2001, 301, 'Paid', '2025-11-01', '2025-11-04', 1, 1),
(402, 2002, 302, 'Paid', '2025-11-02', '2025-11-05', 2, 1),
(403, 2003, 303, 'Unpaid', '2025-11-03', '2025-11-06', 4, 2),
(404, 2004, 304, 'Paid', '2025-11-04', '2025-11-07', 5, 2),
(405, 2005, 305, 'Paid', '2025-11-02', '2025-11-06', 3, 3),
(406, 2006, 306, 'Unpaid', '2025-11-05', '2025-11-08', 6, 4);

INSERT INTO Payment VALUES
(501, 4111111111111111, 301, '2025-11-01', 401),
(502, 4222222222222222, 302, '2025-11-02', 402),
(503, 4333333333333333, 304, '2025-11-04', 404),
(504, 4444444444444444, 305, '2025-11-02', 405),
(505, 4555555555555555, 306, '2025-11-05', 406),
(506, 4666666666666666, 302, '2025-11-05', 402);

SELECT * FROM Hotel;
SELECT * FROM Staff;
SELECT * FROM Room;
SELECT * FROM Guest;
SELECT * FROM RoomType;
SELECT * FROM Reservation;
SELECT * FROM Payment;
