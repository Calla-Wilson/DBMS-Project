USE hotel_dbms;

CREATE TABLE Hotel (
    HotelID INT PRIMARY KEY,
    HotelName VARCHAR(100) NOT NULL,
    Addr VARCHAR(255) NOT NULL,
    PostalCode VARCHAR(20) NOT NULL,
    PhoneNumber BIGINT(15),
    Email VARCHAR(100)
); 

CREATE TABLE Staff(
    StaffID INT PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Position VARCHAR(50) NOT NULL,
    HireDate DATE NOT NULL,
    HotelID INT,
    ssn BIGINT(9) UNIQUE NOT NULL,
    Addr VARCHAR(255) NOT NULL,
    Email VARCHAR(100),
    PhoneNumber BIGINT(15),
    FOREIGN KEY (HotelID) REFERENCES Hotel(HotelID)
);

CREATE TABLE RoomType (
    RoomType VARCHAR(50) PRIMARY KEY,
    Capacity INT NOT NULL,
    AvailabilityStatus BOOLEAN NOT NULL
);

ALTER TABLE Room
ADD CONSTRAINT UNIQUE (PricePerNight);

CREATE TABLE Room (
    RoomID INT PRIMARY KEY,
    RoomNum INT NOT NULL,
    PricePerNight DECIMAL(10, 2) NOT NULL,
    HotelID INT,
    floorNum INT NOT NULL,
    RType VARCHAR(50),
    FOREIGN KEY (RType) REFERENCES RoomType(RoomType),
    FOREIGN KEY (HotelID) REFERENCES Hotel(HotelID)
);

CREATE TABLE Guest (
    GuestID INT PRIMARY KEY,
    FirstName VARCHAR(50) NOT NULL,
    LastName VARCHAR(50) NOT NULL,
    Addr VARCHAR(255) NOT NULL,
    Email VARCHAR(100),
    PhoneNumber BIGINT(15),
    DoB DATE NOT NULL
);
--Reservation Table creation
CREATE TABLE Reservation (
    ReservationID INT PRIMARY KEY,
    GuestID INT,
    RoomID INT,
    CheckInDate DATE NOT NULL,
    CheckOutDate DATE NOT NULL,
    NumGuests INT NOT NULL,
    PricePerNight DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (GuestID) REFERENCES Guest(GuestID),
    FOREIGN KEY (RoomID) REFERENCES Room(RoomID),
    FOREIGN Key (PricePerNight) REFERENCES Room(PricePerNight)
);
--Payemnt Table creation
CREATE TABLE Payment (
    PaymentID INT PRIMARY KEY,
    ReservationID INT,
    CardNumber BIGINT(16) NOT NULL,
    PaymentDate DATE NOT NULL,
    Amount DECIMAL(10, 2) NOT NULL,
    PaymentMethod VARCHAR(50) NOT NULL,
    FOREIGN KEY (ReservationID) REFERENCES Reservation(ReservationID)
);