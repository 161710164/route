@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Lihat Ekskul 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
        			<div class="form-group">
			  			<label class="control-label">Nama Ekskul</label>	
			  			<input type="text" name="title" class="form-control" value="{{ $ekskuls->nama_ekskul }}"  readonly>
			  		</div>

			  		<div class="form-group">
			  			<label class="control-label">Nama Pembina</label>
						<input type="text" name="title" class="form-control" value="{{ $ekskuls->Guru->nama_guru }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Nama Fasilitas</label>
						<input type="text" name="title" class="form-control" value="{{ $ekskuls->Fasilitas->nama_fasilitas }}"  readonly>
			  		</div>
			  		<div class="form-group">
			  			<label class="control-label">Jadwal</label>
						<input type="text" name="title" class="form-control" value="{{ $ekskuls->jadwal }}"  readonly>
			  		</div>

			  		</div>
			  	</div>
			</div>	
		</div>
	</div>
</div>
@endsection