    <div class="card-header">
        <div class='data-user'>
            <a href="{{ route('product.detail',['id' => $product->id]) }}" class="nav-link">
                <span class="nickname"> {{  $product->name  }} </span>
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="image-container">
            <a href="{{ route('product.detail',['id' => $product->id]) }}">
                <img src="{{ route('product.file',['filename' => $product->image1]) }}" />
            </a>
        </div>
        <div class="description">
            <span class="nickname">{{ 'Producto: '.$product->name }}</span>
            <br/>
            <span class="nickname">{{ 'Precio: $'.$product->price }}</span>
            <p>{{ $product->description }}</p>
        </div>
        
    </div>
    <div class="clearfix"></div>
