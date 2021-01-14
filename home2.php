 
	<!DOCTYPE html>
	<html>
		<head>
			<title> Department  </title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
			<meta charset="utf-8">
		</head>
		<body>
				  
<div style="margin-left:200px;">
<h1>Departments informations</h1>
    
<form method="POST" action="deb_service.php">
  <div id="dept-container"> 
    
  <p class="dept-div">limit of records</p>

   <input type="number" id="quantity" name="quantity" min="1" max="100" value="100">

  <div class="search-container">

   <button type="submit" name="show_dep">Show  All Departments</button>
  </div>

   <hr>

  <div class="search-container">
   <button name="show_dep_emp" type="submit">Show total salary</button>
  </div>

   <hr>

  <div class="search-container">
 

  <div class="search-container">
      <input type="text" placeholder="Search.." name="search_dep_name">
      <button name="show_names" type="submit">Search by department</button>
  </div>


   <hr>

  <p class="dept-div">Add New Department</p>
  <div class="insert-container">
     <p> Department Number <input class="insert" type="number"  name="dept_no_insert" ></p> 
   <p>Department Name <input class="insert"type="text" name="dept_name_insert"></p> 
      <button name="dept_record" type="submit">Add</button>
  </div>


  </div>
  </div>
</form>
</div>

		</body>
	</html>
