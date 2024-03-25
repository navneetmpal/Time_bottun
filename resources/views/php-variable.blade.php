<!DOCTYPE html>
<html>
<head>
    <title>use Laravel Variable in JQuery</title>
</head>
<body>
</body>


@foreach($posts as $s)
    {{$s->date}}<br/>
@endforeach
   
<script type="text/javascript">
    
    var posts = "{{ Js::from($posts) }}";
    console.log(posts);
  
    var posts = "getting";
    console.log(posts);
    
</script>
</html>