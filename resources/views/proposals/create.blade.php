@extends('layouts.dashboard')

@section('content')

<div class="page-content">
    <!--end row-->
    <div class="text-end">
        <a class="btn btn-primary" href="{{ route('proposals.index') }}"> Back</a>
    </div>
    <div class="row mt-5">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="col">

            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body p-5">
                    <div class="card-title d-flex align-items-center mb-5">
                        <h5 class="mb-0 text-primary">Create New Proposal</h5>

                    </div>
                    <form action="{{ route('booking.store') }}" method="POST" class="row g-3">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group"><label>Title <span class="required">*</span></label> <input
                                            type="text" name="title" value="" class="form-control">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="form-group"><label>Status <span
                                                        class="required">*</span></label>
                                                <select name="status_id" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="1" data-select2-id="6">Draft</option>
                                                    <option value="2" data-select2-id="36">Sent</option>
                                                    <option value="3" data-select2-id="37">Open</option>
                                                    <option value="4" data-select2-id="38">Revised</option>
                                                    <option value="5" data-select2-id="39">Declined</option>
                                                    <option value="6" data-select2-id="40">Accepted</option>
                                                    <option value="7" data-select2-id="41">Expired</option>
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="form-group"><label>Assigned To <span
                                                        class="required">*</span></label>
                                                <select name="assigned_to" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="1" data-select2-id="6">Naeem</option>
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="form-group"><label>Related To <span
                                                        class="required">*</span></label>
                                                <select name="component_id" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="1" data-select2-id="6">Customer</option>
                                                    <option value="2" data-select2-id="36">Lead</option>
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="form-group"><label><span class="required"></span></label>
                                                <select name="component_number" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="1" data-select2-id="6">Naeem</option>
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label>To <span class="required">*</span></label>
                                        <input type="text" name="send_to" value="" class="form-control">
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>Date <span class="required">*</span> </label>
                                                <input type="text" class="form-control" name="date" value="">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>Open Till </label>
                                                <input type="text" class="form-control" name="open_till" value="">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label>Address </label>
                                        <textarea id="address" name="address" placeholder=""
                                            class="form-control "></textarea>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>Currency <span class="required">*</span> </label>
                                                <select name="currency_id" class='form-control selectpicker'>
                                                    <option value="">Select</option>
                                                    <option value="3">AUD : $</option>
                                                    <option value="4">GBP : £</option>
                                                    <option value="7">IND : ₹</option>
                                                    <option value="6">TND : DT</option>
                                                    <option value="1" selected="selected">TRY : ₺</option>
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>Discount Type</label>
                                                <select name="discount_type_id" class='form-control selectpicker'>
                                                    <option value="" selected="selected">No Discount</option>
                                                    <option value="1">Before Tax</option>
                                                    <option value="2">After Tax</option>
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>City </label>
                                                <input type="text" class="form-control " name="city" value="">
                                                <div class="form-control-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>State </label>
                                                <input type="text" class="form-control " name="state" value="">
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label>Tag </label>
                                        <select name="tag_id[]" class='form-control' multiple='multiple'>
                                            <option value="4">Gas boiler 200 L</option>
                                            <option value="2">Important</option>
                                            <option value="3">SWH</option>
                                            <option value="1">Tomorrow</option>
                                        </select>
                                        <div class="invalid-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>Zip Code </label>
                                                <input type="text" class="form-control " name="zip_code" value="">
                                                <div class="form-control-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <select name="assigned_to" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="1" data-select2-id="6">Pakistan</option>
                                                </select>
                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>Email <span class="required">*</span> </label>
                                                <input type="text" class="form-control form-control-sm" name="email"
                                                    value="">

                                                <div class="invalid-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>Phone </label>
                                                <input type="text" class="form-control form-control-sm" name="phone"
                                                    value="">
                                                <div class="form-control-feedback"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <table class="table items">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <td>Item</td>
                                    <td>Description</td>
                                    <td class="quantity">Qty</td>
                                    <td>Rate</td>
                                    <td>Tax</td>
                                    <td class="text-right">Amount</td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <td colspan="7"><a class="btn btn-success btn-sm" id="add_new_line"
                                            v-on:click="addRow($event);" href="#">
                                            <i class="fas fa-plus"></i> Add new line</a>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <table class="table text-right">
                            <tbody>
                                <tr id="subtotal">
                                    <td><span class="bold">Sub Total :</span></td>
                                    <td class="sub_total"> 0.00 <input type="hidden" name="sub_total" value="0.00"></td>
                                </tr>
                                <tr id="discount_area">
                                    <td>
                                        <div class="row">
                                            <div class="col-md-7"><span class="bold">Discount</span></div>
                                            <div class="col-md-5">
                                                <div id="discount-total" class="input-group"><input type="hidden"
                                                        value="0" name="discount_total"> <input type="hidden" value=""
                                                        name="discount_method_id">
                                                    <div class="input-group"><input type="text" name="discount_rate"
                                                            class="form-control form-control-sm text-right">
                                                        <div class="input-group-append"><button type="button"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false"
                                                                class="btn btn-sm btn-outline-primary dropdown-toggle discount_method_btn">%</button>
                                                            <div class="dropdown-menu dropdown-menu-right"><a href="#"
                                                                    class="dropdown-item">%</a> <a href="#"
                                                                    class="dropdown-item">Fixed Amount</a></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="discount-total">-0.00 <input type="hidden" name="discount_total"
                                            value="0"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-7"><span class="bold">Adjustment</span></div>
                                            <div class="col-md-5"><input type="text" name="adjustment"
                                                    class="form-control form-control-sm text-right"></div>
                                        </div>
                                    </td>
                                    <td class="adjustment">0.00</td>
                                </tr>
                                <tr>
                                    <td><span class="bold">Total :</span></td>
                                    <td class="total">0.00<input type="hidden" name="total" value="0.00"></td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-12 text-end">
                            <button type="submit" class="btn theme_btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end row-->
</div>
</div>
@endsection
