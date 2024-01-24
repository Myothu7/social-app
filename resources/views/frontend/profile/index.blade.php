@extends('frontend.layout.header')

@extends('frontend.layout.app-header')
@section('header-cover-photo')
            <!-- avatar -->
    <div class="align-items-center justify-content-center d-none d-xl-flex" id="secondMenu" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
        <img src="{{ $data[0]->media ? asset('storage/'. $data[0]->media->cover_photo) : 'https://rb.gy/nizq7p' }}"
        class="rounded-circle me-2" alt="avatar" style="width: 38px; height: 38px; object-fit: cover"/>
    </div>
    <!-- secondary menu dd -->
    <ul class="dropdown-menu border-0 shadow p-3" aria-labelledby="secondMenu" style="width: 23em">
        <!-- avatar -->
        <li class="dropdown-item p-1 rounded d-flex" type="button">
        <img src="{{ $data[0]->media ? asset('storage/'. $data[0]->media->cover_photo) : 'https://rb.gy/nizq7p' }}" alt="avatar"
            class="rounded-circle me-2" style="width: 45px; height: 45px; object-fit: cover"/>
        <div>
            <p class="m-0 ">{{auth()->user()->name}}</p>
            <a href="{{route('profile')}}" class="m-0 text-muted text-decoration-none">See your profile</a>
        </div>
        </li>
