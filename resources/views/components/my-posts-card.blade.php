<div class="card" style="width: 15rem; height: 19rem;">
  <img src="{{$imgurl}}" class="card-img-top" alt="..." style="height: 10rem;">
  <div class="card-body">
  <h5 class="card-title"><a href="/post/{{$id}}">{{$title}}</a></h5>
  </div>
  <div class="card-body">
    <a href="/edit-post/{{$id}}" class="btn btn-primary">Edit</a>
    <form action="/delete-post/{{$id}}" method="POST">
        @csrf
        @method('DELETE')
      <button class="btn btn-primary">Delete</button>
</form>
  </div>
</div>