@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Recent Users</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">User ID</th>
                            <th scope="col">Upline</th>
                            <th scope="col">Refferal</th>
                            <th scope="col">Address</th>
                            <th scope="col">Carry Gen</th>
                            <th scope="col">Status</th>
                            <th scope="col">View</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                           <?php      
                            if($item->status==1){ $statusText= '<span style="color:green;">Active</span>';} 
                            else { $statusText= '<span style="color:red;">Not Active</span>';}
                            ?>
                          <tr>
                            <th scope="row">{{ $item->user_id }}</th>
                            <td>{{ $item->upline }}</td>
                            <td>{{ $item->reff_id }}</td>
                            <td>{{ $item->wallet_address }}</td>
                            <td>{{ $item->carry_gen }}</td>
                            <td><?php echo $statusText ; ?></td>
                            <td><a class="btn btn-warning" href="{{url('/admin/user/view')}}/<?php echo base64_encode($item->user_id); ?>">View</a></td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
