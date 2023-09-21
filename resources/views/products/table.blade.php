<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-striped table-sm table-hover" id="products-table">
            <thead>
            <tr>
                <th>Item</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Description</th>
                <th>Avail</th>
                <th>Price</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->item }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->brand }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->avail }}</td>
                    <td>{{ $product->price }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('products.show', [$product->id]) }}"
                               class='btn btn-default btn-sm'>
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{ route('products.edit', [$product->id]) }}"
                               class='btn btn-default btn-sm'>
                                <i class="bi bi-pen"></i>
                            </a>
                            {!! Form::button('<i class="bi bi-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $products])
        </div>
    </div>
</div>
