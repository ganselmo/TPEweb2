{include file="header copy.tpl"}

<form action="API/User/Login" method="POST">
  <div>
      <label>Email</label>
      <input type="email" name="user" placeholder="ejemplo@servidor">
  </div>
  <div>
      <label>Password</label>
      <input type="password" class="form-control" name="opass" placeholder="Password">
  <div>
      <button type="submit" class="btn btn-primary">Login</button>
  </div>
</form>

{include file="footer copy.tpl"}