@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{(session('message'))}}</div>
        @endif
        <div class="card">
            <div class="card-header">
                <h4>La liste de produits
                    <a href="{{url('admin/products/create')}}" class="btn btn-primary float-end btn-sm text-white">Ajouté</a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Catégorie</th>
                            <th>Produits</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Status</th>
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>
                                @if($product->category)
                                    {{$product->category->name}}
                                @else
                                    Pas de catégorie
                                @endif
                            </td>
                            <td>{{$product->nom}}</td>
                            <td>{{$product->prix_de_vente}}</td>
                            <td>{{$product->quantite}}</td>
                            <td>{{$product->status == '1' ? 'Masqué':'Visible'}}</td>
                            <td>
                                <a href="{{url('admin/products/'.$product->id.'/edit')}}" class="btn btn-primary btn-sm">Modifier</a>
                            </td>
                            <td>
                            <a href="{{url('admin/products/'.$product->id.'/delete')}}" onclick="return confirm('Voulez-vous vraiment supprimer ce produit ?')" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">Aucun produts disponible</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection