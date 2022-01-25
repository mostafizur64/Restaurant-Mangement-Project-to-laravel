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
        @include('admin.adminsidebar')

        <div class="container">
            <div class="row">
                <div class="card">
                    <div class="col-lg-8 m-auto">
                        <div class="card-header text-center ">

                        </div>
                        <div class="card-body ">
                            <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="me-3">
                                    <label for="" class="form-label">title</label>
                                    <input type="text" name="title" class="form-control text-danger">
                                </div>
                                <div class="me-3">
                                    <label for="" class="form-label">price</label>
                                    <input type="text" name="price" class="form-control text-danger">
                                </div>
                                <div class="me-3">
                                    <label for="" class="form-label">image</label>
                                    <input type="file" name="image" class="form-control text-danger">
                                </div>
                                <div class="me-3">
                                    <label for="" class="form-label">description</label>
                                    <input type="text" name="description" class="form-control text-danger">
                                </div>
                                <div class="me-3">
                                    <button type="submit" class="form-control btn btn-warning mt-4">submit</button>
                                </div>

                            </form>
                        </div>


                    </div>
                    <div class="col-lg-4">

                    </div>

                </div>
                <div class="container">
                    <div class="row">
                        <div class="card">
                            <div class="cols-sm-12">
                                <div class="card-header">

                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>

                                            <th>$Title</th>
                                            <th>$Price</th>
                                            <th>$Description</th>
                                            <th>$Image</th>

                                            <th>$Action</th>

                                        </thead>
                                        @foreach($data as $values)
                                        <tbody>
                                            <tr>
                                                <td>{{$values->title}}</td>
                                                <td>{{$values->price}}</td>
                                                <td>{{$values->description}}</td>
                                                <td><img src="/foodimage/{{$values->image}}" style="height: 100px;width: 100px ; border-radius:0%"></td>
                                                <td><a href="{{url('/deletefood',$values->id)}}" class="text-warning">Delete</a>
                                                    <a href="{{url('/editfood',$values->id)}}" class="text-success">Edit</a>
                                                </td>

                                            </tr>
                                        </tbody>
                                        @endforeach


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>




    </div>







    @include('admin.adminscript')
</body>

</html>