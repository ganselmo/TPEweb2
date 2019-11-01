<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href='{BASE}'>
    <link rel="stylesheet" href="./Repositories/bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <title>{$titulo}</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-end">

<a class="navbar-brand" href="{BASE}">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    {if $session->isLoggedIn()}
    

    
         <span class="navbar-brand">{$session->getLoggedUserName()}</span>
   
   
        <a class="navbar-brand" href="{BASE}User/Logout">Log out</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    {else}
        <a class="navbar-brand" href="{BASE}User/Login">Login</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{BASE}User/Register">Register</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

    {/if}
     
</nav>
<div class= "container">
<div class = "row justify-content-md-center mt-md-3 mb-md-3">

<h1>{$titulo}</h1>

</div>