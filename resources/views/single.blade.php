@extends('layouts.front')


@section('content')
    <div class="row">
        <div class="col-6">
            @if($product->photos->count())

                <img id="img_01" src="{{asset('storage/' . $product->thumb)}}" alt="" class="card-img-top thumb"
                     data-zoom-image="{{asset('storage/' . $product->full)}}" style="height: 272px; width: 411px;">

                <div id="gal1" class="row" style="margin-top: 20px;">

                    @foreach($product->photos as $photo)
                        <div class="col-4">
                            <a href="#"
                               class="elevatezoom-gallery @if($photo->id == $photo->first()->id) active @endif"
                               data-image="{{asset('storage/' . $photo->thumb)}}"
                               data-zoom-image="{{asset('storage/' . $photo->image)}}">
                                <img src="{{asset('storage/' . $photo->thumb)}}" class="img-fluid img-small">
                            </a>
                        </div>
                    @endforeach

                </div>
            @else
                <img src="{{asset('images/no-photo.jpg')}}" alt="" class="card-img-top">
            @endif
        </div>

        <div class="col-6">
            <div class="col-md-12">
                <h2>{{$product->name}}</h2>
                <p>
                    {!! $product->description !!}
                </p>

                <h3>
                    R$ {{number_format($product->price, '2', ',', '.')}}
                </h3>

                <span>
                   {{-- Loja: {{$product->store->name}} --}}
                </span>
            </div>

            <div class="product-add col-md-12">
                <hr>

                {!! Form::open(['route'=>'cart.add']) !!}
                <input type="hidden" name="product[name]" value="{{$product->name}}">
                <input type="hidden" name="product[price]" value="{{$product->price}}">
                <input type="hidden" name="product[slug]" value="{{$product->slug}}">
                <div class="form-group">
                    <label>Quantidade</label>
                    <input type="number" name="product[amount]" class="form-control col-md-2" value="1">
                </div>
                <button class="btn btn-lg btn-danger">Comprar</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <hr>
            {!! $product->body !!}
        </div>
    </div>
@endsection

@push('js')



    {{--<script>
        let thumb = document.querySelector('img.thumb');
        let imgSmall = document.querySelectorAll('img.img-small');

        imgSmall.forEach(function(el) {
             el.addEventListener('click', function() {
                thumb.src = el.src;
             });
        });
    </script> --}}
    <script>
        $('#img_01').ezPlus({
            gallery: 'gal1', cursor: 'pointer', galleryActiveClass: 'active',
            imageCrossfade: true, loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'
        });

        //pass the images to Fancybox
        $('#img_01').bind('click', function (e) {
            var ez = $('#img_01').data('ezPlus');
            $.fancyboxPlus(ez.getGalleryList());
            return false;
        });
    </script>
@endpush
@push('css')
    <style>
        /*set a border on the images to prevent shifting*/
        #gallery_01 img {
            border: 2px solid white;
        }

        /*Change the colour*/
        .active img {
            border: 2px solid #333 !important;
        }
    </style>
@endpush
@push('metadata')
    <meta name="description" content="{{$product->body}}"/>
    <meta name="keywords" content="{{str_replace(' ',',',$product->description)}}"/>

    <meta property="og:locale" content="pt_BR">
    <meta property="og:image"
          content="{{asset('storage/' . $product->thumb)}}">
    <meta property="og:image:width" content="900">
    <meta property="og:image:height" content="900">
    <meta property="og:url" content="{{url()->current()}}">
    <meta property="og:title" content="{{$product->name}}">
    <meta property="og:site_name" content="{{config('metadata.name')}}">
    <meta property="og:type" content="website">
    <meta property="og:description" content="{{$product->description}}">
@endpush
