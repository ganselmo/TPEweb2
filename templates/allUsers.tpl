{include file="header.tpl"}

{literal}

<div id="usersTable">
    <div class="row">
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Cambiar Rol</th>
                    <th>Reset Pass</th>
                </tr>

            </thead>
            <tbody>
                <tr v-for="user in users">
                    <td>{{user.user}}</td>
                    <td>{{user.roleName}}</td>
                    <td>
                        <div class="container">
                            <div class="row">
                         
                                    <div class="col-sm-6">

                                        <select class="form-control" v-model="user.roleId">
                                            <option v-for="role in roles" v-bind:value="role.id">
                                                {{role.name}}
                                            </option>
                                        </select>

                                    </div>
                                    <div class="col-sm-6">
                                        <button class="btn btn-warning" v-bind:value="user.id"
                                            v-on:click="cambiarRole">Cambiar Rol</button>
                                    </div>

                            </div>
                        </div>
                    <td>
                        <div class="container">
                            <div class="col-sm-12">
                                <button class="btn btn-danger" v-bind:value="user.id" v-on:click="resetPass">Reset
                                    Pass</button>
                            </div>
                        </div>
                    </td>

    </div>
    </td>
    </tr>

    </tbody>
    </table>
</div>

</div>
<script src="./Repositories/Scripts/UsersVue.js"></script>
{/literal}
{include file="footer.tpl"}