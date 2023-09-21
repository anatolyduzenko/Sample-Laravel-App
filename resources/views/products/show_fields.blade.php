<!-- Item Field -->
<div class="col-sm-12">
    {!! Form::label('item', 'Item:') !!}
    <p>{{ $product->item }}</p>
</div>

<!-- Name Field -->
<div class="col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $product->name }}</p>
</div>

<!-- Brand Field -->
<div class="col-sm-12">
    {!! Form::label('brand', 'Brand:') !!}
    <p>{{ $product->brand }}</p>
</div>

<!-- Description Field -->
<div class="col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $product->description }}</p>
</div>

<!-- Avail Field -->
<div class="col-sm-12">
    {!! Form::label('avail', 'Avail:') !!}
    <p>{{ $product->avail }}</p>
</div>

<!-- Price Field -->
<div class="col-sm-12">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $product->price }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $product->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $product->updated_at }}</p>
</div>

