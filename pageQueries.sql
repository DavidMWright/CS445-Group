-- Get all matches
Select Name as Home, Name as Away
From SportsTeams, Matches
Where SportsTeams.SportsTeamID = HomeSportsTeamID
and SportsTeams.SportsTeamID = AwaySportsTeamID;

-- Get All Teams
Select Name, SportsTeamID
From SportsTeams

-- Get Specific Teams
Select Name as Home, Name as Away
From SportsTeams, Matches
Where SportsTeams.SportsTeamID = :Home
and SportsTeams.SportsTeamID = :Away; -- Get :Home & :Away from user

-- Get Players on specific team
Select FName
From Players, SportsTeams
Where Players.OnA = SportsTeams.SportsTeamID
and SportsTeamID = :Team; -- :Team will be input from the user



-- Insert Bet (One Batch)
Insert Into Bet;
Select BetID From Bet Order by BetID Desc Limit 1;
Insert Into MadeBet (BetID, BettorID, HomeID, AwayID, Amount) Values (:BetID, :BettorID, :Home, :Away, :Amount);