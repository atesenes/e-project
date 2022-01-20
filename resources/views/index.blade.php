
<div class="py-12">
    <div >
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <!DOCTYPE html>
            <html>
            <head>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
                <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
                <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
                <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
                <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
            </head>
            <body>

            <div class="container">
                @if (session('status'))
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success" role="alert">
                                <div class="alert-body">
                                    <strong>
                                        {{ session('status') }}
                                    </strong>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">

                    <div class="col-md-12 mt-5">
                        <a type="button" class="btn btn-success" href="{{route('web.customer.create')}}"> Ekle</a>
                        <table id="customer" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>İsim</th>
                                <th>Telefon</th>
                                <th>E-Posta</th>
                                <th>Tarih</th>
                                <th>İşlemler</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($customers as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{$row->name}}</td>
                                    <td>{{$row->mobile}}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{$row->date}}</td>
                                    <td>
                                        <a href="{{route('web.customer.edit',$row->id)}}" class="btn btn-success  ">Edit</a>
                                        <a href="{{route('web.customer.destroy',$row->id)}}" class="btn btn-danger ">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            </body>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#customer').DataTable();
                } );
            </script>
            </html>
        </div>
    </div>
</div>
