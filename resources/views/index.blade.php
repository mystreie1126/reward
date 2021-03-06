@extends('template')
@include('navtop')


@section('content')

<div class="container">
	

{{--
<a href='#modal1' class="btn collect-order_pay">Pay and Collect</a> --}}

	{{--   <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a> --}}

  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Please Select a Payment method</h4>
    </div>
    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat green white-text payment-proceed pay_by_cash">Cash</a>
      <a class="modal-action modal-close waves-effect waves-green btn-flat indigo white-text payment-proceed pay_by_card">Card</a>
    </div>
  </div>



  <div id="modal2" class="modal">
    <div class="modal-content">
      <h4>Please Select a Payment method</h4>
    </div>
    <div class="modal-footer">
      <a class="modal-action modal-close waves-effect waves-green btn-flat green white-text payment-proceed collect_pay_by_cash">Cash</a>
      <a class="modal-action modal-close waves-effect waves-green btn-flat indigo white-text payment-proceed collect_pay_by_card">Card</a>
    </div>
  </div>


@if(Auth::check() && Auth::user()->user_type < 10)
	<div class="row" id="order">
		 <div class="col s12">
			 <ul class="tabs click_flag">
				 <li class="tab col s3"><a class="active" href="#test1">Pre-Owned Orders</a></li>
				 <li class="tab col s3"><a href="#test2" id="get-pickup-order">Remaining Reward</a></li>
				 <li class="tab col s3"><a href="#test3" id="get-order-history" data-clicked="no">Collect in Store</a></li>
				 <li class="tab col s3"><a href="#test4" id="counting_stock">Stock Check</a></li>
			 </ul>
		 </div>
		 <div id="test1" class="col s12">
			 <div class="row">
			 	<p class="col s10"><a class="btn" id="get-new-order">check new order</a></p>
			 </div>

			 <div class="new-order blue lighten-4">

				 <ul class="collapsible" data-collapsible="expandable" id="order-info">

				</ul>


			 </div>
		 </div>


		 <div id="test2" class="col s12">
			 <div class="row valign-wrapper center">
				 <div class="col s8 input-field">
					 <input id="email-for-voucher" type="email" class="validate">
           			 <label for="email-for-voucher">Type Customer Email</label>
				 </div>
				 <div class="col s4">
				 	<button class="btn  orange" id="search-reward-by-email">Search Reward</button>
				 </div>

			 </div>

			 <div class="customer-has-results">

			 </div>
			</div>



		{{-- collection in store --}}
		 <div id="test3" class="col s12">
		 	<div class="row valign-wrapper center">
				 <div class="col s8 input-field">
					 <input id="input-id-ref" type="text" class="validate">
           			 <label for="input-id-ref">Order Reference</label>
				 </div>
				 <div class="col s4">
				 	<button class="btn  light-blue darken-2" id="search-order-by-reference">Search</button>
				 </div>
			 </div>

			 <div class="lol">
			 	<div class="row collect-order show">
			        <div class="col s12">
			          <div class="card">
			            <div class="card-content">
			              <div class="card-title collect-order_basic_info">

			              	<span class="collect-order_ref indigo-text"></span>
			              	<span class="collect-order_date hide-on-med-and-down"></span>
			              	<span class="cyan-text"><span class="collect-order_amount"></span> &euro;</span>
			              	<span class="collect-order_state"></span>
			              	<span class="collect-payment_status"></span>

			              </div>
			              <div class="collect-order_customer_info">
							<div>
								{{-- <span>
									<span class="collect-order_customer_name">customer name</span>
									<span class="collect-order_email">email</span>
								</span> --}}
				        		<span class="collect-order_customer_name">customer name</span><br>
				        		<span class="collect-order_email">email</span><br>
				        		<span>
				        			<span class='cyan-text'>Mobile Number: </span><span class="collect-order_contact_mobile"></span>&nbsp;
				        		</span>
				        		<span>
				        			<span class='cyan-text'>Home Number: </span> <span class="collect-order_contact_phone"></span>&nbsp;
				        		</span>
				        		<span>
				        			<span class='cyan-text'>City: </span><span class="collect-order_contact_City"></span>
				        		</span>
				        		<br>

				        		<hr>
				        	</div>
							<div class="collect-order_items">
								<div class="collect-order_items_detail">
								</div>
							</div>
			              </div>
			            </div>
			            <div class="card-action">
			              <button href='#modal2' class='modal-trigger btn collect-order_pay hide'>Pay and Collect</button>
			              <button href='#modal2' class='btn collect-order_no_pay hide'>Collect Only</button>
			            </div>

			            <div>
			            	<input type="hidden" class="hide-id_order" value="0">
				       		<input type="hidden" class="hide-id_customer" value="0">
							@if(Auth::check())
								<input type="hidden" class="hide-shop_name" value="{{Auth::User()->name}}">
								<input type="hidden" class="hide-shop_id" value="{{Auth::User()->shop_id}}">
						 	@endif
						 	<input type="hidden" class="hide-device_order" value="0">
						 	<input type="hidden" class="hide-pay_by_card" value="0">
						 	<input type="hidden" class="hide-pay_by_cash" value="0">
			            </div>
			          </div>
			        </div>
			    </div>


		 </div>

		<div id="test4" class="col s12">

        {{-- <ul class="collection">
         <li class="collection-item stock_detail">
           <span class="">IPhone TPU wallet case 7.89asdadadadasdasda</span>
           <span class="">100067</span>
           <input type="number" value="" required class="update_stock_input " placeholder="quantity">
           <span class="update_btn">Update</span>
         </li>
        </ul> --}}
       
		 </div>

	 </div>

	</div>
@endif

@if(Auth::check())

	<div id="refund" class="hide">
		<button id="refund-btn" class="btn red white-text">Refund an Order</button>
		<div class="row valign-wrapper center" id="refund-info">
			 <div class="col s8 input-field">
				 <input id="ref-for-refund" type="text" class="validate">
       			 <label for="ref-for-refund">Refund by Order reference</label>
			 </div>
			 <div class="col s4">
			 	<button class="btn  orange" id="search-refund-by-ref">Refund the Order</button>
			 </div>

		 </div>
		 <div class="refund-order-details row">

		 </div>
	</div>
	<div class="hide" id='lele'>
		 <input type="hidden" value="{{Auth::User()->shop_id}}" class="get_total_shop">
		<div class="sales-time-picker">
			 <div class="row">
			      	<div class="input-field input-date col s4">
			      		<input type="text" class="datepicker start-date" id="date" name="dateStart">
			      		<label for="date" class="green-text">From:</label>
			      	</div>


			      	<div class="input-field input-date col s4">
			      		<input type="text" class="datepicker end-date" id="date" name="dateEnd">
			      		<label for="date" class="indigo-text">To:</label>
			      	</div>


					<div class="col s4">
						<button class="btn-large right cyan get_online_sales">Web Sales Record</button>
					</div>



	  		</div>
        </div>

		<div class="websales-record-message flow-text"></div>
		<table class="striped total-sale ">

      	  <thead>
          <tr>
          	  <th>Order Ref</th>
          	  <th>Amount &euro;</th>
              <th>Card</th>
              <th>Cash</th>
              <th>Date</th>
          </tr>
        </thead>

        <tbody class='each-websales-record'>
          <tr>
          	<td>0</td>
          	<td>0</td>
            <td>0</td>
            <td>0</td>
            <td>0</td>
         </tr>
		</tbody>
		</table>






	</div>
	@endif
</div>
@endsection
