-- Get All Teams
Select Name, SportsTeamID
From SportsTeams 

-- Get Players on specific team
Select FName
From Players, SportsTeams
Where Players.OnA = SportsTeams.SportsTeamID
and SportsTeamID = X; -- X will be input from the user

-- Get all matches
Select Name as Home, Name as Away