<!DOCTYPE html>
<html>
<head>
    <title>Pagination</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
  
<body>
<div class="container">
    <h1>Pagination</h1>
    <form action="{{route('search')}}" method="get">
        <div class="form-group">
            <input class="form-control" type="text" name="q" />
            <input type="submit" class="btn btn-success" name="" value="Search" />
        </div>
    </form>
    <div id="tag_container1">
        @include('presult')
    </div>
</div>
  
</body>
</html>