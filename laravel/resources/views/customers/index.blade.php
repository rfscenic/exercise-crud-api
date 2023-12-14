<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/style.css">

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Data <b>Customer</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="{{ route('customers.create') }}" class="btn btn-success" data-toggle="modal">
                            <i class="material-icons">&#xE147;</i> 
                            <span>Tambah</span>
                        </a>
						<!-- <a href="#deleteModal" class="btn btn-danger" data-toggle="modal">
                            <i class="material-icons">&#xE15C;</i> 
                            <span>Delete</span>
                        </a>						 -->
					</div>
                </div>
            </div>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID Customer</th>
                        <th>Nama</th>
						<th>Tanggal Lahir</th>
                        <th>Provinsi</th>
                        <th>Jenis Kelamin</th>
                        <th>Status Nikah</th>
                        <th>Gaji</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                <tbody>

                @forelse ($customers as $c)
                    <tr>
                        <td>{{$c->customer_id}}</td>
                        <td>{{$c->nama_customer}}</td>
						<td>{{$c->Tanggal_lahir}}</td>
                        <td>{{$c->Provinsi_alamat}}</td>
                        <td>{{$c->jenis_kelamin == 'P'?'P':'L'}}</td>
                        <td>{{$c->status_nikah}}</td>
                        <td>{{$c->gaji}}</td>
                        <td>
                            <!-- <a href="#viewModal" class="view" title="View" data-toggle="tooltip">
                                <i class="material-icons">&#xE417;</i>
                            </a> -->
                            <a href="{{ route('customers.edit') }}" class="edit" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                            </a>
                            <a href="{{ route('customers.delete') }}" class="delete" data-toggle="modal">
                                <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <div class="alert alert-danger">
                        Data Post belum Tersedia.
                    </div>
                    @endforelse
                </tbody>
            </table>
            {{ $customers->links() }}
        </div>
    </div>


	<!-- Add Modal HTML -->
	<div id="addModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{ route('customers.create') }}" method="POST">
                    <div class="modal-header">						
						<h4 class="modal-title">Tambah Customer</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
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
					
                    <div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>


	<!-- Edit Modal HTML -->
	<!-- <div id="editModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Edit Data Customer</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>

                    <div class="modal-body">
                        <div class="form-group">
							<label for="customer_id">ID Customer</label>
							<input type="text" class="form-control" required>
						</div>				

						<div class="form-group">
							<label for="nama_customer">Nama</label>
							<input type="text" class="form-control" required>
						</div>
						
                        <div class="form-group">
							<label for="Tanggal_lahir">Tanggal Lahir</label>
							<input type="date" class="form-control" required>
						</div>
						
                        <div class="form-group">
							<label for="Provinsi_alamat">Provinsi</label>
							<input type="text" class="form-control" required>
						</div>
                        
                        <div class="form-group">
							<label>Jenis Kelamin</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="L" >
                                <label class="form-check-label" for="laki_laki">Laki-laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="P" >
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
						</div>
                        
                        <div class="form-group">
							<label for="status_nikah">Status Nikah</label>
							<select class="form-control" name="status_nikah" id="status_nikah">
                                <option value="Kawin">Kawin</option>
                                <option value="Belum Kawin">Belum Kawin</option>
                                <option value="Janda/Duda">Janda/Duda</option>
                            </select>
						</div>
						
                        <div class="form-group">
							<label for="gaji">Gaji</label>
							<input type="text" class="form-control" required>
						</div>					
					</div>

					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div> -->


	<!-- Delete Modal HTML -->
	<!-- <div id="deleteModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Hapus Data Customer</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Apakah anda yakin untuk menghapus data ini?</p>
						<p class="text-warning"><small>Tindakan ini tidak bisa dibatalkan</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div> -->


    <!-- Read Modal HTML -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <!-- <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script> -->

</body>
</html>