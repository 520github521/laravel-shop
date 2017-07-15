@extends('layouts.master')
@section('商品列表', 'Page Title')

@section('sidebar')
    @parent
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php foreach ($products as $product){ ?>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail" >
                            <img src="<?php echo $product->imageurl ?>" class="img-responsive">
                            <div class="caption">
                                <div class="row">
                                    <div class="col-md-6 col-xs-6">
                                        <h3><?php echo $product->name ?></h3>
                                    </div>
                                    <div class="col-md-6 col-xs-6 price">
                                        <h3>
                                            <label>￥<?php echo $product->price ?></label></h3>
                                    </div>
                                </div>
                                <p><?php echo $product->description ?></p>
                                <div class="row">
                                    <div class="col-md-6 col-md-offset-3">
                                        <a href="/addProduct/<?php echo $product->id ?>" class="btn btn-success btn-product"><span class="fa fa-shopping-cart"></span> 购买</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>

@endsection
