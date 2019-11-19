INSERT INTO Users(FName, LName, Username, Passwd, Salt) 
VALUES (:fname,:lname,:user,:pass,:salt);

Select UserID 
From Users
Order By UserID DESC
Limit 1;

INSERT INTO Bettors(BettorID, Balance) 
VALUES (:bettorid, 0);