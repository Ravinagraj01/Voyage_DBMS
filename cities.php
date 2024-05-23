<?php
// Include database connection file
include 'db_connection.php';

// Check if the query parameter is set in the URL
if (isset($_GET['query'])) {
    // Get the search query from the URL
    $search_query = $_GET['query'];

    // Prepare a SQL statement to search for cities in the database
    $sql = "SELECT * FROM touristlocations WHERE location_name LIKE ?";
    $stmt = $conn->prepare($sql);
    $search_param = "%{$search_query}%"; // Add wildcard characters to search for partial matches
    $stmt->bind_param("s", $search_param);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any matching cities are found
    if ($result->num_rows > 0) {
        // Fetch the first matching city
        $row = $result->fetch_assoc();
        
        // Construct the filename for the PHP file corresponding to the city
        $php_file = strtolower(str_replace(' ', '_', $row['location_name'])) . '.php';

        // Check if the PHP file exists
        if (file_exists($php_file)) {
            // Redirect to the corresponding PHP file
            header("Location: $php_file");
            exit();
        } else {
            // Display a message if the PHP file doesn't exist
            echo "No page found for '$search_query'";
        }
    } else {
        // Display a message if no matching cities are found
        echo "No results found for '$search_query'";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
 }// else {
//     // Handle case when no search query is provided
//     echo "Please enter a search query";
// }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style3.css">
  </head>
  <body1>
    <div class="title1">
	  <div>
		<nav class="navbar navbar-expand-lg navbar-light bg-body-dark">
			<div class="container-fluid">
			  <a class="navbar-brand" href="#"><h1 style="color: red;">Voyage</h1></a>
			  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			  </button>
			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				  <li class="nav-item">
					<a class="nav-link active" aria-current="page" href="homepage.html" style="color: white;">Home</a>
				  </li>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="about.html" style="color: white;">About</a>
				  </li>
				  <li class="nav-item">
					<a class="nav-link" href="login.php" style="color: white;">Log out</a>
				  </li>
				</ul>
				<form class="d-flex" action="search.php" method="GET">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="query">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>				
			  </div>
			</div>
		  </nav>
	  </div>
	  <div class="image">
        <div class="row">
          <div class="col-md-4">
            <div class="card" style="width: 24rem;">
              <img src="australia.jpg" class="card-img-top" alt="australia">
              <div class="card-body">
                <h5 class="card-title">Australia</h5>
                <a href="australia.html" class="btn btn-primary">Visit Australia</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card" style="width: 24rem;">
              <img src="brazil.jpg" class="card-img-top" alt="brazil">
              <div class="card-body">
                <h5 class="card-title">Brazil</h5>
                <a href="#" class="btn btn-primary">Visit Brazil</a>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card" style="width: 24rem;">
              <img src="canada.jpg" class="card-img-top" alt="Canada">
              <div class="card-body">
                <h5 class="card-title">Canada</h5>
                <a href="#" class="btn btn-primary">Visit Canada</a>
              </div>
            </div>
          </div>
        </div>
		<div class="row">
			<div class="col-md-4">
			  <div class="card" style="width: 24rem;">
				<img src="china.jpg" class="card-img-top" alt="China">
				<div class="card-body">
				  <h5 class="card-title">China</h5>
				  <a href="#" class="btn btn-primary">Visit China</a>
				</div>
			  </div>
			</div>
			<div class="col-md-4">
			  <div class="card" style="width: 24rem;">
				<img src="egypt.jpg" class="card-img-top" alt="brazil">
				<div class="card-body">
				  <h5 class="card-title">Egypt</h5>
				  <a href="#" class="btn btn-primary">Visit Egypt</a>
				</div>
			  </div>
			</div>
			<div class="col-md-4">
			  <div class="card" style="width: 24rem;">
				<img src="france.webp" class="card-img-top" alt="Canada">
				<div class="card-body">
				  <h5 class="card-title">France</h5>
				  <a href="#" class="btn btn-primary">Visit France</a>
				</div>
			  </div>
			</div>
		  </div>
		  <div class="row">
			<div class="col-md-4">
			  <div class="card" style="width: 24rem;">
				<img src="india.jpg" class="card-img-top" alt="india">
				<div class="card-body">
				  <h5 class="card-title">India</h5>
				  <a href="#" class="btn btn-primary">Visit India</a>
				</div>
			  </div>
			</div>
			<div class="col-md-4">
			  <div class="card" style="width: 24rem;">
				<img src="italy.png" class="card-img-top" alt="brazil">
				<div class="card-body">
				  <h5 class="card-title">Italy</h5>
				  <a href="#" class="btn btn-primary">Visit Italy</a>
				</div>
			  </div>
			</div>
			<div class="col-md-4">
			  <div class="card" style="width: 24rem;">
				<img src="japan.jpg" class="card-img-top" alt="Canada">
				<div class="card-body">
				  <h5 class="card-title">Japan</h5>
				  <a href="#" class="btn btn-primary">Visit Japan</a>
				</div>
			  </div>
			</div>
		  </div>  
		  <div class="row">
			<div class="col-md-4">
			  <div class="card" style="width: 24rem;">
				<img src="swizerland.png" class="card-img-top" alt="China">
				<div class="card-body">
				  <h5 class="card-title">Swizerland</h5>
				  <a href="switzerland.html" class="btn btn-primary">Visit Swizerland</a>
				</div>
			  </div>
			</div>
			<div class="col-md-4">
			  <div class="card" style="width: 24rem;">
				<img src="thailand.jpg" class="card-img-top" alt="brazil">
				<div class="card-body">
				  <h5 class="card-title">Thailand</h5>
				  <a href="#" class="btn btn-primary">Visit Thailand</a>
				</div>
			  </div>
			</div>
			<div class="col-md-4">
			  <div class="card" style="width: 24rem;">
				<img src="uk.webp" class="card-img-top" alt="Canada">
				<div class="card-body">
				  <h5 class="card-title">United Kingdom</h5>
				  <a href="#" class="btn btn-primary">Visit United Kingdom</a>
				</div>
			  </div>
			</div>
		  </div> 
      </div>
	  </div>
  </div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+HfxtgMdK5/tOTf6+yA5ka0K1xX+" crossorigin="anonymous"></script>
</body>
</html>
