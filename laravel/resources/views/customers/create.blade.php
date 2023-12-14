<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Customer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('customers.store') }}" method="POST" enctype="multipart/form-data">
                        
                        <div class="modal-header">						
						<h4 class="modal-title">Tambah Customer</h4>
						<!-- <button href="{{ route('customers.index') }}" type="button" class="close" aria-hidden="true">&times;</button> -->
                        <a href="{{ route('customers.index') }}" class="btn btn-sm btn-danger">
                            <span>X</span>
                        </a>
					</div>

                    @csrf

					<div class="modal-body">
                        <div class="form-group">
							<label for="customer_id">ID Customer</label>
							<input type="text" class="form-control @error('customer_id') is-invalid @enderror" 
                            id="customer_id" name="customer_id" value="{{ old('customer_id') }}">
                            @error('customer_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
						</div>				

						<div class="form-group">
							<label for="nama_customer">Nama</label>
							<input type="text" class="form-control @error('nama_customer') is-invalid @enderror"
                            id="nama_customer" name="nama_customer" value="{{ old('nama_customer') }}">
                            @error('nama_customer')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror>
						</div>
						
                        <div class="form-group">
							<label for="Tanggal_lahir">Tanggal Lahir</label>
							<input type="date" class="form-control @error('Tanggal_lahir') is-invalid @enderror"
                            id="Tanggal_lahir" name="Tanggal_lahir" value="{{ old('Tanggal_lahir') }}">
                            @error('Tanggal_lahir')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror>
						</div>
						
                        <div class="form-group">
							<label for="Provinsi_alamat">Provinsi</label>
							<input type="text" class="form-control @error('Provinsi_alamat') is-invalid @enderror"
                            id="Provinsi_alamat" name="Provinsi_alamat" value="{{ old('Provinsi_alamat') }}">
                            @error('Provinsi_alamat')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror>
						</div>
                        
                        <div class="form-group">
							<label>Jenis Kelamin</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="L"
                                {{ old('jenis_kelamin')=='L' ? 'checked': '' }}>
                                <label class="form-check-label" for="laki_laki">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P" 
                                {{ old('jenis_kelamin')=='P' ? 'checked': '' }}>
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
                            @error('jenis_kelamin')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
						</div>
                        
                        <div class="form-group">
							<label for="status_nikah">Status Nikah</label>
							<select class="form-control" name="status_nikah" id="status_nikah">
                                <option value="Kawin"
                                {{ old('status_nikah')=='Kawin' ? 'selected': '' }}>
                                    Kawin
                                </option>
                                <option value="Belum Kawin"
                                {{ old('status_nikah')=='Belum Kawin' ? 'selected': '' }}>
                                    Belum Kawin
                                </option>
                                <option value="Janda/Duda"
                                {{ old('status_nikah')=='Janda/Duda' ? 'selected': '' }}>
                                    Janda/Duda
                                </option>
                            </select>
						</div>
						
                        <div class="form-group">
							<label for="gaji">Gaji</label>
							<input type="text" class="form-control @error('gaji') is-invalid @enderror"
                            id="gaji" name="gaji" value="{{ old('gaji') }}">
                            @error('gaji')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror>
						</div>					
					</div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

</body>
</html>