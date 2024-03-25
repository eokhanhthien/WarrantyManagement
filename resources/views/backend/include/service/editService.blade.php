@extends('backend.layout')
@section('order')
<meta name="_token" content="{{ csrf_token() }}">

<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Thêm hãng sản xuất</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Thêm hãng sản xuất</li>
                        </ol>
                    </div>
                    <div class="col-md-7 align-self-center">
       
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <button class="btn btn-primary mr-10"> <a href="{{route('service')}}">Quay lại</a> </button>
                <form action="{{route('service-update', $data['id'] )}}" method="post" class="form-border-5" enctype="multipart/form-data" id="service_form">
                @csrf
                <div class="wide">
                    <div class="row">
                        <div class="col-2"> <p class="label-add-order">Tên hãng</p> </div>
                        <div class="col-8"><input class="input-add-order" type="text" value="<?= $data['name'] ?>" placeholder="Manufacturer name" name="name" required></div>
                    </div>
                    {{-- Thêm hình ảnh --}}
                    <div class="row">
                        <div class="col-2"> <p class="label-add-order">Hình ảnh</p> </div>
                        <div class="col-8">
                            <input type="file" name="image" id="image" class="input-add-order" >
                            <img src="{{asset('/uploads/service/'.$data['image'])}}" alt="" width="100px" height="100px">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2"> <p class="label-add-order">Nội dung</p> </div>
                        <div class="col-8"><textarea class="input-add-order" type="text" placeholder="Manufacturer content" id="content" value="" required> <?= $data['content'] ?></textarea>
                        <input type="hidden" name="content" id="service_content">
                        </div>
                    </div>

                </div>
                <div onclick="submit()" class='btn btn-success'>Sửa</div>
                </form>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>

   <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <script>
        // Nhúng CKEditor 
    CKEDITOR.replace('content', {
            extraPlugins: 'colorbutton,colordialog,font,justify,colorbutton',
            toolbar: [
                { name: 'document', items: ['Source'] },
                { name: 'clipboard', items: ['Undo', 'Redo'] },
                { name: 'editing', items: ['Find', 'Replace', '-', 'SelectAll'] },
                { name: 'links', items: ['Link', 'Unlink'] },
                { name: 'insert', items: ['Image', 'Table', 'HorizontalRule'] },
                { name: 'tools', items: ['Maximize'] },
                '/',
                { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript'] },
                { name: 'styles', items: ['Styles', 'Format', 'Font', 'FontSize', 'TextColor', 'BGColor'] },
                { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote'] },
                { name: 'justify', items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] }
            ],
            colorButton_colors: '0088CC,00CC99,FF0000',
            colorButton_enableMore: true,
            colorButton_foreStyle: {
                element: 'span',
                styles: { 'color': '#(color)' }
            }
    });

    function submit() {
        var content = CKEDITOR.instances.content.getData();
        $('#service_content').val(content);
        $('#service_form').submit();
    }
    </script>
@endsection
