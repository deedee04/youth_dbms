@extends('layouts.admin')
@section('users') active @stop
@section('users_page') active @stop
@section('content') 
  <div class="app-title">
      <div>
          <h1>
              <i class="fa fa-user"></i> Items</h1>
      </div>
      <div class="tile-title-w-btn" style="margin-top:16px;">
        <button class="btn btn-primary icon-btn" data-toggle="modal" data-target="#newItem"><i class="fa fa-plus"></i>Create New User</button>
    </div>
  </div> 

  <div class="tile">
    <div class="tile-body">
        @include('partials.alerts')
      <div class="table-responsive">
          <table class="table table-hover table-bordered " id="sampleTable">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Location</th>
                  <th>Weight</th>
                  <th>Delivery Date</th>
                  <th>Country</th>
                  <th>Address</th>
                  <th>Number</th>
                  <th>Tracking Id</th>
                  <th>Shippers Address</th>
                  <th>Carrier Ref</th>
                  <th>Total Frieght</th>
                  <th>Depature Time</th>
                  <th>Pickup Time</th>
                  <th>Comments</th>
                  <th>Shipment Mode</th>
                  <th>Payment Mode</th>
                  <th>Product</th>
                  <th>Status</th>
                  <th>Shippers Name</th>
                  <th>Shippers Email</th>
                  <th>Shippers phone</th>
                  <th>Shippers Country</th>
                  <th>Action</th>
                </tr>
              </thead>
				      <tbody>
                    @foreach($items as $item)
                      <tr>
                          <td>{{$item->firstname ." ".$item->middlename." ".$item->lastname}} </td>
                          <td>{{$item->email}}</td>
                          <td>{{$item->phone}}</td>
                          <td>{{$item->location}}</td>
                          <td>{{$item->weight}}</td>
                          <td>{{$item->delivery_date}}</td>
                          <td>{{$item->country}}</td>
                          <td>{{$item->address}}</td>
                          <td>{{$item->number}}</td>
                          <td>{{$item->tracking_id}}</td>
                          <td>{{$item->shippers_address}}</td>
                          <td>{{$item->carrier_ref}}</td>
                          <td>{{$item->total_freight}}</td>
                          <td>{{$item->depature_time}}</td>
                          <td>{{$item->pickup_time}}</td>
                          <td>{{$item->comments}}</td>
                          <td>{{$item->shipment_mode}}</td>
                          <td>{{$item->payment_mode}}</td>
                          <td>{{$item->product}}</td>
                          <td>{{$item->shippers_name}}</td>
                          <td>{{$item->shippers_email}}</td>
                          <td>{{$item->shippers_phone}}</td>
                          <td>{{$item->shippers_country}}</td>
                          <td>{{$item->status}}</td>
                          <td>
                              <div class="btn-group pull-right" role="group">
                                <button class="btn btn-primary pull-right" type="button">Action</button>
                                <div class="btn-group" role="group">
                                    <button class="btn btn-primary dropdown-toggle" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false"></button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" data-toggle="modal" data-target="#editItem{{$item->id}}" href="#">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit
                                        </a>
                                        <a class="dropdown-item" onclick="return confirm('Are you sure you want to delete this item?')" href="delete_item/{{$item->id}}">
                                            <i class="fa fa-trash"></i><span>Delete</span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </td>
                          {{-- <td>{{date("d-m-Y", strtotime($user->JoinDate))}}</td> --}}
                      </tr>
                      <!-- Modal:Create item Modal -->
                        <div class="modal fade" id="editItem{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <!--Header-->
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Add New Item</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <!--Body-->
                                        <div class="modal-body">
                                            <form method="post" action="{{url('update_items')}}">
                                                @csrf
                                                <div class="row">
                                                <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="firstname">Client First Name</label>
                                                            <input class="form-control {{$errors->has('firstname')? 'is-invalid':''}}" value="{{Request::old('firstname')?Request::old('firstname'):$item->firstname}}"
                                                                name="firstname" id="firstname" type="text" required>                                    
                                                            @if ($errors->has('firstname'))
                                                            <div class="form-control-feedback">{{$errors->first('firstname')}}</div>
                                                            @endif
                                                        </div>
                                                    </div>{{-- end col --}}
                                                    <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="middlename">Client Middle Name</label>
                                                                <input class="form-control {{$errors->has('middlename')? 'is-invalid':''}}" value="{{Request::old('middlename')?Request::old('middlename'):$item->middlename}}"
                                                                    name="middlename" id="middlename" type="text" required>                                    
                                                                @if ($errors->has('middlename'))
                                                                <div class="form-control-feedback">{{$errors->first('middlename')}}</div>
                                                                @endif
                                                            </div>
                                                        </div>{{-- end col --}}
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="lastname">Client Last Name</label>
                                                                <input class="form-control {{$errors->has('lastname')? 'is-invalid':''}}" value="{{Request::old('lastname')?Request::old('lastname'):$item->lastname}}"
                                                                    name="lastname" id="lastname" type="text" required>                                    
                                                                @if ($errors->has('lastname'))
                                                                <div class="form-control-feedback">{{$errors->first('lastname')}}</div>
                                                                @endif
                                                            </div>
                                                        </div>{{-- end col --}}
                                                </div>{{--End row--}}
                            
                                                <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="email">Client Email</label>
                                                                <input class="form-control {{$errors->has('email')? 'is-invalid':''}}" value="{{Request::old('email')?Request::old('email'):$item->email}}"
                                                                    name="email" id="email" type="email" required>                                    
                                                                @if ($errors->has('email'))
                                                                <div class="form-control-feedback">{{$errors->first('email')}}</div>
                                                                @endif
                                                            </div>
                                                        </div>{{-- end col --}}
                                                        <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="phone">Client Phone</label>
                                                                    <input class="form-control {{$errors->has('phone')? 'is-invalid':''}}" value="{{Request::old('phone')?Request::old('phone'):$item->phone}}"
                                                                        name="phone" id="phone" type="phone" required>                                    
                                                                    @if ($errors->has('phone'))
                                                                    <div class="form-control-feedback">{{$errors->first('phone')}}</div>
                                                                    @endif
                                                                </div>
                                                            </div>{{-- end col --}}
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="location">Package Current Location</label>
                                                                    <input class="form-control {{$errors->has('location')? 'is-invalid':''}}" value="{{Request::old('location')?Request::old('location'):$item->location}}"
                                                                        name="location" id="location" type="text" required>                                    
                                                                    @if ($errors->has('location'))
                                                                    <div class="form-control-feedback">{{$errors->first('location')}}</div>
                                                                    @endif
                                                                </div>
                                                            </div>{{-- end col --}}
                                                    </div>{{--End row--}}
                            
                                                    <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="weight">Package Weight</label>
                                                                    <input class="form-control {{$errors->has('weight')? 'is-invalid':''}}" value="{{Request::old('weight')?Request::old('weight'):$item->weight}}"
                                                                        name="weight" id="weight" type="text" required>                                    
                                                                    @if ($errors->has('weight'))
                                                                    <div class="form-control-feedback">{{$errors->first('weight')}}</div>
                                                                    @endif
                                                                </div>
                                                            </div>{{-- end col --}}
                                                            <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="number">Number of Items</label>
                                                                        <input class="form-control {{$errors->has('number')? 'is-invalid':''}}" value="{{Request::old('number')?Request::old('number'):$item->number}}"
                                                                            name="number" id="number" type="text" required>                                    
                                                                        @if ($errors->has('number'))
                                                                        <div class="form-control-feedback">{{$errors->first('number')}}</div>
                                                                        @endif
                                                                    </div>
                                                                </div>{{-- end col --}}
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="delivery_date">Expected Delivery Date</label>
                                                                        <input class="form-control {{$errors->has('delivery_date')? 'is-invalid':''}}" value="{{Request::old('delivery_date')?Request::old('delivery_date'):$item->delivery_date}}"
                                                                            name="delivery_date" id="delivery_date" type="date" required>                                    
                                                                        @if ($errors->has('delivery_date'))
                                                                        <div class="form-control-feedback">{{$errors->first('delivery_date')}}</div>
                                                                        @endif
                                                                    </div>
                                                                </div>{{-- end col --}}
                                                        </div>{{--End row--}}
                            
                                                        <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="address">Client Address</label>
                                                                        <textarea class="form-control {{$errors->has('address')? 'is-invalid':''}}"
                                                                            name="address" id="address" type="text" required>{{Request::old('address')?Request::old('address'):$item->address}}</textarea>                                    
                                                                        @if ($errors->has('address'))
                                                                        <div class="form-control-feedback">{{$errors->first('address')}}</div>
                                                                        @endif
                                                                    </div>
                                                                </div>{{-- end col --}}
                                                                <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="country">Package Destination Country</label>
                                                                            <select class="form-control {{$errors->has('country')? 'is-invalid':''}}" name="country" id="country"  required> 
                                                                                <option value="">--Select--</option>
                                                                                @foreach ($countries as $country)
                                                                                <option {{Request::old('country')==$country->country?'selected':$country->country== $item->country?'selected':''}} value="{{$country->country}}">{{$country->country}}</option>
                                                                                @endforeach
                                                                            </select>                                   
                                                                            @if ($errors->has('country'))
                                                                            <div class="form-control-feedback">{{$errors->first('country')}}</div>
                                                                            @endif
                                                                        </div>
                                                                    </div>{{-- end col --}}
                                                            </div>{{--End row--}}
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                     <div class="form-group">
                                                                         <label for="shippers_address">Shippers Address</label>
                                                                         <textarea class="form-control {{$errors->has('shippers_address')? 'is-invalid':''}}"
                                                                             name="shippers_address" id="shippers_address" type="text" required>{{Request::old('shippers_address')?Request::old('shippers_address'):$item->shippers_address}}</textarea>                                    
                                                                         @if ($errors->has('shippers_address'))
                                                                         <div class="form-control-feedback">{{$errors->first('shippers_address')}}</div>
                                                                         @endif
                                                                     </div>
                                                                 </div>{{-- end col --}}
                                                                 <div class="col-md-6">
                                                                         <div class="form-group">
                                                                             <label for="carrier_ref">Carrier Ref No</label>
                                                                             <input type="text" class="form-control" value="{{Request::old('carrier_ref')?Request::old('carrier_ref'):$item->carrier_ref}}" name="carrier_ref" id="carrier_ref" required>                                  
                                                                             @if ($errors->has('carrier_ref'))
                                                                             <div class="form-control-feedback">{{$errors->first('carrier_ref')}}</div>
                                                                             @endif
                                                                         </div>
                                                                     </div>{{-- end col --}}
                                                             </div>{{--End row--}}
                                                             <div class="row">
                                                                <div class="col-md-6">
                                                                     <div class="form-group">
                                                                         <label for="total_freight">Total Freight</label>
                                                                         <input class="form-control {{$errors->has('total_freight')? 'is-invalid':''}}"
                                                                             name="total_freight" id="total_freight" type="text" value="{{Request::old('total_freight')?Request::old('total_freight'):$item->total_freight}}" required>                                    
                                                                         @if ($errors->has('total_freight'))
                                                                         <div class="form-control-feedback">{{$errors->first('total_freight')}}</div>
                                                                         @endif
                                                                     </div>
                                                                 </div>{{-- end col --}}
                                                                 <div class="col-md-6">
                                                                         <div class="form-group">
                                                                             <label for="depature_time">Depature Time</label>
                                                                             <input type="text" class="form-control" value="{{Request::old('depature_time')?Request::old('depature_time'):$item->depature_time}}" name="depature_time" id="depature_time" required>                                  
                                                                             @if ($errors->has('depature_time'))
                                                                             <div class="form-control-feedback">{{$errors->first('depature_time')}}</div>
                                                                             @endif
                                                                         </div>
                                                                     </div>{{-- end col --}}
                                                             </div>{{--End row--}}
                                                             <div class="row">
                                                                <div class="col-md-6">
                                                                     <div class="form-group">
                                                                         <label for="pickup_time">Pickup Time</label>
                                                                         <input class="form-control {{$errors->has('pickup_time')? 'is-invalid':''}}"
                                                                             name="pickup_time" id="pickup_time" type="text" value="{{Request::old('pickup_time')?Request::old('pickup_time'):$item->pickup_time}}" required>                                    
                                                                         @if ($errors->has('pickup_time'))
                                                                         <div class="form-control-feedback">{{$errors->first('pickup_time')}}</div>
                                                                         @endif
                                                                     </div>
                                                                 </div>{{-- end col --}}
                                                                 <div class="col-md-6">
                                                                         <div class="form-group">
                                                                             <label for="comments">Comments</label>
                                                                             <input type="text" class="form-control" value="{{Request::old('comments')?Request::old('comments'):$item->comments}}" name="comments" id="comments" required>                                  
                                                                             @if ($errors->has('comments'))
                                                                             <div class="form-control-feedback">{{$errors->first('comments')}}</div>
                                                                             @endif
                                                                         </div>
                                                                     </div>{{-- end col --}}
                                                             </div>{{--End row--}}
                                                             <div class="row">
                                                                <div class="col-md-6">
                                                                     <div class="form-group">
                                                                         <label for="shipment_mode">Shipment Mode</label>
                                                                         <input class="form-control {{$errors->has('shipment_mode')? 'is-invalid':''}}"
                                                                             name="shipment_mode" id="shipment_mode" type="text" value="{{Request::old('shipment_mode')?Request::old('shipment_mode'):$item->shipment_mode}}" required>                                    
                                                                         @if ($errors->has('shipment_mode'))
                                                                         <div class="form-control-feedback">{{$errors->first('shipment_mode')}}</div>
                                                                         @endif
                                                                     </div>
                                                                 </div>{{-- end col --}}
                                                                 <div class="col-md-6">
                                                                         <div class="form-group">
                                                                             <label for="payment_mode">Payment Mode</label>
                                                                             <input type="text" class="form-control" value="{{Request::old('payment_mode')?Request::old('payment_mode'):$item->payment_mode}}" name="payment_mode" id="payment_mode" required>                                  
                                                                             @if ($errors->has('payment_mode'))
                                                                             <div class="form-control-feedback">{{$errors->first('payment_mode')}}</div>
                                                                             @endif
                                                                         </div>
                                                                     </div>{{-- end col --}}
                                                             </div>{{--End row--}}
                                                             <div class="row">
                                                                <div class="col-md-6">
                                                                     <div class="form-group">
                                                                         <label for="product">Product</label>
                                                                         <input class="form-control {{$errors->has('product')? 'is-invalid':''}}"
                                                                             name="product" id="product" type="text" value="{{Request::old('product')?Request::old('product'):$item->product}}" required>                                    
                                                                         @if ($errors->has('product'))
                                                                         <div class="form-control-feedback">{{$errors->first('product')}}</div>
                                                                         @endif
                                                                     </div>
                                                                 </div>{{-- end col --}}
                                                                 <div class="col-md-6">
                                                                         <div class="form-group">
                                                                             <label for="status">Status</label>
                                                                             <input type="text" value="{{Request::old('status')?Request::old('status'):$item->status}}" class="form-control" name="status" id="status" required>                                  
                                                                             @if ($errors->has('status'))
                                                                             <div class="form-control-feedback">{{$errors->first('status')}}</div>
                                                                             @endif
                                                                         </div>
                                                                     </div>{{-- end col --}}
                                                             </div>{{--End row--}}
                                                             <div class="row">
                                                                    <div class="col-md-6">
                                                                         <div class="form-group">
                                                                             <label for="shippers_name">Shippers Full Name</label>
                                                                             <input class="form-control {{$errors->has('shippers_name')? 'is-invalid':''}}"
                                                                                 name="shippers_name" id="shippers_name" type="text" value="{{Request::old('shippers_name')?Request::old('shippers_name'):$item->shippers_name}}" required>                                    
                                                                             @if ($errors->has('shippers_name'))
                                                                             <div class="form-control-feedback">{{$errors->first('shippers_name')}}</div>
                                                                             @endif
                                                                         </div>
                                                                     </div>{{-- end col --}}
                                                                     <div class="col-md-6">
                                                                             <div class="form-group">
                                                                                 <label for="shippers_email">Shippers Email</label>
                                                                                 <input type="text" class="form-control" value="{{Request::old('shippers_email')?Request::old('shippers_email'):$item->shippers_email}}" name="shippers_email" id="shippers_email" required>                                  
                                                                                 @if ($errors->has('shippers_email'))
                                                                                 <div class="form-control-feedback">{{$errors->first('shippers_email')}}</div>
                                                                                 @endif
                                                                             </div>
                                                                         </div>{{-- end col --}}
                                                                 </div>{{--End row--}}
                                                                 <div class="row">
                                                                        <div class="col-md-6">
                                                                             <div class="form-group">
                                                                                 <label for="shippers_phone">Shippers Phone</label>
                                                                                 <input class="form-control {{$errors->has('shippers_phone')? 'is-invalid':''}}"
                                                                                     name="shippers_phone" id="shippers_phone" type="text" value="{{Request::old('shippers_phone')?Request::old('shippers_phone'):$item->shippers_phone}}" required>                                    
                                                                                 @if ($errors->has('shippers_phone'))
                                                                                 <div class="form-control-feedback">{{$errors->first('shippers_phone')}}</div>
                                                                                 @endif
                                                                             </div>
                                                                         </div>{{-- end col --}}
                                                                         <div class="col-md-6">
                                                                                 <div class="form-group">
                                                                                     <label for="shippers_country">Shippers Country</label>
                                                                                     <input type="text" class="form-control" value="{{Request::old('shippers_country')?Request::old('shippers_country'):$item->shippers_country}}" name="shippers_country" id="shippers_country" required>                                  
                                                                                     @if ($errors->has('shippers_country'))
                                                                                     <div class="form-control-feedback">{{$errors->first('shippers_country')}}</div>
                                                                                     @endif
                                                                                 </div>
                                                                             </div>{{-- end col --}}
                                                                     </div>{{--End row--}}
                                        </div>
                                        <!--Footer-->
                                        <div class="modal-footer">
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                                            <button class="btn btn-primary">Submit</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Ceate Irm Modal -->             
       
                  @endforeach
              </tbody>
          </table>
      </div>
    </div>
  </div>
   <!-- Modal:Create item Modal -->
   <div class="modal fade" id="newItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add New Item</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body">
                <form method="post" action="{{url('items')}}">
                    @csrf
                    <div class="row">
                       <div class="col-md-4">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input class="form-control {{$errors->has('firstname')? 'is-invalid':''}}" value="{{Request::old('firstname')}}"
                                    name="firstname" id="firstname" type="text" required>                                    
                                @if ($errors->has('firstname'))
                                <div class="form-control-feedback">{{$errors->first('firstname')}}</div>
                                @endif
                            </div>
                        </div>{{-- end col --}}
                        <div class="col-md-4">
                                <div class="form-group">
                                    <label for="middlename">Middle Name</label>
                                    <input class="form-control {{$errors->has('middlename')? 'is-invalid':''}}" value="{{Request::old('middlename')}}"
                                        name="middlename" id="middlename" type="text" required>                                    
                                    @if ($errors->has('middlename'))
                                    <div class="form-control-feedback">{{$errors->first('middlename')}}</div>
                                    @endif
                                </div>
                            </div>{{-- end col --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input class="form-control {{$errors->has('lastname')? 'is-invalid':''}}" value="{{Request::old('lastname')}}"
                                        name="lastname" id="lastname" type="text" required>                                    
                                    @if ($errors->has('lastname'))
                                    <div class="form-control-feedback">{{$errors->first('lastname')}}</div>
                                    @endif
                                </div>
                            </div>{{-- end col --}}
                    </div>{{--End row--}}

                    <div class="row">
                            <div class="col-md-4">
                                 <div class="form-group">
                                     <label for="email">Email</label>
                                     <input class="form-control {{$errors->has('email')? 'is-invalid':''}}" value="{{Request::old('email')}}"
                                         name="email" id="email" type="text" required>                                    
                                     @if ($errors->has('email'))
                                     <div class="form-control-feedback">{{$errors->first('email')}}</div>
                                     @endif
                                 </div>
                             </div>{{-- end col --}}
                             <div class="col-md-4">
                                     <div class="form-group">
                                         <label for="phone">Phone</label>
                                         <input class="form-control {{$errors->has('phone')? 'is-invalid':''}}" value="{{Request::old('phone')}}"
                                             name="phone" id="phone" type="phone" required>                                    
                                         @if ($errors->has('phone'))
                                         <div class="form-control-feedback">{{$errors->first('phone')}}</div>
                                         @endif
                                     </div>
                                 </div>{{-- end col --}}
                                 <div class="col-md-4">
                                     <div class="form-group">
                                         <label for="location">Location</label>
                                         <input class="form-control {{$errors->has('location')? 'is-invalid':''}}" value="{{Request::old('location')}}"
                                             name="location" id="location" type="text" required>                                    
                                         @if ($errors->has('location'))
                                         <div class="form-control-feedback">{{$errors->first('location')}}</div>
                                         @endif
                                     </div>
                                 </div>{{-- end col --}}
                         </div>{{--End row--}}

                         <div class="row">
                                <div class="col-md-4">
                                     <div class="form-group">
                                         <label for="weight">Weight</label>
                                         <input class="form-control {{$errors->has('weight')? 'is-invalid':''}}" value="{{Request::old('weight')}}"
                                             name="weight" id="weight" type="text" required>                                    
                                         @if ($errors->has('weight'))
                                         <div class="form-control-feedback">{{$errors->first('weight')}}</div>
                                         @endif
                                     </div>
                                 </div>{{-- end col --}}
                                 <div class="col-md-2">
                                         <div class="form-group">
                                             <label for="number">Number of Items</label>
                                             <input class="form-control {{$errors->has('number')? 'is-invalid':''}}" value="{{Request::old('number')}}"
                                                 name="number" id="number" type="text" required>                                    
                                             @if ($errors->has('number'))
                                             <div class="form-control-feedback">{{$errors->first('number')}}</div>
                                             @endif
                                         </div>
                                     </div>{{-- end col --}}
                                     <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="delivery_date">Delivery Date</label>
                                             <input class="form-control {{$errors->has('delivery_date')? 'is-invalid':''}}" value="{{Request::old('delivery_date')}}"
                                                 name="delivery_date" id="delivery_date" type="date" required>                                    
                                             @if ($errors->has('delivery_date'))
                                             <div class="form-control-feedback">{{$errors->first('delivery_date')}}</div>
                                             @endif
                                         </div>
                                     </div>{{-- end col --}}
                             </div>{{--End row--}}

                             <div class="row">
                                    <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="address">Address</label>
                                             <textarea class="form-control {{$errors->has('address')? 'is-invalid':''}}"
                                                 name="address" id="address" type="text" required>{{Request::old('address')}}</textarea>                                    
                                             @if ($errors->has('address'))
                                             <div class="form-control-feedback">{{$errors->first('address')}}</div>
                                             @endif
                                         </div>
                                     </div>{{-- end col --}}
                                     <div class="col-md-6">
                                             <div class="form-group">
                                                 <label for="country">Country</label>
                                                 <select class="form-control {{$errors->has('country')? 'is-invalid':''}}" name="country" id="country"  required> 
                                                    <option value="">--Select--</option>
                                                    @foreach ($countries as $country)
                                                    <option {{Request::old('country')==$country->country?'selected':''}} value="{{$country->country}}">{{$country->country}}</option>
                                                    @endforeach
                                                 </select>                                   
                                                 @if ($errors->has('country'))
                                                 <div class="form-control-feedback">{{$errors->first('country')}}</div>
                                                 @endif
                                             </div>
                                         </div>{{-- end col --}}
                                 </div>{{--End row--}}
                                 <div class="row">
                                    <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="shippers_address">Shippers Address</label>
                                             <textarea class="form-control {{$errors->has('shippers_address')? 'is-invalid':''}}"
                                                 name="shippers_address" id="shippers_address" type="text" required>{{Request::old('shippers_address')}}</textarea>                                    
                                             @if ($errors->has('shippers_address'))
                                             <div class="form-control-feedback">{{$errors->first('shippers_address')}}</div>
                                             @endif
                                         </div>
                                     </div>{{-- end col --}}
                                     <div class="col-md-6">
                                             <div class="form-group">
                                                 <label for="carrier_ref">Carrier Ref No</label>
                                                 <input type="text" class="form-control" name="carrier_ref" id="carrier_ref" required>                                  
                                                 @if ($errors->has('carrier_ref'))
                                                 <div class="form-control-feedback">{{$errors->first('carrier_ref')}}</div>
                                                 @endif
                                             </div>
                                         </div>{{-- end col --}}
                                 </div>{{--End row--}}
                                 <div class="row">
                                    <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="total_freight">Total Freight</label>
                                             <input class="form-control {{$errors->has('total_freight')? 'is-invalid':''}}"
                                                 name="total_freight" id="total_freight" type="text" value="{{Request::old('total_freight')}}" required>                                    
                                             @if ($errors->has('total_freight'))
                                             <div class="form-control-feedback">{{$errors->first('total_freight')}}</div>
                                             @endif
                                         </div>
                                     </div>{{-- end col --}}
                                     <div class="col-md-6">
                                             <div class="form-group">
                                                 <label for="depature_time">Depature Time</label>
                                                 <input type="text" class="form-control" name="depature_time" id="depature_time" required>                                  
                                                 @if ($errors->has('depature_time'))
                                                 <div class="form-control-feedback">{{$errors->first('depature_time')}}</div>
                                                 @endif
                                             </div>
                                         </div>{{-- end col --}}
                                 </div>{{--End row--}}
                                 <div class="row">
                                    <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="pickup_time">Pickup Time</label>
                                             <input class="form-control {{$errors->has('pickup_time')? 'is-invalid':''}}"
                                                 name="pickup_time" id="pickup_time" type="text" value="{{Request::old('pickup_time')}}" required>                                    
                                             @if ($errors->has('pickup_time'))
                                             <div class="form-control-feedback">{{$errors->first('pickup_time')}}</div>
                                             @endif
                                         </div>
                                     </div>{{-- end col --}}
                                     <div class="col-md-6">
                                             <div class="form-group">
                                                 <label for="comments">Comments</label>
                                                 <input type="text" class="form-control" name="comments" id="comments" required>                                  
                                                 @if ($errors->has('comments'))
                                                 <div class="form-control-feedback">{{$errors->first('comments')}}</div>
                                                 @endif
                                             </div>
                                         </div>{{-- end col --}}
                                 </div>{{--End row--}}
                                 <div class="row">
                                    <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="shipment_mode">Shipment Mode</label>
                                             <input class="form-control {{$errors->has('shipment_mode')? 'is-invalid':''}}"
                                                 name="shipment_mode" id="shipment_mode" type="text" value="{{Request::old('shipment_mode')}}" required>                                    
                                             @if ($errors->has('shipment_mode'))
                                             <div class="form-control-feedback">{{$errors->first('shipment_mode')}}</div>
                                             @endif
                                         </div>
                                     </div>{{-- end col --}}
                                     <div class="col-md-6">
                                             <div class="form-group">
                                                 <label for="payment_mode">Payment Mode</label>
                                                 <input type="text" class="form-control" name="payment_mode" id="payment_mode" required>                                  
                                                 @if ($errors->has('payment_mode'))
                                                 <div class="form-control-feedback">{{$errors->first('payment_mode')}}</div>
                                                 @endif
                                             </div>
                                         </div>{{-- end col --}}
                                 </div>{{--End row--}}
                                 <div class="row">
                                    <div class="col-md-6">
                                         <div class="form-group">
                                             <label for="product">Product</label>
                                             <input class="form-control {{$errors->has('product')? 'is-invalid':''}}"
                                                 name="product" id="product" type="text" value="{{Request::old('product')}}" required>                                    
                                             @if ($errors->has('product'))
                                             <div class="form-control-feedback">{{$errors->first('product')}}</div>
                                             @endif
                                         </div>
                                     </div>{{-- end col --}}
                                     <div class="col-md-6">
                                             <div class="form-group">
                                                 <label for="status">Status</label>
                                                 <input type="text" class="form-control" name="status" id="status" required>                                  
                                                 @if ($errors->has('status'))
                                                 <div class="form-control-feedback">{{$errors->first('status')}}</div>
                                                 @endif
                                             </div>
                                         </div>{{-- end col --}}
                                 </div>{{--End row--}}
                                 <div class="row">
                                        <div class="col-md-6">
                                             <div class="form-group">
                                                 <label for="shippers_name">Shippers Name</label>
                                                 <input class="form-control {{$errors->has('shippers_name')? 'is-invalid':''}}"
                                                     name="shippers_name" id="shippers_name" type="text" value="{{Request::old('shippers_name')}}" required>                                    
                                                 @if ($errors->has('shippers_name'))
                                                 <div class="form-control-feedback">{{$errors->first('shippers_name')}}</div>
                                                 @endif
                                             </div>
                                         </div>{{-- end col --}}
                                         <div class="col-md-6">
                                                 <div class="form-group">
                                                     <label for="shippers_email">Shippers Email</label>
                                                     <input type="text" class="form-control" name="shippers_email" id="shippers_email" required>                                  
                                                     @if ($errors->has('shippers_email'))
                                                     <div class="form-control-feedback">{{$errors->first('shippers_email')}}</div>
                                                     @endif
                                                 </div>
                                             </div>{{-- end col --}}
                                     </div>{{--End row--}}
                                     <div class="row">
                                            <div class="col-md-6">
                                                 <div class="form-group">
                                                     <label for="shippers_phone">Shippers Phone</label>
                                                     <input class="form-control {{$errors->has('shippers_phone')? 'is-invalid':''}}"
                                                         name="shippers_phone" id="shippers_phone" type="text" value="{{Request::old('shippers_phone')}}" required>                                    
                                                     @if ($errors->has('shippers_phone'))
                                                     <div class="form-control-feedback">{{$errors->first('shippers_phone')}}</div>
                                                     @endif
                                                 </div>
                                             </div>{{-- end col --}}
                                             <div class="col-md-6">
                                                     <div class="form-group">
                                                         <label for="shippers_country">Shippers Country</label>
                                                         <input type="text" class="form-control" name="shippers_country" id="shippers_country" required>                                  
                                                         @if ($errors->has('shippers_country'))
                                                         <div class="form-control-feedback">{{$errors->first('shippers_country')}}</div>
                                                         @endif
                                                     </div>
                                                 </div>{{-- end col --}}
                                         </div>{{--End row--}}
            </div>
            <!--Footer-->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Ceate Item Modal -->             
   
@stop
@section('script')
   
@stop
