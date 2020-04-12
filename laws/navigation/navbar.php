<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">LawyersInc</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="lawyers.home.php">home</a>
            </li>
            <li class=" active nav-item">
                <a class="active nav-link" href="blog.home.php">Blog</a>
            </li>
            <li class="nav-item">
                <a class=" nav-link" href="lawyers.board.php">Notice board</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="fullblog.php" method="get">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">Search</button>
        </form>
    </div>
</nav>