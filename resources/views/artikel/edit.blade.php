@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-primary">
			  <div class="panel-heading">Edit Artikel
			  	<div class="panel-title pull-right"><a href="{{ url()->previous() }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('artikel.edit',$artikels->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('kategori_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama Kategori</label>	
			  			<select name="kategori_id" class="form-control">
			  				@foreach($kategoris as $data)
			  				<option value="{{ $data->id }}" {{ $selectedKategori == $data->id ? 'selected="selected"' : '' }} >{{ $data->nama_kategori }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('kategori_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kategori_id') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('judul') ? ' has-error' : '' }}">
			  			<label class="control-label">Judul</label>	
			  			<input type="text" value="{{ $artikels->judul }}" name="judul" class="form-control"  required>
			  			@if ($errors->has('judul'))
                            <span class="help-block">
                                <strong>{{ $errors->first('judul') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		
			  		<div class="form-group {{ $errors->has('konten') ? ' has-error' : '' }}">
			  			<label class="control-label">Konten</label>	
			  			<input type="text" value="{{ $artikels->konten }}" name="konten" class="form-control"  required>
			  			@if ($errors->has('konten'))
                            <span class="help-block">
                                <strong>{{ $errors->first('konten') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{$errors->has('tanggal') ? 'has-error' : ''}}">
								<label class="control-label">Tanggal Update</label>
								<input type="date" name="tanggal" class="form-control" value="{{$artikels->tanggal}}" required>
								@if ($errors->has('tanggal'))
									<span class="help-blocks">
										<strong>{{$errors->first('tanggal')}}</strong>
									</span>
								@endif
							</div>

			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Simpan</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection