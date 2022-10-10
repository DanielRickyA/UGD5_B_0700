@extends('dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Proyek</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="#">Pegawai</a>
                    </li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('proyek.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- row 1 -->
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label class="font-weight-bold">Nama Proyek</label>
                                    <input type="text" class="form-control @error('nama_proyek') is-invalid @enderror" id="nama_proyek" name="nama_proyek" value="{{ old('nama_proyek') }}" placeholder="Masukan Nama Proyek">
                                    @error('nama_proyek')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-6" form-group>
                                    <label class="font-weight-bold">Departemen</label>
                                    <select name="departemen_id" id="departemen_id" class="form-control @error('departemen_id') is-invalid @enderror ">>

                                        @foreach ($departemens as $departemen)
                                        <option value="{{$departemen->id}}">{{$departemen->nama_departemen}}</option>
                                        @endforeach
                                    </select>
                                    @error('departemen_id_')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <!-- row 2 -->
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label class="font-weight-bold">Waktu Mulai</label>
                                    <input type="date" class="form-control @error('waktu_mulai') is-invalid @enderror" id="waktu_mulai" name="waktu_mulai" value="{{ old('waktu_mulai') }}">
                                    @error('waktu_mulai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group">
                                    <label class="font-weight-bold">Waktu Selesai</label>
                                    <input type="date" class="form-control @error('waktu_selesai') is-invalid @enderror" id="waktu_selesai" name="waktu_selesai" value="{{ old('waktu_selesai') }}">
                                    @error('waktu_selesai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>

                            <!-- row 3 -->

                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label class="font-weight-bold">Nilai Proyek</label>
                                    <input type="text" class="form-control @error('nilai_proyek') is-invalid @enderror" id="nilai_proyek" name="nilai_proyek" value="{{ old('nilai_proyek') }}" placeholder="Masukan Nilai Proyek">
                                    @error('nilai_proyek')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-6" form-group>
                                    <label class="font-weight-bold">Status</label>
                                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror ">>
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>


                            <div class="col-12 form-group">
                                <div class="row">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>

                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection