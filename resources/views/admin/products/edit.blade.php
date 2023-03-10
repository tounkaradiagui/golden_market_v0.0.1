@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Modification du produit
                    <a href="{{url('admin/products')}}" class="btn btn-danger float-end btn-sm text-white">Retour</a>
                </h4>
            </div>
            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    <div>{{$error}}</div>
                    @endforeach
                </div>
                @endif

                <form action="{{url('admin/products/'.$product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                Accueil

                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                                Tag de référencement (SEO)
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                Détails
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                Images du produit
                            </button>
                        </li>

                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">
                                Couleur de produit
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Catégorie</label>
                                <select name="category_id" class="form-control">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{$category->id == $product->category_id ? 'selected':''}}>
                                        {{$category->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">Nom du produit</label>
                                <input type="text" name="nom" class="form-control" value="{{$product->nom}}">
                            </div>

                            <div class="mb-3">
                                <label for="">Slug du produit</label>
                                <input type="text" name="slug" class="form-control" value="{{$product->slug}}">
                            </div>

                            <div class="mb-3">
                                <label for="">Choisir la marque</label>
                                <select name="marque" class="form-control">
                                    @foreach($brands as $marque)
                                    <option value="{{$marque->nom}}" {{$marque->nom == $product->marque ? 'selected':''}}>
                                        {{$marque->nom}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="">Courte description (200 mots max)</label>
                                <textarea name="small_description" id="" cols="33" rows="4" class="form-control">{{$product->small_description}}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$product->description}}</textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Titre du SEO</label>
                                <input type="text" name="meta_title" value="{{$product->meta_title}}" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="meta_description" id="" cols="30" rows="10" class="form-control">{{$product->meta_description}}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="">Mots clés</label>
                                <textarea name="meta_keyword" id="" cols="30" rows="10" class="form-control">{{$product->meta_keyword}}</textarea>
                            </div>
                            
                        </div>
                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Le prix réel</label>
                                        <input type="text" name="prix_original" value="{{$product->prix_original}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Le prix de ventes</label>
                                        <input type="text" name="prix_de_vente" class="form-control" value="{{$product->prix_de_vente}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Quantité</label>
                                        <input type="number" name="quantite" value="{{$product->quantite}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Tendance (mode)</label>
                                        <input type="checkbox" name="tendance" {{$product->tendance == '1' ? 'checked':'' }}  style="width: 50px; height: 50;">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="">Status</label>
                                        <input type="checkbox" name="status" {{$product->status == '1' ? 'checked':'' }} style="width: 50px; height: 50;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Choisir l'image du produit</label>
                                <input type="file" name="image[]" multiple  class="form-control"/>
                            </div>

                            <div>
                                @if($product->productImages)
                                <div class="row">
                                    @foreach($product->productImages as $image)
                                    <div class="col-md-2">
                                        <img src="{{asset($image->image)}}" style="width: 80px; height: 80px;" class="me-4 border" alt="image"/>
                                        <a href="{{url('admin/product-image/'.$image->id.'/delete')}}" class="d-block">Supprimer</a>
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <h5>Aucune image ajoutée</h5>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane fade border p-3" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                            <div class="mb-3">
                                <h4>Ajouter une couleur de produit</h4>
                                <label for="">Choisir une couleur</label>
                                <hr/>
                                <div class="row">
                                    @forelse($colors as $coloritem)
                                    <div class="col-md-3">
                                        <div class="p-2 border mb-3">
                                            Couleur : <input type="checkbox" name="colors[{{$coloritem->id}}]" value="{{$coloritem->id}}"/>
                                            {{$coloritem->nom_couleur}}
                                            </br>
                                            Quantité : <input type="number" name="colorquantite[{{$coloritem->id}}]" style=" width: 70; border: 1px solid"/>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-md-12">
                                        <h1>Aucune couleur trouvée</h1>
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Nom de la couleur</th>
                                            <th>Quantité</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Validé</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection