<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    
    <h1>Admin</h1>


    <form method="POST" action="{{ route('logout') }}">
        @csrf
        
        <input type="submit" value="Logout" />
        
    </form>

</body>
</html>