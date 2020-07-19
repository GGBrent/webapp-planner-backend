## Running the Server

 The backend code is written in PHP. In order to run this, you must do the following:
 
 1.) Download Apache XAMPP: https://www.apachefriends.org/download.html
 
 2.) In your XAMPP folder, you will see a folder named htdocs. This is where you will import the project folder to. **The folder that the project is in within htdocs MUST be named planner-backend if it isn't already in order for the frontend to communicate with this**
 
 3.) Running the server:
 
  - Go back to the XAMPP folder and scroll down to an application called xampp-control.exe and launch it.
  - On the rows that have the modules Apache and MySQL, you will want to click the 'Start' buttons under 'Actions' for both modules.
    (Note: If it does not want to start up, run xampp-control as administrator)
 
 And that's it, the backend server should now be open to use for the front-end of the project.

## Importing my SQL files

I have made some SQL tables with a few accounts/posts. If you want these, here's what you need to do:

1.) On the browser's URL, type localhost/phpmyadmin

2.) (Recommended) On the top left, click 'New' and type 'sessions' for the Database name. (Can be anything, really) and click 'Create'

3.) On the left side, click 'sessions' and go to 'Import' and select the sessions.sql file from the sql_tables folder. Then click 'Go' on the bottom right.

4.) Repeat steps 2 & 3, but this time you can name this next table 'accounts.' (Once again, can name this anything) Same thing as step 3, but select accounts.sql instead to import.

## Creating a brand new accounts/sessions SQL table

1.) On the browser's URL, type localhost/phpmyadmin

2.) On the top left, click 'New' and you name it either accounts or sessions, whatever you want.

3.) Select your table from the left, and at the top click 'SQL'

For accounts, copy/paste this and click 'Go'

CREATE TABLE users (
	user_id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	user_first TINYTEXT NOT NULL,
	user_last TINYTEXT NOT NULL,
	user_email TINYTEXT NOT NULL,
	user_password LONGTEXT NOT NULL
);

For sessions, copy/paste this and click 'Go'

CREATE TABLE sessiontable (
	session_id int(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
	author TINYTEXT NOT NULL,
	author_id int(11) NOT NULL,
	title varchar(100) NOT NULL,
	description varchar(2000) NOT NULL,
	attendees TEXT,
	start_datetime DATETIME NOT NULL,
	end_datetime DATETIME NOT NULL
);

And that is it for getting the server running and importing/creating new SQL Tables.
