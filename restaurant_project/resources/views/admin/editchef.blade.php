<x-app-layout>

</x-app-layout>



<!DOCTYPE html>
<html lang="en">
<base href="/public">

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
                <div class="card ">
                    <div class="col-sm-8 m-auto">
                        <div class="card-header">
                            <h3 class="text-center">Edit Chef Page</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{url('/updatechef',$data->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="me-3">
                                    <label for="" class="form-label">ChefsName</label>
                                    <input type="text" name="name" class="form-control text-danger" value="{{$data->name}}">
                                </div>
                                <div class="me-3">
                                    <label for="" class="form-label">Speciality</label>
                                    <input type="text" name="speciality" class="form-control text-danger" value="{{$data->speciality}}">
                                </div>
                                <div class="me-3">
                                    <label for="" class="form-label">old image</label>
                                    <img src="/chefsimage/{{$data->image}}" style="height:100px ; width:100px" alt="">
                                </div>
                                <div class="me-3">
                                    <label for="" class="form-label">image</label>
                                    <input type="file" name="image" class="form-control text-danger" value="{{$data->name}}">
                                </div>

                                <div class="me-3">
                                    <button type="submit" class="form-control btn btn-warning mt-4">submit</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>





    </div>










    @include('admin.adminscript')
</body>

</html>