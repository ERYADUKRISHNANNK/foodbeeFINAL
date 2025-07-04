<?php
 include './connect.php';
 error_reporting(0);
 session_start();
 if($_SESSION["email"]=="")
 {
    header('location:cat-login.php');
 }
 // Fetch the customer's name based on the logged-in user's email
$email = $_SESSION["email"];
$query = mysqli_query($conn, "SELECT * FROM `catering` WHERE `catering_email`='$email'");

if ($row = mysqli_fetch_assoc($query)) {
    $cat_name = $row['catering_name'];
    $cat_own = $row['catering_owner'];
    $cat_no = $row['catering_no'];
    $cat_location = $row['catering_location'];
    $cat_mail = $row['catering_email'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Catering-Home</title>
  <link rel="stylesheet" href="../static/catering.css">
  <link rel="icon" href="../static/icon.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<!-- Dashboard body -->
  <div id="wrapper">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <h2><div class="fs-3 fw-semibold">Food<span class="text-warning">Bee</span></div></h2>
      </div>
      <ul class="sidebar-nav">
        <li class="active"><a href="./cat-home.php"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="./cat-food.php"><i class="fa fa-plug"></i>Add Food</a></li>
        <li><a href="./cat-request.php"><i class="fa fa-user"></i>View Request</a></li>
      </ul>
    </aside>
    <div id="navbar-wrapper">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid justify-content-between">
          <div class="navbar-header position-absolute top-0">
            <a href="#" class="navbar-brand" id="sidebar-toggle"><i class="fa fa-bars"></i></a>
          </div>
          <div class="d-flex align-items-center position-absolute end-0 ">
          <div class="me-3 fs-3"><?php echo $cat_name; ?></div>
            <button class="btn border-0" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="../static/user.png" alt="" width="40">
            </button>
            <ul class="dropdown-menu" style="margin-right:20px;">
                <li><a class="dropdown-item" href="cat-login.php">Log out</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
<?php
// Query to get the counts
$result = $conn->query("SELECT COUNT(*) AS food_count FROM food");
$row = $result->fetch_assoc();
$food_count = $row['food_count'];

$result = $conn->query("SELECT COUNT(*) AS user_count FROM user");
$row = $result->fetch_assoc();
$user_count = $row['user_count'];
?>
    <section id="content-wrapper">
      <div class="row">
        <div class="col-lg-12">
        <h2 class="content-title display-4 fw-semibold border-start px-3 border-4 border-dark">Dashboard- <span class="text-warning">catering</span></h2>
        <div class="fs-3 fw-semibold border-start px-3 py-2 border-3 border-warning mb-5">The catering agency can view profiles, add foods, and manage requests by approving them.</div>
          <div class="container" style="width:90%;">
            <div class="row my-5">
              <div class="col-lg col-md-4 col-sm-6 col-12 my-1">
                <div class="card text-decoration-none h-100 rounded-4 py-4 p-5 shadow-lg border-1 border-end-0 border-warning">
                  <div class="card-body">
                    <h5 class="card-title fs-1 text-end fw-bold text-warning border-end px-2 border-3 border-warning">CATERING</h5>
                    <div class="card-text fw-bold display-3 "><?php echo $cat_name; ?></div>
                    <p class="card-text text-secondary">Owner &nbsp;&nbsp;&nbsp;: <span class="text-dark"><?php echo $cat_own; ?></span></p>
                    <p class="card-text text-secondary">Mob no &nbsp;&nbsp;: <span class="text-dark"><?php echo $cat_no; ?></span></p>
                    <p class="card-text text-secondary">Location : <span class="text-dark"><?php echo $cat_location; ?></span></p>
                    <p class="card-text text-secondary">Mail id &nbsp;&nbsp;&nbsp;: <span class="text-dark"><?php echo $cat_mail; ?></span></p>
                  </div>
                </div>
              </div>
            </div>
            <div class="row my-5">
              <div class="col-lg col-md-4 col-sm-6 col-12 my-1">
                <div class="card text-decoration-none h-100 rounded-4 py-4 shadow-lg border-1 border-top-0 border-warning">
                  <div class="card-body">
                    <h5 class="card-title fs-1 text-end fw-bold text-warning border-end px-2 border-2 border-warning">FOOD</h5>
                    <div class="card-text fw-bold display-3 "><?php echo $food_count; ?></div>
                  </div>
                </div>
              </div>
              <div class="col-lg col-md-4 col-sm-6 col-12 my-1">
                <div class="card text-decoration-none h-100 rounded-4 py-4 shadow-lg border-1 border-top-0 border-warning">
                  <div class="card-body">
                    <h5 class="card-title fs-1 text-end fw-bold text-warning border-end px-2 border-2 border-warning">Request</h5>
                    <div class="card-text fw-bold display-3 "><?php echo $user_count; ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
<!-- Section 8 -->
  <div class="container-fluid" >
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-4 border-top">
      <div class="col-md-4 d-flex align-items-center">
        <span class="mb-3 mb-md-0 text-dark">&copy; 2024 FoodBee, Inc</span>
      </div>
      <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
        <li class="ms-3"><a class=" text-dark" href="#"><i class="bi bi-facebook" width="24" height="24"></i></a></li>
        <li class="ms-3"><a class=" text-dark" href="#"><i class="bi bi-instagram" width="24" height="24"></i></a></li>
        <li class="ms-3"><a class=" text-dark" href="#"><i class="bi bi-twitter-x" width="24" height="24"></i></a></li>
      </ul>
    </footer>
  </div>
<!-- Section 8 closed -->
      </div>
    </section>
  </div>
<!-- Dashboard body -->


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    const $button = document.querySelector('#sidebar-toggle');
    const $wrapper = document.querySelector('#wrapper');
    $button.addEventListener('click', (e) => {
      e.preventDefault();
      $wrapper.classList.toggle('toggled');
    });
  </script>
</body>
</html>