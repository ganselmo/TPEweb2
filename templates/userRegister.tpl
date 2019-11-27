{include file="header.tpl"}

<form id="register" >
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" v-model="email" aria-describedby="emailHelp" placeholder="Enter email">

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" v-model="opass" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Re-type Password</label>
    <input type="password" class="form-control" v-model="rpass" placeholder="Re-type Password">
  </div>
  <button type="button" class="btn btn-primary" v-on:click="register">Submit</button>
</form>
<script src="./Repositories/Scripts/register.js"> </script>
{include file="footer.tpl"}