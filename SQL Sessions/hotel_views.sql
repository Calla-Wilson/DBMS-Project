-- View 1: Join of at least three tables
-- Description: Shows each reservation with full guest information and the room type they booked.

CREATE VIEW v_reservation_details AS
SELECT
  r.ResID,
  rm.RoomNum,
  g.FName,
  g.LName,
  g.Email AS GuestEmail,
  rt.RoomType,
  r.CheckIN,
  r.CheckOut,
  r.Payment
FROM Reservation r
JOIN Guest g      ON r.Guest = g.GuestID
JOIN Room rm      ON r.RoomID = rm.RoomID
JOIN RoomType rt  ON rm.RType = rt.RoomType;
SELECT * FROM v_reservation_details; -- to view the view

-- View 2: Uses nested queries with ANY or ALL and GROUP BY
-- Description: Lists hotels that have at least one room with a capacity greater than the average capacity for all rooms.

CREATE VIEW v_hotels_with_large_rooms AS
SELECT h.HotelID, h.HName
FROM Hotel h
WHERE h.HotelID = ANY (
    SELECT Hotel FROM Room
    WHERE RType IN (
        SELECT RoomType FROM RoomType
        WHERE Capacity > (SELECT AVG(Capacity) FROM RoomType)
    )
);
SELECT * FROM v_hotels_with_large_rooms;

-- View 3: Correlated nested query
-- Description: Shows guests whose phone numbers match the hotel's phone number where they have stayed.

CREATE VIEW v_hotel_guest_phone_match AS
SELECT g.GuestID, g.FName, g.LName, r.Hotel, h.HName
FROM Guest g
JOIN Reservation r ON g.GuestID = r.Guest
JOIN Hotel h ON r.Hotel = h.HotelID
WHERE g.Phone = h.PNumber;
SELECT * FROM v_hotel_guest_phone_match;

-- View 4: Uses a FULL JOIN (By using workaround with union, as full join is not supported by mySQL)
-- Description: Shows all staff and their hotel affiliation, including hotels with no staff, and staff not assigned to any hotel.

CREATE VIEW v_full_staff_hotel AS
SELECT s.EmployeeID, s.SSN, s.Addr, s.HotelID, s.StartDate, s.DoB, s.phone, s.email, h.HotelID AS HID, h.HName
FROM Staff s
LEFT JOIN Hotel h ON s.HotelID = h.HotelID
UNION
SELECT NULL, NULL, NULL, h.HotelID, NULL, NULL, NULL, NULL, h.HotelID, h.HName
FROM Hotel h
WHERE h.HotelID NOT IN (SELECT HotelID FROM Staff);
SELECT * FROM v_full_staff_hotel;

-- View 5: Paid and Unpaid Guests (UNION, Set Operation)
-- Description: Finds guests who have made payments AND those who have reservations with unpaid status.

CREATE VIEW v_paid_and_unpaid_guests AS
SELECT g.GuestID, g.FName, g.LName
FROM Guest g
WHERE g.GuestID IN (SELECT GuestID FROM Payment)
UNION
SELECT g.GuestID, g.FName, g.LName
FROM Guest g
WHERE g.GuestID IN (
    SELECT Guest FROM Reservation WHERE Payment = 'Unpaid'
);
SELECT * FROM v_paid_and_unpaid_guests;

-- Additional Views

-- View 6: All Occupied Rooms
-- Description: Shows rooms booked for reservations with their occupancy period.

CREATE VIEW v_occupied_rooms AS
SELECT r.RoomID, rm.RoomNum, r.CheckIN, r.CheckOut
FROM Reservation r
JOIN Room rm ON r.RoomID = rm.RoomID;
SELECT * FROM v_occupied_rooms;

-- View 7: Reservations ending in the next 2 days
-- Description: Lists all reservations with a check-out date within the next two days.

CREATE VIEW v_checkout_next_2days AS
SELECT r.ResID, rm.RoomNum, r.CheckOut, g.FName, g.LName
FROM Reservation r
JOIN Room rm ON r.RoomID = rm.RoomID
JOIN Guest g ON r.Guest = g.GuestID
WHERE r.CheckOut BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 2 DAY);
SELECT * FROM v_checkout_next_2days;

-- View 8: Staff Directory per Hotel
-- Description: Provides a staff directory for each hotel.

CREATE VIEW v_staff_directory AS
SELECT s.EmployeeID, s.email, h.HName
FROM Staff s
JOIN Hotel h ON s.HotelID = h.HotelID;
SELECT * FROM v_staff_directory;

-- View 9: Guest Payment Summary
-- Description: Shows each guest's total payments made.

CREATE VIEW v_guest_payment_summary AS
SELECT g.GuestID, g.FName, g.LName, COUNT(p.OrderID) AS PaymentsMade
FROM Guest g
LEFT JOIN Payment p ON g.GuestID = p.GuestID
GROUP BY g.GuestID, g.FName, g.LName;
SELECT * FROM v_guest_payment_summary;

-- View 10: Large Capacity Reservations
-- Description: Lists all reservations where the associated room's type has capacity above two.

CREATE VIEW v_large_capacity_reservations AS
SELECT r.ResID, rm.RoomNum, rt.RoomType, rt.Capacity
FROM Reservation r
JOIN Room rm ON r.RoomID = rm.RoomID
JOIN RoomType rt ON rm.RType = rt.RoomType
WHERE rt.Capacity > 2;
SELECT * FROM v_large_capacity_reservations;
