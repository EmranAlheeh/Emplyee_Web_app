
<?php
 

$conn = mysqli_connect('localhost', 'root', '');
mysqli_select_db($conn , 'employees');
if(isset($_POST['all_emp'])){
$result = mysqli_query($conn,
  "SELECT CONCAT(employees.first_name, ' ', employees.last_name) as full_name, 
  titles.title as title,
  departments.dept_name as dept_name, 
  salaries.salary as salary
  FROM employees 
  JOIN titles ON employees.emp_no = titles.emp_no 
  JOIN salaries ON employees.emp_no = salaries.emp_no 
  JOIN dept_emp ON employees.emp_no = dept_emp.emp_no 
  JOIN departments ON dept_emp.dept_no = departments.dept_no
   GROUP BY employees.emp_no");
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



<h1>Employee</h1>



  <table>
  <tr>
    <th>Employee name</th>
    <th> title</th>
    <th>Department name</th>
    <th>Salary</th>
  </tr>
<?php
$x = $_POST['quantity'];
for ($i=0; $i < $x; $i++) { 
if($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["full_name"]; ?></td>
    <td><?php echo $row["title"]; ?></td>
    <td><?php echo $row["dept_name"]; ?></td>
    <td><?php echo $row["salary"]; ?></td>
</tr>
<?php
 }
   }
 }
  ?>
</table>



<?php 
if(isset($_POST['emp_name'])){
$searchname = $_POST['emp_name_search'];
$result = mysqli_query($conn,"SELECT * FROM employees
WHERE first_name LIKE '%$searchname%' OR last_name LIKE '%$searchname%' 
    OR CONCAT(first_name,' ', last_name) LIKE  '%$searchname%'");
?>



<h1>Employees</h1>
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
</table>




<?php 
if(isset($_POST['dept_name'])){
$searchname = $_POST['dept_name_search'];
$result = mysqli_query($conn,"SELECT departments.dept_no, departments.dept_name, employees.emp_no, CONCAT(employees.first_name, ' ', employees.last_name) AS full_name
    FROM employees, dept_emp, departments
    WHERE departments.dept_name LIKE '%$searchname%'
    AND departments.dept_no = dept_emp.dept_no
    AND employees.emp_no = dept_emp.emp_no");
  
?>


  <h1><?php echo "Those are all employees in the department: '$searchname'"?></h1>

  <table>
  
  <tr>
    <th>Department number</th>
    <th>Department name</th>
    <th>Employee number</th>
    <th>Employee Name</th>
  </tr>
<?php
$x = $_POST['quantity'];
for ($i=0; $i < $x; $i++) { 
if($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["dept_no"]; ?></td>
    <td><?php echo $row["dept_name"]; ?></td>
    <td><?php echo $row["emp_no"]; ?></td>
    <td><?php echo $row["full_name"]; ?></td>
</tr>
<?php
 }
   }
 }
  ?>
</table>

<?php 
if(isset($_POST['title'])){
$searchname = $_POST['title_search'];
$result = mysqli_query($conn,"SELECT * 
    FROM employees, titles
    WHERE titles.title LIKE '%$searchname%'
    AND employees.emp_no = titles.emp_no");
  
?>

  <h1><?php echo "Those are all employees have titles: '$searchname'"?></h1>
  <table>
  
  <tr>
    <th>Emp_no</th>
    <th>Birth_date</th>
    <th>First_name</th>
    <th>Last_name</th>
    <th>Gender</th>
    <th>Hire_date</th>
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
</table>


<?php 
if(isset($_POST['salary'])){
$minsalary = $_POST['min_salary'];
$maxsalary = $_POST['max_salary'];
$result = mysqli_query($conn,"SELECT * 
    FROM employees, salaries
    WHERE salaries.emp_no = employees.emp_no
    AND salary BETWEEN '$minsalary' AND '$maxsalary'");
  
?>


  <h1><?php echo "Those are all employees have Salaries betwwen: '$minsalary' and '$maxsalary'"?></h1>
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
</table>


<?php 
if(isset($_POST['emp_record'])){
$emp_no_in = $_POST['emp_no_insert'];
$birth_date_in = $_POST['bDate_insert'];
$first_name_in = $_POST['fName_insert'];
$last_name_in = $_POST['lName_insert'];
$gender_in = $_POST['gender_insert'];
$hire_date_in = $_POST['hDate_insert'];
$result = mysqli_query($conn,
  "INSERT INTO employees (emp_no, birth_date, first_name, last_name, gender, hire_date)  
  VALUES ('$emp_no_in', '$birth_date_in', '$first_name_in', '$last_name_in', '$gender_in', '$hire_date_in')");

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
