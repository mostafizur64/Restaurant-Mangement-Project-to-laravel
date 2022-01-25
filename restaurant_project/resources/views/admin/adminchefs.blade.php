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
                            <form action="{{url('/uploadchefs')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="me-3">
                                    <label for="" class="form-label">ChefsName</label>
                                    <input type="text" name="name" class="form-control text-danger">
                                </div>
                                <div class="me-3">
                                    <label for="" class="form-label">Speciality</label>
                                    <input type="text" name="speciality" class="form-control text-danger">
                                </div>
                                <div class="me-3">
                                    <label for="" class="form-label">image</label>
                                    <input type="file" name="image" class="form-control text-danger">
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
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">

                                    </div>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <th>$Name</th>
                                            <th>$Speacility</th>
                                            <th>$Image</th>
                                            <th>$Action</th>
                                        </thead>
                                        @foreach($data as $item)
                                        <tbody>
                                            <tr>
                                                <td>{{$item->name}}</td>
                                                <td>{{$item->speciality}}</td>
                                                <td><img src="/chefsimage/{{$item->image}}" style="height:100px; width:100px; border-radius:0%"></td>
                                                <td>
                                                    <a href="{{url('/deletechef',$item->id)}}" class="text-danger">delete</a>
                                                    <a href="{{url('/editchef',$item->id)}}" class="text-warning">Edit</a>
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