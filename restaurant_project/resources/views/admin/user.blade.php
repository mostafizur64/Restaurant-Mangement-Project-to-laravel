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
                    <div class="col-lg-10">
                        <div class="card-header text-center mt-4">
                            USERLIST
                        </div>
                        <div class="card-body ">
                            <table class="table table-bordered text-danger">
                                <thead class="">
                                    <th>name</th>
                                    <th>email</th>
                                    <th>usertype</th>
                                    <th>Action</th>

                                </thead>
                                @foreach($userdata as $data)
                                <tbody class="">
                                    <tr>
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->email}}</td>
                                        @if($data->usertype=="0")
                                        <td><a href="{{url('/deleteuser',$data->id)}}" class="text-warning">Delete</a></td>
                                        @else

                                        <td><a href="#" class="text-warning">Not Allowed</a></td>

                                        @endif
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>


                    </div>
                    <div class="col-lg-2">

                    </div>

                </div>

            </div>
        </div>





    </div>








    @include('admin.adminscript')
</body>

</html>