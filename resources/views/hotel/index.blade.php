@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-5">Data Hotel</h3>
                <a href="{{ route('hotel.create') }}" class="btn btn-md btn-primary mb-3">
                    <i class="mdi mdi-plus"></i>
                    TAMBAH HOTEL
                </a>
                <!-- <p class="card-description"> Add class <code>.table-striped</code> </p> -->
                <div class="table-responsive">
                    <table class="table table-striped" id="example2">
                        <thead>
                            <tr>
                                <th> Name </th>
                                <th> Address </th>
                                <th> Regency </th>
                                <th> Phone </th>
                                <th> Website </th>
                                <th class="text-center"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php //dd($hotels); 
                            ?>
                            @forelse($hotels as $key => $hotel)
                            <tr>
                                <td>
                                    <a href="{{ route('hotel.show', $hotel->id) }}">
                                        {{mb_strimwidth($hotel->name, 0, 50, "...")}} 
                                    </a> 
                                </td>
                                <td> <?php echo mb_strimwidth($hotel->address, 0, 20, "..."); ?> </td>
                                <td> {{mb_strimwidth($hotel->regency, 0, 20, "...")}} </td>
                                <td> {{mb_strimwidth($hotel->phone, 0, 20, "...")}} </td>
                                <td> <a href="{{$hotel->website}}" target="_blank">{{mb_strimwidth($hotel->website, 0, 20, "...")}}</a> </td>
                                <td class="text-center">
                                    <form action="{{ url('/hotel', ['id' => $hotel->id]) }}" method="post">
                                        <a href="{{ route('hotel.edit', $hotel->id) }}" class="btn btn-success btn-icons btn-rounded">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
                                        <a href="{{ route('hotel.destroy', $hotel->id) }}" class="btn btn-danger btn-icons btn-rounded" onclick="return confirm('Are you sure?')">
                                            <i class="mdi mdi-delete"></i>
                                        </a>
                                        {!! method_field('delete') !!}
                                        {!! csrf_field() !!}
                                    </form>
                                </td>
                            </tr>
                            @empty

                            <div class="alert alert-danger">
                                Data Hotel belum Tersedia.
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div>


@endsection

@push('plugin-scripts')
@endpush

@push('custom-scripts')
<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });
</script>
@endpush