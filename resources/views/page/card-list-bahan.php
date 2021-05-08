<div class="bootcards-list col-sm-12">
    <div class="panel panel-default">
        <div class="list-group">
            <div class="list-group-item">
                <div class="row">
                    <div class="col-sm-12 a_">
                        <h4 class="list-group-item-heading">Title</h4>
                    </div>

                    {{-- =================================== --}}
                    <div class="col-sm-12 text-right a__">
                        <p class="list-group-item-text">
                            <a href="{{ url('/preview_produk/') }}" class="btn bg-green btn-xs waves-effect edit btn-circle-cos">
                                <i class="material-icons f-15">cloud_done</i>
                            </a>
                            <a href="{{ url('/preview_produk/') }}" class="btn bg-primary btn-xs waves-effect edit btn-circle-cos">
                                <i class="material-icons f-15">content_paste</i>
                            </a>
                            <a href="{{ url('/entry_berita/') }}" class="btn bg-teal btn-xs waves-effect edit btn-circle-cos">
                                <i class="material-icons f-15">create</i>
                            </a>
                            <a data-id="" class="btn bg-red btn-xs waves-effect hapus btn-circle-cos">
                                <i class="material-icons f-15">delete_forever</i>
                            </a>
                        </p>
                    </div>
                    {{-- ==================================== --}}

                </div>
            </div>
        </div>
    </div>
</div>

<!-- bahan 2 -->
<style type="text/css">
    div .actionCard{
        margin-bottom: 0 !important; 
        margin-top:10px !important;
    }
    .iconCardAction{
        width: 30px !important; 
        height: 30px !important; 
        padding: 5px !important; 
        border-radius:50% !important;
    }
    .hr_line_{
        margin-top: 2px !important;
        margin-bottom: 2px !important;
    }
    .span_btn1{
        padding: 0 !important; 
        margin: 0 !important; 
        box-shadow: none !important; 
        background: transparent !important;
    }
    .cmt-10{
         margin-top: 10px !important;
    }
    .commentss{
        background: transparent; 
        color: #000 !important;
    }

</style>

<div class="col-sm-3 text-right actionCard">
    <p class="list-group-item-text">
        <a href="{{ url('/preview_produk/') }}"
        class="btn bg-green btn-xs waves-effect edit iconCardAction">
        <i class="material-icons f-15">cloud_done</i>
    </a>
    <a href="{{ url('/preview_produk/') }}"
    class="btn bg-primary btn-xs waves-effect edit iconCardAction">
    <i class="material-icons f-15">content_paste</i>
</a>
<a href="{{ url('/entry_berita/' . $item->id) }}"
    class="btn bg-teal btn-xs waves-effect edit iconCardAction">
    <i class="material-icons f-15">create</i>
</a>
<a data-id="{{ $item->id }}"
    class="btn bg-red btn-xs waves-effect hapus iconCardAction">
    <i class="material-icons f-15">delete_forever</i>
</a>
</p>
<hr class="hr_line_">
<span class="btn" span_btn1>
<i class="material-icons f-19 cmt-10">comment</i> <span
class="badge badge-light commentss">0</span>
</span>

<span class="btn" span_btn1>
<i class="material-icons f-19 cmt-10">visibility</i> <span
class="badge badge-light commentss">
    {{ $item->viwer }}
</span>
</span>

</div>