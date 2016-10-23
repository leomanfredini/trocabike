<div class="row">
    <div class="col-sm-2" style="background-color:lightgray;"><strong>Nome</strong></div>
    <div class="col-sm-10"><?php echo $user['User']['nome'];?></div>
  </div>



<form>
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>


<?php echo $user['User']['nome'];?>

