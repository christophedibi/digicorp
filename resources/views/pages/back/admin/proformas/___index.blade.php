@extends('layouts.app')

@section('content')
    <h1>Créer une nouvelle proforma</h1>
    <form action="{{ route('proformas.store') }}" method="POST">
        @csrf
        <label for="customer_name">Nom du client :</label>
        <input type="text" name="customer_name" id="customer_name" required>
        <br>
        <label for="customer_email">Adresse e-mail du client :</label>
        <input type="email" name="customer_email" id="customer_email" required>
        <br>
        <div id="products">
            <div>
                <label for="product_id[]">Produit :</label>
                <select name="product_id[]" required>
                    <option value="">-- Sélectionnez un produit --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                <label for="quantity[]">Quantité :</label>
                <input type="number" name="quantity[]" min="1" required>
                <button type="button" class="add-product">Ajouter un produit</button>
            </div>
        </div>
        <br>
        <button type="submit">Créer la proforma</button>
    </form>

    <script>
        document.querySelector('.add-product').addEventListener('click', () => {
            const div = document.createElement('div');
            div.innerHTML = `
                <label for="product_id[]">Produit :</label>
                <select name="product_id[]" required>
                    <option value="">-- Sélectionnez un produit --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                <label for="quantity[]">Quantité :</label>
                <input type="number" name="quantity[]" min="1" required>
                <button type="button" class="remove-product">Supprimer ce produit</button>
            `;
            document.querySelector('#products').appendChild(div);
            div.querySelector('.remove-product').addEventListener('click', () => div.remove());
        });
    </script>
@endsection
