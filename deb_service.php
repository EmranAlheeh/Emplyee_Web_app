
<?php
 

 $conn = mysqli_connect('localhost', 'root', '');
 mysqli_select_db($conn , 'employees');
//  if(isset($_POST['all_emp'])){
//  $result = mysqli_query($conn,
//    "SELECT CONCAT(employees.first_name, ' ', employees.last_name) as full_name, 
//    titles.title as title,
//    departments.dept_name as dept_name, 
//    salaries.salary as salary
//    FROM employees 
//    JOIN titles ON employees.emp_no = titles.emp_no 
//    JOIN salaries ON employees.emp_no = salaries.emp_no 
//    JOIN dept_emp ON employees.emp_no = dept_emp.emp_no 
//    JOIN departments ON dept_emp.dept_no = departments.dept_no
//     GROUP BY employees.emp_no");
 ?>
 
 <!DOCTYPE html>
 <html>
  <head>
  <title>Data</title>
  <style type="text/css">
    table {
   border-collapse: collapse;
   width: 500px;
 }
 td, th {
   padding: 10px;
 }
 th {
   background-color:  rgba(80, 49, 49);
   color: #ffffff;
   font-weight: bold;
   font-size: 13px;
   border: 1px solid #54585d;
 }
 td {
   color:black ;
   border: 1px solid #dddfe1;
 }
 tr {
   background-color: #f9fafb;
 }
 tr:nth-child(odd) {
   background-color: #ffffff;
 }
  </style>
  </head>
  <body>
 
 <form>
  <input id="Main" type="button" value="return" onclick="history.back()">
 </form>
 
 
 
 
 
 <?php 
 if(isset($_POST['show_dep'])){
 $result = mysqli_query($conn,
   "SELECT departments.dept_name, CONCAT(employees.first_name, ' ', employees.last_name)  AS Manager
   FROM departments, employees, dept_manager
   WHERE dept_manager.dept_no = departments.dept_no
   AND dept_manager.emp_no = employees.emp_no");
 ?>
   <h1><?php echo "Those are all departments with their managers"?></h1>
   
   <table>
   <tr>
     <th>Department name</th>
     <th>Manager</th>
   </tr>
 <?php
 while($row = mysqli_fetch_array($result)) {
 ?>
 <tr>
     <td><?php echo $row["dept_name"]; ?></td>
     <td><?php echo $row["Manager"]; ?></td>
 </tr>
 <?php
  }
  }
   ?>
 </table>
 
 
 
 
 <?php 
 if(isset($_POST['show_dep_emp'])){
 $result = mysqli_query($conn,
   "SELECT departments.dept_name, SUM(salaries.salary) AS amount
   FROM departments, dept_emp, salaries
   WHERE dept_emp.dept_no = departments.dept_no
   AND dept_emp.emp_no = salaries.emp_no
   GROUP BY departments.dept_name");
 ?>
   <h1><?php echo "Those are all departments with their managers"?></h1>
   
   <table>
   <tr>
     <th>Department name</th>
     <th>Amout of Salaries</th>
   </tr>
 <?php
 while($row = mysqli_fetch_array($result)) {
 ?>
 <tr>
     <td><?php echo $row["dept_name"]; ?></td>
     <td><?php echo $row["amount"]; ?></td>
 </tr>
 <?php
  }
    }
   ?>
 </table>
 
 
 <?php 
 if(isset($_POST['show_names'])){
 $searchname = $_POST['search_dep_name'];
 $result = mysqli_query($conn,"SELECT * 
     FROM employees, dept_emp, departments
     WHERE departments.dept_name LIKE '%$searchname%'
     AND departments.dept_no = dept_emp.dept_no
     AND employees.emp_no = dept_emp.emp_no");
   
 ?>
   <h1><?php echo "Those are all employees who belongs to: '$searchname' department"?></h1>
   <table>
   
   <tr>
     <th>emp_no</th>
     <th>birth_date</th>
     <th>first_name</th>
     <th>last_name</th>
     <th>gender</th>
     <th>hire_date</th>
   </tr>
 <?php
 $x = $_POST['quantity'];
 for ($i=0; $i < $x; $i++) { 
 if($row = mysqli_fetch_array($result)) {
 ?>
 <tr>
     <td><?php echo $row["emp_no"]; ?></td>
     <td><?php echo $row["birth_date"]; ?></td>
     <td><?php echo $row["first_name"]; ?></td>
     <td><?php echo $row["last_name"]; ?></td>
     <td><?php echo $row["gender"]; ?></td>
     <td><?php echo $row["hire_date"]; ?></td>
 </tr>
 <?php
  }
    }
  }
   ?>
 
 
   <?php 
 if(isset($_POST['dept_record'])){
 $dept_no_in = $_POST['dept_no_insert'];
 $dept_name_in = $_POST['dept_name_insert'];
 $result = mysqli_query($conn,
   "INSERT INTO departments (dept_no, dept_name)  
   VALUES ('$dept_no_in', '$dept_name_in')");
 
   if ($result) {
     echo "<h1> INSERTED </h1>";
     echo '<p><a href="javascript:history.go(-1)" title="Return to previous page">&laquo; Go back</a></p>';
   }   else {
     echo "Error: " . $result . "<br>" . $conn->error;
     } 
   }
 ?>
 </table>
  </body>
 </html>
 