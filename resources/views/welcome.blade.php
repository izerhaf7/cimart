<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/api/placeOrder" method="POST">
        @csrf
        @php $count = 0; @endphp <!-- Initialize count variable -->

        @foreach ($data as $item)
            @php $count++; @endphp <!-- Increment count -->
            <input type='text' name="items[{{$count - 1}}][product_id]" value="{{$item->user_id}}"> <!-- Use count for array indexing -->
            <input type="text" name="items[{{$count - 1}}][quantity]" value="1"> <!-- Use count for array indexing -->
        @endforeach

        <input type="submit" value="Place Order">
    </form>
</body>
</html>
