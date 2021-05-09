@extends('backend.layouts.master')

@section('title','Order Detail')

@section('main-content')
<div class="card">
  <h5 class="card-header">Đơn đặt hàng
    <a href="{{route('order.pdf',$order->id)}}" class=" btn btn-sm btn-primary shadow-sm float-right"><i class="fas fa-download fa-sm text-white-50"></i> Generate PDF</a>
  </h5>
</div>
<h5 class="card-header">Mã đơn hàng: {{$order->order_number}}</h5>
<h5 class="card-header">Khách hàng: {{$order->name}}</h5>
<h5 class="card-header">Email: {{$order->email}}</h5>
<h5 class="card-header">Thành tiền: {{number_format($order->total_amount)}}đ</h5>
<div class="row card-header">
  <h5 class="col-3">
    Trạng thái: @if($order->status=='new')
    <span class="badge badge-primary">{{$order->status}}</span>
    @elseif($order->status=='process')
    <span class="badge badge-warning">{{$order->status}}</span>
    @elseif($order->status=='delivered')
    <span class="badge badge-success">{{$order->status}}</span>
    @else
    <span class="badge badge-danger">{{$order->status}}</span>
    @endif
  </h5>
  <h5>Action: </h5>
  <div class="col-8">
    <a href="{{route('order.edit',$order->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
    <form method="POST" action="{{route('order.destroy',[$order->id])}}">
      @csrf
      @method('delete')
      <button class="btn btn-danger btn-sm dltBtn" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
    </form>
  </div>
</div>
<div class="card-body">
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Size</th>
        <th>Giá</th>
      </tr>
    </thead>
    <tbody>
      @foreach($order->cart as $item)
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$item->product['title']}}</td>
        <td>{{$item->quantity}}</td>
        <td>{{$item->size}}</td>
        <td>{{$item->product['price']}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<!-- <div class="card-body">
    @if($order)
    <table class="table table-striped table-hover">
      <thead>
        <tr>
            <th>S.N.</th>
            <th>Order No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Quantity</th>
            <th>Charge</th>
            <th>Total Amount</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
      </thead>
      <tbody>
      @php
          $shipping_charge=DB::table('shippings')->where('id',$order->shipping_id)->pluck('price');
      @endphp 
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->order_number}}</td>
            <td>{{$order->name}}</td>
            <td>{{$order->email}}</td>
            <td>{{$order->quantity}}</td>
            <td>@foreach($shipping_charge as $data) {{number_format($data)}}đ @endforeach</td>
            <td>{{number_format($order->total_amount)}}đ</td>
            <td>
                @if($order->status=='new')
                  <span class="badge badge-primary">{{$order->status}}</span>
                @elseif($order->status=='process')
                  <span class="badge badge-warning">{{$order->status}}</span>
                @elseif($order->status=='delivered')
                  <span class="badge badge-success">{{$order->status}}</span>
                @else
                  <span class="badge badge-danger">{{$order->status}}</span>
                @endif
            </td>
            <td>
                <a href="{{route('order.edit',$order->id)}}" class="btn btn-primary btn-sm float-left mr-1" style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" title="edit" data-placement="bottom"><i class="fas fa-edit"></i></a>
                <form method="POST" action="{{route('order.destroy',[$order->id])}}">
                  @csrf 
                  @method('delete')
                      <button class="btn btn-danger btn-sm dltBtn" data-id={{$order->id}} style="height:30px; width:30px;border-radius:50%" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                </form>
            </td>
          
        </tr>
      </tbody>
    </table>

    <section class="confirmation_part section_padding">
      <div class="order_boxes">
        <div class="row">
          <div class="col-lg-6 col-lx-4">
            <div class="order-info">
              <h4 class="text-center pb-4">ORDER INFORMATION</h4>
              <table class="table">
                    <tr class="">
                        <td>Order Number</td>
                        <td> : {{$order->order_number}}</td>
                    </tr>
                    <tr>
                        <td>Order Date</td>
                        <td> : {{$order->created_at->format('D d M, Y')}} at {{$order->created_at->format('g : i a')}} </td>
                    </tr>
                    <tr>
                        <td>Quantity</td>
                        <td> : {{$order->quantity}}</td>
                    </tr>
                    <tr>
                        <td>Order Status</td>
                        <td> : {{$order->status}}</td>
                    </tr>
                    <tr>
                      @php
                          $shipping_charge=DB::table('shippings')->where('id',$order->shipping_id)->pluck('price');
                      @endphp
                        <td>Shipping Charge</td>
                        <td> : {{number_format($shipping_charge[0])}}đ</td>
                    </tr>
                    <tr>
                      <td>Coupon</td>
                      <td> : {{number_format($order->coupon)}}đ</td>
                    </tr>
                    <tr>
                        <td>Total Amount</td>
                        <td> : {{number_format($order->total_amount)}}đ</td>
                    </tr>
                    <tr>
                        <td>Payment Method</td>
                        <td> : @if($order->payment_method=='cod') Cash on Delivery @else Paypal @endif</td>
                    </tr>
                    <tr>
                        <td>Payment Status</td>
                        <td> : {{$order->payment_status}}</td>
                    </tr>
              </table>
            </div>
          </div>

          <div class="col-lg-6 col-lx-4">
            <div class="shipping-info">
              <h4 class="text-center pb-4">SHIPPING INFORMATION</h4>
              <table class="table">
                    <tr class="">
                        <td>Full Name</td>
                        <td> : {{$order->first_name}} {{$order->last_name}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> : {{$order->email}}</td>
                    </tr>
                    <tr>
                        <td>Phone No.</td>
                        <td> : {{$order->phone}}</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td> : {{$order->address1}}, {{$order->address2}}</td>
                    </tr>
                    <tr>
                        <td>Country</td>
                        <td> : {{$order->country}}</td>
                    </tr>
                    <tr>
                        <td>Post Code</td>
                        <td> : {{$order->post_code}}</td>
                    </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
    @endif

  </div> 

</div>-->
@endsection

@push('styles')
<style>
  .order-info,
  .shipping-info {
    background: #ECECEC;
    padding: 20px;
  }

  .order-info h4,
  .shipping-info h4 {
    text-decoration: underline;
  }
</style>
@endpush