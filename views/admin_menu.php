<nav class="navbar navbar-inverse bg-info">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="<?php echo ROOT_URL;?>">Rheez 1.0</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-dark">
      <li class="active "><a href="<?php echo ROOT_URL;?>"><span class="glyphicon glyphicon-home"> Admin</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle " data-toggle="dropdown" href="#">New <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo ROOT_URL;?>user/newUser">New User</a></li>
            <li><a href="<?php echo ROOT_URL;?>employee/newEmp">New Employee</a></li>
          </ul>
        </li>
        <li><a href="#"> Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo ROOT_URL;?>user/logout">Log Out <span class="glyphicon glyphicon-new-window"></span> </a></li>
      </ul>
      <form class="navbar-form navbar-right">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-btn">
          <button class="btn btn-success" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    </div>
</nav>