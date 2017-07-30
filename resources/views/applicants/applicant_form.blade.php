<?php
/**
 * Created by PhpStorm.
 * User: Sanket
 * Date: 29-04-2017
 * Time: 21:56
 */
?>
@extends('layouts.admin-single')
<script src='https://www.google.com/recaptcha/api.js'></script>

@section('content')

    <body class="hold-transition login-page">

    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>COLOR</b>Elephant</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Please fill in your details to submit your application</p>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="/submit-application" METHOD="post" novalidate="true">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputName3" class="col-sm-3 control-label">Name</label>

                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" id="inputName3" placeholder="Name">
{{--
                                <span class="help-block">{{ $errors->first('name', ':message') }}</span>
--}}

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>

                            <div class="col-sm-9">
                                <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputWebAddressd3" class="col-sm-3 control-label">Web Address</label>

                            <div class="col-sm-9">
                                <input type="text" name="web_address" class="form-control" id="inputWebAddressd3" placeholder="Web Address">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputCoverLetterd3" class="col-sm-3 control-label">Cover Letter</label>

                            <div class="col-sm-9">
                                <input type="text" name="cover_letter" class="form-control" id="inputCoverLetterd3" placeholder="Cover Letter">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAttachmentd3" class="col-sm-3 control-label">Attachment</label>

                            <div class="col-sm-9">
                                <input type="file" name="attachments" class="form-control" id="inputAttachmentd3" placeholder="Attachment">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputLikeWorkd3" class="col-sm-3 control-label">Do you like to work?</label>

                            <div class="col-sm-9">
                                <input type="radio" name="work_opinion" class="form-control" id="inputLikeWorkd3" value="1">  Yes
                                <input type="radio" name="work_opinion" class="form-control" id="inputLikeWorkd3" value="2">  No
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3 control-label">Catcha</label>

                            <div class="col-sm-9">
                                <div class="g-recaptcha" data-sitekey="6LdHBysUAAAAACQl_TqjAKZYC1awfC1Z_pQ7YZbj"></div>
                            </div>
                        </div>

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-info pull-right">Sign in</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>




        </div>
        <!-- /.login-box-body -->
    </div>
    </body>

@endsection

