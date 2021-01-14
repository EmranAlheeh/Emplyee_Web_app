  
  <!DOCTYPE html>
  <html>
    <head>
      <title>  employees</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <meta charset="utf-8">
      <style>
        p{
          color: white;
        }
        h1{
          color:white;
        }
        body{
          background-image: url("images.jpg");
  background-size: cover;
  background-repeat: no-repeat;
          display: flex;
 flex-direction: column;
 justify-content: center;
        }
      </style>
    </head>
    <body   >
      
<div style="margin-left:200px;">
  <h1> Employees informations</h1>
  <div  id="emp-container">
  
<form method="POST" action="service.php">

  <p class="emp-div">The limit of Records  </p>
   <input type="number" id="quantity" name="quantity" min="1" max="100" value="100">

   <hr>

       <button name="all_emp" type="submit">Show all Employee</button>

       <hr>

  

  <div class="search-container">
      <input  type="text" placeholder="Search.." name="emp_name_search">
      <button name="emp_name" type="submit">Search by names</button>
  </div>


   <hr>

 
  <div class="search-container">
      <input type="text" placeholder="Search.." name="dept_name_search">
      <button name="dept_name" type="submit">Search by Department</button>
  </div>

   <hr>

 
  <div class="search-container">
      <input type="text" placeholder="Search.." name="title_search">
      <button name="title" type="submit">Search by Title</button>
  </div>


  <hr>

    <div class="search-container">
      <input type="text" placeholder="Min.." name="min_salary">
      <input type="text" placeholder="Max.." name="max_salary">
      <button name="salary" type="submit">Search by Salary</button>
  </div>


   <hr>

  <p class="emp-div">Add New Employee</p>
  <div class="insert-container">
     <p>First Name <input class="insert" type="text" name="fName_insert"></p>
    <p>Last Name <input class="insert" type="text"  name="lName_insert"></p> 
     <p>Employee Number <input class="insert" type="number"  name="emp_no_insert"> </p>
    <p>Birthday <input class="insert" type="date" name="bDate_insert"> </p>
  <input type="radio" id="male" name="gender_insert" value="M">
        <label style="color:white" for="male">Male</label><br>
        <input  type="radio" id="female" name="gender_insert" value="F">
        <label style="color:white" for="female">Female</label><br>
    <p>Hire Date <input class="insert" type="date" name="hDate_insert"></p>
      <button name="emp_record" type="submit">Add</button>
  </div>
  </div>

</div>

  </form>
    </body>
  </html>
    



