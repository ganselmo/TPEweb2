<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href='{BASE}'>
    <link rel="stylesheet" href="./Repositories/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./Repositories/css/styles.css">
    <title>{$titulo}</title>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

</head>

<body>
    <nav id="header" class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-end">

        <a class="navbar-brand" href="{BASE}">Home</a>
        
        <span class="navbar-brand"></span>
        <template v-if="isLoggedIn()">
            <a class="navbar-brand" href="" v-on:click="logout">Log out</a>
        </template>
        <span class="navbar-brand"></span>
        <template v-if="!isLoggedIn()">
            <a class="navbar-brand" href="{BASE}User/Login">Login</a>
            
        </template>
        <span class="navbar-brand"></span>
        <template  v-if="!isLoggedIn()">
            <a class="navbar-brand" href="{BASE}User/Register">Register</a>
            
        </template>
        <span class="navbar-brand"></span>

    </nav>
    <script src="./Repositories/Scripts/serverManipulation.js"></script>
    <div class="container">
        <div class="row justify-content-md-center mt-md-3 mb-md-3">

            <h1>{$titulo}</h1>

        </div>