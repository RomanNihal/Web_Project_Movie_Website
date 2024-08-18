<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Web</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <a href="#" class="navbar-brand">
                <img src="images/logo.png" alt="Watch Web">
            </a>
            <span class="navbar-text">Watch Web</span>

            <ul class="navbar-nav ml-auto">
                <li class='nav-item'> <a href='accountPage.php' class='nav-link'>Account</a> </li>
                <li class='nav-item'> <a href='logOut.php' class='nav-link'>Logout</a> </li>
            </ul>
        </nav>
    </header>

    <form id="form">
        <input type="text" placeholder="Search" id="search" class="search">
    </form>
    <div id="tags"></div>
    <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content" id="overlay-content"></div>
        <a href="javascript:void(0)" class="arrow left-arrow" id="left-arrow">&#8656;</a>
        <a href="javascript:void(0)" class="arrow right-arrow" id="right-arrow">&#8658;</a>
    </div>

    <main id="main"></main>
    <div class="pagination">
        <div class="page" id="prev">Previous Page</div>
        <div class="current" id="current">1</div>
        <div class="page" id="next">Next Page</div>
    </div>

    <script src="script.js"></script>

    <footer class="page-footer font-small blue">
        <div class="footer-copyright text-center py-3">© 2024 Copyright:
            <a href="mailto:nihalroman7@gmail.com">nihalroman7@gmail.com</a>
        </div>
    </footer>
        
</body>
</html>
