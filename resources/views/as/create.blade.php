<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html dir="rtl">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="../images.jpeg" style="border-radius: 20px">

        <title></title>
    </head>
    <body>
        <form action="store" method="post">
            {{csrf_field()}}
            <input type="text" name="title" placeholder="title">
            <input type="text" name="body" placeholder="body">
            <input type="submit">
        </form>
    </body>
</html>
