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
                    <div class="col-sm-12">
                        <div class="card-header">
                            <div class="card-title">

                                <h3 class="text-center ">Reservation</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered text-success">
                                <thead>
                                    <th>$Name</th>
                                    <th>$Email</th>
                                    <th>$PhoneNumber</th>
                                    <th>$Guest</th>
                                    <th>$Date</th>
                                    <th>$Time</th>
                                    <th>$Message</th>
                                    <th>$Action</th>
                                </thead>
                                @foreach($data as $values)
                                <tbody>
                                    <tr>
                                        <td>{{$values->name}}</td>
                                        <td>{{$values->email}}</td>
                                        <td>{{$values->phonenumber}}</td>
                                        <td>{{$values->guest}}</td>
                                        <td>{{$values->date}}</td>
                                        <td>{{$values->time}}</td>
                                        <td>{{$values->message}}</td>
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

    @include('admin.adminscript')
</body>

</html>