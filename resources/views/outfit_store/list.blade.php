@extends('layouts.front')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h1>Outfits</h1>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        @foreach ($outfits as $outfit)
                        <div class="col-md-4">
                            <div class="book">
                                <div class="book__title">
                                    <a href="{{route('outfits_store_show_outfit', $outfit->id)}}">

                                        {{$outfit->type}}
                                </div>
                                <div class="book__author">
                                    {{$outfit->brand}}
                                </div>
                                <div class="book__image__img">
                                    <img src="{{$outfit->photo ?? asset('img/azael-8.webp')}}">
                                </div>

                                {{-- <div class="book__about">
                                    {{$outfit->color}}
                            </div> --}}
                            <div class="book__info">
                                <div><b>Color:</b> {{$outfit->color}}</div>
                                <div><b>Price:</b> {{$outfit->price}}</div>
                                <div><b>Discount:</b> {{$outfit->discount}}</div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
