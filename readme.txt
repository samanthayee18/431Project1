1)	Team member names incl. CWID:

    Jake Lawrence   CWID: 890659634
    Samantha Yee    CWID: 890482706
    
2)	Explanation of each team members contributions:

    Jake, designed UI and code (your_quotes, styles, search_quotes, script, quote created, 
			publish quote, index, explore, integrate login into UI)
					
    Samantha, code (signup, signout, login, create_credentials,check_credentials, 
			integration into UI)

    
3)Breakdown from Phase1/2: 

5 Features Used:
1) File uploads
2) Database access
3) Access Control (Log in/Log out functionality)
4) Session handling
5) Input validation

Use cases Used from Phase 1/2:
1)	As a user I want to be able to log-in and log-out of the website. 
2)	As a user I want to be able to save my own quotes that I enter into my library. 
3)	As a user I want to be able to see a master list of quote_card I can use to start adding to my library.
4)	As a user I want to be able to navigate through the pages.

1Class diagram:
user-q: KeyID, username,email, password1
quotes: author, source, quote, isPhilosophical, isMotivational, isFunny, isLove, isPoetry, isOther, otherCategory, 
text_color, rgbVal, user_id,quote_id
