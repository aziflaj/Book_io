<!DOCTYPE html>
<html>
<head>
    <title>Add Book</title>
</head>

<body>
    {{ Form::open(array(
        'url' => '/api/v1/add',
    ) )  }}

    {{ Form::text('isbn', '', array(
        'placeholder'   => 'Book ISBN',
        'id'            => 'isbn'
        )
    ) }}

    <br>
    {{ Form::text('title', '', array(
        'placeholder'   => 'Title',
        'id'            => 'title'
        )
    ) }}

    <br>
    {{ Form::text('author', '', array(
    'placeholder'   => 'Author',
    'id'            => 'author'
    )
    ) }}

    <br>
    {{ Form::text('title', '', array(
    'placeholder'   => 'Title',
    'id'            => 'title'
    )
    ) }}

    <br>
    {{ Form::text('category', '', array(
    'placeholder'   => 'Category',
    'id'            => 'category'
    )
    ) }}

    <br>
    {{ Form::text('publishing_house', '', array(
    'placeholder'   => 'Publishing House',
    'id'            => 'publishing_house'
    )
    ) }}

    <br>
    {{ Form::text('page_no', '', array(
    'placeholder'   => 'Number of pages',
    'id'            => 'page_no'
    )
    ) }}

    <br>
    {{ Form::text('publishing_year', '', array(
    'placeholder'   => 'Publishing Year',
    'id'            => 'publishing_year'
    )
    ) }}

<br>
{{ Form::submit('Add Book') }}

{{ Form::close() }}
</body>
</html>