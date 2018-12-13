@extends('layouts.app')

@section('content')

    <!-- Bootstrap in use for basic display format -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New gift Form -->
        <form action="/gift" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Display Fields - product, quantity, and recipient  -->
            <!-- gift Name -->
            
            <div class="form-group">
                <label for="giftproduct" class="col-sm-3 control-label">Gift Name</label>
                <div class="col-sm-6">
                    <input type="text" name="product" id="product" class="form-control">
                    <small id="emailHelp" class="form-text text-muted">The selected holiday gift</small>
                </div>
            </div>

            <div class="form-group">
                <label for="gift" class="col-sm-3 control-label">Qty</label>
                <div class="col-sm-6">
                    <input type="number" name="quantity" id="quantity" class="form-control">
                    <small id="emailHelp" class="form-text text-muted">Number to purchase</small>
                </div>
            </div>

            <div class="form-group">
                <label for="gift" class="col-sm-3 control-label">Recipient</label>
                <div class="col-sm-6">
                    <input type="text" name="recipient" id="recipient" class="form-control">
                    <small id="emailHelp" class="form-text text-muted">Who gets this gift</small>
                </div>
            </div>

            <!-- Add gift Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add gift
                    </button>
                </div>
            </div>
        </form>
    </div>

     <!-- Current gifts -->
     @if (count($gifts) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current gifts
            </div>

            <div class="panel-body">
                <table class="table table-striped gift-table">

                    <!-- Table Headings -->
                    <thead>
                        <th>Gift Name</th>
                        <th>Quantity</th>
                        <th>Recipient</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($gifts as $gift)
                            <tr>
                                <!-- gift Name -->
                                <td class="table-text">
                                    <div>{{ $gift->product }}</div>
                                </td>
                                <!-- gift Quantity -->
                                <td class="table-text">
                                    <div>{{ $gift->quantity }}</div>
                                </td>
                                <!-- gift Recipient -->
                                <td class="table-text">
                                    <div>{{ $gift->recipient }}</div>
                                </td>
                                <!-- Delete Button -->
                                <td>
                                    <form action="/gift/{{ $gift->id }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button>Delete gift</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    
@endsection