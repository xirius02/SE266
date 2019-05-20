
<head>
        <meta charset="UTF-8">
        <title></title>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="login.php">Login<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" href="createuser.php">Create<span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-item nav-link" name="destroy" href="login.php">Log Out<span class="sr-only"></span></a>
                        <?php if (isset($destroy)) {
                            echo 'no';
                        } ?>
                    </li>
                </ul>
            </div>
            </nav>
    </head>