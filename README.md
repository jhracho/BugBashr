# BugBashr
### Work in progress
Bug Tracker tool designed to track debugging process across multiple projects. Best suited for an Agile Software Development environment.

### Features
- Login / Sign-up system that validates login and displays personalized dashboard based on user profile data
- Add / Remove unlimited number of projects
- Home page dynamically displays modals based on project information
- Add / Remove bugs on a dynamically updated 'Project Details' page

### Tools Used
- VSCode
- XAMPP
- MySQL Workbench
- phpMyAdmin
- AWS RDS
- AWS Elastic Beanstalk / Heroku

### TODO
- Update security
  - $query = mysqli_prepare($con, "insert into users (username, password) values (?)");
  - mysqli_stmt_bind_param($stmt, "ss", $username, $password);
  - mysqli_stmt_execute($query); 
  - mysqli_stmt_close($query);
- Update table fetching
  - while(mysqli_stmt_fetch($query)) 
