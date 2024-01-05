@extends("layout")

@section("content")
<div class="notice"> 
    <div class="noticeHeader">
        <h1>सूचनाहरु</h1>
    </div>

    <div class="notices">
    <x-noticeReader renderAll="true"/>

          
    </div>
</div>
    <!-- End of notice container -->
@endsection