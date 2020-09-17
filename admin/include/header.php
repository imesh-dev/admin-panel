<nav class="navbar navbar-expand-md navbar-light">
<button class="navbar-toggler ml-auto mb-2 bg-light" 
type="button" data-toggle="collapse" data-target="#myNavbar">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="myNavbar">
    <div class="container-fluid">
        <div class="row">
<div class="col-lg-10 col-md-9 ml-auto bg-dark fixed-top py-2">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <h4 class="text-light text-uppercase mb-0">Dashboard</h4>
                    </div>
                    <div class="col-md-5">
                        <form action="searchResult.php" method="POST">
                            <div class="input-group">
                                <input type="text" class="form-control search-input text-white"
                                placeholder="Search" name="searchtm">
                                <button type="submit"  name="submit" id="submit" class="btn btn-light search-button"><i
                                    class="fas fa-search text-danger">
                                </i></button>
                            </div>          
                        </form>
                    </div>
                    <div class="col-md-3">
                        <ul class="navbar-nav">
                           
                            <li class="nav-item ml-auto">
                                    <a href="logout.php" class="nav-link" data-toggle="modal" data-target="#sign-out"><i class="fas fa-sign-out-alt
                                        text-muted fa-lg"></i></a>
                            </li>    
                        </ul>
                    </div>
                </div>
            </div>
			</div>
	</div>
</div>
</nav>

<!--modal-->
<div class="modal fade" id="sign-out">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Want to leave?</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                Press logoyt to leave
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">
                    Stay here
                </button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Logout
                    </button>
            </div>
        </div>
    </div>
</div>
<!--end of modal-->
