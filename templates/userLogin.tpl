{include file="header.tpl"}


<form action="/User/Login" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="opass" placeholder="Password">
  </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

{include file="footer.tpl"}