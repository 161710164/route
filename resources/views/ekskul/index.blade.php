@extends('layouts.admin')
@section('content')

	<div class="row">
	<div class="container">
	<div class="col-md-12">
	<div class="panel panel-primary">
		<div class="panel-heading">Data Ekskul
			<div class="panel-title pull-right"><a href="{{ route('ekskul.create') }}">Tambah Data</a>
		</div>
	</div>
	<div class="panel-body">
	<div class="table-responsive">
	<table class="table">
	<thead>
		<tr>
					<th>No</th>
					<th>Nama Ekskul</th>
					<th>Nama Pembina</th>
					<th>Fasilitas</th>
					<th>Jadwal</th>
					<th colspan="3">Action</th>
				</tr>	
	           </thead>
	             <tbody>
		            <?php $nomor = 1; ?>
		  		@php $no = 1; @endphp
		  		@foreach($ekskuls as $data)
                         <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->nama_ekskul}}</td>
							<td>{{$data->guru->nama_guru}}</td>
							<td>{{$data->fasilitas->nama_fasilitas}}</td>
							<td>{{$data->jadwal}}</td>
							<td>
		<a class="btn btn-primary" href=" {{ route('ekskul.edit',$data->id)}} ">Ubah</a>
	</td>
	<td>
		<a class="btn btn-success" href=" {{ route('ekskul.show',$data->id)}} ">Lihat</a>
	</td>
	<td>
		<form method="post" action="{{ route('ekskul.destroy',$data->id) }}">
		<input name="_token" type="hidden" value="{{ csrf_token() }}">
		<input type="hidden" name="_method" value="DELETE">

		<button type="submit" class="btn btn-danger">Hapus</button>
	</form>
	</td>
	</tr>
	@endforeach
	</tbody>
	</table>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	@endsection