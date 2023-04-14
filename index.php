<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
    <title>Non Profit Seeker</title>
</head>
<body>
        <nav class="navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Nonprofit Seeker</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link dark" href="home.html">Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/nonprofit/index.php">Search Nonprofits</a>
                </li>
                </ul>
            </div>
        </nav>


        <div class="bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-4">
                            <div class="card-header">
                                <h4>Non Profit Seeker Search</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-7">

                                        <form action="" method="GET">
                                            <div class="input-group mb-3">
                                                <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                                <button type="submit" class="btn btn-primary">Search</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card mt-4">
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Company Name</th>
                                            <th>Contributions</th>
                                            <th>Payment To Directors</th>
                                            <th>Revenue</th>
                                            <th>Expenses</th>
                                            <th>Rating</th>           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            $con = mysqli_connect("localhost","root","","form900data");

                                            if(isset($_GET['search']))
                                            {
                                                $filtervalues = $_GET['search'];
                                                $query = "SELECT * FROM nonprofitdata WHERE CONCAT(C_NAME,RATING) LIKE '%$filtervalues%' ";
                                                $query_run = mysqli_query($con, $query);

                                                if(mysqli_num_rows($query_run) > 0)
                                                {
                                                    foreach($query_run as $items)
                                                    {
                                                        ?>
                                                        <tr>
                                                            <td><?= $items['C_NAME']; ?></td>
                                                            <td><?= $items['CONTRIBUTIONS']; ?></td>
                                                            <td><?= $items['PAYMENTTODIRECTORS']; ?></td>
                                                            <td><?= $items['REVENUE']; ?></td>
                                                            <td><?= $items['EXPENSES']; ?></td>
                                                            <td><?= $items['RATING']; ?></td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                                else
                                                {
                                                    ?>
                                                        <tr>
                                                            <td colspan="4">No Record Found</td>
                                                        </tr>
                                                    <?php
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="abc">
        </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
