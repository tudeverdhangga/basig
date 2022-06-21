@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')

<!-- <div class="container mt-5 mb-5"> -->
<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <h3 class="mb-5">Input Data Hotel</h3>
                <form action="{{ route('hotel.store') }}" method="POST" enctype="multipart/form-data">

                    {{ csrf_field() }}


                    <div class="form-group">
                        <label class="font-weight-bold">Nama</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Hotel">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Alamat</label>
                        <input type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Masukkan Alamat Hotel">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Daerah</label>
                        <input type="text" class="form-control" name="regency" value="{{ old('regency') }}" placeholder="Masukkan Daerah Hotel">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">No. Telepon</label>
                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="Masukkan No. Telepon Hotel">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Website</label>
                        <input type="text" class="form-control" name="website" value="{{ old('website') }}" placeholder="Masukkan Website Hotel">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">GAMBAR</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Lokasi latitude</label>
                        <input type="text" class="form-control" name="latitude" value="{{ old('latitude') }}" placeholder="Masukkan Lokasi latitude Hotel">
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Lokasi longitude</label>
                        <input type="text" class="form-control" name="longitude" value="{{ old('longitude') }}" placeholder="Masukkan Lokasi longitude Hotel">
                    </div>


                    <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                    <button type="reset" class="btn btn-md btn-warning">RESET</button>

                </form>
            </div>
        </div>
    </div>
</div>
<!-- </div> -->

@endsection

@push('plugin-scripts')
@endpush