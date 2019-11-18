CREATE TABLE Users
(
    UserID INT NOT NULL AUTO_INCREMENT,
    
    FName VARCHAR(50),
    LNAME VARCHAR(50),
    
    Username VARBINARY(50) NOT NULL,
    Passwd VARBINARY(60) NOT NULL,
    Salt VARBINARY(50) NOT NULL,


    CONSTRAINT User_UserID_PK PRIMARY KEY (UserID),
    CONSTRAINT Users_Username_U UNIQUE (Username)
) Engine=InnoDB CHARACTER SET=utf8 COLLATE=utf8_bin;


CREATE TABLE Bettors
(
    BettorID INT NOT NULL AUTO_INCREMENT,
    
    Balance INT DEFAULT 0,

    CONSTRAINT Bettors_FK FOREIGN KEY (BettorID) REFERENCES Users(UserID)
) Engine=InnoDB;


CREATE TABLE Admins
(
    AdminID INT NOT NULL,

    CONSTRAINT Admins_PK FOREIGN KEY (AdminID) REFERENCES Users(UserID)
) Engine=InnoDB;


CREATE TABLE Bet
(
    BetID INT NOT NULL AUTO_INCREMENT,

    CurrentOdds INT,

    CONSTRAINT Bet_BetID_PK PRIMARY KEY (BetID)
) Engine=InnoDB;


