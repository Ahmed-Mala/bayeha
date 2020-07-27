@csrf
<div class="form-group">
  <label for="title">{{__('Title')}}</label>
    <input type="text" name="title"  class="form-control" @isset($ad) value="{{$ad->title}}" @endisset>
</div>

<div class="form-group">
@foreach($categories as $id => $title)

<label for="category_{{$id}}">{{$title}}</label>
<input id="category_{{$id}}" type="checkbox" name="categories[]"  value="{{$id}}"
    @if(isset($ad) && in_array($id, $adCategories)) checked @endif
>
@endforeach
</div>


<div class="form-group">
  <label for="content">{{__('content')}}</label>
  <textarea name="content" class="form-control" id="content" rows="8" cols="80">@isset($ad) {{$ad->content}} @endisset</textarea>
</div>

<div class="form-group">
  <label class="btn text-light" style="background-color: #563d7c;">
      أضف صورة من هنا <input type="file" name="image" class="form-control"  style="display: none;">
  </label>
</div>


<div class="form-group">
    <button class="btn btn-success">{{$submitText}}</button>
</div>
