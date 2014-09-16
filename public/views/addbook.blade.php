<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>

<body>
{{ Form::open(array('url' => '/api/v1/add') )  }}

<input type="number" name="isbn" id="isbn" placeholder="ISBN"> <br>

<input type="text" name="title" id="title" placeholder="Title"> <br>

<input type="text" name="author" id="author" placeholder="Author"> <br>

<input type="text" name="category" id="category" placeholder="Category"> <br>

<input type="text" name="publishing_house" id="publishing_house" placeholder="Publishing House"> <br>

<input type="number" name="page_no" id="page_no" placeholder="Number of pages"> <br>

<input type="number" name="publishing_year" id="publishing_year" placeholder="Publishing Year"> <br>

<input type="submit" value="Add Book">

{{ Form::close() }}

<br>
<br>
<br>
@if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
</body>
</html>