@extends('frontend.layout.header')

@extends('frontend.layout.app-header')
    <div class="container" style="width: 80%">
        <div style="height:500px; width:100%" class="position-relative border border-warning">
            <img src="https://scontent.frgn4-1.fna.fbcdn.net/v/t39.30808-6/415390294_2150013018678503_1243922193069856091_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=783fdb&_nc_ohc=dNoc3GBis5kAX8FLYPv&_nc_ht=scontent.frgn4-1.fna&oh=00_AfANcYD2QURBS0aXhw_BUVsnXPtxGeiC0Wv8oUht_lWJiA&oe=65AFB1D9" 
            class="img-fluid rounded w-100 h-100 position-absolute" alt="..." style="object-fit: cover; ">
            <div class="position-absolute bottom-0 end-0 border py-1 px-2 bg-white rounded d-flex align-items-center mb-2 me-4">
                <i class="fas fa-camera-retro fs-6"></i>
                <span class="ms-2"> Edit Cover Photo</span>
            </div>
            <div class="position-absolute top-100 translate-middle rounded-circle p-1 bg-white" style="height:180px; width:180px; object-fit: cover; margin-left:130px; ">
                <img src="https://scontent.frgn4-1.fna.fbcdn.net/v/t39.30808-6/418518778_2158174291195709_4058299702883875368_n.jpg?_nc_cat=106&ccb=1-7&_nc_sid=efb6e6&_nc_ohc=K56HDxhdxgMAX8VwMBk&_nc_ht=scontent.frgn4-1.fna&oh=00_AfALCEkiqunDw6ZOq8DoGhU7Xd9gTLBMAgvLhkBY5Tz_yQ&oe=65B0B66F" 
            class="img-fluid rounded-circle" alt="..." >
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
                <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true" data-bs-backdrop="false">
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
                                style="width: 38px; height: 38px; object-fit: cover;/>
                            </div>
                            <div>
                                <p class="m-0 fw-bold">{{Auth::user()->name}}</p>
                                <select class="form-select border-0 bg-gray w-75 fs-7" aria-label="Default select example" name="status">
                                <option selected value="public">Public</option>
                                <option value="private">Private</option>
                                <option value="only me">Only me</option>
                                </select>
                            </div>
                            </div>
                            <!-- text -->
                            <div>
                            {{-- <input type="text" > --}}
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="feeling_id" value="0">
                            <textarea cols="30" rows="6" class="form-control border-0" name="content"></textarea>
                            <input type="file" class="form-control mt-2 border-0" name="photo">
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
                                <i class="fas fa-images fs-5 text-success pointer mx-1"></i>
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