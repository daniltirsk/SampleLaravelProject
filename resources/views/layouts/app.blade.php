<html>
<style type="text/css">
    table{
        background: #f5f5f5;
    }
    .container{
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-direction: column;
    }

    tr{
        display: flex;
        align-items: center;
        border-bottom: 2px solid grey;
    }
    td,th{
        width: 130px;
        border-right: 1px dotted grey;
        height: 25px;
        padding: 5px;
    }
    .button_container{
        width: 60px;
    }
    .alert{
        font-size: 16px;
        color: red;
    }
    .pages{
        
    }
    .phoneformcontainer{
        display:flex; 
        justify-content:center; 
        align-items: center; 
        font-size: 20px;
    }
    .form{
        display: flex;
        flex-direction: column; 
        width: 35%; 
        justify-content: space-around; 
        padding: 50px; 
        height: 200px;
    }
    .addphonecontainer{
        display:flex; 
        justify-content:center; 
        align-items: center; 
        font-size: 20px;
    }
    .submitBtn{
        width: 100px;
    }
    .logoutBtn{
        text-decoration: none;
        color: darkblue;
        background: #f5f5f5;
        border: 1px solid darkblue;
        padding: 4px;
    }
    .mainHeader{
        display: flex;
        width: 100%;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 10px;
        box-sizing: border-box;
        color: darkblue;
        border-bottom: 1px solid darkblue;
    }
    .greeting{
        color: darkblue;
    }
    .phonestable thead{
        color: darkblue;
    }
    .formtext{
        color: darkblue;
    }
</style>

    <head>
        <title>Phonebook</title>
        @stack('styles')
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
            
    </head>
    <body>
        <header class="mainHeader">
            <h1>Phonebook</h1>
            <a href="/server.php/logout" class="logoutBtn">LOGOUT</a>
        </header>

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>