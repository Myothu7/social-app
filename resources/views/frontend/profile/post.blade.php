<div class="container" style="width:50%">
@foreach ($posts as $post)
<div class="bg-white p-4 rounded shadow mt-3">
    <!-- author -->
    <div class="d-flex justify-content-between">
        <!-- avatar -->
        <div class="d-flex">
        <img src="https://source.unsplash.com/collection/happy-people" alt="avatar" class="rounded-circle me-2"
            style="width: 38px; height: 38px; object-fit: cover"/>
        <div>
            {{-- <p class="d-none" id="user-id{{ $post->id }}">{{ $post->user_id }}</p> --}}
            <p class="m-0 fw-bold">{{ $post->user->name }}</p>
            <span class="text-muted fs-7">{{ $post->created_at->format('d-m-Y')}}</span>
        </div>
        </div>
        <!-- edit -->
        <i class="fas fa-ellipsis-h" type="button" id="post1Menu" data-bs-toggle="dropdown" aria-expanded="false"></i>
        <!-- edit menu -->
        <ul class="dropdown-menu border-0 shadow" aria-labelledby="post1Menu">
        <li class="d-flex align-items-center">
            <a class="dropdown-item d-flex justify-content-around align-items-center fs-7"
            href="#">Edit Post</a>
        </li>
        @if (Auth::user()->id === $post->id)
            <li class="d-flex align-items-center">
            <a class="dropdown-item d-flex justify-content-around align-items-center fs-7"
                href="#">Delete Post</a>
            </li>
        @endif
        </ul>
    </div>
    <!-- post content -->
    <div class="mt-3">
        <!-- content -->
        <div>
        <p>
            {{$post->content}}
        </p>
        <div class="text-center">
            @if($post->photo)
                <img src="{{asset('storage/'.$post->photo)}}" alt="post image" class="img-fluid rounded"/>
            @endif
        </div>
        </div>
        <!-- likes & comments -->
        <div class="post__comment mt-3 position-relative">
        <!-- likes -->
        <div class="d-flex align-items-center top-0 start-0 position-absolute" style="height: 50px; z-index: 5">
            <div class="me-2">
            <i class="text-primary fas fa-thumbs-up"></i>
            {{-- <i class="text-danger fab fa-gratipay"></i>
            <i class="text-warning fas fa-grin-squint"></i> --}}
            </div>
            <p class="m-0 fs-7" id="like-count{{ $post->id }}">{{ $post->likes->count()?:'' }}</p>
        </div>
        <!-- comments start-->
        <div class="accordion" id="accordionExample">
            <div class="accordion-item border-0">
            <!-- comment collapse -->
            <h2 class="accordion-header" id="headingTwo">
                <div class="accordion-button collapsed pointer d-flex justify-content-end"
                data-bs-toggle="collapse" data-bs-target="#collapsePost{{$post->id}}"
                aria-expanded="false" aria-controls="collapsePost{{$post->id}}">
                <p class="m-0"><span class="me-1">{{ $post->comments->count() }}</span>{{ $post->comments->count() == 1? 'comment' : 'comments' }} </p>
                </div>
            </h2>
            <hr />
            <!-- comment & like bar -->
            <div >

            <form action="" class="d-flex justify-content-around">
                <div class="dropdown-item rounded d-flex justify-content-center align-items-center
                    pointer
                    text-muted p-1" id="likeForm" onclick="checkLike({{ $post->id }}, {{ Auth::user()->id }})">
                        {{-- @if ($post->likes->count() == 0) --}}
                    <input type="hidden" value="0" id="like{{ $post->id }}">
                    <i class="far fa-thumbs-up me-3 {{ $post->authlike(Auth::user()->id, $post->id)? 'text-primary':'' }}" id="like-icon{{ $post->id }}" style="font-size: 22px;"></i>
                    <p class="m-0 {{ $post->authlike(Auth::user()->id, $post->id)? 'text-primary':'' }}" id="like-text{{ $post->id }}">Like</p>
                        {{-- @else
                    @foreach ($post->likes as $like)
                        <input type="hidden" value="{{ $like->user_id == Auth::user()->id ? 1 : 0 }}" id="like{{ $post->id }}">
                        <i class="far fa-thumbs-up me-3 {{ $like->user_id == Auth::user()->id ? 'text-primary' :'' }}" id="like-icon{{ $post->id }}"></i>
                        <p class="m-0 {{ $like->user_id == Auth::user()->id ? 'text-primary' :'' }}" id="like-text{{ $post->id }}">Like</p>
                        @endforeach
                        @endif --}}

                </div>
                <div class="dropdown-item rounded d-flex justify-content-center align-items-center pointer text-muted p-1" data-bs-toggle="collapse" data-bs-target="#collapsePost{{$post->id}}" aria-expanded="false" aria-controls="collapsePost{{$post->id}}">
                <i class="fas fa-comment-alt me-3"></i>
                <p class="m-0">Comment</p>
                </div>
            </div>

            <!-- comment expand -->
            <div id="collapsePost{{$post->id}}" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample{{$post->id}}">
                <hr />
                <div class="accordion-body">
                <!-- comment 1 -->
                <div class="d-flex align-items-center my-1">

                    <!-- comment text -->
                    <div class="p-3 rounded comment__input w-100 mb-4" id="cardDisplayComment">
                    <!-- comment menu of author -->
                    <div class="d-flex justify-content-end">
                        <!-- icon -->
                        <i
                        class="fas fa-ellipsis-h text-blue pointer"
                        id="post1CommentMenuButton"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        ></i>
                    </div>
                    {{-- display with api comments --}}
                    <div id="displayComment{{ $post->id }}">
                        {{-- <input type="hidden" id="check{{ $post->id }}" value="0"> --}}
                        @foreach ($post->comments as $comment)
                            <div class="mb-2">
                                <p class="m-0 fs-7 fw-bolder">{{ $comment->user->name }}</p>
                                <p class="m-0 fs-7 bg-gray p-2 rounded">
                                    {{ $comment->name }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                    </div>
                </div>
                <!-- create comment -->
                <form action="" id="storeComment" name="storeComment">
                    <!-- avatar -->
                    <div class="d-flex">
                    <img src="https://source.unsplash.com/collection/happy-people" alt="avatar"
                        class="rounded-circle me-2" style="width: 38px; height: 38px;object-fit: cover;"/>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control border-0 rounded-pill bg-gray" placeholder="Write a comment" aria-label="Username" aria-describedby="basic-addon1"/>

                        <span class="input-group-text" id="basic-addon1">
                        <button class="m-0 p-0 border-0 border-0 rounded-pill bg-gray" type="submit" disabled>
                            <i class="fa fa-paper-plane" aria-hidden="true" onsubmit="return alert('Hello')"></i>
                        </button>
                        </span>
                        {{-- <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1"> --}}
                    </div>
                    </div>
                    <!-- input -->

                </form>
                <!-- end -->
                </div>
            </div>
            </div>
        </div>
        <!-- end -->
        </div>
    </div>
    </div>
@endforeach
</div>
