<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<div>
    <nav class="navbar navbar-expand-sm bg-dark">

        <!-- Links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ url('products/index') }}">Assigment</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="{{ route('register') }}">Home</a>
            </li>
        </ul>

    </nav>
</div>

    <div class="container">
        <form action="{{ route('products.index') }}" method="GET" class="col-9">
            <div class="form-group">
                <input type="search" name="search" class="form-control mt-2" placeholder="Serach name and email" />
            </div>
            <button class="btn btn-primary" type="submit">Search</button>
        </form>
        <div class="text-right">
            <a href="{{url('products/create')}}" class="btn btn-dark mt-n10">New Assigment</a>
        </div>

        <table class="table table-hover mt-2">
            <thead>
                <tr>
                    <th>SrNo.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Due Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td><a href="{{ url('products/' . $product->id . '/show') }}"
                            class="text-dark">{{ $product->name }}</a></td>
                    <td><a href="{{ url('products/' . $product->id . '/show') }}"
                            class="text-dark">{{ $product->email }}</a></td>
                    <td>
                        <img src="{{ url('products/' . $product->image) }}" alt="image" class="rounded-circle"
                            width="30" height="30">
                    </td>
                    <td><a href="{{ url('products/' . $product->id . '/show') }}"
                            class="text-dark">{{ $product->duedate }}</a></td>
                    <td>
                        <a href="{{ url('products/' . $product->id . '/edit') }}" class="btn btn-dark btn-sm">Edit</a>

                    </td>
                    <td>
                        <a href="{{url('products/'.$product->id.'/delete')}}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        {{$products->links()}}
    </div>
</body>

</html>

</div>