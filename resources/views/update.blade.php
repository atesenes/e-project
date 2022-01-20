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
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <style>
            element.style {
            }
            .select2-container--default .select2-selection--single .select2-selection__arrow b {
                display:none;
            }
        </style>
    </head>
    <body>

    <div class="container">
        @if (session('status'))
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-danger" role="alert">
                        <div class="alert-body">
                            <strong>
                                {{ session('status') }}
                            </strong>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <form method="POST" action="{{ route('web.customer.update', $customers->id) }}" id="expenseStoreForm"
              onsubmit="preventDefault(); validateForm()" enctype="multipart/form-data">
            @csrf
            <div class="row" id="table-head">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Müşteri Güncelleme </h4>
                        </div>
                        <div class="card-body">
                            <p>* Zorunlu alanlar.</p>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">İsim </label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{$customers->name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">Telefon </label>
                                        <input type="text" class="form-control" name="mobile" id="mobile" value="{{$customers->mobile}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">* Eposta</label>
                                        <input type="text" class="form-control " name="email" id="email" value="{{$customers->email}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="mb-1">
                                        <label class="form-label" for="basicInput">* Tarih</label>
                                        <input class="form-control is-invalid " type="date" id="date" name="date" value="{{$customers->date}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-12 p-2">
                                    <button type="submit" class="btn btn-primary btn-sm waves-effect waves-float waves-light">Güncelle</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    </body>

    </html>
</div>
@section('page-script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