CREATE TABLE Logo 
(
	LogoID INT NOT NULL AUTO_INCREMENT,
	Image LONGBLOB NOT NULL,
	
	CONSTRAINT Logo_LogoID_PK PRIMARY KEY (LogoID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;


CREATE TABLE SportsTeams (
	SportsTeamID INT NOT NULL AUTO_INCREMENT,
	Name VARCHAR (200) NOT NULL,
	LogoID INT NOT NULL,
	
	CONSTRAINT SportsTeams_SportsTeamID_PK PRIMARY KEY (SportsTeamID),
	CONSTRAINT SportsTeams_LogoID_FK FOREIGN KEY (LogoID)  REFERENCES Logo (LogoID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;


CREATE TABLE MadeBet
(
    BetID INT NOT NULL,
    BettorID INT NOT NULL,
    HomeID INT NOT NULL,
    AwayID INT NOT NULL,

    Outcome BOOL,
    Odds INT,
    Amount INT,

    CONSTRAINT MadeBet_PK PRIMARY KEY (BetID, BettorID, HomeID, AwayID),
    CONSTRAINT MadeBet_BetID_FK FOREIGN KEY (BetID) REFERENCES Bet(BetID),
    CONSTRAINT MadeBet_BettorID_FK FOREIGN KEY (BettorID) REFERENCES Bettors(BettorID),   
    CONSTRAINT MadeBet_HomeID_FK FOREIGN KEY (HomeID) REFERENCES SportsTeams(SportsTeamID),
    CONSTRAINT MadeBet_AwayID_FK FOREIGN KEY (AwayID) REFERENCES SportsTeams(SportsTeamID)
) Engine=InnoDB;


CREATE TABLE Players (
	PlayerID INT NOT NULL AUTO_INCREMENT,
	FName VARCHAR (50) NOT NULL,
	LName VARCHAR (50) NOT NULL,
	Height VARCHAR (50) NOT NULL,
	Weight INT NOT NULL,
	OnA INT NOT NULL,
	
	CONSTRAINT Players_PlayerID_PK PRIMARY KEY (PlayerID),
	CONSTRAINT Players_OnA_FK FOREIGN KEY (OnA) REFERENCES SportsTeams (SportsTeamID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;


CREATE TABLE Win
(
    BetID INT NOT NULL,
    TeamID INT NOT NULL,

    CONSTRAINT Win_PK PRIMARY KEY (BetID),

    CONSTRAINT Win_BetID_FK FOREIGN KEY (BetID) REFERENCES Bet(BetID),
    CONSTRAINT Win_TeamID_FK FOREIGN Key (TeamID) REFERENCES SportsTeams(SportsTeamID)
) Engine=InnoDB;


CREATE TABLE Goals
(
    BetID INT NOT NULL,
    PlayerID INT NOT NULL,

    CONSTRAINT Goals_PK PRIMARY KEY (BetID),

    CONSTRAINT Goals_BetID_FK FOREIGN KEY (BetID) REFERENCES Bet(BetID),
    CONSTRAINT Goals_PlayerID_FK FOREIGN Key (PlayerID) REFERENCES Players(PlayerID)
) Engine=InnoDB;


CREATE TABLE Assists
(
    BetID INT NOT NULL,
    PlayerID INT NOT NULL,

    CONSTRAINT Assists_PK PRIMARY KEY (BetID),

    CONSTRAINT Assists_BetID_FK FOREIGN KEY (BetID) REFERENCES Bet(BetID),
    CONSTRAINT Assists_PlayerID_FK FOREIGN Key (PlayerID) REFERENCES Players(PlayerID)
) Engine=InnoDB;


CREATE TABLE Shots
(
    BetID INT NOT NULL,
    PlayerID INT NOT NULL,

    CONSTRAINT Shots_PK PRIMARY KEY (BetID),

    CONSTRAINT Shots_BetID_FK FOREIGN KEY (BetID) REFERENCES Bet(BetID),
    CONSTRAINT Shots_PlayerID_FK FOREIGN Key (PlayerID) REFERENCES Players(PlayerID)
) Engine=InnoDB;


CREATE TABLE Cards
(
    BetID INT NOT NULL,
    Num INT NOT NULL,

    CONSTRAINT Cards_PK PRIMARY KEY (BetID),

    CONSTRAINT Cards_BetID_FK FOREIGN KEY (BetID) REFERENCES Bet(BetID)
) Engine=InnoDB;


CREATE TABLE Starters
(
    BetID INT NOT NULL,
    TeamID INT NOT NULL,
    P1ID INT NOT NULL,
    P2ID INT NOT NULL,
    P3ID INT NOT NULL,
    P4ID INT NOT NULL,
    P5ID INT NOT NULL,
    P6ID INT NOT NULL,
    P7ID INT NOT NULL,
    P8ID INT NOT NULL,
    P9ID INT NOT NULL,
    P10ID INT NOT NULL,
    P11ID INT NOT NULL,
    
    CONSTRAINT Starting_PK PRIMARY KEY (BetID),

    CONSTRAINT Starting_BetID_FK FOREIGN KEY (BetID) REFERENCES Bet(BetID),
    CONSTRAINT Starting_TeamID_FK FOREIGN Key (TeamID) REFERENCES SportsTeams(SportsTeamID),
    CONSTRAINT Starting_P1ID_FK FOREIGN Key (P1ID) REFERENCES Players(PlayerID),
    CONSTRAINT Starting_P2ID_FK FOREIGN Key (P2ID) REFERENCES Players(PlayerID),
    CONSTRAINT Starting_P3ID_FK FOREIGN Key (P3ID) REFERENCES Players(PlayerID),
    CONSTRAINT Starting_P4ID_FK FOREIGN Key (P4ID) REFERENCES Players(PlayerID),
    CONSTRAINT Starting_P5ID_FK FOREIGN Key (P5ID) REFERENCES Players(PlayerID),
    CONSTRAINT Starting_P6ID_FK FOREIGN Key (P6ID) REFERENCES Players(PlayerID),
    CONSTRAINT Starting_P7ID_FK FOREIGN Key (P7ID) REFERENCES Players(PlayerID),
    CONSTRAINT Starting_P8ID_FK FOREIGN Key (P8ID) REFERENCES Players(PlayerID),
    CONSTRAINT Starting_P9ID_FK FOREIGN Key (P9ID) REFERENCES Players(PlayerID),
    CONSTRAINT Starting_P10ID_FK FOREIGN Key (P10ID) REFERENCES Players(PlayerID),
    CONSTRAINT Starting_P1I1D_FK FOREIGN Key (P11ID) REFERENCES Players(PlayerID)
) Engine=InnoDB;


CREATE TABLE League 
(
	LeagueID INT NOT NULL AUTO_INCREMENT,
	Name VARCHAR (200) NOT NULL,
	
	CONSTRAINT League_LeagueID_PK PRIMARY KEY (LeagueID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;


CREATE TABLE ParticipatesIn 
(
	SportsTeamID INT NOT NULL,
	LeagueID INT NOT NULL,
	Standing INT NOT NULL,
	
	CONSTRAINT ParticipatesIn_PK PRIMARY KEY (SportsTeamID, LeagueID),
	CONSTRAINT ParticipatesIn_SportsTeamID_FK FOREIGN KEY (SportsTeamID) REFERENCES SportsTeams (SportsTeamID),
	CONSTRAINT ParticipatesIn_League_FK FOREIGN KEY (LeagueID) REFERENCES League (LeagueID)

) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;


CREATE TABLE Positions 
(
	PosID INT NOT NULL AUTO_INCREMENT,
	Name VARCHAR (200) NOT NULL,
	Abbreviation VARCHAR (10) NOT NULL,
	
	CONSTRAINT Positions_PosID_PK PRIMARY KEY (PosID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;


CREATE TABLE HasAPosition 
(
	PlayerID INT NOT NULL,
	PosID INT NOT NULL,
	
	CONSTRAINT HasAPosition_PK PRIMARY KEY (PlayerID, PosID),
	CONSTRAINT HasAPosition_PlayerID_FK FOREIGN KEY (PlayerID) REFERENCES Players (PlayerID),
	CONSTRAINT HasAProfile_PosID_FK FOREIGN KEY (PosID) REFERENCES Positions (PosID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;


CREATE TABLE Matchs (
	HomeSportsTeamID INT NOT NULL,
	AwaySportsTeamID INT NOT NULL,
	ShotsOnGoalHome INT,
	ShotsOnGoalAway INT,
	FinalScoreHome INT,
	FinalScoreAway INT,
	DateOfMatch DATE,
	
	CONSTRAINT Match_PK PRIMARY KEY (HomeSportsTeamID, AwaySportsTeamID),
	CONSTRAINT Match_AwaySportsTeamID_FK FOREIGN KEY (AwaySportsTeamID)  REFERENCES SportsTeams (SportsTeamID),
	CONSTRAINT Match_HomeSportsTeamID_FK FOREIGN KEY (HomeSportsTeamID)  REFERENCES SportsTeams (SportsTeamID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;


CREATE TABLE Starts 
(
	PlayerID INT NOT NULL,
	HomeSportsTeamID INT NOT NULL,
	AwaySportsTeamID INT NOT NULL,
	
	CONSTRAINT Starts_PK PRIMARY KEY (PlayerID, HomeSportsTeamID, AwaySportsTeamID),
	CONSTRAINT Starts_PlayerID_FK FOREIGN KEY (PlayerID) REFERENCES Players (PlayerID),
	CONSTRAINT Starts_HomeSportsTeamID_FK FOREIGN KEY (HomeSportsTeamID) REFERENCES Matchs (HomeSportsTeamID),
	CONSTRAINT Starts_AwaySportsTeamID_FK FOREIGN KEY (AwaySportsTeamID) REFERENCES Matchs (AwaySportsTeamID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;


CREATE TABLE MatchStats (
	PlayerID INT NOT NULL,
	HomeSportsTeamID INT NOT NULL,
	AwaySportsTeamID INT NOT NULL,
	NumCards INT,
	NumGoals INT, 
	NumAssists INT,
	
	CONSTRAINT MatchStats_PK PRIMARY KEY (PlayerID, HomeSportsTeamID, AwaySportsTeamID),
	CONSTRAINT MatchStats_PlayerID_FK FOREIGN KEY (PlayerID) REFERENCES Players (PlayerID),
	CONSTRAINT MatchStats_HomeSportsTeamID_FK FOREIGN KEY (HomeSportsTeamID) REFERENCES Matchs (HomeSportsTeamID),
	CONSTRAINT MatchStats_AwaySportsTeamID_FK FOREIGN KEY (AwaySportsTeamID) REFERENCES Matchs (AwaySportsTeamID)
) Engine = InnoDB CHARACTER SET = utf8 COLLATE = utf8_bin;

