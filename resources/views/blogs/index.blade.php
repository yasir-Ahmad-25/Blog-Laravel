<x-base>

    <style>
        a{
            text-decoration: none;
            color: black;
        }
    </style>
    
    <!-- Blog Card -->
    <div class="card shadow-sm rounded-4 mb-4" style="max-width: 400px;">
        <img src="https://source.unsplash.com/400x200/?blog,technology" class="card-img-top rounded-top-4" alt="Blog Image">
        <div class="card-body">

                <a href="#">
                    <h5 class="card-title">AI Revolution in Everyday Life</h5>
                    <p class="card-text">Explore how artificial intelligence is shaping our daily routines, from smart assistants to personalized recommendations.</p>
                </a>

                <div class="d-flex align-items-center mt-3 gap-3">
                    <button class="btn btn-light border" id="likeBtn">
                        <i class="fa fa-thumbs-up text-success"></i>
                        <span id="likeCount">12</span>
                    </button>
                    
                    <button class="btn btn-light border" id="dislikeBtn">
                        <i class="fa fa-thumbs-down text-danger"></i>
                        <span id="dislikeCount">2</span>
                    </button>
                </div>

            </div>
        </div>

</x-base>