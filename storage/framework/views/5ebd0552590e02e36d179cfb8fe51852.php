<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <title></title>
    <style>
    .btn{
        background-color: blue;
        border-radius:1em;
        color:white;
        
    }
    .container{
        background-color:skyBlue;
        border-radius:1em;
        width:400px;
        height:230px;
        box-sizing:border-box;
    }
    </style>
</head>
<body>
<div class="container">
    <center><h2 style="color:blue; margin-top:10px; padding-top:5px">Facebook</h2> 
    <form action="user" method="post" style="margin:20px">
   <?php echo csrf_field(); ?>

    <div class="container-sm">
    
        <label for="email"style="margin:10px"><b>Email id:</b></lable>
        &nbsp;
        <input type="email" id="email" name="email" placeholder="enter your email id" required>
        <br>

        <label for="password"style="margin:10px"><b>Password:</b></label>
        <input type="password" id="password" name="password" placeholder="enter your password" pattern=".*[\/@\$&].*"  required>
        
        <br>
        <button type ="submit" value="submit" class="btn">login</button>
        <a href="<?php echo e(url('/user/userview')); ?>" class="btn">customer list</a>
        
    
    </form>
    </center>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\project\megamart\resources\views/user.blade.php ENDPATH**/ ?>