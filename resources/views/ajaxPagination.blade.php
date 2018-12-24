<!DOCTYPE html>
<html>
<head>
    <title>Category</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
  
<body>
<div class="container">
    <h1>Category - Pagination</h1>
    <form action="{{route('search')}}" method="get">
        <div class="form-group">
            <input class="form-control" type="text" name="q" />
            <input type="submit" class="btn btn-success" name="" value="Search" />
        </div>
    </form>
    <div id="tag_container">
        @include('presult')
    </div>
</div>
  
<script type="text/javascript">
    //bat loi
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            }else{
                getData(page);
            }
        }
    });

    $(document).ready(function()
    {
        $('body').on('click', '.pagination a',function(event)
        {
            event.preventDefault();
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            //tach chuoi lay ra page
            var page = $(this).attr('href').split('page=')[1];
            //ajax
            getData(page);
        });
  
    });
  
    function getData(page){
        $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: "html"
        }).done(function(data){
            $("#tag_container").html(data);
            //view page tren url
            location.hash = page;
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }
</script>
  
</body>
</html>