<!doctype html>
<html lang="en" class="table table-dark">
<head>
<title>PHP Labs</title>
    <!-- links the css style document -->
    <?php
    include 'navbarbootstrap.html';
    ?>
    <link rel="stylesheet" type="text/css" href="style.css" href="style.css">
    <script src="jsindex.js" type="text/javascript"></script>
    
</head>

<body class="table table-dark">
<div class="table table-dark">
        <div class="footer">
            <a href="../index.html" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Evil Corp</a>
        </div>
    
<div class="table table-dark">
        <!-- contains footer information -->
    <div class="table table-dark">
        <form>
        <h1>Select the desired task</h1>
        <h3><a href="create.php">Create</a></h3>
        <h3><a href="view.php">View</a></h3>
        <h3><a href="view.php">update</a></h3>
        <h3><a href="view.php">delete</a></h3>
        </form>
        <button onclick="time()">last update:</button>
            <p id="demo"></p>
    </div>
    </div>
</div>
    <script>
        function time()
        {
            javascript:alert(document.lastModified);
        }
        
    </script>
    </body>
</html>
