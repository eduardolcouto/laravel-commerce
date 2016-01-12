<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>List of Products</title>
</head>
<body>
  <h1>Categories</h1>
  <ul>
    @foreach($products as $product)
      <li>{{ $product->name }}</li>
    @endforeach
  </ul>
</body>
</html>