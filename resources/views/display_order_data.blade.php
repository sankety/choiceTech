@extends('layouts.admin_template')
@section('content')
    <link rel="stylesheet" href="/admin/plugins/datatables/dataTables.bootstrap.css">

    <div class="content">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <!-- /.box -->

                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List of Products</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>User Name</th>
                                <th>Product SKU</th>
                                <th>Price</th>
                                <th>Created At</th>
{{--
                                <th>Action</th>
--}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($lists as $list)
                            <tr>
                                <td>{{ isset($list->products->name)?$list->products->name:'' }}</td>
                                <td>{{ isset($list->user->name)?$list->user->name:'' }}</td>
                                <td>{{ isset($list->products->sku)?$list->products->sku:'' }}</td>
                                <td>{{ isset($list->products->price)?$list->products->price:'' }}</td>
                                <td>{{ isset($list->created_at)?$list->created_at:'' }}</td>
{{--
                                <td><a href="/view/{{$list->id}}"><i class="fa fa-eye"></i></a></td>
--}}
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Web Address</th>
                                <th>Cover Letter</th>
{{--
                                <th>Action</th>
--}}
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- DataTables -->

@endsection
@section('scripts')
    <script src="/admin/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>

    <script>
        $(function () {
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>
    @endsection