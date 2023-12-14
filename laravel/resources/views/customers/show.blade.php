<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Data Customer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <h4>Customer ID     : {{ $c->customer_id }}</h4>
                        <h4>Nama            : {{ $c->nama_customer }}</h4>
                        <h4>Tanggal Lahir   : {{ $c->Tanggal_lahir }}</h4>
                        <h4>Provinsi        : {{ $c->Provinsi_alamat }}</h4>
                        <h4>Jenis Kelamin   : {{ $c->jenis_kelamin == 'P'?'Perempuan':'Laki-laki'}}</h4>
                        <h4>Status Nikah    : {{ $c->status_nikah }}</h4>
                        <h4>Gaji            : {{ $c->gaji }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>