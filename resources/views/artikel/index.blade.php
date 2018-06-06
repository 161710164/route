@extends('layouts.admin')
@section('content')

	<div class="row">
	<div class="container">
	<div class="col-md-12">
	<div class="panel panel-primary">
		<div class="panel-heading">Data Berita
			<div class="panel-title pull-right"><a href="{{ route('artikel.create') }}">Tambah Data</a>
		</div>
	</div>
	<div class="panel-body">
	<div class="table-responsive">
	<table class="table">
	<thead>
		<tr>
					<th>No</th>
					<th>Nama Kategori</th>
					<th>Judul</th>
					<th>Konten</th>
					<th>Tanggal</th>
					<th colspan="3">Action</th>
				</tr>	
	           </thead>
	             <tbody>
		            <?php $nomor = 1; ?>
		  		@php $no = 1; @endphp
		  		@foreach($artikels as $data)
                         <tr>
                            <td>{{$no++}}</td>
							<td>{{$data->kategori->nama_kategori}}</td>
							<td>{{$data->judul}}</td>
							<td>{{$data->konten}}</td>
							<td>{{$data->tanggal}}</td>
							<td>
		<a class="btn btn-primary" href=" {{ route('artikel.edit',$data->id)}} ">Ubah</a>
	</td>
	<td>
		<a class="btn btn-success" href=" {{ route('artikel.show',$data->id)}} ">Lihat</a>
	</td>
	<td>
		<form method="post" action="{{ route('artikel.destroy',$data->id) }}">
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