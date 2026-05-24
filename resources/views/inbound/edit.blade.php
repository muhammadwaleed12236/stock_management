@extends('layouts.app')

@section('content')
    <form method="POST" action="{{ route('inbound.update', $stockIn) }}" id="inboundEditForm">
        @csrf
        @method('PUT')

        <div class="card shadow-sm mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h6 class="mb-0">Edit Inbound #{{ $stockIn->id }}</h6>
                <a href="{{ route('inbound.invoice', $stockIn) }}" class="btn btn-sm btn-outline-secondary">Back</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2 mb-2">
                        <label class="form-label">Warehouse</label>
                        <select name="warehouse_id" class="form-control form-control-sm" required>
                            <option value="">Select</option>
                            @foreach ($warehouses as $w)
                                <option value="{{ $w->id }}" {{ $stockIn->warehouse_id == $w->id ? 'selected' : '' }}>{{ $w->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2 mb-2">
                        <label class="form-label">Vendor</label>
                        <select name="vendor_id" class="form-control form-control-sm">
                            <option value="">Select</option>
                            @foreach ($vendors as $v)
                                <option value="{{ $v->id }}" {{ $stockIn->vendor_id == $v->id ? 'selected' : '' }}>{{ $v->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2 mb-2">
                        <label class="form-label">Arrived From</label>
                        <select name="arrived_from_id" class="form-control form-control-sm">
                            <option value="">Select</option>
                            @foreach ($arrivedFroms as $a)
                                <option value="{{ $a->id }}" {{ $stockIn->arrived_from_id == $a->id ? 'selected' : '' }}>{{ $a->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2 mb-2">
                        <label class="form-label">Transporter</label>
                        <select name="transporter_id" class="form-control form-control-sm">
                            <option value="">Select</option>
                            @foreach ($transporters as $t)
                                <option value="{{ $t->id }}" {{ $stockIn->transporter_id == $t->id ? 'selected' : '' }}>{{ $t->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2 mb-2">
                        <label class="form-label">Shipment Type</label>
                        <select name="shipment_type" class="form-select form-select-sm">
                            <option value="manual" {{ $stockIn->shipment_type == 'manual' ? 'selected' : '' }}>Manual</option>
                            <option value="auto" {{ $stockIn->shipment_type == 'auto' ? 'selected' : '' }}>Auto</option>
                        </select>
                    </div>

                    <div class="col-md-2 mb-2">
                        <label class="form-label">Invoice No</label>
                        <input name="dispatched_invoice_no" value="{{ $stockIn->dispatched_invoice_no }}" class="form-control form-control-sm" readonly>
                    </div>

                    <div class="col-md-2 mb-2">
                        <label class="form-label">Dispatcher Sig</label>
                        <input name="dispatcher_sig" value="{{ $stockIn->dispatcher_sig }}" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-2 mb-2">
                        <label class="form-label">Picker</label>
                        <input name="picker" value="{{ $stockIn->picker }}" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-2 mb-2">
                        <label class="form-label">PO No</label>
                        <input name="po_no" value="{{ $stockIn->po_no }}" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-2 mb-2">
                        <label class="form-label">IBD No</label>
                        <input name="ibd_no" value="{{ $stockIn->ibd_no }}" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-2 mb-2">
                        <label class="form-label">Shipment No</label>
                        <input name="shipment_no" value="{{ $stockIn->shipment_no }}" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-2 mb-2">
                        <label class="form-label">STO No</label>
                        <input name="sto_no" value="{{ $stockIn->sto_no }}" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-2 mb-2">
                        <label class="form-label">Delivery No</label>
                        <input name="delivery_no" value="{{ $stockIn->delivery_no }}" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-2 mb-2">
                        <label class="form-label">Vehicle No</label>
                        <input name="vehicle_no" value="{{ $stockIn->vehicle_no }}" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-2 mb-2">
                        <label class="form-label">Vehicle Size</label>
                        <input name="vehicle_size" value="{{ $stockIn->vehicle_size }}" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-2 mb-2">
                        <label class="form-label">Driver Name</label>
                        <input name="driver_name" value="{{ $stockIn->driver_name }}" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-2 mb-2">
                        <label class="form-label">Driver Mobile</label>
                        <input name="driver_mobile" value="{{ $stockIn->driver_mobile }}" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-2 mb-2">
                        <label class="form-label">Vehicle In</label>
                        <input type="datetime-local" name="vehicle_in_time" value="{{ $stockIn->vehicle_in_time?->format('Y-m-d\TH:i') }}" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-2 mb-2">
                        <label class="form-label">Vehicle Out</label>
                        <input type="datetime-local" name="vehicle_out_time" value="{{ $stockIn->vehicle_out_time?->format('Y-m-d\TH:i') }}" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-4 mb-2">
                        <label class="form-label">Remarks</label>
                        <input name="remarks" value="{{ $stockIn->remarks }}" class="form-control form-control-sm">
                    </div>
                </div>
            </div>
        </div>

        {{-- Items (read-only) --}}
        <div class="card shadow-sm">
            <div class="card-header">
                <h6 class="mb-0">Items ({{ $stockIn->items->count() }})</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-sm table-bordered mb-0 align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th class="text-end">Units</th>
                                <th class="text-end">Pack Size</th>
                                <th>Batch</th>
                                <th>Expiry</th>
                                <th>QC</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stockIn->items as $i)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $i->product->name ?? '-' }} <small class="text-muted">({{ $i->product->item_code ?? '' }})</small></td>
                                <td class="text-end">{{ $i->units_received }}</td>
                                <td class="text-end">{{ $i->pack_size_snapshot }}</td>
                                <td>{{ $i->vendor_batch ?? $i->sap_batch ?? '-' }}</td>
                                <td>{{ $i->expiry_date?->format('d-m-Y') ?: '-' }}</td>
                                <td>
                                    @php $qcClass = $i->quality_clearance === 'approved' ? 'bg-success' : ($i->quality_clearance === 'rejected' ? 'bg-danger' : 'bg-warning text-dark'); @endphp
                                    <span class="badge {{ $qcClass }}">{{ ucfirst($i->quality_clearance) }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="mt-3">
            <button class="btn btn-primary">Update Inbound</button>
            <a href="{{ route('inbound.invoice', $stockIn) }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection
