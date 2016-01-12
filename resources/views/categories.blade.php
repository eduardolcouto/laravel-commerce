<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>List of Categories</title>
</head>
<body>
  <h1>Categories</h1>
  <ul>
    @foreach($categories as $category)
      <li>{{ $category->name }}</li>
    @endforeach
  </ul>
</body>
</html>