@endsection

    <div class="container" style="width: 80%">
        <div style="height:500px; width:100%" class="position-relative">
            <img src="{{ $data[0]->media ? asset('storage/'.$data[0]->media->profile_photo) : 'data:image/jpeg;base64,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' }}"
            class="img-fluid rounded w-100 h-100 position-absolute" alt="..." style="object-fit: cover; " id="profile_photo1">
                <div class="" >
                    <div class="edit-cover position-absolute bottom-0 end-0 border py-1 px-2 bg-white rounded d-flex align-items-center mb-2 me-4"
                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-camera-retro fs-6"></i>
                        <span class="ms-2"> Edit Cover Photo</span>
                    </div>
                    {{-- <form action="{{ route('media.store') }}" method="post" enctype="multipart/form-data">
                        @csrf --}}
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                         <input type="hidden" value="{{ auth()->user()->id }}" id="auth_id">
                        <input type="file" id="fileInput1" onchange="uploadFile(1)" class="d-none">
                        <li>
                            <button class="dropdown-item" type="button" id="customButton1" onclick="openFileInput(1)">
                                <i class="fas fa-upload me-1"></i>
                                Upload Photo
                            </button>
                        </li>
                    {{-- </form> --}}
                        <li>
                            <button class="dropdown-item" type="button">
                                <i class="fas fa-trash me-1"></i>
                                Remove
                            </button>
                        </li>
                        <li><button class="dropdown-item" type="button">Something else here</button></li>
                    </ul>
                </div>
            <div class="position-absolute top-100 translate-middle rounded-circle p-1 bg-white" style="height:180px; width:180px; margin-left:130px;">
                {{-- <div class="border border-danger position-relative rounded-circle"> --}}
                    <div class="rounded-circle position-relative" style="object-fit: cover; max-width:180px; max-height:180px; overflow:inherit">
                            <img src="{{ $data[0]->media ? asset('storage/'.$data[0]->media->cover_photo) : 'https://cdn.vectorstock.com/i/preview-1x/48/06/image-preview-icon-picture-placeholder-vector-31284806.webp' }}" alt="..." id="profile_photo2" style="object-fit: cover"
                            class="rounded-circle">
                    </div>

                    <span class="position-absolute bottom-0 end-0 translate-middle p-2 bg-secondary rounded-circle edit-cover"
                    id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-camera fs-6 text-white"></i>
                    </span>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        <input type="file" id="fileInput2" class="d-none" onchange="uploadFile(2)">
                        <li>
                            <button class="dropdown-item" type="button" id="customButton2" onclick="openFileInput(2)">
                                <i class="fas fa-upload me-1"></i>
                                Upload Photo
                            </button>
                        </li>
                        <li>
                            <button class="dropdown-item" type="button">
                                <i class="fas fa-trash me-1"></i>
                                Remove
                            </button>
                        </li>
                        {{-- <li><button class="dropdown-item" type="button">Something else here</button></li> --}}
                    </ul>
                {{-- </div> --}}
            </div>
            <div class="position-absolute top-100 translate-middle" style="padding-top: 70px; margin-left:330px;">
                <h2 class="">{{auth()->user()->name}}</h2>
                <div>451 Friends</div>
            </div>
        </div>
    </div>
    <div class="border border-dark container" style="width: 70%; margin-top: 100px;"></div>
       <!-- create post -->
    <div class="container" style="width: 50%;">
        <form action="{{ route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="bg-white p-3 mt-3 rounded border shadow">
              <!-- avatar -->
              <div class="d-flex" type="button">
                <div class="p-1">
                  <img src="https://source.unsplash.com/collection/happy-people" alt="avatar" class="rounded-circle me-2" style="width: 38px; height: 38px; object-fit: cover"/>
                </div>
                <input type="text" class="form-control rounded-pill border-0 bg-gray pointer" placeholder="What's on your mind ?" data-bs-toggle="modal" data-bs-target="#createModal"/>
              </div>
              <!-- create modal -->
              <div class="modal fade mt-4" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true" data-bs-backdrop="false">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <!-- head -->
                    <div class="modal-header align-items-center">
                      <h5 class="text-dark text-center w-100 m-0" id="exampleModalLabel">
                        Create Post
                      </h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- body -->
                    <div class="modal-body">
                      <div class="my-1 p-1">
                        <div class="d-flex flex-column">
                          <!-- name -->
                          <div class="d-flex align-items-center">
                            <div class="p-2">
                              <img
                                src="https://source.unsplash.com/collection/happy-people"
                                alt="from fb"
                                class="rounded-circle"
                                style="width: 38px; height: 38px; object-fit: cover";/>
                            </div>
                            <div>
                              <p class="m-0 fw-bold">{{Auth::user()->name}}</p>
                              <select class="form-select border-0 bg-gray w-75 fs-7 rounded ouline-delete" aria-label="Default select example" name="status">
                                <option selected value="public">Public</option>
                                <option value="private">Private</option>
                                <option value="only me">Only me</option>
                              </select>
                            </div>
                          </div>
                          <!-- text -->
                          <div id="post">
                            {{-- <input type="text" > --}}
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="feeling_id" value="0">
                            <textarea cols="30" rows="4" class="form-control border-0 ouline-delete" name="content" autofocus></textarea>
                            <div id="image-conatiner" class="position-relative">
                                <img id="imagePreview" class="form-control"
                                src="">
                                <div class="position-absolute top-0 start-100 translate-middle badge rounded-pill" id="close"
                                onclick="cleanFile()">
                                    <i class="fas fa-times fs-4 text-danger"></i>
                                </div>
                            </div>
                            <input type="file" class="form-control mt-2 border-0 d-none" name="photo" id="postFile" onchange="handleFile()">
                          </div>
                          <!-- emoji  -->
                          <div
                            class="d-flex justify-content-between align-items-center">
                            <img src="https://www.facebook.com/images/composer/SATP_Aa_square-2x.png" class="pointer" alt="fb text" style="width: 30px; height: 30px; object-fit: cover;"/>
                            <i class="far fa-laugh-wink fs-5 text-muted pointer"></i>
                          </div>
                          <!-- options -->
                          <div class="d-flex justify-content-between border border-1 border-light rounded p-3 mt-3">
                            <p class="m-0">Add to your post</p>
                            <div>
                              <i class="fas fa-images fs-5 text-success pointer mx-1" onclick="openPostFile()"></i>
                              <i class="fas fa-user-check fs-5 text-primary pointer mx-1"></i>
                              <i class="far fa-smile fs-5 text-warning pointer mx-1"></i>
                              <i class="fas fa-map-marker-alt fs-5 text-info pointer mx-1"></i>
                              <i class="fas fa-microphone fs-5 text-danger pointer mx-1"></i>
                              <i class="fas fa-ellipsis-h fs-5 text-muted pointer mx-1"></i>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- end -->
                    </div>
                    <!-- footer -->
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary w-100">
                        Post
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <hr />
              <!-- actions -->
              <div class="d-flex flex-column flex-lg-row mt-3">
                <!-- a 1 -->
                <div
                  class="
                    dropdown-item
                    rounded
                    d-flex
                    align-items-center
                    justify-content-center
                  "
                  type="button"
                >
                  <i class="fas fa-video me-2 text-danger"></i>
                  <p class="m-0 text-muted">Live Video</p>
                </div>
                <!-- a 2 -->
                <div
                  class="
                    dropdown-item
                    rounded
                    d-flex
                    align-items-center
                    justify-content-center
                  "
                  type="button"
                >
                  <i class="fas fa-photo-video me-2 text-success"></i>
                  <p class="m-0 text-muted">Photo/Video</p>
                </div>
                <!-- a 3 -->
                <div
                  class="
                    dropdown-item
                    rounded
                    d-flex
                    align-items-center
                    justify-content-center
                  "
                  type="button"
                >
                  <i class="fas fa-smile me-2 text-warning"></i>
                  <p class="m-0 text-muted">Feeling/Activity</p>
                </div>
              </div>
            </div>
          </form>
    </div>

    {{-- Auth posts --}}

@extends('frontend.profile.post')

@extends('frontend.layout.footer')
