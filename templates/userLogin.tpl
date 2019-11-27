{include file="header.tpl"}


<form id ="login">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email"  v-model= "email" class="form-control" aria-describedby="emailHelp" placeholder="Enter email">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password"  v-model= "opass" class="form-control"  placeholder="Password">
  </div>
    <button v-on:click="login" type="button" class="btn btn-primary">Submit</button>
</form>
<script src="./Repositories/Scripts/login.js"> </script>
{include file="footer.tpl"}