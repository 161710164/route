@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Tambah Ekskul 
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('ekskul.store') }}" method="post" >
			  		{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama_ekskul') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Ekskul</label>	
			  			<input type="text" name="nama_ekskul" class="form-control"  required>
			  			@if ($errors->has('nama_ekskul'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama_ekskul') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('guru_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Pembina</label>
			  			<select name="guru_id" class="form-control">
			  				@foreach($gurus as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama_guru }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('guru_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('guru_id') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('fasilitas_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Fasilitas</label>
			  			<select name="fasilitas_id" class="form-control">
			  				@foreach($fasilitas as $data)
			  				<option value="{{ $data->id }}">{{ $data->nama_fasilitas }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('fasilitas_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fasilitas_id') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('jadwal') ? ' has-error' : '' }}">
			  			<label class="control-label">Jadwal</label>	
			  			<input type="text" name="jadwal" class="form-control"  required>
			  			@if ($errors->has('jadwal'))
                            <span class="help-block">
                                <strong>{{ $errors->first('jadwal') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection