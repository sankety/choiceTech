@extends('layouts.admin_template')
@section('content')
<section class="content">
    <div>
        <div class="row docs-premium-template">

            @foreach($products as $product)
            <div class="col-sm-12 col-md-6">
                <div class="box box-solid">
                    <div class="box-body">
                        <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            {{ $product->name  }}
                        </h4>
                        <div class="media">
                            <div class="media-left">
                                <a href="https://www.creative-tim.com/product/now-ui-kit-pro?affiliate_id=97705" class="ad-click-event">
                                    <img src="/uploads/j8wshv1jVK.png" alt="Now UI Kit" class="media-object" style="width: 150px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="clearfix">
                                    <p class="pull-right">
                                        <a href="javascript:;" onclick="purchase(this)" id="{{$product->id}}" class="btn btn-success btn-sm ad-click-event">
                                            Buy Now
                                        </a>
                                    </p>

                                    <h4 style="margin-top: 0">Now only at ─ ${{ $product->price }}</h4>

                                    <p>A beautiful Bootstrap 4 UI kit featuring over 1000 components, 34 sections and 11 example pages</p>
                                    <p style="margin-bottom: 0">
                                        <i class="fa fa-shopping-cart margin-r5"></i> 179+ purchases
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
{{--
            <div class="col-sm-12 col-md-6">
                <div class="box box-solid">
                    <div class="box-body">
                        <h4 style="background-color:#f7f7f7; font-size: 18px; text-align: center; padding: 7px 10px; margin-top: 0;">
                            PREMIUM TEMPLATE
                        </h4>
                        <div class="media">
                            <div class="media-left">
                                <a href="https://www.creative-tim.com/product/material-dashboard-pro-angular2?affiliate_id=97705" class="ad-click-event">
                                    <img src="/uploads/images/free_templates/creative-tim-material-angular.png" alt="Material Dashboard Pro" class="media-object" style="width: 150px;height: auto;border-radius: 4px;box-shadow: 0 1px 3px rgba(0,0,0,.15);">
                                </a>
                            </div>
                            <div class="media-body">
                                <div class="clearfix">
                                    <p class="pull-right">
                                        <a href="https://www.creative-tim.com/product/material-dashboard-pro-angular2?affiliate_id=97705" class="btn btn-success btn-sm ad-click-event">
                                            LEARN MORE
                                        </a>
                                    </p>

                                    <h4 style="margin-top: 0">Material Dashboard Pro ─ $59</h4>

                                    <p>Angular 2 Premium Material Bootstrap Admin with a fresh, new design inspired by Google's Material Design</p>
                                    <p style="margin-bottom: 0">
                                        <i class="fa fa-shopping-cart margin-r5"></i> 654+ purchases
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
--}}
        </div>
    </div>
</section>
    <script>
        function purchase(obj) {
            var id = obj.id;
            $.post('/purchase/'+id,{_token:'{{csrf_token()}}'}).then(function (res){
                alert('Order placed successfully !!!');
            });
            console.log(id);
        }
    </script>
@endsection