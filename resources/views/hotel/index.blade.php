@extends('layout.master')

@push('plugin-styles')
@endpush

@section('content')
<div class="row">

    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Data Hotel</h4>
                <a href="{{ route('hotel.create') }}" class="btn btn-md btn-success mb-3">TAMBAH HOTEL</a>
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
                                <th> Image </th>
                                <th class="text-center"> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php //dd($hotels); 
                            ?>
                            @forelse($hotels as $key => $hotel)
                            <tr>
                                <td> {{mb_strimwidth($hotel->name, 0, 50, "...")}} </td>
                                <td> <?php echo mb_strimwidth($hotel->address, 0, 20, "..."); ?> </td>
                                <td> {{mb_strimwidth($hotel->regency, 0, 20, "...")}} </td>
                                <td> {{mb_strimwidth($hotel->phone, 0, 20, "...")}} </td>
                                <td> <a href="{{$hotel->website}}" target="_blank">{{mb_strimwidth($hotel->website, 0, 20, "...")}}</a> </td>
                                <td class="py-1"> <img src="{{ URL::to('/') }}/hotelspic/{{$hotel->image}}" alt="{{ URL::to('/') }}/hotelspic/{{$hotel->image}}" /> </td>
                                <td class="text-center">
                                    <form action="{{ url('/hotel', ['id' => $hotel->id]) }}" method="post">
                                        <a href="{{ route('hotel.edit', $hotel->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                        <a href="{{ route('hotel.show', $hotel->id) }}" class="btn btn-sm btn-info">DETAIL</a>
                                        

                                        <input class="btn btn-sm btn-danger" type="submit" value="HAPUS" />
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
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<form action="" id="delete-form" method="delete">
    @method('delete')
    {{ csrf_field() }}
</form>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        if (confirm('Apakah anda yakin akan menghapus data ? ')) {
            $("#delete-form").attr('action', $(el).attr('href'));
            $("#delete-form").submit();
        }
    }
</script>
@endpush