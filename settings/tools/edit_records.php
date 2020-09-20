<?php 

include('../../auth/auth_session.php');

include('connection.php');
$id_pilot = $_GET['id_pilot'];

$query = "SELECT * FROM pilots WHERE id_pilot = '$id_pilot'";
$result = mysqli_query($db, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Tekifest</title>
    <link rel="shortcut icon" href="../../assets/images/logo.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#"><h4>Tekifest</h4></a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <ul class="navbar-nav  mr-auto mt-2 mt-lg-0 ">
                    <li class="nav-link">
                        <a type="button" class="nav-link active" data-toggle="modal" data-target="#exampleModal">
                            <strong>Usuario</strong> : <?php echo $_SESSION['email']; ?> 
                        </a>                  
                    </li>
                </ul>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <form action="update.php" method="post" class="card text-center">
                <?php while($row = mysqli_fetch_array($result)) { ?>

                    <div class="card-header text-center">
                        <h5>Edit pilot</h5>
                        <div class="form-group">
                            <input type="hidden" name="id_pilot" value="<?php echo $row['id_pilot']; ?>"/>
                        </div>
                    </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for=""><strong>ID tag</strong></label>
                                        <input type="text" name="id_tag" id="" class="form-control" value="<?php echo $row['id_tag']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for=""><strong>Name pilot</strong></label>
                                        <input type="text" name="name_pilot" id="" class="form-control" value="<?php echo $row['name_pilot']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for=""><strong>Category</strong></label>
                                        <input type="text" name="category" id="" class="form-control" value="<?php echo $row['category']; ?>">
                                    </div>
                                </div>
                            </div>  

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for=""><strong>Brand</strong></label>
                                        <input type="text" name="brand" id="" class="form-control" value="<?php echo $row['brand']; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for=""><strong>Model</strong></label>
                                        <input type="text" name="model" id="" class="form-control" value="<?php echo $row['model']; ?>">
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="card-footer text-muted">
                            <div class="form-group">
                                <a href="../../home.php" type="submit" class="btn btn-secondary">Cancel</a>
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>