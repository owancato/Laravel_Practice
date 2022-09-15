@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">產品列表</div>

                <div class="card-body">
                    @foreach ($productList as $product)
                        <li>
                            {{$product->name}} - {{$product->type}}
                        </li>
                    @endforeach

                    {{ $productList->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
