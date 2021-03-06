@extends ('layout.app')
@section('pageTitle', $prodotto[0]->nome)
@section ('content')

    <!-- breadcrumb -->
    <div class="container">
        <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
            <a href="{{route('coza')}}" class="stext-109 cl8 hov-cl1 trans-04">
                Home
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="#" class="stext-109 cl8 hov-cl1 trans-04">
                {{$prodotto[0]->gender}}
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a class="stext-109 cl8 hov-cl1 trans-04">
                {{$prodotto[0]->nome_categoria}}
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a class="stext-109 cl8 hov-cl1 trans-04">
                {{$prodotto[0]->nome_sub}}
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
				{{$prodotto[0]->nome}}
			</span>
        </div>
    </div>

<section class="sec-product-detail bg0 p-t-65 p-b-60">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"></div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                        <div class="slick3 gallery-lb js-get-image-cart" value="{{$images[0]->img_dir}}">
                            @foreach($images as $image)
                            <div class="item-slick3" data-thumb="{{asset('storage/'.$image->img_dir)}}">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="{{asset('storage/'.$image->img_dir)}}" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{asset('img/'.$image->img_dir)}}">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        {{$prodotto[0]->nome}}
                    </h4>

                    <span class="mtext-106 cl2">
							€ {{$prodotto[0]->price}}
						</span>

                    <p class="stext-102 cl3 p-t-23">
                        {{$prodotto[0]->mini_descrizione}}
                    </p>
                    <!--  -->
                    <div class="p-t-33">
                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203 flex-c-m respon6">
                                Taglia
                            </div>

                            <div class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select id="taglieselct" class="js-select2" name="time">
                                        <option>Seleziona Taglia</option>
                                        @foreach($taglie as $taglia)
                                        <option>{{$taglia->taglia}}</option>
                                            @endforeach
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203 flex-c-m respon6">
                                Colore
                            </div>

                            <div class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2" id="colorselect" name="time">
                                        <option>Seleziona Colore</option>
                                        <option>{{$prodotto[0]->colore}}</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-r-m p-b-10">

                            <div class="size-203 flex-c-m respon6">
                                Quantità
                            </div>

                            <div class="size-204 respon6-next">
                                <div class="wrap-num-product flex-w m-r-20">
                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                    </div>

                                    <input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                            <div class ="flex-col-c-m">

                            <div class="alert alert-danger print-error-msg" style="visibility: hidden">
                                <ul></ul>
                            </div>

                            <div class="respon6 flex-c-m">
                                <button value='{{$productcart[0]->id}}' class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail">
                                    Aggiungi al Carrello
                                </button>
                            </div>

                            </div>
                        </div>
                    </div>

                    <!--  -->
                    <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                        <div class="flex-m bor9 p-r-10 m-r-11">
                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                                <i class="zmdi zmdi-favorite"></i>
                            </a>
                        </div>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="bor10 m-t-50 p-t-43 p-b-40">
            <!-- Tab01 -->
            <div class="tab01">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item p-b-10">
                        <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Descrizione</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#information" role="tab">Informazioni Aggiuntive</a>
                    </li>

                    <li class="nav-item p-b-10">
                        <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Recensioni</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-t-43">
                    <!-- - -->
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="how-pos2 p-lr-15-md">
                            <p class="stext-102 cl6">
                              {{$prodotto[0]->grande_descrizione}}
                            </p>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="tab-pane fade" id="information" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <ul class="p-lr-28 p-lr-15-sm">
                                    <li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Peso
											</span>

                                        <span class="stext-102 cl6 size-206">
												{{$prodotto[0]->peso}} kg
											</span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Dimensioni
											</span>

                                        <span class="stext-102 cl6 size-206">
												{{$prodotto[0]->dimensione}} cm
											</span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Materiale
											</span>

                                        <span class="stext-102 cl6 size-206">
												{{$prodotto[0]->materiale}}
											</span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Colori
											</span>

                                        <span class="stext-102 cl6 size-206">
												{{$prodotto[0]->colore}}
											</span>
                                    </li>

                                    <li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Size
											</span>

                                        <span class="stext-102 cl6 size-206">

											</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- - -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="row">
                            <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                <div class="p-b-30 flex-col-c-m m-lr-15-sm js-comments" value="{{$prodotto[0]->id}}">
                                    <!-- Review -->
                                    @foreach($comment as $comm)
                                    <div class="flex-w flex-t p-b-68 js-comment-div-start" style="min-width: 100%">
                                        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                            <img src="{{asset('img/avatar-01.jpg')}}" alt="AVATAR">
                                        </div>

                                        <div class="size-207">
                                            <div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-r-20">
														{{$comm->name}}
													</span>

                                                <span class="fs-18 cl11 js-startcomment" value="{{$comm->voto}}">
														<i class="zmdi zmdi-star-outline"></i>
														<i class="zmdi zmdi-star-outline"></i>
														<i class="zmdi zmdi-star-outline"></i>
														<i class="zmdi zmdi-star-outline"></i>
														<i class="zmdi zmdi-star-outline"></i>
													</span>
                                            </div>

                                            <p class="stext-102 cl6">
                                                {{$comm->commento}}
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach
                                    {{ $comment->links() }}

                                    </div>

                                    <!-- Add review -->
                                    <form class="w-full">
                                        <h5 class="mtext-108 cl2 p-b-7">
                                            Aggiungi una Recensione
                                        </h5>

                                        <p class="stext-102 cl6 p-b-20">
                                           Fai sapere agli altri utenti come hai trovato il prodotto!
                                        </p>

                                        <div class="alert alert-danger print-error-msg-review" style="visibility: hidden">
                                            <ul></ul>
                                        </div>

                                        <div class="flex-w flex-m p-t-20 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Il tuo voto
												</span>

                                            <span class="wrap-rating fs-18 cl11 pointer js-addstarreview">
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" type="number" name="rating">
												</span>
                                        </div>

                                        <div class="row p-b-25">
                                            <div class="col-12 p-b-5">
                                                <label class="stext-102 cl3" for="review">La tua Recensione</label>
                                                <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
                                            </div>
                                        </div>

                                        <button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10 js-add-review" value="{{$productcart[0]->id}}">
                                            Invia
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				SKU: JAK-01
			</span>

        <span class="stext-107 cl6 p-lr-25">
				Categoria: {{$prodotto[0]->nome_categoria}}/{{ $prodotto[0]->nome_sub}}
			</span>
    </div>
</section>


<!-- Related Products -->
<section class="sec-relate-product bg0 p-t-45 p-b-105">
    <div class="container">
        <div class="p-b-45">
            <h3 class="ltext-106 cl5 txt-center">
                Prodotti simili
            </h3>
        </div>

        <!-- Slide2 -->
        <div class="wrap-slick2">
            <div class="slick2">
                @foreach($simili as $simile)
                <div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
                            <img src="{{asset('storage/'.$simile->img_dir)}}" alt="IMG-PRODUCT">
                            <a href="#" onclick="window.location='{{ route('dettaglio', ["nome_prodotto" => $simile->nome, "id_prodotto" => $simile->id, 'id_subcat' => $simile->id_subcategoria, 'gender' => $simile->gender])}}'" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
                                Dettagli
                            </a>
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="#" onclick="window.location='{{ route('dettaglio', ["nome_prodotto" => $simile->nome, "id_prodotto" => $simile->id, 'id_subcat' => $simile->id_subcategoria, 'gender' => $simile->gender])}}'" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{$simile->nome}}
                                </a>

                                <span class="stext-105 cl3">
										{{'€'.$simile->price}}
									</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection