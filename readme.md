This is my system for our thesis made using Laravel. <br>
<br>
Prerequisites:<br>
1) A web browser (NEVER USE IE!!!).<br>
2) Laravel installed on your system.<br>
3) PHP installed on your system.<br>
4) MySQL.<br>
5) Basic Laravel knowledge.<br>
<br>
How to use:<br>
1) Obviously, download this.<br>
2) Edit the .env file and set the database name, username, and password according<br> to the one you created on your MySQL database. <br>
3) Edit the config/database.php file and do the same thing you did on step 2.<br>
4) Open command line and change the directory to this project folder.<br>
5) Run "php artisan migrate"<br>
6) Create account for Superadmin. You can do this using "php artisan tinker" or<br> you can just manually insert it into your MySQL database. <br>
NOTE: BE SURE TO SET THE USERNAME OF SUPERADMIN<br> TO "admin" ONLY! OTHERWISE, IT WON'T WORK.<br>
7) Run the project using "php artisan serve"<br>
8) Login the Superadmin account.<br>
9) Add School<br>
10) Login the School Admin account<br>
11) Add Department<br>
12) Login the Department Account<br>
13) Add Student<br>
14) Login the Student Account<br>
15) Do anything. That's the process. Feel free to explore it.