@extends('layouts.admin_template')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Box Comment -->
            <div class="box box-widget">
                <div class="box-header with-border">
                    <div class="user-block">
{{--
                        <img class="img-circle" src="/admin/dist/img/user1-128x128.jpg" alt="User Image">
--}}
                        <span style="font-size: 16px" class="username"><a href="#">{{$data->name}}</a></span>
                        <span style="font-size: 16px" class="description">{{$data->email}} - <a target="_blank" href="{{$data->web_address}}">{{$data->web_address}}</a></span>

                    </div>
                    <!-- /.user-block -->
                    <div class="box-tools">

                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
{{--
                    <img class="img-responsive pad" src="/admin/dist/img/photo2.png" alt="Photo">
--}}
                    <embed src="/uploads/{{$data->attachments}}" width="600" height="500" alt="pdf">

                        <p style="font-size: 16px"><strong>Cover Letter : </strong>{{$data->cover_letter}}</p>

                    <span class="pull-right text-muted">127 likes - 3 comments</span>
                </div>
                <!-- /.box-body -->
                {{--<div class="box-footer box-comments">
                    <div class="box-comment">
                        <!-- User image -->
                        <img class="img-circle img-sm" src="/admin/dist/img/user3-128x128.jpg" alt="User Image">

                        <div class="comment-text">
                      <span class="username">
                        Maria Gonzales
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                            It is a long established fact that a reader will be distracted
                            by the readable content of a page when looking at its layout.
                        </div>
                        <!-- /.comment-text -->
                    </div>
                    <!-- /.box-comment -->
                    <div class="box-comment">
                        <!-- User image -->
                        <img class="img-circle img-sm" src="/admin/dist/img/user4-128x128.jpg" alt="User Image">

                        <div class="comment-text">
                      <span class="username">
                        Luna Stark
                        <span class="text-muted pull-right">8:03 PM Today</span>
                      </span><!-- /.username -->
                            It is a long established fact that a reader will be distracted
                            by the readable content of a page when looking at its layout.
                        </div>
                        <!-- /.comment-text -->
                    </div>
                    <!-- /.box-comment -->
                </div>--}}
                <!-- /.box-footer -->
                <div class="box-footer">

                        <img class="img-responsive img-circle img-sm" src="/admin/dist/img/user4-128x128.jpg" alt="Alt Text">
                        <!-- .img-push is used to add margin to elements next to floating images -->
                        <div class="img-push">
                            <input type="text" class="form-control input-sm" placeholder="Press enter to post comment">
                        </div>
                </div>
                <!-- /.box-footer -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->

    </div>
</section>
@endsection