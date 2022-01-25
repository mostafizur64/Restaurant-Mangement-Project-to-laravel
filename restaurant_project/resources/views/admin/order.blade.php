<x-app-layout>

</x-app-layout>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('admin.admincss')
</head>

<body>

    <div class="container-scroller">
        @include('admin.adminsidebar');


        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="col-sm-12">
                        <div class="card-header">
                            <form action="{{url('/search')}}" method="get">
                                <input type="text" name="search" placeholder="Search" style="color: red;">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>




                            <div class="card-title">
                                <h3 class="text-center">Orders Table</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered text-info">
                                <thead>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Number</th>
                                    <th>FoodName</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                </thead>

                                <tbody>
                                    @foreach($data as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->address}}</td>
                                        <td>{{$item->number}}</td>
                                        <td>{{$item->foodname}}</td>
                                        <td>{{$item->price}}$</td>
                                        <td>{{$item->quantity}}</td>
                                        <td>{{$item->price*$item->quantity}}$</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>






    </div>










    @include('admin.adminscript')
</body>

</html>