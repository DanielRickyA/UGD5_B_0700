@extends('dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tambah Pegawai</h1>
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
                        <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- row 1 -->
                            <div class="form-row">
                                <div class="col-md-4 form-group">
                                    <label class="font-weight-bold">NIP</label>
                                    <input type="text" class="form-control @error('nomor_induk_pegawai') is-invalid @enderror" id="nomor_induk_pegawai" name="nomor_induk_pegawai" value="{{ old('nomor_induk_pegawai') }}" placeholder="Masukan NIP">
                                    @error('nomor_induk_pegawai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-4 form-group">
                                    <label class="font-weight-bold">Nama Pegawai</label>
                                    <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror" id="nama_pegawai" name="nama_pegawai" value="{{ old('nama_pegawai') }}" placeholder="Masukan Nama Pegawai">
                                    @error('nama_pegawai')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-4" form-group>
                                    <label class="font-weight-bold">Departemen</label>
                                    <select name="id_departemen" id="id_departemen" class="form-control @error('id_departemen') is-invalid @enderror ">>

                                        @foreach ($departemens as $departemen)
                                        <option value="{{$departemen->id}}">{{$departemen->nama_departemen}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_departemen')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <!-- row 2 -->
                            <div class="form-row">
                                <div class="col-md-6 form-group">
                                    <label class="font-weight-bold">Telepon</label>
                                    <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ old('telepon') }}" placeholder="Masukan No. Telepon">
                                    @error('telepon')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>


                                <div class="col-md-6 form-group">
                                    <label class="font-weight-bold">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Masukan Email">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <!-- row 3 -->
                            <div class="form-row">
                                <div class="col-md-4 form-group">
                                    <label class="font-weight-bold">Gender</label>
                                    <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror " value="{{ old('gender') }} " placeholder="Masukan ">
                                        <option value="1">Pria</option>
                                        <option value="0">Wanita</option>
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-4 form-group">
                                    <label class="font-weight-bold">Status</label>
                                    <select name="status" id="status" class="form-control @error('status') is-invalid @enderror " value="{{ old('status') }} " placeholder="Masukan ">
                                        <option value="1">Aktif</option>
                                        <option value="0">Tidak Aktif</option>
                                    </select>
                                    @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="col-md-4 form-group">
                                    <label class="font-weight-bold">Gaji Poko</label>
                                    <input type="number" class="form-control @error('gaji_pokok') is-invalid @enderror" id="gaji_pokok" name="gaji_pokok" value="{{ old('gaji_pokok') }}" placeholder="Masukan ">
                                    @error('gaji_pokok')
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