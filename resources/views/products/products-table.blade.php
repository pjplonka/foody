<table class="table table-borderless custom-table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Calories</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($products as $product)
        <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>
                {{ $product->name }}
                @if (!$product->calories)
                    <i class="bi bi-exclamation-octagon-fill icon text-danger"></i>
                @endif
            </td>
            <td>{{ $product->calories }}</td>
            <td class="actions">
                <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="mr-2">
                    <i class="bi-pencil icon"></i>
                </a>
                <form method="post" style="display: inline"
                      action="{{ route('products.destroy', ['product' => $product->id]) }}">
                    @csrf
                    @method('delete')
                    <button class="delete-prompt" type="submit" style="border:none; background: none; cursor:pointer;">
                        <i class="bi-trash icon"></i>
                    </button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
